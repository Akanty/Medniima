<?php 
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Student Change Password";
include("design/header.html");
include("design/nav.html");


if(isset($_POST['submit']))
    {
$password = md5($_POST['password']);
$newpassword = md5($_POST['newpassword']);
$username = $student_datail_list->RollId;
    $query = $db->query("SELECT * FROM tblstudents WHERE RollId='$username' and password='$password'");
if($query->num_rows == 1)
{
$con= $db->query("update tblstudents set password='$newpassword' where RollId='$username'");

$msg=" Your Password has beign changed succesfully";
}
else {
$error=" $student_datail_list->StudentName Your current password is wrong";    
}
}
?>
<title>Satff change password</title>
       
        <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
                <span>Student</span>
                <i class="fa fa-angle-right"></i>
				<span>Change Password</span>
				</h2>
		    </div>
		<!--//banner--><br>
    
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
           
            <div class="content-wrapper">
                <div class="content-container">
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Student Change Password</h5>
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

                                                <form  name="chngpwd" method="post" \ onSubmit="return valid();">
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Current Password</label>
                                                		<div class="">
                                    <input type="password" name="password" class="form-control" required id="success" autocomplete="off">
                                                      
                                                		</div>
                                                	</div>
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">New Password</label>
                                                        <div class="">
                                                            <input type="password" name="newpassword" required class="form-control" id="success" autocomplete="off">
                                                        </div>
                                                    </div>
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Confirm Password</label>
                                                        <div class="">
                                                            <input type="password" name="confirmpassword" class="form-control" required id="success" autocomplete="off">
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Change<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>


                                                    
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

        <?php include("design/footer.html");?>
