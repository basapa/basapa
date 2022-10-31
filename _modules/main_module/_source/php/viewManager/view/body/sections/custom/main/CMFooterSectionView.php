<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMFooterSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="footer">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_FOOTER;
	}
}


?>