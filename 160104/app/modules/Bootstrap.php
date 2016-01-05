<?php

class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
	
    public function _initModuleResourceAutoloader()
    {
        $this->getResourceLoader()->addResourceTypes(array(
            'modelResource' => array(
              'path'      => 'models/resources',
              'namespace' => 'Resource',
            )
        ));
    }
    
    public function _iniAuth() {
    	
		$module = $request->getModuleName();
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');

        if ('admin' == $module) {
            if ($bootstrap->hasPluginResource('AuthHttp')) {
                $bootstrap->bootstrap('AuthHttp');
            }
        }
    }
   	
    
}

//END Bootstrap