<?php
//ERROR_REPORTING(0);
session_start();

/*
.............................................................................
. This is a project for schools and others 								.
. intereted in having a persoal website or blog								.											.   																		.	
.					-------------Author----------							.
.					|  Yekeen Ibrahim Olamilekan  |							.
.					-------------------------------							.							.																			.
.							iSmart Team										.
...........................................................................	.
*/


require_once "config.php";
if(($db=="" || $db->connect_error))
{   
    header("Location: installation"); 
}
else{
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
include 'settings.php';
include 'func.php';
include 'class.php';
$iSMartFUN = new Ismart_Controller($db);
$iSMartUser = new User($db);
}
?>