<?php
namespace UpPic\Database;
class MySQLQueryBuilder{
	public static function BuildInsert($mysqli,$table,$data,$pk){
	$pk = $pk ?: array();
	$out = array("INSERT INTO `",$table,"` ");
	foreach ($data as $k=>$v){
		if(empty($v)) continue;
		$i1[] = "`".$k."`";
		$i2[] = "\"".$mysqli->real_escape_string($v)."\"";
		if (in_array($k, $pk)) {
			$dk[] = "`".$k."` = VALUES(`".$k."`)";
		}
	}
	$out[] = "(";
	$out[] = implode($i1,",");
	$out[] = ")";
	$out[] = " VALUES(";
	$out[] = implode($i2,",");
	$out[] = ")";
	if(!empty($dk)){
		$out[] = " ON DUPLICATE KEY UPDATE ";
		$out[] = implode($dk,",");
	}
	return implode($out);
	}
}