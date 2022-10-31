<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMTranslationXmlMainPageNodeParser extends CMTranslationXmlPageNodeParser
{
	public const i_NODE_NAME							= 'main_page';

	private const _CHILD_NODE_ID_TITLE					= 'title';
	private const _CHILD_NODE_ID_META_KEYWORDS			= 'meta_keywords';
	private const _CHILD_NODE_ID_META_DESCRIPTION		= 'meta_description';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlMainPageNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlMainPageNodeParser::_CHILD_NODE_ID_TITLE:
			{
				$aParentNode_clss->i_insertNode(CCXmlNodeParser::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_TITLE);
			}break;

			case CMTranslationXmlMainPageNodeParser::_CHILD_NODE_ID_META_KEYWORDS:
			{
				$aParentNode_clss->i_insertNode(CCXmlNodeParser::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_KEYWORDS);
			}break;

			case CMTranslationXmlMainPageNodeParser::_CHILD_NODE_ID_META_DESCRIPTION:
			{
				$aParentNode_clss->i_insertNode(CCXmlNodeParser::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_DESCRIPTION);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>