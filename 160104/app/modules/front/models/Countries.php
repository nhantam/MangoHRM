<?php
/**
 * Model Countries
 * Last update Dec 15 2015
 * 
 * @package Front
 * @copyright Panpic technology
 * @author Panpic technology
 * @author position: PHP Developer
 * @version 1.0
 * @since Dec 15 2015
 */

class Front_Model_Countries extends Zend_Db_Table {
	
	
	protected $_db;
	private $_lang;
	private $_language;
	
	private $arr = array
	(	
		'fields'	=> '*',
		'name'  	=> '',
		'cond'		=> '',
		'num'		=> 0,
		'offset'	=> 0,
		'_prefix'	=> 'config_',
		'_countries'=> 'countries'
	);
	
	
	
	private static $instance;
        
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }
    
	
	function init(){ 
		// $this->_prefix 	= Zend_Registry::get('prefix');
		$this->_db 		= Zend_Registry::get('master_db');
		$this->_lang 	= $_SESSION['lang'];
		$config = Zend_Registry::get('config');
		$this->_language = $config['language'];
	}

	
	function __get($properties) {
		if(array_key_exists($properties, $this->arr)) { return $this->arr[$properties]; }
	}
		
	function __set($properties, $value) {
		if(array_key_exists($properties, $this->arr)) { return $this->arr[$properties] = $value; }
	}
		
	function keyUpdate() { 
		
	}
	
	function getKeyString() { 
		
	}	
	
	function table_countries(){ return $this->_prefix.$this->_countries; }	
	
	
	/**
	 * Get items
	 *
	 * @return array object
	 */
	function Items(){
		return $this->_db->fetchAssoc("SELECT id,name FROM ".$this->table_countries() );
	}
	
	

}

//END class