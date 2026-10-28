<?php
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Manage Students Results";
include("design/header.html");
include("design/nav.html");
		

//get student id
$student_id = $_GET['stid'];
		
		 // for Delete Subject
if(isset($_GET['did']))
{
$did=intval($_GET['did']);
$cid=intval($_GET['cid']);
$ssid=intval($_GET['ssid']);
$tid=intval($_GET['tid']);
$status=0;
$sql="delete from tblresult where StudentId='$did' and ClassId='$cid' and termid='$tid' and session_id='$ssid' ";
$query = $db->query($sql);
if($query){
$msg="Result Deleted successfully Please Refresh";
}else{
$error="Something went wrong. Please try again";
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
                <span>Rresult</span>
                <i class="fa fa-angle-right"></i>
				<span>Manage Student Results</span>
				</h2>
		    </div>
		<!--//banner--><br>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

          
            <div class="content-wrapper">
                <div class="content-container">
 

                    <div class="main-page">
                        
                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Students Info</h5>
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
                                                            <th>Student Name</th>
                                                            <th>Roll Id</th>
                                                            <th>Class</th>
                                                            <th>Term</th>
                                                            <th>Session</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          <th>#</th>
                                                            <th>Student Name</th>
                                                            <th>Roll Id</th>
                                                            <th>Class</th>
                                                            <th>Term</th>
                                                            <th>Session</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php $sql = "SELECT  distinct tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section, tblresult.id as rid,tblresult.termid,tblresult.session_id,tblterm.term,tblresult.ClassId from tblresult join tblstudents on tblstudents.StudentId=tblresult.StudentId  join tblclasses on tblclasses.id=tblresult.ClassId join tblterm on tblterm.id=tblresult.termid where tblresult.StudentId='$student_id' group by tblresult.termid, tblresult.session_id ";
$query = $db->query($sql);
$cnt=1;
if($query->num_rows > 0)
{
while($result = $query->fetch_object())
{   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($result->StudentName);?></td>
                                                            <td><?php echo htmlentities($result->RollId);?></td>
                                                            <td><?php echo htmlentities($result->ClassName);?>(<?php echo htmlentities($result->Section);?>)</td>
                                                            <td><?php echo htmlentities($result->term);?></td>
                                                            <td><?php echo htmlentities($result->session_id."/".($result->session_id+1));?></td>
                                                             <td><?php if($result->Status==1){
echo htmlentities('Active');
}
else{
   echo htmlentities('Blocked'); 
}
                                                                ?></td>
<td>
<a href="edit-result.php?stid=<?php echo htmlentities($result->StudentId);?>&cid=<?php echo htmlentities($result->ClassId);?>&tid=<?php echo htmlentities($result->termid);?>&ssid=<?php echo htmlentities($result->session_id);?>"><i class="fa fa-edit" title="Edit Result"></i> </a>

&nbsp;&nbsp;&nbsp;&nbsp;
<a href="manage-results.php?did=<?php echo htmlentities($result->StudentId);?>&cid=<?php echo htmlentities($result->ClassId);?>&tid=<?php echo htmlentities($result->termid);?>&ssid=<?php echo htmlentities($result->session_id);?>" onClick="confirm('do you really want to Delet this Result?');"><i class="fa fa-times" title="Delect Result"></i> </a>

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
    </body>
</html>


