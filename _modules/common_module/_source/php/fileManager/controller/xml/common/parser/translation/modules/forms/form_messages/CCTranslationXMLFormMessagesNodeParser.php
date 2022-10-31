<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLFormMessagesNodeParser extends CCXMLNodeParser
{
	private const _CHILD_NODE_NAME_ERROR_MESSAGES_CAPTION			= 'error_messages_caption';
	private const _CHILD_NODE_NAME_WARNING_MESSAGES_CAPTION			= 'warning_messages_caption';
	private const _CHILD_NODE_NAME_SUCCESS_MESSAGES_CAPTION			= 'success_messages_caption';
	private const _CHILD_NODE_NAME_EMPTY_MANDATORY_FIELDS_MESSAGE	= 'empty_mandatory_fields_message';
	private const _CHILD_NODE_NAME_FAILED_MESSAGE					= 'failed_message';
	private const _CHILD_NODE_NAME_SUCCESS_MESSAGE					= 'success_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLFormMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_NAME_ERROR_MESSAGES_CAPTION:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_ERROR_MESSAGES_CAPTION);
			}break;

			case self::_CHILD_NODE_NAME_WARNING_MESSAGES_CAPTION:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_WARNING_MESSAGES_CAPTION);
			}break;

			case self::_CHILD_NODE_NAME_SUCCESS_MESSAGES_CAPTION:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_SUCCESS_MESSAGES_CAPTION);
			}break;

			case self::_CHILD_NODE_NAME_EMPTY_MANDATORY_FIELDS_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_EMPTY_MANDATORY_FIELDS_MESSAGE);
			}break;

			case self::_CHILD_NODE_NAME_FAILED_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_FAILED_MESSAGE);
			}break;

			case self::_CHILD_NODE_NAME_SUCCESS_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLFormMessagesNode::i_CHILD_NODE_INDEX_SUCCESS_MESSAGE);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>