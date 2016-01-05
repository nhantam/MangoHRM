<?php
/**
 * Controllers Add Employee
 * Last update Nov 10 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Nov 10 2015
 */

class EmpaddController extends Zend_Controller_Action {

	
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
	   	
	   	$this->_path_image = $this->_dirApp['path_thumb'];
	   	//$this->_image_type = $this->_dirApp['path_thumb'];
	   	
	}
	
	
	
	/**
     * 
     * add employe
     */
    function indexAction() {
    	
        $this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['employee']['value']);
        
        $id = $this->_getParam('id');
        $option = $this->_getParam('option');
        $step = $this->_getParam('step');
        
        $option = empty($option) ? 'add' : $option;
        $step = empty($step) ? 1 : $step;

        $data = array();
        if (!empty($id) && $option == 'edit') {
            $this->_model->name = $id;
            $data = $this->_model->getItemById();
        }

        $this->view->assign('data', $data);
        $this->view->assign('option', $option);
    	
    }
    

    
    /**
     * 
     * Process add
     */
    function step1Action() {
    	
    	/*
    	echo '<pre>';
    	print_r($this->_lable);
    	echo '<pre>';
    	*/
    	
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
        
        $id = $this->_getParam('id');
        $option = $this->_getParam('option');
        $step = $this->_getParam('step');
        
        $option = empty($option) ? 'add' : $option;
        $step = empty($step) ? 1 : $step;
        
        $this->view->assign('step', $step);
        
        /*
        $general = Front_Model_General::getInstance();
        $general->_type = "'emp_login'";
        $select_box = $general->getSomeFieldsTime();
        $this->view->assign('select_box', $select_box);
        */
        
        
        // when Submit
        if ($this->_request->isPost()) {
        	
        	$data = $this->_getParam('data');
        	$creat_login_account = $this->_getParam('creat_login_account');
        	$account = $this->_getParam('account');
        	
        	
        	$this->view->assign('data', $data);
        	$this->view->assign('creat_login_account', $creat_login_account);
        	$this->view->assign('account', $account);
        //	$this->view->assign('info', $info); /////////////////////////////
			
        	$emp_image = '';
        	// instance object image
        	$myIcon	= Myapp_Valid_Avatar::getInstance();
        	$myIcon->setImage('file_avatar');

        	if(!empty($myIcon->file_name)) {
        	
        		$year = date('Y');
        		$month = date('m');
        		$file_path_year = $this->_path_image.$year.DS;
        		if (!file_exists($file_path_year)) { mkdir($file_path_year); }
        		
        		$new_path = $year.DS.$month.DS;
        		$file_path = $file_path_year.$month.DS;
        		if (!file_exists($file_path)) { mkdir($file_path); }
        		
        		$file_name = date("Ymd-His").'-'.$myIcon->file_name;
        		$myIcon->setFile(1000, 400, 400, $file_path);
        		
        		if(!$myIcon->checkExt()) { //check image extension
        			$error = $this->_lable['file_error_ext']['value'];
        			if(isset($myIcon->file_name)) $error .= ' (<u>'.$myIcon->file_name.'</u>)';
        			$errors[] = $error;
        		}
        	
        		$myIcon->setImageName($file_name); //set image name
        		$mcIcon = $myIcon->upload(); //fileName true
        	
        		$oldIcon = $this->_getParam('old_avatar');
        		if(empty($mcIcon)) { $mcIcon = $oldIcon;
        		} else {  $myIcon->deleteExisting($oldIcon); /*Delete old file*/ }
        		
        		
        		$emp_image = array(
         			'path_image' => $new_path.$file_name,
        			'image_type' => 'emp',
         			'object_id'  => ''
        		);
        	
        	} //end image
        	
        	
        	$password = $account['password'];
        	$re_password = $account['re_password'];
        	// validate
        	//print_r($data);
        	
        	if($creat_login_account ==1 && isset($password) && $password != $re_password) {
        		$this->view->assign('alert', 'danger');
        		$this->view->assign('msg', $this->_lable['password_not_match']['value']);
        		$this->view->assign('data', $data);
        		$this->_helper->viewRenderer('step1');
        		return;
        	}
        	
        	// check trung username
        	$username = $account['adminLogin'];
        	$arr = $this->_model->checkUsernameExist($username);
        	if($arr)
        	{
        		$this->view->assign('alert', 'danger'); 
        		$this->view->assign('msg', $this->_lable['username_exist']['value']); 
        		$this->view->assign('data', $data); 
        		$this->_helper->viewRenderer('step1');
        		return;
	        
        	}
        	
        	
        	$validation = Myapp_Valid_Data::getInstance();
        	
        	$validation->required = $this->_lable['please_input']['value'].$this->_lable['firstname']['value'];
        	$validation->validNotEmpty('emp_firstname', $data['emp_firstname']);
        	
        	
        	if($validation->run() !== true || isset($errors)) {
        			
        		$this->view->assign('msg', $this->_lable['update_fail']['value']);
        			
        		$valid = $validation->error_array;
        		$this->view->assign('valid', $valid);
        		
        		
        		if(!empty($errors)){
        			$myIcon->deleteExisting($file_name);
        		}
        		
        		$this->view->assign('fileError', $errors);
        		$this->_helper->viewRenderer('step1');
        		return;
        	}
        	
        	
        	$admin = array(
        		'adminLogin'=> trim($account['adminLogin']),
        		'adminPass'	=> md5($re_password),
        		'adminAvail'=> $account['adminAvail']		
        	);
        	
        	
        	/*
        	echo '<pre>';
        	print_r($admin);
        	echo '<pre>';
        	die();
        	*/
        	$insert = $this->_model->insertFist($data, $admin, $emp_image); ////////////////////
        	
        	//$insert = $this->_model->insertSecond($admin); //second
        	if($insert) {
        		$this->view->assign('alert', 'success');
                $this->view->assign('msg', $this->_lable['add_succ']['value']);
                $this->_helper->viewRenderer('step1');
                header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step2/?id=$insert");
                return;
        	} else {
        		if(!empty($errors)){
        			$myIcon->deleteExisting($file_name);
        		}
        		
        		$this->view->assign('alert', 'danger');
        		$this->view->assign('msg', $this->_lable['add_fail']['value']);
        		$this->view->assign('data', $data);
        		$this->_helper->viewRenderer('step1');
        		return;
        	}
        	
        } 
    }
    
    
    function step2Action() {
    	
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    	
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$step = 2;
    	
    	$option = empty($option) ? 'add' : $option;
    	
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    	
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    	
    	
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step2');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    	
    	
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    	
    	
    	if ( $this->_request->isPost() ) {
    		
	    	$data = $this->_getParam('data');	
	    	$this->view->assign('data', $data);

	    	$emp_info = array(
	    	        		'emp_gender'		=> $data['emp_gender'],
	    	      			'nation_code'		=> $data['nation_code'],
	    	        		'emp_birthday'		=> $data['emp_birthday'],
	    					'emp_nick_name'		=> $data['emp_nick_name'],
	    					'emp_marital_status'=> $data['emp_marital_status'],
	    					'emp_dri_lice_num'	=> $data['emp_dri_lice_num'],
	    					'emp_dri_lice_exp_date'=> $data['emp_dri_lice_exp_date'],
	    					'emp_military_service'=> $data['emp_military_service'],
	    					'emp_smoker'		=> $data['emp_smoker']
	    	        	);

	    	
	    	
	    	$this->_model->emp_id = $id;
 	    	$update = $this->_model->updateSecond($emp_info);
	    	
	    	if($update) {
	    		$this->view->assign('alert', 'success');
	    		$this->view->assign('msg', $this->_lable['update_succ']['value']);
	    		$this->_helper->viewRenderer('step2');
	    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step3/?id=$id");
	    		return;
	    	} else {	
	    		$this->view->assign('alert', 'danger');
	    		$this->view->assign('msg', $this->_lable['update_fail']['value']);
	    		$this->view->assign('data', $data);
	    		$this->_helper->viewRenderer('step2');
	    		return;
	    	}
	    	
    	}
    	
    	
    } // end step2
    
    function step3Action() {
    	 
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    	 
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$step = 3;
    	 
    	$option = empty($option) ? 'add' : $option;
    	 
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    	 
    	 
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    	 
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step3');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    	 
    	 
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    	 
    	 
    	if ( $this->_request->isPost() ) {
    
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);

    		$emp_info = array(
    						'emp_street1'		=> $data['emp_street1'],
	    	      			'emp_street2'		=> $data['emp_street2'],
	    	        		'city_code'			=> $data['city_code'],
	    					'provin_code'		=> $data['provin_code'],
	    					'emp_zipcode'		=> $data['emp_zipcode'],
	    					'coun_code'			=> $data['coun_code'],
	    					'emp_hm_telephone'	=> $data['emp_hm_telephone'],
	    					'emp_mobile'		=> $data['emp_mobile'],
			    			'emp_work_telephone'=> $data['emp_work_telephone'],
			    			'emp_work_email'	=> $data['emp_work_email'],
			    			'emp_oth_email'		=> $data['emp_oth_email']
    		);
      
//     		echo '<pre>';
//     		print_r($data);
//     		//print_r($tb_employee);
//     		echo '</pre>';
    		//die();
    
    		$this->_model->emp_id = $id;
    		$update = $this->_model->updateSecond($emp_info);
    
    		if($update) {
    			$this->view->assign('alert', 'success');
    			$this->view->assign('msg', $this->_lable['update_succ']['value']);
    			$this->_helper->viewRenderer('step3');
    			header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step4/?id=$id");
    			return;
    		} else {
    			$this->view->assign('alert', 'danger');
    			$this->view->assign('msg', $this->_lable['update_fail']['value']);
    			$this->view->assign('data', $data);
    			$this->_helper->viewRenderer('step3');
    			return;
    		}
    
    	}
    	 
    	 
    	 
    } // end step3
    
    function step4Action() {
    
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$step = 4;
    
    	$option = empty($option) ? 'add' : $option;
    
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step4');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    	
    	$general = Front_Model_General::getInstance();
    	$general->_type = "'relation'";
    	$select_box = $general->getSomeFieldsTime();
    	$this->view->assign('select_box', $select_box);

    
    	if ( $this->_request->isPost() ) {
    
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);
    
    		$emp_info = array(
    				'emp_number'		=> $this->_model->emp_id,
    				'eec_name'			=> $data['eec_name'],
    				'eec_relationship'=> $data['eec_relationship'],
    				'eec_address'		=> $data['eec_address'],
    				'eec_home_no'		=> $data['eec_home_no'],
    				'eec_mobile_no'		=> $data['eec_mobile_no'],
    				'eec_office_no'		=> $data['eec_office_no']
    		);
    
    		$this->_model->emp_id = $id;
    		
    		if($option == 'edit') {
    			// truong hop Update
    			$update = $this->_model->updateSecond($emp_info);
    			if($update) {
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step4');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step5/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step4');
    				return;
    			}
    			
    		} else {
    			//insert
    			$insert = $this->_model->insertContacts($emp_info);
    		
	    		if($insert) {
	    			$this->view->assign('alert', 'success');
	    			$this->view->assign('msg', $this->_lable['update_succ']['value']);
	    			$this->_helper->viewRenderer('step4');
	    			header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step5/?id=$id");
	    			return;
	    		} else {
	    			$this->view->assign('alert', 'danger');
	    			$this->view->assign('msg', $this->_lable['update_fail']['value']);
	    			$this->view->assign('data', $data);
	    			$this->_helper->viewRenderer('step4');
	    			return;
	    		}
    		}	
    	}
    } // end step4
    
   function step5Action() {
    
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$step = 5;
    
    	$option = empty($option) ? 'add' : $option;
    
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step5');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    	
    	
    	$general = Front_Model_General::getInstance();
    	$general->_type = "'relation'";
    	$select_box = $general->getSomeFieldsTime();
    	$this->view->assign('select_box', $select_box);

    	
    	if ( $this->_request->isPost() ) {
    
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);
    
    		$emp_info = array(
    				'emp_number'		=> $this->_model->emp_id,
    				'ed_name'			=> $data['ed_name'],
    				'ed_relationship_type'=> $data['ed_relationship_type'],
    				'ed_birthday'		=> $data['ed_birthday']
    		);
    
    		$this->_model->emp_id = $id;
    		
    		if($option == 'edit') {
    			// truong hop Update
    			$update = $this->_model->updateSecond($emp_info);
    			if($update) {
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step5');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step6/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step5');
    				return;
    			}
    			
    		} else {
    			//insert
    			$insert = $this->_model->insertDependents($emp_info);
    		
	    		if($insert) {
	    			$this->view->assign('alert', 'success');
	    			$this->view->assign('msg', $this->_lable['update_succ']['value']);
	    			$this->_helper->viewRenderer('step5');
	    			header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step6/?id=$id");
	    			return;
	    		} else {
	    			$this->view->assign('alert', 'danger');
	    			$this->view->assign('msg', $this->_lable['update_fail']['value']);
	    			$this->view->assign('data', $data);
	    			$this->_helper->viewRenderer('step5');
	    			return;
	    		}
    		}	
    	}
    } // end step5
    
    
    function step6Action() {
    
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$step = 6;
    
    	$option = empty($option) ? 'add' : $option;
    
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    	
    	$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/general.ini', 'SETTING');
    	$preset_general = $cbx->toArray();
    	$immigration = $preset_general['immigration'];
    	$this->view->assign('immigration', $immigration);
    	print_r($immigration);
    
    	
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step6');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    	 
    	$general = Front_Model_General::getInstance();
    	$general->_type = "'relation'";
    	$select_box = $general->getSomeFieldsTime();
    	$this->view->assign('select_box', $select_box);
    
    
    	if ( $this->_request->isPost() ) {
    
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);
    
    		$emp_info = array(
    				'emp_number'			=> $this->_model->emp_id,
    				'ep_passport_type_flg'	=> $data['ep_passport_type_flg'],
    				'ep_passport_num'		=> trim($data['ep_passport_num']),
    				'ep_passportissueddate'	=> $data['ep_passportissueddate'],
    				'ep_passportexpiredate'	=> $data['ep_passportexpiredate'],
    				'ep_i9_status'			=> $data['ep_i9_status'],
    				'country_code'			=> $data['country_code'],
    				'ep_i9_review_date'		=> $data['ep_i9_review_date'],
    				'ep_comments'			=> $data['ep_comments']
    		);
    		
    		$this->_model->emp_id = $id;
    
    		if($option == 'edit') {
    			// truong hop Update
    			$update = $this->_model->updateSecond($emp_info);
    			if($update) {
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step6');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step7/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step6');
    				return;
    			}
    			 
    		} else {
    			//insert
    			$insert = $this->_model->insertPassport($emp_info);
    
    			if($insert) {
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step6');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step7/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step6');
    				return;
    			}
    		}
    	}
    	
    	
    } // end step6
    
    
    function step7Action() {
    	
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    	
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$step = 7;
    	
    	$option = empty($option) ? 'add' : $option;
    	
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    	
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    	
    	
    	$general = Front_Model_General::getInstance();
    	$type = "'job_title','job_category','emp_status'";
    	$select_box = $general->selectAllItems($type);
    	 
    	$this->view->assign('cbxJobTitle', $select_box['items']['job_title']);
    	$this->view->assign('cbxEmpStatus', $select_box['items']['emp_status']);
    	$this->view->assign('cbxJobCategory', $select_box['items']['job_category']);
    	 
    	//--- Tiểu đơn vị
    	$emp_sub_unit = '';
    	$rowNested = '';
    	$model_nestedsubunit = Front_Model_Nestedsubunit::getInstance();
    	$nestedsubunit = $model_nestedsubunit->listItem(0, 'all', 0);
    	 
    	$nestedMainCat = Myapp_DB_Nestedmaincat::getInstance();
    	$arrNested = $nestedMainCat->cmbNested($nestedsubunit, 'sub', $emp_sub_unit, $rowNested);
    	$this->view->assign('arrNested', $arrNested);
    	//--- end tiểu đơn vị
    	 
    	//--- Vị trí
    	$model = Front_Model_Locations::getInstance();
    	$locations = $model->getItems();
    	$this->view->assign('locations', $locations);
    	//--- end Vị trí
    	
    	
    	 
    	$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/general.ini', 'SETTING');
    	$preset_general = $cbx->toArray();
    	$immigration = $preset_general['immigration'];
    	$this->view->assign('immigration', $immigration);
    	
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	} else {
    		$this->_model->emp_id = $id;
	    	$tb_employee = $this->_model->employee();
	    	$this->view->assign('data', $tb_employee);
	    	
	    	$contractExtend = $this->_model->getContractExtend();
	    	$this->view->assign('contractExtend', $contractExtend);
    	}

    	$general = Front_Model_General::getInstance();
    	$general->_type = "'relation'";
    	$select_box = $general->getSomeFieldsTime();
    	$this->view->assign('select_box', $select_box);
    	
    	
    	if ( $this->_request->isPost() ) {
    	
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);
    		
    		$emp_sub_unit = $data['emp_sub_unit'];
    		if (!empty($emp_sub_unit)) {
    			$rowNested = $model_nestedsubunit->getNodeInfo($emp_sub_unit);
    		}
    		
