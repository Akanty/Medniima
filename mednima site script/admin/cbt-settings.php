<?php
session_start();
//error_reporting(0);
include('../controller/header.php');
if(strlen($_SESSION['alogin'])=="")
    {   
     $login_url=''.SITE_URL.'login';   
    header("Location: $login_url"); 
    }
    else{
		




$pnum= QUESTION_PER_PAGE;
$examtime = EXAM_TIME;
$examtimearr=explode(":","$examtime");
$examtime_val=$examtimearr[0].":".$examtimearr[1];


if(isset($_POST['submit']))
{
$Question_per_page=$_POST['Question_per_page'];
$examtime=$_POST['examtime'];
$update_condition = array('id' =>1);
$UpdateData = array(
			'examtime' => $examtime,
	        'pagenum' => $Question_per_page
			);
			

			
			$UpdateCBT_Settings = $iSMartFUN->UpdateTable("quiz_settings",$UpdateData,$update_condition);
if($UpdateCBT_Settings)
{
	
$msg=" CBT Settings Updated successfully";
}
else 
{
$error=" Something went wrong. Please try again";
}
			
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin CBT Settings</title>
         <?php include('includes/css.html');?>
         <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">CBT Settings Mode</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">CBT Settings</a></li>
            							<li class="active">CBT Settings Mode</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>CBT Settings</h5>
                                                </div>
                                            </div>
           <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
  
                                            <div class="panel-body">

                                                <form method="post">
                                                
                                                <div class="row">
                                                
                                                      
                                                
                                                
                                                <div class="col-md-12">
                                                
                                                    
                                                     <div class="form-group has-success">
                                                        <label for="question_per_page" class="control-label">No of Questions display in single page</label>
                                                   <select name="Question_per_page" class="form-control" id="Question_per_page" required="required">
<option value="">Select Option</option>
<?php 
for($i=1;$i<=10;$i++){
if(QUESTION_PER_PAGE == $i){
?>
<option value="<? echo $i;?>" selected><?php echo $i; ?></option>
<? }else{?>
<option value="<? echo $i;?>"><?php echo $i; ?></option>
<? }}?>

 </select>
                                                    
     </div>
                                       
                               <div class="form-group has-success">
                                                        <label for="examtime" class="control-label">Default Exam Time Duration</label>
                                                       
                                                    <select name="examtime" class="form-control" id="examtime"  required="required">
<? 


$time_List = array("00:00:60","00:05:00","00:10:00","00:15:00","00:20:00","00:30:00","00:45:00","00:50:00","01:00:00","01:15:00","01:45:00","02:00:00","02:15:00","02:30:00","02:45:00","03:00:00","03:30:00","04:00:00");
foreach($time_List as $Option_t){
if(EXAM_TIME == $Option_t){
	
?>
<option value="<? echo $Option_t;?>" selected><? echo $iSMartFUN->minutes($Option_t);?></option>
<? }else{?>
<option value="<? echo $Option_t;?>"><? echo $iSMartFUN->minutes($Option_t);?></option>
<? }}?>

</select>
                                                    
     </div>
                 
                 </div>
                 
                 
                                          
                 
                 
                 </div><!-- /row-->
                 
                     <div class="row">                                                                               
                              <div class="col-md-12">                      
  <div class="form-group has-success">

                                                        
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>
                                                    </div>
                                                </form>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>


      <script>
            $(function($) {
				$(".select2").select2();
				 });
        </script>
<script src="<?php echo SITE_URL;?>css/select2/select2.full.min.js"></script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
