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




$check_card = $db->query("SELECT * FROM tblscracth_card WHERE pin='$card_pin' and sn='$card_sn' and available ='1'");
$check_card_Row = $check_card->num_rows;


$check_card_time_Used = $db->query("SELECT * FROM tblscracth_card WHERE pin='$card_pin' and sn='$card_sn' and used_time >='$scarcth_card_limit'");
$check_card_Used = $check_card_time_Used->num_rows;


if($check_card_Row != 1){
echo "Invalid Scratch Card Details";	
}elseif($check_card_Used == 1){
echo "Scratch Card Limit Exceeded";
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
  
  
  <div class="spn"><b><span style='font-size:24.0pt;
font-family:"Arial","sans-serif"'><?php echo SCHOOL_NAME;?></span></b>
<br><?php echo SCHOOL_DESC;?>
<br>
<?php echo SCHOOL_ADDRESS;?>
<br>
TEL: <?php echo CONTACT_PHONE_NUMBER;?>
</div>

<div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<div class="row">
                <div class="col-md-4">
                <strong>Student:</strong> <?php echo htmlentities($row->StudentName);?>
                
                </div>
                
                <div class="col-md-4">
                <strong>Reg No:</strong> <?php echo htmlentities($row->RollId);?>
                </div>
                
            <div class="col-md-4"><strong>Class:</strong> <?php echo htmlentities($row->ClassName);?>
                </div>
                
                </div>
                
                
                <hr>
                <div class="row">
                
                
                <div class="col-md-4"><strong>Term:</strong> <?php echo htmlentities($Term_name->term);?>
                </div>
                
                <div class="col-md-4"><strong>No In Class:</strong> 20</div>
              
              <div class="col-md-4"><strong>Position:</strong> 1</div>
                
                </div>
                
                
                
                </div></div></div>



<!--<table class=md border=0 cellspacing=0 cellpadding=0 width=100%
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
</table>-->
  

<?php 

    ?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered">
                                                
                                                <thead class="tismart">
                                                        <tr>
                                                            <th style="color:white">#</th>
                                                            <th style="color:white">SUBJECT</th>    
                                                            <th style="color:white">C/A TEST</th>
                                                            <th style="color:white">EXAM</th>
                                                            <th style="color:white">TOTAL SCORE</th>
                                                            <th style="color:white">GRADE</th>
                                                            <th style="color:white">REMARK</th>
                                                        </tr>
                                               </thead>
                                               
  


                                                	
                                                	<tbody>
<?php                                              
// Code for result

 $queryResult = $db->query("select t.StudentName,t.RollId,t.ClassId,t.test_marks,t.exam_marks,t.termid,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.test_marks,tr.exam_marks,tr.termid,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId='$rollid' and t.ClassId='$classid' and t.termId='$termid')");
$cnt=1;
if($queryResult->num_rows > 0)
{ 
//update scartch card useage
$db->query("update tblscracth_card set used_time=used_time+1 where sn='$card_sn' and pin='$card_pin'");

while($result  = $queryResult->fetch_object()){

    ?>

                                                		<tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                			<td><?php echo htmlentities($result->SubjectName);?></td>
                                                			<td><?php echo htmlentities($result->test_marks);?></td>
                                                            <td><?php echo htmlentities($result->exam_marks);?></td>
                                                            <td><?php echo ( $totalmarks=$result->test_marks + $result->exam_marks);?></td>
                                                            <td><?php echo $iSMartFUN->gradeArray($result->test_marks + $result->exam_marks);?></td>
                                                            <td><?php echo $iSMartFUN->gradeRemark($result->test_marks + $result->exam_marks);?></td>
                                                		</tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
<th scope="row" colspan="5" style="border:none;"></th>
                                                <th scope="row">Total Marks</th>
<td><b><?php echo htmlentities($totlcount); ?></b> out of <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
<th scope="row" colspan="5"></th>
                                                <th scope="row">Percntage</th>           
                                                            <td><b><?php echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
                                                             </tr>
<tr>
<!--<th scope="row" colspan="5"></th>
                                                <th scope="row">Print Result</th>           
                                                            <td>
                                                            <a href="#" onclick="PrintDiv();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                                           <b>
                                                            <a href="download-result.php">Download </a> </b></td>
                                                            -->
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
                                                
                                                 <!--<div class="row">
                <div class="col-md-6">
                BEHAVIOUR:___________________________
                </div>
                
                <div class="col-md-6">
                SKILLS:___________________________
                </div>
                
                
 </div>
                                  
                                   <div class="row">
                                    <div class="col-md-12">
                CLASS TEACHER REMARK:__________________________________________________________________________
                </div></div>          
                
                
                <div class="row">
                                    <div class="col-md-12">
                HEAD TEACHER COMMENTS:_________________________________________________________________________
                </div></div>   -->       
                                            
                            
                            
                                          <a href="#" onclick="PrintDiv();" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
                                           
                                            
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
        
        
        
        
        
        <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><link rel="stylesheet" href="css/bootstrap.min.css" media="screen" ><link rel="stylesheet" href="css/font-awesome.min.css" media="screen" ><link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" ><link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" ><link rel="stylesheet" href="css/prism/prism.css" media="screen" ><link rel="stylesheet" href="css/main.css" media="screen" ><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<div>
  <input type="button" value="print" onclick="PrintDiv();" />
</div>
        
        
        

        <!-- ========== COMMON JS FILES ========== -->
        <script src="<?php echo SITE_URL;?>result/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/pace/pace.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo SITE_URL;?>result/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?php echo SITE_URL;?>result/js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo SITE_URL;?>result/js/main.js"></script>
        <script>
            $(function($) {

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
