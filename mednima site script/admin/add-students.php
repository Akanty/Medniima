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
		$randNo = rand(11111,99999);
		$reg_no = "MIS/STU/".$randNo;
$Schoo_House_List = array("RED","BLUE","GREEN","WHITE","YELLOW");
if(isset($_POST['submit']))
{
$studentname=$_POST['fullanme'];
$names = explode(" ", $studentname);
$email = $iSMartFUN->get_first_char($_POST['fname']).$iSMartFUN->get_first_char($_POST['mname']).$iSMartFUN->get_first_char($_POST['lanme']).$randNo."@mis.com";
$rollid=$reg_no; 
$studentemail=$_POST['emailid']; 
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
$sport_house = $_POST['sport_house']; 
$status=1;



$InsertData = array(
			'StudentName' => $_POST['fanme']." ".$_POST['manme']." ".$_POST['lanme'],
			'RollId' =>  $rollid,
			'StudentEmail'=> $email,
			'password'=> md5(12345),
			'Gender'=> $gender,
			'ClassId' => $classid,
			'DOB' => $dob,
			'address' => $address,
			'state' => $state,
			'LGA' => $LGA,
			'town' => $town,
			'F_school_name' => $F_school_name,
			'F_school_address' => $F_school_address,
			'F_school_date' => $F_school_date,
			'sport_house' => $sport_house,
			'Status' => $status
			);
			$insertStudent = $iSMartFUN->insertTable("tblstudents",$InsertData);

if($insertStudent)
{
	
	if(!empty($_FILES)){
		
	$targetDir = $_SERVER['DOCUMENT_ROOT']."student_passport/";
	$fileName = $_FILES['file']['name'];
	$File_Ext           = substr($fileName, strrpos($fileName, '.')); //get file extention
	$NewFileName        = $randNo.$File_Ext; //new file name
	
	$targetFile = $targetDir.$NewFileName;
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		$db->query("UPDATE tblstudents set photo='$NewFileName' where StudentId='$insertStudent'");	
	}
		
	}
	
	
	
$msg="Student added successfully";

$addparent_url = SITE_URL."admin/add-parent.php?sid=$insertStudent";   
    header("Location: $addparent_url"); 
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin| Student Admission </title>
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
                                    <h2 class="title">Student Admission</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Admission</li>
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

<input type="text" placeholder="First Name" name="fanme" class="form-control" id="fullanme" required>
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Middle Name</label>

<input type="text" name="manme" placeholder="Middle Name" class="form-control" id="fullanme" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Last Name</label>

<input type="text" name="lanme" class="form-control" placeholder="Last Name" id="fullanme" required>
</div>
</div>

</div>


<div class="row">


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Reg. No.</label>

<input type="text" name="rollid" class="form-control" id="rollid" value="<?php echo $reg_no;?>" disabled required>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label for="gender" class="control-label">Gender</label>

<select name="gender" class="form-control" id="gender" required="required">
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div></div>


<div class="col-md-4">
 <div class="form-group">
                                                    <label for="date" class="control-label">Date Of Birth</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="date" name="dob" class="form-control" placeholder="Date Of Birth" required class="form-control" />
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
						    <img src="../images/small_photo.jpg" alt="." class="w-full" id="StudentPhoto">
						    <div class="post-file">
							<i class="fa fa-camera fa-2x"  style="margin:7px;"></i>
							<input name="file" id="image" multiple accept="image/*" type="file" onchange="readURL(this);" required>
							</div>
						   
						    
					
						
						
					</div>
				</div>
</div>

<div class="row">

 <div class="col-md-4 form-group">
              <label class="control-label">State of Origin</label>
              <input type="text" name="state" class="form-control" placeholder="State of Origin" required>
            </div>
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Local Govt.</label>
              <input type="text" name="LGA" class="form-control" placeholder="Local Govt." required>
            </div>
            
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Town.</label>
              <input type="text" name="town" class="form-control" placeholder="Town" required>
            </div>
            
            </div>


<div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="default" class="control-label">Class</label>
                                                        
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php 
$class_list = $iSMartFUN->getTRows("tblclasses");
if($class_list)
{
foreach($class_list as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>  </div>
 
 <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Sport House</label>
              <select name="sport_house" class="form-control"  id="Sport_House" required="required">
<option value="">Select</option>
<? foreach($Schoo_House_List as $Schoo_House){
echo "<option value='$Schoo_House'>$Schoo_House</option>";
}
?>
</select>
            </div>
                                                    
                                                    
   <div class="form-group">
<label for="address" class="control-label">Home Address</label>

<textarea rows="5" name="address" class="form-control" required></textarea>

</div>                                                 
 </fieldset>  
 
 <!--
 <fieldset>
   <legend>Former School Details</legend>
 <div class="row">  
   
    <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Fullname of School</label>
              <input type="text" name="F_school_name" class="form-control"  placeholder="Fullname of School" required>
            </div>
            
            <div class="col-md-4 form-group1 group-mail">
              <label class="control-label">Address</label>
              <input type="text" name="F_school_address" class="form-control"  placeholder="Location" required>
            </div>
            
            <div class="col-md-2 form-group1 group-mail">
              <label class="control-label ">Last Date</label>
              <div class='input-group date' id='datetimepicker2'>
                    <input type='date' id="date" name="F_school_date" class="form-control" required class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
   
   </div>
   
   </fieldset>   -->  
                                               
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
<?PHP } ?>
