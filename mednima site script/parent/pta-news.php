<?php
include ("engine/header.php");
include ("engine/tophead.php");
$title = "P.T.A News";
include("design/header.html");
include("design/nav.html");

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
   <div class="content-main"> 
    <!--banner-->	
		    <div class="banner">
		    	<h2>
			<a href="index.php">Home</a>
			<i class="fa fa-angle-right"></i>
				<span>P.T.A</span>
                <i class="fa fa-angle-right"></i>
                <span>News Updates</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--page-->
    
    
    
    <div class="asked">
<?	
$pTAnews_list = $iSMartFUN->getTRows("tblptanews");

$cnt=1;
if($pTAnews_list)
{
foreach($pTAnews_list as $result)
{   ?>
			<div class="questions">
				<a href="pta-news-details.php?nid=<?php echo htmlentities($result->id);?>"><h5><?php echo htmlentities($cnt);?>. <?php echo htmlentities($result->title);?></h5></a>
	        	<p><?php echo htmlentities($result->content);?></p>
	        </div>
	<?php $cnt=$cnt+1;}} ?>				    

</div>
    
    
    
 </div>       
        
        
   <?php include("design/footer.html");?>


