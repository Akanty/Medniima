<?php
include ("engine/header.php");
include ("engine/tophead.php");
$title = "View Result";

?>

<?php include("design/header.html");
include("design/nav.html");?>

   
   <div class="blank">
        
	
			 <div id="divToPrint">
             
  
 
                       
             
                              
                                <style>

.md{
margin:0in;
	margin-bottom:4pt;
	font-size:10.0pt;
	text-align:center;
	font-family:"Calibri","sans-serif";	
	
}

.tismart{
border-top: solid white 1.0pt;
border-left: none;
border-bottom: solid white 1.0pt;
border-right: none;
background: #5B9BD5;
color:#FFF	
}

.tismart td{
color:#FFF;	
}
.spn{
font-size:10.0pt; 
font-family:"Arial","sans-serif";
text-align:center;
font-style:italic;
	
}


</style>                         
<div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<?php




// code Student Data
$rollid = $db->real_escape_string(strip_tags($_POST['rollid']));


$query_student = $db->query("SELECT tblstudents.*,tblparent.fullname,tblparent.phone,tblparent.address as paddress,tblparent.state as pstate,tblclasses.* from tblstudents  join tblclasses on tblclasses.id=tblstudents.ClassId join tblparent on tblparent.id = tblstudents.parent_id where tblstudents.RollId ='$rollid'");
$student_datail_list = $query_student->fetch_object();


$classid = $student_datail_list->ClassId;
$termid = $db->real_escape_string(strip_tags($_POST['term']));
$sessionid = $db->real_escape_string(strip_tags($_POST['sessionid']));
$card_pin = $db->real_escape_string(strip_tags($_POST['card_pin']));
$card_sn = $db->real_escape_string(strip_tags($_POST['card_sn']));
$scarcth_card_limit = 5;



$conditions_check_card["where"] = array("pin" => $card_pin);
$conditions_check_card["where"] = array("sn" => $card_sn);
$conditions_check_card["where"] = array("available" => 1);
$conditions_check_card['return_type'] = 'single'; 
$check_card_Row = $iSMartFUN->getTRows("tblscracth_card",$conditions_check_card);

$conditions_check_card_["where"] = array("card_id" => $check_card_Row->id);
$conditions_check_card_['return_type'] = 'single'; 



