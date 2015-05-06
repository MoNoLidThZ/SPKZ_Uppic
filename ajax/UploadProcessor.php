<?php
session_start();
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = '../images';   //2
 if(!$_SESSION['FacebookUserID']){
	$is_anonymous = true;
}
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    $fileName = $_FILES['file']['name'];          //3             
    $fileErrorCode = $_FILES['file']['error'];
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $filehash = md5_file($tempFile);
	$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $targetFile =  $targetPath.$filehash.".".$fileExt;  //5
	if($fileErrorCode!==UPLOAD_ERR_OK){
		switch($fileErrorCode){
			case UPLOAD_ERR_INI_SIZE;
				exit("ERROR|410|File aleardy exists on server\n");
			break;
			case UPLOAD_ERR_FORM_SIZE;
			
			break;
			case UPLOAD_ERR_CANT_WRITE;
			
			break;
			case UPLOAD_ERR_PARTIAL;
			
			break;
			case UPLOAD_ERR_NO_FILE;
			
			break;
			case UPLOAD_ERR_NO_TMP_DIR;
			
			break;
			case UPLOAD_ERR_EXTENSION;
			
			break;
		}
	}
	if(file_exists($targetFile)){
		exit("ERROR|110|".$filehash.".".$fileExt);
	}
    $filestatus = move_uploaded_file($tempFile,$targetFile); //6
    if(!$filestatus){
		exit("ERROR|420|Couldn't Move Uploaded File\n");
	}else{
		exit("OK|100|".$filehash.".".$fileExt);
	}
}else{
	exit("ERROR|310|No file were sent to server\n");
}
?>  