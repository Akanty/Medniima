<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
session_start();
ob_start();
require_once('../controller/header.php');
error_reporting(0);
?>

<html>

<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        
<style>
body {
  padding: 4px;
  text-align: left;
}

table {
  width: 100%;
  margin: 10px auto;
  table-layout: auto;
}

.fixed {
  table-layout: fixed;
}

table,
td,
th {
  border-collapse: collapse;
}

th,
td {
  padding: 1px;
  border: solid 1px;
  text-align: center;
}
</style>

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
padding: 0in 0in 0in 0in; color:#FFF
line-height: 250%;	
}

.tismart td{
color:#FFF;	
}


</style>


<?php 
$rollid=$_SESSION['rollid'];
$classid=$_SESSION['classid'];
$termid=$_SESSION['termid'];

$conditions["where"] = array("id" => $termid);
$conditions['return_type'] = 'single'; 
$Term_name = $iSMartFUN->getTRows("tblterm",$conditions);

$qery = $db->query("SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId='$rollid' and tblstudents.ClassId='$classid' ");

$cnt=1;
if($qery->num_rows > 0)
{
	$row = $qery->fetch_object();
  ?>
 <p class=md><b><span style='font-size:18.0pt;
font-family:"Arial","sans-serif"'><?php echo SCHOOL_NAME;?></span></b></p>

<p class=md style='line-height:3.15pt'><span style='font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=md><span style='font-size:12.0pt;
font-family:"Arial","sans-serif"'>No.6 Umar Babura lik Badawa Layout, Kano.</span></p>

<p class=md style='line-height:3.2pt'><span style='font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=md><span style='font-size:12.0pt;
font-family:"Arial","sans-serif"'>Tell: 08162181613</span></p>


<p class=md style='line-height:12.2pt'>
<span>
<hr width="70%">
</span></p>


<table class=md border=0 cellspacing=0 cellpadding=0 width=100%
 style='border-collapse:collapse'>
 <tr>
  
  <td valign=bottom>
  <span style='font-size:12.0pt;
  font-family:"Arial","sans-serif"'><strong>Student:</strong> <?php echo htmlentities($row->StudentName);?></span>
  </td>
  <td valign=bottom>
  <span style='font-size:12.0pt;
  font-family:"Arial","sans-serif"'>Reg No: <?php echo htmlentities($row->RollId);?></span>
  </td>
  </tr></table>
  
  <p class=md style='line-height:12.2pt'>
<span>
<hr width="70%">
</span></p>

<table class=md border=0 cellspacing=0 cellpadding=0 width=100%
 style='border-collapse:collapse'>
<tr>
  <td valign=bottom>
  <p class=MsoNormal><b><span style='font-size:12.0pt;font-family:"Arial","sans-serif"'>Class:
  </span></b><span style='font-size:12.0pt;font-family:"Arial","sans-serif"'><?php echo htmlentities($row->ClassName);?> (<?php echo htmlentities($row->Section);?>)</span></p>
  </td>
  
  <td valign=bottom>
  <p class=md><b><span style='font-size:12.0pt;
  font-family:"Arial","sans-serif"'>Term: </span></b><span style='font-size:
  12.0pt;font-family:"Arial","sans-serif"'><?php echo htmlentities($Term_name->term);?></span></p>
  </td>
  
</tr>
</table>

<?php }

    ?>
 <table class="table table-hover table-bordered">
                                                
                                                <thead class="tismart">
                                                        <tr>
                                                            <th style="color:white">#</th>
                                                            <th style="color:white">Subject</th>    
                                                            <th style="color:white">Marks</th>
                                                            <th style="color:white">Grade</th>
                                                        </tr>
                                               </thead>
  


                                                	
                                                	<tbody>
<?php                                              
// Code for result

$queryResult = $db->query("select t.StudentName,t.RollId,t.ClassId,t.marks,t.termid,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,tr.termid,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId='$rollid' and t.ClassId='$classid' and t.termId='$termid')");
$cnt=1;
if($queryResult->num_rows > 0)
{ 
//$Studentresultss = $queryResult->fetch_object();
while($result  = $queryResult->fetch_object()){

    ?>

                                                		<tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                			<td><?php echo htmlentities($result->SubjectName);?></td>
                                                			<td><?php echo htmlentities($totalmarks = $result->marks);?></td>
                                                            <td><?php echo $iSMartFUN->gradeArray($result->marks);?></td>
                                                		</tr>
                                                        
<?php 
$totlcount+=$totalmarks;
$cnt++;}}
?>
<!--
<tr>
                                                        <td colspan="4"></td>
                                                        </tr>

<tr>
                                                <th scope="row" colspan="2">Total Marks</th>
<td colspan="2"><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
                                                        
                                                        
<tr>
                                                <th scope="row" colspan="2">Percntage</th>           
                                                            <td colspan="2"><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
                                                             </tr>-->
                            </tbody>
                        </table>
                        
                        <div class="row">
      
                        <div class="col-md-6">
                        Principal Signnature
                        </div>
                        
                        <div class="col-md-6">
                        Director Signature
                        </div>
                        
                        
                    </div>
</html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'portrait');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("$rollid result.pdf");
?>