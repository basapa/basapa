<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCPaymentFormMessagesController extends CCFormMessagesController
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
			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_AMOUNT_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getFormTranslationData()->i_getAmountTextfieldTranslationData()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_AMOUNT_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getAmountTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__getIllegalCharsEventMessageText($lFormMessageText_str, $lNameText_str);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_AMOUNT_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getAmountTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__getWrongCharsCountMessageText($lFormMessageText_str, $lNameText_str, CCPaymentFormView::i_AMOUNT_FIELD_MIN_CHARS_COUNT, CCPaymentFormView::i_AMOUNT_FIELD_MAX_CHARS_COUNT);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_NAME_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getFormTranslationData()->i_getNameTextfieldTranslationData()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_NAME_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getNameTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__getIllegalCharsEventMessageText($lFormMessageText_str, $lNameText_str);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_NAME_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getNameTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__getWrongCharsCountMessageText($lFormMessageText_str, $lNameText_str, CCPaymentFormView::i_NAME_FIELD_MIN_CHARS_COUNT, CCPaymentFormView::i_NAME_FIELD_MAX_CHARS_COUNT);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getFormTranslationData()->i_getEmailTextfieldTranslationData()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getEmailTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__getIllegalCharsEventMessageText($lFormMessageText_str, $lNameText_str);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT:
			{
				$lTextfieldTranslationData_clss = $this->__getFormTranslationData()->i_getEmailTextfieldTranslationData();
				$lNameText_str = $lTextfieldTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextfieldTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__getWrongCharsCountMessageText($lFormMessageText_str, $lNameText_str, CCPaymentFormView::i_EMAIL_FIELD_MIN_CHARS_COUNT, CCPaymentFormView::i_EMAIL_FIELD_MAX_CHARS_COUNT);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getFormTranslationData()->i_getMessageTextareaTranslationData()->i_getMessagesData()->i_getDataEmptyMessage();
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_ILLEGAL_CHARS:
			{
				$lTextareaTranslationData_clss = $this->__getFormTranslationData()->i_getMessageTextareaTranslationData();
				$lNameText_str = $lTextareaTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextareaTranslationData_clss->i_getMessagesData()->i_getIllegalCharsMessage();
				$lFormMessageText_str = $this->__getIllegalCharsEventMessageText($lFormMessageText_str, $lNameText_str);
			}break;

			case CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_WRONG_CHARS_COUNT:
			{
				$lTextareaTranslationData_clss = $this->__getFormTranslationData()->i_getMessageTextareaTranslationData();
				$lNameText_str = $lTextareaTranslationData_clss->i_getName();
				$lFormMessageText_str = $lTextareaTranslationData_clss->i_getMessagesData()->i_getWrongCharsCountMessage();
				$lFormMessageText_str = $this->__getWrongCharsCountMessageText($lFormMessageText_str, $lNameText_str, CCPaymentFormView::i_MESSAGE_FIELD_MIN_CHARS_COUNT, CCPaymentFormView::i_MESSAGE_FIELD_MAX_CHARS_COUNT);
			}break;
			
			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	/**@return CCPaymentFormMessagesData*/
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getPaymentFormMessagesData();
	}

	/**@return CCTranslationXMLPaymentFormNode*/
	/*override*/protected function __getFormTranslationData():CCTranslationXMLFormNode
	{
		$lSiteId_str = CMainManager::i_getInstance()->i_getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);

		return CFileManager::i_getInstance()->i_getFilesData()->i_getXMLFilesData()->i_getXMLFileData($lSiteId_str)->i_getTranslationXMLFileData()->i_getFormsTranslationData()->i_getPaymentFormTranslationData();
	}
}


?>