//     		echo '<pre>';
//     		print_r($rowNested);
//     		echo '</pre>';
    		
    		$arrNested = $nestedMainCat->cmbNested($nestedsubunit, 'sub', $emp_sub_unit, $rowNested);
    		$this->view->assign('arrNested', $arrNested);
    	
    		$emp_info = array(
    				'emp_job_title'	=> $data['emp_job_title'],
    				'emp_status'	=> $data['emp_status'],
    				'emp_job_cat'	=> $data['emp_job_cat'],
    				'joined_date'	=> $data['joined_date'],
    				'emp_sub_unit'	=> $data['emp_sub_unit'],
    				'emp_location'	=> $data['emp_location']
    		);
    		$contract_extend = array(
    				'emp_number'			=> $this->_model->emp_id,
    				'econ_extend_start_date'=> $data['econ_extend_start_date'],
    				'econ_extend_end_date' 	=> $data['econ_extend_end_date']
    		);
    		
    		$this->view->assign('contractExtend', $contract_extend);		
    		
    			
    			$update = $this->_model->updateStep7($emp_info, $contract_extend);
    		
    			if($update) {
    				
    				//$this->_model->updateStep7($emp_info, $contract_extend);
    				
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step7');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step8/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step7');
    				return;
    			}
    		
    		
    	}
    	 
    	
    } // end step7
    

    function step8Action() {
    	
    	$general = Front_Model_General::getInstance();
    	$general->_type = "'job_title','paygrade','pay_frequency'";
    	$select_box = $general->selectAllItems();
    	$this->view->assign('select_box', $select_box);

//     	echo '<pre>';
//     	print_r($select_box);
//     	echo '<pre>';

    	$paygrade = $select_box['items']['paygrade'];
    	$this->view->assign('paygrade', $select_box['items']['paygrade']);
    	$pay_frequency = $select_box['items']['pay_frequency'];
    	$this->view->assign('pay_frequency', $pay_frequency);
    	
    	
    	$creat_login_account = $this->_getParam('creat_login_account');
    	$this->view->assign('creat_login_account', $creat_login_account);
    	
    	$this->view->assign('breadcrumb', $this->_lable['add']['value'] . ' ' . $this->_lable['admin']['value']);
    	 
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$salary_id = $this->_getParam('sub');
    	
    	$sub_option = $this->_getParam('sub_option');
    	
    	$step = 8;
    	 
    	$option = empty($option) ? 'add' : $option;
    	 
    	$this->view->assign('id', $id);
    	$this->view->assign('option', $option);
    	$this->view->assign('step', $step);
    	$this->view->assign('sub', $salary_id);
    	$this->view->assign('sub_option', $sub_option);
    	
    	
    	$countries = $this->_model->country();
    	$this->view->assign('countries', $countries);
    	
    	// Remove physical database
    	if($salary_id != '' && $sub_option == 'del') {
    		
    		// delete 
    		// panpic_emp_salary
    		// panpic_emp_directdebit
    		
    		$account = $this->_model->editDirectdebit($salary_id);
    		$emp_directdebit_id = $account['id'];
    		$del_status = $this->_model->deleteStep8($salary_id, $emp_directdebit_id);
    		
    		if($del_status) {
    			$this->view->assign('alert', 'success');
    			$this->view->assign('msg', $this->_lable['delete_succ']['value']);
    			
    		} else {
    			$this->view->assign('alert', 'danger');
    			$this->view->assign('msg', $this->_lable['delete_fail']['value']);
    		}
    		
    		$this->_helper->viewRenderer('step8');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step8/?id=$id");
    		return;
    		
    	}
    	
    	$emp_salary = '';
    	$account = '';
    	$currencys = '';
    	if($salary_id != '' && $sub_option == 'edit') {
    		// load salary panpic_emp_salary()	
    		$emp_salary = $this->_model->editSalary($salary_id);
    		$account = $this->_model->editDirectdebit($salary_id);
    		$pay_grade_id = $emp_salary[paygrades_id];
    		$currencys = $this->_model->getCurrency($pay_grade_id);
    		
    		$emp_salary['basic_salary'] = $emp_salary['basic_salary'] + 0;
    		$emp_salary['account_amount'] = $emp_salary['account_amount'] + 0;
    	}
    	
    	
    	
//     	echo '<pre>';
//     	print_r( $select_box['items']['paygrade'] );
//     	echo '</pre>';
    	
    	$this->view->assign('data', $emp_salary );
    	$this->view->assign('account', $account );
    	$this->view->assign('currencys', $currencys );

    	//list Salary
    	$salary = $this->_model->getSalary($id);
    	$this->view->assign('salary', $salary);
    	
    	$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/general.ini', 'SETTING');
    	$preset_general = $cbx->toArray();
    	$immigration = $preset_general['immigration'];
    	$this->view->assign('immigration', $immigration);
    	//print_r($immigration);
    	
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    	 
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    	 
    	$general = Front_Model_General::getInstance();
    	$general->_type = "'relation'";
    	$select_box = $general->getSomeFieldsTime();
    	$this->view->assign('select_box', $select_box);
    	 
    	 
    	if ( $this->_request->isPost() ) {
    		 
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);
    		
    		$account = $this->_getParam('account');
    		$this->view->assign('account', $account);
    		 
    		$emp_salary = array(
    				'emp_number'		=> $this->_model->emp_id,
    				'paygrades_id'		=> $data['paygrades_id'],
    				'payperiod_code'	=> $data['payperiod_code'],
    				'currency_id'		=> $data['currency_id'],
    				'basic_salary'		=> $data['basic_salary'],
    				'salary_component'	=> $data['salary_component'],
    				'comments'			=> $data['comments']
    		);
    
    		if($creat_login_account ==1){
    			
	    		$emp_directdebit = array(
	    				'account_number'=> $account['account_number'],
	    				'account_name'	=> $account['account_name'],
	    				'account_bank'	=> $account['account_bank'],
	    				'account_amount'=> $account['account_amount']
	    		);
    		} else {
    			$emp_directdebit ="";
    		}
    		
    		 
    		
    		$this->_model->emp_id = $id;
    		

    		if($salary_id != '' && $sub_option == 'edit') {
    			// truong hop Update 
    			
    			$update = $this->_model->updateStep8($emp_salary, $emp_directdebit, $salary_id);
    			
    			if($update) {
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step8');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step8/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step8');
    				return;
    			}
    			 
    		} else {
    			//insert
    			
    			$insert = $this->_model->insertStep8($emp_salary, $emp_directdebit);
    			 
    			if($insert) {
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('step8');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step9/?id=$id");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('step8');
    				return;
    			}
    		}
    	}
    
    	 
    } // end step8
    
    
    /**
     * List
     */
    function step9Action() {
    	$step = 9;
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$option = empty($option) ? 'add' : $option;
    	
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    	
    	$creat_supervisors = $this->_getParam('creat_supervisors');
    	$this->view->assign('creat_supervisors', $creat_supervisors);
    	
    	$creat_subordinates = $this->_getParam('creat_subordinates');
    	$this->view->assign('creat_subordinates', $creat_subordinates);
    	
    	//lay ID sub de edit del
    	$report_id = $this->_getParam('sub');
    	$sub_option = $this->_getParam('sub_option');
    	$task = $this->_getParam('t');
    	
    	$this->view->assign('sub', $report_id);
    	$this->view->assign('sub_option', $sub_option);
    	$this->view->assign('task', $task);
    	
    	// Remove physical database
    	if($report_id != '' && $sub_option == 'del') {

    		$del_status = $this->_model->deleteStep9($report_id);
    	
    		if($del_status) {
    			$this->view->assign('alert', 'success');
    			$this->view->assign('msg', $this->_lable['delete_succ']['value']);
    			 
    		} else {
    			$this->view->assign('alert', 'danger');
    			$this->view->assign('msg', $this->_lable['delete_fail']['value']);
    		}
    	
    		$this->_helper->viewRenderer('step9');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step9/?id=$id");
    		return;
    	
    	}
    	
    	
    	if( $report_id != '' && $sub_option == 'edit') {
    		
    		$report = $this->_model->reportById($report_id);
    		
    		if(! $report) { // edit not available
    			$this->view->assign('msg', $this->_lable['url_invalid']['value']);
	    		$this->_helper->viewRenderer('step9');
	    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step9/?id=$id");
	    		return;
    		}
    		
    		
    		if($task == 1) {
    			$id_report = $report['erep_sup_emp_number'];
    			$this->_model->cond = "AND b.`type` = 'job_title' AND a.emp_number = $id_report";
    		} elseif ($task == 2) {
    			$id_report = $report['erep_sub_emp_number'];
    			$this->_model->cond = "AND b.`type` = 'job_title' AND a.emp_number = $id_report";
    		}
    		
    		$data = $this->_model->searchEmployeeAndTitle();
    		
    		$data = $data[0];
    		$data['erep_reporting_mode'] = $report['erep_reporting_mode'];
    		
    		echo '<pre>';
    		print_r($data);
    		echo '</pre>';
    	
    	}
    	
    	$this->view->assign('data', $data);
    	
    	
    	//list supervisors
    	$supervisors = $this->_model->getSupervisors($id);
    	$this->view->assign('supervisors', $supervisors);
    	//list subordinates 
    	$subordinates = $this->_model->getSubordinates($id);
    	$this->view->assign('subordinates', $subordinates);
		    	 
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    
    	$this->_model->emp_id = $id;
    	$tb_employee = $this->_model->employee();
    	$this->view->assign('tb_employee', $tb_employee);
    


    
    	if ( $this->_request->isPost() ) {
    
    		$data = $this->_getParam('data');
    		$this->view->assign('data', $data);
    		$data2 = $this->_getParam('data2');
    		$this->view->assign('data2', $data2);
    		
    		$emp_report ="";
	
    		if($creat_supervisors ==1){ 
    			
	    		$emp_report = array(
	    				'erep_sup_emp_number'	=> $data['emp_id_q'],
	    				'erep_sub_emp_number'	=> $this->_model->emp_id,
	    				'erep_reporting_mode'	=> $data['erep_reporting_mode']
	    		);
	    		
    		} else if($creat_subordinates ==1){
    		
    			$emp_report = array(
	    				'erep_sup_emp_number'	=> $this->_model->emp_id,
	    				'erep_sub_emp_number'	=> $data2['emp_id_q2'],
	    				'erep_reporting_mode'	=> $data2['erep_reporting_mode2']
    			);
    		}
    
    	
    	if($emp_report != '') {
    		$this->_model->emp_id = $id;
    		
	    		if(sub != '' && $sub_option == 'edit') { //update
	    			echo $report_id;

		    		$update = $this->_model->updateStep9($emp_report, $report_id);
	    			
	    			if($update) {
	    				$this->view->assign('alert', 'success');
	    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
	    				$this->_helper->viewRenderer('step9');
	    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step9/?id=$id");
	    				return;
	    			} else {
	    				$this->view->assign('alert', 'danger');
	    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
	    				$this->view->assign('data', $data);
	    				$this->_helper->viewRenderer('step9');
	    				return;
	    			}
	    		} else {
		    		//insert
		    		$insert = $this->_model->insertStep9($emp_report);
	
		    		if($insert) {
		    			$this->view->assign('alert', 'success');
		    			$this->view->assign('msg', $this->_lable['update_succ']['value']);
		    			$this->_helper->viewRenderer('step9');
		    			header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step9/?id=$id");
		    			return;
		    		} else {
		    			$this->view->assign('alert', 'danger');
		    			$this->view->assign('msg', $this->_lable['update_fail']['value']);
		    			$this->view->assign('data', $data);
		    			$this->_helper->viewRenderer('step9');
		    			return;
		    		}
	    		}	
    		} else {
    			$this->view->assign('alert', 'danger');
    			$this->view->assign('msg', $this->_lable['update_fail']['value']);
    			$this->view->assign('data', $data);
    			$this->_helper->viewRenderer('step9');
    			return;
    		} //else $emp_report
    		
    	}
    
    
    } // end step9
    
    
    function step10Action() {
    	$step = 10;
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$option = empty($option) ? 'add' : $option;
    	 
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    	 
		$this->_model->emp_id = $id;
    
    			
    		
 
    
    
    } // end step10
    

    /**
     * Sub step 10
     * add experience
     */
    function addexperienceAction() {
    	$step = 10;
    	$id = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	
    	$eexp_id = $this->_getParam('sub');
    	$sub_option = $this->_getParam('sub_option');
    	
    	$option = empty($option) ? 'add' : $option;
    	
    	$this->view->assign('id', $id);
    	$this->view->assign('step', $step);
    	
    	$data = $this->_getParam('data');
    	
    	if($id == '') {
    		$this->view->assign('msg', $this->_lable['url_invalid']['value']);
    		$this->_helper->viewRenderer('step10');
    		header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/step1/");
    		return;
    	}
    	 
    	
    	
    	echo '<pre>';
    	print_r($data);
    	echo '</pre>';
    	
    	if($eexp_id != '' && $sub_option == 'edit') { //update
    		
    	} else { //insert
    		
    	}
    	
    }
    

	
}

//END class