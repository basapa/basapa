<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationJSONRootNodeParser extends CCJSONNodeParser
{
	public const i_NODE_NAME							= 'translations';
	
	
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual override*/protected static function __generateJSONNode(string $aJSONDocument_str):CCJSONNode
	{
		return new CCTranslationJSONRootNode();
	}
}


?>