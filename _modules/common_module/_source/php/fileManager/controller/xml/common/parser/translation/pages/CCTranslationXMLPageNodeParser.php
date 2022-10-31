<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLPageNodeParser extends CCXMLNodeParser
{
	private const _CHILD_NODE_ID_TITLE					= 'title';
	private const _CHILD_NODE_ID_META_KEYWORDS			= 'meta_keywords';
	private const _CHILD_NODE_ID_META_DESCRIPTION		= 'meta_description';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLPageNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXMLPageNodeParser::_CHILD_NODE_ID_TITLE:
			{
				$aParentNode_clss->i_insertNode(CCXMLNodeParser::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLPageNode::i_CHILD_NODE_INDEX_TITLE);
			}break;

			case CCTranslationXMLPageNodeParser::_CHILD_NODE_ID_META_KEYWORDS:
			{
				$aParentNode_clss->i_insertNode(CCXMLNodeParser::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLPageNode::i_CHILD_NODE_INDEX_META_KEYWORDS);
			}break;

			case CCTranslationXMLPageNodeParser::_CHILD_NODE_ID_META_DESCRIPTION:
			{
				$aParentNode_clss->i_insertNode(CCXMLNodeParser::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLPageNode::i_CHILD_NODE_INDEX_META_DESCRIPTION);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>