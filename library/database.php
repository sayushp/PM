<?php
require_once('config.php');
class database
{
	private $con;
	private function database()
	{
		global $con;
		$connected = true;
		$this->con=mysqli_connect(CONFIG::DB_HOST, CONFIG::DB_USER, CONFIG::DB_PSW);
		if (mysqli_connect_errno())
			$connected = false;

		if (!mysqli_select_db($this->con,CONFIG::DB_DB))
			$connected = false;

		if (!$connected)
			echo "Problems connecting to the database\n";
			
		mysqli_query($this->con,"SET CHARACTER SET utf8'");
		mysqli_query($this->con,"SET NAMES utf8'");
	}

	public static function get_instance()
	{
		static $db;
		if (!is_object($db)) {
			$db = new database();
		}
		return $db;
	}

	public function query($query)
	{
		return mysqli_query($this->con,$query);
	}

	public function free_field($field, $value)
	{
		$this->format_string($field);
		$this->format_string($value);

		$result = $this->query("SELECT *
							FROM users
							WHERE ".$field." = '".$value."'");
		$count = mysqli_num_rows($result);
		if ($count === 0 && $count !== false) {
			return true;
		}
		else {
			return false;
		}
	}
    
	public function free_field_db($table,$field, $value,$ID=false)
	{
		$this->format_string($field);
		$this->format_string($value);
		if($ID)
		$ww=" AND id!='$ID'";
		$result = $this->query("SELECT *
							FROM ".$table."
							WHERE ".$field." = '".$value."'".$ww);
		$count = mysqli_num_rows($result);
		if ($count === 0 && $count !== false) {
			return true;
		}
		else {
			return false;
		}
	}

	public function free_field_user($field, $value,$ID=false)
	{
		$this->format_string($field);
		$this->format_string($value);

		$query="SELECT *
							FROM users
							WHERE ".$field." = '".$value."'";
		if($ID) { $query.=" AND ID!='$ID'";}
		$result = $this->query($query);					
		$count = mysqli_num_rows($result);
		if ($count === 0 && $count !== false) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function free_field_table($table,$field, $value,$ID)
	{
		$this->format_string($field);
		$this->format_string($value);
		$query="SELECT *
							FROM `".$table."`
							WHERE `".$field."` = '".$value."'" ; 
							if($ID) { $query.=" AND ID!='$ID'";}
							
		$result = $this->query($query);
		$count = mysqli_num_rows($result);
		if ($count === 0 && $count !== false) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function dbinsert($table,$values)
	{
		if(!empty($values))
		{
			$fields='';
			$val='';
			foreach($values as $key => $value){
				$this->format_string($value);
				$fields.="`".$key."`,";
				$val.='"'.addslashes($value).'",';
			}
			$fields = substr($fields, 0, strlen($fields)-1);
			$val = substr($val, 0, strlen($val)-1);
			$sql = "INSERT INTO `" . $table . "` (".$fields.") VALUES (".$val.")";
			$this->query($sql);
			$pid=mysqli_insert_id($this->con);
			return $pid;
		}
	}

	public function dbupdate($table,$value,$field,$id)
	{
		$val='';
		foreach($value as $key => $value) {
		$this->format_string($value); 
		 $val.= '`'.$key.'`="'.addslashes($value).'",'; 
		}
		$val = substr($val, 0, strlen($val)-1);
		 $sql="UPDATE `".$table."` SET ".$val." WHERE `".$field."`='".$id."' "; 
		 
		$result = $this->query($sql);
		return $result;
	}

	public function dbdelete($table,$field,$id)
	{
	 $sql="DELETE FROM ".$table." WHERE `".$field."`='".$id."'";
		$result=$this->query($sql);
		return $result;
	}
    
	public function format_string($str)
	{
		$str = stripslashes($str);
		$str = mysqli_real_escape_string($this->con,$str);
		return $str;
	}

	public function fetch ($result)
	{
		
		if ($result == false) return false;
		return mysqli_fetch_array($result );
	}

	public function to_array($result)
	{
		if ($result==false) return false;
		$a = array ();
		while ($row = $this->fetch($result)) array_push($a, $row);
		return $a;
	}

	public function get_field_value ( $table, $field, $condition )
	{
		 
		$r = $this->query('SELECT `'.$field.'` FROM `'.$table.'`'.( $condition ? ' WHERE '.$condition : '' ));
		if ( ($r == false) || ( mysqli_num_rows($r) == 0 ) ) return false;
		$r = $this->fetch($r); 
		return $r[$field];
	}

	public function get_fields_value( $table, $condition=false )
	{
		$result = $this->query('SELECT * FROM `'.$table.'`'.( $condition ? ' WHERE '.$condition : '' ) );
		if ( ($result == false) || ( mysqli_num_rows($result) == 0 ) ) return false;
		return $this->to_array ($result);
	}

	public function get_fields_value1( $table, $condition=false )
	{
		$result = $this->query('SELECT * FROM `'.$table.'`'.( $condition ? ' WHERE '.$condition : '' ) );
		echo mysql_num_rows($result);
		if ( ($result == false) || ( mysqli_num_rows($result) == 0 ) ) return false;
		echo 'sds';
		return $this->to_array ($result);
	}
	
	public function get_table_count( $table, $condition=false )
	{
		$result = $this->query('SELECT count(*) as count FROM `'.$table.'`'.( $condition ? ' WHERE '.$condition : '' ) );
		if ( ($result == false) || ( mysqli_num_rows($result) == 0 ) ) return false;
		$qresult=$this->to_array ($result);
		return $qresult[0]['count'];
	}

	public function runSQL ( $sql )
	{
		/*echo '	SELECT *
							FROM `'.$table.'`' .
							( $condition ? ' WHERE '.$condition : '' );*/
		$result = $this->query($sql);
		if ( ($result == false) || ( mysqli_num_rows($result) == 0 ) ) return false;
		return $this->to_array ($result);
	}
    
	public function gettable($tablename)
	{
	
		$sql="SELECT * FROM  `".$tablename."`";
		
		$result=$this->query($sql);
		
		return $this->to_array ($result);
		
	}
    
	public function getMeta($field=false)
	{
		if($field)
			$field=" meta_key='".$field."' ORDER BY meta_value ASC";
		$result = $this->get_fields_value ( 'job_meta', $field );
		if($result){
		return $result;}
		else
		{
			return array();
		}
	}
    
	public function getMetaValue($id)
	{
		if($id){
			$field=" ID='".$id."'";
		$result = $this->get_fields_value ( 'job_meta', $field );
		if($result){
		return $result[0]['meta_value'];}
		else
		{
			return '---';
		}
		}
		else
		{
			return '---';
		}
	}
    
	public function jobStatus($job){
		$data=$this->get_fields_value('job_listing',"ID='".$job."'");
		$datetime1 = new DateTime('today');
		$datetime2 = new DateTime($data[0]['end']);
		$interval = $datetime1->diff($datetime2);
		if(($interval->format('%R%a'))<3&&($interval->format('%R%a'))>=0)
			return "haster";
		elseif(($interval->format('%R%a'))>2&&($interval->format('%R%a'))<15)
			return "snart";
		elseif(($interval->format('%R%a'))>14)
			return "normal";
		elseif(($interval->format('%R%a'))<0)
			return "udløbet";
	}
    
	//single job $id
	public function searchJobAlerts($id)
	{
		$job=$this->get_fields_value('job_listing',"ID='".$id."'");
		$query="SELECT a.customer_id FROM `job_listing` l,`job_agent` a WHERE l.ID=".$id." AND l.job_title like CONCAT('%', a.job_title ,'%') AND FIND_IN_SET(l.job_type, a.job_category) > 0";
		$edu=explode(",",$job[0]['qualifications']);
		foreach($edu as $ed)
			$query3[].=" FIND_IN_SET(".$ed.", a.education_level) > 0";
		$orq=implode(' OR ',$query3);
		if($orq)
		{
			$query.= " AND (".$orq." )";
		}
		$query.=" AND l.residence_location=( CASE WHEN a.location='any' THEN l.residence_location ELSE a.location END )";
		$agents = $this->runSQL($query);
		$this->sendJobAlert($agents,$id);
	}
    
	// single job, multiple agents
	public function sendJobAlert($agents,$id)
	{
		if($agents){
		foreach($agents as $agent){
			$customer=$this->get_fields_value('applicants',"customer_id='".$agent[0]['customer_id']."'");
			$template=implode("",@file(CONFIG::SITE."emails/job-alerts.php?job=".$id."&ID=".$agent[0]['customer_id']));
			$email=$customer[0]['email'];
			$subject='Job alarm';
			$this->sentMail($email,$subject,$template);
		}
		}
	}	
    
	//single agent $id
	public function activeJobAlerts($id)
	{
		$agent=$this->get_fields_value('job_agent',"ID='".$id."'");
		$query="SELECT l.job_title,l.lat,l.lng,l.ID,l.job_type FROM `job_listing` l,`job_agent` a WHERE a.ID=".$id." AND l.job_title like CONCAT('%', a.job_title ,'%') AND FIND_IN_SET(l.job_type, a.job_category) > 0";
		$edu=explode(",",$agent[0]['education_level']);
		foreach($edu as $ed)
			$query3[].=" FIND_IN_SET(".$ed.", l.qualifications) > 0";
		$orq=implode(' OR ',$query3);
		if($orq)
		{
			$query.= " AND (".$orq." )";
		}
		$query.=" AND a.location=( CASE WHEN a.location='any' THEN a.location ELSE l.residence_location END ) AND l.complete=1 AND l.active=1 AND l.expired=0";
		$agents = $this->runSQL($query);
		return $agents;
	}	
    
	public function sentMail($email,$subject,$message)
	{
		//$adminid='info@codexpad.com';
		$adminid="info@studiejob-danmark.dk";
		//$adminid=CONFIG::EMAIL;
		$fromname=utf8_decode('Studiejob-Danmark.dk');
		$headers= "From:".$fromname." <".$adminid . ">\r\n";
		$headers.= "MIME-Version: 1.0" . "\r\n";		
		$headers.= "Content-type:text/html;charset=utf-8" . "\r\n";		
		mail($email, $subject, $message, $headers);
		return true;
	}	
}
?>