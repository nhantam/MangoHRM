<?php
/**
 * Models Employee
 * Last update Now 02 2015
 * 
 * @package front
 * @copyright Panpic technology
 * @author bang.webdeveloper@gmail.com
 * @author pos PHP Developer
 * @since Now 02 2015
 */

class Front_Model_Employee extends Zend_Db_Table
{

	protected $_db;
	private $_lang;
	private $_language;
	
	private $arr = array 
	(
		'fields'	=> '*',
		'adminId' 	=> 0,
		'emp_id'	=> '',
		'avail'		=> 1,
		'cond'		=> '',
		'num'		=> 0,
		'offset'	=> 0,
		'_prefix'	=> 'panpic',
		'_config_pre'=>'config_',
			
		'_admin'				=> 'admin',
		'_country'				=> 'countries',
		'_country_province'		=> 'country_province',
		'_emp_logevent'			=> 'emp_logevent',
		'_emp_online'			=> 'emp_online',
		'_pay_currency'			=> 'pay_currency'
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
	
	
	
	
	function getKey(){ return array("adminId" => $this->adminId); }
	
	function getKeyString() { return "adminId= '$this->adminId' "; }

	function getEmpIdKeyString() { return "emp_number= $this->emp_id "; }
	
	function getActive() { return array("avail"	=> $this->avail); }
	
	
	function table_admin(){ return $this->_prefix.$this->_admin; }
	
	function table_emp_logevent(){ return $this->_prefix.$this->_emp_logevent; }
	
	function table_country(){ return $this->_config_pre.$this->_country; }
	function table_country_province(){ return $this->_prefix.$this->_country_province; }
	function table_pay_currency(){ return $this->_config_pre.$this->_pay_currency; }
	
	function table_emp_online(){ return $this->_prefix.$this->_emp_online; }
	
	
	function table_employee(){ return $this->_prefix.'employee'; }
	function table_contacts(){ return $this->_prefix.'emp_emergency_contacts'; } 
	function table_dependents(){ return $this->_prefix.'emp_dependents'; }
	function table_passport(){ return $this->_prefix.'emp_passport'; }
	function table_contract_extend(){ return $this->_prefix.'emp_contract_extend'; }
	function table_salary(){ return $this->_prefix.'emp_salary'; }
	function table_directdebit(){ return $this->_prefix.'emp_directdebit'; }
	function table_reportto(){ return $this->_prefix.'emp_reportto'; }
	
	function table_emp_images(){ return $this->_prefix.'emp_images'; }
	
	
	function getById(){
		if($this->adminId == '') return;
		
		$sql = "SELECT * FROM ".$this->table_admin()." WHERE adminId = $this->adminId";
		return $this->_db->fetchRow($sql);
	}
	
	
	function getByCond(){
		if($this->cond == '') return ;
		
		$sql = "SELECT * FROM ".$this->table_admin()." $this->cond ";
		return $this->_db->fetchRow($sql);
		
	}
	

	
	// Toan 29.11
	function checkUsernameExist($username){
		//$username = $admin['adminLogin'];
		
		if(empty($username)) return;
		
		$sql = "select adminLogin From ".$this->table_admin()." WHERE  adminLogin = '$username'";
		
		$arr = $this->_db->fetchRow($sql);
		
		if($arr)
			return true;
		
		return false;
		
	}
	
	function insertFist($params, $admin, $emp_image){
			
		$this->_db->beginTransaction();
	
		try {
			
			$this->_db->insert($this->table_employee(), $params);
			$last_id = $this->_db->lastInsertId($this->table_employee());

			// insert table admin
			if($admin['adminLogin'] != '') {
				$admin['emp_id'] = $last_id;
				$this->_db->insert($this->table_admin(), $admin);
			}
			
			// insert table emp_images
			if($emp_image) {
				$emp_image['object_id'] = $last_id;
				$this->_db->insert($this->table_emp_images(), $emp_image);
			}
						
			$this->_db->commit();
			return $last_id;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
	}
	
	function insertStep8($emp_salary, $emp_directdebit){
			
		$this->_db->beginTransaction();
	
		try {
				
			$this->_db->insert($this->table_salary(), $emp_salary);
			$last_id = $this->_db->lastInsertId($this->table_salary());
	
			// insert table panpic_emp_directdebit
			if($emp_directdebit != '') {
				$emp_directdebit['salary_id'] = $last_id;
				$this->_db->insert($this->table_directdebit(), $emp_directdebit);
			}
				
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
	}
	

	function insertStep9($emp_report){
			
		$this->_db->beginTransaction();
	
		try {
	
			// insert table panpic_emp_reportto
			if($emp_report != '') {
				$this->_db->insert($this->table_reportto(), $emp_report);
			}
	
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
	}
	
	function insertContacts($emp_info){
			
		$this->_db->beginTransaction();
	
		try {
//  		$this->_db->insert($this->table_employee(), $params);
// 			$last_id = $this->_db->lastInsertId($this->table_employee());
	
			// insert table Contacts
			if($emp_info['eec_name'] != '') {
				//$emp_info['emp_number'] = $last_id;
				$this->_db->insert($this->table_contacts(), $emp_info);
			}
	
			$this->_db->commit();
			return true; //$last_id;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
	}
	
	function insertDependents($emp_info){
			
		$this->_db->beginTransaction();
	
		try {
			// insert table Contacts
			if($emp_info['ed_name'] != '') {
				$this->_db->insert($this->table_dependents(), $emp_info);
			}
	
			$this->_db->commit();
			return true; //$last_id;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
	}
	
	function insertPassport($emp_info){
			
		$this->_db->beginTransaction();
	
		try {
			// insert table Contacts
			$this->_db->insert($this->table_passport(), $emp_info);
			
			$this->_db->commit();
			return true; //$last_id;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
	}
	
	function replaceExtend($extend_set_fields){
		
		if($this->emp_id == '') return false;
		
		$sql = "REPLACE INTO ".$this->table_contract_extend()." $extend_set_fields";
		
		$status = $this->_db->query($sql);
		
		if($status) {
			return true;
		} else {
			return false;
		}
		
		
		/*
		$this->_db->beginTransaction();
	
		try {
			// insert table panpic_emp_contract_extend
			$this->_db->insert($this->table_contract_extend(), $extend);
				
			$this->_db->commit();
			return true; //$last_id;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();//
			return false;
		}
		*/
	}
	
	/**
	 * updateSecond
	 * 
	 * @param unknown $params
	 * @return string|boolean
	 */
	function updateSecond($emp_info){        

		if($this->emp_id == '') return;
		
		$this->_db->beginTransaction();
	
		try {
			$this->_db->update($this->table_employee(), $emp_info , $this->getEmpIdKeyString() );
			
			$this->_db->commit();
			return true;   //  return $this->emp_id;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();
			return false;
		}
	}
	
	function updateStep7($emp_info, $contract_extend){
	
		if($this->emp_id == '') return;
	
		$this->_db->beginTransaction();
	
		try {
			
			$this->_db->update($this->table_employee(), $emp_info , $this->getEmpIdKeyString() ); 
			
			// check panpic_emp_contract_extend()
			if( $this->contractExtendExist() ){
				// Update
				$this->_db->update($this->table_contract_extend(), $contract_extend , $this->getEmpIdKeyString() );
			}else{
				//insert
				$this->_db->insert($this->table_contract_extend(), $contract_extend);
			}			
				
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			echo $e->getMessage();
			return false;
		}
	}
	
	function updateStep8($emp_salary, $emp_directdebit, $salary_id){
	
		if($salary_id == '') return;
	
		$this->_db->beginTransaction();
	
		try {
			
			$this->_db->update($this->table_salary(), $emp_salary , "salary_id= $salary_id" );
			
			if($emp_directdebit['account_number'] != '') {
				$this->_db->update($this->table_directdebit(), $emp_directdebit , "salary_id= $salary_id" );
			}
			
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			// echo $e->getMessage();
			return false;
		}
	}
	
	function updateStep9($emp_report, $report_id){
	
		if($report_id == '') return;
	
		$this->_db->beginTransaction();
	
		try {
				
			$this->_db->update($this->table_reportto(), $emp_report , "report_id= $report_id" );
				
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			// echo $e->getMessage();
			return false;
		}
	}
	
	function deleteStep8($salary_id, $emp_directdebit_id) {
		$this->_db->beginTransaction();
		
		try {
				
			$this->_db->delete($this->table_salary(), "salary_id= $salary_id");
			
			if($emp_directdebit_id != '') {
				$this->_db->delete($this->table_directdebit(), "id= $emp_directdebit_id");
			}
			
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			// echo $e->getMessage();
			return false;
		}
	}
	
	function deleteStep9($report_id) {
		$this->_db->beginTransaction();
	
		try {
	
			$this->_db->delete($this->table_reportto(), "report_id= $report_id");

			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			// echo $e->getMessage();
			return false;
		}
	}
	
	/**
	 * Insert row
	 *
	 * @param array $arr
	 * @return bool
	 */
	function insertObject($params){		
		
		$this->_db->beginTransaction();
		
		try {
			$this->_db->insert($this->table_admin(), $params);
			$last_id = $this->_db->lastInsertId($this->table_admin());
			$this->_db->commit();			
			return $last_id;			
		} catch (Exception $e){
			$this->_db->rollBack();
			//echo $e->getMessage(); 
			return false;			
		  }		
	}
	
	
	/**
	 * Update row
	 *
	 * @param array $arr
	 * @return bool
	 */
	function updateObject($params){	

		if($this->adminId == '') return; 
		
		$this->_db->beginTransaction();
		
		try {
			$this->_db->update($this->table_admin(), $params, $this->getKeyString());
			$this->_db->commit();			
			return true;			
		} catch (Exception $e){
			$this->_db->rollBack();
			return false;			
		}
	}
	
	
	/**
	 * Update fields by condition
	 * 
	 * @param string $field
	 * @param string $cond
	 * @return boolean
	 */
	function updateFields($field, $cond){
		
		$sql = "UPDATE ".$this->table_admin()." SET $field WHERE $cond";
		$result = $this->_db->query($sql);
		
		if($result) return true;
		else return false;		
	}
	
	
	
	/**
	 * insert Member Log event
	 * 
	 * @param array $params
	 * @return boolean
	 */
	function insertLog($params){
		
		$tt_log = $this->countIPlogEvent($params['emp_id']);
		
		if($tt_log > 5) { 
			$this->lastIPLoveByMember($params['emp_id']);
		}
	
		$this->_db->beginTransaction();
	
		try {
			$this->_db->insert($this->table_emp_logevent(), $params);
			$this->_db->commit();
			return true;
		} catch (Exception $e){
			$this->_db->rollBack();
			//echo $e->getMessage();
			return false;
		}
	}
	
	
	function countIPlogEvent($emp_id) {
		$sql = "SELECT COUNT(id) FROM ".$this->table_emp_logevent()." WHERE emp_id = $emp_id";
		return $this->_db->fetchOne($sql);
	}
	
	
	function lastIPLoveByMember($emp_id) {
		$sql = "SELECT id FROM ".$this->table_emp_logevent()." WHERE emp_id = $emp_id ORDER BY id ASC LIMIT 0,1";
		$id = $this->_db->fetchOne($sql);
		if($id) {
			$this->_db->delete($this->table_emp_logevent(), "id = $id");
		}
	}
	
	
	/**
	 * member online/offline
	 * 
	 * @param int $user_id
	 * @param datetime $tm
	 */
	function updateOnLogin($emp_id, $tm, $status='ON') {
		if(empty($emp_id)) return;
		
		$sql = "REPLACE INTO ".$this->table_emp_online()." SET emp_id = $emp_id, id_status='$status', tm = '$tm'";
		$this->_db->query($sql);
	}
	
	/**
	 * update member status off
	 * 
	 * @param minutes $gap
	 */
	function compareOffLogin($gap=10) {
		$gap = 10; // Gap value can be changed, this is in minutes.
		$tm = date ("Y-m-d H:i:s", mktime (date("H"),date("i")-$gap,date("s"),date("m"),date("d"),date("Y")));
		
		$sql = "UPDATE ".$this->table_emp_online()." SET id_status='OFF' WHERE  tm < '$tm'";
		$this->_db->query($sql);
	}
	
	
	function userOnlineById($emp_id) {
		if(empty($emp_id)) return ;
		
		$sql = "SELECT * FROM ".$this->table_emp_online()." AS c JOIN ".$this->table_admin()." AS d ON c.emp_id = d.emp_id AND c.emp_id = $emp_id";
		return $this->_db->fetchRow($sql);
	}
	
	
	function updateLastLogin($adminId) {
		if(empty($adminId)) return ;
	
		$last_update = date('Y-m-d H:i:s');
		$sql = "UPDATE ".$this->table_admin()." SET last_update = '$last_update' WHERE adminId = $adminId";
		return $this->_db->query($sql);
	}
	
	
	/**
	 * get country
	 */
	function country() {
		$sql = "SELECT id, name, flag FROM ".$this->table_country()." ORDER BY pos ASC";
		return $this->_db->fetchAssoc($sql);
	}
	
	/**
	 * get pay currency
	 */
	function currency($pay_grade_id) {
		//if($pay_grade_id == '') return;
		
		//$sql = "SELECT * FROM ".$this->table_pay_currency()." WHERE pay_grade_id = $pay_grade_id  ORDER BY currency_id ASC";
		//return $this->_db->fetchAssoc($sql);
	}
	
	function getCurrency($pay_grade_id) { 
		if($pay_grade_id == '') return;
		
		$sql = "SELECT c.*, d.currency_name
				FROM config_pay_currency AS c
				JOIN config_currency_type AS d
				ON c.currency_id = d.currency_id AND c.pay_grade_id = $pay_grade_id";
		
		return $this->_db->fetchAll($sql);
	}
	
	//load list salary STEP8
	function getSalary($emp_number) {
		if($emp_number == '') return;
	
		$sql = "SELECT a.*, c.name, d.account_number, d.account_name, d.account_bank, d.account_amount
				FROM panpic_emp_salary AS a
				JOIN config_general AS b
					ON a.paygrades_id = b.id 
					AND a.emp_number = $emp_number
					AND b.type= 'paygrade'
				JOIN config_general_desc AS c
					ON b.id = c.id AND c.lang = 'VN'
				LEFT JOIN panpic_emp_directdebit AS d
					ON a.salary_id = d.salary_id";
	
		return $this->_db->fetchAll($sql);
	}
	
	//load list Supervisors STEP9
	function getSupervisors($emp_number) {
		if($emp_number == '') return;
	
		$sql = "SELECT a.*, b.emp_firstname, b.emp_middle_name, b.emp_lastname
				FROM panpic_emp_reportto AS a
				JOIN panpic_employee AS b
					ON a.erep_sup_emp_number = b.emp_number
					AND a.erep_sub_emp_number = $emp_number";
	
		return $this->_db->fetchAll($sql);
	}
	
	//load list Subordinates STEP9
	function getSubordinates($emp_number) {
		if($emp_number == '') return;
	
		$sql = "SELECT a.*, b.emp_firstname, b.emp_middle_name, b.emp_lastname
		FROM panpic_emp_reportto AS a
		JOIN panpic_employee AS b
		ON a.erep_sub_emp_number = b.emp_number
		AND a.erep_sup_emp_number = $emp_number";
	
		return $this->_db->fetchAll($sql);
	}
	
	
	function editSalary($salary_id) {
		if($salary_id == '') return;
	
		$sql = "SELECT * 
				FROM panpic_emp_salary
				WHERE salary_id = $salary_id";
	
		return $this->_db->fetchRow($sql);
	}
	
	function editDirectdebit($salary_id) {
		if($salary_id == '') return;
	
		$sql = "SELECT * 
				FROM panpic_emp_directdebit
				WHERE salary_id = $salary_id ";
	
		return $this->_db->fetchRow($sql);
	}
	
	function getMinmax($pay_grade_id, $current_id) {
		if($pay_grade_id == '' || $current_id == '') return;
		
		$sql = " SELECT c.*, d.currency_name
			FROM config_pay_currency AS c JOIN config_currency_type AS d
			ON c.currency_id = d.currency_id AND c.pay_grade_id = $pay_grade_id AND c.currency_id = '$current_id'";
	
		return $this->_db->fetchRow($sql);
	}
	

	/**
	 * get employee
	 */
	function employee() {
		$sql = "SELECT * FROM ".$this->table_employee()." WHERE ".$this->getEmpIdKeyString();
		
		return $this->_db->fetchRow($sql);
	} 
	
	/**
	 * search employee and job title
	 * 
	 */
	function searchEmployeeAndTitle(){ 
		
		$sql = "SELECT a.emp_number, CONCAT(a.emp_firstname,' ',a.emp_middle_name, ' ', a.emp_lastname) AS fullname, c.name
					FROM panpic_employee AS a
					JOIN config_general AS b
					ON a.emp_job_title = b.id $this->cond
					JOIN config_general_desc AS c 
						ON b.id = c.id AND c.lang = '$this->_lang'";

		return $this->_db->fetchAll($sql);
		
		/*
		AND b.`type` = 'job_title'
		AND a.emp_number != '$emp_number'
		AND (a.emp_lastname LIKE '$q%' OR a.emp_firstname LIKE '$q%') 
		 */
	}
	
	/**
	 * get employee report by Id
	 * 
	 * @return array
	 */
	function reportById($report_id) {
		
		if($report_id == '') return ;
		
		$sql = "SELECT * FROM ".$this->table_reportto()." WHERE report_id = $report_id";
	
		return $this->_db->fetchRow($sql);
	}
	
	/** 
	 * get provinces by country id
	 * @param int $country
	 */
	function getCityState($country) {
		if( $country == '' ) return ;
	
		$sql = "SELECT c.pId, c.pName FROM ".$this->table_country_province()." AS c WHERE country = $country ORDER BY c.pPos ASC";
		return $this->_db->fetchAll($sql);
	}
	
	
	/**
	 * Get Contract Extend
	 * @return array
	 */
	function getContractExtend() {
		if($this->emp_id == '') return;
		$sql = "SELECT * FROM ".$this->table_contract_extend()." WHERE ".$this->getEmpIdKeyString();
		return $this->_db->fetchRow($sql);
	}
	
	function contractExtendExist($emp_number) {
		if($this->emp_id == '') return;
		$sql = "SELECT emp_number FROM ".$this->table_contract_extend()." WHERE ".$this->getEmpIdKeyString();
		$emp_number = $this->_db->fetchOne($sql);
		if($emp_number) return true;
		else return false;
	}
	
	
}
