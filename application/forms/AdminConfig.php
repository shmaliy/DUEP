<?php

class Application_Form_AdminConfig extends Zend_Form
{
	public function init()
	{
		$this->setAction('/');
		
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax'); // Force send only with ajax
		
		$this->addElement('text', 'host', array(
			'required' => true,
			'label' => 'Хост'
		));
		
		$this->addElement('text', 'username', array(
			'required' => true,
			'label' => 'Пользователь'
		));
		
		$this->addElement('text', 'password', array(
			'required' => true,
			'label' => 'Пароль'
		));
		
		$this->addElement('text', 'dbname', array(
			'required' => true,
			'label' => 'Имя базы'
		));
		
		$this->addElement('text', 'encoding', array(
			'required' => true,
			'label' => 'Кодировка'
		));

		$this->addDisplayGroup(
			array('host', 'username', 'password', 'dbname', 'encoding'),
			'databaseOptions',
			array('legend' => 'Настройки подключения к базе данных')
		);
		
		$this->addElement('text', 'users_login', array(
			'required' => true,
			'label' => 'Логин администратора'
		));
		
		$this->addElement('text', 'users_password', array(
			'required' => true,
			'label' => 'Пароль администратора'
		));
		
		$this->addElement('text', 'users_email', array(
			'required' => true,
			'label' => 'E-mail администратора'
		));
		
		$this->addDisplayGroup(
			array('users_login', 'users_password', 'users_email'),
			'adminOptions',
			array('legend' => 'Настройки подключения к базе данных')
		);		
		
		$this->addElement('text', 'title', array(
			'required' => true,
			'label' => ''
		));
		
		$this->addDisplayGroup(
			array('title'),
			'siteOptions',
			array('legend' => 'Заголовок сайта')
		);		
		
		$this->addElement('submit', 'submit', array(
			'label' => 'Сохранить'
		));
	}
}