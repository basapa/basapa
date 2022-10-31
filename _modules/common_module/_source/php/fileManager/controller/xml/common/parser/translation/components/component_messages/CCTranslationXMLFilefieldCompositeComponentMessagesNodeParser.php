<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLFilefieldCompositeComponentMessagesNodeParser extends CCTranslationXMLComponentMessagesNodeParser
{
	private const _CHILD_NODE_NAME_DATA_EMPTY_MESSAGE				= 'data_empty_message';
	private const _CHILD_NODE_NAME_MAX_FILE_SIZE_EXCEEDED_MESSAGE	= 'max_file_size_exceeded_message';
	private const _CHILD_NODE_NAME_WRONG_FILE_FORMAT_MESSAGE		= 'wrong_file_format_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLFilefieldCompositeComponentMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_NAME_DATA_EMPTY_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFilefieldCompositeComponentMessagesNode::i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE);
			}break;

			case self::_CHILD_NODE_NAME_MAX_FILE_SIZE_EXCEEDED_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFilefieldCompositeComponentMessagesNode::i_CHILD_NODE_INDEX_MAX_FILE_SIZE_EXCEEDED_MESSAGE);
			}break;

			case self::_CHILD_NODE_NAME_WRONG_FILE_FORMAT_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFilefieldCompositeComponentMessagesNode::i_CHILD_NODE_INDEX_WRONG_FILE_FORMAT_MESSAGE);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>