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


 <table class="table table-hover table-bordered">
                                                
                                                <thead class="tismart">
                                                        <tr>
                                                            <th style="color:white">#</th>
                                                            <th style="color:white">Serial Number</th>    
                                                            <th style="color:white">Pin</th>
                                                            <th style="color:white">Date</th>
                                                        </tr>
                                               </thead>
  


                                                	
                                                	<tbody>
<?php                                              
// Code for result
if($_GET['id'] && $_GET[''] !=""){
$conditions["where"] = array("id" => $_GET['id']);
$conditions['return_type'] = 'single'; 	
}
$card_list = $iSMartFUN->getTRows("tblscracth_card",$conditions);
$cnt=1;
if($card_list)
{ 
//$Studentresultss = $queryResult->fetch_object();
foreach($card_list as $result){

    ?>

                                                		<tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                			<td><?php echo htmlentities($result->sn);?></td>
                                                			<td><?php echo htmlentities($result->pin);?></td>
                                                            <td><?php echo htmlentities($result->created);?></td>
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
                        
</html>

<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'portrait');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("Screatch Card.pdf");
?>