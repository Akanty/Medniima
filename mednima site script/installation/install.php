<?php include("header.html");
include("nav.html");?>
 
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          
          <small>Welcome to iSt School Management's Installation Wizard!</small>
        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">     
       
<div class="row">

<div class="col-md-3">

<div class="col-left side-col">
                <div style="border:1px solid #ccc; background:#f6f6f6;">
    <h2 style="margin-bottom:0; border-bottom:1px solid #ccc; padding:4px 10px; color:#3c5974; font-size:1.4em;">Installation</h2>
<ol style="padding:20px; border-top:1px solid #fff;">
    <li>Choose A Plan</li>
    <li>Database Configuration</li>
    <li>School Configuration</li>
    <li>Create Admin Account</li>
    <li>You're All Set!</li>
</ol>
</div>



            </div>

</div> <div class="col-md-9">

<?php
error_reporting(0);
$type = $_POST['type'];
$username = $_POST['username'];
$password = $_POST['pass'];
$hostname = $_POST['hostname'];
$dbname = $_POST['dbname'];
require_once "../controller/config.php";


switch($type){
	
	case "updatedb":
	//open config.php and write the data in to it.
	$file = "../controller/config.php"; 
	$open = fopen($file, "w");
	fwrite($open,"<?php\n\n 
	define(\"SERVER\", \"".$hostname."\");
	define(\"DB_USER\", \"".$username."\");
	define(\"DB_PASS\", \"".$password."\");
	define(\"DB_NAME\", \"".$dbname."\");
	
	\$db = new mysqli(SERVER, DB_USER, DB_PASS, DB_NAME);
	\n \n\n ?>");
	fclose($open);
	include "../installation/message.php";
	break;
	case "createtables":
	include "../installation/create.php";
	break;
	case "changedb":
	include "../installation/reauth.php";
	break;
	case "schooldetails":
	if($UpdateSetting)
{
include "../installation/adminpass.php";

}else{
include "../school-details-settings.php";
}
	break;
	case "updateadmin":
	include "../installation/updateadmin.php";
	break;
	default: include "../installation/inputdbname.php";
	
	
	
	
	
	
	
}

?>




</div></section></div></div>

 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.1
      </div>
      <strong>Copyright &copy;  <?php echo date('Y');?> iSmart Tech School Management Software All Rights Reserved </strong>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.0 -->
<script src="<?php echo SITE_URL;?>res/js/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo SITE_URL;?>res/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo SITE_URL;?>res/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo SITE_URL;?>res/js/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo SITE_URL;?>res/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo SITE_URL;?>res/js/demo.js"></script>
</body>
</html>
