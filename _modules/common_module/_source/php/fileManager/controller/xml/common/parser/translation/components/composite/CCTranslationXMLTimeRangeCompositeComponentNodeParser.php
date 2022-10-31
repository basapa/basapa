<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CCTranslationXMLTimeRangeCompositeComponentNodeParser extends CCTranslationXMLComponentNodeParser
{
	private const _CHILD_NODE_ID_NAME					= 'name';
	private const _CHILD_NODE_ID_PRE_NAME				= 'pre_name';
	private const _CHILD_NODE_ID_POST_NAME				= 'post_name';
	private const _CHILD_NODE_ID_TIME_FROM				= 'time_from_listbox';
	private const _CHILD_NODE_ID_TIME_TO				= 'time_to_listbox';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLTimeRangeCompositeComponentNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_ID_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTimeRangeCompositeComponentNode::i_CHILD_NODE_INDEX_NAME);
			}break;

			case self::_CHILD_NODE_ID_PRE_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTimeRangeCompositeComponentNode::i_CHILD_NODE_INDEX_PRE_NAME);
			}break;

			case self::_CHILD_NODE_ID_POST_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLTimeRangeCompositeComponentNode::i_CHILD_NODE_INDEX_POST_NAME);
			}break;

			case self::_CHILD_NODE_ID_TIME_FROM:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLListboxComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLTimeRangeCompositeComponentNode::i_CHILD_NODE_INDEX_TIME_FROM);
			}break;

			case self::_CHILD_NODE_ID_TIME_TO:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLListboxComponentNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLTimeRangeCompositeComponentNode::i_CHILD_NODE_INDEX_TIME_TO);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>