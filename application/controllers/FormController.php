<?php

class FormController extends Zend_Controller_Action
{
	protected $_compartilhado;
	
	public function init()
	{
		header("Content-type: text/html; charset=utf-8");

		$this->_compartilhado = new Application_Model_DbTable_Compartilhado();
	}

	public function exemploformAction() 
	{
		$formExemplo = new Application_Form_FormExemplo();

		$this->view->form = $formExemplo->equipamento($this->_compartilhado->getSlcPais());
	}
	
	public function populaestadoAction(){
        $this->_helper->json->sendJson( $this->_compartilhado->getSlcEstado( $_GET['slcPais'] ) );
	}
	
	public function carregalocalidadeAction()
	{
		$teste = $this->_getAllParams();
		
		$this->_helper->viewRenderer->setNoRender(true);
		
		$this->_helper->json->sendJson( $this->_compartilhado->getLocalidade($this->_getParam('term'), $this->_getParam('limit'), $this->_getParam('uf',0)));

	}

}
