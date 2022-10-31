<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlInfosNodeParser extends CCTranslationXmlInfosNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlInfosNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXmlMessagesInfoNodeParser::NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlMessagesInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlInfosNode::i_CHILD_NODE_INDEX_MESSAGES);
			}break;

			default:
				CCXmlNodeParser::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>