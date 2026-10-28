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
$cid=intval($_GET['cid']);
$Cat_condtion['where'] = array('id' => $cid);
$Cat_condtion['return_type'] = 'single'; 
$Cat_query = $iSMartFUN->getTRows("quiz_categories",$Cat_condtion);		
if(!$Cat_query){
	$home_url=''.SITE_URL.'admin/index.php';   
    header("Location: $home_url");
}else{
		
		
if(isset($_POST['submit']))
{
$examname=$_POST['examname'];
$status=$_POST['status']; 
$exam_fullname=$_POST['exam_fullname'];
$exam_slug = $iSMartFUN->converturl($examname);
$update_condition = array('id' =>$cid);
$UpdateData = array(
			'name' => $examname,
	        'fullname' => ucwords(strtolower($exam_fullname)),
			'slug' => $exam_slug,
			'status' => $status
			);
			

			
			$UpdateExam_Cat = $iSMartFUN->UpdateTable("quiz_categories",$UpdateData,$update_condition);
if($UpdateExam_Cat)
{
	
	if(!empty($_FILES)){
		
	$targetDir = $_SERVER['DOCUMENT_ROOT']."/exam/images/";
	$fileName = $_FILES['file']['name'];
	$RandomNumber			= rand(0, 9999999999);  
	$File_Ext           = substr($fileName, strrpos($fileName, '.')); //get file extention
	$NewFileName        = $exam_slug.$File_Ext; //new file name
	
	$targetFile = $targetDir.$NewFileName;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		$db->query("UPDATE quiz_categories set img='$NewFileName' where id='$insertExam_Cat'");	
	}}
	
	
	
$msg=" CBT Exam Category Updated successfully";
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
        <title>Admin Edit CBT Exam Category</title>
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
                                    <h2 class="title">Edit CBT Exam Category</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">CBT Exam Category</a></li>
            							<li class="active">Edit CBT Exam Category</li>
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
                                                    <h5>Edit CBT Exam Category</h5>
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

                                                <form method="post" enctype="multipart/form-data">
                                                
                                                <div class="row">
                                                
                                                      
                                                
                                                
                                                <div class="col-md-10">
                                                
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Exam Name</label>
                                                		<div class="">
                                                			<input type="text" name="examname" value="<? echo $Cat_query->name;?>" class="form-control" required id="success">
                                                            <span class="help-block">Eg- JAMB, WAEC,NECO etc</span>
                                                		</div>
                                                	</div>
                                                       
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Exam Fullname</label>
                                                        <div class="">
                                                            <input type="text" name="exam_fullname" value="<? echo $Cat_query->fullname;?>" class="form-control" required id="success">
                                                            <span class="help-block">Eg- West African Examinations Council</span>
                                                        </div>
                                                    </div>
                                                    
                               <div class="form-group has-success">
                                                        <label for="status" class="control-label">Status</label>
                                                  <select name="status" class="form-control" id="status" required="required">
                                                
 <?php  
$str=$Cat_query->status;
if($str=="1")
{
?>
<option value="1" selected>Release</option>
<option value="0">Suspend</option>
<? }else{ ?>
<option value="0" selected>Suspend</option>
<option value="1">Release</option>
<? }?>                                                 
</select>
                                                    
     </div>
                 
                 </div>
                 
                 <div class="col-md-2">
                 
                 <div class="item dark">
						    <img src="<? echo SITE_URL."exam/images/".$Cat_query->img;?>"  class="w-full" id="ExamLogo">
						    <div class="post-file">
							<i class="fa fa-camera fa-2x"  style="margin:7px;"></i>
							<input name="file" id="image" multiple accept="image/*" type="file" onchange="readURL(this);">
							</div></div>
                 
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
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ExamLogo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100)
						
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } }?>
