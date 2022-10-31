<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCFaviconView
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
		$lFaviconImageURL_str = CFilesConst::i_ROOT_DIRECTORY_NAME . CFilesConst::i_IMAGE_FAVICON_FILE_NAME;

		echo
		'<link rel="icon" href="' .$lFaviconImageURL_str. '" type="image/x-icon">',
		'<link rel="shortcut icon" href="' .$lFaviconImageURL_str. '" type="image/x-icon">';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/
}


?>