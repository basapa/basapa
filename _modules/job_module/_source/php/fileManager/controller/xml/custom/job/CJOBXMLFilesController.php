<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CJOBXMLFilesController extends CCXMLFilesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateTranslationXMLFileController()
	{
		return new CJOBTranslationXMLFileController();
	}
}


?>