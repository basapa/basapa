<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLListboxComponentMessagesNode extends CCTranslationXMLComponentMessagesNode
{
	public const i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE	= 0;
	public const i_CHILD_NODE_INDEX_WRONG_ITEM_MESSAGE	= 1;
	protected const __CHILD_NODES_COUNT					= 2;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getDataEmptyMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE)->i_getNodeValue();
	}

	public function i_getWrongItemMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_WRONG_ITEM_MESSAGE)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>