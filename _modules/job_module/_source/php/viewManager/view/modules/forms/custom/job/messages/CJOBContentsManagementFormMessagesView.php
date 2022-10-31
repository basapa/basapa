<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentManagementFormMessagesView extends CCFormMessagesView
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
		return $lFormsMessagesData_clss->i_getContentManagementFormMessagesData();
	}

	protected function __getFormTranslationData():CCTranslationXMLFormNode
	{
		$lFormsTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData();
		$lFormsTranslationData_clss = CJOBTranslationXMLFormsNode::i_toClassType($lFormsTranslationData_clss);
		return $lFormsTranslationData_clss->i_getContentManagementFormTranslationData();
	}
}


?>