<?php

class Staff_Form_TeacherEdit extends Zend_Form
{
	/**
	 * Extensions names for filtering result
	 * 
	 * @var array
	 */
	protected $_extensions = array('users', 'media', 'orgstructure');
	
	/**
	 * Get non extensions values
	 * 
	 * @return array values
	 */
	public function getStaffValues()
	{
		$values = $this->getValues();
		$return = array();
		
		foreach ($values as $name => $value) {
			$skip = false;
			foreach ($this->_extensions as $extension) {
				if ($extension == substr($name, 0, strlen($extension))) {
					$skip = true;
				}
			}
			
			if (!$skip) {
				$return[$name] = $value;
			}
		}
		
		return $return;
	}
	
	/**
	 * Get extension values
	 * 
	 * @param  string $extensionName Name of extension
	 * @return array values
	 */
	public function getStaffExtensionValues($extensionName)
	{
		$values = $this->getValues();
		$return = array();
	
		foreach ($values as $name => $value) {
			foreach ($this->_extensions as $extension) {
				if ($extension == substr($name, 0, strlen($extension))) {
					$return[substr($name, strlen($extension)) + 1] = $value;
				}
			}
		}
	
		return $return;
	}
	
	/**
	 * Form constructor
	 */
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		// Add hiddens
		$this->addElement('hidden', 'id');
		$this->addElement('hidden', 'mode', array('value' => 1));
		
		// Group 1
		$group1 = array();
		$group1[] = 'last_name';
		$this->addElement('text', 'last_name', array(
			'required' => true,
			'label' => 'Фамилия'
		));
		
		$group1[] = 'first_name';
		$this->addElement('text', 'first_name', array(
			'required' => true,
			'label' => 'Имя'
		));
		
		$group1[] = 'middle_name';
		$this->addElement('text', 'middle_name', array(
			'required' => true,
			'label' => 'Отчество'
		));
		
		$this->addDisplayGroup($group1, 'group1');
		
		// Group 2
		$group2 = array();
		$group2[] = 'private_phone';
		$this->addElement('text', 'private_phone', array(
			'label' => 'Телефон'
		));
		
		$group2[] = 'interoffice_phone';
		$this->addElement('text', 'interoffice_phone', array(
			'label' => 'Внутренний'
		));

		$group2[] = 'email';
		$this->addElement('text', 'email', array(
			'label' => 'Эл почта',
			'validators' => array('emailAddress')
		));
		
		$this->addDisplayGroup($group2, 'group2');
		
		if (@class_exists('Media_Bootstrap')) {
			// Only if media module exists
			// Group 3
			$group3 = array('media_file_id');
			$this->addElement('button', 'media_file_id', array(
				'label' => 'Фото',
				'value' => 'Выбрать'
			));
			
			$this->addDisplayGroup($group3, 'group3');
		}
		
		if (@class_exists('Orgstructure_Bootstrap')) {
			// Only if organizational structure module exists
			// Group 4
			$group4 = array('orgstructure_podrazdelenie');
			$this->addElement('select', 'orgstructure_podrazdelenie', array('label' => 'Подразделение'));

			$group4[] = 'orgstructure_kafedra';
			$this->addElement('select', 'orgstructure_kafedra', array('label' => 'Кафедра'));		
			
			$this->addDisplayGroup($group4, 'group4');
			
			// Group 5
			$group5 = array('orgstructure_napravlenie');
			$this->addElement('select', 'orgstructure_napravlenie', array('label' => 'Направление'));

			$group5[] = 'orgstructure_v_sostave_kafedri';
			$this->addElement('select', 'orgstructure_v_sostave_kafedri', array('label' => 'В составе кафедры'));
					
			$this->addDisplayGroup($group5, 'group5');
		}
		
		// Group 6
		$group6 = array('description');
		$this->addElement('textarea', 'description', array('label' => 'Текст описания'));		
		
		$group6[] = 'published';
		$this->addElement('checkbox', 'published', array('label' => 'Опубликовать на сайте'));		
		$this->addDisplayGroup($group6, 'group6');
		
		if (@class_exists('Users_Bootstrap')) {
			// Only if users module exists
			// Group 7
			$group7 = array('users_create_user');
			$this->addElement('checkbox', 'users_create_user', array('label' => 'Создать пользователя'));		
			$this->addDisplayGroup($group7, 'group7');
			
			// Group 8
			$group8 = array('user_email');
			$this->addElement('text', 'user_email', array(
				'label' => 'Электронная почта (для логина)',
				'validators' => array('emailAddress')
			));
			
			$group8[] = 'user_password';
			$this->addElement('password', 'user_password', array(
				'label' => 'Пароль'
			));
			
			$this->addDisplayGroup($group8, 'group8');
			
			// Group 9
			$group9 = array('users_role');
			$this->addElement('select', 'users_role', array('label' => 'Роль'));
			
			$group9[] = 'users_homepage';
			$this->addElement('select', 'users_homepage', array(
				'label' => 'Домашняя страница (админ. панель)'
			));
			
			$this->addDisplayGroup($group9, 'group9');
		}
		
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