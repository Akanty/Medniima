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
if(isset($_POST['submit']))
{
$title=$_POST['title'];
$content =$_POST['content']; 

$InsertData = array(
			'title' => $title,
			'content' =>  $content,
			'date'=> date("Y-m-d H:i:s")
			);
			$insertNews = $iSMartFUN->insertTable("tblnews",$InsertData);

if($insertNews)
{
$msg="Post Created successfully";
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
        <title>Admin Upload To Gallery</title>
        <?php include('includes/css.html');?>
        
        
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
                                    <h2 class="title">Upload To Gallery</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">Gallery</a></li>
            							<li class="active">Upload To Gallery</li>
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
                                                    <h5>Upload To Gallery</h5>
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

                                                <form action="../engine/upload.php" class="dropzone decoration"
id="my-dropzone">
                                                    <!--<div class="form-group has-success">
                                                        <label for="success" class="control-label">Image Name</label>
                                                		<div class="">
                                                			<input type="text" name="name" class="form-control" required id="success">
                                                		</div>
                                                	</div>-->
                                                    
                                                    
                                                     
                                                    
                                                     
                                                </form>
                                                
                                                

<!--<form action="../engine/upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">

<input type="submit" name="submit" value="Submit">
</form>





<button id="submit-all">Submit all files</button>
<form action="../engine/upload.php" class="dropzone" id="my-dropzone"></form>-->

                                              <br>
                                              <div class="pull-right">
                                                           <button type="submit" id="submit-all" name="submit" class="btn btn-success btn-labeled">Upload Now<span class="btn-label btn-label-right"><i class="fa fa-upload"></i></span></button>
                                                    </div>
                                              
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

<script src="<?php echo SITE_URL;?>js/dropzone.js"></script>


<script type="text/javascript">
/*
Dropzone.options.myAwesomeDropzone = {
		  maxFilesize: 4000, // Size in MB
		  autoQueue: true,
		  addRemoveLinks: true,
		  removedfile: function(file) { 
			
		var name = file.name;        
    	$.ajax({
        type: 'POST',
        url: '../engine/upload.php',
        data: "Delete_Photo="+name,
        //dataType: 'html',
		dataType: 'json',
		success: function(data) {
                    //$("#msg").html(data);
					alert(data);

            }
    	});
		      var fileRef;
		      return (fileRef = file.previewElement) != null ? 
				      fileRef.parentNode.removeChild(file.previewElement) : void 0;
		    },

	success: function(file, response) {
		var myRespo = jQuery.parseJSON( response ) ;
		
		    	  //alert(response);
				  if( myRespo.success == 1){
					  alert( myRespo.image_name );
					  // similar behavior as an HTTP redirect
					//window.location.replace("<?php echo SITE_URL;?>upload?a=edit&s=" + myRespo.slug);
				  }
				  
				  
		    	},
				
	

	error: function(file, response) {
			    	  alert(response);
			    }
	    	
};
*/

Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,
  maxFilesize: 4000, // Size in MB
		  autoQueue: true,
		  addRemoveLinks: true,

  init: function() {
    var submitButton = document.querySelector("#submit-all")
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




        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
