<?php

class Contents_AdminIndexController extends Sunny_Controller_Action
{	
	protected $_mapperName = 'Contents_Model_Mapper_Contents';
	
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
    	
    	 
    	$session = $this->getSession();
    	$this->view->page   = $session->{self::SESSION_PAGE};
    	$this->view->group = $params['group'];
    	$this->view->rows   = $session->{self::SESSION_ROWS};
    	
    	$this->view->rowset = $this->_getMapper()->fetchPage();
    	$this->view->total  = $this->_getMapper()->fetchCount();
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
    
	
	/**
	 * 
	 * Генерирует форму по признаку $params["group"] и сохраняет в базе
	 */
    public function editAction()
    {
    	$request = $this->getRequest();
		$params = $request->getParams();

		//echo $this->_helper->arrayTrans($params);
		//echo ucfirst($params['group']);
		
		$mapper  = $this->_getMapper();
		$categoriesMapper = new Contents_Model_Mapper_ContentsCategories();
		$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
		
		$formName = 'Contents_Form_' . ucfirst($params["group"]) . 'Edit'; 
		$form  = new $formName();
		
		$form->setAction($this->_helper->url->simple('edit', $this->_c, $this->_m, array('group' => $params['group'])));
		$group = $groupsMapper->fetchRow(array('alias = ?' => $params["group"]));
		$categories = $categoriesMapper->fetchTree(array('contents_groups_id = ?' => $group->id));
		//echo $this->_helper->arrayTrans($categories);
		//echo $this->_helper->arrayTrans(categoriesBuilder($categories));
			
		$form->contents_categories_id->setMultiOptions($this->categoriesBuilder($categories));
		
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			$this->view->clearVars();
			
			if ($form->isValid($request->getParams())) {
				// Save data
				$entity = $mapper->createEntity($form->getValues());
				$mapper->saveEntity($entity);
				 
				if (!$request->isXmlHttpRequest()) {
					$this->_helper->redirector->gotoSimple('index', $this->_c, $this->_m, array("group" => $params["group"]));
				} else {
					$this->view->redirectTo = $this->view->simpleUrl('index', $this->_c, $this->_m, array("group" => $params["group"]));
				}
			} else {
				$this->view->formErrors        = $form->getErrors();
				$this->view->formErrorMessages = $form->getErrorMessages();
			}
		} else {
			$id = $request->getParam('id', 'new');
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
