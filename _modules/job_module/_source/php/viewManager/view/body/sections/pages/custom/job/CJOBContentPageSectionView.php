<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawLeftSection():void
	{
		$lNavigationsInfoView_clss = $this->_getJOBNavigationsInfoView();
		//$lNavigationsInfoView_clss->i_getCategoriesNavigationInfoView()->i_draw();
	}

	/*override*/protected function __drawRightSection():void
	{
		//$lFormsView_clss = $this->__getFormsView();
		$lInfosView_clss = $this->_getJOBInfosView();
		//$lInfosView_clss = CJOBInfosView::i_toClassType($lInfosView_clss);
		//$lInfosView_clss->i_getSiteDonationInfoView()->i_draw();
		//$lInfosView_clss->i_getSiteDonationStatsInfoView()->i_draw();
		//$lInfosView_clss->i_getPreviewPrayerInfoView()->i_draw();
		//$lFormsView_clss->i_getUserMessageAdditingFormView()->i_draw();

		//$lPanelsInfoView_clss = $this->_getJOBPanelsInfoView();
		//$lPanelsInfoView_clss->i_getContentAdditionPanelInfoView()->i_draw();
		//$lInfosView_clss->i_getContentGroupRandomPreviewInfoView()->i_draw();
	}

	/*override*/protected function __drawContentSection():void
	{
		$lFormsView_clss = $this->__getFormsView();
		$lInfosView_clss = $this->__getInfosView();
		$lFormsView_clss = CJOBFormsView::i_toClassType($lFormsView_clss);
		$lInfosView_clss = CJOBInfosView::i_toClassType($lInfosView_clss);

		$lAction_str = $this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION);
		if ($lAction_str === CJOBActionConst::i_ACTION_ID_ADD)
		{
			$lFormsView_clss->i_getVacancyContentAdditionFormView()->i_draw();
		}
		else if ($lAction_str === CJOBActionConst::i_ACTION_ID_VIEW)
		{
			$lInfosView_clss->i_getContentInfoView()->i_draw();
		}
	}

	private function _getJOBInfosView():CJOBInfosView
	{
		$lInfosView_clss = $this->__getInfosView();
		return CJOBInfosView::i_toClassType($lInfosView_clss);
	}

	private function _getJOBNavigationsInfoView():CJOBNavigationsInfoView
	{
		$lNavigationsInfoView_clss = $this->_getJOBInfosView()->i_getNavigationsInfoView();
		return CJOBNavigationsInfoView::i_toClassType($lNavigationsInfoView_clss);
	}
}


?>