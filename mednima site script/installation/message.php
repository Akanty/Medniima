<? $link = mysql_connect(SERVER, DB_USER, DB_PASS);
//$sql = $link->query("DROP DATABASE ".DB_NAME."");
//$sqll = $link->query("CREATE DATABASE ".DB_NAME."");
if($link){
?>
 <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">iSt Installation Manager</h3>
          </div>
          <div class="box-body">
<p>
Your Database Parameters are updated.<br>
To procede to the next step on installation, click Next.</p>
<form name=setf method=POST action='<?php echo $PHP_SELF;?>' >
<input name="type" type=hidden value="createtables">
 <div class="form-group mt-20">
                                        
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Next<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
</form>
</div>
</div>
<? }else{ echo "cant Create $dbname"; };?>