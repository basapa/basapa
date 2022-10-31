<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCJSONFilesController
{
	private $_fTranslationJSONFileController_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getTranslationJSONFileController()
	{
		return $this->_getTranslationJSONFileController();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __generateTranslationJSONFileController()
	{
		return new CCTranslationJSONFileController();
	}

	private function _getTranslationJSONFileController()
	{
		return isset($this->_fTranslationJSONFileController_clss) ? $this->_fTranslationJSONFileController_clss : ($this->_fTranslationJSONFileController_clss = $this->__generateTranslationJSONFileController());
	}
}


?>