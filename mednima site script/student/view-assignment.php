<?php
 
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Assignment Details";
include("design/header.html");
include("design/nav.html");

if(isset($_GET['asid']))
{
$asid=intval($_GET['asid']);

$query  =  $db->query("SELECT tblassignment.*,tblclasses.ClassName,tblclasses.Section,tblclasses.id,tblsubjects.id as subid,tblsubjects.SubjectName from tblassignment join tblclasses on tblclasses.id=tblassignment.class_id join tblsubjects on tblsubjects.id = tblassignment.subject_id where tblassignment.id='$asid'");



if($query->num_rows > 0){
$assignment_view_result = $query->fetch_object();

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
				<span>Assignment Details</span>
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
                                                    <h5>Assignment Details</h5>
                                                     <div class="pull-right">
                                                           <a href="submit-assignment.php?asid=<?php echo $asid;?>" class="btn btn-success btn-labeled">Submit Assignment<span class="btn-label btn-label-right"></span></a>
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
                                                			<input type="text" name="name" value="<?php echo htmlentities($assignment_view_result->name);?>"class="form-control" required id="success" disabled>
                                                		</div>
                                                	</div>
  
  <div class="row">
  <div class="col-md-6">
  
  <div class="form-group has-success">
                                                    <label for="success-date" class="control-label">Submition Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="date" value="<?php echo htmlentities($assignment_view_result->dead_line_date);?>" class="form-control" required class="form-control" disabled />
                   
                </div>
            </div>
            </div>
            
            <div class="col-md-6">
            <div class="form-group has-success">
                                                    <label for="success-date" class="control-label">Submition Time</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="time" value="<?php echo htmlentities($assignment_view_result->dead_line_time);?>" class="form-control" required class="form-control" disabled />
                    
                </div>
            </div>  
            </div>
            
            </div>                                          
                                                  
                                                       
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Question</label>
                                                        <div class="">
                                                        
                                                        <textarea rows="5" cols="4" name="question" class="form-control" required id="success"><?php echo htmlentities($assignment_view_result->question);?></textarea> 
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                            <a href="print-assignment.php?asid=<?php echo $asid;?>" class="btn btn-danger btn-labeled"><i class="fa fa-print"></i></span> Print<span class="btn-label btn-label-right"></a>
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
            <script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.47/build/js/bootstrap-datetimepicker.min.js"></script>

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
