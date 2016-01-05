<?php
/**
 * Controllers Front Login
 * Last update Nov 05 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Nov 05 2015
 */

class LoginController extends Zend_Controller_Action {

	
	private $_userInfo;
	private $_myCookie;
	private $_dirApp;
	private $_model;

	private $module;
	private $control;
	
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
		
		$this->view->assign('base_url', $this->_dirApp['base_url']);
		$this->view->assign('base_tpl', $this->_dirApp['base_tpl']);
			    
	   	$this->module 	= $this->_getParam('module');
	   	$this->control 	= $this->_getParam('controller');
	   	$action 		= $this->_getParam('action');
	   	$this->view->assign('form', 
	   				array('module'	=> $this->module,
	   					'control'	=> $this->control,
	   					'action'	=> $action,
	   					'lang'		=> $_SESSION['lang'])
	   		);
	   	
	   	$this->_lable = Zend_Registry::get('lable');
	   	$this->view->assign('lable', $this->_lable);
	   
	}
	
	
	function indexAction() {
		
		Zend_Session::start();
		
		$breadcrumb = '<li><a href="'.$this->_dirApp['base_url'].'">'.$this->_lable['home']['value'].'</a></li>
				<li class="active">'.$this->_lable['sign_in']['value'].'</li>';
		$this->view->assign('breadcrumb', $breadcrumb);
		
		$seo['title'] = $this->_lable['sign_in_title']['value'];
		$this->view->assign('seo', $seo);
		
		$model = Front_Model_Employee::getInstance();
		
		/*
		$link = $this->_dirApp['base_url'].$this->control.'/confirm/';
		$sign_activation = sprintf(stripslashes($this->_lable['signin_activation_note']['value']), $link);
		$this->view->assign('sign_activation', $sign_activation);
		*/
		
		$_SESSION['referer'] = empty($_SESSION['referer']) ? $_SERVER['HTTP_REFERER'] : $_SESSION['referer'];
		
		$arr = explode('/', $_SESSION['referer']);
		if(in_array('login', $arr) || in_array('login', $arr)) { $_SESSION['referer'] = ''; }
		
		if(!empty($this->_userInfo->adminId)) {
			$refe_link = empty($_SESSION['referer']) ? $this->_dirApp['base_url'] : $_SESSION['referer'];
			$this->_redirect($refe_link);
		}
		
		$data 		= $this->_getParam('data');
		$username 	= trim($data['username']);
		$password 	= trim($data['password']);
		$remember 	= $this->_getParam('remember');
		
		$current_link = $this->_dirApp['base_url'].$this->control."/?lang=";
		$this->view->assign('current_link', $current_link);
		
		
		if( $this->_request->isPost() && !empty($username) && !empty($password) ) {
				
			$master_db = Zend_Registry::get('master_db');
			$auth = Zend_Auth::getInstance();
				
			$authAdapter = new Zend_Auth_Adapter_DbTable($master_db);
			$authAdapter->setTableName('panpic_admin')
			->setIdentityColumn('adminLogin')
			->setCredentialColumn('adminPass');
			 
			$authAdapter->setIdentity($username);
			$authAdapter->setCredential(md5($password));
				
			$select = $authAdapter->getDbSelect();
			$select->where('adminAvail = 1');
				
			$result = $auth->authenticate($authAdapter);
			
			$flag = 0;
			if($result->isValid()) {
				$data = $authAdapter->getResultRowObject(null); //(null, array('password'))
				$auth->getStorage()->write($data);
				 
				$infoUser = $auth->getIdentity();
		
				//set member on/off
				$model->updateOnLogin($infoUser->adminId, date('Y-m-d H:i:s') );
				//$model->compareOffLogin();
		
				$username = $infoUser->adminLogin;
		
				if($remember == 1) { //set cookie
					$cookieValue = $infoUser->adminId.';'.$username.';'.$infoUser->adminPass;
					//if localhost no set domain
					if(strpos($_SERVER['HTTP_HOST'],'.') !== false) {
						$cookieDomain = $_SERVER['HTTP_HOST'];
						$this->_myCookie->setDomain($cookieDomain);
					}
						
					$this->_myCookie->write($cookieValue);
				}
		
				// write file ini session
				$session_id = session_id();
				$file_name = $this->_dirApp['dir_auth'].$username.'.ini';
				Myapp_File_Createauth::getInstance()->fwrite_stream($file_name, $session_id);
		
				$flag = 1;
			}
		
			
			if ($flag == 1) {
				
				$infoUser = $auth->getIdentity();
		
				$client_ip = Myapp_Myapplication::getInstance()->get_client_ip();
				$log_event = array('emp_id' => $infoUser->emp_id, 'ip' => $client_ip);
				$model->insertLog($log_event);
				$model->updateLastLogin($infoUser->adminId);
				
				$refe_link = empty($_SESSION['referer']) ? $this->_dirApp['base_url'] : $_SESSION['referer'];
				$this->_redirect($refe_link);
				
			} else {
		
				$model->cond = " WHERE adminLogin='$username' AND adminPass='".md5($pwd)."' ";
				$row = $model->getByCond();
		
				if(!empty($row['adminLogin'])) {
		
					if($row['avail'] == 0) {
						$this->view->assign('alert', 'danger');
						$this->view->assign('msg', $this->_lable['account_disable_note']['value']);
						$this->_helper->viewRenderer('index');
						return;
					} else {
						$this->view->assign('alert', 'danger');
						$msg = sprintf($this->_lable['acount_noconfirm']['value'], $this->_dirApp['base_url'].'signin/confirm/');
						$this->view->assign('msg', stripslashes($msg));
						$this->_helper->viewRenderer('index');
						return;
					}
				} else {
					$this->view->assign('alert', 'danger');
					$this->view->assign('msg', $this->_lable['sign_in_error']['value']);
					$this->_helper->viewRenderer('index');
					return;
				}
			}
			
		}
		
	}
	
	
}

//END class