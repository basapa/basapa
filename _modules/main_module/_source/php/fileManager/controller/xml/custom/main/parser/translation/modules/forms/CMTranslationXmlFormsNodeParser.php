<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMTranslationXmlFormsNodeParser extends CCTranslationXmlFormsNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlFormsNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlLoginFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlLoginFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_LOGIN_FORM);
			}break;

			case CMTranslationXmlAuthorizationFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlAuthorizationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_AUTHORIZATION_FORM);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlRegistrationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_REGISTRATION_FORM);
			}break;
			
			case CMTranslationXmlPaymentFormNodeParser::i_NODE_NAME:
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