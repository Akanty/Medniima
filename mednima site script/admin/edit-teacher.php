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
		
$tid=intval($_GET['tid']);
$query = $db->query("SELECT tblteacher.*,tblclasses.ClassName,tblclasses.Section from tblteacher join tblclasses on tblclasses.id=tblteacher.classid where tblteacher.id='$tid'");
if($query->num_rows > 0){
	$teacher_results = $query->fetch_object();
	$teacher_rand_id = explode("/",$teacher_results->username);
	$teacher_SUbjecs = explode(",",$teacher_results->subject_taken);
	
	
		
		
if(isset($_POST['submit']))
{
$fullname=$_POST['fullanme'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender']; 
$classid = $_POST['class']; 
$dob = $_POST['dob'];
$address = $_POST['address'];
$employ_date = $_POST['employdate'];
$salary = $_POST['salary']; 
$status=$_POST['status'];
$decipline = $_POST['decipline'];
$subject_taken = implode(",",$_POST['subject_to_id']);

$update_condition = array('id' =>$tid);
$UpdateData = array(
			'fullname' => $fullname,
			'phone'=> $phone,
			'email'=> $email,
			'address'=> $address,
			'gender'=> $gender,
			'salary' => $salary,
			'employ_date'=> $employ_date,
			'classid' => $classid,
			'decipline' => $decipline,
			'subject_taken' => $subject_taken,
			'DOB' => $dob,
			'status' => $status
			);
			
			$UpdateStaff = $iSMartFUN->UpdateTable("tblteacher",$UpdateData,$update_condition);

if($UpdateStaff)
{
	if(!empty($_FILES)){
		
		$targetDir = "../staff_images/";
	$fileName = $_FILES['file']['name'];
	$File_Ext           = substr($fileName, strrpos($fileName, '.')); //get file extention
	$NewFileName        = $teacher_rand_id.$File_Ext; //new file name
	
	$targetFile = $targetDir.$NewFileName;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		$db->query("UPDATE tblteacher set photo='$NewFileName' where id='$insertStaff'");	
	}
		
	}
	
$msg=" Staff Info Update successfully";
}
else 
{
$error=" Something went wrong. Please try again ".mysqli_error($db);
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin :: Edit Teacher Profile</title>
        <?php include('includes/css.html');?>

    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
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
                                    <h2 class="title">Edit Teacher Profile</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Edit Teacher Profile</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Teacher info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-10">
<div class="form-group">
<label for="default" class="control-label">Full Name</label>

<input type="text" name="fullanme" value="<?php echo htmlentities($teacher_results->fullname);?>" class="form-control" id="fullanme" required>

</div>


<div class="row">


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Staff ID.</label>

<input type="text" name="staffid" class="form-control" id="staffid" value="<?php echo htmlentities($teacher_results->username);?>" disabled required autocomplete="off">
</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label for="default" class="control-label">Salary</label>
<input type="text" name="salary" class="form-control" value="<?php echo htmlentities($teacher_results->salary);?>" id="email" required>

</div></div>

<div class="col-md-4 form-group form-last">
              <label class="control-label">Account Status</label>
              <select name="status" class="form-control" id="status" required="required">
<?php  
$str=$teacher_results->status;
if($str=="1")
{
?>
<option value="1" selected>Active</option>
<option value="0">Block</option>
<? }else{ ?>
<option value="0" selected>Block</option>
<option value="1">Active</option>
<? }?>

</select>
            </div>

</div>


</div>

<div class="col-md-2">
					
						<div class="item dark">
						    <img src="<?php echo htmlentities(SITE_URL."staff_images/".$teacher_results->photo);?>" alt="." class="w-full" id="TeacherPhoto">
						    <div class="post-file">
							<i class="fa fa-camera fa-2x"  style="margin:7px;"></i>
							<input name="file" id="image" multiple accept="image/*" type="file" onchange="readURL(this);">
							</div>
						   
						    
					
						
						
					</div>
				</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">

<label for="gender" class="control-label">Gender</label>

<select name="gender" class="form-control" id="gender" required="required">
<?php  
$gndr=$teacher_results->Gender;
if($gndr=="Male")
{
?>
<option value="Male" selected>Male</option>
<option value="Female">Female</option>
<? }else{ ?>
<option value="Female" selected>Female</option>
<option value="Male">Male</option>
<? }?>
</select>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
                                                    <label for="date" class="control-label">Date Of Birth</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="date" name="dob" class="form-control" value="<?php echo htmlentities($teacher_results->DOB);?>" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
  </div>          </div>
</div>



<div class="row">
<div class="col-md-6">

<div class="form-group">
<label for="phone" class="control-label">Phone</label>

<input type="text" name="phone" class="form-control" value="<?php echo htmlentities($teacher_results->phone);?>" id="phone" required>

</div>

</div>


<div class="col-md-6">
<div class="form-group">
<label for="default" class="control-label">Email</label>
<input type="email" name="email" class="form-control" id="email" value="<?php echo htmlentities($teacher_results->email);?>" required>
</div>

</div>

</div>

<div class="row">
<div class="col-md-6">

<div class="form-group">
<label for="default" class="control-label">Decipline</label>
<input type="text" name="decipline" class="form-control" id="decipline" value="<?php echo htmlentities($teacher_results->decipline);?>" required>

</div>

</div>

<div class="col-md-6">

<div class="form-group">
<label for="subject_taken" class="control-label">Subject(s) To Take</label>
<!--<input type="text" name="subject_taken" class="form-control" id="subject_taken" placeholder="Enter Subjects seprate with comma" required>-->

<select class="form-control select2" multiple="multiple" name="subject_to_id[]" data-placeholder="Select Subject" style="width: 100%;">
<?php 
$subject_list = $iSMartFUN->getTRows("tblsubjects");
if($subject_list)
{	
foreach($subject_list as $subject_result)
{ 
if(in_array($subject_result->id, $teacher_SUbjecs)) {
 
?>

<option value="<?php echo htmlentities($subject_result->id); ?>" selected><?php echo htmlentities($subject_result->SubjectName); ?> </option>

<? }else{?>

<option value="<?php echo htmlentities($subject_result->id); ?>"><?php echo htmlentities($subject_result->SubjectName); ?> </option>
<?php } }}?>
                </select>

</div>
</div>

</div>

<div class="row">
<div class="col-md-6">

 <div class="form-group">
  <label for="default" class="control-label">Class</label>
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php 
$class_list = $iSMartFUN->getTRows("tblclasses");
if($class_list)
{
foreach($class_list as $result)
{ if($result->id == $teacher_results->classid){  ?>
<option value="<?php echo htmlentities($result->id); ?>" selected><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>

<? }else{?>

<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }}} ?>
 </select>
                                                       
                                                    </div>

</div>

<div class="col-md-6">

<div class="form-group">
                                                    <label for="emplotdate" class="control-label">Date Employed</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' id="emplotdate" name="employdate" class="form-control" value="<?php echo htmlentities($teacher_results->employ_date);?>" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
 </div>
</div>


<div class="form-group">
<label for="address" class="control-label">Address</label>

<textarea rows="5" name="address" class="form-control" required><?php echo htmlentities($teacher_results->address);?></textarea>

</div>


                                                    
                                                    <div class="form-group">
                                                        <div class="">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update Now</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
        
        
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo SITE_URL;?>css/select2/select2.full.min.js"></script>
<script type="text/javascript">
            $(function () {
				
				$('#datetimepicker1').datetimepicker({
                viewMode: 'years',
                format: 'YYYY/MM/DD'
            });
			
			
			$('#datetimepicker2').datetimepicker({
                viewMode: 'years',
                format: 'YYYY/MM/DD'
            });
			
			 $(".select2").select2();   
            });
			
			
        </script>
        <script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#TeacherPhoto')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150)
						.addClass("circular--portrait");
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
        
    </body>
</html>
<?PHP }else{
echo "Teacher not found";	
}}?>
