<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMJavascriptView extends CCJavascriptView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		parent::i_draw();

		if (SOURCES_EXECUTION_MODE == SOURCES_EXECUTION_MODE_RELEASE)
		{
			echo
			$this->__getScript(CMJsFileConst::RELEASE_DIRECTORY_NAME . CMJsFileConst::RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getScript(CMJsFileConst::DEBUG_DIRECTORY_NAME . CMJsFileConst::DEBUG_IMPORT_FILE_NAME);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getScriptReleaseVersion()
	{
		return RELEASE_MAIN_VERSION;
	}
}


?>