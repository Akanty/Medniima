<?php
include ("engine/header.php");
include ("engine/tophead.php");
include("design/header.html");
include("design/nav.html");


$asid=intval($_GET['asid']);

$query  =  $db->query("SELECT tblassignment.*,tblclasses.ClassName,tblclasses.Section,tblclasses.id,tblsubjects.id as subid,tblsubjects.SubjectName from tblassignment join tblclasses on tblclasses.id=tblassignment.class_id join tblsubjects on tblsubjects.id = tblassignment.subject_id where tblassignment.id='$asid'");

if($query->num_rows > 0){
	$tblName = "tblsubmited_assignment";
	$assignment_check_condition['where'] = array('student_id' => $student_datail_list->StudentId);
	$assignment_check_condition['where'] = array('assignment_id' =>$asid);
	$assignment_check = $iSMartFUN->getTRows($tblName,$assignment_check_condition);

if(!empty($_FILES)){
	$targetDir = "../doc/";
	//$response = array();
	$fileName = $_FILES['file']['name'];
	$File_Ext           = substr($fileName, strrpos($fileName, '.')); //get file extention
    $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
	$NewFileName        = $Random_Number.$File_Ext; //new file name
	
	//$targetFile = $targetDir.$NewFileName;
	
$targetFile = $targetDir.$NewFileName;
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
	

if($assignment_check){
	unlink($targetDir.$assignment_check->file);
	$db->query("UPDATE $tblName set file='$NewFileName' where assignment_id='$asid' and student_id='$student_datail_list->StudentId' ");
}else{

		//insert data to databse
			$InsertData = array(
			'file' => $NewFileName,
			'assignment_id' => $asid,
			'student_id' => $student_datail_list->StudentId
			);
		$insert = $iSMartFUN->insertTable($tblName,$InsertData);
		if($insert){
		
		echo"Assignment Submitted Successfully";
		}else{
			echo "An Error Occure Please Try Again Later";
		}
}//end of check of assignment
		
	}else{
		
		echo "Error Occure Uploading Assignment Try Again Later";
	}
	
	
}








?>

<style type="text/css">
/*
 * The MIT License
 * Copyright (c) 2012 Matias Meno <m@tias.me>
 */
.dropzone,.dropzone * {
	box-sizing: border-box;
}

.dropzone {
	position: relative;
}

.dropzone .dz-preview {
	position: relative;
	display: inline-block;
	width: 120px;
	margin: 0.5em;
}

.dropzone .dz-preview .dz-progress {
	display: block;
	height: 15px;
	border: 1px solid #aaa;
}

.dropzone .dz-preview .dz-progress .dz-upload {
	display: block;
	height: 100%;
	width: 0;
	background: green;
}

.dropzone .dz-preview .dz-error-message {
	color: red;
	display: none;
}

.dropzone .dz-preview.dz-error .dz-error-message,.dropzone .dz-preview.dz-error .dz-error-mark
	{
	display: block;
}

.dropzone .dz-preview.dz-success .dz-success-mark {
	display: block;
}

.dropzone .dz-preview .dz-error-mark,.dropzone .dz-preview .dz-success-mark
	{
	position: absolute;
	display: none;
	left: 30px;
	top: 30px;
	width: 54px;
	height: 58px;
	left: 50%;
	margin-left: -27px;
}


/* Custom decoration code */ 
.decoration {
	border: 1px dashed #999;
	background: #fff;
	padding: 20px;
}
</style>

<!--banner-->	
		    <div class="banner">
		    	<h2>
			<a href="index.php">Home</a>
			<i class="fa fa-angle-right"></i>
				<span>Submit Assignment</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--page-->
     
 	 <div class="blank">
     
    
        
        
        
        
        
        
         <div class="row">
                    <div class="col-md-6 col-md-offset-3">
            <div class="panel login-box">
                            
                            <div class="panel-body p-20">
            
             <form action="submit-assignment.php?asid=<?php echo $asid;?>" class="dropzone decoration"
id="my-dropzone"> 
                                                </form>



    <br />
                                    <div class="form-group mt-20">
                                        <div class="">
                                      
                                            <? if(!$assignment_check){ ?>
                                            <button type="submit" id="submit-Now" class="btn btn-success btn-labeled pull-right">Submit Assignment<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <? }else{ ?>
												
												<button type="submit" id="submit-Now" class="btn btn-success btn-labeled pull-right">Resubmit Assignment<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
											<? }?>
                                            
                                            
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                       
                                

                               

                            </div>
                        </div>
            </div></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
 	 	
 	 	 <div class="clearfix"> </div>
 	 </div>
	<!--//page-->
		<!---->
<div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     
<!---->
<link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/swipebox.css">
	<script src="<?php echo SITE_URL;?>res/js/jquery.swipebox.min.js"></script> 
	    <script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
</script>
<!--scrolling js-->
	<script src="<?php echo SITE_URL;?>res/js/jquery.nicescroll.js"></script>
	<script src="<?php echo SITE_URL;?>res/js/scripts.js"></script>
	<!--//scrolling js-->
    
    <script src="<?php echo SITE_URL;?>js/dropzone_assignment.js"></script>


<script type="text/javascript">

Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,
  maxFilesize: 1000, // Size in MB
		  autoQueue: true,
		  addRemoveLinks: true,

  init: function() {
    var submitButton = document.querySelector("#submit-Now")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function() {
      // Show submit button here and/or inform user to click it.
    });

  }
};


</script>

</body>
</html>

<? }?>