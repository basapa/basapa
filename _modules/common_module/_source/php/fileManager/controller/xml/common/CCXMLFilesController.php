<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCXMLFilesController
{
	private $_fTranslationXMLFileController_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getTranslationXMLFileController()
	{
		return $this->_getTranslationXMLFileController();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __generateTranslationXMLFileController()
	{
		return new CCTranslationXMLFileController();
	}

	private function _getTranslationXMLFileController()
	{
		return isset($this->_fTranslationXMLFileController_clss) ? $this->_fTranslationXMLFileController_clss : ($this->_fTranslationXMLFileController_clss = $this->__generateTranslationXMLFileController());
	}
}


?>