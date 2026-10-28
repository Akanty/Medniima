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
$tableName ="configuration";
$condition_list['where'] = array('group_id' => 1);
$condition_list['order_by'] = "sort_by ASC";
$get_settings_List = $iSMartFUN->getTRows($tableName,$condition_list); 		

if(!$get_settings_List){
echo "No Setting Found";	
}else{
		
if(isset($_POST['submit']))
{
$configuration_value= $_POST['configuration_value'];
$configuration_key = $_POST['configuration_key']; 


			for ($i = 0; $i < count($configuration_value); $i++) {
			
			$inValue = $db->real_escape_string(strip_tags($configuration_value[$i]));
			$UpdateSetting = $db->query("UPDATE $tableName SET configuration_value='$inValue' where configuration_key='$configuration_key[$i]'");
					}
			
if($UpdateSetting)
{
$msg=" Settings Updated successfully";
}else{
$error = " An Error Occure Please Try Again Later";	
}


}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Global Settings</title>
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
                                    <h2 class="title">Edit Global Settings</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            							<li>Settings</li>
            							<li class="active">Edit Global Settings</li>
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
                                                    <h5>Edit Global Settings</h5>
                                                    
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
                                                  
                                                   <? 
													   foreach($get_settings_List as $get_Setting_List_details){
													   ?>
                                                   
                                                   
                                                   <div class="row"> 
                                                    <div class="col-xs-12 form-group has-success">
                                                        <label for="success" class="control-label"><?php echo $get_Setting_List_details->name;?></label>
<input type="text" name="configuration_value[]" value="<?php echo $get_Setting_List_details->configuration_value;?>" class="form-control" placeholder="<?php echo $get_Setting_List_details->desc;?>" required>
<span class="help-block"><?php echo $get_Setting_List_details->desc;?></span>

<input type="hidden" name="configuration_key[]" value="<?php echo htmlentities($get_Setting_List_details->configuration_key);?>">
</div>

                                                        
                                                       <div>
                                                       
                                                        
                                                    </div></div>
                                                    
                                                    <? }?>
                                                    
                                 
             
                                                                                                  
                                                    
  <div class="form-group has-success">
<button type="submit" name="submit" class="btn btn-success btn-labeled">Update Settings<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
</div>


                                                    
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



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  }} ?>
