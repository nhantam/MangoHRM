<?php
/**
 * Controllers Front Index
 * Last update Nov 05 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Nov 05 2015
 */

class LogoutController extends Zend_Controller_Action {

	
	private $_userInfo;	
	private $_myApp;
	private $_model;

	private $_dirApp;
	private $_lable;
	
	private $_myCookie;
	
	
	function init(){
		
		$this->_dirApp = Zend_Registry::get('dirApp')->toArray();		
		$this->view = Myapp_View_Smarty::getInstance();
		$this->view->setView($this->_dirApp['template_front'].$this->_dirApp['style'].'/');
		
		$smarty = $this->view->getEngine();	
		$smarty->compile_dir = $this->_dirApp['template_front_cache'];
		
        $viewRenderer = $this->_helper->getHelper('viewRenderer');
        $viewRenderer->setView($this->view)
                     ->setViewBasePathSpec($smarty->template_dir)
                     ->setViewScriptPathSpec(':controller/:action.:suffix')
                     ->setViewScriptPathNoControllerSpec(':action.:suffix')
                     ->setViewSuffix($this->_dirApp['template_extension']);
		
		$this->view->assign('base_url', $this->_dirApp['base_url']);
		$this->view->assign('base_tpl', $this->_dirApp['base_tpl']);
			    
	   	$this->_module 	= $this->_getParam('module');
	   	$this->_control 	= $this->_getParam('controller');
	   	$action 		= $this->_getParam('action');
	   	$this->view->assign('form', 
	   				array('module'	=> $this->_module,
	   					'control'	=> $this->_control,
	   					'action'	=> $action,
	   					'lang'		=> $_SESSION['lang'])
	   		);
	   	
	   	$this->_lable = Zend_Registry::get('lable');
	   	$this->view->assign('lable', $this->_lable);
	   	
	}
	
	
	
	/**
	 * Logout
	 */
	function indexAction() {
		$this->_helper->viewRenderer->setNoRender(true);
		session_start();
		
		$auth = Zend_Auth::getInstance();
		$infoUser = $auth->getIdentity();
		
		// staus OFF
		$timeON = date('Y-m-d H:i:s');
		$model_employee = Front_Model_Employee::getInstance();
		$model_employee->updateOnLogin($infoUser->id, $timeON, 'OFF');
		$model_employee->compareOffLogin();
		
		//clear cookies
		$this->_myCookie = new Myapp_Auth_Storage_Cookie($this->_dirApp['cookie_name'], $this->_dirApp['secretsalt']);
		$this->_myCookie->clear();
		
		// clear session
		$auth->clearIdentity();
		unset($this->_userInfo->username);
		
		
		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',0,'/');
		setcookie($this->_dirApp['cookie_name'],'',0,'/');
		//session_regenerate_id(true);
		
		$this->_redirect( $this->_dirApp['base_url'] );
		
	}
	
	
	
}
