<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLInfoNode extends CCXMLNode
{
	public const i_CHILD_NODE_INDEX_INFO_NAME			= 0;
	protected const __CHILD_NODES_COUNT					= 1;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getInfoName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_INFO_NAME)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>