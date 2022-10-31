<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCStyleView
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
		if (SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			echo
			$this->__getStyle(CCCSSFileConst::i_RELEASE_DIRECTORY_NAME . CCCSSFileConst::i_RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getStyle(CCCSSFileConst::i_DEBUG_DIRECTORY_NAME . CCCSSFileConst::i_DEBUG_IMPORT_FILE_NAME);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	/*virtual*/protected function __getStyleReleaseVersion():string
	{
		return RELEASE_COMMON_VERSION;
	}

	protected function __getStyle(string $aFileName_str):string
	{
		$lVersion_str = SOURCES_ASSEMBLY_TYPE === SOURCES_ASSEMBLY_TYPE_RELEASE ? $this->__getStyleReleaseVersion() : CDateTimeTools::i_getCurrentUTimeInSec();

		return '<link rel="stylesheet" type="text/css" href="' .$aFileName_str. '?v=' .$lVersion_str. '">';
	}
}


?>