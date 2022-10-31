<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLTextareaComponentNodeParser extends CCTranslationXMLComponentNodeParser
{
	private const _CHILD_NODE_ID_NAME					= 'name';
	private const _CHILD_NODE_ID_PRE_NAME				= 'pre_name';
	private const _CHILD_NODE_ID_POST_NAME				= 'post_name';
	private const _CHILD_NODE_ID_PLACEHOLDER			= 'placeholder';
	private const _CHILD_NODE_ID_MESSAGES				= 'messages';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLTextareaComponentNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXMLTextareaComponentNodeParser::_CHILD_NODE_ID_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextareaComponentNode::i_CHILD_NODE_INDEX_NAME);
			}break;

			case CCTranslationXMLTextareaComponentNodeParser::_CHILD_NODE_ID_PRE_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextareaComponentNode::i_CHILD_NODE_INDEX_PRE_NAME);
			}break;

			case CCTranslationXMLTextareaComponentNodeParser::_CHILD_NODE_ID_POST_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextareaComponentNode::i_CHILD_NODE_INDEX_POST_NAME);
			}break;

			case CCTranslationXMLTextareaComponentNodeParser::_CHILD_NODE_ID_PLACEHOLDER:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTextareaComponentNode::i_CHILD_NODE_INDEX_PLACEHOLDER);
			}break;

			case CCTranslationXMLTextareaComponentNodeParser::_CHILD_NODE_ID_MESSAGES:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLTextareaComponentMessagesNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLTextareaComponentNode::i_CHILD_NODE_INDEX_MESSAGES);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>