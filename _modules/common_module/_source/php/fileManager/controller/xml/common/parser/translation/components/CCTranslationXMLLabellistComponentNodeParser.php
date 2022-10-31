<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationXMLLabellistComponentNodeParser extends CCTranslationXMLComponentNodeParser
{
	private const _CHILD_NODE_ID_NAME					= 'name';
	private const _CHILD_NODE_ID_ITEMS					= 'items';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLLabellistComponentNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_ID_NAME:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLLabellistComponentNode::i_CHILD_NODE_INDEX_NAME);
			}break;

			case self::_CHILD_NODE_ID_ITEMS:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXMLLabellistComponentItemsNodeParser::i_parseNode($aChildNode_clss, $aParentNode_clss), CCTranslationXMLLabellistComponentNode::i_CHILD_NODE_INDEX_ITEMS);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>