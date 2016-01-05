<?php
/**
 * Models Employee
 * Last update Now 10 2015
 * 
 * @package front
 * @copyright Panpic technology
 * @author bang.webdeveloper@gmail.com
 * @author pos PHP Developer
 * @since Now 10 2015
 */

class Front_Model_General extends Zend_Db_Table {
	
	
	protected $_db;
	private $_lang;
	private $_language;
	
	
	private $arr = array
	(	
		'fields'	=> 'c.type, d.*',
		'primary'  	=> 0,
		'cond'		=> '',
		'num'		=> 0,
		'offset'	=> 0,
		'_prefix'	=> 'config_',
		'_table'		=> 'general',
		'_general_desc'	=> 'general_desc',	
		'_type'			=> '' /*blocktype*/
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
		return "id ='$this->primary'"; 
	}
	
	
	function updateByLang() {
		$where[] = "id ='$this->primary'";
		$where[] = "lang ='$this->_lang'";
		return $where;
	}
	
	function getKeyString() { return "c.id ='$this->primary'"; }	
	
	function table_general(){ return $this->_prefix.$this->_table; }

	function table_general_desc(){ return $this->_prefix.$this->_general_desc; }
	
		
	
	/**
	 * 
	 * Get item by id
	 * 
	 * @param int $this->primary
	 * @return array row
	 */
	function getItemById(){
				
		if( $this->primary == '') return ;
		
		$sql = "SELECT $this->fields
				FROM ".$this->table_general()." AS c
				JOIN ".$this->table_general_desc()." AS d
				ON c.id = d.id AND d.lang='$this->_lang' AND ".$this->getKeyString();
		
		return $this->_db->fetchRow($sql);
	}
	
	
	/**
	 * 
	 * Get item by condition
	 * 
	 * @param string $this->cond
	 * @return array row
	 */
	function getItemByCond(){
				
		if( $this->cond == '') return ;
		
		if($this->_type != '') {
			$cond = $this->cond." AND c.type = '$this->_type' ";
		}
		
		$sql = "SELECT $this->fields
				FROM ".$this->table_general()." AS c
				JOIN ".$this->table_general_desc()." AS d
				ON c.id = d.id AND d.lang='$this->_lang' $cond";
		
			
		return $this->_db->fetchRow($sql);
	}
	
			
	/**
	 * Total categories row
	 *
	 * @param string $cond
	 * @return int
	 */
	function counterItems(){ 
		
		$cond = $this->cond;
		
		if($this->_type != '') {
			$cond .= " AND c.type = '$this->_type' ";
		}
		
		$sql = "SELECT COUNT('c.id')
				FROM ".$this->table_general()." AS c
				JOIN ".$this->table_general_desc()." AS d
				ON c.id = d.id AND d.lang='$this->_lang' $cond";
		
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
				
		$cond = $this->cond;
		
		if($this->_type != '') {
			$cond .= " AND c.type = '$this->_type' ";
		}
		
		$sql = "SELECT *
				FROM ".$this->table_general()." AS c
				JOIN ".$this->table_general_desc()." AS d
				ON c.id = d.id AND d.lang='$this->_lang' $cond ORDER BY c.date_add $limit";
		
		return $this->_db->fetchAll($sql);		
	}
	
	
	/**
	 * Get combobox General Setting
	 *
	 * @param inherit $this->getItems();
	 * 
	 * @return array mix (general|items)
	 */
	function parseCombobox(){
            //$this->cond = " c.type IN('blocktype','openingtype') ";
            $general_items = $this->getItems();
            $cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/admin_joblist.ini', 'GENERAL');
            $general_array = $cbx->toArray();        
            $general_preset = $general_array['general'];
                        
            $general_box = array();
            foreach ($general_items as $key=>$vl) {
                    $type = $vl['type'];
                    if(array_key_exists($type, $general_preset)) {         		
                            $general_box[$type][$vl['id']] = array('name'=>$general_preset[$type], 'record'=> $vl);        		
                    }
            }

            return array('general'=>$general_preset, 'items'=>$general_box);
	}
	
	
	
