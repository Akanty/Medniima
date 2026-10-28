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
$class=$_POST['class'];
$subject=$_POST['subject'];
 
$conditions["where"] = array("ClassId" =>$class);
$conditions["where"] = array("SubjectId" =>$subject);
$conditions['return_type'] = 'single';

$check_subjectCom = $db->query("SELECT * FROM tblsubjectcombination WHERE ClassId='$class' and SubjectId='$subject'");
$check_subjectCom_Row = $check_subjectCom->num_rows;

//$check_subject = $iSMartFUN->getTRows("tblsubjectcombination",$conditions);

if($check_subjectCom_Row > 0){
	$error="Already Exist";
}else{
	
	
	$InsertData = array(
			'ClassId' =>  $class,
			'SubjectId'=> $subject,
			'status' => 1
			);
			$insertSubjectCombination = $iSMartFUN->insertTable("tblsubjectcombination",$InsertData);
	
if($insertSubjectCombination)
{
$msg="Combination added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Subject Combination< </title>
        <?php include('includes/css.html');?>
        
        
        
        <script>

function getsubject(cid) 
{   
    
var clid=$(".classid").val();
//var abh=clid+'$'+val+'$'+tid;
//alert(clid);
    $.ajax({
        type: "POST",
        url: "get_student.php",
        data:'getclassSubject='+clid,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>
        
        
        
        
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
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
                                    <h2 class="title">Add Subject Combination</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Subjects</li>
                                        <li class="active">Add Subject Combination</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Add Subject Combination</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
 <select name="class" class="form-control classid" onChange="getsubject(this.value);" id="default" required="required">
<option value="">Select Class</option>
<?php 
$query= $iSMartFUN->getTRows("tblclasses");
if($query)
{
foreach($query as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                           <div  id="reslt"></div>
                                                        </div>
                                                    </div>
                                                     
                                                     
                                                    
                                                    
<div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Subject</label>
                                                        <div class="col-sm-10">
 <select name="subject" class="form-control" id="default" required="required">
<option value="">Select Subject</option>
<?php 
$squery= $iSMartFUN->getTRows("tblsubjects");
if($squery)
{
foreach($squery as $sresult)
{   ?>
<option value="<?php echo htmlentities($sresult->id); ?>"><?php echo htmlentities($sresult->SubjectName); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
