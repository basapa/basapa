<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLRadiobuttonComponentMessagesNode extends CCTranslationXMLComponentMessagesNode
{
	public const i_CHILD_NODE_INDEX_NOT_SELECTED_ITEM_MESSAGE	= 0;
	protected const __CHILD_NODES_COUNT							= 1;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getNotSelectedItemMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_NOT_SELECTED_ITEM_MESSAGE)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>