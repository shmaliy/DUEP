<?php

class IndexController extends Zend_Controller_Action
{	
	/**
	 * Prepare controller for work with ajax based requests
	 * 
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init()
	{
		$request = $this->getRequest();
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			// Both html or json ajax responses need to disable layout
        	$this->_helper->layout()->disableLayout();			
		}
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');
		
		$context->initContext('json');
	}
	
	/**
	 * Main page controller
	 * Generate questions form and procces it if ajax requested
	 */
	public function indexAction()
    {
    	//$db = Zend_Db_Table_Abstract::getDefaultAdapter();
    	
    	//$select = $db->select();
    	//$select->from('cms_content', array("id","title","title_alias","created"));
    	
    	//$this->view->rowset = $db->fetchAll($select);
    	$this->view->formAdminConfig = $formAdminConfig;
    }
}
