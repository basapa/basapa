<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMContentSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="content">',
			$this->__draw(),
		'</div>';

		//$this->__getModulesView()->getEventsView()->update();//----
		//$this->__getModulesView()->getEventsView()->draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_CONTENT;
	}
}


?>