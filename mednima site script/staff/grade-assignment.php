<?php
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Grade Assignment";
include("design/header.html");
include("design/nav.html");
if(isset($_GET['asid']))
{  
$asid=intval($_GET['asid']);
$sid=intval($_GET['sid']);

$query_assignment_details  =  $db->query("SELECT tblstudents.StudentId, tblstudents.StudentName,tblstudents.RollId, tblassignment.id as assignment_id,tblsubmited_assignment.student_id as subStudent_id, tblsubmited_assignment.submited_date,tblsubmited_assignment.status,tblsubmited_assignment.file,tblsubmited_assignment.score,tblsubmited_assignment.teacher_comment  from tblstudents join tblsubmited_assignment on tblsubmited_assignment.student_id = tblstudents.StudentId join tblassignment on tblassignment.id = tblsubmited_assignment.assignment_id where tblsubmited_assignment.assignment_id ='$asid' and tblsubmited_assignment.student_id='$sid' ");
if($query_assignment_details->num_rows > 0)
{
$query_assignment_result = $query_assignment_details->fetch_object();

if(isset($_POST['submit']))
{

$UpdateData = array(
			'score' => $_POST['score'],
			'status' => $_POST['status'],
			'teacher_comment' =>$_POST['comment']
			);
			$condition = array('assignment_id' => $asid, 'student_id'=>$sid);
			$GardeAssignment = $iSMartFUN->UpdateTable("tblsubmited_assignment",$UpdateData,$condition);


if($GardeAssignment)
{
$msg=" Assignemnt successfully Grade";
}
else 
{
$error=" Something went wrong. Please try again";
}

}
?>

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
    
    <!--banner-->	
		     <div class="banner">
            
                                        
		    	<h2>
				<a href="index.php"><i class="fa fa-home"></i> Home</a>
				<i class="fa fa-angle-right"></i>
                <span>Assignments</span>
                <i class="fa fa-angle-right"></i>
				<span>Grade Student Assignment</span>
				</h2>
		    </div>
		<!--//banner-->
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

           
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">



                    <div class="main-page">
                       <br>

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5><?php echo htmlentities($query_assignment_result->StudentName); ?></h5>
                                                    <div class="pull-right">
                                                           <a href="<?php SITE_URL;?>/doc/<?php echo htmlentities($query_assignment_result->file); ?>" class="btn btn-success btn-labeled">View Submitted File<span class="btn-label btn-label-right"></span></a>
                                                    </div>
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
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Score</label>
                                                        <div class="">
                                                            <input type="number"  value="<?php echo htmlentities($query_assignment_result->score); ?>" name="score" required class="form-control" id="success">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">Status</label>
                                                        <div class="">
                                                            <select name="status" class="form-control classid" required="required">
<option value="">Select Status</option>
<option value="1">Mark</option>
<option value="2">Reject</option>
</select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Comment</label>
                                                        <div class="">
                                                        <textarea rows="5" cols="4" name="comment" class="form-control" required id="success"><?php echo htmlentities($query_assignment_result->teacher_comment); ?></textarea> 
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                     
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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
        <script src="<?php echo SITE_URL;?>result/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/pace/pace.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?php echo SITE_URL;?>result/js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo SITE_URL;?>result/js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  }} ?>
