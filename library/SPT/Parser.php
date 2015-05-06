<?php
namespace SPT;
class Parser {
	public static function PharseString(string $str,DatabaseTranslationQuery $DTQ){
		while(($lastoffset = strpos($str,"{",$lastoffset)) !== false){
			if(($lastoffsetc = strpos($str,"}",$lastoffset)) !== false){
				$cmd = substr($str,$lastoffset,($lastoffset-$lastoffsetc));
				
			}else{
				throw new Exception("SPT Pharser Error: Unclosed SPT Bracket at chr: ".$lastoffset);
			}
		}
	}

}