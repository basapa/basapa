<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBVacancyContentsAdministrationFormMessagesController extends CCFormMessagesController
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
			case CJOBVacancyContentsAdministrationFormMessagesData::i_FORM_MESSAGE_ID_ACTIONS_EMPTY_DATA:
			{
				$lFormMessageText_str = $this->__getTranslationXMLListboxComponentEmptyDataMessage($this->_getTranslationXMLActionsComponentNode());
			}break;

			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	private function _getTranslationXMLActionsComponentNode():CCTranslationXMLListboxComponentNode
	{
		return $this->__getTranslationXMLListboxComponentNode(CJOBContentsAdministrationFormView::i_ACTIONS_LISTBOX_XML_NODE_ID);
	}

	/**@return CJOBVacancyContentsAdministrationFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getViewData()->i_getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentsAdministrationFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode*/
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CJOBContentsAdministrationFormView::i_FORM_XML_NODE_ID));
	}
}


?>