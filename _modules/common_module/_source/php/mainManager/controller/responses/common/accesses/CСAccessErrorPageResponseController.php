<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCAccessErrorResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __update():void
	{
		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $this->__getMainData()->getParam(CParamConst::PAGE);
		switch ($lPage_str)
		{
			case CPageConst::PAGE_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ERROR_403:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_403);
			}break;


			default:
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			break;
		}*/
	}
}


?>