	function getSomeFields(){
	
		$limit = ($this->num > 0) ? " LIMIT $this->offset, $this->num" : '';
	
		$cond = $this->cond;
	
		if($this->_type != '') {
			$cond .= " AND c.type IN($this->_type) ";
		}
	
	 $sql = "SELECT c.type, d.id, d.name FROM ".$this->table_general()." AS c
				JOIN ".$this->table_general_desc()." AS d ON c.id = d.id AND d.lang='$this->_lang' $cond ORDER BY d.name ASC $limit";
		
		return $this->_db->fetchAll($sql);
	}
	
	
	function selectItems($type){
		
		$this->_type = $type;
		$general_items = $this->getSomeFields();
	
		$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/admin_joblist.ini', 'GENERAL');
		$general_array = $cbx->toArray();
		$general_preset = $general_array['general'];
	
		$general_box = array();
		foreach ($general_items as $key=>$vl) {
			$type = $vl['type'];
			if(array_key_exists($type, $general_preset)) {
				$general_box[$type][$vl['id']] = array('name'=>$general_preset[$type], 'record'=> $vl);
			}
		}
	
		return array('general'=>$general_preset, 'items'=>$general_box);
	}
	
	
	function getSomeFieldsTime(){
	
		$limit = ($this->num > 0) ? " LIMIT $this->offset, $this->num" : '';
	
		$cond = $this->cond;
	
		if($this->_type != '') {
			$cond .= " AND c.type IN($this->_type) ";
		}
	
		$sql = "SELECT c.type, d.id, d.name FROM ".$this->table_general()." AS c
				JOIN ".$this->table_general_desc()." AS d ON c.id = d.id AND d.lang='$this->_lang' $cond ORDER BY d.id ASC $limit";
	
		return $this->_db->fetchAll($sql);
	}
	
	
	function selectAllItems($type){
	
		$this->_type = $type;
		$general_items = $this->getSomeFieldsTime();
	
		$cbx = new Zend_Config_Ini(APPLICATION_PATH.'/configs/general.ini', 'SETTING');
		$general_array = $cbx->toArray();
		$general_preset = $general_array['general'];
		
		$paygrades = $general_array['paygrades'];
		$box = $general_array['box'];
		
		$setting = $general_array['setting'];
		$employee = $general_array['employee'];
	
		$general_box = array();
		foreach ($general_items as $key=>$vl) {
			$type = $vl['type'];
			
			if(array_key_exists($type, $general_preset)) {
				$general_box[$type][$vl['id']] = array('name'=>$general_preset[$type], 'record'=> $vl);
			}
			
			if(array_key_exists($type, $paygrades)) {
				$general_box[$type][$vl['id']] = array('name'=>$paygrades[$type], 'record'=> $vl);
			}
			
			if(array_key_exists($type, $box)) {
				$general_box[$type][$vl['id']] = array('name'=>$box[$type], 'record'=> $vl);
			}
			
			if(array_key_exists($type, $setting)) {
				$general_box[$type][$vl['id']] = array('name'=>$setting[$type], 'record'=> $vl);
			}
			
			if(array_key_exists($type, $employee)) {
				$general_box[$type][$vl['id']] = array('name'=>$employee[$type], 'record'=> $vl);
			}
			
		}
	
		return array('general'=>$general_preset, 'items'=>$general_box);
	}
	
		
	/**
	 * Insert item
	 *
	 * @param array $params	 
	 * @return bool
	 */
	function insertItem($params, $desc){
		
		$this->_db->beginTransaction();
		
		try {
			$this->_db->insert($this->table_general(), $params);
			$last_id = $this->_db->lastInsertId($this->table_general());
			
			
			foreach ($this->_language as $k=>$vl) {
				$desc['id']		= $last_id;
				$desc['lang'] 	= $k;
				$this->_db->insert($this->table_general_desc(), $desc);
			}
			
			$this->_db->commit();
			return true;		
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();
			return false;			
		}
	}
	
	
	/**
	 * Update item
	 *
	 * @param array $params
	 * @param string $this->_model->primary
	 * @return bool
	 */
	function updateItem($params, $desc){		
		$this->_db->beginTransaction();
		
		try {			
			$this->_db->update($this->table_general(), $params, $this->keyUpdate());
			$this->_db->update($this->table_general_desc(), $desc, $this->updateByLang());
			
			$this->_db->commit();
			return true;			
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;			
		}
	}
	
	
	/**
	 * Insert multi records
	 *
	 * @param array $params
	 * @param array $multi
	 */
	function insertMulti($params, $multi=''){
		$this->_db->beginTransaction();
		
		try {
			$this->_db->insert($this->table_general(), $params);			
			$last_id = $this->_db->lastInsertId($this->table());
			
			if(!empty($multi)) {
				
				$total = sizeof($multi['parent']);
				
				for ($i = 0; $i < $total; $i++){
					$record = array(
						'name' 	=> $multi['name'][$i],
						'type' 	=> $params['type'],
						'date_add' => $params['last_update'],
						'last_update'=> $params['last_update']);					
					$this->_db->insert($this->table(), $record);
				}					
			}
					
			$this->_db->commit();			
			return $last_id;		
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;			
		}
	}
	
	
	function updateMulti($params, $multi=''){		
		$this->_db->beginTransaction();
		
		try {			
			$this->_db->update($this->table(), $params, $this->keyUpdate());
			
			if(!empty($multi)) {
				
				$total = sizeof($multi['name']);
				
				for ($i = 0; $i < $total; $i++){
					
					$record = array(
						'name' 	=> $multi['name'][$i],
						'type' 	=> $params['type'],
						'last_update'=> $params['last_update']);
					
					$new_id = $multi['id'][$i];
						
					if(empty($new_id) && !empty($record['name']) ) { //add
						$record['date_add'] = $params['last_update'];
						$this->_db->insert($this->table(), $record);
					} else { //update
						$this->_db->update($this->table(), $record , "id='$new_id'");
					}
				}					
			}
			
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
	 * @param string $this->_model->primary
	 * @return bool
	 */
	function deleteItem(){
		$del = $this->_db->delete($this->table(), $this->keyUpdate());
		
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
		$result = $this->_db->query("UPDATE {$this->table()} SET $fields WHERE ".$this->keyUpdate());
		if($result) return true;
		else return false;		
	}
	
	
}

//END class