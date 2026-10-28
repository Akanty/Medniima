<?php
include ("../controller/header.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
$action = $db->real_escape_string(strip_tags($_POST['action']));
if(isset($_POST["action"]) && !empty($_POST["action"])) 
		{
			$date = date("d-m-Y H:i:s");
			$last_ip=$_SERVER["REMOTE_ADDR"];
			$last_browser=$_SERVER["HTTP_USER_AGENT"];
			
			if($_POST["action"] == "login") 
			{
				
				
			$username = $db->real_escape_string(strip_tags($_POST['username']));
 			$password = $db->real_escape_string(strip_tags($_POST['password']));
			$accnt_type = $db->real_escape_string(strip_tags($_POST['accnt_type']));
			
			switch($accnt_type){
			case 0: 
			$table = "tblstudents";
			$get_condition['where'] = array('password' =>md5($password));
			$get_condition['where'] = array('RollId' =>$username);
			$id = "StudentId";
			$home = "student";
			$session = "slogin";
			break;
			case 1:	
			$table = "tblteacher";
			
			$get_condition['where'] = array('password' =>md5($password));
			$get_condition['where'] = array('username' =>$username);
			
			$id = "id";
			$home = "staff";
			$session = "tlogin"; 
			break;
			case 2:	
			$table = "tblparent";
			$id = "id";
			$session = "plogin";
			$home = "parent";
			$get_condition['where'] = array('password' =>md5($password));
			$get_condition['where'] = array('username' =>$username);
			break;
			case 3:	
			$table = "admin";
			
			$get_condition['where'] = array('UserName' =>$username);
			$get_condition['where'] = array('Password' =>md5($password));
			
			$id = "id";
			$home = "admin"; 
			$session = "alogin";
					break;
			}
			$get_condition['return_type'] = 'single';
			$login_query = $iSMartFUN->getTRows($table,$get_condition);
			
		if(!$login_query){
			$ErrorMsg =  "Invalid Login Details!";
		}else{
		
			session_start();
			$_SESSION['loginNow'] = 1;
			$_SESSION[$session] = $login_query->$id;
		//$db->query("UPDATE $type last_login ='$date' WHERE $id='".$id."'");
		
		ob_end_clean(); // Delete the buffer.
		$url=''.SITE_URL.$home;
        header("Location: $url");
        exit();
			
			
		}
			
			
			}//end of login action


	}
	
}

include ("../pages/signin.html");

?>