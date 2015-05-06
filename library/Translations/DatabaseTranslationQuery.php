<?php
namespace Translations;
class DatabaseTranslationQuery{
	private $DATABASE_INSTANCE;
	private $TRANSLATED;
	public function __construct($mysqli){
		$this->DATABASE_INSTANCE = $mysqli;
	}
	public function PharseLang(){
		if (substr( $string_n, 0, 3 ) === "TR:"):
			
		else:
			
		endif;
	}
	private function QueryTranslationFromDB($Category,$Title,$LangID = 1){
		if ($this->TRANSLATED[$LangID][$Category][$Title]):
			return $this->TRANSLATED[$LangID][$Category][$Title];
		else:
			
		endif;
	}
}