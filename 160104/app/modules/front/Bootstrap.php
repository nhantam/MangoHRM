<?php
/**
 * Bootstrap all application
 * Last update July 03 2014
 * 
 * @package public Bootstrap
 * @copyright NoNCdeal
 * @author bang.webdeveloper@gmail.com
 * @since Friday, January 21, 2011
 * class Default_Bootstrap extends Zend_Application_Module_Bootstrap
 */


class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	
	/**
	 * Router rewrite Front
	 * 
	 * @return string url
	 */
	protected function _initFrontController() {
		
		
		$url = $_SERVER['REQUEST_URI'];
		$arr = explode('/',$url);
		$total_arr = sizeof($arr);
		$urlCheck = 3; //localhost = 3 server = 2, $arr[1]
		$detail = ($total_arr == $urlCheck && preg_match('/^\d+-\d+-.*+$/', $arr[2], $matches) )? true : false;
					
		if($total_arr == $urlCheck && !empty($arr[2]) && !$detail){			
			
			$front = Zend_Controller_Front::getInstance();  
			
			$front->setControllerDirectory(
			    array('default'=> APPLICATION_PATH."/modules/front/controllers",
			    	'admin'=> APPLICATION_PATH."/modules/admin/controllers"));
									        
			$config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/routers.ini', 'estore');
			$router = new Zend_Controller_Router_Rewrite();		
			return $front->setRouter($router->addConfig($config, 'routes'));

		} else {
			
			$front = Zend_Controller_Front::getInstance();
						
			$front->setControllerDirectory(
			    array(
			        'default'=> APPLICATION_PATH."/modules/front/controllers",		        
			        'admin' => APPLICATION_PATH."/modules/admin/controllers"));
						
			$config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/routers.ini', 'rewriteshopname');
			
			$router = new Zend_Controller_Router_Rewrite();		
			return $front->setRouter($router->addConfig($config, 'routes'));			
		}
		
	}
    
	
		
	/**
	 * connect to database
	 * @return connection
	 */
	protected function _initDb() {
    	
		$config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/config.ini', 'database');
		$config = $config->toArray();
		Zend_Registry::set('config', $config);
		
		$options = array(Zend_Db::ALLOW_SERIALIZATION => false);
		$master_db = Zend_Db::factory($config['adapter'], $config['params'] );
		Zend_Db_Table::setDefaultAdapter($master_db);
		Zend_Registry::set('prefix', $config['params']['prifex']);		
		Zend_Registry::set('master_db', $master_db);
		$master_db->closeConnection();	
		//unset($db);
		
		// session language
		Zend_Session::start();
		$lang = isset($_REQUEST['lang']) ? strtoupper($_REQUEST['lang']) : '';
		$_SESSION['lang'] = !empty($lang) ? $lang : $_SESSION['lang'];
		$_SESSION['lang'] = empty($_SESSION['lang']) ? 'VN' : $_SESSION['lang'];
		 
		$table = $config['params']['prifex'].'lang_values';
		$lable = $master_db->fetchAssoc("SELECT name, value FROM $table WHERE lang ='".$_SESSION['lang']."' ");
		Zend_Registry::set('lable', $lable);
		
		Zend_Registry::set('dirApp', new Zend_Config_Ini(APPLICATION_PATH.'/configs/config.ini', 'dirApp'));
		
    }
    
    
	/**
     * Bootstrap autoloader for application resources
     * config lable for multilanguage
     * config SMTP for send mail
     * 
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()  {	
    	$autoloader = new Zend_Application_Module_Autoloader(array(
    			'namespace' => '',
    			'basePath' => APPLICATION_PATH,
    			'resourceTypes' => array(
    					'front' => array('path'=>'front/', 'namespace'=>'front'),
    					'model' => array('path'=>'models/', 'namespace'=>'Models'),
    					'modelfront' => array('path'=>'modules/front/models/', 'namespace'=>'Front_Model')
    			)));
		
    }
    
    
    protected function _initAppAutoLoad() { }
    
   
    protected function _initLayoutHelper() { }
    
    
	public function _initControllers() { }

    
    protected function _initDoctype() { }
    
        
}
