<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBVacancyContentQuickSearchFormMessagesController extends CCFormMessagesController
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
			case CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_TEXT_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentEmptyDataMessage($this->_getTranslationXMLSearchTextComponentNode());
			}break;

			case CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_TEXT_ILLEGAL_CHARS:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentIllegalCharsMessage($this->_getTranslationXMLSearchTextComponentNode());
			}break;

			case CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_TEXT_WRONG_CHARS_COUNT:
			{
				$lFormMessageText_str = $this->__getTranslationXMLTextfieldComponentWrongCharsCountMessage($this->_getTranslationXMLSearchTextComponentNode(), CJOBVacancyContentQuickSearchFormView::i_MIN_CHARS_COUNT_FIELD_SEARCH_TEXT, CJOBVacancyContentQuickSearchFormView::i_MAX_CHARS_COUNT_FIELD_SEARCH_TEXT);
			}break;

			case CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SEARCH_CITY_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLListboxComponentEmptyDataMessage($this->_getTranslationXMLSearchCityComponentNode());
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	private function _getTranslationXMLSearchTextComponentNode():CCTranslationXMLTextfieldComponentNode
	{
		return $this->__getTranslationXMLTextfieldComponentNode(CJOBVacancyContentQuickSearchFormView::i_SEARCH_TEXT_TEXTFIELD_XML_NODE_ID);
	}

	private function _getTranslationXMLSearchCityComponentNode():CCTranslationXMLListboxComponentNode
	{
		return $this->__getTranslationXMLListboxComponentNode(CJOBVacancyContentQuickSearchFormView::i_SEARCH_CITY_LISTBOX_XML_NODE_ID);
	}

	/**@return CJOBVacancyContentQuickSearchFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getViewData()->i_getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentQuickSearchFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode*/
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CJOBVacancyContentQuickSearchFormView::i_FORM_XML_NODE_ID));
	}
}


?>