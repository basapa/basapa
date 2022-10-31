<?php


namespace basapa_ns;


class CMError403ResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		$this->__getMainData()->i_setHttpHeader(CMainConst::i_HEADER_TYPE_FORBIDDEN);

		/*$lGETParams_obj_arr	= array(CParamConst::SITE_ID	=> true,
									CParamConst::PAGE_ID	=> true);
		$this->__validateGETParamsByPage($lGETParams_obj_arr);*/

		/*$lMainData_clss = $this->__getMainData();
		$lPageId_str = $lMainData_clss->getParam(CParamConst::PAGE_ID);
		switch ($lPageId_str)
		{
			case CPageConst::PAGE_ID_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ID_ERROR_403:
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