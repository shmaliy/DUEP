<?php

/*
* Bootstrap->__construct()
* Module_Bootstrap->__construct()
* Bootstrap->run()
*/

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	const MULTIDB_REGISTRY_KEY = 'multidb';
	
	/**
	 * Override initialization process for pre module
	 * 
	 * @param Zend_Application|Zend_Application_Bootstrap_Bootstrapper $application
	 */
	public function __construct($application)
    {
    	parent::__construct($application);
    	$this->_preModuleConstruct();
    }
	
    /**
	 * Override initialization process for pre module
	 * 
     * @see Zend_Application_Bootstrap_Bootstrap::run()
     */
	public function run()
    {
    	$this->_postModuleConstruct();
    	parent::run();
    }
    
    /**
     * Pre module initialization process
     */
    protected function _preModuleConstruct()
    {
    	try {
    		$this->_setConfig();
    		$this->_setAutoLoader();
    		$this->_setDatabases();
    		$this->_setRouter();
    		$this->_setPlugins();
    	} catch (Exception $e) {
    		echo $e->getMessage() . '<br /><br />';
    		echo nl2br($e->getTraceAsString());
    		exit();
    	}
    }
    
    /**
     * Store global options registry variable
     */
	protected function _setConfig()
    {
    	Zend_Registry::set('options', $this->getOptions());
    }
    
    /**
     * Setup autoloading framework files
     */
    protected function _setAutoLoader()
	{
		$autoLoader = Zend_Loader_Autoloader::getInstance();		
		$autoLoader->setFallbackAutoloader(true);
	}    
    
    /**
     * Setup database adapter(s)
     */
    protected function _setDatabases()
    {
	   	$options = $this->getOptions();
    	$options = $options['multidb'];
    	
    	$adapters = array();
    	if (!Zend_Registry::isRegistered(self::MULTIDB_REGISTRY_KEY)) {
    		Zend_Registry::set(self::MULTIDB_REGISTRY_KEY, $adapters);
    	}
    	
    	$haveDefault = false;
    	foreach ($options as $adapterName => $params) {
    		$params['params']['options']['adapterName'] = $adapterName;    		
    		$default = (bool) (isset($params['default']) && $params['default']);
    		
    		$params['params']['options']['default'] = $default;
    		$db = Zend_Db::factory($params['adapter'], $params['params']);
    		
    		$haveDefault = (bool) Zend_Db_Table_Abstract::getDefaultAdapter();
    		if ($default && false === $haveDefault) {
    			Zend_Db_Table_Abstract::setDefaultAdapter($db);
    		} else {
    			$params['default'] = false;
    			echo 1;
    		}
    		
    		$adapters[$adapterName] = $db;
    	}
    	
    	Zend_Registry::set(self::MULTIDB_REGISTRY_KEY, $adapters);
    }
    
    /**
     * Adding cutom user plugins for dispatcher process
     */
    protected function _setPlugins()
    {
    	$frontController = Zend_Controller_Front::getInstance();
    	
    	// SWF can't send session id via cookies, use manual set
    	$swfSession = new Sunny_SwfSession();
    	$frontController->registerPlugin($swfSession, -100);
    }
    
    /**
     * Add routes for navigation
     */
    protected function _setRouter()
    {
    	$frontController = Zend_Controller_Front::getInstance();
    	$router = $frontController->getRouter();
    	
    	/* Override default route
    	$router->addRoute('default', $route = new Zend_Controller_Router_Route(
	    	'/',
    		array(
    			'module' => 'default',
    			'controller' => 'index',
    			'action' => 'index'
    		)
    	));
    	*/
    	 
    	
    	$frontController->setRouter($router);
    }
    
    /**
     * Post module initialization process
     */
    protected function _postModuleConstruct()
    {
    	try {
    		$this->_setView();
    		$this->_setFrontControllerBootsrtap();
    	} catch (Exception $e) {
    		echo $e->getMessage() . '<br /><br />';
    		echo nl2br($e->getTraceAsString());
    		exit();
    	}
    }
    
    /**
     * Setup custom layout files suffix
     */
    protected function _setView()
    {
    	$options = $this->getOptions();
        
    	// Add custom view helpers paths
        $view = $this->getResource('view');
        $view->addHelperPath('Sunny/View/Helper', 'Sunny_View_Helper');
	    
        // Set templates suffix
	    $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setViewSuffix($options['resources']['layout']['viewSuffix']);
    }
    
    /**
     * Override setup front controller before run
     */
    protected function _setFrontControllerBootsrtap()
    {
    	$front = $this->getResource('FrontController');
    	$front->setParam('bootstrap', $this);
    }
}

