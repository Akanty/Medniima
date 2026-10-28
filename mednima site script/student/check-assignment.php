<?php 
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Check Assignment";
include("design/header.html");
include("design/nav.html");?>
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
        
        <link rel="stylesheet" href="<?php echo SITE_URL;?>admin/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo SITE_URL;?>admin/css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo SITE_URL;?>admin/css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="<?php echo SITE_URL;?>admin/css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="<?php echo SITE_URL;?>admin/css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="<?php echo SITE_URL;?>admin/css/icheck/skins/line/green.css" >
        
        <script src="<?php echo SITE_URL;?>admin/js/modernizr/modernizr.min.js"></script>
        
    </head>
    
    <!--banner-->	
		     <div class="banner">
            
                                        
		    	<h2>
				<a href="index.php"><i class="fa fa-home"></i> Home</a>
				<i class="fa fa-angle-right"></i>
                <span>Assignments</span>
                <i class="fa fa-angle-right"></i>
				<span>Check Assignments</span>
				</h2>
		    </div>
		<!--//banner-->
    
    <div class="blank">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
 

                    <div class="main-page">
                        <br>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Assignments </h5>
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
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Assignment Name</th>
                                                            <th>Subject</th>
                                                         
                                                            <th>Submission Date</th>
                                                            <th>Your Status</th>
                                                            <th>Ass. Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
<?php 


$query  =  $db->query("SELECT tblassignment.name,tblassignment.id as assignment_id,tblassignment.dead_line_date,tblassignment.teacher_id,tblassignment.status,tblassignment.class_id,tblassignment.subject_id,tblclasses.ClassName,tblclasses.Section,tblclasses.id,tblsubjects.id as subid,tblsubjects.SubjectName from tblassignment join tblclasses on tblclasses.id=tblassignment.class_id join tblsubjects on tblsubjects.id = tblassignment.subject_id where tblassignment.class_id='$student_datail_list->ClassId'");
$cnt=1;
if($query->num_rows > 0)
{
while($result = $query->fetch_object())
{  
$query11 =$db ->query("SELECT id from tblsubmited_assignment where assignment_id='$result->assignment_id' and student_id='$student_datail_list->StudentId'");

?>

 
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($result->name);?></td>
                                                            <td><?php echo htmlentities($result->SubjectName);?></td>
                                                            <td><?php echo htmlentities($result->dead_line_date);?></td>
                                                            <td>
															<?php if($query11->num_rows >0)echo "Submited"; else echo "Not Yet Submit";?></td>
                                                            
                                                             <td><?php if($result->status==1){
echo htmlentities('Open');
}
else{
   echo htmlentities('Closed'); 
}
                                                                ?></td>
<td>
<a href="view-assignment.php?asid=<?php echo htmlentities($result->assignment_id);?>"><i class="fa fa-edit" title="Edit Assignment"></i> </a> 

</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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
        <script src="<?php echo SITE_URL;?>admin/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/pace/pace.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?php echo SITE_URL;?>admin/js/prism/prism.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo SITE_URL;?>admin/js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    <?php include("design/footer.html");?>

