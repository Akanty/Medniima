<?php
if($_GET['ismart']=='events'){
	$title = 'Events | '.SCHOOL_NAME;
	////echo "<title>$title</title>";
	$event_list = $iSMartFUN->getTRows("tblevent");
	include('../pages/events.html');
	
}elseif($_GET['ismart']=='gallery'){
	$title = 'Gallery | '.SCHOOL_NAME;
	$photo_List = $iSMartFUN->getTRows("tblgallery");
	include('../pages/gallery.html');

}
elseif($_GET['ismart']=='book-tutor'){
	$title = 'Book A Tutor | '.SCHOOL_NAME;
	//echo "<title>$title</title>";
	if(isset($_POST['submit']))
{
$email = $db->real_escape_string(strip_tags($_POST['email']));
$firstname = $db->real_escape_string(strip_tags($_POST['first_name']));	
$last_name = $db->real_escape_string(strip_tags($_POST['last_name']));	
$gender = $db->real_escape_string(strip_tags($_POST['gender']));	
$age = $db->real_escape_string(strip_tags($_POST['age']));	
$phone = $db->real_escape_string(strip_tags($_POST['phone']));
$subject = $db->real_escape_string(strip_tags($_POST['subject']));
$address = $db->real_escape_string(strip_tags($_POST['address']));	
	
	
	$InsertData = array(
			'name' =>  $firstname." ".$last_name,
			'email'=> $email,
			'subjects' => $subject,
			'phone' => $phone,
			'address' => $address,
			'age' => $age,
			'gender' => $gender,
			);
			$insertBooking = $iSMartFUN->insertTable("tblbook_tutor",$InsertData);
	
if($insertBooking)
{
$msg="Booking successfully Submited You Will Get A Reply Soon.";
}
else 
{
$error="Something went wrong. Please try again";
}
	
	
}
	include('../pages/book_tutor.html');

}


elseif($_GET['ismart']=='news'){
	$title = 'News | '.SCHOOL_NAME;
	//echo "<title>$title</title>";
	$news_list = $iSMartFUN->getTRows("tblnews");
	include('../pages/news.html');
}


elseif($_GET['ismart']=='pages'){
	$slug = $db->real_escape_string(strip_tags($_GET['slug']));
	$get_page_condition['where'] = array('slug' =>$slug);
	$get_page_condition['return_type'] = 'single'; 
	$page_datail_list = $iSMartFUN->getTRows("tblpages",$get_page_condition);
	if($page_datail_list){
	$title = $page_datail_list->page_name.' | '.SCHOOL_NAME;
	
	include('../pages/page_details.html');
	
	}
}
elseif($_GET['ismart']=='news-details'){
	$id = $db->real_escape_string(strip_tags($_GET['id']));
	$get_new_condition['where'] = array('id' =>$id);
	$get_new_condition['return_type'] = 'single'; 
	$news_details = $iSMartFUN->getTRows("tblnews",$get_new_condition);
	if($news_details){
	$title = "$news_details->title | ".SCHOOL_NAME;
	//echo "<title>$title</title>";
	include('../pages/news_details.html');
	}else{
		
	}
}
elseif($_GET['ismart']=='event-details'){
	$id = $db->real_escape_string(strip_tags($_GET['id']));
	$get_event_condition['where'] = array('id' =>$id);
	$get_event_condition['return_type'] = 'single'; 
	$event_details = $iSMartFUN->getTRows("tblevent",$get_event_condition);
	if($event_details){
	$title = "$news_details->title | ".SCHOOL_NAME;
	//echo "<title>$title</title>";
	include('../pages/event_details.html');
	}else{
		
	}
}
elseif($_GET['ismart']=='teachers'){
	$title = 'Teachers Area | '.SCHOOL_NAME;
	//echo "<title>$title</title>";
	include('../pages/teacher.html');
}
elseif($_GET['ismart']=='check-result'){
	$title = 'Check Result | '.SCHOOL_NAME;
	//echo "<title>$title</title>";
	include('../pages/result.html');
}

elseif($_GET['ismart']=='result-details'){
	$title = 'Result Checker| '.SCHOOL_NAME;
	//echo "<title>$title</title>";
	// code Student Data
	
	include('../pages/view_result.html');
}
?>
