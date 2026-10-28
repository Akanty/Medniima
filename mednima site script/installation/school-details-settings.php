<?php
include('../controller/header.php');
$tableName ="configuration";
$condition_list['where'] = array('group_id' => 1);
$condition_list['order_by'] = "sort_by ASC";
$get_settings_List = $iSMartFUN->getTRows($tableName,$condition_list); 		

if(!$get_settings_List){
echo "No Setting Found";	
}else{
		
if(isset($_POST['submit']))
{
$configuration_value= $_POST['configuration_value'];
$configuration_key = $_POST['configuration_key']; 


			for ($i = 0; $i < count($configuration_value); $i++) {
			
			$inValue = $db->real_escape_string(strip_tags($configuration_value[$i]));
			$UpdateSetting = $db->query("UPDATE $tableName SET configuration_value='$inValue' where configuration_key='$configuration_key[$i]'");
					}
			
if($UpdateSetting)
{
include "../installation/adminpass.php";

}else{
include "../school-details-settings.php";
}


}
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
   

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                   
                                
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>School Configuration Settings</h5>
                                                    
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
                                                  
                                                   <? 
													   foreach($get_settings_List as $get_Setting_List_details){
													   ?>
                                                   
                                                   
                                                   <div class="row"> 
                                                    <div class="col-xs-12 form-group has-success">
                                                        <label for="success" class="control-label"><?php echo $get_Setting_List_details->name;?></label>
<input type="text" name="configuration_value[]" value="<?php echo $get_Setting_List_details->configuration_value;?>" class="form-control" placeholder="<?php echo $get_Setting_List_details->desc;?>" required>
<span class="help-block"><?php echo $get_Setting_List_details->desc;?></span>

<input type="hidden" name="configuration_key[]" value="<?php echo htmlentities($get_Setting_List_details->configuration_key);?>">
</div>

                                                        
                                                       <div>
                                                       
                                                        
                                                    </div></div>
                                                    
                                                    <? }?>
                                                    
                                 
             
                                          
                                                    
  <div class="form-group has-success pull-right">
<button type="submit" name="submit" class="btn btn-success btn-labeled">Save & Continue<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
</div>
<input type="hidden" name="type" value="schooldetails" />


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                   
        



       <? }?>
