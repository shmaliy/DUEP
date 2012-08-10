<?php

class Contents_StructureUniversityController extends Zend_Controller_Action
{	
	/**
	 * Prepare controller for work with ajax based requests
	 * 
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
    protected $_lang;
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

		
		$context->initContext('json');
		$this->_lang = Zend_Registry::get('lang');
	}
	
	/**
	 * Обработчик страницы "Струтура Университета"
	 */
	public function indexAction()
    {

        $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->agroup = $groupsMapper->getFrontGroupByAlias ("announcements");
        $this->view->ngroup = $groupsMapper->getFrontGroupByAlias ("news");
        $this->view->egroup = $groupsMapper->getFrontGroupByAlias ("events");
        $this->view->group = $groupsMapper->getFrontGroup();
        
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id, $this->_lang);
        $this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id, $this->_lang);
        $this->view->ecats = $catMapper->getFrontCatsByGroupId($this->view->egroup->id, $this->_lang);
        $this->view->cats = $catMapper->getFrontCats();
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->events = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc');
        $this->view->announcements = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc');
        $this->view->news = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id, $this->_lang, 'date_created desc');
        $this->view->actual = $contentsMapper->getFrontContentsByGroupId(array ($this->view->egroup->id, $this->view->agroup->id, $this->view->ngroup->id), $this->_lang,'date_created desc',5);
         
        
        $translatedMonths = array(
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
        );
         
        $this->view->announcements->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->events->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->news->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->actual->formatDate('date_created', $translatedMonths, 'г.');
        
    	
    }
   
    /**
     * ЭТОТ МЕТОД СОЗДАН ДЛЯ НАДИ ЧТОБ ОНА МОГЛА ВЕРСТАТЬ ПРИМЕНИТЕЛЬНО К САЙТУ - НЕ УДАЛЯТЬ
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
