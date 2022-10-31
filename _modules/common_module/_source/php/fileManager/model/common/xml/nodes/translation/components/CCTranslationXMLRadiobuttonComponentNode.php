<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLRadiobuttonComponentNode extends CCTranslationXMLComponentNode
{
	public const i_CHILD_NODE_INDEX_NAME				= self::__CHILD_NODES_COUNT;
	public const i_CHILD_NODE_INDEX_PRE_NAME			= self::__CHILD_NODES_COUNT + 1;
	public const i_CHILD_NODE_INDEX_POST_NAME			= self::__CHILD_NODES_COUNT + 2;
	public const i_CHILD_NODE_INDEX_MESSAGES			= self::__CHILD_NODES_COUNT + 3;
	public const i_CHILD_NODE_INDEX_ITEMS				= self::__CHILD_NODES_COUNT + 4;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_NAME)->i_getNodeValue();
	}

	public function i_getPreName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_PRE_NAME)->i_getNodeValue();
	}

	public function i_getPostName():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_POST_NAME)->i_getNodeValue();
	}

	/**@return CCTranslationXMLRadiobuttonComponentMessagesNode*/
	public function i_getMessagesData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_MESSAGES);
	}

	/**@return CCTranslationXMLRadiobuttonComponentItemsNode*/
	public function i_getItemsData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_ITEMS);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>