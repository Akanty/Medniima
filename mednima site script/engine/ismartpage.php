<?php
include ("../controller/header.php");
include ("../pages/header.html");
if(isset($_POST['submit_question']))
{
$email = $db->real_escape_string(strip_tags($_POST['email']));
$phone = $db->real_escape_string(strip_tags($_POST['phone']));	
$name = $db->real_escape_string(strip_tags($_POST['name']));	
$question = $db->real_escape_string(strip_tags($_POST['question']));	

$InsertData = array(
			'name' =>  $name,
			'email'=> $email,
			'phone' => $phone,
			'question' => $question
			);
			$insertQuestion = $iSMartFUN->insertTable("tblquestion",$InsertData);
	
if($insertQuestion)
{
echo'<script type="text/javascript">alert("Request information Submited Successfully Thank You.");</script>';
}
else 
{
echo'<script type="text/javascript">alert("An Error Occure Please Try Again Later");</script>';

}

}


include ("../controller/olami.php");
?><title><?php if(isset($title)){echo $title." : : ".SCHOOL_NAME;}else{echo SCHOOL_NAME." ". SCHOOL_DESC; }?></title>
<?
include ("../pages/footer.html");

?>