<?php
session_start();
error_reporting(0);
include('../controller/header.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo SCHOOL_NAME;?> Result Checker</title>
        <?php include('includes/css.html');?>
        
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
}

.tismart td{
color:#FFF;	
}


</style>

        
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center"><?php echo SCHOOL_NAME;?> Result Checker</h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<?php




// code Student Data
$rollid = $db->real_escape_string(strip_tags($_POST['rollid']));
$classid = $db->real_escape_string(strip_tags($_POST['class']));
$termid = $db->real_escape_string(strip_tags($_POST['term']));
$card_pin = $db->real_escape_string(strip_tags($_POST['card_pin']));
$card_sn = $db->real_escape_string(strip_tags($_POST['card_sn']));
$scarcth_card_limit = 5;




$check_card = $db->query("SELECT * FROM tblscracth_card WHERE pin='$card_pin' and sn='$card_sn' and used_time <='$scarcth_card_limit' and available ='1'");
$check_card_Row = $check_card->num_rows;


if($check_card_Row != 1){

//$errorMsg = "Invalid Scratch Card Details";
echo "Invalid Scratch Card Details";	
}else{

$conditions["where"] = array("id" => $termid);
$conditions['return_type'] = 'single'; 
$Term_name = $iSMartFUN->getTRows("tblterm",$conditions);

$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$_SESSION['termid']=$termid;

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
<img width=75% height=1 src="<?php echo SITE_URL;?>images/line.jpg">
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
<img width=75% height=1 src="<?php echo SITE_URL;?>images/line.jpg">
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
  

<?php 

    ?>
                                            </div>
                                            <div class="panel-body p-20">







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
$cnt++;}
?>
<tr>
                                                <th scope="row" colspan="2">Total Marks</th>
<td><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
                                                <th scope="row" colspan="2">Percntage</th>           
                                                            <td><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
                                                             </tr>
<tr>
                                                <th scope="row" colspan="2">Download Result</th>           
                                                            <td><b><a href="download-result.php">Download </a> </b></td>
                                                             </tr>

 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid Reg No");
 }}
?>
                                        </div>



                                                	</tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                                           
                                                            <div class="col-sm-6">
                                                               <a href="index.php">Back to Home</a>
                                                            </div>
                                                        </div>

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
