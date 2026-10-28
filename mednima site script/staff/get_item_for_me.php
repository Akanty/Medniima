<?php
include('../controller/header.php');
if(!empty($_POST["classid"])) 
{
	$id= $_POST['classid'];
   $dta=explode("$",$id);
 
 $cid=intval($dta[0]);
 $tid=intval($dta[1]);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }elseif(!is_numeric($tid)){
 
 	echo htmlentities("invalid Term");exit;
 }
 else{
 $stmt = $db->query("SELECT StudentName,StudentId FROM tblstudents WHERE ClassId='$cid' order by StudentName");
 if($stmt->num_rows > 0){
 //$stmt->execute(array(':id' => $cid));
 ?><option value="">Select Student </option><?php
 while($row = $stmt->fetch_object())
 {
  ?>
  <option value="<?php echo htmlentities($row->StudentId); ?>"><?php echo htmlentities($row->StudentName); ?></option>
  <?php
 }
}
 }
}
// Code for Subjects
if(!empty($_POST["classid1"])) 
{
	
	$id= $_POST['classid1'];
   $dta=explode("$",$id);
 
 $cid1=intval($dta[0]);
 $tid=intval($dta[1]);
	
 if(!is_numeric($cid1)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{
 $status=0;	
 $stmt = $db->query("SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId='$cid1' and tblsubjectcombination.status!='$status' order by tblsubjects.SubjectName");
 //$stmt->execute(array(':cid' => $cid1,':stts' => $status));
 
 while($row = $stmt->fetch_object())
 {?>
  <p> <?php echo htmlentities($row->SubjectName); ?>
  
  <div class="row">
                <div class="col-xs-6">
                  <input type="text" maxlength="2" name="testmarks[]" value="" class="form-control" required="" placeholder="Enter Test Score out of 30" autocomplete="off">
                </div>
                <div class="col-xs-6">
                  <input type="text" maxlength="2"  name="exammarks[]" value="" class="form-control" required="" placeholder="Enter Exam Score out of 70" autocomplete="off">
                </div>
                
              </div>
  
  
 <!-- <input type="text"  name="marks[]" value="" class="form-control" required="" placeholder="Enter marks out of 70" autocomplete="off">-->
 </p>
  
<?php  }
}
}


?>


<?
// Code for Subjects
if(!empty($_POST["getclassSubject"])) 
{
	
	$id= $_POST['getclassSubject'];
   
 	
 if(!is_numeric($id)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{
 $status=0;	
 $stmt = $db->query("SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId='$id' order by tblsubjects.SubjectName");
 if($stmt->num_rows > 0){
	 ?>
	 <div class="form-group has-success">
<label for="default" class="control-label">Subject</label>
 
 <select name="subject_id" class="form-control" id="subject_id" required="required">
 <option value="">Select Subject</option>
 <? while($row = $stmt->fetch_object())
 {?>
 <option value="<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->SubjectName); ?></option>
  
<?php 
 }?>
  </select>
 </div> 
 
<? }
}}


?>





<?php

if(!empty($_POST["studclass"])) 
{
 $id= $_POST['studclass'];
 $dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
$tid=$dta[2];
 $query = $db->query("SELECT StudentId,ClassId FROM tblresult WHERE StudentId='$id1' and ClassId='$id' and termid='$tid' ");
$results = $query ->fetch_object();
$cnt=1;
if($query ->num_rows > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Result Already Declare .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
 ?></p>
<?php }else{
	echo "<script>$('#submit').prop('disabled',false);</script>";
}


  }?>


