<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMRightSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="right">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_RIGHT;
	}
}


?>