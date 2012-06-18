<?php

class Staff_AdminIndexController extends Sunny_Controller_Action
{	
	public function init()
	{
		parent::init();
		
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');		
		$context->addActionContext('edit', 'json');		
		$context->addActionContext('delete', 'json');		
		$context->addActionContext('set-limit', 'json');		
		$context->addActionContext('set-page', 'json');		
		$context->addActionContext('set-filter', 'json');		
		$context->initContext('json');
	}
	
	public function indexAction()
    {
    	// Get request
    	$request = $this->getRequest();
    	 
    	$session = $this->getSession();
    	$this->view->page   = $session->{self::SESSION_PAGE};
    	$this->view->rows   = $session->{self::SESSION_ROWS};
    }
    
    public function editAction()
    {
    	
    }
    
    public function deleteAction()
    {
    	$request = $this->getRequest();
    	
    }
    
    public function setPageAction()
    {
    	$session = $this->getSession();
    	$page    = $this->getRequest()->getParam(self::SESSION_PAGE, 1);
    	$session->{self::SESSION_PAGE} = $page;
    }
    
    public function setLimitAction()
    {
    	$session = $this->getSession();
    	$rows    = $this->getRequest()->getParam(self::SESSION_ROWS, 20);
    	$session->{self::SESSION_PAGE} = 1;
    	$session->{self::SESSION_ROWS} = $rows;
    }
    
    public function setFilterAction()
    {
    	$session = $this->getSession();
    	$filter  = $this->getRequest()->getParam(self::SESSION_ROWS, array());
    	$session->{self::SESSION_PAGE} = 1;
    	$session->{self::SESSION_ROWS} = $filter;
    }
}
