<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCSupportFormMessagesController extends CCFormMessagesController
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
			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->_getTranslationXMLCaptionComponentNode()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLCaptionComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLCaptionComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, CCSupportFormView::i_MIN_CHARS_COUNT_FIELD_CAPTION, CCSupportFormView::i_MAX_CHARS_COUNT_FIELD_CAPTION);
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->_getTranslationXMLEmailComponentNode()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLEmailComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->_getTranslationXMLEmailComponentNode();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, CCSupportFormView::i_MIN_CHARS_COUNT_FIELD_EMAIL, CCSupportFormView::i_MAX_CHARS_COUNT_FIELD_EMAIL);
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->_getTranslationXMLMessageComponentNode()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_ILLEGAL_CHARS:
			{
				$lTextareaTranslationData_clss = $this->_getTranslationXMLMessageComponentNode();
				$lNameText_str = $lTextareaTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextareaTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__replaceNamePatternInIllegalCharsEventMessage($lFormMessageText_str, $lNameText_str);
			}break;

			case CCSupportFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_WRONG_CHARS_COUNT:
			{
				$lTextareaTranslationData_clss = $this->_getTranslationXMLMessageComponentNode();
				$lNameText_str = $lTextareaTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextareaTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__replaceNameAndMaxMinCharsCountsPatternInWrongCharsCountMessage($lFormMessageText_str, $lNameText_str, CCSupportFormView::i_MIN_CHARS_COUNT_FIELD_MESSAGE, CCSupportFormView::i_MAX_CHARS_COUNT_FIELD_MESSAGE);
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	private function _getTranslationXMLCaptionComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCSupportFormView::i_FORM_COMPONENT_ID_CAPTION);
	}

	private function _getTranslationXMLEmailComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CCSupportFormView::i_FORM_COMPONENT_ID_EMAIL);
	}

	private function _getTranslationXMLMessageComponentNode():CCTranslationXMLTextareaComponentNode
	{
		return $this->__getTranslationXMLTextareaComponentNode(CCSupportFormView::i_FORM_COMPONENT_ID_MESSAGE);
	}

	/**@return CCSupportFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getSupportFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode */
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CCSupportFormView::i_FORM_XML_NODE_ID));
	}
}


?>