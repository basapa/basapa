<?php


namespace basapa_ns;


class CMAuthorizationResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		if ($this->__getUserData()->i_isLogged())
		{
			$this->__getHostData()->i_insertCookieParam(CMainConst::i_COOKIE_EVENT_ID, CEventConst::i_AUTHORIZATION_EVENT_ID_NEED_LOGOUT);
			$this->__getMainData()->i_setRedirect(CPageConst::i_PAGE_ID_MAIN);
		}

		$lGETParams_obj_arr	= array(CParamConst::i_SITE_ID		=> true,
									CParamConst::i_PAGE_ID		=> true,
									CParamConst::i_ACTION_ID		=> true/*,
									CParamConst::SEARCHING_CITY => true*/);
		//$this->__validateGETParamsByPage($lGETParams_obj_arr);

		parent::__update();
	}
}


?>