<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


/*virtual override*/class CCAdditionalPagesNavigationInfoView extends CCPagesNavigationInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'additional_pages_navigation_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_additional_pages_navigation_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual override*/protected function __getNavigationPagesIds():array
	{
		$lPageIds_str_arr = parent::__getNavigationPagesIds();
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			$lPageIds_str_arr[] = CCPageConst::i_PAGE_ID_DEBUG;
		}
		return $lPageIds_str_arr;
	}

	//PARAMS...
	/*virtual override*/protected function __getInfoId():string
	{
		return self::_INFO_ID;
	}

	/*virtual override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>