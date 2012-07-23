<?php

class Media_Form_MediaCreate extends Zend_Form
{
	protected $_uploadUrl;
	
	public function setUploadUrl($uploadUrl)
	{
		$this->_uploadUrl = $uploadUrl;
	}

	public function init()
	{
		$this->setName(strtolower(get_class($this)));
		$this->setMethod(self::METHOD_POST);
		$this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');         // Force send only with ajax
		
		$group1 = array('media_upload');
		$this->addElement('button', 'media_upload', array(
			'value' => 'Выбрать',
			'label' => 'Файл',
			'class' => 'swfupload-button',
			'upload_url' => $this->_uploadUrl,
		));		
		
		$this->addDisplayGroup($group1, 'group1');
		
		// Decorators
		$this->addElementPrefixPath('Sunny_Form_Decorator', 'Sunny/Form/Decorator/', 'decorator');
		$this->setElementDecorators(array('CompositeElementDiv'));
		
		$this->addDisplayGroupPrefixPath('Sunny_Form_Decorator', 'Sunny/Form/Decorator/', 'decorator');
		$this->setDisplayGroupDecorators(array('CompositeGroupDiv'));
		
		$this->addPrefixPath('Sunny_Form_Decorator', 'Sunny/Form/Decorator/', 'decorator');
		$this->setDecorators(array('CompositeFormDiv'));
	}
}