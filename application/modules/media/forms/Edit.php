<?php

class Media_Form_Edit
{
	public function init()
	{
		//родитель
		$this->addElement('select', 'media_categories_id', array(
			'label' => 'Родитель'
		));
		
		$this->addElement('text', 'title', array(
			'label' => 'Название'
		));
		
		$this->addElement('text', 'menu_title', array(
			'label' => 'Название для меню'
		));
		
		$this->addElement('text', 'cookie_name', array(
			'label' => 'Название для хлебных крошек'
		));
		
		$this->addElement('text', 'ordering', array(
			'label' => 'Название для хлебных крошек'
		));
		
		$this->addElement('text', 'keywords', array(
			'label' => 'Ключевые слова'
		));
	}
}