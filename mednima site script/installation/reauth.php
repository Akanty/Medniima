<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Change Database Details</h3>
          </div>
          <div class="box-body">
          <p>
Your product might have been already installed.<br>
This will help to install the product in a different database.<br>
</p>

<form name=setf method=POST action="<?php echo $PHP_SELF;?>">
	
	<div class="form-group">
    <label for="rollid">HOST NAME</label>
    <input   class="form-control" name="hostname" placeholder="localhost"  class='textbox' type=text value='<?php echo "$hostname";?>' required="required">
    </div>
	
    
    <div class="form-group">
    <label for="rollid">DB NAME</label>
    <input class="form-control"  name="dbname" placeholder="root"  type=text class='textbox' value='<?php echo "$dbname";?>' required="required"></div>
    
    
	 <div class="form-group">
    <label for="rollid">USERNAME</label>
    <input class="form-control"  name="username" placeholder="ist_school"  type=text class='textbox' value='<?php echo "$username";?>' required="required"></div>
	
    
     <div class="form-group">
    <label for="rollid">PASSWORD</label>
   <input class="form-control" placeholder="*****"  name="pass"  type=text  class='textbox' value='<?php echo "$password";?>' ></div>
   
	<input name="type" type="hidden" value="updatedb">
	
    <div class="form-group mt-20">
                                        
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Install<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>



	
 </form>
</div></div>