<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMRegistrationRequestController extends CCRequestController
{
	public static $RESERVED_USER_NAMES					= array('basapa',
																'administrator',
																'admin',
																'moderator',
																'system',
																'support',
																'promotion',
																'webmaster',
																'user',
																'guest');

	public static $COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD	= array(CCRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CFieldIdConst::FORM_REGISTRATION_LOGIN,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CFieldRequiredConst::FORM_REGISTRATION_LOGIN,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::COMPONENT_VALUE_VALIDATION_PATTERN_LOGIN,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_PLACEHOLDER					=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CEventConst::REGISTRATION_EVENT_ID_LOGIN_ILLEGAL_CHARS,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CEventConst::REGISTRATION_EVENT_ID_LOGIN_WRONG_CHARS_COUNT,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_DATA_EMPTY_EVENT_ID			=> CEventConst::REGISTRATION_EVENT_ID_LOGIN_DATA_EMPTY,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CFieldLengthConst::MIN_LOGIN,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CFieldLengthConst::FORM_REGISTRATION_LOGIN);

	public static $COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD	= array(CCRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CFieldIdConst::FORM_REGISTRATION_PASSWORD,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CFieldRequiredConst::FORM_REGISTRATION_PASSWORD,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_PLACEHOLDER					=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CEventConst::REGISTRATION_EVENT_ID_PASSWORD_ILLEGAL_CHARS,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CEventConst::REGISTRATION_EVENT_ID_PASSWORD_WRONG_CHARS_COUNT,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_DATA_EMPTY_EVENT_ID			=> CEventConst::REGISTRATION_EVENT_ID_PASSWORD_DATA_EMPTY,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CFieldLengthConst::MIN_PASSWORD,
																			CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CFieldLengthConst::FORM_REGISTRATION_PASSWORD);

	public static $COMPONENT_VALIDATION_PARAMS_REPEAT_PASSWORD_TEXTFIELD	= array(CCRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CFieldIdConst::FORM_REGISTRATION_REPEAT_PASSWORD,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CFieldRequiredConst::FORM_REGISTRATION_REPEAT_PASSWORD,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_PLACEHOLDER					=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CEventConst::REGISTRATION_EVENT_ID_REPEAT_PASSWORD_ILLEGAL_CHARS,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CEventConst::REGISTRATION_EVENT_ID_REPEAT_PASSWORD_WRONG_CHARS_COUNT,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_DATA_EMPTY_EVENT_ID			=> CEventConst::REGISTRATION_EVENT_ID_REPEAT_PASSWORD_DATA_EMPTY,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CFieldLengthConst::MIN_PASSWORD,
																					CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CFieldLengthConst::FORM_REGISTRATION_REPEAT_PASSWORD);

	public static $COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD	= array(CCRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CFieldIdConst::FORM_REGISTRATION_EMAIL,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CFieldRequiredConst::FORM_REGISTRATION_EMAIL,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::COMPONENT_VALUE_VALIDATION_PATTERN_EMAIL,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_PLACEHOLDER					=> CFieldPlaceholderConst::PLACEHOLDER_NONE,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CEventConst::REGISTRATION_EVENT_ID_INVALID_EMAIL,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CEventConst::REGISTRATION_EVENT_ID_INVALID_EMAIL,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_DATA_EMPTY_EVENT_ID			=> CEventConst::REGISTRATION_EVENT_ID_EMAIL_DATA_EMPTY,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CFieldLengthConst::MIN_EMAIL,
																		CCRequestController::COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CFieldLengthConst::FORM_REGISTRATION_EMAIL);


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __validateComponents()
	{
		return parent::__validateComponents()
				&& $this->__validateTextfieldComponent(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD)
				&& $this->__validateTextfieldComponent(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD)
				&& $this->__validateTextfieldComponent(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_REPEAT_PASSWORD_TEXTFIELD)
				&& $this->__validateTextfieldComponent(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD);
	}

	protected function __update()
	{
		$lComponentFieldId_str = CCRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lLoginTextfieldComponentValue_str = $this->__getPostRequestComponentValue(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD[$lComponentFieldId_str]);
		$lPasswordTextfieldComponentValue_str = $this->__getPostRequestComponentValue(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD[$lComponentFieldId_str]);
		$lRepeatPasswordTextfieldComponentValue_str = $this->__getPostRequestComponentValue(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_REPEAT_PASSWORD_TEXTFIELD[$lComponentFieldId_str]);
		$lEmailTextfieldComponentValue_str = $this->__getPostRequestComponentValue(CMRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD[$lComponentFieldId_str]);

		if ($lPasswordTextfieldComponentValue_str !== $lRepeatPasswordTextfieldComponentValue_str)
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_EVENT_ID_DO_NOT_MATCH_PASSWORDS);

			return;
		}

		$lUsersTableDatabaseController_clss =  $this->__getDatabaseController()->getUsersTableDatabaseController();

		$lQueryResult_obj_arr = $lUsersTableDatabaseController_clss->getUserDataByLogin($lLoginTextfieldComponentValue_str);
		if ($lQueryResult_obj_arr)
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_EVENT_ID_USER_ALREADY_EXIST);

			return;
		}

		$lQueryResult_obj_arr = $lUsersTableDatabaseController_clss->getUserDataByEmail($lEmailTextfieldComponentValue_str);
		if ($lQueryResult_obj_arr)
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_EVENT_ID_USER_EMAIL_ALREADY_EXIST);

			return;
		}

		$lPasswordKey_str = CTools::generateSecureKey();
		//$lVerificationKey_str = CVerificationConst::USER_EMAIL_VERIFICATION. '-' .CTools::generateNewPassword();
		$lCurrentTimeInSec_int = CDateTimeTools::getCurrentTimeInSec();
		//$lState_int = CControlParamConst::USER_STATE_EMAIL_VERIFICATION_WAITING;

		$lParams_obj_arr	= array(CDatabaseConst::TABLE_USER_LOGIN 							=> $lLoginTextfieldComponentValue_str,
									CDatabaseConst::TABLE_USER_PASSWORD 						=> CTools::securePassword($lPasswordTextfieldComponentValue_str, $lPasswordKey_str),
									CDatabaseConst::TABLE_USER_EMAIL 							=> $lEmailTextfieldComponentValue_str,
									CDatabaseConst::TABLE_USER_LAST_VISIT_TIME					=> $lCurrentTimeInSec_int,
									CDatabaseConst::TABLE_USER_PASSWORD_KEY 					=> $lPasswordKey_str,
									CDatabaseConst::TABLE_USER_IP_ADDRESS 						=> $this->__getHostData()->getServerParamValueRemoteAddr(),
									CDatabaseConst::TABLE_USER_HASH								=> CTools::generateHash()//,
									/*CDatabaseConst::TABLE_USER_JOB_USER_ID		 				=> 0,
									CDatabaseConst::TABLE_USER_VERIFICATION_KEY 				=> $lVerificationKey_str,
									CDatabaseConst::TABLE_USER_VERIFICATION_KEY_RELEASE_TIME 	=> $lTime_int,
									CDatabaseConst::TABLE_USER_VERIFICATION_KEY_EXPIRING_TIME 	=> 0,
									CDatabaseConst::TABLE_USER_RELEASE_TIME 					=> $lTime_int,
									CDatabaseConst::TABLE_USER_UPDATING_TIME 					=> 0,
									CDatabaseConst::TABLE_USER_EDITING_TIME						=> 0,
									CDatabaseConst::TABLE_USER_TYPE 							=> CControlParamConst::USER_TYPE_REGISTERED,
									CDatabaseConst::TABLE_USER_PREV_TYPE 						=> CControlParamConst::USER_TYPE_UNKNOWN,
									CDatabaseConst::TABLE_USER_STATE 							=> $lState_int,
									CDatabaseConst::TABLE_USER_PREV_STATE 						=> CControlParamConst::USER_STATE_UNKNOWN,
									CDatabaseConst::TABLE_USER_STATUS 							=> CControlParamConst::USER_STATUS_UNKNOWN,
									CDatabaseConst::TABLE_USER_PREV_STATUS 						=> CControlParamConst::USER_STATUS_UNKNOWN,
									CDatabaseConst::TABLE_USER_STATE_EXPIRING_TIME 				=> $lTime_int + CControlParamConst::$USER_STATES_LIFE_TIMES[$lState_int],
									CDatabaseConst::TABLE_USER_STATE_UPDATING_TIME 				=> 0,
									CDatabaseConst::TABLE_USER_STATUS_EXPIRING_TIME 			=> 0,
									CDatabaseConst::TABLE_USER_STATUS_UPDATING_TIME 			=> 0,
									CDatabaseConst::TABLE_USER_TYPE_UPDATING_TIME 				=> 0,
									CDatabaseConst::TABLE_USER_VIEWS 							=> 0*/);

		$lQueryResult_obj_arr = $lUsersTableDatabaseController_clss->addUserData($lParams_obj_arr);
		if (!$lQueryResult_obj_arr)
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_EVENT_ID_FAILED);
			return;
		}

		/*$lVerificationKey_str .= '-' .$lResult_str;

		$lStaticParams_arr 	= array(CParamConst::SITE => CSiteConst::SITE_MAIN,
									CParamConst::PAGE => CPageConst::PAGE_VERIFICATION);
		$lDynamicParams_arr = array(CParamConst::ID => $lVerificationKey_str);
		$lHref_str = CURLConversion::getRealURLByParams($lStaticParams_arr, $lDynamicParams_arr);

		$lMessage_str = str_replace(CViewConst::REPLACE_NAME, SITE_NAME, CViewConst::REGISTRATION_EMAIL_VERIFICATION_MESSAGE_DESCRIPTION);
		$lMessage_str = str_replace(CViewConst::REPLACE_HREF, $lHref_str, $lMessage_str);

		if (!CTools::sendMail($this->_fEmail_str, CMainConst::SITE_SYSTEM_EMAIL, CViewConst::REGISTRATION_EMAIL_VERIFICATION_MESSAGE_NAME, $lMessage_str))
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_FAILED);
		}
		else
		{*/
			$this->__getHostData()->setCookieParam(CMainConst::COOKIE_EVENT_ID, CEventConst::REGISTRATION_EVENT_ID_SUCCESS);
			$this->__getMainData()->setRedirect(CPageConst::PAGE_ID_MAIN);
		//}
	}

	private function _validateLoginTextfieldComponentValue($aLoginTextfieldComponentValue_str)
	{
		$aLoginTextfieldComponentValue_str = CTools::convertToLowercase($aLoginTextfieldComponentValue_str);

		if (in_array($aLoginTextfieldComponentValue_str, CMRegistrationRequestController::$RESERVED_USER_NAMES))
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_EVENT_ID_USER_ALREADY_EXIST);

			return false;
		}

		return true;
	}
}


?>