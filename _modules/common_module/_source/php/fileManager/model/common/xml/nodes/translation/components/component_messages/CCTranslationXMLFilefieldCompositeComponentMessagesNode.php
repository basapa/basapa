<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLFilefieldCompositeComponentMessagesNode extends CCTranslationXMLComponentMessagesNode
{
	public const i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE				= 0;
	public const i_CHILD_NODE_INDEX_MAX_FILE_SIZE_EXCEEDED_MESSAGE	= 1;
	public const i_CHILD_NODE_INDEX_WRONG_FILE_FORMAT_MESSAGE		= 2;
	protected const __CHILD_NODES_COUNT								= 3;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getDataEmptyMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE)->i_getNodeValue();
	}

	public function i_getMaxFileSizeExceededMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_MAX_FILE_SIZE_EXCEEDED_MESSAGE)->i_getNodeValue();
	}

	public function i_getWrongFileFormatMessage():string
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_WRONG_FILE_FORMAT_MESSAGE)->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>