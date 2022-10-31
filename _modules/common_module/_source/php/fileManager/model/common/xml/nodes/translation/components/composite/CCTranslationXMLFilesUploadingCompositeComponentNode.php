<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLFilesUploadingCompositeComponentNode extends CCTranslationXMLComponentNode
{
	public const i_CHILD_NODE_INDEX_FILE_NAME_LABELFIELD	= self::__CHILD_NODES_COUNT;
	public const i_CHILD_NODE_INDEX_FILE_UPLOADING_BUTTON	= self::__CHILD_NODES_COUNT + 1;


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCTranslationXMLLabelfieldComponentNode*/
	public function i_getFileNameLabelfieldData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_FILE_NAME_LABELFIELD);
	}

	/**@return CCTranslationXMLButtonComponentNode*/
	public function i_getFileUploadingButtonData():CCXMLNode
	{
		return $this->i_getNode(self::i_CHILD_NODE_INDEX_FILE_UPLOADING_BUTTON);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>