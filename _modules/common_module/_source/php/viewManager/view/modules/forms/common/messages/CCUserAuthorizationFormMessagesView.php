<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserAuthorizationFormMessagesView extends CCFormMessagesView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getUserAuthorizationFormMessagesData();
	}

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return CCUserAuthorizationFormView::i_FORM_XML_NODE_ID;
	}
		//...TRANSLATIONS
}


?>