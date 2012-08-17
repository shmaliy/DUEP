<?php

class Structure_Form_AdminIndexFilter extends Sunny_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$this->addElement('select', 'structure_id', array(
			'label' => 'Родитель',
			'onchange' => '$(this).parents("form").submit();'
		));
		
		$this->addElement('submit', 'submit', array(
			'ignore' => true,
			'label' => '',
			'value' => 'Применить фильтр'
		));
	}
}