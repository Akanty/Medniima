<?php
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Manage Students Results";
include("design/header.html");
include("design/nav.html");

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

$msg=" Result info updated successfully";
}
}
}

?>
 <!--banner-->	
		     <div class="banner">
            
                                        
		    	<h2>
				<a href="index.php"><i class="fa fa-home"></i> Home</a>
				<i class="fa fa-angle-right"></i>
                <span>Rresult</span>
                <i class="fa fa-angle-right"></i>
				<span>Edit Student Results</span>
				</h2>
		    </div>
		<!--//banner--><br>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

           
            <div class="content-wrapper">
                <div class="content-container">

                  

                    <div class="main-page">

                     
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

