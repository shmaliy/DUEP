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
		
		$this->addElement('password', 'password', array(
			'label' => 'Пароль'
		));
		
		$this->addElement('password', 'password_repeat', array(
			'label' => 'Повторите пароль:',
			'description' => 'Пароль необходимо вводить только в том случае, если желаете его изменить',
			'validators' => array(
				array('identical', false, array('token' => 'password', 'strict' => false))
			)
		));
		
		$this->addElement('submit', 'submit', array(
			'label' => 'Сохранить'
		));
	}
}