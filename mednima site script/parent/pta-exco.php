<?php
include ("engine/header.php");
include ("engine/tophead.php");
$title = "P.T.A Excos";
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
    
    <!--banner-->	
		    <div class="banner">
		    	<h2>
			<a href="index.php">Home</a>
			<i class="fa fa-angle-right"></i>
				<span>Parent</span>
                <i class="fa fa-angle-right"></i>
                <span>P.T.A Excos</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--page--><br>
    <div class="blank">
    
        
        <div class="row">
        
        
        <div class="col-md-9 col-md-offset-1">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
			    
			       
                <table class="display table table-striped" id="exampl">
                
                <thead>
                                                        <tr>
                                                            <th>#</th>
                                                       		 <th>Passport</th>
                                                            <th>Fullname</th>
                                                            <th>Occupation</th>
                                                            <th>Phone</th>
                                                            <th>Post</th>
                                                            
                                                        </tr>
                                                    </thead>
                
               
                
                    <tbody>
                    
                    <? $ptaquery = $db->query("select tblparent.*, tblpta_excos.post from tblparent join tblpta_excos on tblpta_excos.parent_id = tblparent.id where tblparent.pta_exco ='1'");
					
					$cnt=1;
if($ptaquery->num_rows > 0)
{
while($result = $ptaquery->fetch_object())
{ 
$sql1 ="SELECT StudentId from tblstudents where parent_id='$result->id' ";
$query1 = $db ->query($sql1);
$results1=$query1->fetch_object();
$totalstudents=$query1->num_rows;

  ?>
                    
                    
                        <tr class="table-row">
                        <td><?php echo htmlentities($cnt);?></td>
                            <td class="table-img">
                               <img src="<?php if($result->p_photo !="")echo SITE_URL.'parent_passport/'.$result->p_photo; else echo SITE_URL.'images/am.png';?>" alt="" width="50" height="50">
                            </td>
                            <td class="table-text">
                            	<h6> <?php echo htmlentities($result->title." ".ucwords($result->fullname));?></h6>
                                
                            </td>
                            
                            <td><?php echo htmlentities(ucwords($result->occupation));?></td>
                            
                            <td class="march">
                               <?php echo htmlentities($result->phone);?> 
                            </td>
                          
                          <td>
                            	<span class="fam"><?php echo htmlentities(ucwords($result->post));?></span>
                            </td>
                          
                            
                        </tr>
 <?php $cnt=$cnt+1;}} ?> 
                    </tbody>
                </table>
               </div>
            </div>
</div>

</div></div>

</div>
        
        
        </div><!--/row-->
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
        
        
   <?php include("design/footer.html");?>


