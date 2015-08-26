<?php

class UploadfileController extends Zend_Controller_Action
{

    public function uploadfileAction()
    {
        // action body
    }

    public function uploadfiledoisAction()
    {
		//Recebendo os arquivos por POST
    	
        $NOME			= $_POST["hdnNomeArquivo"];
		$nome 			= str_replace(" ","",$NOME);
		echo "O nome do arquivo: ".$NOME;
		
		// Feito esta função rename pois usuarios fazem upload
		// de arquivos nomeados com espaços
		$caminhoinicial = "public/images/".$NOME;
		$caminho 	    = "public/images/".$nome;
		rename($caminhoinicial,$caminho);
		
		// Abrindo o arquivo inserido pelo usuário.		
		//
		try{
			$arquivo   = fread(fopen($caminho, "r"),filesize($caminho));
			$arqLinha  = explode("\r\n",$arquivo);
			$erroLinha = ""; $semCircuito = "";
			
			echo "O caminho do arquivo: ".$caminho;
			//Apartir daqui você faz as alterações necessarias para o projeto
			//com o arquivo em tratamento.
			
			echo 'Arquivo enviado com Sucesso!!!';
					
			
    	}
		catch( Exception $e )
		{
			echo $e;
			echo "Erro no serviço de FTP!";
		}
    }

}