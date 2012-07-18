<?php

class Contents_DirectionsController extends Zend_Controller_Action
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
		
		$context->initContext('json');
	}
	
	/**
	 * Обработчик страницы "список всех Кафедр"
	 */
	public function indexAction()
    {
    	
    }
    /**
    * Обработчик страницы "Кафедра"
    */
    public function viewAction()
    {
   // 	"directions/:direction_name" 
    	
    }
    /**
    * Обработчик страницы "История Кафедры"
    */
    public function historyAction()
    {
    //	"directions/:direction_name/history"
    	 
    }
    /**
    * Обработчик страницы "Дисцеплины Кафедры"
    */
    public function disciplinesAction()
    {
    //	"directions/:direction_name/disciplines"
    	 
    }
    /**
    * Обработчик страницы "Отдельная дисцеплина Кафедры"
    */
    public function disciplineAction()
    {
     //   	"directions/:direction_name/disciplines/:discipline_name"
        	 
    }
    /**
    * Обработчик страницы "Сотрудники Кафедры"
    */
    public function staffAction()
    {
    	//   	"directions/:direction_name/disciplines/:discipline_name"
    
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
