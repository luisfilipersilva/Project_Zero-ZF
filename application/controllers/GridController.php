<?php

class GridController extends Zend_Controller_Action
{

    public function gridAction()
    {
        try {
        //	$formGrid = new Application_Form_Grid();
        //	$this->view->form = $formGrid->formGridCampos();
        }catch (Zend_Exception $e){
        	throw $e;
        }
    }
    
	public function phpinfoAction()
    {
       
    }

}