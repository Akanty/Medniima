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
if($_SESSION['plogin'] == ""){
ob_end_clean(); // Delete the buffer.
		$url=''.SITE_URL.'login';
        header("Location: $url");
        exit();	
}else{

$get_parent_condition['where'] = array('id' =>$_SESSION['plogin']);
$get_parent_condition['return_type'] = 'single';
$parent_datail = $iSMartFUN->getTRows('tblparent',$get_parent_condition);
$children_in = explode(",",$parent_datail->children_id);

/*
$sql = "SELECT tblstudents.*,tblparent.fullname,tblparent.phone,tblparent.address as paddress,tblparent.state as pstate,tblclasses.* from tblstudents  join tblclasses on tblclasses.id=tblstudents.ClassId join tblparent on tblparent.id = tblstudents.parent_id where tblstudents.parent_id ='".$_SESSION['plogin']."' ";
$query = $db->query($sql);
$parent_datail = $query->fetch_object();
*/


}
?>