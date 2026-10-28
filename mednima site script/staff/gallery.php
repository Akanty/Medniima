<?php
include '../controller/header.php';
include 'engine/tophead.php';
$title = "Add Results";
$photo_List = $iSMartFUN->getTRows("tblgallery");
include ("design/gallery.html");
?>
