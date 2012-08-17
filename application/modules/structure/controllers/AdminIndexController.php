<?php

class Structure_AdminIndexController extends Sunny_Controller_AdminAction
{	
	protected $_mapperName = 'Structure_Model_Mapper_Structure';
	
	protected $_filters = array('structure_id' => 0);
	
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
    	// VERSION 14.07.2012
		/*if (false === ($group = $this->_checkGroup())) {
			return;
		}*/
    	
    	$structureMapper = new Structure_Model_Mapper_Structure();
    	$form = new Structure_Form_AdminIndexFilter();	
    	
    	
		$filter            = $this->_getSessionFilter(null);
    	$this->view->page  = $this->_getSessionPage($group->alias);
    	$this->view->rows  = $this->_getSessionRows($group->alias);
		$this->view->group = $group;
		
		$where = array(
			'structure_id = ?'     => $filter
		);
		
    	$this->view->rowset = $this->_getMapper()->fetchPage(
    		$where,
    		null,
    		$this->view->rows,
    		$this->view->page
		);
		$this->view->total  = $this->_getMapper()->fetchCount($where);
		
		$collection = $structureMapper->fetchTree(
			array(),
			array('id', 'title', 'structure_id')
		);
		
		
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));
		$form->getElement('structure_id')->setMultiOptions($options);

		$form->setDefaults($filter);
		$form->setAction($this->view->simpleUrl('set-filter', $this->_c, $this->_m, array('group' => $group->alias)));
		$this->view->filter = $form;
    }
    
	/**
	 * Генерирует форму по признаку $params["group"] и сохраняет в базе
	 */
    public function editAction()
    {
		//Getting request
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$id = $request->getParam('id');
    	
    	$form = new Structure_Form_StructureElementEdit();
    	
    	$structureMapper = new Structure_Model_Mapper_Structure();
		$languagesMapper = new Contents_Model_Mapper_Languages();
		
		// Alias of default language
    	$defaultLanguage = $languagesMapper->getDefaultLanguage();
    	$languages = $languagesMapper->fetchAll(
    		array('published = 1'),
    		array('ordering')
    	);
    	$languages = $form->createAssocMultioptions($languages, array());
    	$form->getElement('languages_alias')->setMultiOptions($languages);
    	
    	
    	// MultiGallery
    	$parentMenuItem = $structureMapper->fetchTree(
    		array(),
    		array('id', 'title', 'structure_id')
    	);
    	
    	$parentMenuItemList = $form->collectionToMultiOptions($parentMenuItem, array(), array('Нет'));
    	$form->getElement('structure_id')->setMultiOptions($parentMenuItemList);
    	
    	$form->setAction($this->view->simpleUrl('edit', $this->_c, $this->_m));
    	
		
    	if ($request->isXmlHttpRequest() || $request->isPost()) {
    		if ($form->isValid($request->getParams())) {
    			$values = $form->getValues();
    			$values['date_created'] = time(); 
    			
    			
    			
    			$entity = $this->_getMapper()->createEntity($values);
    			$id = $this->_getMapper()->saveEntity($entity);
    			$entity->setId($id);
    			
    			$this->_makeResponderStructure('index', null, null, array());
    			
    			//$this->_gotoUrl('index', $this->_c, $this->_m);
    		} else {
    			$this->view->formErrors        = $form->getErrors();
    			$this->view->formErrorMessages = $form->getErrorMessages();
			}
		} else {
			$entity = $this->_getMapper()->findEntity($id);
			if ($id && $entity) {
				$form->setDefaults($entity->toArray());
			}
			$this->view->form = $form;
		} 
	}
    
    public function deleteAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	// Version 14.07.2012
		/*if (false === ($group = $this->_checkGroup(array('group' => $params['group'])))) {
			
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}*/
    	
    	$validator = new Zend_Validate_Int();
    	if (!$validator->isValid($this->getRequest()->getParam('id'))) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error delete item</div>');
			$this->_makeResponderStructure('index', null, null, array(), 'update');
			return;
		}
		
    	$entity = $this->_getMapper()->findEntity($request->getParam('id'));
    	//var_export($entity);
    	//exit;
    	$this->_getMapper()->deleteEntity($entity);
		$this->_helper->flashMessenger->addMessage('<div class="notification-done">Success delete item</div>');
		$this->_makeResponderStructure('index', null, null, array(), 'update');
    }
        
    public function setPageAction()
    {
    	// Version 14.07.2012
		/*if (false === ($group = $this->_checkGroup())) {
			$this->_makeResponderStructure('index', null, null, array('group' => $group->alias), 'update');
			return;
		}*/
    	
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_PAGE);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set page</div>');
			$this->_makeResponderStructure('index', null, null, array(), 'update');
			return;
		}
		
		$this->_setSessionPage($param, $group->alias);
		$this->_makeResponderStructure('index', null, null, array(), 'update');
    }
    
    public function setLimitAction()
    {
    	// Version 14.07.2012
		/*if (false === ($group = $this->_checkGroup())) {
			$this->_makeResponderStructure('index', null, null, array(), 'update');
			return;
		}*/
		
    	$validator = new Zend_Validate_Int();
    	$param = $this->getRequest()->getParam(self::SESSION_ROWS);
		if (!$validator->isValid($param)) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set rows</div>');
			$this->_makeResponderStructure('index', null, null, array(), 'update');
			return;
		}
		
		$this->_setSessionPage(1);		
    	$this->_setSessionRows($param);
		$this->_makeResponderStructure('index', null, null, array(), 'update');
	}
    
    public function setFilterAction()
    {
    	// Version 14.07.2012
		$form = new Structure_Form_AdminIndexFilter();
		$structureMapper = new Structure_Model_Mapper_Structure();
				
		$collection = $structureMapper->fetchTree(
			array(),
			array('id', 'title')
		);
		$options = $form->collectionToMultiOptions($collection, array(), array('Нет'));		
		$form->getElement('structure_id')->setMultiOptions($options);
				
    	if (!$form->isValid($this->getRequest()->getParams())) {
			$this->_helper->flashMessenger->addMessage('<div class="notification-error">Error set filter</div>');
			$this->_makeResponderStructure('index', null, null, array(), 'update');
			return;
		}
		
    	$this->_setSessionPage(1, $group->alias);
    	$this->_setSessionFilter($form->getValues(), null, $group->alias);		
		$this->_makeResponderStructure('index', null, null, array(), 'update');
	}
}
