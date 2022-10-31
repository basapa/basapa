<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCDebugPageSectionView extends CCPageSectionView
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
		$lInfosView_clss->i_getNavigationsInfoView()->i_getPagesNavigationInfoView()->i_draw();
	}

	/*override*/protected function __drawContentSection():void
	{
		$lInfosView_clss = $this->__getInfosView();
		$lInfosView_clss->i_getDebugInfoView()->i_draw();

		$lFormsView_clss = $this->__getFormsView();
		//$lFormsView_clss->i_getUserMessageAdditingFormView()->i_draw();
	}

	/*override*/protected function __drawPostContentSection():void
	{
		$lInfosView_clss = $this->__getInfosView();
		$lInfosView_clss->i_getNavigationsInfoView()->i_getAdditionalPagesNavigationInfoView()->i_draw();
	}
}


?>