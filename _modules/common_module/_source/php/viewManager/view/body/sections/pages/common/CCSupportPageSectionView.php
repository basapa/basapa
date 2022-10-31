<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCSupportPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawPreContentSection():void
	{
		$lInfosView_clss = $this->__getInfosView();
		//$lInfosView_clss->i_getNavigationsInfoView()->i_getPageNavigationInfoView()->i_draw();
	}

	/*override*/protected function __drawContentSection():void
	{
		$lFormsView_clss = $this->__getFormsView();
		$lFormsView_clss->i_getSupportFormView()->i_draw();
	}
}


?>