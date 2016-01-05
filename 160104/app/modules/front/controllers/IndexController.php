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

class IndexController extends Zend_Controller_Action {

	
	private $_userInfo;
	private $_myCookie;
	private $_dirApp;
	private $_model;

	private $_base_url;
	private $_module;
	private $_control;
	
	private $_lable;
	private $_path_image;
	
	
	
		
	function init(){
		
		$auth = Zend_Auth::getInstance();
		$this->_userInfo = $auth->getIdentity();
		
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
		
        $this->_base_url = $this->_dirApp['base_url'];
		$this->view->assign('base_url', $this->_base_url);
		$this->view->assign('base_tpl', $this->_dirApp['base_tpl']);
			    
	   	$this->_module 	= $this->_getParam('module');
	   	$this->_control = $this->_getParam('controller');
	   	$action 		= $this->_getParam('action');
	   	$this->view->assign('form', 
	   				array('module'	=> $this->_module,
	   					'control'	=> $this->_control,
	   					'action'	=> $action,
	   					'lang'		=> $_SESSION['lang'])
	   		);
	   	
	   	$this->_lable = Zend_Registry::get('lable');
	   	$this->view->assign('lable', $this->_lable);
	   	
	   	
	   	if(empty($this->_userInfo)) {
	   		$this->_myCookie = new Myapp_Auth_Storage_Cookie($this->_dirApp['cookie_name'], $this->_dirApp['secretsalt']);
	   		$cookieValue = $this->_myCookie->read();
	   		$this->_myCookie->readAndAuthen($cookieValue);
	   		$this->_userInfo = $auth->getIdentity();
	   	}
	   	
	   	
	   	if(empty($this->_userInfo->adminId)) {
	   		$this->_redirect($this->_base_url.'login/');
	   	}
	   	
	   	if($this->_userInfo->adminId != '') {
	   		$file_name = $this->_dirApp['dir_auth'].$this->_userInfo->adminLogin.'.ini';
	   		$sessionAuth = Myapp_File_Createauth::getInstance()->compareSession($file_name);
	   		if($sessionAuth == true) {
	   			$this->_redirect($this->_base_url.'logout/');
	   		}
	   		 
	   	}
	   		
	   	$this->view->assign('userInfo', $this->_userInfo);
	}
	
	
	
	function indexAction() {
		
	}
	
	
}

//END class