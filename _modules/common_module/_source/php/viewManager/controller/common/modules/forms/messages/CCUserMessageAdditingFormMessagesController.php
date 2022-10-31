<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserMessageAdditingFormMessagesController extends CCFormMessagesController
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
			case CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_USER_NAME_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getFormTranslationData()->i_getCaptionTextfieldTranslationData()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_USER_NAME_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getCaptionTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__getIllegalCharsEventMessageText($lFormMessageText_str, $lNameText_str);
			}break;

			case CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_USER_NAME_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getCaptionTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__getWrongCharsCountMessageText($lFormMessageText_str, $lNameText_str, CCUserMessageAdditingFormView::i_MIN_CHARS_COUNT_FIELD_USER_NAME, CCUserMessageAdditingFormView::i_MAX_CHARS_COUNT_FIELD_USER_NAME);
			}break;

			case CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getFormTranslationData()->i_getMessageTextareaTranslationData()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_ILLEGAL_CHARS:
			{
				$lTextareaTranslationData_clss = $this->__getFormTranslationData()->i_getMessageTextareaTranslationData();
				$lNameText_str = $lTextareaTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextareaTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__getIllegalCharsEventMessageText($lFormMessageText_str, $lNameText_str);
			}break;

			case CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_WRONG_CHARS_COUNT:
			{
				$lTextareaTranslationData_clss = $this->__getFormTranslationData()->i_getMessageTextareaTranslationData();
				$lNameText_str = $lTextareaTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextareaTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__getWrongCharsCountMessageText($lFormMessageText_str, $lNameText_str, CCUserMessageAdditingFormView::i_MIN_CHARS_COUNT_FIELD_MESSAGE, CCUserMessageAdditingFormView::i_MAX_CHARS_COUNT_FIELD_MESSAGE);
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	/**@return CCUserMessageAdditingFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getUserMessageAdditingFormMessagesData();
	}

	/**@return CCTranslationXMLUserMessageAdditingFormNode */
	/*override*/protected function __getFormTranslationData():CCTranslationXMLFormNode
	{
		return $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData()->i_getUserMessageAdditingFormTranslationData();
	}
}


?>