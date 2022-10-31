<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMStyleView extends CCStyleView
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
			$this->__getStyle(CMCssFileConst::RELEASE_DIRECTORY_NAME . CMCssFileConst::RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getStyle(CMCssFileConst::DEBUG_DIRECTORY_NAME . CMCssFileConst::DEBUG_IMPORT_FILE_NAME);
		}
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getStyleReleaseVersion()
	{
		return RELEASE_MAIN_VERSION;
	}
}


?>