<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CJOBPagesNavigationInfoView extends CCPagesNavigationInfoView
{
	//CSS...
	private const _CSS_INFO								= 'css_job_pages_navigation_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getNavigationPagesIds():array
	{
		$lPageIds_str_arr = parent::__getNavigationPagesIds();
		$lPageIds_str_arr[] = CJOBPageConst::i_PAGE_ID_MAIN;
		$lPageIds_str_arr[] = CJOBPageConst::i_PAGE_ID_CONTENTS;
		return $lPageIds_str_arr;
	}

	//PARAMS...
	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>