<?php

class IndexController extends Zend_Controller_Action
{
    
    public function indexAction()
    {
        $view = $this->initView();
        $view->headTitle('Projeto Padrão ZF');
		$view->headLink(array('rel' => 'shortcut icon', 'href' => '/biblioteca/layout/imagens/favicon.ico'), 'PREPEND');
		
        $view->headLink()->appendStylesheet("/aplicacao/".APPLICATION_NAME."/public/css/estilo.css")
						->appendStylesheet("/aplicacao/".APPLICATION_NAME."/public/css/menu.css")
						->appendStylesheet("/biblioteca/javascript/jquery/ui/jquery-ui-1.8.16.custom.css")
						->appendStylesheet("/biblioteca/javascript/jquery/upload/uploadify.v2.1.4/uploadify.css")
						->appendStylesheet("/biblioteca/javascript/jquery/jqgrid/css/ui.jqgrid.css")
						->appendStylesheet("/biblioteca/javascript/jquery/jqgrid/src/css/ui.multiselect.css");
			
    	$view->inlineScript()->appendFile("/biblioteca/javascript/jquery/jquery-1.6.3/jquery-1.6.3.js")
    					->appendFile("/biblioteca/javascript/jquery/menu/jquery.memu-0.1.min.js")
						->appendFile("/biblioteca/javascript/componentes/portal/carregarAjax.js")
						->appendFile("/aplicacao/".APPLICATION_NAME."/public/js/index/index.js")
						->appendFile("/biblioteca/javascript/jquery/ui/jquery-ui-1.8.16.custom.js")
						->appendFile("/biblioteca/javascript/jquery/ui/jquery.ui.datepicker-pt-BR.js")
						->appendFile("/biblioteca/javascript/jquery/mascaras/jquery.meio.mask.min.js")
						->appendFile("/biblioteca/javascript/jquery/validate-1.9.0/jquery.validate.js")
						->appendFile("/biblioteca/javascript/jquery/validate-1.9.0/additional-methods.js")
						->appendFile("/biblioteca/javascript/jquery/upload/uploadify.v2.1.4/swfobject.js")
						->appendFile("/biblioteca/javascript/jquery/upload/uploadify.v2.1.4/jquery.uploadify.v2.1.4.js")
						->appendFile("/biblioteca/javascript/jquery/jqgrid/plugins/ui.multiselect.js")
						->appendFile("/biblioteca/javascript/jquery/jqgrid/js/i18n/grid.locale-pt-br.js")
						->appendFile("/biblioteca/javascript/jquery/jqgrid/js/jquery.jqGrid.min.js")
						->appendScript('var APPLICATION_PATH_WEB_JS = "/aplicacao/'.APPLICATION_NAME.'"');

		$view->headMeta()->appendHttpEquiv('Content-Language', 'pt-br');			
		
		if(APPLICATION_ENV == 'development'){
			$view->headMeta()->appendHttpEquiv('expires', 'Wed, 26 Feb 1997 08:21:57 GMT')
			                 ->appendHttpEquiv('pragma', 'no-cache')
			                 ->appendHttpEquiv('Cache-Control', 'no-cache');
		}
    }

    
    public function indexdoisAction()
    {
    	try{
    	
	        $compartilhado = new Application_Model_DbTable_Compartilhado();
	        $estados = $compartilhado->getSlcEstado();
	        
	        echo '<pre>';
	        
	        foreach ($estados as $chave => $valor){
	        	echo $chave.'   ->   '.$valor.'<br>';
	        }
	        
	        echo '</pre>';
	        
    	}catch(Exception $e){
    		echo $e->getMessage();
    	}
        
    }
    
	public function phpinfoAction()
    {
       
    }

    
}

