<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CCTranslationXMLFilesUploadingCompositeComponentNodeParser extends CCTranslationXMLComponentNodeParser
{
	private const _CHILD_NODE_ID_FILE_NAME_LABELFIELD	= 'file_name_labelfield';
	private const _CHILD_NODE_ID_FILE_UPLOADING_BUTTON	= 'file_uploading_button';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLFilesUploadingCompositeComponentNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_ID_FILE_NAME_LABELFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLLabelfieldComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLFilesUploadingCompositeComponentNode::i_CHILD_NODE_INDEX_FILE_NAME_LABELFIELD);
			}break;

			case self::_CHILD_NODE_ID_FILE_UPLOADING_BUTTON:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLButtonComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLFilesUploadingCompositeComponentNode::i_CHILD_NODE_INDEX_FILE_UPLOADING_BUTTON);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>