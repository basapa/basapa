<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserAuthorizationFormMessagesController extends CCFormMessagesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormMessageText(int $aFormMessageId_int):string
	{
		switch ($aFormMessageId_int)
		{
			case CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->_getTranslationXMLLoginComponentNode()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLLoginComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
			}break;

			case CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLLoginComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, CCUserAuthorizationFormView::i_MIN_CHARS_COUNT_FIELD_LOGIN, CCUserAuthorizationFormView::i_MAX_CHARS_COUNT_FIELD_LOGIN);
			}break;

			case CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->_getTranslationXMLPasswordComponentNode()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLPasswordComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
			}break;

			case CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLPasswordComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, CCUserAuthorizationFormView::i_MIN_CHARS_COUNT_FIELD_PASSWORD, CCUserAuthorizationFormView::i_MAX_CHARS_COUNT_FIELD_PASSWORD);
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	private function _getTranslationXMLLoginComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCUserAuthorizationFormView::i_LOGIN_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLPasswordComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCUserAuthorizationFormView::i_PASSWORD_TEXTFIELD_XML_NODE_ID);
	}

	/**@return CCUserAuthorizationFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getUserAuthorizationFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode*/
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CCUserAuthorizationFormView::i_FORM_XML_NODE_ID));
	}
}


?>