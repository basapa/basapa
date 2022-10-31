<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlPagesNodeParser extends CCTranslationXmlPagesNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlPagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlMainPageNodeParser::NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlMainPageNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlPagesNode::i_CHILD_NODE_INDEX_MAIN_PAGE);
			}break;

			/*case CMTranslationXmlLoginFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlLoginFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_LOGIN_FORM);
			}break;

			case CMTranslationXmlAuthorizationFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlAuthorizationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_AUTHORIZATION_FORM);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlRegistrationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_REGISTRATION_FORM);
			}break;*/
			
			case CMTranslationXmlPaymentFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlPaymentFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_PAYMENT_FORM);
			}break;
			
			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}


?>