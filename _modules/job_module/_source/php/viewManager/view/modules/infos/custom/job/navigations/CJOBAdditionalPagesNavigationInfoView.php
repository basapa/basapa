<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBAdditionalPagesNavigationInfoView extends CCAdditionalPagesNavigationInfoView
{
	//CSS...
	private const _CSS_INFO								= 'css_job_additional_pages_navigation_info';
	//...CSS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getNavigationPagesIds():array
	{
		return parent::__getNavigationPagesIds();
	}

	//PARAMS...
	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>