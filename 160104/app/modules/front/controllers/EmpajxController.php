<?php
/**
 * Controllers Add Employee Ajax
 * Last update Dec 10 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Dec 10 2015
 */

class EmpajxController extends Zend_Controller_Action {

	
	private $_userInfo;
	private $_myCookie;
	private $_dirApp;
	private $_model;

	private $_base_url;
	private $_module;
	private $_control;
	
	private $_lable;
	private $_path_image;
	private $_image_type;
	private $_object_id;
	private $_last_id;
	
	/**
	 * Ham khoi tao
	 * @see Zend_Controller_Action::init()
	 */	
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
		
		
		// 2015
		$this->_model = Front_Model_Employee::getInstance();
			    
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
	
	
	
	/**
     * 
     * 
     */
    function indexAction() {
    	//nothing
    }
    
    
    /**
     * Get pay grades by pay_grade_id
     * Ajax
     * 
     */
    function paycurrencyAction(){
    	
    	$this->_helper->viewRenderer->setNoRender(true);
    	
    	$pay_grade_id = $this->_getParam('id');
    	
    	if($pay_grade_id == '') {
    		echo -1;
    		return;
    	}
    	
    	$currencys = $this->_model->getCurrency($pay_grade_id);
    	
    	$str = '<select name="data[currency_id]" id="currency_id" class="col-md-4 form-control" onchange="payminmax()">
    		<option value=""> ---'. $this->_lable['select']['value'].' '. $this->_lable['currency']['value'].'---</option>';
    	
    	foreach ($currencys as $vl) {
    		$str .= '<option value="'.$vl['currency_id'].'"> '.$vl['currency_name'].'</option>';
    	}
    	
    	$str .= '</select>';
    	echo $str;
    	
    }
    
    /**
     * Get pay grades min_max_salary
     * Ajax
     *
     */
    function payminmaxAction(){
    	$this->_helper->viewRenderer->setNoRender(true);
    	
    	$pay_grade_id = $this->_getParam('pg_id');
    	$current_id = $this->_getParam('currency_id');
    	 
    	if($pay_grade_id == '' || $current_id == '') {
    		echo -1;
    		return;
    	}
    	 
    	$row = $this->_model->getMinmax($pay_grade_id, $current_id);
    	
    	echo json_encode($row);
    	
    }
    
    
    
    function autoreportAction() {
    	$this->_helper->viewRenderer->setNoRender(true);
    	
    	$q = $this->_getParam('q');
    	$q = trim($q);
    	$emp_number = $this->_getParam('emp_number');
    	
    	// if($q == '') return;

    	// truy van database
    	$this->_model->cond = "AND b.`type` = 'job_title' AND a.emp_number != '$emp_number' AND (a.emp_lastname LIKE '$q%' OR a.emp_firstname LIKE '$q%')";
    	$arr = $this->_model->searchEmployeeAndTitle();
    	
    	foreach ($arr as $vl){
  
    		$fullname = $vl['fullname']." - ". $vl['name'];
    		echo $vl['emp_number']."|". $fullname."\n";
    		
    	}
    	
    }
    
	
}

//END class