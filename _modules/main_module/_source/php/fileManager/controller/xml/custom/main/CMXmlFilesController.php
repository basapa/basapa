<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMXmlFilesController extends CCXmlFilesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __generateTranslationXmlFileController()
	{
		return new CMTranslationXmlFileController();
	}
}


?>