<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBViewsController extends CCViewsController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//FORMS MESSAGES...
	/*override*/protected function __generateFormsMessagesController():CCFormsMessagesController
	{
		return new CJOBFormsMessagesController();
	}
	//...FORMS MESSAGES
}


?>