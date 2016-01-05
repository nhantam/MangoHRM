<?php
/**
 * Model Locations
 * Last update Dec 15 2015
 * 
 * @package Front
 * @copyright Panpic technology
 * @author Panpic technology
 * @author position: PHP Developer
 * @version 1.0
 * @since Dec 15 2015
 */

class Front_Model_Locations extends Zend_Db_Table {
	
	
	protected $_db;
	private $_lang;
	private $_language;
	
	private $arr = array
	(	
		'fields'	=> '*',
		'primary'  	=> '',
		'cond'		=> '',
		'num'		=> 0,
		'offset'	=> 0,
		'_prefix'	=> 'config_',
		'_locations'=> 'locations',
		'_countries'=> 'countries',	
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
		$where[] = "id = '$this->primary' ";
		return $where;
	}
	
	function getKeyString() { return "id = $this->primary "; }	
	
	function table_locations(){ return $this->_prefix.$this->_locations; }

	function table_countries(){ return $this->_prefix.$this->_countries; }
	
	
	/**
	 * Get items
	 *
	 * @return array object
	 */
	function Items(){
		return $this->_db->fetchAssoc("SELECT id,name FROM ".$this->table_locations() );
	}
	
	/**
	 * 
	 * Get item by id
	 * @return array row
	 */
	function getItemById(){
		if($this->primary == '') return;
		
		$sql = "SELECT * FROM ".$this->table_locations()." WHERE ".$this->getKeyString();
		return $this->_db->fetchRow($sql);
	}
	
			
	/**
	 * Total rows
	 *
	 * @param string $cond
	 * @return int
	 */
	function counterItems(){ 
		
		$sql = "SELECT COUNT(c.id) FROM ".$this->table_locations()." AS c
			JOIN ".$this->table_countries()." AS d ON c.country_code = d.id $this->cond";
		
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
		
		$sql = "SELECT c.*, d.name AS country_name
				FROM ".$this->table_locations()." AS c
				JOIN ".$this->table_countries()." AS d
				ON c.country_code = d.id $this->cond ORDER BY c.id DESC ".$limit;
		
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
			$this->_db->insert($this->table_locations(), $params);
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
		
		if( $this->primary == '') return false;
		
		$this->_db->beginTransaction();
		
		try {			
			$this->_db->update($this->table_locations(), $params, $this->keyUpdate());
			$this->_db->commit();
			return true;			
		} catch (Exception $e){
			$this->_db->rollBack();
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