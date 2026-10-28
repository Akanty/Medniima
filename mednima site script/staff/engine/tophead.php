<?php


/*
.............................................................................
. This is a project for school and others 								.
. intereted in having a persoal website or blog								.											.   																		.	
.					-------------Author----------							.
.					|  Yekeen Ibrahim Olamilekan  |							.
.					-------------------------------							.							.																			.
.							iSmart Team										.
...........................................................................	.
*/

//include '../controller/header.php';
if($_SESSION['tlogin'] == ""){
ob_end_clean(); // Delete the buffer.
		$url=''.SITE_URL.'login';
        header("Location: $url");
        exit();	
}else{

$get_Teacher_condition['where'] = array('id' =>$_SESSION['tlogin']);
$get_Teacher_condition['return_type'] = 'single'; 
$teacher_datail = $iSMartFUN->getTRows("tblteacher",$get_Teacher_condition);
}
?>