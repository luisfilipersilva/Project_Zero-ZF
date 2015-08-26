<?
class ControleAcl extends Zend_Acl {
	public function __construct($user)
    {
        //recursos
        $this->add(new Zend_Acl_Resource('arquivo'));
        $this->add(new Zend_Acl_Resource('slideshow'));
        $this->add(new Zend_Acl_Resource('uploadfile'));
        $this->add(new Zend_Acl_Resource('form'));
        $this->add(new Zend_Acl_Resource('grid'));
        $this->add(new Zend_Acl_Resource('clienteafetado'));
        $this->add(new Zend_Acl_Resource('codigoencerramento'));
        $this->add(new Zend_Acl_Resource('comunicado'));
        $this->add(new Zend_Acl_Resource('destinatariolista'));
        $this->add(new Zend_Acl_Resource('equipamento'));
        $this->add(new Zend_Acl_Resource('error'));
        $this->add(new Zend_Acl_Resource('index'));

        // regras
        $this->addRole(new Zend_Acl_Role('1'));
        $this->addRole(new Zend_Acl_Role('4'));

		$this->allow('1','index');
        $this->allow('1','error');
        $this->allow('1','slideshow');
        $this->allow('1','uploadfile');
        $this->allow('1','form');
        $this->allow('1','grid');

        $this->allow('4','index');
        $this->allow('4','error');
		$this->allow('4','slideshow');
		$this->allow('4','uploadfile');
		$this->allow('4','form');
		$this->allow('4','grid');
    }
}