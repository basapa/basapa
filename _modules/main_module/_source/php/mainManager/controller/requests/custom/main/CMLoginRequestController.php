<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMLoginRequestController extends CCRequestController
{
	private $_fLogin_str;
	private $_fPassword_str;
	private $_fRemember_int;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		$this->__fParams_arr 	= array(CRequestControllerBase::PARAM_TRANSMIT 				=> CTransmitConst::FORM_LOGIN_LOGIN,
										CRequestControllerBase::PARAM_REQUIRED 				=> CFieldRequiredConst::FORM_LOGIN_LOGIN,
										CRequestControllerBase::PARAM_PATTERN 				=> CRequestControllerBase::VALIDATE_FIELD_LOGIN,
										CRequestControllerBase::PARAM_PLACEHOLDER 			=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CRequestControllerBase::PARAM_EVENT_ILLEGAL_CHARS 	=> CEventConst::LOGIN_EVENT_ID_ILLEGAL_LOGIN_CHARS,
										CRequestControllerBase::PARAM_EVENT_WRONG_LENGTH		=> CEventConst::LOGIN_EVENT_ID_WRONG_LOGIN_LENGTH,
										CRequestControllerBase::PARAM_LENGTH_MIN				=> CFieldLengthConst::MIN_LOGIN,
										CRequestControllerBase::PARAM_LENGTH_MAX				=> CFieldLengthConst::FORM_LOGIN_LOGIN);
		$this->_fLogin_str = $this->__validateTextField();

		$this->__fParams_arr 	= array(CRequestControllerBase::PARAM_TRANSMIT 				=> CTransmitConst::FORM_LOGIN_PASSWORD,
										CRequestControllerBase::PARAM_REQUIRED 				=> CFieldRequiredConst::FORM_LOGIN_PASSWORD,
										CRequestControllerBase::PARAM_PATTERN 				=> CRequestControllerBase::VALIDATE_FIELD_PASSWORD,
										CRequestControllerBase::PARAM_PLACEHOLDER 			=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
										CRequestControllerBase::PARAM_EVENT_ILLEGAL_CHARS 	=> CEventConst::LOGIN_ILLEGAL_CHARS_PASSWORD,
										CRequestControllerBase::PARAM_EVENT_WRONG_LENGTH		=> CEventConst::LOGIN_WRONG_LENGTH_PASSWORD,
										CRequestControllerBase::PARAM_LENGTH_MIN				=> CFieldLengthConst::MIN_PASSWORD,
										CRequestControllerBase::PARAM_LENGTH_MAX				=> CFieldLengthConst::FORM_LOGIN_PASSWORD);
		$this->_fPassword_str = $this->__validateTextField();

		$this->__fParams_arr 	= array(CRequestControllerBase::PARAM_TRANSMIT 			=> CTransmitConst::FORM_LOGIN_REMEMBER,
										CRequestControllerBase::PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_LOGIN_REMEMBER);
		$this->_fRemember_int = $this->__validateCheckBox();

		if (!$this->__validateFieldsRequired())
		{
			$this->__getHostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CEventConst::LOGIN_DATA_EMPTY);
			$this->__getMainData()->setRedirect(CPageConst::PAGE_AUTHORIZATION);
		}
		
		return $this->__validateFieldsIncorrectlyCount();
	}
	

	protected function __request()
	{
		$this->__fResult_str = $this->__getDatabaseController()->getUserDatabaseController()->getDataByLogin($this->_fLogin_str, '');
		if (!$this->__fResult_str)
		{
			$this->__getMainData()->addEvent(CEventConst::LOGIN_WRONG_DATA);
			return;
		}

		$lResult_arr = $this->__fResult_str[0];

		$lUserId_int = $lResult_arr[CDatabaseConst::TABLE_USER_ID];
		$lUserHash_str = $lResult_arr[CDatabaseConst::TABLE_USER_HASH];
		$lUserPassword_str = $lResult_arr[CDatabaseConst::TABLE_USER_PASSWORD];
		$lUserSecureKey_str = $lResult_arr[CDatabaseConst::TABLE_USER_PASSWORD_KEY];

		if ($lUserPassword_str != CTools::securePassword($this->_fPassword_str, $lUserSecureKey_str))
		{
			$this->__getMainData()->addEvent(CEventConst::LOGIN_WRONG_DATA);
			return;
		}

		$this->__getHostData()->startSession();
		$this->__getHostData()->addSession(CMainConst::SESSION_USER_ID, $lUserId_int);
		$this->__getHostData()->addSession(CMainConst::SESSION_USER_HASH, $lUserHash_str);

		$this->__getUserData()->updateData($lResult_arr);

		$lLifeTime_int = $this->_fRemember_int ? CControlParamConst::LIFE_TIME_COOKIE_DEFAULT : CControlParamConst::LIFE_TIME_NONE;
		$this->__getHostData()->addCookie(CMainConst::COOKIE_USER_ID, $lUserId_int, $lLifeTime_int);
		$this->__getHostData()->addCookie(CMainConst::COOKIE_USER_HASH, $lUserHash_str, $lLifeTime_int);

		$this->__getMainData()->addEvent(CEventConst::LOGIN_SUCCESS);

		if ($this->__getUserData()->isAccessDenied())
		{
			$this->__getMainData()->setRedirect(CPageConst::PAGE_ACCESS_DENIED);
		}
	}
}


?>
