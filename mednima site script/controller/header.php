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


if (!class_exists('mysqli')) {
    header("Location: /installation/");
    exit;
}

require_once __DIR__ . '/config.php';
if(($db=="" || $db->connect_error))
{   
    header("Location: /installation/");
}
else{
require_once __DIR__ . '/Mobile_Detect.php';
$detect = new Mobile_Detect;
include __DIR__ . '/settings.php';
include __DIR__ . '/func.php';
include __DIR__ . '/class.php';
$iSMartFUN = new Ismart_Controller($db);
$iSMartUser = new User($db);
}
?>