<?php
include ("engine/header.php");
include ("engine/tophead.php");
$title = "P.T.A News deails";
include("design/header.html");
include("design/nav.html");
$nid=intval($_GET['nid']);
$get_new_condition['where'] = array('id' =>$nid);
$get_new_condition['return_type'] = 'single'; 
$result = $iSMartFUN->getTRows("tblptanews",$get_new_condition);
$cnt=1;
if($result)
{
?>

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
			<a href="index.php">Home</a>
			<i class="fa fa-angle-right"></i>
				<span>P.T.A</span>
                <i class="fa fa-angle-right"></i>
                <span>Meeting Summary</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--page--><br>
    <div class="blank">
    
        
       <div class="asked">
        
       
       <div class="questions">
				<h5 class="text-center"><?php echo htmlentities(ucwords($result->title));?></h5>
	        	<div class="text-center"><?php echo htmlentities(date('D F Y',strtotime($result->date)));?></div>
                
                <p><?php echo htmlentities($result->content);?></p>
	        </div>
       
        
        </div><!--/question-->
        <!-- end of page-->
        </div>
        
        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?php echo SITE_URL;?>admin/js/prism/prism.js"></script>
        <script src="<?php echo SITE_URL;?>admin/js/DataTables/datatables.min.js"></script>
        
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
        
        
   <?php include("design/footer.html");}else{
	   
	$login_url=''.SITE_URL.'error';   
    header("Location: $login_url");  
   }?>


