<?php

class Users_Form_UserEdit extends Zend_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$group1 = array('email');		
		$this->addElement('text', 'email', array(
			'required' => true,
			'label' => 'Эл почта',
			'validators' => array('emailAddress')
		));
		
		$group1[] = 'password';
		$this->addElement('password', 'password', array(
			'label' => 'Пароль'
		));
		
		$group1[] = 'password_repeat';
		$this->addElement('password', 'password_repeat', array(
			'label' => 'Повторите пароль:',
			'description' => 'Пароль необходимо вводить только в том случае, если желаете его изменить',
			'validators' => array(
				array('identical', false, array('token' => 'password', 'strict' => false))
			)
		));
		
		$group1[] = 'published';
		$this->addElement('checkbox', 'published', array(
			'required' => true,
			'label' => 'Разрешен'
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