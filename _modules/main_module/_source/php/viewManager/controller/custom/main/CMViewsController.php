<?php
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


class CMViewsController extends CCViewsController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//FORMS MESSAGES...
	protected function __generateFormsMessagesController()
	{
		return new CCFormsMessagesController();
	}
	//...FORMS MESSAGES
}


?>