<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBVacancyContentFilteringFormMessagesController extends CCFormMessagesController
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
			default:
				$lFormMessageText_str = parent::__getFormMessageText($aFormMessageId_int);
			break;
		}

		return $lFormMessageText_str;
	}

	/**@return CJOBVacancyContentFilteringFormMessagesData */
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getViewData()->i_getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentFilteringFormMessagesData();
	}

	/**@return CCTranslationXMLFormNode*/
	/*override*/protected function __getTranslationXMLFormNode():CCXMLNode
	{
		return CCTranslationXMLFormNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLFormsNativeNode()->i_getXMLChildNodeByNodeName(CJOBVacancyContentFilteringFormView::i_FORM_XML_NODE_ID));
	}
}


?>