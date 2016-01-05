<?php
/**
 * Controllers Company structure
 * Last update Dec 15 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since Dec 15 2015
 */

class CompanystructureController extends Zend_Controller_Action {

	
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
		
		// $this->_model = Front_Model_Locations::getInstance();
			    
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
		//
    }

    /**
     * Form add
     */
    function addnestedAction() {
    	$model = Front_Model_Nestedsubunit::getInstance();
    	$data = $model->listItem(0, 'all', 0);
    	$row = '';
    	$idRoot = '';
    	$cId = $this->_getParam('id');
    	$option = $this->_getParam('option');
    	$option = !empty($option) ? $option : 'add';
    
    	if (!empty($cId) && ($option == 'edit' || $option == 'sub')) {
    		$row = $model->getNodeInfo($cId);
    		$this->view->assign('data', $row);
    	}
    
    	$arrNested = Myapp_DB_Nestedmaincat::getInstance()->cmbNested($data, $option, $cId, $row);
    	$this->view->assign('arrNested', $arrNested);
    	
    	//status data upload
    	$status = $this->_getParam('status');
    	if (!empty($status)) {
    		$this->view->assign('msg_classbox', 'valid_box');
    		$this->view->assign('msg', $this->_lable['lang'][$status]);
    	} else {
    		$this->view->assign('msg', "");
    		$this->view->assign('msg_classbox', 'warning_box');
    	}
    
    	$this->view->assign('option', $option);
    	$this->view->assign('heading', $this->_lable[$option]['value'] . ' ' . $this->_lable['category']['value']);
    
    	$arrMsg = $this->_helper->flashMessenger->getMessages();
    	$this->view->assign('msg_classbox', 'valid_box');
    	$flashMsg = (isset($arrMsg[0])) ? $arrMsg[0] : '';
    	$this->view->assign('msg', $flashMsg);
    }
    
    /**
     * Process add
     */
    function processnestedAction() {
    
    	// $this->_helper->viewRenderer->setNoRender(true);
    		
    	$model = Front_Model_Nestedsubunit::getInstance();
    	// $mcIdNew = $model->maxId();
    
    	$data = $model->listItem(0, 'all', 0);
    	$orderArr = $model->orderGroup($data);
    	$row = '';
    
    	$action = $this->_getParam('option');
    	$data = $this->_getParam('data');
    	$primary = $data['mcId'];
    	$parents = $data['parents'];
    	$cName = $data['mcCategory'];
    	
    	/*
    	$cId = empty($primary) ? $mcIdNew : $primary;
    	if (empty($cId)) {
    		$this->_helper->flashMessenger->addMessage($this->_lable['please_select_category']['value']);
    		$this->_redirect($this->_control."/addnested/");
    		return;
    	}
    	*/
    
    	if ($action == 'edit' && !empty($primary)) {
    		$row = $model->getNodeInfo($primary);
    		$this->view->assign('data', $row);
    	}
    
    	$nested = Myapp_DB_Nestedmaincat::getInstance();
    	$arrNested = $nested->cmbNested($data, $action, $primary, $row);
    	$this->view->assign('arrNested', $arrNested);
    		
    
    		$node = array('mcId' => $primary, 'mcCategory' => $cName);
    		
    		$validation = Myapp_Valid_Data::getInstance();
    		$validation->required = $this->_lable['required_input']['value'] . $this->_lable['category']['value'];
    		$validation->validNotEmpty('mcCategory', $cName);
    
    		if ($validation->run() !== true ) {
    
    			if ($option == 'edit') {
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    			} else {
    				$this->view->assign('msg', $this->_lable['fail']['value']);
    			}
    			
    			$this->view->assign('alert', 'danger');
    			$valid = $validation->error_array;
    			$this->view->assign('valid', $valid);
    			$this->_helper->viewRenderer('addnested');
    			return;
    		}
    
    
    		if ($action == 'edit' && !empty($primary)) {
    			
    			$update = $model->updateNode($node, $primary, $parents);
    			if ($update) { 
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['update_succ']['value']);
    				$this->_helper->viewRenderer('nogrant');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/viewnested/");
    				return; 
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['update_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('addnested');
    				return;
    			}
    			
    			
    		} else {
    			
    			$insert = $model->insertNode($node, $parents);
    			
    			if ($insert) { 
    				$this->view->assign('alert', 'success');
    				$this->view->assign('msg', $this->_lable['add_succ']['value']);
    				$this->_helper->viewRenderer('nogrant');
    				header("refresh:" . $this->_lable['timewait']['value'] . ";url=" . $this->_base_url. $this->_control ."/viewnested/");
    				return;
    			} else {
    				$this->view->assign('alert', 'danger');
    				$this->view->assign('msg', $this->_lable['add_fail']['value']);
    				$this->view->assign('data', $data);
    				$this->_helper->viewRenderer('addnested');
    				return;
    			}
    			
    		}
    	
    }
    
    
    /**
     * List
     */
    function viewnestedAction() {
    
    	$this->view->assign('heading', 'Company Structure');
    	
    	$txtsearch = $this->_getParam('id');
    	$keySearch = '';
    	$cond = '';
    	if($txtsearch != '') {
    		$cond = " AND dscr.mcCategory LIKE '%$txtsearch%' ";
    		$keySearch = "id=" . $txtsearch;
    	}
    
    	$arrMsg = $this->_helper->flashMessenger->getMessages();
    	$this->view->assign('msg_classbox', 'valid_box');
    	$flashMsg = (isset($arrMsg[0])) ? $arrMsg[0] : '';
    	$this->view->assign('msg', $flashMsg);
    
    	$model = Front_Model_Nestedsubunit::getInstance();
    	$totalItems = $model->countItem('', $cond);
    	$paginator = Zend_Paginator::factory(range(1, $totalItems));
    	$page = $this->_getParam('page');
    	$curpage = !empty($page) ? $page : 0;
    	$perpage = $this->_getParam('c');
    	$itemsPerPage = !empty($perpage) ? $perpage : 15;
    	$paginator->setItemCountPerPage($itemsPerPage);
    	$paginator->setCurrentPageNumber($curpage);
    	$paginator->setPageRange($this->_lable['category_rangs']['value']);
    
    	$startLimit = ($curpage * $itemsPerPage) > 0 ? ($curpage * $itemsPerPage) - $itemsPerPage : ($curpage * $itemsPerPage);
    	$this->view->assign('items', $model->items(0, $itemsPerPage, $startLimit, $cond));
    	$this->view->assign('paginator', $paginator->getPages());
    
    	$this->view->assign('controller', $this->_getParam('controller'));
    	$this->view->assign('action', $this->_getParam('action'));
    
    	if ($keySearch != '') {
    		$ext = $keySearch . "&page=";
    	} else {
    		$ext = "page=";
    	}
    	$this->view->assign('pageUrl', $this->_dirApp['admin_url'] . $this->_control . '/viewnested/?' . $ext);
    	$this->view->assign('urlPos', $this->_dirApp['admin_url'] . $this->_control . '/updatepos');
    	$this->view->assign('search', $txtsearch);
    	
    }
    
    
    
    function ajxviewnestedAction() {
    	$model = Front_Model_Nestedsubunit::getInstance();
    
    	$cond = '';
    	$addUrl = '';
    	$mcId = $this->_getParam('mcid');
    
    	if ($mcId != '') {
    		$cond = ' mcId=' . $mcId;
    		$addUrl = '/mcid/' . $mcId;
    
    		$totalItems = $model->countItemByCond($cond);
    		$paginator = Zend_Paginator::factory(range(1, $totalItems));
    		$page = $this->_getParam('page');
    		$curpage = !empty($page) ? $page : 0;
    		$perpage = $this->_getParam('c');
    		$itemsPerPage = !empty($perpage) ? $perpage : 15;
    		$paginator->setItemCountPerPage($itemsPerPage);
    		$paginator->setCurrentPageNumber($curpage);
    		$paginator->setPageRange($this->_dirApp['page']['admin_rangs']);
    		$startLimit = ($curpage * $itemsPerPage) > 0 ? ($curpage * $itemsPerPage) - $itemsPerPage : ($curpage * $itemsPerPage);
    
    		$items = $model->itemsByCond(" c.mcId=$mcId ", $itemsPerPage, $startLimit);
    	} else {
    		$totalItems = $model->countItem();
    		$paginator = Zend_Paginator::factory(range(1, $totalItems));
    		$page = $this->_getParam('page');
    		$curpage = !empty($page) ? $page : 0;
    		$perpage = $this->_getParam('c');
    		$itemsPerPage = !empty($perpage) ? $perpage : 15;
    		$paginator->setItemCountPerPage($itemsPerPage);
    		$paginator->setCurrentPageNumber($curpage);
    		$paginator->setPageRange($this->_dirApp['page']['admin_rangs']);
    		$startLimit = ($curpage * $itemsPerPage) > 0 ? ($curpage * $itemsPerPage) - $itemsPerPage : ($curpage * $itemsPerPage);
    
    		$items = $model->items(0, $itemsPerPage, $startLimit);
    	}
    
    	$this->view->assign('items', $items);
    	$this->view->assign('paginator', $paginator->getPages());
    	$this->view->assign('controller', $this->_getParam('controller'));
    	$this->view->assign('action', $this->_getParam('action'));
    	$this->view->assign('urlAjx', $this->_control . DS . 'ajxviewnested' . $addUrl);
    	$this->view->assign('urlPos', $this->_dirApp['admin_url'] . DS . $this->_control . DS . 'updatepos');
    }
    
    /**
     * Remove menu physical
     *
     */
    function delnestedAction() {
    
    	$model = Front_Model_Nestedsubunit::getInstance();
    	$id = $this->_getParam('id');
    
    	if( !empty($id) ){
    
    		$status = $model->removeNode($id, 'branch');
    
    		if($status) {
    			$this->view->assign('msg_classbox', 'valid_box');
    			$this->view->assign('msg', $this->_lable['lang']['del_succ']);
    			$this->_helper->viewRenderer('message');
    			header("refresh:".$this->_lable['lang']['timewait'].";url=".$this->_dirApp['base_url'].DS.$this->module.DS.$this->_control.DS."viewnested".DS);
    			return;
    		} else {
    			$this->view->assign('msg_classbox', 'error_box');
    			$this->view->assign('msg', $this->_lable['lang']['del_fail']);
    			$this->_helper->viewRenderer('message');
    			header("refresh:".$this->_lable['lang']['timewait'].";url=".$this->_dirApp['base_url'].DS.$this->module.DS.$this->_control.DS."viewnested".DS);
    			return;
    		}
    
    	} else {
    		$this->view->assign('msg_classbox', 'error_box');
    		$this->view->assign('msg', $this->_lable['lang']['del_fail']);
    		$this->_helper->viewRenderer('message');
    		header("refresh:".$this->_lable['lang']['timewait'].";url=".$this->_dirApp['base_url'].DS.$this->module.DS.$this->_control.DS."viewnested".DS);
    		return;
    	}
    
    	//$this->_helper->flashMessenger->addMessage($this->_lable['lang']['update_succ']);
    	//$this->_redirect($this->_dirApp['base_url'].DS.$this->module.DS.$this->_control.DS."viewnested".DS);
    	//return;
    	 
    	/*
    	 $this->view->assign('msg_classbox', 'error_box');
    	$this->view->assign('msg', "Chức năng tạm đóng! Chỉ khi nào thật sự cần thiết mới được Admin mở ra");
    	$this->_helper->viewRenderer('message');
    	//$this->_helper->viewRenderer->setNoRender(true);
    	*/
    }
    
    
    function updateposAction() {
    	
    	$cat = Admin_Model_Category::getInstance();
    	$mcId = $this->_getParam('catId');
    	$mcPos = $this->_getParam('pos');
    
    	//Update
    	$data = 'mcPos=' . $mcPos;
    	$cat->primary = $mcId;
    
    	if ($mcId != '' && $mcPos != '') {
    		//$this->_helper->viewRenderer->setNoRender(true);
    		$update = $cat->updatePos($data);
    		if ($update) {
    			//echo $this->_lable['lang']['update_succ'];
    			$this->_helper->viewRenderer->setNoRender(true);
    			//return;
    		} else {
    			//echo $this->_lable['lang']['update_fail'];
    			$this->_helper->viewRenderer->setNoRender(true);
    			//return;
    		}
    	}
    }
    
    // delete icon and update null
    function delimgAction() {
    	$this->_helper->viewRenderer->setNoRender(true);
    
    	//$type= $this->_getParam('type');
    	$id = $this->_getParam('id');
    
    	if (!empty($id)) {
    
    		$catDesc = Admin_Model_Categorydesc::getInstance();
    		$field = 'mcIcon =""';
    
    		$status = $catDesc->delImageByIdType($id, $this->_dir_icon);
    
    		if ($status == true) {
    			$catDesc->primary = $id;
    			$catDesc->updateIMGField($field);
    			echo 1;
    			return;
    		} else {
    			echo 0;
    			return;
    		}
    	}
    }
    
    /**
     * Close function
     *
     */
    function updateAction()
    {
    	$this->_helper->viewRenderer->setNoRender(true);
    	$cat = Admin_Model_Category::getInstance();
    
    	//level 1 $cond = " AND c.mcParentId=1 AND c.mcAvail=1 AND c.updateStatus=0 ";
    	//level 2 AND n.parents=1 AND n.level=1
    	//Level 3 AND n.level=2
    	//Level 4 AND n.level=3
    	//Level 5 AND n.level=4
    
    	$cond = " AND c.mcAvail=1 AND c.updateStatus=0 JOIN es_maincat_nest AS n ON n.mcId = c.mcParentId AND n.level=4 ";
    
    	$totalItems = $cat->counterRows($cond);
    	$paginator = Zend_Paginator::factory(range(1, $totalItems));
    	$page = $this->_getParam('page');
    	$curpage = !empty($page) ? $page : 0;
    	$perpage = $this->_getParam('c');
    	$itemsPerPage = !empty($perpage) ? $perpage : 10;
    	$paginator->setItemCountPerPage($itemsPerPage);
    	$paginator->setCurrentPageNumber($curpage);
    	$paginator->setPageRange($this->_dirApp['page']['admin_rangs']);
    	$startLimit = ($curpage * $itemsPerPage) > 0 ? ($curpage * $itemsPerPage) - $itemsPerPage : ($curpage * $itemsPerPage);
    	$items = $cat->updateNested($cond, $itemsPerPage, $startLimit);
    
    	if (sizeof($items) > 0) {
    		$model = Front_Model_Nestedsubunit::getInstance();
    		$orderArr = $model->orderGroup($model->listItem(0, 'all', 0));
    
    		foreach ($items as $vl) {
    
    			$parents = $vl['mcParentId'];
    
    			$node = array('mcId' => $vl['mcId'],
    					'mcCategory' => addslashes($vl['mcCategory']),
    					'mcIcon' => $vl['mcIcon'],
    					'mcTitle' => $vl['mcTitle'],
    					'mcKeyword' => addslashes($vl['mcKeyword']),
    					'mcDescription' => addslashes($vl['mcDescription']));
    
    			$existNested = $cat->existNested($vl['mcId']);
    
    			if (!$existNested) {
    				$parentExist = $cat->existNested($parents);
    				if ($parentExist) {
    					$insert = $model->insertNode($node, $parents);
    					if ($insert) {
    						$param['updateStatus'] = 1;
    						$cat->primary = $vl['mcId'];
    						$cat->updateCat($param);
    						echo '<br /> ID ' . $vl['mcId'] . ' had processed';
    					}
    				}
    			}
    		} //foreach
    	} //if
    }
    
    
    function leveloneAction() {
    
    	$this->_helper->viewRenderer->setNoRender(true);
    	header('Content-Type: text/html; charset=utf-8');
    
    	$cond = '(c.parents=1 OR c.level=1) AND c.mcAvail=1';
    	$nodeLevelOne = Front_Model_Nestedsubunit::getInstance()->parentNode($cond);
    
    	$cat = '{';
    
    	$i = 0;
    	foreach ($nodeLevelOne as $node) {
    
    		$sub = ' > ';
    
    		if ($i == 0) {
    			$cat .= '"' . $node['mcId'] . '":"' . stripslashes($node['mcCategory']) . ' ' . $sub . '"';
    		} else {
    			$cat .= ',"' . $node['mcId'] . '":"' . stripslashes($node['mcCategory']) . ' ' . $sub . '"';
    		}
    
    		$i++;
    	}
    
    	$cat .= '}';
    
    	echo $cat;
    
    }
    
    
    
    function sublevelAction() {
    
    	$this->_helper->viewRenderer->setNoRender(true);
    	header('Content-Type: text/html; charset=utf-8');
    
    	$mcId = $this->_getParam('id');
    	$mcId = str_replace('/', '', $mcId);
    
    	if (empty($mcId)) {
    		$parentsNode = Front_Model_Nestedsubunit::getInstance()->parentNodeCustomField();
    		$sub = ' > ';
    		foreach ($parentsNode as $node) {
    			$tmp[$node['mcId']] = stripslashes($node['mcCategory']) . ' ' . $sub;
    		}
    
    		echo json_encode($tmp);
    	} else {
    
    		$productCat = Front_Model_Nestedsubunit::getInstance()->itemsTwoLevel($mcId);
    		$nodeLevelOne = Myapp_DB_Nestedmaincat::getInstance()->formatTree($productCat, $mcId);
    
    		if ($productCat != $mcId && sizeof($productCat) >= 1) {
    			$cat = '{';
    
    			$i = 0;
    			foreach ($nodeLevelOne as $node) {
    
    				$sub = !empty($node['submenu']) ? ' > ' : '';
    
    				if ($i == 0) {
    					$cat .= '"' . $node['mcId'] . '":"' . stripslashes($node['mcCategory']) . ' ' . $sub . '"';
    				} else {
    					$cat .= ',"' . $node['mcId'] . '":"' . stripslashes($node['mcCategory']) . ' ' . $sub . '"';
    				}
    
    				$i++;
    			}
    
    			$cat .= '}';
    
    			echo $cat;
    		} else {
    			echo '';
    		}
    	}
    	
    }
    
    
    
    function ajxnodeAction() {
    	
    	$this->_helper->viewRenderer->setNoRender(true);
    	header('Content-Type: text/html; charset=utf-8');
    
    	$mcId = $this->_getParam('id');
    	$mcId = str_replace('/', '', $mcId);
    
    	if (empty($mcId)) {
    		$parentsNode = Front_Model_Nestedsubunit::getInstance()->parentNodeCustomField();
    		$sub = ' > ';
    		foreach ($parentsNode as $node) {
    			$tmp[$node['mcId']] = stripslashes($node['mcCategory']) . ' ' . $sub;
    		}
    
    		echo json_encode($tmp);
    	} else {
    
    		$productCat = Front_Model_Nestedsubunit::getInstance()->itemsTwoLevel($mcId);
    		$nodeLevelOne = Myapp_DB_Nestedmaincat::getInstance()->formatTree($productCat, $mcId);
    
    		if ($productCat != $mcId && sizeof($productCat) >= 1) {
    			$cat = '{';
    
    			$i = 0;
    			foreach ($nodeLevelOne as $node) {
    
    				$sub = !empty($node['submenu']) ? ' > ' : '';
    
    				if ($i == 0) {
    					$cat .= '"' . $node['mcId'] . '":"' . stripslashes($node['mcCategory']) . ' ' . $sub . '"';
    				} else {
    					$cat .= ',"' . $node['mcId'] . '":"' . stripslashes($node['mcCategory']) . ' ' . $sub . '"';
    				}
    
    				$i++;
    			}
    
    			$cat .= '}';
    
    			echo $cat;
    		} else {
    			echo '';
    		}
    	} 
    
    }
	
	
}

//END class