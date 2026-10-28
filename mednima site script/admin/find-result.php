<?php
session_start();
error_reporting(0);
include('../controller/header.php');?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo SCHOOL_NAME;?> Result Checker</title>
        <?php include('includes/css.html');?>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="login-bg-color bg-black-300">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h4><?php echo SCHOOL_NAME;?> Result Checker</h4>
                                </div>
                            </div>
                            <div class="panel-body p-20">

                           

                                <form action="result.php" method="post">
                                	<div class="form-group">
                                		<label for="rollid">Enter your Reg No</label>
                                        <input type="text" class="form-control" id="rollid" placeholder="Enter Your Reg No" autocomplete="on" name="rollid">
                                	</div>
                               <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php 
$Class_List = $iSMartFUN->getTRows("tblclasses");
if($Class_List)
{
foreach($Class_List as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?> &nbsp; <?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
</div>


<div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Term</label>
 <select name="term" class="form-control" id="term" required="required">
<option value="">Select Term</option>
<?php 
$Term_List = $iSMartFUN->getTRows("tblterm");
if($Term_List)
{
foreach($Term_List as $result_Term_List)
{   ?>
<option value="<?php echo htmlentities($result_Term_List->id); ?>"><?php echo htmlentities($result_Term_List->term); ?></option>
<?php }} ?>
 </select>
</div>

<div class="form-group">
                                		<label for="rollid">Card S/N</label>
                                        <input type="text" class="form-control" id="card_sn" placeholder="Enter Scratch Card Serial Number" autocomplete="on" name="card_sn">
                                	</div>



<div class="form-group">
                                		<label for="rollid">Card Pin</label>
                                        <input type="text" class="form-control" id="card_pin" placeholder="Enter Scratch Card Pin" autocomplete="on" name="card_pin">
                                	</div>



    
                                    <div class="form-group mt-20">
                                        <div class="">
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Check Result<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                       <div class="col-sm-6">
                                                               <a href="index.php">Back to Home</a>
                                                            </div>
                                </form>

                                <hr>

                            </div>
                        </div>
                        <!-- /.panel -->
                        <p class="text-muted text-center">&copy; 2027 Medni'ima International School. All Rights Reserved | Design by Zainab Aliyu Adamu</p>
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

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
        <script src="<?php echo SITE_URL;?>result/js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo SITE_URL;?>result/js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
