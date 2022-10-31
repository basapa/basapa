<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBJavascriptView extends CCJavascriptView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		parent::i_draw();

		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_RELEASE)
		{
			echo
			$this->__getScript(CJOBJSFileConst::i_RELEASE_DIRECTORY_NAME . CJOBJSFileConst::i_RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getScript(CJOBJSFileConst::i_DEBUG_DIRECTORY_NAME . CJOBJSFileConst::i_DEBUG_IJOBPORT_FILE_NAME);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getScriptReleaseVersion():string
	{
		return RELEASE_JOB_VERSION;
	}
}


?>