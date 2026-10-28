<?php
//session_start();
include '../controller/header.php';
$targetDir = "../gallery_image/";

if(!empty($_FILES)){
	
	//$response = array();
	$fileName = $_FILES['file']['name'];
	$short_slug = strtotime('now')."".substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5);
	
	$File_Ext           = substr($fileName, strrpos($fileName, '.')); //get file extention
    $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
	$NewFileName        = $Random_Number.$File_Ext; //new file name
	
	//$targetFile = $targetDir.$NewFileName;
	
$targetFile = $targetDir.$NewFileName;
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
	

		//insert data to databse
			$tblName = "tblgallery";
			$InsertData = array(
			'photo_name' => $fileName,
			'link' => $targetFile,
			'slug' => $short_slug
			);
		$insert = $iSMartFUN->insertTable($tblName,$InsertData);
		if($insert){
		//$response["success"] = 1;
		//$response["image_name"] = $fileName;
		//$response["file_id"] = $insert;
		echo"uploaded";
		}else{
			echo "cant insert data to database";
		}
		
		
	}else{
		//$response["success"] = 0;
		//$response["error_msg"] = "could not move file";
		echo "cant upload image";
	}
	// echoing json result
    //echo json_encode($response , JSON_PRETTY_PRINT);
	
}


if(isset($_POST['Delete_Photo'])){
	/*
	$condition = array(
		'channel_id' => $_POST['channel_id']
		);
		 
	$delete = $iSMartFun->DeleteTable($tblName,$condition);
    echo $delete?'deleted':'error';*/
	
	
//delete/unlink file 
unlink($targetDir.$_POST['Delete_photo']);
echo $_POST['Delete_Photo'].' deleted'; // send msg back to user
}

?>