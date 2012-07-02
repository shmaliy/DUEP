<?php

class Contents_Form_AnnouncementsEdit extends Zend_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
				
		//  New
		
		$this->addElement('select', 'contents_categories_id', array(
			'label' => 'Родитель'
		));
		
		
		
		
		
		
		
		
		//  Old
		$this->addElement('hidden', 'id');
		
		$group1 = array('media_categories_id');
		$this->addElement('select', 'media_categories_id', array(
			'label' => 'Родитель'
		));		
		
		$group1[] = 'title';
		$this->addElement('text', 'title', array(
			'label' => 'Заголовок'
		));
		
		$group1[] = 'public_url';
		$this->addElement('text', 'public_url', array(
			'label' => 'Урл'
		));
		
		$group1[] = 'cookie_name';
		$this->addElement('text', 'cookie_name', array(
			'label' => 'Название для хлебных крошек'
		));
		
		$group1[] = 'menu_title';
		$this->addElement('text', 'menu_title', array(
			'label' => 'Название для меню'
		));
		
		$group1[] = 'enable_rss';
		$this->addElement('checkbox', 'enable_rss', array(
			'label' => 'Включить в RSS'
		));
		
		$group1[] = 'enable_email';
		$this->addElement('checkbox', 'enable_email', array(
			'label' => 'Включить в E-mail рассылку'
		));
		
		$group1[] = 'published';
		$this->addElement('checkbox', 'published', array(
			'label' => 'Опубликовать'
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