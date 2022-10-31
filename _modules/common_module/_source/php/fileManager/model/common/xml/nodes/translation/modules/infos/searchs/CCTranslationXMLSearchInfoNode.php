<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLSearchInfoNode extends CCTranslationXMLInfoNode
{
	public const i_CHILD_NODE_INDEX_SEARCH_NAME			= self::i_CHILD_NODE_INDEX_INFO_NAME;

	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getSearchName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_SEARCH_NAME)->i_getNodeValue();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>