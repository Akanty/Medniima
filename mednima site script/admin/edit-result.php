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

$stid=intval($_GET['stid']);
$cid=intval($_GET['cid']);
$tid=intval($_GET['tid']);
$ssid=intval($_GET['ssid']);
if(isset($_POST['submit']))
{

$rowid=$_POST['id'];
$exam_marks=$_POST['exammarks'];
$test_marks=$_POST['testmarks']; 

foreach($_POST['id'] as $count => $id){
$emrks=$exam_marks[$count];
$tmrks=$test_marks[$count];
$iid=$rowid[$count];
for($i=0;$i<=$count;$i++) {

$sql="update tblresult  set exam_marks='$emrks', test_marks='$tmrks' where id='$iid' ";
$query = $db->query($sql);

$msg="Result info updated successfully";
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
        <title>SMS Admin|  Student result info < </title>
      <?php include('includes/css.html');?>
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
                                    <h2 class="title">Student Result Info</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Result Info</li>
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
                                                    <h5>Update the Result info</h5>
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

<?php 

$ret = "SELECT tblstudents.StudentName,tblclasses.ClassName,tblclasses.Section,tblresult.termid,tblresult.session_id,tblterm.term from tblresult join tblstudents on tblresult.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=tblstudents.ClassId join tblterm on tblterm.id=tblresult.termid where tblstudents.StudentId='$stid' and tblresult.ClassId='$cid' and tblresult.termid='$tid' and tblresult.session_id='$ssid' limit 1";
$stmt = $db->query($ret);
$cnt=1;
if($stmt->num_rows > 0)
{
	
while($row = $stmt->fetch_object())
{  ?>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<?php echo htmlentities($row->StudentName);?>
</div>
</div>

                                                    <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
<?php echo htmlentities($row->ClassName)?>(<?php echo htmlentities($row->Section)?>)
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Term</label>
                                                        <div class="col-sm-10">
<?php echo htmlentities($row->term)?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Session</label>
                                                        <div class="col-sm-10">
<?php echo htmlentities($row->session_id."/".($row->session_id+1))?>
                                                        </div>
                                                    </div>
                                                    

<?php } }?>



<?php 
$sql = "SELECT distinct tblstudents.StudentName,tblstudents.StudentId,tblclasses.ClassName,tblclasses.Section,tblsubjects.SubjectName,tblresult.session_id,tblresult.exam_marks,tblresult.test_marks,tblresult.ClassId,tblresult.termid,tblresult.id as resultid from tblresult join tblstudents on tblstudents.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId='$stid' and tblresult.ClassId='$cid' and tblresult.termid='$tid' and tblresult.session_id='$ssid' ";
$query = $db->query($sql);
$cnt=1;
if($query->num_rows > 0)
{
	
while($result = $query->fetch_object())
{  ?>



<div class="form-group">
<label for="default" class="col-sm-2 control-label"><?php echo htmlentities($result->SubjectName)?></label>
<div class="col-sm-10">
<input type="hidden" name="id[]" value="<?php echo htmlentities($result->resultid)?>">

<!--<input type="text" name="marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->exam_marks)?>" maxlength="5" required autocomplete="off">-->

<div class="row">
                <div class="col-xs-6">
                Test
                  <input type="text"  name="testmarks[]" value="<?php echo htmlentities($result->test_marks)?>" class="form-control"  placeholder="Enter Test Score out of 30" maxlength="2" required autocomplete="off">
                </div>
                <div class="col-xs-6">
                Exam
                  <input type="text"  name="exammarks[]" value="<?php echo htmlentities($result->exam_marks)?>" class="form-control" placeholder="Enter Exam Score out of 70" maxlength="2" required autocomplete="off">
                </div>
                
              </div>

</div>
</div>




<?php }} ?>                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
        <script src="<?php echo SITE_URL;?>result/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/pace/pace.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/iscroll/iscroll.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/prism/prism.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/select2/select2.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/main.js"></script>
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
