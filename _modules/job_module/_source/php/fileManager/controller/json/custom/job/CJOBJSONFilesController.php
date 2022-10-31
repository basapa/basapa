<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CJOBJSONFilesController extends CCJSONFilesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateTranslationJSONFileController()
	{
		return new CJOBTranslationJSONFileController();
	}
}


?>