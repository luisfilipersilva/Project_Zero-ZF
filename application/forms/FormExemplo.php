<?php
class Application_Form_FormExemplo extends Zend_Form
{
	public $elementDecorators = array(
			    'ViewHelper',
			    'Errors',
			    'Label');

    public $elementDecoratorsBR = array(
			    'ViewHelper',
			    'Errors', array(array('data' => 'HtmlTag'), array('tag' => 'br')),
			    'Label');

    public $buttonDecorators = array(
        		'ViewHelper');
	
	
	public function equipamento($listaPais){
		
		$hdnPais = new Zend_Form_Element_Hidden('hdnPais');
        $hdnPais->setValue('1')
        		->removeDecorator("label");
        
        $hdnUF = new Zend_Form_Element_Hidden('hdnUF');
		$hdnUF->removeDecorator("label");
		
        $hdnLocalidade = new Zend_Form_Element_Hidden('hdnLocalidade');
        $hdnLocalidade->removeDecorator("label");
        
        $hdnEstacao = new Zend_Form_Element_Hidden('hdnEstacao');
        $hdnEstacao->removeDecorator("label");

        $hdnEquipamento = new Zend_Form_Element_Hidden('hdnEquipamento');
        $hdnEquipamento->removeDecorator("label");

        $hdnContadorEquip = new Zend_Form_Element_Hidden('hdnContadorEquip');
        $hdnContadorEquip->removeDecorator("label")
        		->setValue("0"); 
        
        $hdnExcluiEquip = new Zend_Form_Element_Hidden('hdnExcluiEquipamento');
        $hdnExcluiEquip->removeDecorator("label");
        
/**
 * 
 * Enter description here ...
 * Os tipos possiveis de Equipamentos a serem inseridos em um JM são 1 - ADSL e 3 - Outros
 * Obs.: a opção Outros não pode ser menos que 3.
 */		
		
		$slcPais = new Zend_Form_Element_Select('slcPais');
		$slcPais->setLabel('Pais:')
				->setDecorators($this->elementDecoratorsBR)
				->setMultiOptions(array('0'	=> 'Selecione'))
				->addMultiOptions($listaPais)
				->setRequired(true);
		
		$slcUF = new Zend_Form_Element_Select('slcUF');
		$slcUF->setLabel('UF:')
					->setDecorators($this->elementDecoratorsBR)
					->setMultiOptions(array('0'	=> 'Selecione'))
					->setRequired(true);
				
		$txtLocalidade = new Zend_Form_Element_Text('txtLocalidade');
		$txtLocalidade->setLabel('Localidade:')
					->setDecorators($this->elementDecoratorsBR)
					->setRequired(true)
					->setAttrib('size', 40);
					
		$txtEstacao = new Zend_Form_Element_Text('$txtEstacao');
		$txtEstacao->setLabel('Estação:')
					->setDecorators($this->elementDecoratorsBR)
					->setRequired(true)
					->setAttrib('size', 40);
					
		$slcEquipamento = new Zend_Form_Element_Select('slcEquipamento');
		$slcEquipamento->setLabel('Equipamento:')
					->setDecorators($this->elementDecoratorsBR)
					->setMultiOptions(array('0'	=> 'Selecione'));

		$txtEquipamento = new Zend_Form_Element_Text('txtEquipamento');
		$txtEquipamento->setLabel('Equipamento:')
					->setDecorators($this->elementDecoratorsBR)
					->setAttrib('size', 91);
					
		$btnAddEquipamento = new Zend_Form_Element_Button('addEquipamento');
		$btnAddEquipamento->setLabel('Cadastrar Equipamento')
					->setDecorators($this->elementDecoratorsBR)
					->setAttribs(array('class' => 'bot1'));
        
        $this->addElements( array(
        		$hdnPais,
        		$hdnUF,
        		$hdnLocalidade,
        		$hdnEstacao,
        		$hdnEquipamento,
        		$hdnContadorEquip,
        		$hdnExcluiEquip,
        		$slcPais,
        		$slcUF,
        		$txtLocalidade,
        		$txtEstacao,
        		$slcEquipamento,
        		$txtEquipamento,
        		$btnAddEquipamento
        ));
		
		$this->setDecorators(array(array('viewScript', array('viewScript' => '/form/formEquipamento.phtml'))));
		
		return $this;
	}
	
}
