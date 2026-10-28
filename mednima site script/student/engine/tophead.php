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
if($_SESSION['slogin'] == ""){
ob_end_clean(); // Delete the buffer.
		$url=''.SITE_URL.'login';
        header("Location: $url");
        exit();	
}else{
$userid = $_SESSION['slogin'];
$sql = "SELECT tblstudents.*,tblparent.fullname,tblparent.phone,tblparent.address as paddress,tblparent.state as pstate,tblclasses.* from tblstudents  join tblclasses on tblclasses.id=tblstudents.ClassId join tblparent on tblparent.id = tblstudents.parent_id where tblstudents.StudentId ='".$_SESSION['slogin']."' ";
$query = $db->query($sql);
$student_datail_list = $query->fetch_object();


}
?>