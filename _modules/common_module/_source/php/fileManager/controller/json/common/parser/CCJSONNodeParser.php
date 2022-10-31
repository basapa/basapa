<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCJSONNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_parseNode(string $aJSONDocument_str):CCJSONNode
	{
		$lJSONDocument_str = CJSONFileTools::i_decodeJSON($aJSONDocument_str);

		return static::__generateJSONNode($lJSONDocument_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected static function __generateJSONNode(string $aJSONDocument_str):?CCJSONNode
	{
		return null;
	}
}


?>