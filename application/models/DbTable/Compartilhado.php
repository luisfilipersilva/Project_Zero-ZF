<?php
class Application_Model_DbTable_Compartilhado extends Zend_Db_Table_Abstract {
	
	protected $_name = 'Compartilhado.uf';
	protected $_primary = 'idUF';

	private function _init(){
		//$this->_db = Zend_Registry::get("mysql");
	}
	
	public function getSigla($idUF)
	{		
		$resUF = $this->_db->fetchRow("SELECT 
											siglaUF 
										FROM
											UF
										WHERE
											idUF = '$idUF'
										;");
		
		return $resUF['siglaUF'];
		
	}
	
	public function getSlcPais()
	{
		try {
			$select = $this->_db->select( )
							->from( "Pais" , array( "idPais", "CONCAT(siglaPais,' - ',nomePais) as pais"  ) )
							->order( "siglaPais" , "nomePais" );
			
			$pais = $this->_db->fetchPairs( $select );
		} catch (Exception $e) {
			return false;
		}
		return $pais; 
	}
	
	public function getSlcEstado( $slcPais = 0, $editar = 0 )
	{
		$select = $this->_db->select( )
							->from( array( "uf" => "UF" ), array( "idUF", "CONCAT(siglaUF,' - ',nomeUF) as pais" ) )
							->order( "siglaUF" );
							
		if($slcPais == 1)
			$select->where("Pais_idPais = ? AND idUF < 30", $slcPais);
		else if ($slcPais > 1)
			$select->where("Pais_idPais = ?", $slcPais);
		
		return $this->_db->fetchPairs( $select );
	}
	
	function getLocalidade($busca, $limit, $idUF)
	{		
		$UF = $this->getSigla($idUF);
				
		$queryLocalidade = "
			SELECT
				Localidade.idLocalidade as id,
				concat(Localidade.siglaLocalidade, \" - \",
				Localidade.nomeLocalidade) as value
			FROM
				Localidade
			LEFT JOIN Estacao ON (Estacao.Localidade_idLocalidade = Localidade.idLocalidade)
			LEFT JOIN Equipamento$UF ON (Equipamento$UF.Estacao_idEstacao = Estacao.idEstacao)
			WHERE
				Localidade.UF_idUF = $idUF AND
				Equipamento$UF.nomeEquipamento IS NOT NULL AND
				concat(Localidade.siglaLocalidade, \" - \",	Localidade.nomeLocalidade) LIKE '%$busca%'
			GROUP BY Localidade.idLocalidade
			LIMIT $limit;
		";
			
		return array('localidades' => $this->_db->fetchPairs($queryLocalidade));
	}
	
	
}