<?php

class Structure_Form_StructureElementEdit extends Sunny_Form
{
	public function init()
	{
		$this->setName(strtolower('contents'));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		/*  Externals  */
		$this->addElement('hidden', 'id');

		
		/*  Main  */
		$main = array('contents_categories_id');
		
		$main[] = 'structure_id';
		$this->addElement('select', 'structure_id', array(
			'label' => 'Родительский пункт меню'
		));
		
		$main[] = 'languages_alias';
		$this->addElement('select', 'languages_alias', array(
			'label' => 'Язык'
		));
		
		$main[] = 'title';
		$this->addElement('text', 'title', array(
			'label' => 'Название',
			'required' => true
		));
		
		$main[] = 'url';
		$this->addElement('text', 'url', array(
			'label' => 'Ссылка'
		));
		
		$this->addDisplayGroup($main, 'main', array('legend' => 'Основная информация'));
		
		
		/*  System  */
		$system = array('system');
		
		$system[] = 'route_name';
		$this->addElement('text', 'route_name', array(
			'label' => 'Имя маршрута'
		));
		
		$system[] = 'params';
		$this->addElement('textarea', 'params', array(
			'label' => 'Параметры к маршруту'
		));
		
		$system[] = 'published';
		$this->addElement('checkbox', 'published', array(
			'label' => 'Опубликовано'
		));
		
		$system[] = 'admin_comment';
		$this->addElement('textarea', 'admin_comment', array(
			'label' => 'Комментарий администратора'
		));
		
		$this->addDisplayGroup($system, 'system', array('legend' => 'Системная информация'));
		
		
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
		
		//$this->getElement('media_id')->setDecorators(array('FileSelectorDiv'));
	}
}