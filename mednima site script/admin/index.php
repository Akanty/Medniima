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
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo SCHOOL_NAME;?> | Admin Dashboard</title>
        
        <?php include('includes/css.html');?>
        <link rel="stylesheet" href="<?php echo SITE_URL;?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo SITE_URL;?>css/main.css">
        
        
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->
                        
                        <? if(strlen($_SESSION['loginNow'])!=""){?>
                        
                        <div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

		</div>
        <? } unset($_SESSION['loginNow']);?>

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-students.php">
<?php 
$sql1 ="SELECT StudentId from tblstudents ";
$query1 = $db ->query($sql1);
$results1=$query1->fetch_object();
$totalstudents=$query1->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                                            <span class="name">Students</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-teachers.php">
<?php 
$sql11 ="SELECT id from tblteacher ";
$query11 = $db ->query($sql11);
$results11=$query11->fetch_object();
$totalteachers=$query11->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalteachers);?></span>
                                            <span class="name">Teachers</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-info" href="manage-parents.php">
<?php 
$parentQuery= $db->query("SELECT id from tblparent ");
$totalPrents=$parentQuery->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalPrents);?></span>
                                            <span class="name">Parent</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                   
                                    

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="manage-subjects.php">
<?php 
$query = $db->query("SELECT id from  tblsubjects");
$results=$query->fetch_object();
$totalsubjects=$query->num_rows;
?>
                                            <span class="number counter"><?php echo htmlentities($totalsubjects);?></span>
                                            <span class="name">Subjects Listed</span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                     </div>
                                     <!-- /.row -->
                                    
                                    <div class="row">
                                    

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="manage-classes.php">
                                        <?php 
$query2 = $db->query("SELECT id from  tblclasses");
$results2=$query2->fetch_object();
$totalclasses=$query2->num_rows;
?>
                                            <span class="number counter"><?php echo htmlentities($totalclasses);?></span>
                                            <span class="name">Total classes listed</span>
                                            <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    
                                    
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-cards.php">
                                        <?php 
$query6= $db->query("SELECT id from  tblscracth_card");
$results5 = $query6->fetch_object();
$totalCards=$query6->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalCards);?></span>
                                            <span class="name">Scratch Cards</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-results.php">
                                        <?php 
$query3= $db->query("SELECT  distinct StudentId from  tblresult");
$results3=$query3->fetch_object();
$totalresults=$query3->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalresults);?></span>
                                            <span class="name">Results Declared</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                
                                
                                
                                
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="manage-news.php">
                                        <?php 
$query4= $db->query("SELECT id from  tblnews");
$results4 = $query4->fetch_object();
$totalnews=$query4->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalnews);?></span>
                                            <span class="name">News</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    </div><!--/row-->
                                    
                                    <div class="row">
                                    
                                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-events.php">
                                        <?php 
$query5= $db->query("SELECT id from  tblevent");
$results5 = $query5->fetch_object();
$totalevents=$query5->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalevents);?></span>
                                            <span class="name">Events</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="manage-slider.php">
                                        <?php 
$queryslider= $db->query("SELECT id from  home_slider");
$totalslider=$queryslider->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totalslider);?></span>
                                            <span class="name">Homepage Slider</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="manage-gallery.php">
                                        <?php 
$querytblgallery= $db->query("SELECT id from  tblgallery");
$totaltblgallery=$querytblgallery->num_rows;
?>

                                            <span class="number counter"><?php echo htmlentities($totaltblgallery);?></span>
                                            <span class="name">Photo Gallery</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="page-settings.php">
                                       
<?php 
$querytblpages= $db->query("SELECT id from  tblpages");
$totaltblpages=$querytblpages->num_rows;
?>
                                            <span class="number counter"><?php echo htmlentities($totaltblpages);?></span>
                                            <span class="name">Settings</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                   
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
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        
        
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to <?php echo SCHOOL_NAME;?> Admin Panel");

            });
        </script>
        <script src="<?php echo SITE_URL;?>js/main_new.js"></script>
        <script src="<?php echo SITE_URL;?>js/modernizr-2.6.2.min.js"></script>
        
    </body>
</html>
<?php } ?>
