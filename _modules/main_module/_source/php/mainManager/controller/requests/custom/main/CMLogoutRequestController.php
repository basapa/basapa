<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMLogoutRequestController extends CCRequestController
{
	private $_fHidden_str;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		if (!$this->__validateFieldsRequired())
		{
			$this->__getMainData()->addEvent(CEventConst::LOGOUT_DATA_EMPTY);
			return false;
		}
		
		return $this->__validateFieldsIncorrectlyCount();
	}


	protected function __request()
	{
		$lUserId_int = $this->__getUserData()->getUserId();
		if (!$lUserId_int)
		{
			$this->__getMainData()->addEvent(CEventConst::LOGOUT_FAILED);
			return;
		}

		$this->__fResult_str = $this->__getDatabaseController()->getUserDatabaseController()->getDataById($lUserId_int, '');
		if (!$this->__fResult_str)
		{
			$this->__getMainData()->addEvent(CEventConst::LOGOUT_FAILED);
			return;
		}

		$this->__getHostData()->clearCookie(CMainConst::COOKIE_USER_ID);
		$this->__getHostData()->clearCookie(CMainConst::COOKIE_USER_HASH);
		$this->__getHostData()->clearSessions();

		$this->__getHostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CEventConst::LOGOUT_SUCCESS);
		$this->__getMainData()->setRedirect(CPageConst::PAGE_MAIN);
	}
}


?>
