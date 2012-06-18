<?php

class Staff_Form_StudentEdit extends Zend_Form
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
		
		$this->addElement('hidden', 'id');
		$this->addElement('hidden', 'mode', array('value' => 0));
		
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
		
		if (@class_exists('Media_Bootstrap')) {
			// Only if media module exists
			$group1[] = 'media_file_id';
			$this->addElement('button', 'media_file_id', array(
				'label' => 'Фото',
				'value' => 'Выбрать'
			));
		}
		
		if (@class_exists('Orgstructure_Bootstrap')) {
			// Only if organizational structure module exists
			$group1[] = 'orgstructure_group';
			$this->addElement('select', 'orgstructure_group', array(
				'label' => 'Группа'
			));
		}
		
		$group1[] = 'published';
		$this->addElement('checkbox', 'published', array(
			'label' => 'Опубликовать на сайте'
		));		
		
		$this->addDisplayGroup($group1, 'group1');
		
		if (@class_exists('Users_Bootstrap')) {
			// Only if users module exists
			// Group 2
			$group2 = array();
			$group2[] = 'users_create_user';
			$this->addElement('checkbox', 'users_create_user', array(
				'label' => 'Создать пользователя'
			));		
			
			$group2[] = 'users_email';
			$this->addElement('text', 'users_email', array(
				'label' => 'Электронная почта (для логина)',
				'validators' => array('emailAddress')
			));
			
			$group2[] = 'users_password';
			$this->addElement('password', 'users_password', array(
				'label' => 'Пароль'
			));
			
			$group2[] = 'users_role';
			$this->addElement('select', 'users_role', array('label' => 'Роль'));
			
			$this->addDisplayGroup($group2, 'group2');
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