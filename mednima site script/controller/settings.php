<?php
/*
.............................................................................
. This is a project for car dealers 								.
.								.											.   																		.	
.					-------------Author----------							.
.					|  Yekeen Ibrahim Olamilekan  |							.
.					-------------------------------							.							.																			.
.							iSmart Team										.
...........................................................................	.
*/

////OTHER SETTINGS///



$Site_Configuration_Details = "SELECT * FROM configuration";
		$result = $db->query($Site_Configuration_Details);
		
    // output data of each row
   while($Site_Configuration_row = $result->fetch_array())
{
$site_conf_settings[] = $Site_Configuration_row;

}	

foreach($site_conf_settings as $site_conf_setting){
define($site_conf_setting["configuration_key"], $site_conf_setting["configuration_value"]); 	
}
$CBT_Configuration_Details = $db->query("SELECT * FROM quiz_settings where id='1'");
if($CBT_Configuration_Details->num_rows > 0){
    // output data of each row
 $CBT_Settings = $CBT_Configuration_Details->fetch_object();
define(QUESTION_PER_PAGE, $CBT_Settings->pagenum); 
define(EXAM_TIME, $CBT_Settings->examtime); 	
}
define(SITE_URL, 'http://'.$_SERVER["HTTP_HOST"].'/'); //Get the site url
define(IMG_URL, 'http://'.$_SERVER["HTTP_HOST"].'/images/'); //image folder site url
define(DP_IMG_URL, 'http://'.$_SERVER["HTTP_HOST"].'/images/profile_pic/'); //profile pics image folder url

?>