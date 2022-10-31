<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBStyleView extends CCStyleView
{
	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_draw():void
	{
		parent::i_draw();

		if (SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			echo
			$this->__getStyle(CJOBCSSFileConst::i_RELEASE_DIRECTORY_NAME . CJOBCSSFileConst::i_RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getStyle(CJOBCSSFileConst::i_DEBUG_DIRECTORY_NAME . CJOBCSSFileConst::i_DEBUG_IJOBPORT_FILE_NAME);
		}
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getStyleReleaseVersion():string
	{
		return RELEASE_JOB_VERSION;
	}
}


?>