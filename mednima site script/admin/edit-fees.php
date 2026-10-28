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
$feecid=intval($_GET['feecid']);
$condition_fee['where'] = array('ClassName_id' => $feecid);
$get_fee_List = $iSMartFUN->getTRows("tblfees",$condition_fee); 		



// for Delete fee
if(isset($_GET['did']))
{
$did=intval($_GET['did']);
$status=0;
$sql="delete from tblfees where id='$did' ";
$query = $db->query($sql);
if($query){
$msg="Fees Deleted successfully";
}
}

		
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$amount=$_POST['amount']; 
$fee_id=$_POST['fee_id']; 
$ClassName_id=$_POST['ClassName_id'];

			
			for ($i = 0; $i < count($name); $i++) {
			$Data = array(
			'name' => $name[$i],
	        'amount' => $amount[$i],
			'ClassName_id' => $ClassName_id
			);
			
			if($fee_id[$i] =="" && $name[$i] !="" && $amount[$i] !=""){
			$insertFee = $iSMartFUN->insertTable("tblfees",$Data);	
			}else{
			$condition = array('id' => $fee_id[$i]);
			$UpdateFee = $iSMartFUN->UpdateTable("tblfees",$Data,$condition);
			}
			}
if($UpdateFee || $insertFee)
{
$msg=" Registration Fees Updated successfully";
}


}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Edit Registration Fees</title>
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
                                    <h2 class="title">Edit Registration Fee</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            							<li>Registration Fees</li>
            							<li class="active">Edit Registration Fee</li>
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
                                                    <h5>Edit <?php if($feecid ==1)echo"Nursery Section";elseif($feecid ==2)echo"Primary Section";else echo "Secondary Section";?> Registration Fees</h5>
                                                    <button class="add_field_button btn btn-success btn-labeled pull-right">Add More Fields</button>
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
                                                  
                                                   <? if($get_fee_List){
													   foreach($get_fee_List as $get_fee_List_details){
													   ?>
                                                   
                                                   
                                                   <div class="row"> 
                                                    <div class="col-xs-6 form-group has-success">
                                                        <label for="success" class="control-label">Fee Name</label>
<input type="text" name="name[]" value="<?php echo $get_fee_List_details->name;?>" class="form-control" placeholder="Enter Fee Item Name">
<input type="hidden" name="fee_id[]" value="<?php echo htmlentities($get_fee_List_details->id);?>">
</div>
<div class="col-xs-4 form-group has-success">
<label for="success" class="control-label">Amount</label>
<input type="text" name="amount[]" class="form-control" value="<?php echo $get_fee_List_details->amount;?>"  id="success">
                                                        </div>
                                                        
                                                        <div class="col-md-2 form-group has-success"><label for="success" class="control-label">Action</label><a href="edit-fees.php?feecid=<?php echo htmlentities($get_fee_List_details->ClassName_id);?>&did=<?php echo htmlentities($get_fee_List_details->id);?>"><i class="fa fa-times" title="Delect Fee"></i> Delete </a></div>
                                                        
                                                       <div>
                                                       
                                                        
                                                    </div></div>
                                                    
                                                    <? }}?>
                                                    
                                 <div class="row">                   
                                            <div class="input_fields_wrap"></div>        
                               <div class="col-md-12 form-group has-success">
                                                        <label for="success" class="control-label">Section</label>
                                                       
                                                    <select name="ClassName_id" class="form-control" id="classnamenumeric" required="required">

<? if($feecid == 1) echo'<option value="1" selected>Nursery</option><option value="2">Primary</option><option value="3">Secondary</option>';elseif($feecid == 2)echo'<option value="1">Nursery</option><option value="2" selected>Primary</option><option value="3">Secondary</option>';else echo '<option value="1">Nursery</option><option value="2">Primary</option><option value="3" selected>Secondary</option>';?>
</select>
                                                    
     </div>
     
     </div>
             
                                                                                                  
                                                    
  <div class="form-group has-success">
<button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><div class="col-md-6 form-group has-success"><label for="success" class="control-label">'+x+'. Fee Name</label><input type="text" name="name[]" class="form-control" placeholder="Enter Fee Item Name" required></div><div class="col-md-4 form-group has-success"><label for="success" class="control-label">'+x+'. Amount</label><input type="text" name="amount[]" class="form-control" required id="success"> </div><div class="col-md-2 form-group has-success"><label for="success" class="control-label">Action</label><a href="#" class="remove_field">Remove</a></div></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent('div').remove();
    })
});

</script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
