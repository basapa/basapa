<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentsAdministrationPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawContentSection():void
	{
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		if ($lDatabaseData_clss->i_getContentTableQueriesData()->___areSelectContentDataByGETParamsDefined())
		{
			$lFormsView_clss = $this->_getJOBFormsView();
			$lNavigationsInfoView_clss = $this->_getJOBNavigationsInfoView();
			//$ContentTableQueriesData_clss = $lDatabaseData_clss->i_getContentTableQueriesData();

			$lContentTableSelectData_clss_arr = $lDatabaseData_clss->i_getContentTableQueriesData()->___getSelectContentDataByGETParams();
			$lFormsView_clss->i_getContentAdministrationFormView()->i_draw([CJOBContentsAdministrationFormView::i_PARAM_ID_JOB_CONTENT_TABLE_DATA => $lContentTableSelectData_clss_arr]);

			//if ($ContentTableQueriesData_clss->i_getContentDataCountByGETParams() > 1)
			//{
			$lNavigationsInfoView_clss->i_getContentNavigationInfoView()->i_draw();
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