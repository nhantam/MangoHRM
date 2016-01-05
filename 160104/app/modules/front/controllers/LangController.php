<?php
/**
 * Controllers Lang variables
 * Last update Nov 05 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Nov 05 2015
 */

class LangController extends Zend_Controller_Action {

	
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
		
		$this->_model = Front_Model_Lang::getInstance();
			    
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

        $this->view->assign('task', $this->_lable['add']['value'] . ' ' . $this->_lable['lang_var']['value']);

        $id = $this->_getParam('id');
        $option = $this->_getParam('option');
        $option = !empty($option) ? $option : 'add';

        $data = array();
        if (!empty($id) && $option == 'edit') {
            $this->_model->name = $id;
            $data = $this->_model->getItemById();
        }

        $this->view->assign('data', $data);
        $this->view->assign('option', $option);

        //$this->_model->name = '12';
        //$data = $this->_model->getItemById();
    }

    
    /**
     * 
     * Process add
     */
    function addAction() {
        $this->view->assign('task', $this->_lable['add']['value'] . ' ' . $this->_lable['lang_var']['value']);
        $data = $this->_getParam('data');
        $name = $data['name'];
        $value = $data['value'];

        $option = $this->_getParam('option');
        $this->view->assign('option', $option);

        $data = array('name' => $name, 'value' => addslashes($value));
        //@ Validation				
        $validation = Myapp_Valid_Data::getInstance();
        $validation->required = '';
        $validation->validNotEmpty('name', $name);

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

        if (!empty($name) && $option == 'edit') { //Update
            $this->_model->name = $name;
            $update = $this->_model->updateItem($data);
            if ($update) {
                $this->view->assign('alert', 'success');
                $this->view->assign('msg', $this->_lable['update_succ']['value']);
                $this->_helper->viewRenderer('index');
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
            $this->_model->name = $name;
            $exist = $this->_model->getItemById();

            if (!empty($exist)) {
                $this->view->assign('alert', 'danger');
                $this->view->assign('msg', sprintf($this->_lable['var_exist']['value'], $primary));
                $this->view->assign('data', $data);
                $this->_helper->viewRenderer('index');
                return;
            }

            $insert = $this->_model->insertItem($data);

            if ($insert) {
                $this->view->assign('alert', 'success');
                $this->view->assign('msg', $this->_lable['add_succ']['value']);
                $this->_helper->viewRenderer('index');
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
        //Javascript grid       
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