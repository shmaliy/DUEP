<?php

class IndexController extends Zend_Controller_Action
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
		$context->addActionContext('front-announcements', 'json');
		$context->addActionContext('front-news', 'json');
		$context->addActionContext('front-announcements-all', 'json');
		$context->addActionContext('front-news-all', 'json');
		
		$context->initContext('json');
    	//var_export($this->getRequest()->getParams());
    	//var_export(getenv('REQUEST_URI'));
		$this->_lang = Zend_Registry::get('lang');
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
    	$this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id, $this->_lang);
    	$this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id, $this->_lang);
    	
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->announcements = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc',6);
    	$this->view->news = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id, $this->_lang,'date_created desc',6);
    	
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
    	$this->view->news->formatDate('date_created', $translatedMonths, 'г.');
    }
    
    /**
    * Обработчик статических страниц
    */
    public function staticAction()
    {
    	
    }
    /**
    * Обработчик результатов поиска
    */
    public function searchAction()
    {
        
    }
    
    /**
     * ЭТОТ МЕТОД СОЗДАН ДЛЯ НАД�? ЧТОБ ОНА МОГЛА ВЕРСТАТЬ ПР�?МЕН�?ТЕЛЬНО К САЙТУ - НЕ УДАЛЯТЬ
     */
    public function developAction()
    {
    	
    }
	
    public function usersAction()
    {
    	
    }
    public function frontAnnouncementsAction()
    {
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
        
    	$ans_id = $this->getRequest()->getParam('ans_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($ans_id, $this->_lang,'date_created desc',6);
    	$this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->contents = $this->view->contents->toArray();
    	
    }
    public function frontNewsAction()
    {
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

    	$news_id = $this->getRequest()->getParam('news_id');
    	$contentsMapper = new Contents_Model_Mapper_Contents();
    	$this->view->contents = $contentsMapper->getFrontContentsByCatId($news_id, $this->_lang,'date_created desc',6);
    	$this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
    	$this->view->contents = $this->view->contents->toArray();
    }

    public function frontAnnouncementsAllAction()
    {
        $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->agroup = $groupsMapper->getFrontGroupByAlias ("announcements");
         
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->acats = $catMapper->getFrontCatsByGroupId($this->view->agroup->id, $this->_lang);
         
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->contents = $contentsMapper->getFrontContentsByGroupId($this->view->agroup->id, $this->_lang,'date_created desc',6);
         
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
         
        $this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->contents = $this->view->contents->toArray();

    }
    public function frontNewsAllAction()
    {
    
               $groupsMapper = new Contents_Model_Mapper_ContentsGroups();
        $this->view->ngroup = $groupsMapper->getFrontGroupByAlias ("news");
         
        $catMapper = new Contents_Model_Mapper_ContentsCategories();
        $this->view->ncats = $catMapper->getFrontCatsByGroupId($this->view->ngroup->id, $this->_lang);
         
        $contentsMapper = new Contents_Model_Mapper_Contents();
        $this->view->contents = $contentsMapper->getFrontContentsByGroupId($this->view->ngroup->id, $this->_lang,'date_created desc',6);
         
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
         
        $this->view->contents->formatDate('date_created', $translatedMonths, 'г.');
        $this->view->contents = $this->view->contents->toArray();
    }

    
}
