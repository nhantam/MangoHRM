<?php
/**
 * Model lang
 * Last update Jun 05 2014
 * 
 * @package Admin/language
 * @copyright Phoenixsotwareco.com
 * @author bang.webdeveloper@gmail.com
 * @author position: PHP Developer
 * @version 1.0
 * @since Jun 05 2014
 */

class Front_Model_Lang extends Zend_Db_Table {
	
	
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
		'_prefix'	=> 'panpic_',
		'_table'	=> 'lang_values'
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
		$this->_prefix 	= Zend_Registry::get('prefix');
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
		
		$where[] = "name ='$this->name'";
		$where[] = "lang ='$this->_lang'";
		
		return $where;
		
		//return "name ='$this->name'"; 
	}
	
	function getKeyString() { return "d.name ='$this->name'"; }	
	
	function table(){ return $this->_prefix.$this->_table; }	
	
	
	/**
	 * Get items
	 *
	 * @return array object
	 */
	function Items(){
		return $this->_db->fetchAssoc("SELECT name, value FROM ".$this->table() );
	}
	
	/**
	 * 
	 * Get item by id
	 * @return array row
	 */
	function getItemById(){
				
		if( $this->name == '') return ;
		
		$sql = "SELECT $this->fields FROM ".$this->table()." AS d WHERE d.lang = '$this->_lang' AND ".$this->getKeyString();
		
		return $this->_db->fetchRow($sql);
	}
	
			
	/**
	 * Total categories row
	 *
	 * @param string $cond
	 * @return int
	 */
	function counterItems(){ 
		$sql = "SELECT COUNT('dscr.name') FROM ".$this->table()." AS d";		
		return $this->_db->fetchOne($sql);
	}
	
	
	/**
	 * Get items
	 *
	 * @param string $cond
	 * @param int $num
	 * @param int $offset
	 * @return array mix
	 */
	function getItems(){
		
		$limit = ($this->num > 0) ? " LIMIT $this->offset, $this->num" : '';		
				
		$sql = "SELECT $this->fields FROM {$this->table()} AS d $this->cond ORDER BY name DESC ".$limit;
		
		return $this->_db->fetchAll($sql);
		
	}
	
		
	/**
	 * Insert item
	 *
	 * @param array $params	 
	 * @return bool
	 */
	function insertItem($params){
		
		$this->_db->beginTransaction();
		
		try {
			
			foreach ($this->_language as $k=>$vl) {
				$params['lang'] = $k;
				$this->_db->insert($this->table(), $params);
			}
					
			$this->_db->commit();			
			return true;		
		} catch (Exception $e){
			$this->_db->rollBack();
			//$e->getMessage(); //debug
			return false;			
		}
	}
	
	
	/**
	 * Update item
	 *
	 * @param array $params
	 * @param string $this->_model->name
	 * @return bool
	 */
	function updateItem($params){		
		
		if( $this->name == '' || $this->_lang == '' ) return false;
		
		$this->_db->beginTransaction();
		
		try {			
			$this->_db->update($this->table(), $params, $this->keyUpdate());
			$this->_db->commit();
			return true;			
		} catch (Exception $e){
			$this->_db->rollBack();
			$e->getMessage(); //debug
			return false;			
		}
	}
	
	
	/*
	 * Remove out database
	 * 
	 * @param string $this->_model->name
	 * @return bool
	 */
	function deleteItem(){
		$del = $this->_db->delete($this->table(), $this->keyUpdate());
		
		if($del) return true;
		else return false;
	}
		
	
	
	

}

//END class