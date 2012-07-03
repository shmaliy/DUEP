<?php

class Contents_Form_CategoryEdit extends Contents_Form_Abstract
{
	protected $_contentsGroupsId;
	
	public function setContentsGroupsId($id)
	{
		$this->_contentsGroupsId = $id;
	}
	
	public function init()
	{
		$this->setName(strtolower(contents));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		// New
		$this->addElement('hidden', 'id');
		$this->addElement('hidden', 'contents_groups_id', array('value' => $this->_contentsGroupsId));
		
		
		
		/*  Main  */
		$main = array('contents_categories_id');
		
		$this->addElement('select', 'contents_categories_id', array(
			'label' => 'Родитель', 
			'multiOptions' => $this->getContentsCategoriesOptions()
		));		
		
		
		$main[] = 'title';
		$this->addElement('text', 'title', array(
			'label' => 'Заголовок'
		));
		
		$main[] = 'alias';
		$this->addElement('text', 'alias', array(
			'label' => 'Псевдоним (ЧПУ)'
		));
		
		$main[] = 'description';
		$this->addElement('textarea', 'description', array(
			'label' => 'Описание'
		));
		
		$this->addDisplayGroup($main, 'main');
		
		
		/*  SEO  */		
		$seo = array('seo_title');
		
		$this->addElement('text', 'seo_title', array(
			'label' => 'Заголовок (SEO)'
		));
		
		$seo[] = 'seo_description';
		$this->addElement('textarea', 'seo_description', array(
			'label' => 'SEO описание'
		));
		
		$seo[] = 'seo_keywords';
		$this->addElement('textarea', 'seo_keywords', array(
			'label' => 'SEO ключевые слова'
		));
				
		$this->addDisplayGroup($seo, 'seo');
		
		
		
		/*  System  */
		
		$system = array('name_bc');
		
		$group1[] = 'name_bc';
		$this->addElement('text', 'name_bc', array(
			'label' => 'Название для хлебных крошек'
		));
		
		$system[] = 'enable_comments';
		$this->addElement('checkbox', 'enable_comments', array(
			'label' => 'Разрешить комментирование'
		));
		
		$system[] = 'published';
		$this->addElement('checkbox', 'published', array(
			'label' => 'Опубликовать'
		));

		$this->addDisplayGroup($system, 'system');
		
		
		/*  Feeds  */
		$feeds = array('feeds');
		
		$feeds[] = 'enable_rss';
		$this->addElement('checkbox', 'enable_rss', array(
			'label' => 'Включать в RSS ленту'
		));
		
		$feeds[] = 'enable_email';
		$this->addElement('checkbox', 'enable_email', array(
			'label' => 'Включать в email рассылку'
		));
		
		$this->addDisplayGroup($feeds, 'feeds');
		
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