<?php 
class Contents_AdminGroupsController extends Sunny_Controller_AdminAction
{	
	protected $_mapperName = 'Contents_Model_Mapper_ContentsGroups';
	
	public function init()
	{
		$this->_helper->layout->setLayout('admin-layout');
		parent::init();
	
		// Add actions wich can work with ajax
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('index', 'json');
		$context->addActionContext('edit', 'json');
		$context->addActionContext('delete', 'json');
		$context->addActionContext('set-limit', 'json');
		$context->addActionContext('set-page', 'json');
		$context->initContext('json');
	}
	
	public function indexAction()
	{
    	// VERSION 14.07.2012
    	$this->view->page  = $this->_getSessionPage();
    	$this->view->rows  = $this->_getSessionRows();
    	
		$this->view->rowset = $this->_getMapper()->fetchPage(
    		null,
    		null,
    		$this->view->rows,
    		$this->view->page
		);
		$this->view->total  = $this->_getMapper()->fetchCount();
	}
    
    public function editAction()
    {
		// Version 14.07.1012
		$this->_helper->flashMessenger->addMessage('<div class="notification-error">Group editing not allowed</div>');
		$this->_gotoUrl('index', $this->_c, $this->_m);
    }
	
	public function deleteAction()
	{
		// Version 14.07.1012
		$this->_helper->flashMessenger->addMessage('<div class="notification-error">Group deleting not allowed</div>');
		$this->_gotoUrl('index', $this->_c, $this->_m);
	}
	
	public function setPageAction()
	{
    	// Version 14.07.2012
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_PAGE);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set page</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m);
		}
		
		$this->_setSessionPage($param);
		$this->_gotoUrl('index', $this->_c, $this->_m);
	}
	
	public function setLimitAction()
	{
    	// Version 14.07.2012
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_ROWS);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set rows</div>');
			$this->_gotoUrl('index', $this->_c, $this->_m);
		}
		
    	$this->_setSessionPage(1);		
    	$this->_setSessionRows($param);
		$this->_gotoUrl('index', $this->_c, $this->_m);
	}
}