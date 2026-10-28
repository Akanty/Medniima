<?php
include ("controller/header.php");
$condition['order_by'] = 'date DESC';
$news_List = $iSMartFUN->getTRows("tblnews",$condition);

$event_condition['order_by'] = 'date DESC limit 4';
$event_List = $iSMartFUN->getTRows("tblevent",$event_condition);

$slider_condition['order_by'] = 'date DESC';
$slider_List = $iSMartFUN->getTRows("home_slider",$event_condition);

include ("pages/index.html");


include ("pages/footer.html");

?>
