<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initCache(){

    	// Habilita o cache para metadados de tabelas utilizadas pelo Zend_Db
		$cache = Zend_Cache::factory('Core',
		                             'File',
		                             array( 'automatic_serialization' => true ),
		                             array( 'cache_dir'               => realpath("../application/configs") )
		                             );
        
	Zend_Db_Table_Abstract::setDefaultMetadataCache($cache);

		$resource = $this->getPluginResource('multidb');
		$resource->init();
		$db1 = $resource->getDb('db1');
		$db2 = $resource->getDb('db2');
		
		Zend_Registry::set( "mysql", $db1  );
		Zend_Registry::set( "sqlserver", $db2 );
		
  }
    
    
    public function _initAcl()
    {
    	/** Cria uma nova instancia da classe controladora */
        $frontController = Zend_Controller_Front::getInstance();
    	
    	$autoloader = Zend_Loader_Autoloader::getInstance();
		// Inicializa o autoloader padrao para Zend_ e ZendX_
		$autoloader->setFallbackAutoloader(true);
		
    	/******************************************************************
          Sessao Global do Portal
        ******************************************************************/
        
        session_name("usuarios"); //pega a sessao do portal
        Zend_Session::start(true); //inicia a sessao GLOBAL
        Zend_Registry::set('sessao', new Zend_Session_Namespace());
         
//        echo "<PRE>";
//        print_r($_SESSION['USUARIO']);
         
         if(APPLICATION_ENV != 'development'){
             
            if(isset($_SESSION['USUARIO']))
            {
                if (empty($_SESSION['USUARIO'])){
                        //redirecione o usuario para pagina inicial
                        header("location:http://portaldo.telemar");
                }else {
                        if(!empty($_SESSION['USUARIO']['id_login']) && !empty($_SESSION['USUARIO']['nome']))
                        {

                            //setando os dados
                            $auth = Zend_Auth::getInstance();
                            // pegando dados do usuario e setando no objeto
                            $usuario['login'] = $_SESSION['USUARIO']['id_login'];
                            $usuario['nome'] = $_SESSION['USUARIO']['nome'];
                            $usuario['perfis'] = $_SESSION['USUARIO']['aplicacoes']['appSia'];
                            $auth->getStorage()->write($usuario);
                            $acl = new ControleAcl($auth);
                            $plugin = new PluginAcl($auth, $acl);
                            $frontController->registerPlugin($plugin);
                            
                        }
                        else{
                            header("location:http://portaldo.telemar");
                        }
                }
            }else
            {
                header("location:http://portaldo.telemar");
            }
            
        } else {
            
            $auth = Zend_Auth::getInstance();
            // Emula dados do usuario em ambiente de desenvolvimento
            $usuario['login']  = '999999';
            $usuario['nome']   = "Desenvolvimento";
            $usuario['perfis']   = "4";

            $auth->getStorage()->write($usuario);
            $acl = new ControleAcl($auth);
            $plugin = new PluginAcl($auth, $acl);
            $frontController->registerPlugin($plugin);
            
        }
    }
}