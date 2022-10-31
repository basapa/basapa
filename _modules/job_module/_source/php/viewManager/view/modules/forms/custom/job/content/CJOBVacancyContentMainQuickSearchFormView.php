<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentMainQuickSearchFormView extends CJOBVacancyContentQuickSearchFormView
{
	//TRANSLATIONS...
	private const _FORM_XML_NODE_ID						= 'vacancy_content_main_quick_search_form';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//PARAMS...
	/*override*/protected function __getFormAction():string
	{
		$lStaticParams_a_arr = [CCRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return self::_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>
