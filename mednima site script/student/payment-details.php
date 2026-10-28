<?php


/*
.............................................................................
. This is a project for school and others 								.
. intereted in having a persoal website or blog								.											.   																		.	
.					-------------Author----------							.
.					|  Yekeen Ibrahim Olamilekan  |							.
.					-------------------------------							.							.																			.
.							iSmart Team										.
...........................................................................	.
*/
//namespace Dompdf;
//require_once '../admin/dompdf/autoload.inc.php';
include '../controller/header.php';
include ("engine/tophead.php");
$title = "My Profile";


include ("design/payment.html");

/*$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'portrait');
$dompdf->load_html($html);
$dompdf->render();
//dompdf->stream("",array("Attachment" => false));
$dompdf->stream("$student_datail_list->StudentName Profile.pdf");
*/
?>