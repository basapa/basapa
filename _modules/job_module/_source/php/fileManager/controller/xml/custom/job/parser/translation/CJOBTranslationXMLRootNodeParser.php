<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBTranslationXMLRootNodeParser extends CCTranslationXMLRootNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CJOBTranslationXMLRootNode($aNameNode_str, $aOptParentNode_clss);
	}
}


?>