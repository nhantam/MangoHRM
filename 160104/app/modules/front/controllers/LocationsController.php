<?php
/**
 * Controllers Locations
 * Last update Dec 15 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Dec 15 2015
 */

class LocationsController extends Zend_Controller_Action {

	
	private $_userInfo;
	private $_myCookie;
	private $_dirApp;
	private $_model;

	private $_base_url;
	private $_module;
	private $_control;
	
	private $_lable;
	
		
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
		
		$this->_model = Front_Model_Locations::getInstance();
			    
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
	   	
	   	if( empty($this->_userInfo->adminId) ) {
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
		
        $id = $this->_getParam('id');
        $option = $this->_getParam('option');
        $option = !empty($option) ? $option : 'add';

        $this->view->assign('heading', $this->_lable[$option]['value'].' Locations');
        
        $data = array();
        if (!empty($id) && $option == 'edit') {
            $this->_model->primary = $id;
            $data = $this->_model->getItemById();
        }

        $this->view->assign('data', $data);
        $this->view->assign('option', $option);
        
        $countries = Front_Model_Countries::getInstance()->Items();
        $this->view->assign('countries', $countries);
        
    }

    
    /**
     * 
     * Process add
     */
    function addAction() {
    	
        $data = $this->_getParam('data');
        $primary = $this->_getParam('primary');
        $option = $this->_getParam('option');
        
        $name 	= $data['name'];
        $country_code = $data['country_code'];

        $this->view->assign('heading', $this->_lable[$option]['value'].' Locations');
        
        $this->view->assign('data', $data);
        $this->view->assign('option', $option);
        
        // Validation				
        $validation = Myapp_Valid_Data::getInstance();
        $validation->required = $this->_lable['please_input']['value'].' Name';
        $validation->validNotEmpty('name', $name);
        
        $validation->required = $this->_lable['please']['value'].' '.$this->_lable['select']['value'].' '.$this->_lable['countries']['value'];
        $validation->validNotEmpty('country_code', $country_code);

        if ($validation->run() !== true) {
        	
            $this->view->assign('alert', 'danger');
            if ($option == 'edit') {
                $this->view->assign('msg', $this->_lable['update_fail']['value']);
            } else {
                $this->view->assign('msg', $this->_lable['add_fail']['value']);
            }

            $this->view->assign('valid', $validation->error_array);
            $this->view->assign('data', $data);
            $this->_helper->viewRenderer('index');
            return;
        }

        if (!empty($primary) && $option == 'edit') { //Update
        	
            $this->_model->primary = $primary;
            $update = $this->_model->updateItem($data);
            
            if ($update) {
                $this->view->assign('alert', 'success');
                $this->view->assign('msg', $this->_lable['update_succ']['value']);
                $this->_helper->viewRenderer('nogrant');
                header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/list/");
                return;
            } else {
                $this->view->assign('alert', 'danger');
                $this->view->assign('msg', $this->_lable['update_fail']['value']);
                $this->view->assign('data', $data);
                $this->_helper->viewRenderer('index');
                return;
            }
        } else { //insert
            
            $insert = $this->_model->insertItem($data);

            if ($insert) {
                $this->view->assign('alert', 'success');
                $this->view->assign('msg', $this->_lable['add_succ']['value']);
                $this->_helper->viewRenderer('nogrant');
                header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/index/");
                return;
            } else {
                $this->view->assign('alert', 'danger');
                $this->view->assign('msg', $this->_lable['add_fail']['value']);
                $this->view->assign('data', $data);
                $this->_helper->viewRenderer('index');
                return;
            }
        }
    }
    

    /**
     * List items
     * 
     * @return void
     */
    function listAction() { 
    	
    	$items = $this->_model->getItems();
    	$this->view->assign('items', $items);
    	
    }

    /**
     * Remove out database
     * @return void
     */
    function delAction() {
        $id = $this->_getParam('id');

        if (empty($id)) {
            $this->_redirect( $this->_base_url. $this->_control );
        }

        $this->_model->name = $id;
        $del = $this->_model->deleteItem();

        if ($del) {
            $this->view->assign('alert', 'success');
            $this->view->assign('msg', $this->_lable['del_succ']['value']);
            header("refresh:" . $this->_lable['timewait'] . ";url=" . $this->_base_url. $this->_control ."/view/");
        } else {
            $this->view->assign('alert', 'danger');
            $this->view->assign('msg', $this->_lable['del_fail']['value']);
            header("refresh:" . $this->_lable['timewait'] . ";url=" . $this->_base_url. $this->_control ."/view/");
        }
    }
	
	
}

//END class