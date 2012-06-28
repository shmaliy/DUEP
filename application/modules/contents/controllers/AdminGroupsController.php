<?php 
class Contents_AdminGroupsController extends Sunny_Controller_Action
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
		$context->addActionContext('set-filter', 'json');
		$context->initContext('json');
	}
	
	public function indexAction()
	{
		$request = $this->getRequest();
		
		$session = $this->getSession();
		$this->view->page   = $session->{self::SESSION_PAGE};
		$this->view->rows   = $session->{self::SESSION_ROWS};
		 
		$this->view->rowset = $this->_getMapper()->fetchPage();
		$this->view->total  = $this->_getMapper()->fetchCount();
		
		$this->_helper->arrayTrans();
	}
	
	public function deleteAction()
	{
		$request = $this->getRequest();
		$mapper  = $this->_getMapper();
		$entity  = $mapper->findEntity($request->getParam('id'));
		$mapper->deleteEntity($entity);
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