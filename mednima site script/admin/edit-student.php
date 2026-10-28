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
$stid=intval($_GET['stid']);
$query = $db->query("SELECT tblstudents.*,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId='$stid'");

if($query->num_rows > 0){
$student_results = $query->fetch_object();
$student_name = explode(" ",$student_results->StudentName);
$student_rand_id = explode("/",$student_results->RollId);
		
		
if(isset($_POST['submit']))
{ 
 $gender=$_POST['gender']; 
$classid=$_POST['class']; 
$dob=$_POST['dob']; 
$address=$_POST['address'];
$state=$_POST['state'];
$LGA=$_POST['LGA'];
$town=$_POST['town'];
$F_school_name=$_POST['F_school_name'];
$F_school_date=$_POST['F_school_date'];
$F_school_address=$_POST['F_school_address']; 
$status= $_POST['status'];
$parent_id= $_POST['parent_id'];

$update_condition = array('StudentId' =>$stid);
$UpdateData = array(
			'StudentName' => $_POST['fname']." ".$_POST['mname']." ".$_POST['lname'],
			'Gender'=> $gender,
			'parent_id' => $parent_id,
			'ClassId' => $classid,
			'DOB' => $dob,
			'address' => $address,
			'state' => $state,
			'LGA' => $LGA,
			'town' => $town,
			'F_school_name' => $F_school_name,
			'F_school_address' => $F_school_address,
			'F_school_date' => $F_school_date,
			'Status' => $status,
			);
			
			
			$UpdateStudent = $iSMartFUN->UpdateTable("tblstudents",$UpdateData,$update_condition);

if($UpdateStudent)
{
	
	if(!empty($_FILES)){
		
	$targetDir = "../student_passport/";
	$fileName = $_FILES['file']['name'];
	$File_Ext           = substr($fileName, strrpos($fileName, '.')); //get file extention
	$NewFileName        = $student_rand_id[2].$File_Ext; //new file name
	
	$targetFile = $targetDir.$NewFileName;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		$db->query("UPDATE tblstudents set photo='$NewFileName' where StudentId='$stid'");	
	}
		
	}
	
	
	
$msg=" Student Information Update successfully";

}
else 
{
$error=" Something went wrong. Please try again ".mysqli_error($db);;
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin| Edit Student Profile </title>
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
                                    <h2 class="title">Edit Student Profile</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Edit Student Profile</li>
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
                                                    <h5>Fill the Student info</h5>
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
   
                                                <form action="" method="post" enctype="multipart/form-data">
<fieldset>
   <legend>Student Info</legend>
<div class="row">
<div class="col-md-10">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">First Name</label>

<input type="text" placeholder="First Name" name="fname" value="<? echo htmlentities($student_name[0]);?>" class="form-control" id="fullanme" required>
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Middle Name</label>

<input type="text" name="mname" placeholder="Middle Name" value="<? echo htmlentities($student_name[1]);?>" class="form-control" id="fullanme" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Last Name</label>

<input type="text" name="lname" class="form-control" value="<? echo htmlentities($student_name[2]);?>" placeholder="Last Name" id="fullanme" required>
</div>
</div>

</div>


<div class="row">


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Reg. No.</label>

<input type="text" name="rollid" class="form-control" id="rollid" value="<?php echo htmlentities($student_results->RollId);?>" disabled required>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label for="gender" class="control-label">Gender</label>

<select name="gender" class="form-control" id="gender" required="required">
<?php  
$gndr=$student_results->Gender;
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
</div></div>


<div class="col-md-4">
 <div class="form-group">
                                                    <label for="date" class="control-label">Date Of Birth</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="date" name="dob" value="<?php echo htmlentities($student_results->DOB);?>" class="form-control" placeholder="Date Of Birth" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
</div>


</div>


</div>

<div class="col-md-2">
					
						<div class="item dark">
						    <img src="<?php echo SITE_URL."student_passport/".$student_results->photo;?>" alt="." class="w-full" id="StudentPhoto">
						    <div class="post-file">
							<i class="fa fa-camera fa-2x"  style="margin:7px;"></i>
							<input name="file" id="image" multiple accept="image/*" type="file" onchange="readURL(this);">
							</div>
						   
						    
					
						
						
					</div>
				</div>
</div>



<div class="row">
                                                    
<div class="col-md-4 form-group">
<label for="default" class="control-label">Class</label>
                                                        
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php 
$class_list = $iSMartFUN->getTRows("tblclasses");
if($class_list)
{
foreach($class_list as $result)
{ if($result->id == $student_results->ClassId){ ?>

<option value="<?php echo htmlentities($result->id); ?>" selected><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>

<? }else{?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }}} ?>
 </select>
</div>
      
      
<div class="col-md-4 form-group">
<label for="default" class="control-label">Parent</label>
                                                        
 <select name="parent_id" class="form-control" id="default" required="required">
<option value="">Select Parent</option>
<?php 
$parent_list = $iSMartFUN->getTRows("tblparent");
if($parent_list)
{
foreach($parent_list as $parent_list_result)
{  
if($parent_list_result->id == $student_results->parent_id){?>
	<option value="<?php echo htmlentities($parent_list_result->id); ?>" selected><?php echo htmlentities($parent_list_result->fullname); ?></option>
<? }else{?>
<option value="<?php echo htmlentities($parent_list_result->id); ?>"><?php echo htmlentities($parent_list_result->fullname); ?></option>
<?php }}} ?>
 </select>
</div>
      
      <div class="col-md-4 form-group form-last">
              <label class="control-label">Account Status</label>
              <select name="status" class="form-control" id="status" required="required">
<?php  
$str=$student_results->Status;
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




<div class="row">

 <div class="col-md-4 form-group">
              <label class="control-label">State of Origin</label>
              <input type="text" name="state" value="<?php echo $student_results->state;?>" class="form-control" placeholder="State of Origin" required>
            </div>
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Local Govt.</label>
              <input type="text" name="LGA" class="form-control" value="<?php echo htmlentities($student_results->LGA);?>" placeholder="Local Govt." required>
            </div>
            
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Town.</label>
              <input type="text" name="town" class="form-control" value="<?php echo htmlentities($student_results->town);?>" placeholder="Town" required>
            </div>
            
            </div>



                                                    
                                                    
   <div class="form-group">
<label for="address" class="control-label">Home Address</label>

<textarea rows="5" name="address" class="form-control" required><?php echo htmlentities($student_results->address);?></textarea>

</div>                                                 
 </fieldset>  
 
 
 <fieldset>
   <legend>Former School Details</legend>
 <div class="row">  
   
    <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Fullname of School</label>
              <input type="text" name="F_school_name" class="form-control" value="<?php echo htmlentities($student_results->F_school_name);?>"  placeholder="Fullname of School" required>
            </div>
            
            <div class="col-md-4 form-group1 group-mail">
              <label class="control-label">Address</label>
              <input type="text" name="F_school_address" value="<?php echo htmlentities($student_results->F_school_address);?>" class="form-control"  placeholder="Location" required>
            </div>
            
            <div class="col-md-2 form-group1 group-mail">
              <label class="control-label ">Last Date</label>
              <div class='input-group date' id='datetimepicker2'>
                    <input type='date' id="date" name="F_school_date" value="<?php echo htmlentities($student_results->F_school_date);?>" class="form-control" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
   
   </div>
   
   </fieldset>     
                                               
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
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
            <script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.47/build/js/bootstrap-datetimepicker.min.js"></script>
   
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

			    
            });
			
			
        </script>
         <script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#StudentPhoto')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
        
        
    </body>
</html>
<?PHP }else{
	echo "student not found";
	
}}?>
