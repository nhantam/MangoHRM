<?php
/**
 * Error controller exception
 * write log event and show error message
 * last update Mar 06 2014
 * 
 * @copyright NoNCdeal.com
 * @author bang.webdeveloper@gmail.com
 * @since 2010
 */

class ErrorController extends Zend_Controller_Action
{

	
	private $_dirApp;
	private $_myApp;
	private $_lable;

 
	function errorAction() {
		
		$this->_helper->viewRenderer->setNoRender(true);
		
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
		$this->view->assign('base_tlp_front', $this->_dirApp['file_template_front']);
		
			    
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
	   		    
	    $errors 	= $this->_getParam('error_handler');
		$exception 	= $errors->exception;		
		$controllerError = $this->getRequest()->getRequestUri();
		
		switch ($errors->type) {
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
				$this->getResponse()->setHttpResponseCode(404);
			    $msg = $exception->getMessage();			    
			    //$log = new Zend_Log( new Zend_Log_Writer_Stream($pathLog) );
                //$log->debug( date('Y-m-d H:i:s') .$controllerError ."\n" .$msg ."\n");
                				
				break;
				
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
				$this->getResponse()->setHttpResponseCode(404);
			    
				$msg = 'Đường dẫn bạn truy cập không tồn tại!<br />
						<a href="'.$this->_dirApp['base_url'].'">Nhấp chuột vào đẩy</a> để trở về trang chủ hoặc form tìm kiếm bên trên';
			    
				$msg = $exception->getMessage();
				
			    //$log = new Zend_Log( new Zend_Log_Writer_Stream($pathLog) );
                //$log->debug( date('Y-m-d H:i:s') .$controllerError ."\n" .$msg ."\n");
                
			    break;
				
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:			
			    $this->getResponse()->setHttpResponseCode(404);
			    $msg = $exception->getMessage(); //$this->lable['lang']['2_user_access_record'];
			    $this->getResponse()->clearBody();			
			        
                //$log = new Zend_Log( new Zend_Log_Writer_Stream($pathLog) );
                //$log->debug( date('Y-m-d H:i:s') .$controllerError ."\n" .$msg ."\n");
                
                break;
			    
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER:			
			    
			    $this->getResponse()->setHttpResponseCode(404);
			    $msg = $exception->getMessage();
			    //$log = new Zend_Log( new Zend_Log_Writer_Stream($pathLog) );
                //$log->debug( date('Y-m-d H:i:s') .$controllerError ."\n" .$msg ."\n");
			    
                break;

			case 500:
	            $this->getResponse()->setHttpResponseCode(404);
			    $msg = $exception->getMessage();
			    //$log = new Zend_Log( new Zend_Log_Writer_Stream($pathLog) );
                //$log->debug( date('Y-m-d H:i:s') .$controllerError ."\n" .$msg ."\n");
			    
                break;
	        
			default:
			    $this->getResponse()->setHttpResponseCode(404);
			    $msg = $exception->getMessage();
			    //$log = new Zend_Log( new Zend_Log_Writer_Stream($pathLog) );
                //$log->debug( date('Y-m-d H:i:s') .$controllerError ."\n" .$msg ."\n". $exception->getTraceAsString());
                break;
		}
		
		
		// Step 1: 
		// using redirect home page
		
		echo $msg;
		
		//$this->_redirect($this->_dirApp['base_url']);
			
		// Step 2:
		//header("refresh:".$this->lable['lang']['timewait'].";url=".$this->_dirApp['base_url'] );
		
		// Using show error message on web browser
		$this->view->assign('msg', $msg);
        $this->view->assign('msg_classbox', 'error_box'); 
		
    }
	
}

//END class