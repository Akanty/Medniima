<?php
 
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Assignment Details";
include("design/header.html");
include("design/nav.html");

$asid=intval($_GET['asid']);

$query  = $db->query("SELECT tblstudents.*, tblassignment.name,tblassignment.id as assignment_id,tblassignment.dead_line_date,tblassignment.question,tblassignment.teacher_id,tblassignment.status,tblassignment.class_id,tblassignment.subject_id,tblclasses.ClassName,tblclasses.Section,tblclasses.id,tblsubjects.id as subid,tblsubjects.SubjectName from tblassignment join tblclasses on tblclasses.id=tblassignment.class_id join tblsubjects on tblsubjects.id = tblassignment.subject_id join tblstudents on tblstudents.ClassId=tblassignment.class_id where tblstudents.StudentId='$asid'");
$cnt=1;
if($query->num_rows < 1){
	echo '<div class="blank text-center"><div class="alert alert-danger left-icon-alert" role="alert">
 <strong>Error!</strong> No Assignment found</div></div>';
}else{
	

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
				<span>Assignment Details</span>
				</h2>
		    </div>
		<!--//banner-->
        <br>
    <div class="blank">
        

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5><?php echo htmlentities($assignment_view_result->StudentName);?> Assignment</h5>
                                                     
                                                </div>
                                            </div>
           
  
                                            <div class="panel-body p-20">

                                               


                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>
                                                            <th>Question</th>
                                                         <th>Submition</th>
                                                            <th>Score</th>
                                                            <th>Deadline</th>
                                                            
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    
<? while($assignment_view_result = $query->fetch_object()){
	$query11 =$db->query("SELECT id from tblsubmited_assignment where assignment_id='$assignment_view_result->assignment_id' and student_id='$assignment_view_result->StudentId'");
	?>
	<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($assignment_view_result->SubjectName);?></td>
                                                            <td><?php echo htmlentities($assignment_view_result->question);?></td>
                                                             <td><?php if($query11->num_rows >0)echo "Submited"; else echo "Not Yet Submit";?></td>
                                                             
<td>

<?php  
if($query11->num_rows < 1)
{echo "-";}
else{
	echo $assignment_view_result->score;
}
?>
</td>
                   
                                                            
                                                            <td><?php echo htmlentities($assignment_view_result->dead_line_date);?></td>
                                                           
                                                           
                                                           
                                                            <td><?php if($assignment_view_result->status==1){
echo htmlentities('Open');
}
else{
   echo htmlentities('Closed'); 
}
                                                                ?></td>

</tr>	
<? $cnt=$cnt+1; }?>


                              </tbody>
                                                </table>
                 
                                            </div>
                                        </div>
<? }?>
                                        
                                        
                                        
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
        <script src="<?php echo SITE_URL;?>admin/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/pace/pace.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?php echo SITE_URL;?>admin/js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo SITE_URL;?>admin/js/main.js"></script>
        


<?
include("design/footer.html");
?>
