<?php

class Users_Form_UserPermissionEdit extends Zend_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$group1 = array('allow');		
		$this->addElement('radio', 'allow', array(
			'required' => true,
			'label' => 'Разрешено',
			'multiOptions' => array(1 => 'Да', 0 => 'Нет'),
			'value' => 1
		));
		
		$group1[] = 'title';
		$this->addElement('text', 'title', array(
			'required' => true,
			'label' => 'Название'
		));
		
		$this->addDisplayGroup($group1, 'group1');
		
		// Submit
		$this->addElement('submit', 'submit', array(
			'ignore' => true,
			'label' => '',
			'value' => 'Сохранить'
		));
				
		// Decorators
		$this->addElementPrefixPath('Sunny_Form_Decorator', 'Sunny/Form/Decorator/', 'decorator');
		$this->setElementDecorators(array('CompositeElementDiv'));
		
		$this->addDisplayGroupPrefixPath('Sunny_Form_Decorator', 'Sunny/Form/Decorator/', 'decorator');
		$this->setDisplayGroupDecorators(array('CompositeGroupDiv'));
		
		$this->addPrefixPath('Sunny_Form_Decorator', 'Sunny/Form/Decorator/', 'decorator');
		$this->setDecorators(array('CompositeFormDiv'));
	}
}