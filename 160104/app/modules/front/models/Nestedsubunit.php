<?php
/**
 * Models Company structure by Nest algorithm
 * Last update Dec 15 2015
 * 
 * @package front
 * @copyright Mango HRM
 * @author Panpic technology
 * @author position: PHP Developer team
 * @since  Dec 15 2015
 */

class Front_Model_Nestedsubunit extends Zend_Db_Table {
	
	
	protected $_db;
	
	private $arr = array
	(
		'_primary'	=> '',	
		'_lang'		=> '',
		'_language' => '',
		'_fields'	=> 'dscr.mcCategory',
		'_table'	=> 'config_subunit',
		'_tableDesc'=> 'config_subunit_desc',
	);
	
	
	public $my_fields = 'c.mcId, c.parents, dscr.mcCategory';
	public  $_parent = 0;	
	public 	$_data;
	public 	$_id = 'mcId';
	public 	$_orderArr;
	
	
	private static $instance;
	
	public static function getInstance(){ 
		if (!self::$instance){  
	        $c = __CLASS__;
            self::$instance = new $c;
	    } 
	    return self::$instance;
	}
	
	
	function init() { 
		// $this->_prefix = Zend_Registry::get('prefix');
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
		$where[] = "$this->_id = $this->_primary";
		$where[] = "lang = '$this->_lang'";
	
		return $where;
	}
	
	function getKeyString() { return "mcId = $this->_id AND lang = '$this->_lang' "; }	

	
	/**
	* Update info of node
	*
	* @param  array Data array store node info.
	* @param  int ID of node which you modify.
	* @param  int ID of parent node if you change parent node when you update current node
	*
	* @return A node modified and node info save to database.
	*/	
	function updateNode($data, $id = null, $newParentId = 0){

		$this->_db->beginTransaction();
		
		try {
			
			if( $id != ''){
				$nodeInfo = $this->getNodeInfo($id);
				$dscr['mcCategory'] = $data['mcCategory'];
				$this->_primary = $id;
				$update = $this->updateCategory($dscr);
			}
			
			if($newParentId != $id && $newParentId > 0){
				if($nodeInfo['parents'] != $newParentId){ $this->moveNode($id, $newParentId); }
			}
			
			$this->_db->commit();
			return true;
			
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;			
		} 
	}
	
	
	function updateCategory($params) { 
		return $this->_db->update($this->_tableDesc, $params, $this->keyUpdate());
	}
	
	
	/**
	* Move node to new parent (move: left - right - before - after)
	*
	* @param  int ID of node which you want move to new parent.
	* @param  int ID of parent node which you want apply new node
	* @param  array Case when you apply new node (apply: left position - right position - before position - after position)
	*
	* @return Change tree structure.
	*/	
	function moveNode($id, $parent = 0, $options = null){
		$this->_id = $id;
		$this->_parent = $parent;
		
		if($options['position'] == 'right' || $options == null)	$this->moveRight();
		
		if($options['position'] == 'left')	$this->moveLeft();
		
		if($options['position'] == 'after')	$this->movetAfter($options['brother_id']);
		
		if($options['position'] == 'before') $this->moveBefore($options['brother_id']);
	}
	
	
	/**
	* Move node to left postion a unit on a level
	*
	* @param  int ID of node which you want move to new position.
	* 
	* @return Change tree structure.
	*/
	function moveUp($id){
		$nodeInfo = $this->getNodeInfo($id);		
		$parentInfo = $this->getNodeInfo($nodeInfo['parents']);
		
		$sql = 'SELECT * FROM '.$this->_table.' WHERE lft < '.$nodeInfo['lft'].' AND parents = '.$nodeInfo['parents'].' ORDER BY lft DESC LIMIT 1';
		
		$nodeBrother = $this->_db->fetchRow($sql);
		if(!empty($nodeBrother)){			
			$options = array('position'=>'before','brother_id'=>$nodeBrother['mcId']);
			$this->moveNode($id, $parentInfo['mcId'], $options);
		}
		
	}
	
	
	/**
	* Move node to right postion a unit on a level
	*
	* @param  int ID of node which you want move to new position.
	* 
	* @return Change tree structure.
	*/
	function moveDown($id){
		$nodeInfo = $this->getNodeInfo($id);		
		$parentInfo = $this->getNodeInfo($nodeInfo['parents']);
		
		$sql = 'SELECT * FROM '.$this->_table.' WHERE lft > '.$nodeInfo['lft'].' AND parents = '.$nodeInfo['parents'].' ORDER BY lft ASC LIMIT 1';
		$nodeBrother = $this->_db->fetchRow($sql);
		
		if(!empty($nodeBrother)){			
			$options = array('position'=>'after','brother_id'=>$nodeBrother['mcId']);
			$this->moveNode($id,$parentInfo['mcId'],$options);
		}
	}
	
	
	/**
	* Get info of parent node
	*
	* @param  int ID of node which you want get info
	* 
	* @return Node info.
	*/
	function getParentNode($id){
		$infoNode = $this->getNodeInfo($id);
		$parentId = $infoNode['parents'];		
		return $this->getNodeInfo($parentId);
	}
	
	
	/**
	* Update ordering of all node in tree
	*
	* @param  array An array store info tree
	* @param  array An array store info of ordering
	* 
	* @return Change tree structure.
	*/
	function orderTree($data, $orderArr){
				
		$orderGroup = $this->orderGroup($data);				
		$newOrderGroup = array();
		foreach ($orderGroup as $key => $val){
			$tmpVal = array();
			foreach ($val as $key2 => $val2){
				$tmpVal[$key2] = $orderArr[$key2];
			}
			natsort($tmpVal);		
			$orderGroup[$key] = $tmpVal;
		}
		
		foreach ($orderGroup as $key => $val){
			$tmpVal = array();
			foreach ($val as $key2 => $val2){
				$info = $this->getNodeByLeft($key2);
				$tmpVal[$info['mcId']] = $val2;
			}
			$orderGroup[$key] = $tmpVal;
		}
	
		foreach ($orderGroup as $key => $val){
			foreach ($val as $key2 => $val2){
				$nodeID = $key2;
				$parent = $key;				
				$this->moveNode($nodeID, $parent);
			}
		}
	}
	
	
	/**
	* Get info of node
	* 2012-10-25
	* 
	* @param  int Left value of node
	* 
	* @return array Node info.
	*/
	protected function getNodeByLeft($left){
		
		$sql = "SELECT c.*, dscr.mcCategory FROM $this->_table AS c JOINE $this->_tableDesc AS dscr ON c.mcId=dscr.mcId AND c.lft = $left ";
		
		return $this->_db->fetchRow($sql);
	}
	
	
	/**
	* Create node groups
	*
	* @param  array An array store info tree
	* 
	* @return array of node groups
	*/		
	function orderGroup($data = null){
		$orderArr2 = array();
		
		if($data != null){
			$orderArr = array();
		 	if(count($data)>0){
		 		foreach ($data as $key => $val){
		 			$orderArr[$val['mcId']] = array();
		 			if(isset($orderArr[$val['parents']])){
		 				$orderArr[$val['parents']][] = $val['lft'];
		 			}
		 		}
		 		
		 		foreach ($orderArr as $key => $val){
		 			$tmp = array();
		 			$tmp = $orderArr[$key];
		 			if(count($tmp) >0){ $orderArr2[$key] = array_flip($val); }
		 		}
		 		
		 	}
		}
		
		$this->_orderArr = $orderArr2;
		return $this->_orderArr;
	}

	
	/**
	* Create ordering of node by left value
	*
	* @param int ID of parent of current node
	* @param int Letf value of current node
	* 
	* @return int An value of ordering 
	*/
	public function getNodeOrdering($parent, $left){
		$ordering = null;
		if(isset($this->_orderArr[$parent][$left]))
			$ordering = $this->_orderArr[$parent][$left] + 1;
			
		return $ordering;
	}
	
