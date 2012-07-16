<?php

class Media_Form_CategoryEdit extends Sunny_Form
{
	protected $_mediaCategoriesMultiOptions = array();
	
	public function setMediaCategoriesMultiOptions($options, $exclude = array())
	{
		$this->_mediaCategoriesMultiOptions = array(0 => 'Нет');
		
		if ($options instanceof Sunny_DataMapper_CollectionAbstract) {
			$this->_mediaCategoriesMultiOptions = $this->collectionToMultiOptions($options, $exclude, $this->_mediaCategoriesMultiOptions);
		} else if (is_array($options)) {
			$this->_mediaCategoriesMultiOptions = $options;
		}
	}
	
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$this->addElement('hidden', 'id');
		
		$group1 = array('media_categories_id');
		$this->addElement('select', 'media_categories_id', array(
			'label' => 'Родитель',
			'multiOptions' => $this->_mediaCategoriesMultiOptions
		));		
		
		$group1[] = 'title';
		$this->addElement('text', 'title', array(
			'label' => 'Заголовок'
		));
		
		$group1[] = 'public_url';
		$this->addElement('text', 'public_url', array(
			'label' => 'Урл'
		));
		
		$group1[] = 'name_bc';
		$this->addElement('text', 'name_bc', array(
			'label' => 'Название для хлебных крошек'
		));
		
		$group1[] = 'name_menu';
		$this->addElement('text', 'name_menu', array(
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
	}
}