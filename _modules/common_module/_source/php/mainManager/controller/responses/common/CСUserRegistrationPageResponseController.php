<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserRegistrationPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		parent::__update();
		
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
	//	parent::__update();
	}
}


?>