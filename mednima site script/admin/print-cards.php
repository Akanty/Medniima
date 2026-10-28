<?php
session_start();
error_reporting(0);
include('../controller/header.php');
if(strlen($_SESSION['alogin'])=="")
    {   
   $login_url=''.SITE_URL.'login';   
    header("Location: $login_url"); 
    }
    else{
		
		// for Delete card
if(isset($_GET['did']))
{
$did=intval($_GET['did']);
$query = $db->query("DELETE FROM tblscracth_card where id='$did'");
if($query){
$msg="Scrath Card Deleted successfully";
}
else{
$error = "An error occure pls try again later";
}
}
		

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Scratch Cards</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/AdminLTE.min.css">
<style>

.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
    text-align: center;
}

</style>
  
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    
<?php 

$card_list = $iSMartFUN->getTRows("tblscracth_card");

$cnt=1;
if($card_list)
{
foreach($card_list as $result)
{   ?>
    
    
    <div class="row">
      <div class="col-md-12">
    
    <div class="col-xs-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo SCHOOL_NAME;?></h3>
              <h5 class="widget-user-desc">Result Scratch Card</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo SITE_URL;?>images/<? echo SCHOOL_LOGO;?>">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo SCHOOL_DESC;?></h5>
                    <span class="description-text"><?php echo SCHOOL_ADDRESS;?></span>
                    <br>
                    <span class="description-text"><?php echo CONTACT_PHONE_NUMBER;?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div><!--/col-->
    
    
    <div class="col-xs-4">
          <!-- Widget: user widget style 1 -->
           <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
               <ul class="nav">
                <li>1. Visit <?php echo SITE_URL;?>check-result</li><br>
                <li>2. Enter Student details along with this card info</li>
              </ul>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Serial Number <span class="pull-right"><?php echo htmlentities($result->sn);?></span></a></li>
                <li><a href="#">PIN <span class="pull-right"><?php echo htmlentities($result->pin);?></span></a></li>
                
                <li class="text-center"><a href="#"><?php echo SCHOOL_ADDRESS;?></a></li>
              </ul>
              
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      
      </div>
    </div>
    <!-- /.row -->
    <?php $cnt=$cnt+1;}} ?>
    
    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>







<?php } ?>

