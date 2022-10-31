<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserRegistrationRequestController extends CCRequestController
{
	static public $i_RESERVED_USER_NAMES				= [	'basapa',
															'administrator',
															'admin',
															'moderator',
															'system',
															'support',
															'promotion',
															'webmaster',
															'user',
															'guest'];

	private const _COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD	= [	self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserRegistrationFormView::i_FORM_COMPONENT_ID_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCUserRegistrationFormView::i_FILLING_MODE_FIELD_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::i_COMPONENT_VALUE_VALIDATION_PATTERN_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_ILLEGAL_CHARS,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_WRONG_CHARS_COUNT,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_EMPTY_DATA,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_LOGIN];

	private const _COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD	= [	self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserRegistrationFormView::i_FORM_COMPONENT_ID_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCUserRegistrationFormView::i_FILLING_MODE_FIELD_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::i_COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_ILLEGAL_CHARS,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_WRONG_CHARS_COUNT,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_EMPTY_DATA,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_PASSWORD];

	private const _COMPONENT_VALIDATION_PARAMS_REPEAT_PASSWORD_TEXTFIELD	= [	self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserRegistrationFormView::i_FORM_COMPONENT_ID_REPEAT_PASSWORD,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCUserRegistrationFormView::i_FILLING_MODE_FIELD_REPEAT_PASSWORD,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::i_COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_REPEAT_PASSWORD_ILLEGAL_CHARS,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_REPEAT_PASSWORD_WRONG_CHARS_COUNT,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_REPEAT_PASSWORD_EMPTY_DATA,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_REPEAT_PASSWORD,
																				self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_REPEAT_PASSWORD];

	private const _COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD	= [	self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserRegistrationFormView::i_FORM_COMPONENT_ID_EMAIL,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCUserRegistrationFormView::i_FILLING_MODE_FIELD_EMAIL,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::i_COMPONENT_VALUE_VALIDATION_PATTERN_EMAIL,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserRegistrationFormView::i_MIN_CHARS_COUNT_FIELD_EMAIL,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserRegistrationFormView::i_MAX_CHARS_COUNT_FIELD_EMAIL];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_REPEAT_PASSWORD_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD];

	private const _COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [];

	private const _COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getFormsMessagesData();
		return $lFormsMessagesData_clss->i_getUserRegistrationFormMessagesData();
	}

	/*override*/protected function __getComponentsValidationsParams():array
	{
		return self::_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getCompositeComponentsValidationsParams():array
	{
		return self::_COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getHiddenComponentValidationParams():array
	{
		return self::_COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD;
	}

	/*override*/protected function __getEmptyDataFormMessageId():int
	{
		return CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lLoginTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD[$lComponentFieldId_str]);
		$lPasswordTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD[$lComponentFieldId_str]);
		$lRepeatPasswordTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_REPEAT_PASSWORD_TEXTFIELD[$lComponentFieldId_str]);
		$lEmailTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD[$lComponentFieldId_str]);

		if ($lPasswordTextfieldComponentValue_str !== $lRepeatPasswordTextfieldComponentValue_str)
		{
			$this->__addFormMessageId(CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_DO_NOT_MATCH_PASSWORDS);
			return;
		}

		$lUsersTableDatabaseController_clss =  $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController()->i_getMySQLDatabaseUsersTableController();
		$lUsersTableDatabaseController_clss->i_retrieveUsersDataByLogin($lLoginTextfieldComponentValue_str, [CCUsersTableData::i_TABLE_FIELD_ID]);
		$lUsersTableDatabaseController_clss->i_retrieveUsersDataByEmail($lEmailTextfieldComponentValue_str);

		$lDatabaseData_clss = $this->__getDatabaseData();

		if ($lDatabaseData_clss->i_getUsersTableQueriesData()->i_isSelectDataByLoginDefined())
		{
			$this->__addFormMessageId(CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_ALREADY_EXIST);
			return;
		}

		if ($lDatabaseData_clss->i_getUsersTableQueriesData()->i_isSelectDataByEmailDefined())
		{
			$this->__addFormMessageId(CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ALREADY_EXIST);
			return;
		}

		$lPasswordKey_str = CStringTools::i_generateUniqueStringId();
		//$lVerificationKey_str = CVerificationConst::USER_EMAIL_VERIFICATION. '-' .CTools::generateNewPassword();
		$lCurrentTimeInSec_int = CDateTimeTools::i_getCurrentUTimeInSec();
		//$lState_int = CControlParamConst::USER_STATE_EMAIL_VERIFICATION_WAITING;

		$lParams_obj_arr	= [	CCUsersTableData::i_TABLE_FIELD_LOGIN 							=> $lLoginTextfieldComponentValue_str,
								CCUsersTableData::i_TABLE_FIELD_PASSWORD 						=> CEncryptionTools::i_encryptValue($lPasswordTextfieldComponentValue_str . $lPasswordKey_str),
								CCUsersTableData::i_TABLE_FIELD_EMAIL 							=> $lEmailTextfieldComponentValue_str,
								CCUsersTableData::i_TABLE_FIELD_LAST_VISIT_TIME					=> $lCurrentTimeInSec_int,
								CCUsersTableData::i_TABLE_FIELD_PASSWORD_KEY 					=> $lPasswordKey_str,
								CCUsersTableData::i_TABLE_FIELD_LAST_IP_ADDRESS 				=> $this->__getMainData()->i_getHostData()->i_getServerParamRemoteAddr(),
								CCUsersTableData::i_TABLE_FIELD_PASSWORD_HASH					=> CStringTools::i_generateUniqueStringId()/*,
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
								CDatabaseConst::TABLE_USER_VIEWS 							=> 0*/];

		$lUsersTableDatabaseController_clss->i_addUserData($lParams_obj_arr);

		if (!$lDatabaseData_clss->i_getUsersTableQueriesData()->i_getSelectDataByEmail())//----
		{
			$this->__addFormMessageId(CCUserRegistrationFormMessagesData::i_FORM_MESSAGE_ID_FAILED);
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
		{
			$this->__getHostData()->setCookieParam(CMainConst::COOKIE_EVENT_ID, CEventConst::REGISTRATION_EVENT_ID_SUCCESS);
			$this->__getMainData()->setRedirect(CPageConst::PAGE_ID_MAIN);
		//}*/
	}

	/*private function _validateLoginTextfieldComponentValue($aLoginTextfieldComponentValue_str)
	{
		$aLoginTextfieldComponentValue_str = CTools::convertToLowercase($aLoginTextfieldComponentValue_str);

		if (in_array($aLoginTextfieldComponentValue_str, CMRegistrationRequestController::$RESERVED_USER_NAMES))
		{
			$this->__getMainData()->addEvent(CEventConst::REGISTRATION_EVENT_ID_USER_ALREADY_EXIST);

			return false;
		}

		return true;
	}*/
}


?>