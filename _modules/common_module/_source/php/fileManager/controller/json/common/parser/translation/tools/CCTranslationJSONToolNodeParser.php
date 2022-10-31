<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationJSONToolNodeParser extends CCJSONNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateJSONNode(string $aNameNode_str):CCJSONNode
	{
		return new CCTranslationJSONToolNode($aNameNode_str);
	}
}


?>