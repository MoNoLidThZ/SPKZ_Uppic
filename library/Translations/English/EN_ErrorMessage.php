<?php
namespace Translations\English;
class ErrorMessage{
private static $TR = array();
private static $instance;
private static InitializeInstance(){
//1xx - Success
$TR_ERRORCODE['100'] = "Upload Successful.";  
//2xx - Warning

//3xx - Upload Error (Clientside)
$TR_ERRORCODE['310'] = "No file were sent to server.";
//4xx - Upload Error (Serverside)
$TR_ERRORCODE['410'] = "File aleardy exists on server (Duplicated upload?).";
$TR_ERRORCODE['420'] = "Couldn't Move Uploaded File.";
//5xx - PHP Error Code (Serverside)
$TR_ERRORCODE['510'] = "Uploaded file was too big.";
$TR_ERRORCODE['520'] = "Uploaded file was too big.";
$TR_ERRORCODE['530'] = "Uploaded file was only partially uploaded.";
$TR_ERRORCODE['540'] = "No file was uploaded, What the Fuck?";
$TR_ERRORCODE['560'] = "Server Missing a temporary folder. Please Report Server Owner for intentional ability abuse.";
$TR_ERRORCODE['570'] = "Failed to write file to disk. Please Report Server Owner for intentional feeding.";
$TR_ERRORCODE['580'] = "The bitch CockBlocked you from uploading.";
self::$TR = $TR_ERRORCODE;
}
public static function getInstance()
  {
	if ( is_null( self::$instance ) )
    {
		self::InitializeInstance();
		self::$instance = new self();
    }
	return self::$instance;
  }
public function getErrorMessageByID($id){
	return is_null( self::$instance ) ? false : self::$TR[$id];
}