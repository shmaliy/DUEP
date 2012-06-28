<?php

class Media_Form_MediaEdit extends Zend_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$this->addElement('hidden', 'id');
		$this->addElement('hidden', 'name');		
		$this->addElement('hidden', 'server_path');
		$this->addElement('hidden', 'type');
		$this->addElement('hidden', 'thumbnail');
		$this->addElement('hidden', 'date_created');
		$this->addElement('hidden', 'date_modified');
		
		$group1 = array('media_categories_id');
		$this->addElement('select', 'media_categories_id', array(
			'label' => 'Родитель'
		));		
		
		$group1[] = 'public_path';
		$this->addElement('text', 'public_path', array(
			'label' => 'Урл'
		));
		
		$group1[] = 'title';
		$this->addElement('text', 'title', array(
			'label' => 'Название'
		));		
		
		$group1[] = 'description';
		$this->addElement('textarea', 'description', array(
			'label' => 'Описание',
			'rows' => 10
		));
		
		$group1[] = 'keywords';
		$this->addElement('textarea', 'keywords', array(
			'label' => 'Ключевые слова',
			'rows' => 3
		));
		
		$group1[] = 'admin_comment';
		$this->addElement('textarea', 'admin_comment', array(
			'label' => 'Комментарий администратора',
			'rows' => 3
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