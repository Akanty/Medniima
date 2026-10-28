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
if(isset($_POST['submit']))
    {
$content= $_POST['content'];
$slug = $_POST['slug']; 

for($i = 0; $i<count($content); $i++) {
			
			$inValue = $db->real_escape_string($content[$i]);
			$slugg = $db->real_escape_string($slug[$i]);
			$UpdatePage = $db->query("UPDATE tblpages SET content='$inValue' where slug='$slugg'");
					}
			
if($UpdatePage)
{
$msg=" Page Updated successfully";
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
        <title>Admin Page Settings</title>
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
            <?php include('includes/topbar.php');?>   
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Page Setting</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            						
            							<li class="active">Site Pages</li>
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
                                                    <h5>Pages</h5>
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

                                                <form  method="post" >
                                                    
<?php 
$page_list = $iSMartFUN->getTRows("tblpages");
if($page_list)
{
foreach($page_list as $result)
{   ?>
                                                    
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="<?php echo $result->slug;?>" class="control-label"><?php echo $result->page_name;?></label>
                                                		<div class="">
<textarea rows="10"  name="content[]" class="form-control" required id="<?php echo $result->slug;?>"><?php echo $result->content;?></textarea>
<input type="hidden" name="slug[]" value="<?php echo $result->slug;?>">
                                                        
                          
                                                      
                                                		</div>
                                                	</div>
                                                    
<? }}?>
                                                    
                                                    
                                                       
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Change<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

<!-- CK Editor -->
<script src="<?php echo SITE_URL;?>admin/js/ckeditor/ckeditor.js"></script>

<script src="<?php echo SITE_URL;?>res/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	
	<?php 
$page_list = $iSMartFUN->getTRows("tblpages");
if($page_list)
{
foreach($page_list as $result)
{   ?>
 <script type="text/javascript">
$(function () {
 CKEDITOR.replace('<?php echo $result->slug;?>'); 
 $(".textarea").wysihtml5();                   
});
</script>             
  
 <? }}?> 
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
