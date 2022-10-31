<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserLoginFormMessagesView extends CCFormMessagesView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getUserLoginFormMessagesData();
	}

	protected function __getFormTranslationData():CCTranslationXMLFormNode
	{
		return $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData()->i_getUserLoginFormTranslationData();
	}
}


?>