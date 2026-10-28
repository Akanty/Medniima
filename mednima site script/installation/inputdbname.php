

<?php
$file = "../controller/config.php"; 
if(!is_readable($file) or !is_writeable($file))
{
    echo " <span class=\"errortext\">Incorrect file permissions for config.php! <br>
		Must be in read,write mode during installaton</span>";
}
?>

 <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Enter Database Details</h3>
          </div>
          <div class="box-body"> <form name=setf method=POST action="<?php echo $PHP_SELF;?>">
	
	<div class="form-group">
    <label for="rollid">HOST NAME</label>
    <input   class="form-control" name="hostname" placeholder="localhost"  class='textbox' type=text value="localhost" required="required">
    </div>
	
    
     <div class="form-group">
    <label for="rollid">USERNAME</label>
    <input class="form-control"  name="username" placeholder="root"  type=text class='textbox' value="root" required="required"></div>
    
    
    <div class="form-group">
    <label for="rollid">DB NAME</label>
    <input class="form-control"  name="dbname" placeholder="ist_school"  type=text class='textbox' value="ist_school" required="required"></div>
    
    
	
	
    
     <div class="form-group">
    <label for="rollid">PASSWORD</label>
   <input class="form-control" placeholder="*****"  name="pass"  type=text  class='textbox' value=""></div>
   
	
    <input name="type" type="hidden" value="updatedb">
	
    <div class="form-group mt-20">
                                        
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Install<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
	
 </form>
</div>
</div>




