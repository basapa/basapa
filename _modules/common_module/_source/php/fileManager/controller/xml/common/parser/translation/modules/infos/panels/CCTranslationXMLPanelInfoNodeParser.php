<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLPanelInfoNodeParser extends CCXMLNodeParser
{
	private const _CHILD_NODE_ID_PANEL_NAME				= 'panel_name';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected static function __generateXMLNode(string $aNameNode_str, CCXMLNode $aOptParentNode_clss = null):CCXMLNode
	{
		return new CCTranslationXMLPanelInfoNode($aNameNode_str, $aOptParentNode_clss);
	}

	/*override*/protected static function __parseChildNode(string $aChildNodeName_str, CSimpleXMLElementWrapper $aChildNode_clss, CCXMLNode $aParentNode_clss):void
	{
		switch ($aChildNodeName_str)
		{
			case self::_CHILD_NODE_ID_PANEL_NAME:
			{
				$aParentNode_clss->i_insertNode(CCXMLNodeParser::i_parseSimpleNode($aChildNode_clss, $aChildNodeName_str, $aParentNode_clss), CCTranslationXMLPanelInfoNode::i_CHILD_NODE_INDEX_PANEL_NAME);
			}break;

			default:
				CCXMLNodeParser::__parseChildNode($aChildNodeName_str, $aChildNode_clss, $aParentNode_clss);
			break;
		}
	}
}


?>