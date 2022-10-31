<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLTextareaComponentMessagesNode extends CCTranslationXMLComponentMessagesNode
{
	public const i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE			= 0;
	public const i_CHILD_NODE_INDEX_ILLEGAL_CHARS_MESSAGE		= 1;
	public const i_CHILD_NODE_INDEX_WRONG_CHARS_COUNT_MESSAGE	= 2;
	protected const __CHILD_NODES_COUNT							= 3;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getDataEmptyMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE)->i_getNodeValue();
	}

	public function i_getIllegalCharsMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_ILLEGAL_CHARS_MESSAGE)->i_getNodeValue();
	}

	public function i_getWrongCharsCountMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_WRONG_CHARS_COUNT_MESSAGE)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>