<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLComponentMessagesNodeParser extends CCXMLNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLComponentMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}
}


?>