<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCCitySelectPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		$lSupportedGetParams_str_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE,
											CCRequestParamConst::i_GET_PARAM_ID_PAGE,
											CCRequestParamConst::i_GET_PARAM_ID_LANG];
		$this->__validateSupportedGETParams($lSupportedGetParams_str_arr);

		$lHostData_clss = $this->__getMainData()->i_getHostData();
		$lHostData_clss->i_setHttpHeader(CHostData::i_HEADER_TYPE_OK);

		/*$lValidGETParams_str_arr 	= array(CParamConst::i_SITE 			=> true,
											CParamConst::i_PAGE 			=> true,
											CParamConst::i_ACTION 		=> true,
											CParamConst::i_SEARCHING_CITY => true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		parent::__update();

		$lCityId_int = $this->__getMainData()->i_getParam(CParamConst::i_CITY_ID);
		if ($lCityId_int)
		{
			$this->__getHostData()->i_addCookie(CMainConst::i_COOKIE_USER_CITY_ID, $lCityId_int, CControlParamConst::i_LIFE_TIME_ONE_YEAR);
			$this->__getMainData()->i_setRedirect(CPageConst::i_PAGE_MAIN);
		}
		else
		{
			$this->__getRegionResponseController()->i_getData();
			$this->__getCityResponseController()->i_getDataByType(CControlParamConst::i_CITY_TYPE_CAPITAL);
		}*/
	}
}


?>