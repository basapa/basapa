<?php


namespace basapa_ns;


class CMRegistrationResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		/*if ($this->__getUserData()->isLogged())
		{
			$this->__getHostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CEventConst::REGISTRATION_NEED_LOGOUT);
			$this->__getMainData()->setRedirect(CPageConst::PAGE_ID_MAIN);
		}*/

		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE_ID 			=> true,
											CParamConst::PAGE_ID 			=> true,
											CParamConst::ACTION_ID 		=> true,
											CParamConst::SEARCHING_CITY => true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);
*/
		parent::__update();
	}
}


?>