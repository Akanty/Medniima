<?php
session_start();
//error_reporting(0);
include('../controller/header.php');
if(strlen($_SESSION['alogin'])=="")
    {   
     $login_url=''.SITE_URL.'login';   
    header("Location: $login_url"); 
    }
    else{
if(isset($_POST['submit']))
{
$question=$_POST['question'];
$subject_id=$_POST['subject_id'];
$optionA=$_POST['optionA'];
$optionB=$_POST['optionB']; 
$optionC=$_POST['optionC'];
$optionD=$_POST['optionD'];
$optionE=$_POST['optionE'];
$answer=$_POST['answer'];
$InsertData = array(
			'Question' => $question,
	        'Option_A' => $optionA,
			'Option_B' => $optionB,
			'Option_C' => $optionC,
			'Option_D' => $optionD,
			'Option_E' => $optionE,
			'Answer' => $answer,
			'sub_id' => $subject_id
			
			);
			
$check_Question = $db->query("SELECT * FROM quiz_questions WHERE Question='$question'");

			
			if($check_Question->num_rows > 0){
				
			$error=" Question ALready Exist";	
			}else{
			
			$insertExam_Question = $iSMartFUN->insertTable("quiz_questions",$InsertData);
if($insertExam_Question)
{
	
$msg=" CBT Exam Question Created successfully";
}
else 
{
$error=" Something went wrong. Please try again";
}
			}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Create CBT Exam Question</title>
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
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Create CBT Exam Question</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">CBT Exam Question</a></li>
            							<li class="active">Create CBT Exam Question</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Create CBT Exam Question</h5>
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
                                                
                                                <div class="row">
                                                
                                                      
                                                
                                                
                                                <div class="col-md-12">
                                                
                                                
                                                
                                                <!--<div class="form-group">
                                                        <label for="subject" class="control-label">Exam Category</label>
                                                        
 <select name="exam_cat[]" class="form-control select2" multiple="multiple" id="subject" data-placeholder="Select Exam Type" style="width: 100%;" required="required">
<?php 
$squery= $iSMartFUN->getTRows("quiz_categories");
if($squery)
{
foreach($squery as $sresult)
{   ?>
<option value="<?php echo htmlentities($sresult->id); ?>"><?php echo htmlentities($sresult->name); ?> </option>
<?php }} ?>
 </select>
                                                        </div>-->
                                                    
                                                    
                                                     <div class="form-group has-success">
                                                        <label for="subject_id" class="control-label">Subject</label>
                                                   <select name="subject_id" class="form-control" id="subject_id" required="required">
<option value="">Select Correct Option</option>
<?php 
$squery= $iSMartFUN->getTRows("quiz_subjects");
if($squery)
{
foreach($squery as $sresult)
{   ?>
<option value="<?php echo htmlentities($sresult->subject_id); ?>"><?php echo htmlentities($sresult->subject_name); ?> &nbsp; - <?php echo htmlentities($sresult->subject_desc); ?></option>
<?php }} ?>
 </select>
                                                    
     </div>
                                                
                                                
                                                
                                                
                                                    <div class="form-group has-success">
                                                        <label for="question" class="control-label">Question</label>
                                                		<textarea cols="4" rows="4" name="question" id="question" class="form-control" required></textarea>
                                                			
                                                		
                                                	</div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                       
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Option A</label>
                                                        <div class="">
                                                            <input type="text" name="optionA" class="form-control" required id="success">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Option B</label>
                                                        <div class="">
                                                            <input type="text" name="optionB" class="form-control" required id="success">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Option C</label>
                                                        <div class="">
                                                            <input type="text" name="optionC" class="form-control" required id="success">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Option D</label>
                                                        <div class="">
                                                            <input type="text" name="optionD" class="form-control" required id="success">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Option E</label>
                                                        <div class="">
                                                            <input type="text" name="optionE" class="form-control" required id="success">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                               <div class="form-group has-success">
                                                        <label for="status" class="control-label">Answer</label>
                                                       
                                                    <select name="answer" class="form-control" id="answer" required="required">
<option value="">Select Correct Option</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
</select>
                                                    
     </div>
                 
                 </div>
                 
                 
                                          
                 
                 
                 </div><!-- /row-->
                 
                     <div class="row">                                                                               
                              <div class="col-md-12">                      
  <div class="form-group has-success">

                                                        
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>
                                                    </div>
                                                </form>


                                                    
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
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>


      <script>
            $(function($) {
				$(".select2").select2();
				 });
        </script>
<script src="<?php echo SITE_URL;?>css/select2/select2.full.min.js"></script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
