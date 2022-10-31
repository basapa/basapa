<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlRootNodeParser extends CCTranslationXmlRootNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlRootNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXmlPagesNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlPagesNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRootNode::CHILD_NODE_ID_PAGES);
			}break;

			/*case CCTranslationXmlFormsNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlFormsNodeParser::parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRootNode::CHILD_NODE_ID_FORMS);
			}break;

			case CCTranslationXmlInfosNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlInfosNodeParser::parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRootNode::CHILD_NODE_ID_INFOS);
			}break;*/

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>