<?php


namespace basapa_ns;


class CMError404ResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		$this->__getMainData()->i_setHttpHeader(CMainConst::i_HEADER_TYPE_NOT_FOUND);

		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $lMainData_clss->getParam(CParamConst::PAGE);
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