	/**
	* Processing move node to before position of other node
	*
	* @param int ID of node which you want move current node to before postion
	* 
	* @return Change tree structure
	*/
	protected function moveBefore($brother_id){
		
		$infoMoveNode = $this->getNodeInfo($this->_id);
		
		$lftMoveNode = $infoMoveNode['lft'];
		$rgtMoveNode = $infoMoveNode['rgt'];
		$widthMoveNode = $this->widthNode($lftMoveNode, $rgtMoveNode);		
		
		$sqlReset = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$rgtMoveNode.'), lft = (lft - '.$lftMoveNode.')   
					 WHERE lft BETWEEN '.$lftMoveNode.' AND '.$rgtMoveNode;
		
		$this->_db->query($sqlReset);
						
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$widthMoveNode.') WHERE rgt > '.$rgtMoveNode;
		$this->_db->query($slqUpdateRight);
				
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft - '.$widthMoveNode.') WHERE lft > '.$rgtMoveNode;		
		$this->_db->query($slqUpdateLeft);
								
		$infoBrotherNode = $this->getNodeInfo($brother_id);
		$lftBrotherNode = $infoBrotherNode['lft'];
				
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft + '.$widthMoveNode.') WHERE lft >= '.$lftBrotherNode.' AND rgt >0';
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$widthMoveNode.') WHERE rgt >= '.$lftBrotherNode;
		$this->_db->query($slqUpdateRight);
						
		$infoParentNode 	= $this->getNodeInfo($this->_parent);
		$levelMoveNode 		= $infoMoveNode['level'];
		$levelParentNode	= $infoParentNode['level'];
		$newLevelMoveNode  	= $levelParentNode + 1;
		
		$slqUpdateLevel = 'UPDATE '.$this->_table.' SET level = (level  - '.$levelMoveNode.' + '.$newLevelMoveNode.') WHERE rgt <= 0';
		$this->_db->query($slqUpdateLevel);
				
		$newParent 	= $infoParentNode['mcId'];
		$newLeft 	= $infoBrotherNode['lft'];
		$newRight 	= $infoBrotherNode['lft'] + $widthMoveNode - 1;
		$slqUpdateParent = 'UPDATE ' .$this->_table.'  
						  SET parents = '.$newParent.', lft = '.$newLeft.', rgt = '.$newRight.' WHERE mcId = '.$this->_id;
		$this->_db->query($slqUpdateParent);
				
		$slqUpdateNode = 'UPDATE '.$this->_table.' SET rgt = (rgt +  '.$newRight.'), lft = (lft +  '.$newLeft.') WHERE rgt <0';
		$this->_db->query($slqUpdateNode);		
	}
	
	
	/**
	* Processing move node to after position of other node
	* 	
	*
	* @param int ID of node which you want move current node to after postion
	* 
	* @return Change tree structure
	*/
	protected function movetAfter($brother_id){

		$infoMoveNode = $this->getNodeInfo($this->_id);
		
		$lftMoveNode = $infoMoveNode['lft'];
		$rgtMoveNode = $infoMoveNode['rgt'];
		$widthMoveNode = $this->widthNode($lftMoveNode, $rgtMoveNode);
		
		
		$sqlReset = 'UPDATE '.$this->_table.' 
					 SET rgt = (rgt - '.$rgtMoveNode.'), lft = (lft - '.$lftMoveNode.')   
					 WHERE lft BETWEEN '.$lftMoveNode.' AND '.$rgtMoveNode;
		$this->_db->query($sqlReset);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$widthMoveNode.') WHERE rgt > '.$rgtMoveNode;		
		$this->_db->query($slqUpdateRight);
				
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft - '.$widthMoveNode.') WHERE lft > '.$rgtMoveNode;		
		$this->_db->query($slqUpdateLeft);
				
		
		$infoBrotherNode = $this->getNodeInfo($brother_id);
		$rgtBrotherNode = $infoBrotherNode['rgt'];		
		
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft + '.$widthMoveNode.') WHERE lft > '.$rgtBrotherNode.' AND rgt >0';		
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$widthMoveNode.') WHERE rgt > '.$rgtBrotherNode;		
		$this->_db->query($slqUpdateRight);
		
		$infoParentNode = $this->getNodeInfo($this->_parent);
		$levelMoveNode 		= $infoMoveNode['level'];
		$levelParentNode	= $infoParentNode['level'];
		$newLevelMoveNode  = $levelParentNode + 1;
		
		$slqUpdateLevel = 'UPDATE '.$this->_table.' SET level = (level - '.$levelMoveNode.' + '.$newLevelMoveNode.') WHERE rgt <= 0';
		$this->_db->query($slqUpdateLevel);
				
		$newParent 	= $infoParentNode['mcId'];
		$newLeft 	= $infoBrotherNode['rgt'] + 1;
		$newRight 	= $infoBrotherNode['rgt'] + $widthMoveNode;
		$slqUpdateParent = 'UPDATE '.$this->_table.'  SET parents = '.$newParent.', lft = '.$newLeft.', rgt = '.$newRight.' WHERE mcId = '.$this->_id;	
		$this->_db->query($slqUpdateParent);
				
		$slqUpdateNode = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$newRight.'), lft = (lft + '.$newLeft.') WHERE rgt <0';		
		$this->_db->query($slqUpdateNode);
	}
	
	
	/**
	* Processing move node to left position of other node
	* 	
	*
	* @return Change tree structure
	* 
	*/
	protected function moveLeft(){
		
		$infoMoveNode = $this->getNodeInfo($this->_id);
		
		$lftMoveNode = $infoMoveNode['lft'];
		$rgtMoveNode = $infoMoveNode['rgt'];
		$widthMoveNode = $this->widthNode($lftMoveNode, $rgtMoveNode);
		
		$sqlReset = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$rgtMoveNode.'), lft = (lft - '.$lftMoveNode.') WHERE lft BETWEEN '.$lftMoveNode.' AND '.$rgtMoveNode;
		$this->_db->query($sqlReset);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$widthMoveNode.') WHERE rgt > '.$rgtMoveNode;
		$this->_db->query($slqUpdateRight);
				
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft - '.$widthMoveNode.') WHERE lft > '.$rgtMoveNode;
		$this->_db->query($slqUpdateLeft);
				
		$infoParentNode = $this->getNodeInfo($this->_parent);
		$lftParentNode = $infoParentNode['lft'];
		
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft + '.$widthMoveNode.') WHERE lft > '.$lftParentNode.' AND rgt > 0';
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$widthMoveNode.') WHERE rgt > '.$lftParentNode;
		$this->_db->query($slqUpdateRight);
				
		$levelMoveNode 		= $infoMoveNode['level'];
		$levelParentNode	= $infoParentNode['level'];
		$newLevelMoveNode  = $levelParentNode + 1;
		
		$slqUpdateLevel = 'UPDATE '.$this->_table.' SET level = (level - '.$levelMoveNode.' + '.$newLevelMoveNode.') WHERE rgt <= 0';
		$this->_db->query($slqUpdateLevel);
						
		$newParent 	= $infoParentNode['mcId'];
		$newLeft 	= $infoParentNode['lft'] + 1;
		$newRight 	= $infoParentNode['lft'] + $widthMoveNode;
		$slqUpdateParent = 'UPDATE '.$this->_table.' SET parents = '.$newParent.', lft = '.$newLeft.', rgt = '.$newRight.'  WHERE mcId = '.$this->_id;
		$this->_db->query($slqUpdateParent);
		
		$slqUpdateNode = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$newRight.'), lft = (lft + '.$newLeft.') WHERE rgt <0';
		$this->_db->query($slqUpdateNode);		
	}
	
	
	/**
	* Processing move node to right position of other node
	* 	
	*
	* @return Change tree structure
	*/
	protected function moveRight(){
		
		$infoMoveNode = $this->getNodeInfo($this->_id);
		
		$lftMoveNode = $infoMoveNode['lft'];
		$rgtMoveNode = $infoMoveNode['rgt'];
		$widthMoveNode = $this->widthNode($lftMoveNode, $rgtMoveNode);
		
		$sqlReset = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$rgtMoveNode.'), lft = (lft - '.$lftMoveNode.') WHERE lft BETWEEN '.$lftMoveNode.' AND '.$rgtMoveNode;
		$this->_db->query($sqlReset);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$widthMoveNode.') WHERE rgt > '.$rgtMoveNode;	
		$this->_db->query($slqUpdateRight);
				
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft - '.$widthMoveNode.') WHERE lft > '.$rgtMoveNode;
		$this->_db->query($slqUpdateLeft);
				
		$infoParentNode = $this->getNodeInfo($this->_parent);
		$rgtParentNode = $infoParentNode['rgt'];
		
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft + '.$widthMoveNode.') WHERE lft >= '.$rgtParentNode.' AND rgt > 0';		
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$widthMoveNode.') WHERE rgt >= '.$rgtParentNode;		
		$this->_db->query($slqUpdateRight);
				
		$levelMoveNode 	= $infoMoveNode['level'];
		$levelParentNode= $infoParentNode['level'];
		$newLevelMoveNode = $levelParentNode + 1;
		
		$slqUpdateLevel = 'UPDATE '.$this->_table.' SET level = (level - '.$levelMoveNode.' + '.$newLevelMoveNode.') WHERE rgt <= 0';
		$this->_db->query($slqUpdateLevel);
				
		$newParent 	= $infoParentNode['mcId'];
		$newLeft 	= $infoParentNode['rgt'];
		$newRight 	= $infoParentNode['rgt'] + $widthMoveNode - 1;
		$slqUpdateParent = 'UPDATE '.$this->_table.' SET parents = '.$newParent.', lft = '.$newLeft.', rgt = '.$newRight.'  WHERE mcId = '.$this->_id;
		$this->_db->query($slqUpdateParent);
				
		$slqUpdateNode = 'UPDATE '.$this->_table.' SET rgt = (rgt + '.$newRight.'), lft = (lft + '.$newLeft.') WHERE rgt <0';			
		$this->_db->query($slqUpdateNode);
	}

	
	/**
	* Insert a new node to tree (move: left - right - before - after)
	* 	
	*
	* @param  array An array store info of new node
	* @param  int ID of parent node which you want insert new node
	* @param  array Case when you apply new node (apply: left position - right position - before position - after position)
	*
	* @return Change tree structure.
	*/
	function insertNode($data, $parent = 1, $options = null) {
		$this->_data 	= $data;
		$this->_parent 	= $parent;

		if($options['position'] == 'right' || $options == null)	return $this->insertRight();
		
		if($options['position'] == 'left') return $this->insertLeft();
		
		if($options['position'] == 'after') return $this->insertAfter($options['brother_id']);
		
		if($options['position'] == 'before') return $this->insertBefore($options['brother_id']);		
	}
	
	
	/**
	* Insert a new node to right position of other node
	* 	
	*
	* @return Change tree structure
	*/
	protected function insertRight(){
				
		$parentInfo =  $this->getNodeInfo($this->_parent);
		$parentRight = $parentInfo['rgt'];
				
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = lft + 2 WHERE lft > '.$parentRight;
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = rgt + 2 WHERE rgt >= '.$parentRight;
		$this->_db->query($slqUpdateRight);
		
		$this->_db->beginTransaction();
		
		// $c['mcId'] 	= $this->_data['mcId'];		
		$c['parents']	= $this->_parent;
		$c['lft'] 		= $parentRight;
		$c['rgt'] 		= $parentRight + 1;
		$c['level'] 	= $parentInfo['level'] + 1;
		
		// $dscr['mcId']	= $this->_data['mcId'];
		$dscr['mcCategory']	= $this->_data['mcCategory'];
		
		try {			
			$this->_db->insert($this->_table, $c);		
			$last_id = $this->_db->lastInsertId( $this->_table );
			$dscr['mcId'] = $last_id;
			foreach ($this->_language as $k=>$vl) {
				$dscr['lang'] 	= $k; 
				$this->_db->insert($this->_tableDesc, $dscr);
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
	* Insert a new node to left position of other node
	* 	
	*
	* @return Change tree structure
	*/
	protected function insertLeft(){
				
		$parentInfo =  $this->getNodeInfo($this->_parent);
		$parentLeft = $parentInfo['lft'];
		
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = lft + 2 WHERE lft > '.$parentLeft;
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = rgt + 2 WHERE rgt > '.($parentLeft + 1);		
		$this->_db->query($slqUpdateRight);
		
		$this->_db->beginTransaction();
		
			//$c['mcId'] 		= $this->_data['mcId'];		
			$c['parents']	= $this->_parent;
			$c['lft'] 		= $parentLeft + 1;
			$c['rgt'] 		= $parentLeft + 2;
			$c['level'] 	= $parentInfo['level'] + 1;
			
			//$dscr['mcId']		= $this->_data['mcId'];
			$dscr['mcCategory']	= $this->_data['mcCategory'];

		try {			
			$this->_db->insert($this->_table,$c);
			$last_id = $this->_db->lastInsertId( $this->_table );
				
			$dscr['mcId'] = $last_id;
			$this->_db->insert($this->_tableDesc, $dscr);
			$this->_db->commit();
			return true; 
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;    		
		}
		
	}
	
	
	/**
	* Insert a new node to after position of other node
	* 	
	* 
	* @param int ID of node which you want insert new node to after postion
	*
	* @return Change tree structure
	*/
	protected function insertAfter($brother_id){
				
		$parentInfo = $this->getNodeInfo($this->_parent);		
		$brotherInfo = $this->getNodeInfo($brother_id);		
		
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = lft + 2 WHERE lft > '.$brotherInfo['rgt'];
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = rgt + 2 WHERE rgt > '.$brotherInfo['rgt'];
		$this->_db->query($slqUpdateRight);

		$this->_db->beginTransaction();
		
			//$c['mcId'] 		= $this->_data['mcId'];		
			$c['parents']	= $this->_parent;
			$c['lft'] 		= $brotherInfo['rgt'] + 1;
			$c['rgt'] 		= $brotherInfo['rgt'] + 2;
			$c['level'] 	= $parentInfo['level'] + 1;
			
			//$dscr['mcId']		= $this->_data['mcId'];
			$dscr['mcCategory']	= $this->_data['mcCategory'];

		try {			
			$this->_db->insert($this->_table,$c);	
			$last_id = $this->_db->lastInsertId( $this->_table );
				
			$dscr['mcId'] = $last_id;
			$this->_db->insert($this->_tableDesc, $dscr);
			$this->_db->commit();
			return true; 
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;    		
		}
		
	}
	
	/**
	* Insert a new node to before position of other node
	* 	
	* 
	* @param int ID of node which you want insert new node to before postion
	*
	* @return Change tree structure
	*/
	protected function insertBefore($brother_id){
		
		$parentInfo =  $this->getNodeInfo($this->_parent);		
		$brotherInfo =  $this->getNodeInfo($brother_id);		
		
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = lft + 2 WHERE lft >= '.$brotherInfo['lft'];
		$this->_db->query($slqUpdateLeft);
				
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = rgt + 2 WHERE rgt >= '.($brotherInfo['lft'] + 1);
		$this->_db->query($slqUpdateRight);

		$this->_db->beginTransaction();
		
			//$c['mcId'] 		= $this->_data['mcId'];		
			$c['parents']	= $this->_parent;
			$c['lft'] 		= $brotherInfo['rgt'];
			$c['rgt'] 		= $brotherInfo['lft'] + 1;
			$c['level'] 	= $parentInfo['level'] + 1;
			
			//$dscr['mcId']		= $this->_data['mcId'];
			$dscr['mcCategory']	= $this->_data['mcCategory'];

		try {			
			$this->_db->insert($this->_table,$c);
			$last_id = $this->_db->lastInsertId( $this->_table );
				
			$dscr['mcId'] = $last_id;
			$this->_db->insert($this->_tableDesc, $dscr);
			$this->_db->commit();
			return true; 
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;    		
		}
		
	}
	
	/**
	* Create a string from a data array 
	* 	
	* 
	* @param array a data array 
	*
	* @return string
	*/
	protected function createUpdateQuery($data){
		if (count($data) > 0) {
			$result = '';			
			$i = 1;
			foreach ( $data as $key => $val ) {
				if ($i == 1) {
					$result .= " " . $key . " = '" . $val . "' ";
				} else {
					$result .= " ," . $key . " = '" . $val . "' ";
				}
				$i ++;
			}
		}
		
		return $result;
	}
	
	/**
	* Create a string from a data array 
	* 	
	* 
	* @param array a data array 
	*
	* @return string
	*/
	public function createInsertQuery($data){
		if (count($data) > 0) {
			$cols = '';
			$values = '';
			$i = 1;
			foreach ( $data as $key => $val ) {
				if ($i == 1) {
					$cols .= "`" . $key . "`";
					$values .= "'" . $val . "'";
				} else {
					$cols .= ",`" . $key . "`";
					$values .= ",'" . $val . "'";
				}
				$i ++;
			}
		}
		
		$result['cols'] = $cols;
		$result['values'] = $values;
		return $result;
	}
	
	
	public function setTable($table) { $this->_table = $table; }

	/**
	* Calculate total nodes
	* 	
	* 
	* @param int ID of parent node
	* 
	* @return int Total nodes
	*/
	function totalNode($parents = 0){
		$result = $this->_db->fetchRow('SELECT lft,rgt FROM '.$this->_table.' WHERE parents = '.$parents);
		$total 	= ($result['rgt'] - $result['lft'] +1)/2;
		return $total;
	}

	/**
	* Width of a branch of tree
	* 	
	* 
	* @param int Left value of node
	* @param int Right value of node
	* 
	* @return int width of node
	*/
	public function widthNode($lft, $rgt){
		$width = $rgt - $lft + 1;
		return $width;
	}
	
	/**
	* Remove a node of tree
	* 	
	* 
	* @param int ID of node which you want remove
	* @param string. If it is 'branch', delete a branch of tree
	* 				 If it is 'node', delete a node of tree and update all nodes of branch
	* 
	* @return Change tree structure
	*/
	public function removeNode($id, $options = 'branch'){
		$this->_id = $id;
		
		if($options == 'branch') return $this->removeBranch();
		if($options == 'node') return $this->removeOne();
	}
	
	/**
	* Remove a branch of tree
	* 2012-10-25
	* 
	* @return Change tree structure
	*/
	protected function removeBranch(){
		
		$infoNodeRemove 	= $this->getNodeInfo($this->_id);		
		$rgtNodeRemove 		= $infoNodeRemove['rgt'];
		$lftNodeRemove 		= $infoNodeRemove['lft'];
		$widthNodeRemove 	= $this->widthNode($lftNodeRemove, $rgtNodeRemove);
		
		$sql = 'SELECT mcId FROM '.$this->_table.' WHERE lft BETWEEN '.$lftNodeRemove.' AND '.$rgtNodeRemove;
		$arr = $this->_db->fetchAll($sql);		
		
		$this->_db->beginTransaction();		
			
		$slqDelete = 'DELETE FROM '.$this->_table.' WHERE lft BETWEEN '.$lftNodeRemove.' AND '.$rgtNodeRemove;
		$slqUpdateLeft = 'UPDATE '.$this->_table.' SET lft = (lft - '.$widthNodeRemove.') WHERE lft > '.$rgtNodeRemove;
		$slqUpdateRight = 'UPDATE '.$this->_table.' SET rgt = (rgt - '.$widthNodeRemove.') WHERE rgt > '.$rgtNodeRemove;
						
		try {
			
			$this->_db->query($slqDelete);
			
			if(sizeof($arr) > 0) {
				foreach ($arr as $vl) {
					$this->_db->delete($this->_tableDesc, 'mcId = '.$vl['mcId']);
				}	
			}
			
			$this->_db->query($slqUpdateLeft);
			$this->_db->query($slqUpdateRight);
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;    		
		}		
	}
	
	
	/**
	* Remove an one of tree
	* 	
	* 
	* @return Change tree structure
	*/
	protected function removeOne(){
		
		$nodeInfo = $this->getNodeInfo($this->_id);
		$sql = 'SELECT mcId FROM '.$this->_table.' WHERE parents = '.$nodeInfo['mcId'].' ORDER BY lft ASC';		
		
		$childIds = $this->_db->fetchAll($sql);				
		rsort($childIds);		
		
		if(count($childIds) >0){
			foreach ($childIds as $key => $val){
				$id = $val;
				$parent = $nodeInfo['parents'];
				$options = array('position'=>'after','brother_id'=>$nodeInfo['mcId']);
				$this->moveNode($id, $parent, $options);
			}
			$this->removeNode($nodeInfo['mcId']);
		}
		
	}
	
	/**
	* Get info node of tree
	* 2012-10-25
	* 
	* @param int ID of node which you want get info
	*  
	* @return Change tree structure
	*/
	function getNodeInfo($id){
		if(empty($id)) return ;
		
		$sql = "SELECT c.*, $this->_fields FROM $this->_table AS c 
			JOIN $this->_tableDesc AS dscr ON c.mcId = dscr.mcId AND c.mcId = $id AND dscr.lang ='$this->_lang'";
		
		return $this->_db->fetchRow($sql);
	}
	
		
	/**
	* Get tree
	* 	
	* 
	* @param int ID of parent node
	* @param string A case of get node list
	* @param int ID of node which you don't want get info
	* @param int level of tree
	* @param int $num
	* @param int $offset
	*  
	* @return array Node list
	*/
	function listItem($parents = 0, $items = 'all', $exclude_id = null, $level = 0, $num='', $offset=''){
		
		$limit		= '';
		$lftExclude = '';
		$rgtExclude = '';
		$dataArr = array();
		$sqlParents = 'SELECT @parentLeft := lft,@parentRight := rgt FROM '.$this->_table.' WHERE parents = '.$parents.';';		
		$result = $this->_db->query($sqlParents);
				
		if($num > 0) $limit = ' LIMIT '.$offset.','.$num;
				
		$sqlItems = 'SELECT node.*, '.$this->_fields.' FROM '.$this->_table.' AS node 
				JOIN '.$this->_tableDesc.' AS dscr ON node.mcId = dscr.mcId AND dscr.lang ="'.$this->_lang.'" ';
		
		if($items == 'all'){
			$sqlItemsLR = ' AND node.lft >= @parentLeft AND node.rgt <= @parentRight ';
		}else{ $sqlItemsLR = ' AND node.lft > @parentLeft AND node.rgt < @parentRight '; }
							
		if($exclude_id != null && $exclude_id >0){
			$sqlExclude = '	SELECT lft, rgt FROM '.$this->_table.' WHERE mcId = '.$exclude_id;			
			$rowExclude = $this->_db->fetchRow($sqlExclude);
			$lftExclude = $rowExclude['lft'];
			$rgtExclude = $rowExclude['rgt'];
		}
		
		$sqlItems .= $sqlItemsLR;
		
		if($level != 0){ $sqlItems .= ' AND node.level <= '.$level; }
		
		$sqlItems .= ' ORDER BY node.lft '.$limit;				
		$result = $this->_db->fetchAll($sqlItems);
		
		if($result){			
			foreach($result as $row){
				if($row['lft'] < $lftExclude || $row['lft'] > $rgtExclude){					
					$orderValue	= $this->getNodeOrdering($row['parents'],$row['lft']);
					$row['orderValue'] = $orderValue;
					$dataArr[] = $row;
				}
			}
		}
		
		return $dataArr;		
	}
	
		
	
	/**
	 * counter items
	 *
	 * @param int level of tree
	 * 
	 * @return total
	*/
	function countItem($level = 0, $cond=''){
		
		$sql = "SELECT COUNT(c.mcId) AS total FROM $this->_table AS c
				JOIN $this->_tableDesc AS dscr ON c.mcId=dscr.mcId AND dscr.lang = '$this->_lang' ".$cond;
		
		if($level != 0){ $sql .= ' AND c.level <= '.$level; }
				
		return $this->_db->fetchOne($sql);
	}
	
	
	function countItemByCond($cond) {
		$sql = 'SELECT COUNT(mcId) AS total FROM '.$this->_table;				
		
		if($cond != ''){ $sql .= ' WHERE '.$cond; }
				
		return $this->_db->fetchOne($sql);
	}
	
	/**
	 * All items
	 * 2012-10-25
	 * 
	 * @param int $level
	 * @return array mix
	 */
	function items($level = 0, $num =0, $offset =0, $cond='')
	{
		$dataArr = array();
		$limit = '';
		if($num > 0) $limit = ' LIMIT '.$offset.','.$num;
		
		$sql = 'SELECT c.*, '.$this->_fields.' FROM '.$this->_table.' AS c 
				JOIN '.$this->_tableDesc.' AS dscr ON c.mcId=dscr.mcId AND dscr.lang ="'.$this->_lang.'" '.$cond;
		
		if($level != 0){ $sql .= ' AND c.level <= '.$level; }
		
		$sql .= ' ORDER BY c.lft ASC '.$limit;
		
		$result = $this->_db->fetchAll($sql);				
		if($result){			
			foreach($result as $row){
				$orderValue	= $this->getNodeOrdering($row['parents'], $row['lft']);
				$row['orderValue'] = $orderValue;
				$dataArr[] = $row;
			}
		}
		
		return $dataArr;
	}
	
	
	function itemsByCond($cond = 0, $num =0, $offset =0)
	{
		$dataArr = array();
		$limit = '';
		if($num > 0) $limit = ' LIMIT '.$offset.','.$num;
		
		$sql = 'SELECT c.*, '.$this->_fields.' FROM '.$this->_table.' AS c 
				JOIN '.$this->_tableDesc.' AS dscr ON c.mcId=dscr.mcId AND dscr.lang ="'.$this->_lang.'" ';
		
		if($cond != ''){ $sql .= ' AND '.$cond; }
		
		$sql .= ' ORDER BY c.lft ASC '.$limit;
		
		$result = $this->_db->fetchAll($sql);
		
		if($result){
			
			foreach($result as $row){
				$orderValue	= $this->getNodeOrdering($row['parents'], $row['lft']);
				$row['orderValue'] = $orderValue;
				$dataArr[] = $row;
			}
			
		}
		
		return $dataArr;		
	}
	
	
	/**
	 * Only node parent (not get node root)
	 * 2012-10-25
	 * 
	 * @param string $cond
	 * @param int $num
	 * @param int $offset
	 * @return array mix
	 */
	function parentNode($cond, $num =0, $offset =0, $order=' ORDER BY dscr.mcCategory ASC ') {
		$limit = '';
		if($num > 0) $limit = ' LIMIT '.$offset.','.$num;
		
		$sql = "SELECT c.*, $this->_fields FROM $this->_table AS c 
			JOIN $this->_tableDesc AS dscr ON c.mcId = dscr.mcId AND dscr.lang = '$this->_lang'";
		
		if($cond != ''){ $sql .= ' AND '.$cond;}		
		
		$sql .= $order.$limit;
		
		return $this->_db->fetchAll($sql);
	}
	
	
	/**
	 * function update from parentNode() above
	 * Nov 29 2013
	 */
	function parentNodeHome($cond, $num =0, $offset =0, $order=' ORDER BY dscr.mcCategory ASC ')
	{
		$limit = ($num > 0) ? " LIMIT $offset,$num" : '';
		
		$sqls = 'SELECT '.$this->my_fields.' FROM '.$this->_table.' AS c 
			JOIN '.$this->_tableDesc.' AS dscr ON c.mcId = dscr.mcId '.$cond.$order.$limit;
		
		return $this->_db->fetchAll($sqls);
	}
	
	
	
	
	/**
	 * update number Estore per career
	 *
	 * @param string $field
	 * @return boolean
	 */
	function updatePos($field){
		$result = $this->_db->query('UPDATE '.$this->_table.' SET '.$field.' WHERE '.$this->getKeyString());
		if($result) return true;
		else return false;		
	}
	
	
		
	/**
	* Create breadcrumbs for nodes of tree 
	* 2012-10-25
	* 
	* @param int ID of current node
	* @param int level of parent where you want get info
	* 
	* @return array An array store info of breadcrumbs
	* 
	*/
	function breadcrumbs($id, $level_stop = null){
				
		$sqls = "SELECT parent.*, $this->_fields FROM $this->_table AS node JOIN $this->_table AS parent
				ON (node.lft BETWEEN parent.lft AND parent.rgt) AND node.mcId = $id AND parent.parents <> 0 ";
		
		if(isset($level_stop)){ $sqls .= " AND parent.level > $level_stop "; }
		
		$sqls .= " JOIN $this->_tableDesc AS dscr ON parent.mcId=dscr.mcId ";
		$sqls .= ' ORDER BY parent.lft ASC';
		
		return $this->_db->fetchAll($sqls);
	}
	
	
	function catStrIN($mcId) {
		if( empty($mcId) ) return ;
		
		$sqls = "SELECT mc.mcId, mcdscr.mcCategory FROM $this->_table as mc RIGHT JOIN ( SELECT c.*, dscr.mcCategory FROM $this->_table AS c JOIN $this->_tableDesc AS dscr ON c.mcId = dscr.mcId AND c.mcId=$mcId ) AS test ON (mc.lft >=test.lft AND mc.rgt <= test.rgt) JOIN $this->_tableDesc AS mcdscr ON mc.mcId = mcdscr.mcId ORDER BY mc.mcId ASC ";
		
		$arr = $this->_db->fetchAll($sqls);				
		$catStrIN = $mcId;
				
		if(sizeof($arr) > 0) {
			foreach ($arr as $vl) {	$catStrIN .= ','.$vl['mcId']; }
		}
		
		return $catStrIN;
	}
	
	
	/**
	 * Get items 2 level from level parent
	 * Exp: aaa parent_level =1 (query get items have parent_level < level <= parent_level+2)
	 *
	 * @param int $mcId
	 * @return array
	 */
	function itemsTwoLevel($mcId) {
		if(empty($mcId)) return ;
		
		$sql = "SELECT mc.mcId, mc.parents, mc.level, mc.lft, mc.rgt, mcdscr.mcCategory 
			FROM ".$this->_table." as mc
			RIGHT JOIN
				( SELECT c.*, dscr.mcCategory FROM ".$this->_table." AS c 
					JOIN ".$this->_tableDesc." AS dscr ON c.mcId = dscr.mcId AND c.mcId =$mcId AND dscr.lang = '$this->_lang' 
				) AS test ON (mc.rgt < test.rgt) AND mc.lft > test.lft
			JOIN ".$this->_tableDesc." AS mcdscr ON mc.mcId = mcdscr.mcId AND mcdscr.lang = '$this->_lang' 
			ORDER BY mcdscr.mcCategory ASC";
		
		return $this->_db->fetchAll($sql);
	}
	
	
	function autoCategories($cond, $num=0, $offset='')
	{
		
	}
	
	
	function allItems($cond='AND node.mcId != 1') {
		$sql = "SELECT node.mcId, node.parents, node.level, node.lft, node.rgt, dscr.mcCategory FROM $this->_table AS node 
		JOIN $this->_tableDesc AS dscr ON node.mcId=dscr.mcId AND node.mcAvail=1 $cond ORDER BY node.lft ASC";
		return $this->_db->fetchAll($sql);		
	}
	
	
	/**
	 * Get two level Prev
	 * March 22 2013
	 * @param int $mcId
	 * @return array
	 */
	function twoLevelPrev($mcId) {
		if(empty($mcId)) return ;
		
		$sql = "SELECT mc.mcId, mc.parents, mc.level, mcdscr.mcCategory FROM {$this->_table} as mc 
				RIGHT JOIN ( 
					SELECT c.*, dscr.mcCategory FROM {$this->_table} AS c 
					JOIN {$this->_tableDesc} AS dscr ON c.mcId = dscr.mcId AND c.mcId=$mcId 
					) AS test ON (test.mcId =  mc.mcId OR test.parents=mc.mcId)
					JOIN {$this->_tableDesc} AS mcdscr ON mc.mcId = mcdscr.mcId 
				ORDER BY mc.level ASC";
		
		return $this->_db->fetchAll($sql);
	}
	
	
	/**
	 * combobox parent node
	 *
	 * @param string $cond
	 * @param int $num
	 * @param int $offset
	 * @param string $order
	 * @return array row
	 */
	function parentNodeCustomField($num =0, $offset =0) {		
		$limit = ($num > 0) ? "LIMIT $offset,$num" : '';
		
		$sql = "SELECT c.mcId, d.mcCategory FROM $this->_table AS c 
			JOIN $this->_tableDesc AS d 
			ON c.mcId=d.mcId AND (c.parents=1 OR c.level=1) AND d.lang ='$this->_lang' AND c.mcAvail=1 
			ORDER BY d.mcCategory ASC $limit";
		
		return $this->_db->fetchAll($sql);	
	}
	
	
	/**
	 * Check last node
	 * 
	 * @param string $cond
	 * @return array row
	 */
	function checkLastNode($cond) {
		
		$sql = "SELECT c.mcId, d.mcCategory FROM $this->_table AS c
			JOIN $this->_tableDesc AS d
			ON c.mcId=d.mcId AND d.lang ='$this->_lang' $cond";
	
		return $this->_db->fetchRow($sql);
	}
	
	
}

//END class