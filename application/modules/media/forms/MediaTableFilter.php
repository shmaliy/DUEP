<?php

class Media_Form_MediaTableFilter extends Sunny_Form
{
	public function init()
	{
		$this->setName('default_form_tablefilter');
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$this->addElement('select', 'media_categories_id', array(
			'label'    => 'Категория',
			'onChange' => "$('#default_form_tablefilter').submit();" 
		));
	}
}