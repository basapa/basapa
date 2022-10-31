<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCAccessRequirementPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawContentSection():void
	{
		$lInfosView_clss = $this->__getInfosView();

		$lInfosView_clss->i_getAccessRequirementInfoView()->i_draw();
	}
}


?>