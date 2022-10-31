<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMHeaderSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="header">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_HEADER;
	}
}


?>