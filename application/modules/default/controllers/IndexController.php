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
		$context->addActionContext('config', 'json');
		$context->addActionContext('front-announcements', 'json');
		$context->addActionContext('front-news', 'json');
		
		$context->initContext('json');
    	//var_export($this->getRequest()->getParams());
    	//var_export(getenv('REQUEST_URI'));
	}
	
	/**
	 * Main page controller
	 * Generate questions form and procces it if ajax requested
	 */
	public function indexAction()
    {
    	$groupsMapper = new Contents_Model_Mapper_ContentsGroups();
    	$this->view->agroup = $groupsMapper->getFrontGroupByAlias ("announcements");
    	$this->view->ngroup = $groupsMapper->getFrontGroupByAlias ("news");
    	
    	$catMapper = new Contents_Model_Mapper_ContentsCategories();
    	$this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id);
    	$this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id);
    	
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->announcements = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id,'date_created desc',6);
    	$this->view->news = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id,'date_created desc',6);
    	
    	$translatedMonths = array(
	    	1 => 'Январь',
	    	2 => 'Февраль',
	    	3 => 'Март',
	    	4 => 'Апрель',
	    	5 => 'Май',
	    	6 => '�?юнь',
	    	7 => '�?юль',
	    	8 => 'Август',
	    	9 => 'Сентябрь',
	    	10 => 'Октябрь',
	    	11 => 'Ноябрь',
	    	12 => 'Декабрь'
    	);
    	
    	$this->view->announcements->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->news->formatDate('date_created', $translatedMonths, 'г.');
    }
    
    /**
     * ЭТОТ МЕТОД СОЗДАН ДЛЯ НАД�? ЧТОБ ОНА МОГЛА ВЕРСТАТЬ ПР�?МЕН�?ТЕЛЬНО К САЙТУ - НЕ УДАЛЯТЬ
     */
    public function developAction()
    {
    	
    }
	
    /**
     * Config page
     */
	public function configAction()
    {
		$this->_helper->layout->setLayout('admin-layout');
    	$request = $this->getRequest();
    	$formAdminConfig = new Application_Form_AdminConfig();
    	$adminConfig = new Application_Model_AdminConfig();
    	
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
    		$this->view->formAdminConfig = $formAdminConfig->setDefaults($config);
    	}
    }
    
    public function usersAction()
    {
    	
    }
    public function frontAnnouncementsAction()
    {
    	$ans_id = $this->getRequest()->getParam('ans_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($ans_id,'date_created desc',6)->toArray();
    }
    public function frontNewsAction()
    {
    	$news_id = $this->getRequest()->getParam('news_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($news_id,'date_created desc',6)->toArray();
    }
    
}
