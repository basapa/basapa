<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMAuthorizationRequestController extends CCRequestController
{
	private $_fLoginValue_str;
	private $_fPasswordValue_str;
	private $_fRememberMeValue_bl;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __validateFields()
	{
		if (!parent::__validateFields())
		{
			return false;
		}

		$lParams_obj_arr	= array(CRequestControllerBase::PARAM_COMPONENT_ID								=> CFieldIdConst::FORM_AUTHORIZATION_LOGIN,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_FILLING_MODE				=> CFieldRequiredConst::FORM_AUTHORIZATION_LOGIN,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_VALIDATION_PATTERN		=> CRequestControllerBase::COMPONENT_VALUE_VALIDATION_PATTERN_LOGIN,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_PLACEHOLDER				=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT		=> CEventConst::AUTHORIZATION_EVENT_ID_ILLEGAL_CHARS_LOGIN,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT	=> CEventConst::AUTHORIZATION_EVENT_ID_WRONG_CHARS_COUNT_LOGIN,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CFieldLengthConst::MIN_LOGIN,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CFieldLengthConst::FORM_AUTHORIZATION_LOGIN);
		$this->_fLoginValue_str = $this->__getTextfieldComponentValue($lParams_obj_arr);

		$lParams_obj_arr	= array(CRequestControllerBase::PARAM_COMPONENT_ID								=> CFieldIdConst::FORM_AUTHORIZATION_PASSWORD,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_FILLING_MODE				=> CFieldRequiredConst::FORM_AUTHORIZATION_PASSWORD,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_VALIDATION_PATTERN		=> CRequestControllerBase::COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_PLACEHOLDER				=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT		=> CEventConst::AUTHORIZATION_EVENT_ID_ILLEGAL_CHARS_PASSWORD,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT	=> CEventConst::AUTHORIZATION_EVENT_ID_WRONG_CHARS_COUNT_PASSWORD,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CFieldLengthConst::MIN_PASSWORD,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CFieldLengthConst::FORM_AUTHORIZATION_PASSWORD);
		$this->_fPasswordValue_str = $this->__getTextfieldComponentValue($lParams_obj_arr);

		$lParams_obj_arr	= array(CRequestControllerBase::PARAM_COMPONENT_ID						=> CFieldIdConst::FORM_AUTHORIZATION_REMEMBER,
									CRequestControllerBase::PARAM_COMPONENT_VALUE_FILLING_MODE		=> CFieldRequiredConst::FORM_AUTHORIZATION_REMEMBER);
		$this->_fRememberMeValue_bl = $this->__getCheckboxComponentValue($lParams_obj_arr);

		if ($this->__getMandatoryNonFillingFieldsCount() > 0)
		{
			$this->__getMainData()->addEvent(CEventConst::AUTHORIZATION_EVENT_ID_DATA_EMPTY);
			return false;
		}
		
		return $this->__getIncorrectlyFillingFieldsCount() === 0;
	}

	
	protected function __update()
	{
		/*if ($this->__userData()->isLogged())
		{
			$this->__hostData()->addCookie(CMainConst::COOKIE_EVENT_ID, CEventConst::AUTHORIZATION_NEED_LOGOUT);
			$this->__data()->setRedirect(CPageConst::PAGE_MAIN);
		}*/

		$lResult_str = $this->__getDatabaseController()->getUserTableDatabaseController()->getDataByLogin($this->_fLoginValue_str);
		if (!$lResult_str)
		{
			$this->__getMainData()->addEvent(CEventConst::AUTHORIZATION_EVENT_ID_WRONG_DATA);
			return;
		}

		$lResult_arr = $lResult_str[0];

		$lUserId_int = $lResult_arr[CDatabaseConst::TABLE_USER_ID];
		$lUserHash_str = $lResult_arr[CDatabaseConst::TABLE_USER_HASH];
		$lUserPassword_str = $lResult_arr[CDatabaseConst::TABLE_USER_PASSWORD];
		$lUserSecureKey_str = $lResult_arr[CDatabaseConst::TABLE_USER_PASSWORD_KEY];

		if ($lUserPassword_str != CTools::securePassword($this->_fPasswordValue_str, $lUserSecureKey_str))
		{
			$this->__getMainData()->addEvent(CEventConst::AUTHORIZATION_EVENT_ID_WRONG_DATA);
			return;
		}

		$lHostData_clss = $this->__getHostData();
		$lHostData_clss->startSession();
		$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_ID, $lUserId_int);
		$lHostData_clss->insertSessionParam(CMainConst::SESSION_USER_HASH, $lUserHash_str);

		$lLifeTime_int = $this->_fRememberMeValue_bl ? CControlParamConst::LIFE_TIME_COOKIE_DEFAULT : CControlParamConst::LIFE_TIME_NONE;

		$lHostData_clss->insertCookieParam(CMainConst::COOKIE_USER_ID, $lUserId_int, $lLifeTime_int);
		$lHostData_clss->insertCookieParam(CMainConst::COOKIE_USER_HASH, $lUserHash_str, $lLifeTime_int);
		$lHostData_clss->insertCookieParam(CMainConst::COOKIE_EVENT_ID, CEventConst::AUTHORIZATION_EVENT_ID_SUCCESS);

		$lStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID => CPageConst::PAGE_ID_MAIN);
		$this->__getMainData()->setRedirect($lStaticParams_obj_arr);
	}
}


?>
