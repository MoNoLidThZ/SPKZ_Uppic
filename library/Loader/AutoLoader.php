<?php
namespace UpPic\Loader;
class AutoLoader{
	public static function AutoLoad($folder){
		if(!is_dir($folder)){
			throw new Exception($folder.' Isn\'t a valid DIR');
		}
		$i = 0;
		foreach (glob("{$folder}/*.php") as $filename)
		{
			require $filename;
			$i++;
		}
		return $i;
	}
	public static function AutoLoad_O($folder){
		if(!is_dir($folder)){
			throw new Exception($folder.' Isn\'t a valid DIR');
		}
		$i = 0;
		foreach (glob("{$folder}/*.php") as $filename)
		{
			require_once $filename;
			$i++;
		}
		return $i;
	}
}