if(!$check_card_Row){
echo "Invalid Scratch Card Details";	
}else{
	$check_card_Row_used = $iSMartFUN->getTRows("tblscracth_card_use",$conditions_check_card_);
	if($check_card_Row_used && ($check_card_Row_used->class_id !=$classid || $check_card_Row_used->term_id !=$termid || $check_card_Row_used->session_id !=$sessionid)){
	echo "Scratch Card Previously Used";
}elseif($check_card_Row_used && $check_card_Row_used->time_used >= 5){
	echo "Scratch Card Limit Exceeded";
	$db->query("update tblscracth_card set used_time='5', available='0' where id ='$check_card_Row->id'");
	
}elseif($check_card_Row_used && $check_card_Row_used->student_id !=$student_datail_list->StudentId){
	echo "Scratch Card Has Beign Used By Another Student";
}else{
	
	
	
$conditions["where"] = array("id" => $termid);
$conditions['return_type'] = 'single'; 
$Term_name = $iSMartFUN->getTRows("tblterm",$conditions);

$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$_SESSION['termid']=$termid;

$qery = $db->query("SELECT tblstudents.*,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId='$rollid' and tblstudents.ClassId='$classid' ");

$cnt=1;
if($qery->num_rows > 0)
{
	$row = $qery->fetch_object();
  ?>
  
   <div class="row">
        <div class="col-xs-2">
          <img src="<?php echo SITE_URL;?>images/<?php echo SCHOOL_LOGO;?>" height="100" width="100"/>
          </div>
          
           <div class="col-xs-8">
  <div class="spn"><b><span style='font-size:24.0pt;
font-family:"Arial","sans-serif"'><?php echo SCHOOL_NAME;?></span></b>
<br><?php echo SCHOOL_DESC;?>
<br>
<?php echo SCHOOL_ADDRESS;?>
<br>
TEL: <?php echo CONTACT_PHONE_NUMBER;?><br /><br />
</div>
</div>
</div>

<div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<div class="row">
                <div class="col-xs-5">
                <strong>Student:</strong> <?php echo htmlentities(ucwords($row->StudentName));?>
                
                </div>
                
                <div class="col-xs-4">
                <strong>Reg No:</strong> <?php echo htmlentities($row->RollId);?>
                </div>
                
            <div class="col-xs-3"><strong>Class:</strong> <?php echo htmlentities($row->ClassName);?>
                </div>
                
                </div>
                
                
                <hr>
                <div class="row">
                
                
                <div class="col-xs-5"><strong>Term:</strong> <?php echo htmlentities($Term_name->term);?>
                </div>
                
              <div class="col-xs-5"><strong>Section</strong> <? echo $sessionid."/".($sessionid+1);?></div>
                
                
                <div class="col-xs-2"><img src="<?php echo SITE_URL."student_passport/".$row->photo;?>" alt="." height="70" width="70"></div>
                
                </div>
                
                
                
                </div></div></div>



  

<?php 

    ?>
                                            </div>
                                           
<?php                                              
// Code for result

 $queryResult = $db->query("select t.StudentName,t.RollId,t.ClassId,t.test_marks,t.exam_marks,t.termid,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.test_marks,tr.exam_marks,tr.termid,tr.session_id,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId='$rollid' and t.ClassId='$classid' and t.termId='$termid' and t.session_id='$sessionid')");
$cnt=1;
if($queryResult->num_rows < 1)
{ ?>     
<div class="alert alert-warning left-icon-alert text-center" role="alert">
                                            <strong>Notice!</strong> Your <? echo $sessionid."/".($sessionid+1);?>  <?php echo htmlentities($Term_name->term);?> result is not yet available</div>
 
                                        
<? }else{ ?>


 <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered">
                                                
                                                <thead class="tismart">
                                                        <tr>
                                                            
                                                            <th style="color:white">SUBJECT</th>    
                                                            <th style="color:white">C/A TEST</th>
                                                            <th style="color:white">EXAM</th>
                                                            <th style="color:white">TOTAL SCORE</th>
                                                            <th style="color:white">GRADE</th>
                                                            <th style="color:white">REMARK</th>
                                                        </tr>
                                               </thead>
                                               
  


                                                	
                                                	<tbody>
	
	
	
<?
if($check_card_Row_used){
//update scartch card useage
$db->query("update tblscracth_card_use set time_used=time_used+1 where card_id ='$check_card_Row->id'");
}else{
	//insert useage
	$InsertCard = array(
			'card_id' => $check_card_Row->id,
			'student_id' =>  $student_datail_list->StudentId,
			'class_id' => $classid,
			'term_id'=> $termid,
			'session_id' => $sessionid,
			'time_used' => 1
			);
			$iSMartFUN->insertTable("tblscracth_card_use",$InsertCard);
	
}
while($result  = $queryResult->fetch_object()){

    ?>

                                                		<tr>
                                                
                                                			<td><?php echo htmlentities($result->SubjectName);?></td>
                                                			<td><?php echo htmlentities($result->test_marks);?></td>
                                                            <td><?php echo htmlentities($result->exam_marks);?></td>
                                                            <td><?php echo ( $totalmarks=$result->test_marks + $result->exam_marks);?></td>
                                                            <td><?php echo $iSMartFUN->gradeArray($result->test_marks + $result->exam_marks);?></td>
                                                            <td><?php echo $iSMartFUN->gradeRemark($result->test_marks + $result->exam_marks);?></td>
                                                		</tr>
<?php 
$cnt++;}
?>

 <?php } ?>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid Reg No $rollid");
 }}
?>
                                        </div>



                                                	</tbody>
                                                </table>
                                                
                                                
                            
                            <? if($queryResult->num_rows > 0)
{?><br />
                                          <a href="#" onclick="PrintDiv();" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print</a>
   <? }?>                                        
                                            
                                        </div>
                                        <!-- /.panel -->
                                        
                                        
                                       
                                        
                                       </div></div> 
                                        
                                        
                                    </div>
                                    <!-- /.col-md-6 -->
                                    

                                   

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.print -->
                       
                        

            
           
            
		


	

	
    
    
     <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=600,height=600');
       popupWin.document.open();
       popupWin.document.write('<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title><?php echo $student_datail_list->StudentName;?> | <? echo $sessionid."/".($sessionid+1);?>  <?php echo htmlentities($Term_name->term);?> Result</title><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"><link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/AdminLTE.min.css"></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        popupWin.document.close();
            }
 </script>




 
    
    
    
    

<?php 
}
include("design/footer.html");?>