<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserRegistrationFormMessagesView extends CCFormMessagesView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getViewData()->i_getFormsMessagesData()->i_getUserRegistrationFormMessagesData();
	}

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return CCUserRegistrationFormView::i_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>