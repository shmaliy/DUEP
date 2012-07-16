<?php

class Users_Form_AdminIndexFilter extends Sunny_Form
{
	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax

		$this->addElement('select', 'users_groups_id', array(
			'label' => 'Группа',
			'onchange' => '$(this).parents("form").submit();'
		));
	}
}