<?php
namespace Translations;
class GenericMessage{
	public static function GetUsername(){
		return $_SESSION['FacebookUserID'] ? $_SESSION['FacebookUserID']['name'] ? "TR:General-User_NotLoggedIn";
	}
}