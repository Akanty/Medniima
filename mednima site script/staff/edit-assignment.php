<?php
 
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Modify Assignment";
include("design/header.html");
include("design/nav.html");

if(isset($_GET['asid']))
{
$asid=intval($_GET['asid']);

$query  =  $db->query("SELECT tblassignment.*,tblclasses.ClassName,tblclasses.Section,tblclasses.id,tblsubjects.id as subid,tblsubjects.SubjectName from tblassignment join tblclasses on tblclasses.id=tblassignment.class_id join tblsubjects on tblsubjects.id = tblassignment.subject_id where tblassignment.id='$asid'");



if($query->num_rows > 0){
$edit_result = $query->fetch_object();
if(isset($_POST['submit']))
{

$UpdateData = array(
			'name' => $_POST['name'],
			'teacher_id' => $teacher_datail->id,
			'class_id' =>$_POST['class'],
			'subject_id' =>$_POST['subject_id'],
			'question' =>  $_POST['question'],
			'dead_line_date' =>  $_POST['date'],
			'dead_line_time' =>  $_POST['time'],
			'created_date'=> date("Y-m-d H:i:s")
			);
			$condition = array('id' => $asid);
			$updateAssignment = $iSMartFUN->UpdateTable("tblassignment",$UpdateData,$condition);

if($updateAssignment)
{
$msg=" Assignment Updated successfully";
}
else 
{
$error=" Something went wrong. Please try again";
}

}
?>   

       <script>

function getsubject(cid) 
{   
    
var clid=$(".classid").val();

    $.ajax({
        type: "POST",
        url: "get_item_for_me.php",
        data:'getclassSubject='+clid,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>



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
				<span>Modify Assignment</span>
				</h2>
		    </div>
		<!--//banner-->
        <br>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

           
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">


                    <div class="main-page">
                        

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Add Assignment</h5>
                                                     <div class="pull-right">
                                                           <a href="submitted-assignment.php?asid=<?php echo $asid;?>" class="btn btn-success btn-labeled">View Submitted Assignment<span class="btn-label btn-label-right"></span></a>
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
                                                        <label for="success" class="control-label">Assignment Name</label>
                                                		<div class="">
                                                			<input type="text" name="name" value="<?php echo htmlentities($edit_result->name);?>"class="form-control" required id="success" onFocus="getsubject(<?php echo htmlentities($edit_result->class_id);?>);">
                                                		</div>
                                                	</div>
                                                    
                                                    
<div class="form-group has-success">
<label for="default" class="control-label">Class</label>
 
 <select name="class" class="form-control classid" id="classid" onChange="getsubject(this.value);" required="required">
<option value="<?php echo htmlentities($edit_result->class_id);?>"><?php echo htmlentities($edit_result->ClassName);?> &nbsp; Section-<?php echo htmlentities($edit_result->Section); ?></option>
<?php 
$class_condition["where"] =  array("id" => $teacher_datail->classid);
$class_list = $iSMartFUN->getTRows("tblclasses",$class_condition);
if($class_list)
{
foreach($class_list as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
 </div>
 
  <div  id="reslt"></div> 
  
  <div class="row">
  <div class="col-md-6">
  
  <div class="form-group has-success">
                                                    <label for="success-date" class="control-label">Submition Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="date" value="<?php echo htmlentities($edit_result->dead_line_date);?>" class="form-control" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            </div>
            
            <div class="col-md-6">
            <div class="form-group has-success">
                                                    <label for="success-date" class="control-label">Submition Time</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="time" value="<?php echo htmlentities($edit_result->dead_line_time);?>" class="form-control" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>  
            </div>
            
            </div>                                          
                                                  
                                                       
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Question</label>
                                                        <div class="">
                                                        
                                                        <textarea rows="5" cols="4" name="question" class="form-control" required id="success"><?php echo htmlentities($edit_result->question);?></textarea> 
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
        
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
            $(function () {
				
				$('#datetimepicker1').datetimepicker({
                viewMode: 'years',
                format: 'YYYY/MM/DD'
            });
			
			    
            });
			
			 $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'LT'
                });
            });
			
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<? }}else{
	
}?>
