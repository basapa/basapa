<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLTextfieldComponentMessagesNodeParser extends CCTranslationXMLComponentMessagesNodeParser
{
	private const _CHILD_NODE_NAME_DATA_EMPTY_MESSAGE			= 'data_empty_message';
	private const _CHILD_NODE_NAME_ILLEGAL_CHARS_MESSAGE		= 'illegal_chars_message';
	private const _CHILD_NODE_NAME_WRONG_CHARS_COUNT_MESSAGE	= 'wrong_chars_count_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLTextfieldComponentMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_NAME_DATA_EMPTY_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextfieldComponentMessagesNode::i_CHILD_NODE_INDEX_DATA_EMPTY_MESSAGE);
			}break;

			case self::_CHILD_NODE_NAME_ILLEGAL_CHARS_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextfieldComponentMessagesNode::i_CHILD_NODE_INDEX_ILLEGAL_CHARS_MESSAGE);
			}break;

			case self::_CHILD_NODE_NAME_WRONG_CHARS_COUNT_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextfieldComponentMessagesNode::i_CHILD_NODE_INDEX_WRONG_CHARS_COUNT_MESSAGE);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>