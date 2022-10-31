<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserAuthorizationResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		/*if ($this->__getUserData()->isLogged())
		{
			$this->__getHostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CEventConst::REGISTRATION_NEED_LOGOUT);
			$this->__getMainData()->setRedirect(CPageConst::PAGE_ID_MAIN);
		}*/

		parent::__update();

	/*	if ($this->__getUserData()->i_isLogged())
		{
			$this->__getHostData()->i_insertCookieParam(CMainConst::i_COOKIE_EVENT_ID, CEventConst::i_AUTHORIZATION_EVENT_ID_NEED_LOGOUT);
			$this->__getMainData()->i_setRedirect(CPageConst::i_PAGE_ID_MAIN);
		}

		$lGETParams_obj_arr	= array(CParamConst::i_SITE_ID		=> true,
									CParamConst::i_PAGE_ID		=> true,
									CParamConst::i_ACTION_ID		=> true,
									CParamConst::SEARCHING_CITY => true);
		//$this->__validateGETParamsByPage($lGETParams_obj_arr);

		parent::__update();*/
	}
}


?>