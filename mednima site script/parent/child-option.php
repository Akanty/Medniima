<?php
include ("engine/header.php");
include ("engine/tophead.php");
include("design/header.html");
include("design/nav.html");


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
            
             <form action="profile-details.php" method="GET"> 
                                                



    <br />
                                    <div class="form-group mt-20">
                                        <div class="">
                                      
                                            
												
												<button type="submit" id="submit-Now" class="btn btn-success btn-labeled pull-right">Generate SIF<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
											
                                            </form>
                                            
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
            <p>&copy; 2027 Medni'ima International School. All Rights Reserved | Design by Zainab Aliyu Adamu</p>	    </div>
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

