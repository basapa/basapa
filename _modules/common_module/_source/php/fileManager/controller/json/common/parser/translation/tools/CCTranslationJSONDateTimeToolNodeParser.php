<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCTranslationJSONDateTimeToolNodeParser extends CCTranslationJSONToolNodeParser
{
	private const _CHILD_NODE_ID_TITLE					= 'days_of_the_week';
	private const _CHILD_NODE_ID_META_KEYWORDS			= 'mounths';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateJSONNode(string $aNameNode_str):CCJSONNode
	{
		return new CCTranslationJSONDateTimeToolNode($aNameNode_str);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleJSONElementWrapper $aChildNode_clss, CCJSONNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationJSONDateTimeToolNodeParser::_CHILD_NODE_ID_TITLE:
			{
				$aParentNode_clss->i_insertNode(CCJSONNodeParser::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationJSONPageNode::i_CHILD_NODE_INDEX_TITLE);
			}break;

			case CCTranslationJSONDateTimeToolNodeParser::_CHILD_NODE_ID_META_KEYWORDS:
			{
				$aParentNode_clss->i_insertNode(CCJSONNodeParser::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationJSONPageNode::i_CHILD_NODE_INDEX_META_KEYWORDS);
			}break;

			default:
				//parent::__parseChildNode($aChildNodeName_str, $aChildNode_clss);
			break;
		}
	}
}


?>