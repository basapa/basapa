<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMPreContentSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="pre_content">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_PRE_CONTENT;
	}
}


?>