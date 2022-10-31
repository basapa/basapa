<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlMessagesInfoNodeParser extends CCTranslationXmlMessagesInfoNodeParser
{
	public const i_NODE_NAME							= 'messages';

	private const _CHILD_NODE_ID_ACCESS_PROHIBITION_MESSAGE		= 'access_prohibition_message';
	private const _CHILD_NODE_ID_ACCESS_REQUIREMENT_MESSAGE		= 'access_requirement_message';
	private const _CHILD_NODE_ID_ACCESS_ERROR_MESSAGE			= 'access_error_message';
	private const _CHILD_NODE_ID_ACCESS_RESTRICTION_MESSAGE		= 'access_restriction_message';
	private const _CHILD_NODE_ID_ERROR_403_MESSAGE				= 'error_403_message';
	private const _CHILD_NODE_ID_ERROR_404_MESSAGE				= 'error_404_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlMessagesInfoNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_PROHIBITION_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_PROHIBITION_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_REQUIREMENT_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_REQUIREMENT_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_ERROR_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_ERROR_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_RESTRICTION_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_RESTRICTION_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ERROR_403_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_403_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ERROR_404_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_404_MESSAGE);
			}break;

			default:
				CCXmlNodeParser::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>