<?php

class AdminIndexController extends Sunny_Controller_AdminAction
{
	/**
	 * Prepare controller to work with ajax
	 * 
	 * (non-PHPdoc)
	 * @see Sunny_Controller_Action::init()
	 */
	public function init()
	{
		$this->_helper->layout->setLayout('admin-layout');
		parent::init();
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('config', 'json');		
		$context->initContext('json');
	}
	
	/**
	 * Administration main page
	 */
	public function indexAction()
	{
		
	}
    
    /**
     * Config page
     */
	public function configAction()
    {
		$request = $this->getRequest();
    	$formAdminConfig = new Default_Form_ConfigEdit();
    	$adminConfig = new Default_Model_Config();
    	
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($formAdminConfig->isValid($request->getParams())) {
    			$adminConfig->save($formAdminConfig->getValues());
    			$this->view->error = $formAdminConfig->getValues();
    		} else {
    			$this->view->error = $formAdminConfig->getErrors();
    		}
    	} else {
    		$config = $adminConfig->load();
    		unset($config['demo']); // forse demo off after sucess config
    		$this->view->form = $formAdminConfig->setDefaults($config);
    	}
    }
}