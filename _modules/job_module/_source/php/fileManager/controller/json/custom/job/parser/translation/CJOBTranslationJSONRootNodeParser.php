<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBTranslationJSONRootNodeParser extends CCTranslationJSONRootNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateJSONNode(string $aNameNode_str, CCJSONNode $aOptParentNode_clss = null):CCJSONNode
	{
		return new CJOBTranslationJSONRootNode($aNameNode_str, $aOptParentNode_clss);
	}
}


?>