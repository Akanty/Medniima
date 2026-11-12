<?php
include ("controller/header.php");
$condition['order_by'] = 'date DESC';
$condition['limit'] = 3;
$news_List = $iSMartFUN->getTRows("tblnews",$condition);

$event_condition['order_by'] = 'date DESC';
$event_condition['limit'] = 3;
$event_List = $iSMartFUN->getTRows("tblevent",$event_condition);

$slider_condition['order_by'] = 'date DESC';
$slider_condition['limit'] = 5;
$slider_List = $iSMartFUN->getTRows("home_slider",$slider_condition);

include ("pages/index.html");


include ("pages/footer.html");

?>
