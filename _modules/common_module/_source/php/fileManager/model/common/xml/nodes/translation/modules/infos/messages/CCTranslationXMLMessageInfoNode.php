<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLMessageInfoNode extends CCXMLNode
{
	public const i_CHILD_NODE_INDEX_MESSAGE_NAME		= 0;
	protected const __CHILD_NODES_COUNT					= 1;

	
	/***************************************************
	 * INTERFACE
	 */
	
	public function i_getMessageName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_MESSAGE_NAME)->i_getNodeValue();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>