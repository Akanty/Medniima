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

//check if parent already exist
	$pid=intval($_GET['pid']);
	$parent_condtion['where'] = array('id' => $pid);
	$parent_condtion['return_type'] = 'single'; 
	$parent_query = $iSMartFUN->getTRows("tblparent",$parent_condtion);
	$children_in = explode(",",$parent_query->children_id);
	
	$parent_name = explode(" ",$parent_query->fullname);

if($parent_query){


if(isset($_POST['submit']))
{
$parentname=$_POST['fanme']." ".$_POST['lanme'];
$email = $_POST['email'];
$title =$_POST['title'];
$username = $parent_no; 
$gender=$_POST['gender'];  
$address=$_POST['address'];
$occupation=$_POST['occupation'];
$phone = $_POST['phone'];
$state=$_POST['state'];
$LGA=$_POST['LGA'];
$town=$_POST['town'];
$school_ref=$_POST['school_ref'];
$pta_exco=$_POST['pta_exco'];
$children_id = $_POST['children_id'];
$student_id = implode(",", $_POST['children_id']);
$pta_exco_post = $_POST['pta_exco_post'];
$status=$_POST['status'];

$update_condition = array('id' =>$pid);
$UpdateData = array(
			'title' => $title,
			'fullname' => $parentname,
			'email'=> $email,
			'phone'=> $phone,
			'children_id' => $student_id,
			'occupation'=> $occupation,
			'gender'=> $gender,
			'address' => $address,
			'state' => $state,
			'LGA' => $LGA,
			'town' => $town,
			'school_ref' => $school_ref,
			'pta_exco' => $pta_exco,
			'status' => $status
			);
			
			$UpdateParent = $iSMartFUN->UpdateTable("tblparent",$UpdateData,$update_condition);
			

if($UpdateParent)
{
	
$pta_list_condtion['where'] = array('parent_id' => $pid);
$pta_list_condtion['return_type'] = 'single'; 
$pta_post_detail = $iSMartFUN->getTRows("tblpta_excos",$pta_list_condtion);	
	
	//inserting post of parent in pta
if($pta_exco == 0 && $pta_post_detail)
{
	$db->query("delete from tblpta_excos where parent_id='$pid'");
	
}elseif(!$pta_post_detail && $pta_exco == 1){
	$InsertPTAData = array(
			'parent_id' => $pid,
			'post' => $pta_exco_post,
			);
	$iSMartFUN->insertTable("tblpta_excos",$InsertPTAData);
		
}elseif($pta_post_detail && $pta_exco == 1){
	$db->query("UPDATE tblpta_excos set post='$pta_exco_post' where parent_id='$pid'");
	
}
	
	
	
$msg=" Parent Info Updated successfully";
}
else 
{
$error=" Something went wrong. Please try again ";
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin| Edit Parent Info </title>
        <?php include('includes/css.html');?>
    
        
      

    </head>
    <body class="top-navbar-fixed" onLoad="">
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
                                    <h2 class="title">Edit Parent Info</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li>Parent</li>
                                        <li class="active">Edit Parent Info</li>
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
                                                    <h5>Parent info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo $error; ?>
                                        </div>
                                        <?php } ?>
   
                                                <form action="" method="post" enctype="multipart/form-data">
<fieldset>
   <legend>Parent Info</legend>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Title</label>

<select name="title" class="form-control" id="title" required="required">

<? 
$Parent_title = array("Mr","Mrs","Alh","Hajia","Mal","Cheif","Doc",);
foreach($Parent_title as $Parent_t){
if($parent_query->title == $Parent_t){
?>
<option value="<? echo $Parent_t;?>" selected><? echo $Parent_t;?></option>
<? }else{?>
<option value="<? echo $Parent_t;?>"><? echo $Parent_t;?></option>
<? }}?>

</select>
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">First Name</label>

<input type="text" name="fanme" placeholder="First Name" value="<? echo htmlentities(ucwords($parent_name[0]));?>" class="form-control" id="fullanme" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Last Name</label>

<input type="text" name="lanme" class="form-control" value="<? echo htmlentities(ucwords($parent_name[1]));?>" placeholder="Last Name" id="fullanme" required>
</div>
</div>

</div>


<div class="row">


<div class="col-md-4">
<div class="form-group">
<label for="default" class="control-label">Parent No.</label>

<input type="text" name="username" class="form-control" id="username" value="<? echo htmlentities($parent_query->username);?>" disabled required>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label for="gender" class="control-label">Gender</label>

<select name="gender" class="form-control" id="gender" required="required">
<?php  
$gndr=$parent_query->Gender;
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
                                                    <label for="Occupation"  class="control-label">Occupation</label>
                <input type="text" value="<? echo htmlentities($parent_query->occupation);?>" name="occupation" class="form-control" placeholder="Occupation" id="Occupation" required>
            </div>
</div>


</div>



<div class="row">

 <div class="col-md-4 form-group">
              <label class="control-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" value="<? echo htmlentities($parent_query->phone);?>" placeholder="Phone Number" required>
            </div>
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Email</label>
              <input type="text" name="email" class="form-control" value="<? echo htmlentities($parent_query->email);?>" placeholder="Parent Email Address" required>
            </div>
   
   
   
            
            <div class="col-md-4 form-group form-last">
              <label for="pta_exco" class="control-label">Part Of PTA Exco?</label>
              <select name="pta_exco" class="form-control pta_exco" id="pta_exco" onChange="getPTAPost(this.value);" required="required">
<?php  
$pta_exco=$parent_query->pta_exco;
if($pta_exco=="1")
{
$pta_list_condtion['where'] = array('parent_id' => $pid);
$pta_list_condtion['return_type'] = 'single'; 
$pta_post_detail = $iSMartFUN->getTRows("tblpta_excos",$pta_list_condtion);
?>
<option value="1" selected>Yes</option>
<option value="0">No</option>
<? }else{ ?>
<option value="0" selected>No</option>
<option value="1">Yes</option>
<? }?>
</select>
            </div>
            
            
            <div  id="reslt"></div>
            
            </div>





<div class="row">

 <div class="col-md-4 form-group">
              <label class="control-label">State of Origin</label>
              <input type="text" name="state" class="form-control" value="<? echo htmlentities($parent_query->state);?>" placeholder="State of Origin" required>
            </div>
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Local Govt.</label>
              <input type="text" name="LGA" class="form-control"  value="<? echo htmlentities($parent_query->LGA);?>"placeholder="Local Govt." required>
            </div>
            
            <div class="col-md-4 form-group form-last">
              <label class="control-label">Town</label>
              <input type="text" name="town" class="form-control" value="<? echo htmlentities($parent_query->town);?>" placeholder="Town" required>
            </div>
            
            </div>


<div class="row">
                                                   
                                                    
   <div class="form-group">
<label for="address" class="control-label">Home Address</label>

<textarea rows="5" name="address" class="form-control" required><? echo htmlentities($parent_query->address);?></textarea>

</div>                                                 
 </fieldset>  
 
 
 <fieldset>
   <legend>School References</legend>
 <div class="row">  
   
    <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">School Branch</label>
              <select name="school_ref" class="form-control"  id="school_ref" required="required">
<option value="">Select</option>

<?php  
$school_ref=$parent_query->school_ref;
if($school_ref=="1")
{
?>
<option value="1" selected>M.I.S Badawa Layout Branch</option>
<option value="2">M.I.S Kawo Lambu Branch</option>
<? }else{ ?>
<option value="2" selected>M.I.S Kawo Lambu Branch</option>
<option value="1">M.I.S Badawa Layout Branch</option>
<? }?>
</select>
            </div>
            
            <div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Children In School</label>
             <select class="form-control select2" multiple="multiple" name="children_id[]" data-placeholder="Select Children" style="width: 100%;">
                  <?php 
$student_list = $iSMartFUN->getTRows("tblstudents");
if($student_list)
{
	
foreach($student_list as $result)
{ 
$class_list_condtion['where'] = array('id' => $result->ClassId);
$class_list_condtion['return_type'] = 'single'; 
$class_detail = $iSMartFUN->getTRows("tblclasses",$class_list_condtion);
if(in_array($result->StudentId, $children_in)) {
  ?>

<option value="<?php echo htmlentities($result->StudentId); ?>" selected><?php echo htmlentities($result->StudentName); ?> - &nbsp;<?php echo htmlentities($class_detail->ClassName); ?> </option>

<? }else{?>


<option value="<?php echo htmlentities($result->StudentId); ?>"><?php echo htmlentities($result->StudentName); ?> - &nbsp;<?php echo htmlentities($class_detail->ClassName); ?></option>
<?php }}} ?>
                </select>
            </div>
            
            
   
   </div>
   
   </fieldset>     
                                               
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update Parent Info</button>
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
                    $('#StudentPhoto')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
     <script>
function getPTAPost(val) {
	var pta_exco=$(".pta_exco").val();
	var input ='<div class="col-md-4 form-group"><label for="pta_exco_post" class="control-label">Post Held in PTA </label><input type="text" name="pta_exco_post" class="form-control" value="<?php echo $pta_post_detail->post;?>" placeholder="Enter Parent Post In PTA meeting" required></div>';
	if(pta_exco == 1){
        $("#reslt").html(input);
	}else{
		$("#reslt").html("");
	}
    
}
</script>     
    
    <script>
function PTAPost() {
	var pta_exco = <?php echo $parent_query->pta_exco;?>;
	var input ='<div class="col-md-4 form-group"><label for="pta_exco_post" class="control-label">Post Held in PTA </label><input type="text" name="pta_exco_post" class="form-control" value="<?php echo $pta_post_detail->post;?>" placeholder="Enter Parent Post In PTA meeting" required></div>';
	if(pta_exco == 1){
        $("#reslt").html(input);
	}else{
		$("#reslt").html("");
	}
    
}
PTAPost();
</script>  
        
        
    </body>
</html>
<?PHP }else{
echo "parent not found";	
	
}} ?>
