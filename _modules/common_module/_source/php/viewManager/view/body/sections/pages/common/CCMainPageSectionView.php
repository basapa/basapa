<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCMainPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawLeftSection():void
	{
		//$lFormsView_clss = $this->__getFormsView();
		//$lInfosView_clss = $this->__getInfosView();
		//$lInfosView_clss->i_getSiteDescriptionInfoView()->i_draw();
		//$lFormsView_clss->i_getPaymentFormView()->i_draw();
	}

	/*virtual override*/protected function __drawPreContentSection():void
	{
		//$lInfosView_clss = $this->__getInfosView();
		//$lInfosView_clss->i_getNavigationsInfoView()->i_getPagesNavigationInfoView()->i_draw();
	}

	/*override*/protected function __drawPostContentSection():void
	{
		//$lInfosView_clss = $this->__getInfosView();
		//$lInfosView_clss->i_getNavigationsInfoView()->i_getAdditionalPagesNavigationInfoView()->i_draw();
	}
}


?>