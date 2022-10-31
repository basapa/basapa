<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBVacancyContentAdditionFormMessagesView extends CCFormMessagesView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getViewData()->i_getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentAdditionFormMessagesData();
	}

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return CJOBVacancyContentAdditionFormView::i_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>