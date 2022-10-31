<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentsPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawHeaderSection():void
	{
		parent::__drawHeaderSection();

		$lFormsView_clss = $this->_getJOBFormsView();
		$lFormsView_clss->i_getVacancyContentQuickSearchFormView()->i_draw();
	}

	/*override*/protected function __drawLeftSection():void
	{
		$lFormsView_clss = $this->_getJOBFormsView();
		$lFormsView_clss->i_getVacancyContentFilteringFormView()->i_draw();
	}

	/*override*/protected function __drawRightSection():void
	{
		//$lFormsView_clss = $this->__getFormsView();
		//$lInfosView_clss = $this->_getJOBInfosView();
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
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		if ($lDatabaseData_clss->i_getContentTableQueriesData()->___areSelectContentDataByGETParamsDefined())
		{
			$lInfosView_clss = $this->_getJOBInfosView();
			$lNavigationsInfoView_clss = $this->_getJOBNavigationsInfoView();
			//$ContentTableQueriesData_clss = $lDatabaseData_clss->i_getContentTableQueriesData();

			$lContentTableSelectData_clss_arr = $lDatabaseData_clss->i_getContentTableQueriesData()->___getSelectContentDataByGETParams();
			$lInfosView_clss->i_getContentsPreviewsInfoView()->i_draw([CJOBContentsPreviewsInfoView::i_PARAM_ID_JOB_CONTENT_TABLE_DATA => $lContentTableSelectData_clss_arr]);

			//if ($ContentTableQueriesData_clss->i_getContentDataCountByGETParams() > 1)
			//{
				$lNavigationsInfoView_clss->i_getContentsNavigationInfoView()->i_draw();
		//	}
		}
		else
		{
			//TODO
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

	private function _getJOBFormsView():CJOBFormsView
	{
		$lFormsView_clss = $this->__getFormsView();
		return CJOBFormsView::i_toClassType($lFormsView_clss);
	}
}


?>