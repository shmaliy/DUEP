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
    		$this->_setAutoLoader();
    		$this->_setConfig();
    		$this->_setAdminConfig();
    		$this->_setCache();
    		$this->_setDatabases();
    		$this->_setRouter();
    		$this->_setPlugins();
    		$this->_setHelpers();
    		$this->_setTranslate();
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
    
    protected function _setAdminConfig()
    {
    	// Get system options
    	$options = Zend_Registry::get('options');
    	    	
    	// Load admin config
    	require_once APPLICATION_PATH . '/modules/default/models/Config.php';
    	$adminConfig = new Default_Model_Config();
    	$config = $adminConfig->load();
    	
    	// Format options to system config
    	$multidb = array(
    		'default' => array(
    			'default' => true,
    			'adapter' => 'PDO_MYSQL',
    			'params'  => array(
    				'profiler' => true,
    				'dbname'   => $config['dbname'],
    				'host'     => $config['host'],
    				'username' => $config['username'],
    				'password' => $config['password'],
    				'driver_options' => array(
    					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'' . $config['encoding'] . '\''
    				)
    			)
    		)
    	);
    	
    	// Add to system config
    	$options['multidb'] = $multidb;
    	
    	// Save to registry
    	Zend_Registry::set('options', $options);
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
	   	$options = Zend_Registry::get('options');
    	$options = $options['multidb'];
    	
    	$adapters = array();
    	if (!Zend_Registry::isRegistered(self::MULTIDB_REGISTRY_KEY)) {
    		Zend_Registry::set(self::MULTIDB_REGISTRY_KEY, $adapters);
    	}
    	
    	// Create adapters
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
    	
    	// Store back to registry
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
    
    protected function _setHelpers()
    {
    	//$loader = Zend_Controller_Action_HelperBroker::getPluginLoader();
    	//$loader->addPrefixPath('Sunny_Controller_Action_Helper', 'Sunny/Controller/Action/Helper/');
    	//Zend_Controller_Action_HelperBroker::setPluginLoader($loader);
    	
    	$helper = new Sunny_Controller_Action_Helper_ArrayTrans();
    	Zend_Controller_Action_HelperBroker::addHelper($helper);
    	//Zend_Controller_Action_HelperBroker::getStack()->offsetSet(null, $helper);
    }
    
    /**
     * Setup default model cache object
     */
    protected function _setCache()
    {
    	// Set cahce
    	$cahceLogging = (bool) $this->getOption('cache_logging');
    	$cahceTesting = (bool) $this->getOption('cache_testing');
    	
    	$logger = null;
    	if ($cahceLogging) {
    		$logger = new Zend_Log(new Zend_Log_Writer_Stream(ROOT_PATH . '/data/logs/cache.log'));
    	}
    	
    	// Set DbTable metadata cache
    	$frontend = new Zend_Cache_Core(array(
    		'automatic_serialization' => true,
    		'lifetime' => 86400,
    		'logging'  => $cahceLogging,
    		'logger'   => $logger,
    		'caching'  => (bool) $this->getOption('enable_cache_metadata')
    	));
    	
    	if (extension_loaded('apc') && !$cahceTesting) {
    		$backend = new Zend_Cache_Backend_Apc();
    	} else {
    		$backend = new Zend_Cache_Backend_File(array('cache_dir' => ROOT_PATH . '/data/cache'));
    	}
    	
    	$cache = Zend_Cache::factory($frontend, $backend);
    	Zend_Db_Table_Abstract::setDefaultMetadataCache($cache);
    	
    	// Set DataMapper metadata cache
    	$frontend = new Zend_Cache_Core(array(
    		'automatic_serialization' => true,
    		'lifetime' => 86400,
    		'logging'  => $cahceLogging,
    		'logger'   => $logger,
    		'caching'  => (bool) $this->getOption('enable_cache_model')
    	));
    	
    	if (extension_loaded('apc') && !$cahceTesting) {
    		$backend = new Zend_Cache_Backend_Apc();
    	} else {
    		$backend = new Zend_Cache_Backend_File(array('cache_dir' => ROOT_PATH . '/data/cache'));
    	}
    	 
    	$cache = Zend_Cache::factory($frontend, $backend);
    	Sunny_DataMapper_MapperAbstract::setupModelCache($cache);    	 
    }
    
    /**
     * Add routes for navigation
     */
    protected function _setRouter()
    {
    	$frontController = Zend_Controller_Front::getInstance();
    	$router = $frontController->getRouter();
    	$url = $_SERVER[REQUEST_URI];
    	$langs = explode("/", trim($url,'/'));
    	//$router->setGlobalParam('lang', $langs[0]);
    	// Override default route
    	$router->addRoute('default', $route = new Zend_Controller_Router_Route(
	    	':lang/:module/:controller/:action/*',
    		array(
    			'module' => 'default',
    			'controller' => 'index',
    			'action' => 'index',
    			'lang' => ''
    		)
    	));
    	
    	$router->addRoute('develop', new Zend_Controller_Router_Route_Static(
    		'develop',
    		array(
    			'module' => 'default',
    			'controller' => 'index',
    			'action' => 'develop'
    		)
    	));    	 
    	
    	$frontController->setRouter($router);
    }
    /**
    * Add routes for navigation
    */
    protected function _setTranslate()
    {
        $url = $_SERVER[REQUEST_URI];
        $langs = explode("/", trim($url,'/'));
        if ($langs[0] == '' || strlen($langs[0]) != 2) { 
        	$langs[0] = 'uk';
        };
        $translate = new Zend_Translate(
            array(
                 'adapter' => 'array',
                 'content' => APPLICATION_PATH . '/language/uk.php',
                 'locale'  => 'uk'
  				 )
        );
        $translate->addTranslation(array('content' => APPLICATION_PATH . '/language/ru.php', 'locale' => 'ru'));
        $translate->addTranslation(array('content' => APPLICATION_PATH . '/language/en.php', 'locale' => 'en'));
        $translate->setLocale($langs[0]);
       	Zend_Registry::set('lang', $langs[0]);
        Zend_Registry::set('trasvistit', $translate);
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

