<?php
/**
 * Controllers Setting General config
 * Last update Dec 14 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Dec 14 2015
 */

class JobController extends Zend_Controller_Action {

	
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
		
		$this->_model = Front_Model_General::getInstance();
		
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
     * Form add
     */
    function indexAction() {
    	
    	$this->_redirect($this->_base_url.$this->_control.'/list/');
    	
    	/*
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$option = !empty($option) ? $option : 'add';
    	$task = $this->_getParam('t');
    	
    	if( !empty($id) && $option=='edit' ) {
    		$this->_model->primary = $id;
    		$data = $this->_model->getItemById();
    			
    		//multi records
    		//$this->_model->cond = ' parent ='.$data['id'];
    		$multi = array(); //$this->_model->getItems();
    			
    		// delete sub
    		$sub = $this->_getParam('sub');
    		if($task == 'del' && !empty($sub)) {
    			$this->_model->primary = $sub;
    			$this->_model->deleteItem();
    			$this->_redirect( $this->_base_url.$this->_control."/index/?id=$id&option=$option");
    		}
    			
    	
    		$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/general.ini', 'SETTING');
    		$preset_general = $cbx->toArray();
    		$general = $preset_general['box'];
    			
    		$heading = $this->_lable['edit']['value'].' '.$general[$data['type']];
    		 
    	} else {
    		$data = array();
    		$multi = array();
    		$heading = $this->_lable['add']['value'];
    	}
    	
    	$this->view->assign('heading', $heading);
    	$this->view->assign('data', $data);
    	$this->view->assign('multi', $multi);
    	$this->view->assign('option', $option);
    	*/
    }
    

    
    /**
     * 
     * Process add
     */
    function addAction() {
    	$row = '';
    	$primary= $this->_getParam('primary');
    	$option = $this->_getParam('option');
    	$name	= $this->_getParam('name');
    	$type 	= $this->_getParam('custom_type');
    	$c_name	= $this->_getParam('b');
    	$time	= time();
    	
    	$url_back = $this->_base_url.$this->_control."/list/#$c_name";
    	
    	$this->view->assign('option', $option);
    	
    	$heading = $this->_lable['add']['value'].' '.$this->_lable[$this->_control]['value'];
    	if(!empty($primary) && $option == 'edit') {
    		$this->_model->primary = $primary;
    		$row = $this->_model->getItemById();
    		$this->view->assign('data', $row);
    		$heading = $this->_lable['update']['value'].' '.$this->_lable[$this->_control]['value'];
    	}
    	
    	$this->view->assign('heading', $heading);
    		
    	$data = array(
    			'type'=> $type,
    			'last_update'=> $time);
    	
    	$desc = array('name'=> addslashes($name));
    	
    	$validation = Myapp_Valid_Data::getInstance();
    	$validation->required = $this->_lable['required_input']['value'].' '.$this->_lable['name']['value'];
    	$validation->validNotEmpty('name', $name);
    	
    	if($validation->run() !== true) {
    		$this->view->assign('alert', 'danger');
    		if($option == 'edit') { $this->view->assign('msg', $this->_lable['update_fail']['value'].' '.$validation->error_array); }
    		else { $this->view->assign('msg', $this->_lable['add_fail']['value'].' '.$validation->error_array); }
    			
    		header("refresh:".$this->_lable['timewait']['value'].";url=".$url_back);
    		return;
    	}
    	
    	if( !empty($primary) && $option == 'edit') { //Update
    	
    		$this->_model->primary = $primary;
    		$update = $this->_model->updateItem($data, $desc);
    	
    		if($update) {
    			$this->view->assign('alert', 'success');
    			$this->view->assign('msg', $this->_lable['update_succ']['value']);
    		} else {
    			$this->view->assign('alert', 'danger');
    			$this->view->assign('msg', $this->_lable['update_fail']['value']);
    		}
    	
    		$this->_helper->viewRenderer('nogrant');
    		header("refresh:".$this->_lable['timewait']['value'].";url=".$url_back);
    		return;
    		 
    	} else { //insert
    	
    		$data['date_add'] = $time;
    	
    		$insert = $this->_model->insertItem($data, $desc);
    		if($insert) {
    			$this->view->assign('alert', 'success');
    			$this->view->assign('msg', $this->_lable['add_succ']['value']);
    		} else {
    			$this->view->assign('alert', 'danger');
    			$this->view->assign('msg', $this->_lable['add_fail']['value']);
    		}
    	
    		$this->_helper->viewRenderer('nogrant');
    		header("refresh:".$this->_lable['timewait']['value'].";url=".$url_back);
    		return; 
    	}
    	
    }
    
    
    /**
     * List items
     *
     * @return void
     */
    function listAction(){
    	
    	$this->view->assign('heading', $this->_lable['list']['value']);
    	$this->_model->_type = "'job_title', 'job_category'";
    	$this->_model->cond = " AND c.avail=1 ";
    	

    	/*
    	$total = $this->_model->counterItems();
    	$paginator 	= Zend_Paginator::factory(range(1,$total));
    	$page 		= $this->_getParam('page');
    	$curpage 	= !empty($page) ? $page : 0;
    	$paginator->setCurrentPageNumber($curpage);
    	$perpage 	= $this->_getParam('c');
    	$num 		= !empty($perpage) ? $perpage : $this->_lable['per_item_admin']['value'];
    	$paginator->setItemCountPerPage($num);
    	$paginator->setCurrentPageNumber($curpage);
    	$paginator->setPageRange($this->_lable['per_rangs_admin']['value']);
    
    	$offset = ($curpage * $num) > 0 ? ($curpage * $num) - $num : ($curpage * $num);
    
    	//$this->_model->num = $num;
    	//$this->_model->offset = $offset;
    	*/
    	
    	$items = $this->_model->getSomeFields();
    
    	$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/general.ini', 'SETTING');
    	$preset_general = $cbx->toArray();
    	$general = $preset_general['setting'];
    	$this->view->assign('preset_general', $general);
    
    	$tmp = array();
    	foreach ($items as $key=>$vl) {
    		$type = $vl['type'];
    		if(array_key_exists($type, $general)) {
    			$tmp[$type][] = array('name'=>$general[$type], 'record'=> $vl);
    		}
    	}
    
    	$this->view->assign('items', $tmp);
    	
    }
    
	
}

//END class