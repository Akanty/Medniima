<?php include ("controller/header.php");?>
<!DOCTYPE HTML>
<html>
<head>
<title>Error Page <?php echo SCHOOL_NAME." ". SCHOOL_DESC; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo SITE_URL;?>res/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo SITE_URL;?>res/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo SITE_URL;?>res/css/font-awesome.css" rel="stylesheet"> 
<script src="<?php echo SITE_URL;?>res/js/jquery.min.js"> </script>
<script src="<?php echo SITE_URL;?>res/js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="four">
		<img src="<?php echo SITE_URL;?>/images/404.png" alt="" />
		<p>Opps! Page You Requested for was not not found.</p>
		<a href="<?php echo SITE_URL;?>" class="hvr-shutter-in-horizontal">Go To Home</a>
	</div>
		<!---->
<div class="copy-right">
           <p> &copy;  <?php echo date('Y')." ". SCHOOL_NAME;?>. All Rights Reserved | Design by <a href="http://fb.com/ismartola/" target="_blank">iSmart Tech</a> </p>	  </div>
		
     
<!---->
<!--scrolling js-->
	<script src="<?php echo SITE_URL;?>res/js/jquery.nicescroll.js"></script>
	<script src="<?php echo SITE_URL;?>res/js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

