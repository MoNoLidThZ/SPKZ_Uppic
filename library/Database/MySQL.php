<?php
namespace UpPic\Database;
class MySQL{
	private $DATABASE_CFG = array();
	private $DATABASE_INSTANCE;
	private function GetHost(){
		return $this->DATABASE_CFG['host'] ?: ini_get("mysqli.default_host");
	}
	public function GetUsername(){
		return $this->DATABASE_CFG['user'] ?: ini_get("mysqli.default_user");
	}
	public function GetPassword(){
		return $this->DATABASE_CFG['pass'] ?: ini_get("mysqli.default_pw");
	}
	public function GetSchemaName(){
		return $this->DATABASE_CFG['db'] ?: "UpPic";
	}
	public function GetPort(){
		return $this->DATABASE_CFG['port'] ?: ini_get("mysqli.default_port");
	}
	public function InitializeDBConnection(){
		if(!$this->DATABASE_INSTANCE){
			$this->DATABASE_INSTANCE = new \mysqli($this->GetHost(),$this->GetUsername(),$this->GetPassword(),$this->GetSchemaName(),$this->GetPort());
		}
		return $this->DATABASE_INSTANCE;
	}
	public function __construct($CFG){
		$this->DATABASE_CFG = $CFG;
	}
/** Function: SQuery($sql)
 * <pre>Return Database Data as Array
 * Throw Exception on Error
 * Return false when not connected to DB</pre>
 * @version 2.2
 * @access public
 */
	public function SQurey($sql){
		$link = $this->DATABASE_INSTANCE;
		if(!$this->link){ return false; }
		$query = $link->query($sql);
		if(!$query){ throw new Exception("SQL ERROR! :".$link->error,$link->errno); return false; }
		if(gettype($query) === "object"){
		while($row = $query->fetch_assoc()){
			$return[] = $row;
		}
		return $return;
		}else{
			return "UPDATE_".$query->affected_rows;	
		}
	}
}