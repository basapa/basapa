<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCJavascriptView
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_RELEASE)
		{
			echo
			$this->__getScript(CCJSFileConst::i_RELEASE_DIRECTORY_NAME . CCJSFileConst::i_RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getScript(CCJSFileConst::i_DEBUG_DIRECTORY_NAME . CCJSFileConst::i_DEBUG_IMPORT_FILE_NAME);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*virtual*//*protected function __init():void
	{
	}*/

	/*virtual*/protected function __getScriptReleaseVersion():string
	{
		return RELEASE_COMMON_VERSION;
	}

	protected function __getScript(string $aFileName_str):string
	{
		$lVersion_str = SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_RELEASE ? $this->__getScriptReleaseVersion() : CDateTimeTools::i_getCurrentUTimeInSec();

		return '<script type="text/javascript" charset="' .CMainConst::i_DEFAULT_ENCODING_TYPE. '" src="' .$aFileName_str. '?v=' .$lVersion_str. '"></script>';
	}
}


?>