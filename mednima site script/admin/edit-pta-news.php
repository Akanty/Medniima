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
if(isset($_POST['update']))
{
$title=$_POST['title'];
$content=$_POST['content'];
$date=$_POST['date']; 
$nid=intval($_GET['nid']);

$UpdateData = array(
        'title' => $title,
        'content' => $content,
		'date' => $date
		);	
		$condition = array('id' => $nid);
         $update = $iSMartFUN->UpdateTable("tblptanews",$UpdateData,$condition);

$msg="Data has been updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Update P.T.A News</title>
         <?php include('includes/css.html');?>
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
                                    <h2 class="title">Update P.T.A News</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">P.T.A News</a></li>
            							<li class="active">Update P.T.A News</li>
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
                                                    <h5>Update P.T.A News</h5>
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

                                                <form method="post">
<?php 
$nid=intval($_GET['nid']);
$get_new_condition['where'] = array('id' =>$nid);
$get_new_condition['return_type'] = 'single'; 
$result = $iSMartFUN->getTRows("tblptanews",$get_new_condition);
$cnt=1;
if($result)
{
   ?>

                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Heading</label>
                                                		<div class="">
                                                			<input type="text" name="title" value="<?php echo htmlentities($result->title);?>" required class="form-control" id="success">
                                                            
                                                		</div>
                                                	</div>
                                                    
                                                    
                                                     <div class="form-group has-success">
                                                    <label for="success-date" class="control-label">Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="date" class="form-control" value="<?php echo htmlentities($result->date);?>"  required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
                                                    
                                                    
                                                       
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Meeting Last Min.</label>
                                                        <div class="">
                                                        <textarea  rows="10" cols="4" name="content" class="form-control" required id="success"><?php echo htmlentities($result->content);?></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    <?php } ?>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

             
                    <!-- /.right-sidebar -->

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
<?php  } ?>
