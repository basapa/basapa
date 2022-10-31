<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CJOBContentsNavigationInfoView extends CCContentsNavigationInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'job_contents_navigation_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_contents_navigation_info css_rounded_high';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getMaxContentPagesCount():int
	{
		$lMaxContentsDisplayCountOnPage_int = $this->__getUserData()->i_getMaxContentsDisplayCountOnPage();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		return CMathTools::i_ceil($lDatabaseData_clss->i_getContentTableQueriesData()->___getSelectContentDataCountByGETParams() / $lMaxContentsDisplayCountOnPage_int);
	}

	//PARAMS...
	/*override*/protected function __getInfoId():string
	{
		return self::_INFO_ID;
	}

	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>