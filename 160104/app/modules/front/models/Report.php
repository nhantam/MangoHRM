<?php
/**
 * Models Pay grades
 * Last update Dec 09 2015
 * 
 * @package front
 * @copyright Panpic technology
 * @author @Panpic technology
 * @author pos PHP Developer
 * @since Dec 09 2015
 */

class Front_Model_Paygrades extends Zend_Db_Table {
	
	
	protected $_db;
	private $_lang;
	private $_language;
	
	
	private $arr = array
	(	
		'fields'	=> '*',
		'primary'  	=> 0,
		'currency_id'=> '',	
		'cond'		=> '',
		'num'		=> 0,
		'offset'	=> 0,
		'_prefix'	=> 'config_',
		'_table'		=> 'general',
		'_general_desc'	=> 'general_desc',	
		'_type'			=> ''
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
		$where[] = "pay_grade_id ='$this->primary'";
		$where[] = "currency_id ='$this->currency_id'";
		return $where;
	}
	
	function getKeyString() { return "c.pay_grade_id = $this->primary AND c.currency_id = '$this->currency_id' "; }	
	
	function table_currency_type(){ return $this->_prefix.'currency_type'; }
	function table_pay_currency(){ return $this->_prefix.'pay_currency'; }

	function table_general(){ return $this->_prefix.'general'; }
	function table_general_desc(){ return $this->_prefix.$this->_general_desc; }
	
	
	function getCurrencyType() {
		$sql = "SELECT currency_id,code,currency_name FROM ".$this->table_currency_type();
		return $this->_db->fetchAssoc($sql);
	}
	
	
	
	function getItemById(){
		if( $this->primary == '' || $this->currency_id == '') return ;
	
		$sql = "SELECT c.*, d.name
					FROM ".$this->table_pay_currency()." AS c
					JOIN ".$this->table_general_desc()." AS d
						ON c.pay_grade_id = d.id AND ".$this->getKeyString()." AND d.lang = '$this->_lang'";
	
		return $this->_db->fetchRow($sql);
	}
	
	
	/**
	 * Get items
	 *
	 * @return array mix
	 */
	function getItems(){ 
		if( $this->primary == '') return ;
		
		$sql = "SELECT c.*, d.name
					FROM ".$this->table_pay_currency()." AS c
					JOIN ".$this->table_general_desc()." AS d
					ON c.pay_grade_id = d.id AND c.pay_grade_id = $this->primary AND d.lang = '$this->_lang'";
		
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
			$this->_db->insert($this->table_pay_currency(), $params);
			$this->_db->commit();			
			return true;		
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;			
		}
	}
	
	
	/**
	 * Update item
	 *
	 * @param array $params
	 * @param string $this->primary
	 * @param string $this->currency_id
	 * @return bool
	 */
	function updateItem($params){	

		if( $this->primary == '' || $this->currency_id == '') return false;
		
		$this->_db->beginTransaction();
		
		try {			
			$this->_db->update($this->table_pay_currency(), $params, $this->keyUpdate());
			
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
	 * @param int $this->->primary
	 * @param string $this->currency_id
	 * @return bool
	 */
	function deleteItem(){
		if( $this->primary == '' || $this->currency_id == '') return false;
		
		$del = $this->_db->delete($this->table_pay_currency(), $this->keyUpdate());
		
		if($del) return true;
		else return false;
	}

	
	/**
	 * update somes fields
	 *
	 * @param string $fields
	 * @return bool
	 */
	function updatePos($fields){
		$result = $this->_db->query("UPDATE {$this->table_pay_currency()} SET $fields WHERE ".$this->keyUpdate());
		if($result) return true;
		else return false;		
	}
	
	
}

//END class