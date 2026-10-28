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
$cid=intval($_GET['cid']);
include '../controller/header.php';
include ("engine/tophead.php");

$query_child = $db->query("SELECT tblstudents.*,tblparent.fullname,tblparent.phone,tblparent.address as paddress,tblparent.state as pstate,tblclasses.* from tblstudents  join tblclasses on tblclasses.id=tblstudents.ClassId join tblparent on tblparent.id = tblstudents.parent_id where tblstudents.StudentId ='$cid'");
if($query_child->num_rows){
$student_datail_list = $query_child->fetch_object();


include ("design/payment.html");
}else{
echo "Child Not Found";
	
}
?>