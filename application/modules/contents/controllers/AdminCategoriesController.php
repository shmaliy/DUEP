<?php

class Contents_AdminCategoriesController extends Sunny_Controller_Action
{	
	protected $_mapperName = 'Contents_Model_Mapper_ContentsCategories';
	
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
    	$params = $request->getParams();
    	$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
    	$group = $groupsMapper->fetchRow(array('alias = ?' => $params["group"]));
    	
    	//echo $this->_helper->arrayTrans($params);
    	 
    	$session = $this->getSession();
    	$this->view->page   = $session->{self::SESSION_PAGE};
    	$this->view->rows   = $session->{self::SESSION_ROWS};
    	
    	$this->view->rowset = $this->_getMapper()->fetchAll(array('contents_groups_id = ?' => $group->id));
    	$this->view->group = $params['group'];
    	$this->view->total  = $this->_getMapper()->fetchCount();

    	//echo $this->_helper->arrayTrans($this->view->rowset);
    }
    
    public function categoriesBuilder($data, $array = array(), $level = 0)
    {
    	foreach ($data as $branch) {
    		if($level > 0) {
    			$branch->title = str_repeat('—', $level) . $branch->title;
    		}
    
    		$array[$branch->id] = $branch->title;
    		if($branch->getExtendChilds()->count() > 0) {
    			$array = $this->categoriesBuilder($branch->getExtendChilds(), $array, $level+1);
    		}
    	}
    	return $array;
    }
    
    public function editAction()
    {
    	$request = $this->getRequest();
		$mapper  = $this->_getMapper();
		$params = $request->getParams();
		//echo $this->_helper->arrayTrans($params);
		
		$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
		$group = $groupsMapper->fetchRow(array('alias = ?' => $params["group"]));
		
		
		
		// Setup form valid action
		$form = new Contents_Form_CategoryEdit(array(
			'contentsCategoriesOptions' => $this->_getMapper()->fetchTree(array( 
    			'contents_groups_id = ?' => $group->id
    		)),
			'entityId' => $params['id'],
			'contentsGroupsId' => $group->id
		));
    	$form->setAction($this->_helper->url->simple('edit', $this->_c, $this->_m, array("group" => $params['group'])));
		
    	// Processing _POST
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($form->isValid($request->getParams())) {
    			// Save data
    			$entity = $mapper->createEntity($form->getValues());
    			$mapper->saveEntity($entity);
    			
    			if (!$request->isXmlHttpRequest()) {
    				$this->_helper->redirector->gotoSimple('index', $this->_c, $this->_m, array("group" => $params['group']));
    			} else {
    				$this->view->redirectTo = $this->view->simpleUrl('index', $this->_c, $this->_m, array("group" => $params['group']));
    			}
    		} else {
    			// Return errors
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
    		}
    	} else {
    		// If _GET render form
			$id = $request->getParam('id', 'new');
			//$id = $request->setParam('contents_groups_id', $group->id);
    		if ($id != 'new') {
    			$entity = $mapper->findEntity($id);
    		    if ($entity) {
    				$form->setDefaults($entity->toArray());
    			}
    		}
    		
    		$this->view->form = $form;
    	}
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
