<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBURLRewritingHtaccessController extends CCURLRewritingHtaccessController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __determineStaticGETParamIdByOneParam(array $aStaticGETParamValues_str_arr):array
	{
		return [CCRequestParamConst::i_GET_PARAM_ID_PAGE];
	}

	/*override*/protected function __determineStaticGETParamIdsByTwoParams(array $aStaticGETParamValues_str_arr):array
	{
		$lFirstStaticGETParamValue_str = $aStaticGETParamValues_str_arr[0];
		if ($lFirstStaticGETParamValue_str === CJOBPageConst::i_PAGE_ID_CONTENTS)
		{
			return [CCRequestParamConst::i_GET_PARAM_ID_PAGE, CCRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID];
		}

		/*$lActionIdSuspicion_str = $aStaticGETParamValues_str_arr[1];
		if (CArrayTools::i_isInArray($lActionIdSuspicion_str, CJOBActionConst::i_SUPPORTED_ACTION_IDS))
		{
			return [CCRequestParamConst::i_GET_PARAM_ID_PAGE, CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION];
		}*/

		return [CCRequestParamConst::i_GET_PARAM_ID_PAGE, CCRequestParamConst::i_GET_PARAM_ID_OPT_SUBPAGE];
	}

	/*override*/protected function __determineStaticGETParamIdsByThreeParams(array $aStaticGETParamValues_str_arr):array
	{
		$lFirstStaticGETParamValue_str = $aStaticGETParamValues_str_arr[0];
		if ($lFirstStaticGETParamValue_str === CJOBPageConst::i_PAGE_ID_CONTENTS)
		{
			return [CCRequestParamConst::i_GET_PARAM_ID_PAGE, CCRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID, CCRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID];
		}

		/*$lActionIdSuspicion_str = $aStaticGETParamValues_str_arr[1];
		if (CArrayTools::i_isInArray($lActionIdSuspicion_str, CJOBActionConst::i_SUPPORTED_ACTION_IDS))
		{
			return [CCRequestParamConst::i_GET_PARAM_ID_PAGE, CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION, CCRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_ID];
		}*/

		new CException('__determineStaticGETParamIdsByThreeParams', 'params: ' .CArrayTools::i_toString($aStaticGETParamValues_str_arr), CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);

		return [];
	}
}


?>