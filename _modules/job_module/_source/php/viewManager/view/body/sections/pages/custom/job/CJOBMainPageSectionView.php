<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBMainPageSectionView extends CCMainPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawLeftSection():void
	{
	}

	/*override*/protected function __drawRightSection():void
	{
	}

	/*override*/protected function __drawContentSection():void
	{
		$lInfosView_clss = $this->_getJOBInfosView();
		$lInfosView_clss->i_getWelcomeDescriptionInfoView()->i_draw();

		$lFormsView_clss = $this->_getJOBFormsView();
		$lFormsView_clss->i_getVacancyContentMainQuickSearchFormView()->i_draw();

		$lInfosView_clss->i_getTopCitiesPreviewInfoView()->i_draw();
	}

	private function _getJOBInfosView():CJOBInfosView
	{
		$lInfosView_clss = $this->__getInfosView();
		return CJOBInfosView::i_toClassType($lInfosView_clss);
	}

	private function _getJOBFormsView():CJOBFormsView
	{
		$lFormsView_clss = $this->__getFormsView();
		return CJOBFormsView::i_toClassType($lFormsView_clss);
	}
}


?>