<?php
class Ismart_Controller {
	var $db;
	function __construct($db){
		$this->db = $db;
            	}
	
	
	public function shorttext($text,$link){
		
		if( strlen( $text) > 200) {
    $str = explode( "\n", wordwrap( $text, 200));
    return $str[0] . " <a href=".SITE_URL.$link.">Read more</a>";
}
		
	}
	

function minutes($time){
$time = explode(':', $time);
$ttt =  ($time[0]*60) + ($time[1]) + ($time[2]/60);

return $this->convertToHoursMins($ttt,'%2d hr %02d minutes');
}


function minutes2($time){
$time = explode(':', $time);
$ttt =  ($time[0]*60) + ($time[1]) + ($time[2]/60);

return $ttt."min";
}


function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
	
	
//covert text to url
public function converturl($text)
{
$text=str_replace(" ","-",$text);
$text=str_replace(".","-",$text);
$text=str_replace("@","-",$text);
$text=str_replace("/","-",$text);
$text=str_replace("\\","-",$text);
$text=str_replace("&","-and-",$text);
$text=preg_replace("/[^a-zA-Z0-9\-]/", "", $text);
return strtolower($text);
}
	
	
public function get_first_char($str) {
    if($str)
        return strtolower(substr($str, 0, 1));
 
    return false;
}	



public function RandomString($length) {
    $randstr;
    srand((double) microtime(TRUE) * 1000000);
    //our array add all letters and numbers if you wish
    $chars = array(
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
        'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
        '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
        'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    for ($rand = 0; $rand <= $length; $rand++) {
        $random = rand(0, count($chars) - 1);
        $randstr .= $chars[$random];
    }
    return $randstr;
}
	
	
	
public	function gradeArray($score) {
   if     ($score >= 70)  return "A";
   elseif ($score >= 60 && $score<=69)  return "B";
   elseif ($score >= 50 && $score <=59)  return "C";
   elseif ($score >= 40 && $score <= 49)  return "D";
   else                   return "F";
}

public	function gradeRemark($score) {
   if     ($score >= 70)  return "Excellent";
   elseif ($score >= 60 && $score<=69)  return "Very Good";
   elseif ($score >= 50 && $score <=59)  return "Credit";
   elseif ($score >= 40 && $score <= 49)  return "Pass";
   else                   return "Fail";
}
				
				
public function getTRows($table,$conditions = array()){
		$sql = 'SELECT ';
		$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
		$sql .= ' FROM '.$table;
		if(array_key_exists("where",$conditions)){
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions['where'] as $key => $value){
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$key." = '".$value."'";
				$i++;
			}
		}
		
		if(array_key_exists("order_by",$conditions)){
			$sql .= ' ORDER BY '.$conditions['order_by']; 
		}
		
		if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
			$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
		}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
			$sql .= ' LIMIT '.$conditions['limit']; 
		}
		
		$result = $this->db->query($sql);
		
		if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
			switch($conditions['return_type']){
				case 'count':
					$data = $result->num_rows;
					break;
				case 'single':
					$data = $result->fetch_object();
					break;
				default:
					$data = '';
			}
		}else{
			if($result->num_rows > 0){
				while($row = $result->fetch_object()){
					$data[] = $row;
				}
			}
		}
		return !empty($data)?$data:false;
	}
	


//insert into table
public function insertTable($table,$data){
	if(!empty($data) && is_array($data)){
			$columns = '';
			$values  = '';
			$i = 0;
	foreach($data as $key=>$val){
				$pre = ($i > 0)?', ':'';
				$columns .= $pre.$key;
				$values  .= $pre."'".$val."'";
				$i++;
			}
	$query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
			$insert = $this->db->query($query);
			return $insert?$this->db->insert_id:false;
		}else{
			return false;
		}
}


/*
	 * Delete data from the database
	 * @param string name of the table
	 * @param array where condition on deleting data
	 */
	public function DeleteTable($table,$conditions){
		$whereSql = '';
		if(!empty($conditions)&& is_array($conditions)){
			$whereSql .= ' WHERE ';
			$i = 0;
			foreach($conditions as $key => $value){
				$pre = ($i > 0)?' AND ':'';
				$whereSql .= $pre.$key." = '".$value."'";
				$i++;
			}
		}
		$query = "DELETE FROM ".$table.$whereSql;
		$delete = $this->db->query($query);
		return $delete?true:false;
	}



/*
	 * Update data into the database
	 * @param string name of the table
	 * @param array the data for updating into the table
	 * @param array where condition on updating data
	 */
	public function UpdateTable($table,$data,$conditions){
		if(!empty($data) && is_array($data)){
			$colvalSet = '';
			$whereSql = '';
			$i = 0;
			
			foreach($data as $key=>$val){
				$pre = ($i > 0)?', ':'';
				$colvalSet .= $pre.$key."='".$val."'";
				$i++;
			}
			if(!empty($conditions)&& is_array($conditions)){
				$whereSql .= ' WHERE ';
				$i = 0;
				foreach($conditions as $key => $value){
					$pre = ($i > 0)?' AND ':'';
					$whereSql .= $pre.$key." = '".$value."'";
					$i++;
				}
			}
			$query = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
			$update = $this->db->query($query);
			return $update?$this->db->affected_rows:false;
		}else{
			return false;
		}
	}	
				
				
				
				
				
				
public function get_home_slider(){
	$response = array();
	$query = $this->db->query("SELECT * FROM home_slider");
	
	// check if row inserted or not
    if ($query->num_rows > 0) {
		$response["slid_image"] = array();
		while($slidImage = $query->fetch_object()){
		$tmp = array();
        $tmp["id"] = $slidImage->id;
        $tmp["name"] = $slidImage->name;
		$tmp["image_link"] = $slidImage->image_link;
			
		// push single image slider into final response array
        array_push($response["slid_image"], $tmp);
		}
        
 	// success
    $response["success"] = 1;
	return $response;
    } else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No image slider found";
 
 return $response;
    // echo no users JSON
   // return json_encode($response);
}
	
}


}//end of class



?>