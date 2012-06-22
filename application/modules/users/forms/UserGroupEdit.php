<?php

class Users_Form_UserGroupEdit extends Zend_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$group1 = array('users_groups_id');		
		$this->addElement('select', 'users_groups_id', array(
			'required' => true,
			'label' => 'Родитель'
		));
		
		$group1[] = 'title';
		$this->addElement('text', 'title', array(
			'required' => true,
			'label' => 'Название'
		));
		
		$group1[] = 'alias';
		$this->addElement('text', 'alias', array(
			'required' => true,
			'label' => 'Псевдоним'
		));
		
		$group1[] = 'description';
		$this->addElement('textarea', 'description', array(
			'label' => 'Описание',
			'rows' => 10
		));
		
		$group1[] = 'admin_comment';
		$this->addElement('textarea', 'admin_comment', array(
			'label' => 'Описание',
			'rows' => 5
		));		
		
		$group1[] = 'published';
		$this->addElement('checkbox', 'published', array(
			'required' => true,
			'label' => 'Опубликовано'
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