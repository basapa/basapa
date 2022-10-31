<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserRegistrationFormMessagesController extends CCFormMessagesController
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
			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLLoginComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLLoginComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLLoginComponentNode(), CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_LOGIN, CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_LOGIN);
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLPasswordComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLPasswordComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLPasswordComponentNode(), CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_PASSWORD, CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_PASSWORD);
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_REPEAT_PASSWORD_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLRepeatPasswordComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_REPEAT_PASSWORD_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLRepeatPasswordComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_REPEAT_PASSWORD_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLRepeatPasswordComponentNode(), CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_REPEAT_PASSWORD, CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_REPEAT_PASSWORD);
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLEmailComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLEmailComponentNode());
			}break;

			case CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLEmailComponentNode(), CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_EMAIL, CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_EMAIL);
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	private function _getTranslationXMLLoginComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCUserRegistrationFormView::i_LOGIN_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLPasswordComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCUserRegistrationFormView::i_PASSWORD_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLRepeatPasswordComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCUserRegistrationFormView::i_REPEAT_PASSWORD_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLEmailComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCUserRegistrationFormView::i_EMAIL_TEXTFIELD_XML_NODE_ID);
	}

	/**@return CCUserRegistrationFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getUserRegistrationFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode*/
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CCUserRegistrationFormView::i_FORM_XML_NODE_ID));
	}
}


?>