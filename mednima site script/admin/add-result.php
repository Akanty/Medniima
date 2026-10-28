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
if(isset($_POST['submit']))
{
    $exam_marks=array();
	$test_marks=array();
$class=$_POST['class'];
$term=$_POST['term'];
$sessionid = $_POST['sessionid'];
$studentid=$_POST['studentid']; 
$exam_mark=$_POST['exammarks'];
$test_mark=$_POST['testmarks'];

 $stmt = $db->query("SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId='$class' and tblsubjectcombination.status!='0' order by tblsubjects.SubjectName");

  $sid1 = array();
 while($row = $stmt->fetch_object())
 {

array_push($sid1,$row->id);
   } 
  
for($i=0;$i<count($exam_mark);$i++){
    $exam_mar=$exam_mark[$i];
	$test_mar=$test_mark[$i];
  	$sid=$sid1[$i];
  
  			$InsertData = array(
			'StudentId' => $studentid,
			'ClassId' =>  $class,
			'termid'=> $term,
			'session_id' => $sessionid,
			'SubjectId'=> $sid,
			'test_marks' => $test_mar,
			'exam_marks' => $exam_mar
			);
			$insertStudentResult = $iSMartFUN->insertTable("tblresult",$InsertData);

$lastInsertId = $insertStudentResult;
if($insertStudentResult)
{
$msg="Result info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin| Add Result </title>
         <?php include('includes/css.html');?>
<script>
function getStudent(val) {
	var clid=$(".clid").val();
	var tid=$(".termid").val();
	var sessionid=$(".sessionid").val();
	var abh=clid+'$'+tid+'$'+sessionid;
    $.ajax({
    type: "POST",
    url: "get_student.php",
    data:'classid='+abh,
    success: function(data){
        $("#studentid").html(data);
        
    }
    });
}

function getresult(val,clid) 
{   
    
var clid=$(".clid").val();
var val=$(".stid").val();
var tid=$(".termid").val();
var sessionid=$(".sessionid").val();
var abh=clid+'$'+val+'$'+tid+'$'+sessionid;

    $.ajax({
        type: "POST",
        url: "get_student.php",
        data:'studclass='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
		
		
		$.ajax({
        type: "POST",
        url: "get_student.php",
        data:'classid1='+abh,
        success: function(data){
            $("#subject").html(data);
            
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
                                    <h2 class="title">Declare Result</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Result</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                           
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
 <select name="class" class="form-control clid" id="classid"  required="required">
<option value="">Select Class</option>
<?php 

$class_list = $iSMartFUN->getTRows("tblclasses");
if($class_list)
{
foreach($class_list as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
<label for="default" class="col-sm-2 control-label">Term</label>
 <div class="col-sm-10">
 <select name="term" class="form-control termid" id="termid" required="required">
<option value="">Select Term</option>
<?php 
$term_list = $iSMartFUN->getTRows("tblterm");
if($term_list)
{
foreach($term_list as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->term); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                          
                                                    </div>
                                                    
                                                    
                                                    
                                                     <div class="form-group">
<label for="default" class="col-sm-2 control-label">Session</label>
 <div class="col-sm-10">
 <select name="sessionid" class="form-control sessionid" id="sessionid" onChange="getStudent(this.value);" required="required">
<option value="">Select Session</option>
<?php for($d=date('Y');$d>=2015;$d--) echo '<option value="'.$d.'">'.$d.'/'.($d+1).'</option>'; ?>
 </select>
                                                        </div>
                                                          
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label ">Student Name</label>
                                                        <div class="col-sm-10">
                                                    <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                                    </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                      
                                                        <div class="col-sm-10">
                                                    <div  id="reslt">
                                                    </div>
                                                        </div>
                                                    </div>
                                                    
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label">Subjects</label>
                                                        <div class="col-sm-10">
                                                    <div  id="subject">
                                                    </div>
                                                        </div>
                                                    </div>


                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
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
        <script src="<?php echo SITE_URL;?>admin/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/pace/pace.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/iscroll/iscroll.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/prism/prism.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/select2/select2.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/main.js"></script>
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
