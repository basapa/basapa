<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBVacancyContentAdditionFormMessagesController extends CCFormMessagesController
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
			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLCaptionComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLCaptionComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLCaptionComponentNode(), CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_CAPTION, CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_CAPTION);
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_FROM_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLWageFromComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_FROM_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLWageFromComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_FROM_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLWageFromComponentNode(), CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_WAGE_FROM, CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_WAGE_FROM);
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_TO_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLWageToComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_TO_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLWageToComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_TO_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLWageToComponentNode(), CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_WAGE_TO, CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_WAGE_TO);
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_CURRENCY_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLListboxComponentEmptyDataMessage($this->_getTranslationXMLWageCurrencyComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_DESCRIPTION_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextareaComponentEmptyDataMessage($this->_getTranslationXMLDescriptionComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_DESCRIPTION_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextareaComponentIllegalCharsMessage($this->_getTranslationXMLDescriptionComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_DESCRIPTION_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextareaComponentWrongCharsCountMessage($this->_getTranslationXMLDescriptionComponentNode(), CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_DESCRIPTION, CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_DESCRIPTION);
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLEmployerComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLEmployerComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLEmployerComponentNode(), CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_EMPLOYER, CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_EMPLOYER);
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_CITY_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLListboxComponentEmptyDataMessage($this->_getTranslationXMLEmployerCityComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EXTERNAL_SOURCE_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLExternalSourceComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EXTERNAL_SOURCE_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLExternalSourceComponentNode());
			}break;

			case CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EXTERNAL_SOURCE_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLExternalSourceComponentNode(), CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_EXTERNAL_SOURCE, CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_EXTERNAL_SOURCE);
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	private function _getTranslationXMLCaptionComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CJOBVacancyContentAdditionFormView::i_CAPTION_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLWageFromComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CJOBVacancyContentAdditionFormView::i_WAGE_FROM_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLWageToComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CJOBVacancyContentAdditionFormView::i_WAGE_TO_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLWageCurrencyComponentNode():CCTranslationXMLListboxComponentNode
	{
		return $this->__getTranslationXMLListboxComponentNode(CJOBVacancyContentAdditionFormView::i_WAGE_CURRENCY_LISTBOX_XML_NODE_ID);
	}

	private function _getTranslationXMLDescriptionComponentNode():CCTranslationXMLTextareaComponentNode
	{
		return $this->__getTranslationXMLTextareaComponentNode(CJOBVacancyContentAdditionFormView::i_DESCRIPTION_TEXTAREA_XML_NODE_ID);
	}

	private function _getTranslationXMLEmployerComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CJOBVacancyContentAdditionFormView::i_EMPLOYER_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLEmployerCityComponentNode():CCTranslationXMLListboxComponentNode
	{
		return $this->__getTranslationXMLListboxComponentNode(CJOBVacancyContentAdditionFormView::i_EMPLOYER_CITY_LISTBOX_XML_NODE_ID);
	}

	private function _getTranslationXMLExternalSourceComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CJOBVacancyContentAdditionFormView::i_EXTERNAL_SOURCE_TEXTFIELD_XML_NODE_ID);
	}

	/**@return CJOBVacancyContentAdditionFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getViewData()->i_getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentAdditionFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode*/
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CJOBVacancyContentAdditionFormView::i_FORM_XML_NODE_ID));
	}
}


?>