<?php

class Users_Form_Edit extends Zend_Form
{
	public function init()
	{
		$this->addElement('checkbox', 'published', array(
			'required' => true,
			'label' => 'Разрешен'
		));
		
		$this->addElement('text', 'email', array(
			'required' => true,
			'label' => 'Эл почта',
			'validators' => array('emailAddress')
		));
		
		
	}
}