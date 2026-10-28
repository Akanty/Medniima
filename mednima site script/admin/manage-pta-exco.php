
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
		
// for Delete card
if(isset($_GET['did']))
{
$did=intval($_GET['did']);

$query = $db->query("DELETE FROM tblpta_excos where parent_id='$did'");
$db->query("UPDATE tblparent set pta_exco='0' where id='$did'");

if($query){
$msg="Parent Removed From PTA Exco successfully";
}
else{
$error = "An error occure pls try again later";
}
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage P.T.A Excos</title>
        <?php include('includes/css.html');?>
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
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage P.T.A Excos</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li>Parents</li>
            							<li class="active">Manage P.T.A Excos</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             
<div id="divToPrint">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Manage P.T.A Excos</h5>
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
                                                       		 <th>Fullname</th>
                                                            <th>Parent ID</th>
                                                            <th>Phone</th>
                                                            <th>Post</th>
                                                            <th>No Of Children</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          <th>#</th>
                                                            <th>Fullname</th>
                                                            <th>Parent ID</th>
                                                            <th>Phone</th>
                                                            <th>Post</th>
                                                            <th>No Of Children</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php 
//$tblparent_condition['where'] = array('pta_exco' => 1);
//$tblparent_condition['order_by'] = 'date DESC';

$ptaquery = $db->query("select tblparent.*, tblpta_excos.post from tblparent join tblpta_excos on tblpta_excos.parent_id = tblparent.id where tblparent.pta_exco ='1'");

//$parent_list = $iSMartFUN->getTRows("tblparent",$tblparent_condition);



$cnt=1;
if($ptaquery->num_rows > 0)
{
while($result = $ptaquery->fetch_object())
{ 
$sql1 ="SELECT StudentId from tblstudents where parent_id='$result->id' ";
$query1 = $db ->query($sql1);
$results1=$query1->fetch_object();
$totalstudents=$query1->num_rows;

  ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            
                                                           
                                                            <td><?php echo htmlentities($result->title." ".$result->fullname);?></td>
                                                            <td><?php echo htmlentities($result->username);?></td>
                                                            <td><?php echo htmlentities($result->phone);?></td>
                                                            <td><?php echo htmlentities($result->post);?></td>
                                                            <td><?php echo htmlentities($totalstudents);?></td>
                                                            
                                                            
<td>
<a href="edit-parent.php?pid=<?php echo htmlentities($result->id);?>"><i class="fa fa-edit" title="Edit Record"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;
<a href="manage-pta-exco.php?did=<?php echo htmlentities($result->id);?>"><i class="fa fa-times" title="Delete"></i> </a> 



</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>
</div>
                                         
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
<?php } ?>

