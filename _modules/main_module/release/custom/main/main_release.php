<?php declare(strict_types = 1); namespace basapa_ns; 
/*
IMPORT_PRIORITY:9
*/



class CMTranslationXmlFileNodesFullName extends CCTranslationXmlFileNodesFullName
{
	public const i_MAIN_PAGE_NODE_FULL_NAME					= 'translations/pages/main_page';

	//const LOGIN_FORM_NODE_FULL_NAME						= 'translation/forms/login_form';
	//const AUTHORIZATION_FORM_NODE_FULL_NAME				= 'translation/forms/authorization_form';
	//const REGISTRATION_FORM_NODE_FULL_NAME				= 'translation/forms/registration_form';

	//const ACCESS_RESTRICTION_MESSAGE_NODE_FULL_NAME		= 'translation/infos/messages/access_restriction_message';
	//const ACCESS_REQUIREMENT_MESSAGE_NODE_FULL_NAME		= 'translation/infos/messages/access_requirement_message';
	//const ACCESS_ERROR_MESSAGE_NODE_FULL_NAME			= 'translation/infos/messages/access_error_message';
	//const ACCESS_PROHIBITION_MESSAGE_NODE_FULL_NAME		= 'translation/infos/messages/access_prohibition_message';
	//const ERROR_403_MESSAGE_NODE_FULL_NAME				= 'translation/infos/messages/error_403_message';
	//const ERROR_404_MESSAGE_NODE_FULL_NAME				= 'translation/infos/messages/error_404_message';
}



/*
IMPORT_PRIORITY:9
*/



class CMXmlFileData extends CCXmlFileData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMSessionData extends CCSessionData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



final class CMScheduleData extends CCScheduleData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMUserData extends CCUserData
{
	private $_fUserHash_str = '';
	private $_fUserId_int = 0;
	private $_fUserLogin_str = '';
	private $_fUserType_int = CControlParamConst::i_USER_TYPE_UNKNOWN;
	private $_fUserState_int = CControlParamConst::i_USER_STATE_UNKNOWN;


	/***************************************************
	 * INTERFACE
	 */

	public function i_isLogged()
	{
		return $this->i_getUserId() > 0;
	}

	public function updateData($aData_obj_arr)
	{
		$this->_updateData($aData_obj_arr);
	}

	public function i_getUserHash()
	{
		return $this->_fUserHash_str;
	}

	public function i_getUserId()
	{
		return $this->_fUserId_int;
	}

	public function i_getUserLogin()
	{
		return $this->_fUserLogin_str;
	}

	public function i_getUserType()
	{
		return $this->_fUserType_int;
	}

	public function i_getUserState()
	{
		return $this->_fUserState_int;
	}

	public function i_isAccessDenied()
	{
		return $this->i_getUserState() == CControlParamConst::i_USER_STATE_BANNED;
	}

	public function i_isAdmin()
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_ADMIN;
	}

	public function i_isModerator()
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_MODERATOR;
	}

	public function i_isTrusted()
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_TRUSTED;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _updateData($aData_obj_arr)
	{
		if (empty($aData_obj_arr[CMainConst::i_SESSION_USER_HASH])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_ID])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_LOGIN])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_TYPE])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_STATE]))
		{
			new CException(CException::i_ERROR_TYPE_INTERNAL_LOGIC_ERROR, '_updateData');
		}

		$this->_fUserHash_str = $aData_obj_arr[CMainConst::i_SESSION_USER_HASH];
		$this->_fUserId_int = $aData_obj_arr[CMainConst::i_SESSION_USER_ID];
		$this->_fUserLogin_str = $aData_obj_arr[CMainConst::i_SESSION_USER_LOGIN];
		$this->_fUserType_int = $aData_obj_arr[CMainConst::i_SESSION_USER_TYPE];
		$this->_fUserState_int = $aData_obj_arr[CMainConst::i_SESSION_USER_STATE];
	}
}



/*
IMPORT_PRIORITY:9
*/



final class CMSchedulesController extends CCSchedulesController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_request()
	{
		/*$lRequest_str = $this->_getScheduleData()->request();
		switch ($lRequest_str)
		{
			case CScheduleConst::REQUEST_JOB_VACANCY:
			case CScheduleConst::REQUEST_JOB_RESUME:
			case CScheduleConst::REQUEST_JOB_COMPANY:
			case CScheduleConst::REQUEST_JOB_ADVERTISEMENT:
			{
				$this->_getPatternSchedulesController()->request();
			}break;
		}*/
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



final class CMScheduleConst extends CCScheduleConst
{
	/****************************************************
	 * ACTIONS
	 */
	//const ACTION_CONFIRM_VERIFICATION_KEY				= 'confirm_verification_key';
	public const i_ACTION_SET_DEACTIVATED_STATE			= 'set_deactivated_state';
	public const i_ACTION_ADD_DATA_TO_SITEMAP			= 'add_data_to_sitemap';
	public const i_ACTION_GENERATE_DATA_TO_SITEMAP		= 'generate_data_to_sitemap';


	/****************************************************
	 * TIME LABELS
	 */
	public const i_TIME_LABEL_SITEMAP_UPDATING			= 4;


	/****************************************************
	 * PARAMS
	 */


	/********************************************************************************************************
	 * COMMON REQUESTS
	 */
	public const i_REQUEST_USER							= 'request_user';

	public static $i_COMMON_REQUESTS					= [CScheduleConst::i_REQUEST_USER];


	/********************************************************************************************************
	 * CUSTOM JOB REQUESTS
	 */
	public const i_REQUEST_JOB_VACANCY					= 'request_job_vacancy';
	public const i_REQUEST_JOB_RESUME					= 'request_job_rezume';
	public const i_REQUEST_JOB_COMPANY					= 'request_job_company';
	public const i_REQUEST_JOB_ADVERTISEMENT			= 'request_job_advertisement';

	public static $i_CUSTOM_JOB_REQUESTS				= [	CScheduleConst::i_REQUEST_JOB_VACANCY,
															CScheduleConst::i_REQUEST_JOB_RESUME,
															CScheduleConst::i_REQUEST_JOB_COMPANY,
															CScheduleConst::i_REQUEST_JOB_ADVERTISEMENT];
}



/*
IMPORT_PRIORITY:9
*/



class CMViewConst extends CCViewConst
{
}



/*
IMPORT_PRIORITY:9
*/



class CMViewData extends CCViewData
{
	private $_fSectionsIds_int_arr_arr;

	/***************************************************
	 * INTERFACE
	 */

	public function getSectionsIds($aPageId_str)
	{
		return $this->_getSectionsIds($aPageId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getSectionsIds($aPageId_str)
	{
		return isset($this->_fSectionsIds_int_arr_arr[$aPageId_str]) ? $this->_fSectionsIds_int_arr_arr[$aPageId_str] : $this->_initSectionsIds($aPageId_str);
	}

	private function _initSectionsIds($aPageId_str)
	{
		$lSectionsIds_int_arr = null;

		switch ($aPageId_str)
		{
			case CMPageConst::PAGE_ID_MAIN:
			{
				$lSectionsIds_int_arr	= array(CViewsConst::SECTION_ID_HEADER,
												CViewsConst::SECTION_ID_CONTENT,
												CViewsConst::SECTION_ID_FOOTER);
			}break;

			default:
				new CException('_initSectionsIds', 'Invalid page id: ' .$aPageId_str);
			break;
		}

		$this->_fSectionsIds_int_arr_arr[$aPageId_str] = $lSectionsIds_int_arr;
		return $lSectionsIds_int_arr;
	}
}



/*
IMPORT_PRIORITY:9
*/



class CMLabellistComponentData extends CCLabellistComponentData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMCookieData extends CCCookieData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMJsFileConst
{
	public const i_RELEASE_DIRECTORY_NAME				= '/release/custom/main/';
	public const i_RELEASE_FILE_NAME					= 'main_release.js';

	public const i_DEBUG_DIRECTORY_NAME					= '/_source/js/custom/main/';
	public const i_DEBUG_IMPORT_FILE_NAME				= 'main_import.js';
}



/*
IMPORT_PRIORITY:9
*/



class CMFileConst
{
	/****************************************************
	 * XMLS RESOURCES
	 */
	public const i_XML_SITEMAP_FILE_NAME				= 'main_sitemap.xml';

	/****************************************************
	 * IMAGES RESOURCES
	 */
	public const i_IMAGES_DIRECTORY_NAME				= '/resources/internals/images/custom/main/';

	/****************************************************
	 * TEXTS RESOURCES
	 */
	public const i_TEXTS_DIRECTORY_NAME					= '/resources/internals/texts/custom/main/';

	public const i_TEXT_SYSTEM_RULES_FILE_NAME			= 'systems/rules.txt';
	public const i_TEXT_SYSTEM_PROMOTIONS_FILE_NAME		= 'systems/promotions.txt';
	public const i_TEXT_SYSTEM_REQUIREMENTS_FILE_NAME	= 'systems/requirements.txt';

	/****************************************************
	 * TRANSLATIONS RESOURCES
	 */
	public const i_TRANSLATIONS_DIRECTORY_NAME			= './resources/internals/translations/custom/main/#LANG_ID#/';
	public const i_TRANSLATIONS_XML_FILE_NAME			= 'translations.xml';

	public const i_TRANSLATIONS_MESSAGES_DIRECTORY_NAME				= './resources/internals/translations/custom/main/#LANG_ID#/messages/';
	public const i_TRANSLATIONS_ERRORS_MESSAGES_DIRECTORY_NAME		= './resources/internals/translations/custom/main/#LANG_ID#/messages/errors/';
	public const i_TRANSLATIONS_ACCESSES_MESSAGES_DIRECTORY_NAME	= './resources/internals/translations/custom/main/#LANG_ID#/messages/accesses/';

	public const i_ACCESS_REQUIREMENT_MESSAGE_FILE_NAME		= 'access_requirement_message.txt';
	public const i_ACCESS_RESTRICTION_MESSAGE_FILE_NAME		= 'access_restriction_message.txt';
	public const i_ACCESS_ERROR_MESSAGE_FILE_NAME			= 'access_error_message.txt';
	public const i_ACCESS_PROHIBITION_MESSAGE_FILE_NAME		= 'access_prohibition_message.txt';
	public const i_ERROR_403_MESSAGE_FILE_NAME				= 'error_403_message.txt';
	public const i_ERROR_404_MESSAGE_FILE_NAME				= 'error_404_message.txt';
	public static $i_MESSAGES_FILES_NAMES					= [	CMFileConst::i_ACCESS_REQUIREMENT_MESSAGE_FILE_NAME,
																CMFileConst::i_ACCESS_RESTRICTION_MESSAGE_FILE_NAME,
																CMFileConst::i_ACCESS_ERROR_MESSAGE_FILE_NAME,
																CMFileConst::i_ACCESS_PROHIBITION_MESSAGE_FILE_NAME,
																CMFileConst::i_ERROR_403_MESSAGE_FILE_NAME,
																CMFileConst::i_ERROR_404_MESSAGE_FILE_NAME];
}



/*
IMPORT_PRIORITY:9
*/



class CMCssFileConst
{
	public const i_RELEASE_DIRECTORY_NAME				= '/release/custom/main/';
	public const i_RELEASE_FILE_NAME					= 'main_release.css';

	public const i_DEBUG_DIRECTORY_NAME					= '/_source/css/custom/main/';
	public const i_DEBUG_IMPORT_FILE_NAME				= 'main_import.css';
}



/*
IMPORT_PRIORITY:9
*/



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



/*
IMPORT_PRIORITY:9
*/



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




/*
IMPORT_PRIORITY:9
*/



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




/*
IMPORT_PRIORITY:9
*/



class CMActionConst
{
	/*const ACTION_ID_ADD											= 'add';
	const ACTION_ID_EDIT										= 'edit';
	const ACTION_ID_VIEW										= 'view';
	const ACTION_ID_SEARCH										= 'search';
	const ACTION_ID_REMOVE										= 'remove';*/

	/*public static $AVAILABLE_ACTIONS							= array(CMActionConst::ACTION_ID_ADD,
																		CMActionConst::ACTION_ID_EDIT,
																		CMActionConst::ACTION_ID_VIEW,
																		CMActionConst::ACTION_ID_SEARCH,
																		CMActionConst::ACTION_ID_REMOVE);*/
}



/*
IMPORT_PRIORITY:9
*/



class CMFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMAccessPageSectionsView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	/*
	protected function __getXmlFileData()
	{
		return CXmlFileData::getInstance();
	}

	protected function __getMessagesTranslationData()
	{
		return $this->__getXmlFileData()->getTranslationXmlFileData()->getInfosTranslationData()->getMessagesTranslationData();
	}

	protected function __drawHeaderSection()
	{
		//must be empty
	}

	protected function __drawPreContentSection()
	{
		//must be empty
	}

	protected function __drawLeftSection()
	{
		//must be empty
	}

	protected function __drawFloatLeftSection()
	{
		//must be empty
	}

	protected function __drawRightSection()
	{
		//must be empty
	}

	protected function __drawFloatRightSection()
	{
		//must be empty
	}

	protected function __drawPostContentSection()
	{
		//must be empty
	}

	protected function __drawFooterSection()
	{
		//must be empty
	}*/
}



/*
IMPORT_PRIORITY:9
*/



class CMDialogView extends CCDialogView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMRequestParamConst extends CCRequestParamConst
{
	const i_GET_PARAM_ID_COUNTRY_ID						= 'country_id';
	const i_GET_PARAM_ID_REGION_ID						= 'region_id';
	const i_GET_PARAM_ID_CITY_ID							= 'city_id';
}



/*
IMPORT_PRIORITY:9
*/



class CMSubpageConst extends CCSubpageConst
{
	//const SUBPAGE_ID_NONE									= CCSubpageConst::SUBPAGE_ID_NONE;

	public static $i_AVAILABLE_SUBPAGE_IDS					= array();
}



/*
IMPORT_PRIORITY:9
*/



class CMTransmitValueConst extends CCTransmitValueConst
{
	/****************************************************
	 * STORAGE TYPE
	 */
	const STORAGE_TYPE_PUBLIC							= 50;
	const STORAGE_TYPE_PRIVATE							= 51;
	
	
	/****************************************************
	 * MARITAL STATUS
	 */
	const MARITAL_STATUS_SINGLE							= 50;
	const MARITAL_STATUS_MARRIED						= 51;
	const MARITAL_STATUS_DIVORCED						= 52;
	
	
	/****************************************************
	 * CHILDREN
	 */
	const CHILDREN_YES									= 50;
	const CHILDREN_NO									= 51;
	
	
	/****************************************************
	 * SEX
	 */
	const SEX_MALE										= 50;
	const SEX_FEMALE									= 51;
	
	
	/****************************************************
	 * LEVEL EDUCATION
	 */
	const LEVEL_EDUCATION_HIGHER						= 50;
	const LEVEL_EDUCATION_INCOMPLETE_HIGHER				= 51;
	const LEVEL_EDUCATION_SECONDARY_VOCATIONAL			= 52;
	const LEVEL_EDUCATION_SECONDARY						= 53;
	const LEVEL_EDUCATION_STUDENT						= 54;
	
	
	/****************************************************
	 * CONTENT LIFE TIME
	 */
	const CONTENT_LIFE_TIME_ONE_WEEK					= 50;
	const CONTENT_LIFE_TIME_TWO_WEEKS					= 51;
	const CONTENT_LIFE_TIME_ONE_MONTH					= 52;
	const CONTENT_LIFE_TIME_SIX_MONTHS					= 53;
	const CONTENT_LIFE_TIME_ONE_YEAR					= 54;
	
	
	/****************************************************
	 * PHONE TYPE
	 */
	const PHONE_TYPE_MOBILE								= 50;
	const PHONE_TYPE_CITY								= 51;
	const PHONE_TYPE_FREE_800							= 52;
	const PHONE_TYPE_FAX								= 53;
	
	
	/****************************************************
	 * NATIONALITY
	 */
	const NATIONALITY_RUS								= 50;
	const NATIONALITY_ABH								= 51;
	const NATIONALITY_AZE								= 52;
	const NATIONALITY_ARM								= 53;
	const NATIONALITY_BLR								= 54;
	const NATIONALITY_GEO								= 55;
	const NATIONALITY_WORLD								= 56;
	const NATIONALITY_KAZ								= 57;
	const NATIONALITY_KGZ								= 58;
	const NATIONALITY_LVA								= 59;
	const NATIONALITY_LTU								= 60;
	const NATIONALITY_MDA								= 61;
	const NATIONALITY_TJK								= 62;
	const NATIONALITY_TKM								= 63;
	const NATIONALITY_UZB								= 64;
	const NATIONALITY_UKR								= 65;
	const NATIONALITY_EST								= 66;
	const NATIONALITY_OST								= 67;
}



/*
IMPORT_PRIORITY:9
*/



class CMRequestConst extends CCRequestConst
{
	const i_REQUEST_ID_LOGIN									= 'request_0';
	const i_REQUEST_ID_REGISTRATION							= 'request_3';
	const i_REQUEST_ID_LOGOUT									= 'request_5';
	const i_REQUEST_ID_AUTHORIZATION							= 'request_6';
	const i_REQUEST_ID_SELECT_CITY							= 'request_7';

	public static $i_AVAILABLE_COMMON_REQUESTS				= array(CMRequestConst::i_REQUEST_ID_LOGIN,
																	CMRequestConst::i_REQUEST_ID_AUTHORIZATION,
																	CMRequestConst::i_REQUEST_ID_REGISTRATION/*,
																	CRequestConst::REQUEST_ID_SEARCH,
																	CRequestConst::REQUEST_ID_RECOVERY_PASSWORD,
																	CRequestConst::REQUEST_ID_LOGOUT,
																	CRequestConst::REQUEST_ID_SUPPORT,
																	CRequestConst::REQUEST_ID_SELECT_CITY,
																	CRequestConst::REQUEST_ID_USER,
																	CRequestConst::REQUEST_ID_USER_SETTINGS_CHANGE_PASSWORD,
																	CRequestConst::REQUEST_ID_USER_SETTINGS_CHANGE_EMAIL,
																	CRequestConst::REQUEST_ID_ADMIN_EDIT_USER_STATE*/);
}



/*
IMPORT_PRIORITY:9
*/



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




/*
IMPORT_PRIORITY:9
*/



class CMLangConst extends CCLangConst
{
	const i_LANG_ID_RU									= 'ru';

	public static $i_AVAILABLE_LANG_IDS					= array(CMLangConst::i_LANG_ID_RU);
}




/*
IMPORT_PRIORITY:9
*/



class CMPageConst extends CCPageConst
{
	const i_PAGE_ID_REGISTRATION								= 'registration';
	const i_PAGE_ID_AUTHORIZATION								= 'authorization';
	const i_PAGE_ID_SELECT_CITY								= 'select_city';
	const i_PAGE_ID_ACCESS_PROHIBITION						= 'access_prohibition';
	const i_PAGE_ID_ACCESS_RESTRICTION						= 'access_restriction';
	const i_PAGE_ID_ACCESS_REQUIREMENT						= 'access_requirement';
	const i_PAGE_ID_ACCESS_ERROR								= 'access_error';
	const i_PAGE_ID_ERROR_404									= 'error_404';
	const i_PAGE_ID_ERROR_403									= 'error_403';

	public static $i_AVAILABLE_PAGE_IDS						= array(CMPageConst::i_PAGE_ID_MAIN,
																	CMPageConst::i_PAGE_ID_REGISTRATION,
																	CMPageConst::i_PAGE_ID_AUTHORIZATION,
																	CMPageConst::i_PAGE_ID_SELECT_CITY,
																	CMPageConst::i_PAGE_ID_ACCESS_PROHIBITION,
																	CMPageConst::i_PAGE_ID_ACCESS_RESTRICTION,
																	CMPageConst::i_PAGE_ID_ACCESS_REQUIREMENT,
																	CMPageConst::i_PAGE_ID_ACCESS_ERROR,
																	CMPageConst::i_PAGE_ID_ERROR_404,
																	CMPageConst::i_PAGE_ID_ERROR_403);
}



/*
IMPORT_PRIORITY:9
*/



class CMListboxComponentData extends CCListboxComponentData
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



final class CMDatabaseData extends CCDatabaseData
{
	private $_fUsersTableData_clss;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getUsersTableData()
	{
		return $this->_getUsersTableData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getUsersTableData()
	{
		return isset($this->_fUsersTableData_clss) ? $this->_fUsersTableData_clss : ($this->_fUsersTableData_clss = new CMUsersTableData());
	}
}



/*
IMPORT_PRIORITY:9
*/



final class CMDatabaseConst extends CCDatabaseConst
{
	/****************************************************
	 * Common database types
	 */
	//const TYPE_COMMON_DATA								= 0;
	//const TYPE_COMMON_DATA_BY_ID						= 1;
	//const TYPE_COMMON_DATA_BY_TYPE						= 2;
	//const TYPE_COMMON_DATA_BY_STATE						= 3;
	//const TYPE_COMMON_DATA_BY_USER_ID					= 4;
	//const TYPE_COMMON_DATA_COUNT						= 5;
	//const TYPE_COMMON_UNIQUE_DATA						= 6;
	//const TYPE_COMMON_DATA_COUNT_BY_STATES				= 7;
	

	/****************************************************
	 * Common tables
	 */
	//const TABLE_USER									= 'users';
	//const TABLE_CITY									= 'cities';								//optional
	//const TABLE_REGION								= 'regions';							//optional
	//const TABLE_COUNTRY								= 'countries';							//optional


	/****************************************************
	 * Common table elements
	 */
	//const COMMON_TABLE_ID										= 'id';									//smallint(5)
	/*const COMMON_TABLE_SEO										= 'seo';								//char(32)
	const COMMON_TABLE_TRANSLIT									= 'translit';							//char(128)
	const COMMON_TABLE_URL_NAME									= 'URL_name';							//char(255)
	const COMMON_TABLE_NAME										= 'name';								//char(8-64)
	const COMMON_TABLE_EMAIL									= 'email';								//char(64)
	const COMMON_TABLE_ICQ										= 'icq';								//char(16)
	const COMMON_TABLE_SKYPE									= 'skype';								//char(32)
	const COMMON_TABLE_SITE										= 'site';								//char(32)
	const COMMON_TABLE_COUNTRY_ID								= 'country_id';							//smallint(5)
	const COMMON_TABLE_REGION_ID								= 'region_id';							//smallint(5)
	const COMMON_TABLE_CITY_ID									= 'city_id';							//smallint(5)
	const COMMON_TABLE_MOVE_ANOTHER_CITY						= 'move_another_city';					//tinyint(3)
	const COMMON_TABLE_ADDRESS									= 'address';							//char(64)
	const COMMON_TABLE_ADDRESS_ADDITIONAL						= 'address_additional';					//char(32)
	const COMMON_TABLE_PHONE_CODE								= 'phone_code';							//mediumint(8)
	const COMMON_TABLE_PHONE_NUMBER								= 'phone_number';						//char(16)
	const COMMON_TABLE_PHONE_ADDITIONAL							= 'phone_additional';					//char(32)
	const COMMON_TABLE_CATEGORY_ID								= 'category_id';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_2							= 'category_id_2';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_3							= 'category_id_3';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_4							= 'category_id_4';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_5							= 'category_id_5';						//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID							= 'subcategory_id';						//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_2							= 'subcategory_id_2';					//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_3							= 'subcategory_id_3';					//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_4							= 'subcategory_id_4';					//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_5							= 'subcategory_id_5';					//smallint(5)*/

	/*const COMMON_TABLE_TYPE										= 'type';								//tinyint(3)
	const COMMON_TABLE_PREV_TYPE								= 'prev_type';							//tinyint(3)
	const COMMON_TABLE_STATE									= 'state';								//tinyint(3)
	const COMMON_TABLE_PREV_STATE								= 'prev_state';							//tinyint(3)
	const COMMON_TABLE_STATUS									= 'status';								//tinyint(3)
	const COMMON_TABLE_PREV_STATUS								= 'prev_status';						//tinyint(3)
	const COMMON_TABLE_USER_ID									= 'user_id';							//smallint(5)
	const COMMON_TABLE_RELEASE_TIME								= 'release_time';						//int(10)
	const COMMON_TABLE_UPDATING_TIME							= 'updating_time';						//int(10)
	const COMMON_TABLE_EDITING_TIME								= 'editing_time';						//int(10)
	const COMMON_TABLE_EXPIRING_TIME							= 'expiring_time';						//int(10)
	const COMMON_TABLE_STATE_EXPIRING_TIME						= 'state_expiring_time';				//int(10)
	const COMMON_TABLE_STATE_UPDATING_TIME						= 'state_updating_time';				//int(10)
	const COMMON_TABLE_STATUS_EXPIRING_TIME						= 'status_expiring_time';				//int(10)
	const COMMON_TABLE_STATUS_UPDATING_TIME						= 'status_updating_time';				//int(10)
	const COMMON_TABLE_TYPE_UPDATING_TIME						= 'type_updating_time';					//int(10)
	const COMMON_TABLE_VIEWS									= 'views';								//smallint(5)*/


	/****************************************************
	 * Additional table elements
	 */
	/*const ADDITIONAL_TABLE_COUNT									= 'count';
	const ADDITIONAL_TABLE_STATE_EMAIL_VERIFICATION_WAITING_COUNT	= 'state_email_verification_waiting_count';
	const ADDITIONAL_TABLE_STATE_ACTIVATED_COUNT					= 'state_activated_count';
	const ADDITIONAL_TABLE_STATE_DEACTIVATED_COUNT					= 'state_deactivated_count';
	const ADDITIONAL_TABLE_STATE_MODERATION_WAITING_COUNT			= 'state_moderation_waiting_count';
	const ADDITIONAL_TABLE_STATE_BANNED_COUNT						= 'state_banned_count';
	const ADDITIONAL_TABLE_STATE_BLOCKED_COUNT						= 'state_blocked_count';
	const ADDITIONAL_TABLE_STATE_DELETED_COUNT						= 'state_deleted_count';
	const ADDITIONAL_TABLE_STATE_DELETION_WAITING_COUNT				= 'state_deletion_waiting_count';*/


	/****************************************************
	 * USER
	 */
	/*const TABLE_USER_ID											= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_USER_LOGIN										= 'login';												//char(16)
	const TABLE_USER_PASSWORD									= 'password';											//char(48)
	const TABLE_USER_EMAIL										= CDatabaseConst::COMMON_TABLE_EMAIL;					//char(32)
	const TABLE_USER_LAST_VISIT_TIME							= 'last_visit_time';									//int(10)
	const TABLE_USER_PASSWORD_KEY								= 'password_key';										//char(48)
	const TABLE_USER_HASH										= 'hash';												//char(48)
	const TABLE_USER_IP_ADDRESS									= 'ip_address';											//int(10)

	const TABLE_USER_JOB_USER_ID								= 'job_user_id';										//smallint(5) (not used)

	const TABLE_USER_VERIFICATION_KEY							= 'verification_key';									//char(48)
	const TABLE_USER_VERIFICATION_KEY_RELEASE_TIME				= 'verification_key_release_time';						//int(10)
	const TABLE_USER_VERIFICATION_KEY_EXPIRING_TIME				= 'verification_key_expire_time';						//int(10)

	const TABLE_USER_RELEASE_TIME								= CDatabaseConst::COMMON_TABLE_RELEASE_TIME;
	const TABLE_USER_UPDATING_TIME								= CDatabaseConst::COMMON_TABLE_UPDATING_TIME;
	const TABLE_USER_EDITING_TIME								= CDatabaseConst::COMMON_TABLE_EDITING_TIME;
	const TABLE_USER_TYPE										= CDatabaseConst::COMMON_TABLE_TYPE;
	const TABLE_USER_PREV_TYPE									= CDatabaseConst::COMMON_TABLE_PREV_TYPE;
	const TABLE_USER_STATE										= CDatabaseConst::COMMON_TABLE_STATE;
	const TABLE_USER_PREV_STATE									= CDatabaseConst::COMMON_TABLE_PREV_STATE;
	const TABLE_USER_STATUS										= CDatabaseConst::COMMON_TABLE_STATUS;
	const TABLE_USER_PREV_STATUS								= CDatabaseConst::COMMON_TABLE_PREV_STATUS;
	const TABLE_USER_STATE_EXPIRING_TIME						= CDatabaseConst::COMMON_TABLE_STATE_EXPIRING_TIME;
	const TABLE_USER_STATE_UPDATING_TIME						= CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME;
	const TABLE_USER_STATUS_EXPIRING_TIME						= CDatabaseConst::COMMON_TABLE_STATUS_EXPIRING_TIME;
	const TABLE_USER_STATUS_UPDATING_TIME						= CDatabaseConst::COMMON_TABLE_STATUS_UPDATING_TIME;
	const TABLE_USER_TYPE_UPDATING_TIME							= CDatabaseConst::COMMON_TABLE_TYPE_UPDATING_TIME;
	const TABLE_USER_VIEWS										= CDatabaseConst::COMMON_TABLE_VIEWS;
*/

	/****************************************************
	 * CITY
	 */
	/*const TABLE_CITY_ID											= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_CITY_TRANSLIT									= CDatabaseConst::COMMON_TABLE_TRANSLIT;				//char(32)
	const TABLE_CITY_SEO										= CDatabaseConst::COMMON_TABLE_SEO;						//char(32)

	const TABLE_CITY_NAME										= CDatabaseConst::COMMON_TABLE_NAME;					//char(32)
	const TABLE_CITY_REGION_ID									= CDatabaseConst::COMMON_TABLE_REGION_ID;
	const TABLE_CITY_COUNTRY_ID									= CDatabaseConst::COMMON_TABLE_COUNTRY_ID;

	const TABLE_CITY_TYPE										= CDatabaseConst::COMMON_TABLE_TYPE;
	const TABLE_CITY_STATE										= CDatabaseConst::COMMON_TABLE_STATE;
*/
	
	/****************************************************
	 * REGION
	 */
	/*const TABLE_REGION_ID										= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_REGION_TRANSLIT									= CDatabaseConst::COMMON_TABLE_TRANSLIT;				//char(32)
	const TABLE_REGION_SEO										= CDatabaseConst::COMMON_TABLE_SEO;						//char(32)

	const TABLE_REGION_NAME										= CDatabaseConst::COMMON_TABLE_NAME;					//char(32)
	const TABLE_REGION_COUNTRY_ID								= CDatabaseConst::COMMON_TABLE_COUNTRY_ID;

	const TABLE_REGION_STATE									= CDatabaseConst::COMMON_TABLE_STATE;
	*/
	
	/****************************************************
	 * COUNTRY
	 */
	/*const TABLE_COUNTRY_ID										= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_COUNTRY_TRANSLIT								= CDatabaseConst::COMMON_TABLE_TRANSLIT;				//char(32)
	const TABLE_COUNTRY_SEO										= CDatabaseConst::COMMON_TABLE_SEO;						//char(32)

	const TABLE_COUNTRY_NAME									= CDatabaseConst::COMMON_TABLE_NAME;					//char(32)

	const TABLE_COUNTRY_STATE									= CDatabaseConst::COMMON_TABLE_STATE;*/
}



/*
IMPORT_PRIORITY:9
*/



final class CMUsersTableData extends CCTableData
{
	public const i_TABLE_NAME							= 'users';

	public const i_TABLE_FIELD_LOGIN					= 'login';								//char(16)
	public const i_TABLE_FIELD_PASSWORD					= 'password';							//char(48)
	public const i_TABLE_FIELD_EMAIL					= 'email';								//char(32)
	//const TABLE_FIELD_LAST_VISIT_TIME					= 'last_visit_time';					//int(10)
	//const TABLE_FIELD_PASSWORD_KEY						= 'password_key';						//char(48)
	//const TABLE_FIELD_PASSWORD_HASH						= 'password_hash';						//char(48)
	//const TABLE_FIELD_IP_ADDRESS						= 'ip_address';							//int(10)

	//const TABLE_FIELD_VERIFICATION_KEY					= 'verification_key';					//char(48)
	//const TABLE_FIELD_VERIFICATION_KEY_RELEASE_TIME		= 'verification_key_release_time';		//int(10)
	//const TABLE_FIELD_VERIFICATION_KEY_EXPIRING_TIME	= 'verification_key_expire_time';		//int(10)


	/***************************************************
	 * INTERFACE
	 */

	public function i_getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}

	public function i_getTableFieldLogin()
	{
		return $this->__getTableFieldValue(CMUserTableData::i_TABLE_FIELD_LOGIN);
	}

	public function i_getTableFieldPassword()
	{
		return $this->__getTableFieldValue(CMUserTableData::i_TABLE_FIELD_PASSWORD);
	}

	public function i_getTableFieldEmail()
	{
		return $this->__getTableFieldValue(CMUserTableData::i_TABLE_FIELD_EMAIL);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



final class CMCacheData extends CCCacheData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



final class CMAjaxConst extends CCAjaxConst
{
	//const REQUEST_ID_FILE_UPLOADING						= 'request_file_uploading';

	//public static $REQUESTS								= array(CMAjaxConst::REQUEST_ID_FILE_UPLOADING);
}



/*
IMPORT_PRIORITY:9
*/



class CMPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw($aSectionId_int)
	{
		switch ($aSectionId_int)
		{
			case CMViewConst::SECTION_ID_HEADER:
			{
				$this->__drawHeaderSection();
			}break;

			case CMViewConst::SECTION_ID_PRE_CONTENT:
			{
				$this->__drawPreContentSection();
			}break;

			case CMViewConst::SECTION_ID_LEFT:
			{
				$this->__drawLeftSection();
			}break;

			case CMViewConst::SECTION_ID_RIGHT:
			{
				$this->__drawRightSection();
			}break;

			case CMViewConst::SECTION_ID_CONTENT:
			{
				$this->__drawContentSection();
			}break;

			case CMViewConst::SECTION_ID_POST_CONTENT:
			{
				$this->__drawPostContentSection();
			}break;

			case CMViewConst::SECTION_ID_FOOTER:
			{
				$this->__drawFooterSection();
			}break;

			default:
				new CException('draw', 'Invalid main section id: '.  $aSectionId_int);
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*
	protected function __getDatabaseData()
	{
		return CDatabaseData::getInstance();
	}

	protected function __getViewData()
	{
		return CViewData::getInstance();
	}

	protected function __getUserData()
	{
		return CUserData::getInstance();
	}*/

	/*protected function __getComponentsView()
	{
		return CComponentsView::getInstance();
	}
	
	protected function __getModulesView()
	{
		return CModulesView::getInstance();
	}

	protected function __getFormsView()
	{
		return $this->__getModulesView()->getFormsView();
	}

	protected function __getInfosView()
	{
		return $this->__getModulesView()->getInfosView();
	}

	protected function __getBanners()
	{
		return $this->__getModulesView()->getBannersView();
	}*/

	protected function __drawHeaderSection()
	{
		$this->_drawHeaderLogoImage();
		$this->_drawHeaderLogoText();

		/*if ($this->__getUserData()->isLogged())
		{
			$this->__getModulesView()->getFormsView()->getLogoutFormView()->draw();
		}
		else
		{
			$this->__getModulesView()->getFormsView()->getLoginFormView()->draw();
		}*/
	}

	protected function __drawPreContentSection()
	{
		//$this->__getBanners()->draw(CBannerConst::TYPE_PRE_CONTENT);

		//$this->__getInfosView()->getNavigationsInfoView()->getPageNavigationInfoView()->draw();
	}

	protected function __drawLeftSection()
	{
		//$this->__modules()->navigations()->getCustomNavigations()->getJobNavigations()->getCategoryNavigation()->draw();

		//$this->__getBanners()->draw(CBannerConst::TYPE_LEFT_MIDDLE);
	}

	protected function __drawRightSection()
	{
		//$this->_modules()->forms()->searchForm()->draw();

		/*$lPanelsInfo_clss = $this->__getModules()->getInfos()->getPanelsInfo();
		$lCustomPanelsInfo_clss = $this->__getModules()->getInfos()->getCustomInfos()->getJobInfos()->getPanelsInfo();

		$lPanelsInfo_clss->getSelectCityPanelInfo()->draw();
		$lCustomPanelsInfo_clss->getAddContentPanelInfo()->draw();
		$lCustomPanelsInfo_clss->getReferenceBookPanelInfo()->draw();

		$lUserData_clss = $this->__getUserData();
		if ($lUserData_clss->isAdmin()
			|| $lUserData_clss->isModerator())
		{
			$lPanelsInfo_clss->getContentControlsAdminPanelInfo()->draw();
			$lCustomPanelsInfo_clss->getContentControlsAdminPanelInfo()->draw();
		}

		$this->__getBanners()->draw(CBannerConst::TYPE_RIGHT_TOP);

		$lParams_str_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
									CComponentParam::TEXT_NAME 					=> 'Наши партнеры: jooble.ru - Работа в Томске',
									CComponentParam::TEXT_HREF 					=> 'http:&frasl;&frasl;jooble.ru/main-vacancy-tomsk',
									CComponentParam::TEXT_NEW_PAGE 				=> true,
									CComponentParam::TEXT_STYLE_COMPONENT 		=> '');
		$this->__getComponents()->getText()->draw($lParams_str_arr);*/
	}

	protected function __drawContentSection()
	{
		/*$this->__banners()->draw(CBannerConst::TYPE_CONTENT_TOP);

		//heading description
		$lCityData_arr = $this->__databaseData()->cityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);

		$lParams_str_arr 	= array(CModuleParam::INFO_ID		=> CJOBFieldIdConst::INFO_JOB_HEADING_DESCRIPTION,
									CModuleParam::INFO_NAME 	=> 'Вакансии ' .$lCityData_arr[CDatabaseConst::TABLE_CITY_SEO],
									CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:0 2px; background-color:#fefef1;');
		$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

		$lParams_str_arr 	= array(CModuleParam::INFO_ID		=> CJOBFieldIdConst::INFO_JOB_HEADING_DESCRIPTION_2,
									CModuleParam::INFO_NAME 	=> 'Резюме ' .$lCityData_arr[CDatabaseConst::TABLE_CITY_SEO],
									CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:0 2px; background-color:#fefef1; display:none;');
		$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

		//search content
		$this->__forms()->customForms()->jobForms()->getSearchContentForm()->draw();

		//category navigation
		$lParams_str_arr = array(CModuleParam::INFO_ID => 'category_navigation');
		$this->__infos()->customInfos()->jobInfos()->getNavigationsInfo()->getCategoryNavigationInfo()->draw($lParams_str_arr);

		//vacancy content
		$lContentData_arr = $this->__databaseJobData()->vacancyData(CJOBDatabaseData::TYPE_VACANCY_DATA);
		if ($lContentData_arr)
		{
			//heading description
			$lParams_str_arr 	= array(CModuleParam::INFO_NAME 	=> 'Последние вакансии',
										CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:2px; background-color:#fefef1;');
			$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

			$lParams_str_arr = array(CModuleParam::INFO_STYLE => 'width:382px; vertical-align:top; height:130px; display:inline-block;');
			$lCount_int = count($lContentData_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$this->__infos()->customInfos()->jobInfos()->getContentsInfo()->getVipVacancyContentInfo()->draw($lContentData_arr[$i], $lParams_str_arr);
			}
		}

		//site description
		$lCityData_arr = $this->__databaseData()->cityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
		$lRegionData_arr = $this->__databaseData()->regionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);

		$lValue_str = str_replace(CViewConst::REPLACE_NAME, SITE_NAME, CViewConst::SITE_MAIN_MESSAGE_DESCRIPTION);
		$lValue_str = str_replace(CViewConst::REPLACE_CITY, $lCityData_arr[CDatabaseConst::TABLE_CITY_SEO], $lValue_str);
		$lValue_str = str_replace(CViewConst::REPLACE_REGION, $lRegionData_arr[CDatabaseConst::TABLE_REGION_SEO], $lValue_str);

		$lParams_str_arr 	= array(CModuleParam::MESSAGE_NAME 					=> CViewConst::SITE_MAIN_MESSAGE_NAME,
									CModuleParam::MESSAGE_VALUE 				=> $lValue_str,
									CModuleParam::MESSAGE_BUTTON_CLOSE_STATE 	=> CModuleParam::BUTTON_STATE_HIDDEN);
		$this->__modules()->messages()->informationMessage()->draw($lParams_str_arr);*/
	}

	protected function __drawPostContentSection()
	{
		//$this->__getInfosView()->getNavigationsInfoView()->getAdditionalPageNavigationInfoView()->draw();
	}

	protected function __drawFooterSection()
	{
		/*$lCopyRightText_str = ' - Бесплатные объявления по России и зарубежью.';
$lCityData_arr = $this->__getDatabaseData()->getCityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
$lRegionData_arr = $this->__getDatabaseData()->getRegionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);
if ($lCityData_arr && $lRegionData_arr)
{
	$lCitySeo_str = $lCityData_arr[CDatabaseConst::TABLE_CITY_SEO];
	$lRegionSeo_str = $lRegionData_arr[CDatabaseConst::TABLE_REGION_SEO];

	$lCopyRightText_str = ' - Бесплатные объявления ' .$lCitySeo_str. ' и ' .$lRegionSeo_str. '.';
}

$lParams_str_arr 	= array(CSubdescriptionTextComponent::PARAM_VALUE 	=> CMainConst::SITE_COPY_RIGHT . SITE_NAME. $lCopyRightText_str,
							CSubdescriptionTextComponent::PARAM_STYLE 	=> 'text-align:center;');
$this->__getComponents()->getTextComponents()->getSubdescriptionTextComponent()->draw($lParams_str_arr);*/
	//}

	//private function _validateErrors()
	//{
		/*if ($this->__getMainData()->getErrorType() != CMainConst::ERROR_TYPE_NO_ERROR)
		{
			$lParams_str_arr 	= array(CInformationMessageInfoView::PARAM_NAME						=> CViewConst::ERROR_MESSAGE_404_NAME,
										CInformationMessageInfoView::PARAM_VALUE					=> $this->__getMainData()->getErrorMessage(),
										CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> true);
			$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_str_arr);

			return false;
		}*/

		//return true;
	}

	private function _drawHeaderLogoImage()
	{
		$lParams_obj_arr	= array(CCSimpleImageComponentView::PARAM_FILE_NAME		=> CFilesConst::ROOT_INTERNALS_IMAGES_RESOURCES_DIRECTORY_NAME . CFilesConst::IMAGE_LOGO_80x80_FILE_NAME,
									CCSimpleImageComponentView::PARAM_WIDTH			=> 80,
									CCSimpleImageComponentView::PARAM_HEIGHT		=> 80,
									CCSimpleImageComponentView::PARAM_STYLES		=> 'float:left; padding:0;');
		$this->__getComponentsView()->getImageComponentsView()->getSimpleImageComponentView()->draw($lParams_obj_arr);
	}

	private function _drawHeaderLogoText()
	{
		$lParams_obj_arr	= array(CCSubcaptionTextComponentView::PARAM_VALUE				=> 'rerer',//CMainConst::SITE_LOGO_TEXT. '<br>' .CMainConst::SITE_PATTERN_BRIEF,
									CCSubcaptionTextComponentView::PARAM_STYLES				=> 'float:left; padding:14px;',
									CCSubcaptionTextComponentView::PARAM_ELEMENT_STYLES		=> 'color:#eeeeee; font-weight:bold;');
		$this->__getComponentsView()->getTextComponentsView()->getSubcaptionTextComponentView()->draw($lParams_obj_arr);
	}
}



/*
IMPORT_PRIORITY:9
*/



final class CMCacheConst extends CCCacheConst
{
}



/*
IMPORT_PRIORITY:9
*/



class CMSectionView extends CCSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		$this->__draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __draw()
	{
		$lPageId_str = $this->__getMainData()->getURLParam(CMURLParamConst::GET_PARAM_ID_PAGE);
		switch ($lPageId_str)
		{
			case CCPageConst::PAGE_ID_MAIN:
			{
				$this->__getPagesSectionsView()->getMainPagesSectionsView()->getMainPageSectionView()->draw($this->__getSectionId());
			}break;

			/*case CPageConst::PAGE_ID_ERROR_404:
			case CPageConst::PAGE_ID_ERROR_403:
			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$this->__getViewData()->setLayout(CViewConst::LAYOUT_ID_NONE);
			}break;
*/
			/*case CPageConst::PAGE_ID_RECOVERY_PASSWORD:
			case CPageConst::PAGE_ID_AUTHORIZATION:
			case CPageConst::PAGE_ID_REGISTRATION:
			case CPageConst::PAGE_ID_RULES:
			case CPageConst::PAGE_ID_PROMOTION:
			case CPageConst::PAGE_ID_SUPPORT:
			case CPageConst::PAGE_ID_REQUIREMENTS:
			case CPageConst::PAGE_ID_SELECT_CITY:
			case CPageConst::PAGE_ID_SITEMAP:
			case CPageConst::PAGE_ID_DEBUG:
			case CPageConst::PAGE_ID_USER:
			case CPageConst::PAGE_ID_ADMIN:
		{
			$this->__getPagesSectionsView()->getMainPagesSectionsView()->getMainPageSectionView()->draw($this->__getSectionId());
		}break;*/

			default:
				new CException('__draw', 'Invalid main page id: ' .$lPageId_str);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:9
*/



final class CMAjaxData extends CCAjaxData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMTitleView extends CCTitleView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		$lPageId_str = $this->__getMainData()->getURLParam(CCRequestParamConst::GET_PARAM_ID_PAGE);
		switch ($lPageId_str)
		{
			case CCPageConst::PAGE_ID_MAIN:
			{
				$lTranslationData_clss = $this->__getTranslationsData()->getMainTranslationData()->getTranslationData();

				$lTitle_str = $lTranslationData_clss->getPagesTranslationData()->getMainPageTranslationData()->getTitle();
			}break;

			/*case CPageConst::PAGE_ID_REGISTRATION:
			{
				$lTitle_str = 'Регистрация';
			}break;
			
			case CPageConst::PAGE_ID_RECOVERY_PASSWORD:
			{
				$lTitle_str = 'Восстановление пароля';
			}break;

			case CPageConst::PAGE_ID_PROMOTION:
			{
				$lTitle_str = 'Размещение рекламы';
			}break;

			case CPageConst::PAGE_ID_RULES:
			{
				$lTitle_str = 'Правила пользования';
			}break;
			
			case CPageConst::PAGE_ID_SUPPORT:
			{
				$lTitle_str = 'Техподдержка';
			}break;

			case CPageConst::PAGE_ID_USER:
			{
				$lTitle_str = 'Аккаунт';
			}break;
			
			case CPageConst::PAGE_ID_AUTHORIZATION:
			{
				$lTitle_str = 'Авторизация';
			}break;

			case CPageConst::PAGE_ID_SELECT_CITY:
			{
				$lTitle_str = 'Выбор города';
			}break;

			case CPageConst::PAGE_ID_ERROR_404:
			{
				$lTitle_str = 'Ошибка 404';
			}break;

			case CPageConst::PAGE_ID_ERROR_403:
			{
				$lTitle_str = 'Ошибка 403';
			}break;

			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			{
				$lTitle_str = 'Доступ запрещен';
			}break;

			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			{
				$lTitle_str = 'Доступ ограничен';
			}break;
			
			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lTitle_str = 'Доступ невозможен';
			}break;

			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$lTitle_str = 'Доступ временно невозможен';
			}break;*/

			default:
				$lTitle_str = 'Работа, вакансии и резюме в России и зарубежье';
			break;
		}
		
		echo '<title>' .$lTitle_str. '</title>';
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



final class CMCitiesAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_update()
	{
		/*$lFile_obj = $_FILES['datafile'];
		$lName_str = $lFile_obj['name'];
		$lFileExtension_str = end(explode(".", $lName_str));
		$lFileName_str = 'test'. '.' .$lFileExtension_str;
*/
		/*if (!file_exists($lFileName_str))
		{
			mkdir($lFileName_str, 0750);
		}*/

		/*if (!move_uploaded_file($lFile_obj['tmp_name'], 'release/'.$lName_str))
		{
			return;
		}

		echo '<script language="Javascript">parent.test(\'' .$lName_str. '\', \''.SITE_FULL_NAME.'release/'.'\');</script>';*/
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected function __getRequestName()
	{
		return 'CITY';
	}

	protected function __getRequest()
	{
		return CDatabaseManager::getInstance()->getDatabaseController()->getCityDatabaseController()->getDataByRegionId($this->__paramValue(), '');
	}

	private function _checkFileParams($aFile_obj)
	{
		switch ($aFile_obj['error'])
		{
			case UPLOAD_ERR_OK:
			{
				if ($aFile_obj['size'] > CFileConst::IMAGE_FILE_SIZE_MAX)
				{
					return;
				}

				$aImageInfo_obj = getimagesize($aFile_obj['tmp_name']);
				if (!$aImageInfo_obj)
				{
					return;
				}

				if ($aImageInfo_obj[2] != IMAGETYPE_GIF
					&& $aImageInfo_obj[2] != IMAGETYPE_JPEG
					&& $aImageInfo_obj[2] != IMAGETYPE_PNG
					&& $aImageInfo_obj[2] != IMAGETYPE_JPEG2000)
				{
					return;
				}

				if (($aImageInfo_obj[0] < CFileConst::IMAGE_RESOLUTION_64)
					|| ($aImageInfo_obj[0] > CFileConst::IMAGE_RESOLUTION_150)
					||($aImageInfo_obj[1] < CFileConst::IMAGE_RESOLUTION_64)
					|| ($aImageInfo_obj[1] > CFileConst::IMAGE_RESOLUTION_150))
				{
				}
			}break;

			case UPLOAD_ERR_FORM_SIZE:
			{
			}break;

			case UPLOAD_ERR_PARTIAL:
			{
			}break;

			case UPLOAD_ERR_NO_FILE:
			{
			}break;
		}
	}*/
}



/*
IMPORT_PRIORITY:9
*/



class CMFaviconView extends CCFaviconView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:9
*/



class CMStyleView extends CCStyleView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		parent::i_draw();

		if (SOURCES_EXECUTION_MODE == SOURCES_EXECUTION_MODE_RELEASE)
		{
			echo
			$this->__getStyle(CMCssFileConst::RELEASE_DIRECTORY_NAME . CMCssFileConst::RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getStyle(CMCssFileConst::DEBUG_DIRECTORY_NAME . CMCssFileConst::DEBUG_IMPORT_FILE_NAME);
		}
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getStyleReleaseVersion()
	{
		return RELEASE_MAIN_VERSION;
	}
}



/*
IMPORT_PRIORITY:9
*/



class CMSelectCityRequestController extends CCRequestController
{
	private $_fCityId_int;
	private $_fRegionId_int;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		$this->__fParams_arr 	= array(CRequestControllerBase::i_PARAM_TRANSMIT 			=> CTransmitConst::i_FORM_SELECT_CITY_CITY,
										CRequestControllerBase::i_PARAM_REQUIRED 			=> CFieldRequiredConst::i_FORM_SELECT_CITY_CITY);
		$this->_fCityId_int = $this->__validateListBox();

		$this->__fParams_arr 	= array(CRequestControllerBase::i_PARAM_TRANSMIT 			=> CTransmitConst::i_FORM_SELECT_CITY_REGION,
										CRequestControllerBase::i_PARAM_REQUIRED 			=> CFieldRequiredConst::i_FORM_SELECT_CITY_REGION);
		$this->_fRegionId_int = $this->__validateListBox();

		if (!$this->__validateFieldsRequired())
		{
			$this->__getMainData()->addEvent(CEventConst::i_SELECT_CITY_DATA_EMPTY);
			return false;
		}
		
		return $this->__validateFieldsIncorrectlyCount();
	}
	

	protected function __request()
	{
		$this->__fResult_str = $this->__getDatabaseController()->i_getCityDatabaseController()->i_getDataById($this->_fCityId_int, '');
		if (!$this->__fResult_str)
		{
			$this->__getMainData()->addEvent(CEventConst::i_SELECT_CITY_WRONG_DATA);
			return;
		}

		$this->__fResult_str = $this->__getDatabaseController()->getRegionDatabaseController()->getDataById($this->_fRegionId_int, '');
		if (!$this->__fResult_str)
		{
			$this->__getMainData()->i_addEvent(CEventConst::i_SELECT_CITY_WRONG_DATA);
			return;
		}

		$this->__getHostData()->addCookie(CMainConst::COOKIE_USER_CITY_ID, $this->_fCityId_int, CControlParamConst::i_LIFE_TIME_ONE_YEAR);
		$this->__getMainData()->setRedirect(CPageConst::PAGE_MAIN);
	}
}




/*
IMPORT_PRIORITY:9
*/



class CMJavascriptView extends CCJavascriptView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		parent::i_draw();

		if (SOURCES_EXECUTION_MODE == SOURCES_EXECUTION_MODE_RELEASE)
		{
			echo
			$this->__getScript(CMJsFileConst::RELEASE_DIRECTORY_NAME . CMJsFileConst::RELEASE_FILE_NAME);
		}
		else
		{
			echo
			$this->__getScript(CMJsFileConst::DEBUG_DIRECTORY_NAME . CMJsFileConst::DEBUG_IMPORT_FILE_NAME);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getScriptReleaseVersion()
	{
		return RELEASE_MAIN_VERSION;
	}
}



/*
IMPORT_PRIORITY:9
*/



final class CMUsersAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected function __getRequestName()
	{
		return 'USER';
	}

	protected function __getRequest()
	{
		//return DatabaseManager::instance()->databaseController()->userDatabaseController()->getDataById($this->__ajaxValue(), '');
	}*/
}



/*
IMPORT_PRIORITY:9
*/



final class CMRegionsAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected function __getRequestName()
	{
		return 'REGION';
	}

	protected function __getRequest()
	{
		//return DatabaseManager::instance()->databaseController()->regionDatabaseController()->getAllDataByCountryId($this->_ajaxValue());
	}*/
}



/*
IMPORT_PRIORITY:9
*/



class CMMetaView extends CCMetaView
{
	/***************************************************
	 * INTERFACE
	 */
	
	public function i_draw()
	{
		$lPageId_str = $this->__getMainData()->getURLParam(CCRequestParamConst::GET_PARAM_ID_PAGE);
		switch ($lPageId_str)
		{
			case CCPageConst::PAGE_ID_MAIN:
			{
				$lDescription_str = 'Работа в городах России и зарубежья. Вакансии и резюме.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			/*
			case CPageConst::PAGE_ID_PROMOTION:
			{
				$lDescription_str = 'Размещение рекламы на сайте о работе в городах России и зарубежья.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_RULES:
			{
				$lDescription_str = 'Правила пользования на сайте о работе в городах России и зарубежья.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_SUPPORT:
			{
				$lDescription_str = 'Техническая поддержка на сайте о работе в городах России и зарубежья.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_ERROR_404:
			{
				$lDescription_str = 'Ошибка 404.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			
			case CPageConst::PAGE_ID_ERROR_403:
			{
				$lDescription_str = 'Ошибка 403';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			
			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			{
				$lDescription_str = 'Доступ запрещен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			
			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			{
				$lDescription_str = 'Доступ ограничен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lDescription_str = 'Доступ невозможен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$lDescription_str = 'Доступ временно невозможен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
*/
			default:
				$lDescription_str = 'Работа в городах России и зарубежья. Вакансии и резюме.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			break;
		}
		
		echo
		'<meta name="description" content="' .$lDescription_str. '">',
 		'<meta name="keywords" content="' .$lKeywords_str. '">';
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMLogoutFormView extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	
	protected function __getId()
	{
		return CFieldIdConst::FORM_LOGOUT;
	}

	
	protected function __getAction()
	{
		$lStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID => CPageConst::PAGE_ID_MAIN);
		return CURLConversion::generateURLByStaticParams($lStaticParams_obj_arr);
	}
	
	
	protected function __getJSFormComponentSubmitButtonId()
	{
		return CRequestConst::REQUEST_ID_LOGOUT;
	}
	
	
	protected function __getJSFormComponentHiddenFieldId()
	{
		return CFieldIdConst::FORM_LOGOUT_HIDDEN;
	}
	
	
	protected function __getClasses()
	{
		return 'css_logout_form ' .parent::__getClasses();
	}


	protected function __draw()
	{
		$this->__drawBody();
	}
	
	
	protected function __bodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSubdescriptionTextComponentView_clss = $lComponentsView_clss->getTextComponentsView()->getSubdescriptionTextComponentView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();
		
		//login
		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $this->__getUserData()->getUserLogin(),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_01',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_01_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		
		//button
		$lParams_obj_arr 	= array(CSubmitButtonComponentView::PARAM_ID				=> $this->__getJSFormComponentSubmitButtonId(),
									CSubmitButtonComponentView::PARAM_NAME				=> CFieldNameConst::BUTTON_EXIT,
									CSubmitButtonComponentView::PARAM_CLASSES			=> 'css_button_component_01',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES	=> 'css_button_component_01_element css_blue');
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);
		
		//separator
		$lComponentsView_clss->drawSeparator();

		//administration
		if ($this->__getUserData()->isAdmin() || $this->__getUserData()->isModerator())
		{
			$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
												CParamConst::PAGE_ID => CPageConst::PAGE_ID_REGISTRATION);

			$lParams_obj_arr 	= array(CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByStaticParams($lURLStaticParams_obj_arr),
										CSubdescriptionTextComponentView::PARAM_VALUE			=> CFieldNameConst::FORM_LOGOUT_ADMIN,
										CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_02',
										CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_02_element');
			$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		}

		//account
		$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID => CPageConst::PAGE_ID_USER);

		$lParams_obj_arr 	= array(CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByStaticParams($lURLStaticParams_obj_arr ),
									CSubdescriptionTextComponentView::PARAM_VALUE			=> CFieldNameConst::FORM_LOGOUT_ACCOUNT,
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_03',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_03_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		
		//hidden
		$lParams_obj_arr 	= array(CHiddenTextfieldComponentView::PARAM_ID					=> $this->__getJSFormComponentHiddenFieldId(),
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookie(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_99');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}
}




/*
IMPORT_PRIORITY:8
*/



class CMAuthorizationFormView extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/


	protected function __getId()
	{
		return CFieldIdConst::FORM_AUTHORIZATION;
	}


	protected function __getJSFormComponentSubmitButtonId()
	{
		return CRequestConst::REQUEST_ID_AUTHORIZATION;
	}


	protected function __getClasses()
	{
		return 'css_authorization_form ' .parent::__getClasses();
	}


	protected function __getAction()
	{
		$lStaticParams_obj_arr = array(	CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID => CPageConst::PAGE_ID_AUTHORIZATION);
		return CURLConversion::generateURLByStaticParams($lStaticParams_obj_arr);
	}


	protected function __drawHeaderContent()
	{
		return CFieldNameConst::FORM_AUTHORIZATION;
	}


	protected function __drawBodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSimpleCheckboxComponentView_clss = $lComponentsView_clss->getCheckboxComponentsView()->getSimpleCheckboxComponentView();

		$lUserComponentFilledData_clss = $this->__getUserComponentFilledData();
		$lAuthorizationFormTranslationData_clss = $this->__getFormsTranslationData()->getAuthorizationFormTranslationData();

		//labellist
		/*$lPageId_str = $this->__getMainData()->getParam(CParamConst::PAGE_ID);
		$lData_arr = $this->__getComponentData()->getAuthorizationLabelListData();
		
		$lParams_arr	= array(CComponentParam::LABELLIST_TYPE				=> CLabelList::TYPE_NAVIGATION_MENU,
								CComponentParam::LABELLIST_ELEMENTS 		=> CTools::getElementsFromComponentData($lData_arr, $lPageId_str));
		$lComponentsView_clss->getLabellist()->draw($lParams_arr);*/

		//login
		$lLoginTextfieldData_clss = $lAuthorizationFormTranslationData_clss->getLoginTextfieldData();

		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_AUTHORIZATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_NAME				=> $lLoginTextfieldData_clss->getName(),//CFieldNameConst::FORM_AUTHORIZATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_VALUE				=> $this->__getUserComponentFilledData()->getComponentValue(CFieldIdConst::FORM_AUTHORIZATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_FILLING_MODE		=> $this->__getUserComponentFilledData()->getComponentValueFillingMode(CFieldIdConst::FORM_AUTHORIZATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_AUTHORIZATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lLoginTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_LOGIN, CTools::REPLACING_PATTERN_CHARS_COUNT),
									CSimpleTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_01',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_01_element');
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);
		
		//password
		$lPasswordTextfieldData_clss = $lAuthorizationFormTranslationData_clss->getPasswordTextfieldData();

		$lParams_obj_arr	= array(CPasswordTextfieldComponentView::PARAM_ID				=> CFieldIdConst::FORM_AUTHORIZATION_PASSWORD,
									CPasswordTextfieldComponentView::PARAM_NAME				=> $lPasswordTextfieldData_clss->getName(),//CFieldNameConst::FORM_AUTHORIZATION_PASSWORD,
									CPasswordTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_AUTHORIZATION_PASSWORD,
									CPasswordTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lPasswordTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_PASSWORD, CTools::REPLACING_PATTERN_CHARS_COUNT),
									CPasswordTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_02',
									CPasswordTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_02_element');
		$lTextfieldComponentsView_clss->getPasswordTextfieldComponentView()->draw($lParams_obj_arr);
		
		//remember me
		$lParams_obj_arr	= array(CSimpleCheckboxComponentView::PARAM_ID 					=> CFieldIdConst::FORM_AUTHORIZATION_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_POST_NAME			=> $lAuthorizationFormTranslationData_clss->getRememberMeCheckboxData()->getPostName(),//CFieldNameConst::FORM_AUTHORIZATION_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_CLASSES				=> 'css_checkbox_component_01',
									CSimpleCheckboxComponentView::PARAM_ELEMENT_CLASSES		=> 'css_checkbox_component_01_element');
		$lSimpleCheckboxComponentView_clss->draw($lParams_obj_arr);
		
		//hidden
		$lParams_obj_arr	= array(CHiddenTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_AUTHORIZATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_AUTHORIZATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_hidden_textfield_component');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}


	protected function __drawFooterContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();

		$lAuthorizationFormTranslationData_clss = $this->__getFormsTranslationData()->getAuthorizationFormTranslationData();

		//button
		$lParams_obj_arr	= array(CSubmitButtonComponentView::PARAM_ID				=> $this->__getJSFormComponentSubmitButtonId(),
									CSubmitButtonComponentView::PARAM_NAME				=> $lAuthorizationFormTranslationData_clss->getSubmitButtonData()->getName(),//CFieldNameConst::BUTTON_ENTER,
									CSubmitButtonComponentView::PARAM_CLASSES			=> 'css_button_component_01',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES	=> 'css_button_component_01_element css_blue');
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);
	}
}




/*
IMPORT_PRIORITY:8
*/



class CMLoginFormView extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	
	protected function __getId()
	{
		return CFieldIdConst::FORM_LOGIN;
	}

	
	protected function __getJSFormComponentSubmitButtonId()
	{
		return CRequestConst::REQUEST_ID_LOGIN;
	}
	

	protected function __getClasses()
	{
		return 'css_login_form ' .parent::__getClasses();
	}


	protected function __draw()
	{
		$this->__drawBody();
	}


	protected function __drawBodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSubdescriptionTextComponentView_clss = $lComponentsView_clss->getTextComponentsView()->getSubdescriptionTextComponentView();
		$lSimpleCheckboxComponentView_clss = $lComponentsView_clss->getCheckboxComponentsView()->getSimpleCheckboxComponentView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();

		$lUserComponentFilledData_clss = $this->__getUserComponentFilledData();
		$lLoginFormTranslationData_clss = $this->__getFormsTranslationData()->getLoginFormTranslationData();

		//login
		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID						=> CFieldIdConst::FORM_LOGIN_LOGIN,
									CSimpleTextfieldComponentView::PARAM_CAPTION				=> $lLoginFormTranslationData_clss->getLoginTextfieldData()->getCaption(),//CFieldNameConst::FORM_LOGIN_LOGIN,
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT		=> CFieldLengthConst::FORM_LOGIN_LOGIN,
									CSimpleTextfieldComponentView::PARAM_VALUE					=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_LOGIN),
									//CSimpleTextfieldComponent::IS_MANDATORY_FIELD_PARAM		=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_LOGIN),
									CSimpleTextfieldComponentView::PARAM_CLASSES				=> 'css_textfield_component_01',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES		=> 'css_textfield_component_01_element');
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);

		//password
		$lParams_obj_arr	= array(CSecureTextfieldComponentView::PARAM_ID						=> CFieldIdConst::FORM_LOGIN_PASSWORD,
									CSecureTextfieldComponentView::PARAM_CAPTION				=> $lLoginFormTranslationData_clss->getPasswordTextfieldData()->getCaption(),//CFieldNameConst::FORM_LOGIN_PASSWORD,
									CSecureTextfieldComponentView::PARAM_MAX_CHARS_COUNT		=> CFieldLengthConst::FORM_LOGIN_PASSWORD,
									CSecureTextfieldComponentView::PARAM_VALUE					=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_PASSWORD),
									//CSecureTextfieldComponentView::IS_MANDATORY_FIELD_PARAM		=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_PASSWORD),
									CSecureTextfieldComponentView::PARAM_CLASSES				=> 'css_textfield_component_02',
									CSecureTextfieldComponentView::PARAM_ELEMENT_CLASSES		=> 'css_textfield_component_02_element');
		$lTextfieldComponentsView_clss->getSecureTextfieldComponentView()->draw($lParams_obj_arr);

		//submit
		$lParams_obj_arr	= array(CSubmitButtonComponentView::PARAM_ID				=> $this->__getJSFormComponentSubmitButtonId(),
									CSubmitButtonComponentView::PARAM_NAME				=> $lLoginFormTranslationData_clss->getSubmitButtonData()->getName(),//CFieldNameConst::BUTTON_ENTER,
									CSubmitButtonComponentView::PARAM_CLASSES			=> 'css_button_component_01',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES	=> 'css_button_component_01_element css_blue');
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);

		//separator
		$lComponentsView_clss->drawSeparator();

		//remember me
		$lParams_obj_arr	= array(CSimpleCheckboxComponentView::PARAM_ID					=> CFieldIdConst::FORM_LOGIN_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_POST_NAME			=> $lLoginFormTranslationData_clss->getRememberMeCheckboxData()->getPostName(),//CFieldNameConst::FORM_LOGIN_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_VALUE				=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_REMEMBER),
									//CSimpleCheckboxComponent::IS_MANDATORY_FIELD_PARAM	=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_REMEMBER),
									CSimpleCheckboxComponentView::PARAM_CLASSES				=> 'css_checkbox_component_01',
									CSimpleCheckboxComponentView::PARAM_ELEMENT_CLASSES		=> 'css_checkbox_component_01_element');
		$lSimpleCheckboxComponentView_clss->draw($lParams_obj_arr);

		//recovery password
		$lStaticURLParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_RECOVERY_PASSWORD);

		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $lLoginFormTranslationData_clss->getRecoveryPasswordTextData()->getValue(),//CFieldNameConst::FORM_LOGIN_RECOVERY_PASSWORD,
									CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByParams($lStaticURLParams_obj_arr),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_01',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_01_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);

		//separator
		$lComponentsView_clss->drawSeparator();

		//registration
		$lStaticURLParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_REGISTRATION);

		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $lLoginFormTranslationData_clss->getRegistrationTextData()->getValue(),//CFieldNameConst::FORM_LOGIN_REGISTRATION,
									CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByParams($lStaticURLParams_obj_arr),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_02',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_02_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);

		//hidden
		$lParams_obj_arr	= array(CHiddenTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_LOGIN_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_LOGIN_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_hidden_textfield_component');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}
}




/*
IMPORT_PRIORITY:8
*/



class CMAccessErrorPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		/*$lAccessErrorMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessErrorMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessErrorMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_ERROR_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);

		$lParamFileNames_str_arr = array($lAccessErrorMessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_EMAIL => CMainConst::SITE_SUPPORT_EMAIL);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessErrorMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMLeftSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="left">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_LEFT;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMHeaderSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="header">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_HEADER;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMContentSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="content">',
			$this->__draw(),
		'</div>';

		//$this->__getModulesView()->getEventsView()->update();//----
		//$this->__getModulesView()->getEventsView()->draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_CONTENT;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMFooterSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="footer">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_FOOTER;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMPostContentSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="post_content">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_POST_CONTENT;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMAuthorizationPageSectionView extends CMPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		//$this->__getModulesView()->getFormsView()->getAuthorizationFormView()->draw();
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMMainPageSectionView extends CMPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		/*$this->__banners()->draw(CBannerConst::TYPE_CONTENT_TOP);

		//heading description
		$lCityData_arr = $this->__databaseData()->cityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);

		$lParams_str_arr 	= array(CModuleParam::INFO_ID		=> CJOBFieldIdConst::INFO_JOB_HEADING_DESCRIPTION,
									CModuleParam::INFO_NAME 	=> 'Вакансии ' .$lCityData_arr[CDatabaseConst::TABLE_CITY_SEO],
									CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:0 2px; background-color:#fefef1;');
		$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

		$lParams_str_arr 	= array(CModuleParam::INFO_ID		=> CJOBFieldIdConst::INFO_JOB_HEADING_DESCRIPTION_2,
									CModuleParam::INFO_NAME 	=> 'Резюме ' .$lCityData_arr[CDatabaseConst::TABLE_CITY_SEO],
									CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:0 2px; background-color:#fefef1; display:none;');
		$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

		//search content
		$this->__forms()->customForms()->jobForms()->getSearchContentForm()->draw();

		//category navigation
		$lParams_str_arr = array(CModuleParam::INFO_ID => 'category_navigation');
		$this->__infos()->customInfos()->jobInfos()->getNavigationsInfo()->getCategoryNavigationInfo()->draw($lParams_str_arr);

		//vacancy content
		$lContentData_arr = $this->__databaseJobData()->vacancyData(CJOBDatabaseData::TYPE_VACANCY_DATA);
		if ($lContentData_arr)
		{
			//heading description
			$lParams_str_arr 	= array(CModuleParam::INFO_NAME 	=> 'Последние вакансии',
										CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:2px; background-color:#fefef1;');
			$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

			$lParams_str_arr = array(CModuleParam::INFO_STYLE => 'width:382px; vertical-align:top; height:130px; display:inline-block;');
			$lCount_int = count($lContentData_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$this->__infos()->customInfos()->jobInfos()->getContentsInfo()->getVipVacancyContentInfo()->draw($lContentData_arr[$i], $lParams_str_arr);
			}
		}

		//site description
		$lCityData_arr = $this->__databaseData()->cityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
		$lRegionData_arr = $this->__databaseData()->regionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);

		$lValue_str = str_replace(CViewConst::REPLACE_NAME, SITE_NAME, CViewConst::SITE_MAIN_MESSAGE_DESCRIPTION);
		$lValue_str = str_replace(CViewConst::REPLACE_CITY, $lCityData_arr[CDatabaseConst::TABLE_CITY_SEO], $lValue_str);
		$lValue_str = str_replace(CViewConst::REPLACE_REGION, $lRegionData_arr[CDatabaseConst::TABLE_REGION_SEO], $lValue_str);

		$lParams_str_arr 	= array(CModuleParam::MESSAGE_NAME 					=> CViewConst::SITE_MAIN_MESSAGE_NAME,
									CModuleParam::MESSAGE_VALUE 				=> $lValue_str,
									CModuleParam::MESSAGE_BUTTON_CLOSE_STATE 	=> CModuleParam::BUTTON_STATE_HIDDEN);
		$this->__modules()->messages()->informationMessage()->draw($lParams_str_arr);*/
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMSelectCityPageSectionView extends CMPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		//$this->__getForms()->getSelectCityForm()->draw();
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMPreContentSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="pre_content">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_PRE_CONTENT;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMRightSectionView extends CMSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		echo
		'<div id="right">',
			$this->__draw(),
		'</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getSectionId()
	{
		return CMViewConst::SECTION_ID_RIGHT;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMErrorPageSectionsView extends CMPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected function __getXmlFileData()
	{
		return CXmlFileData::getInstance();
	}

	protected function __getMessagesTranslationData()
	{
		return $this->__getXmlFileData()->getTranslationXmlFileData()->getInfosTranslationData()->getMessagesTranslationData();
	}

	protected function __drawHeaderSection()
	{
		//must be empty
	}

	protected function __drawPreContentSection()
	{
		//must be empty
	}

	protected function __drawLeftSection()
	{
		//must be empty
	}

	protected function __drawFloatLeftSection()
	{
		//must be empty
	}

	protected function __drawRightSection()
	{
		//must be empty
	}

	protected function __drawFloatRightSection()
	{
		//must be empty
	}

	protected function __drawPostContentSection()
	{
		//must be empty
	}

	protected function __drawFooterSection()
	{
		//must be empty
	}*/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlInfosNodeParser extends CCTranslationXmlInfosNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlInfosNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXmlMessagesInfoNodeParser::NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlMessagesInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlInfosNode::i_CHILD_NODE_INDEX_MESSAGES);
			}break;

			default:
				CCXmlNodeParser::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFormsNodeParser extends CCTranslationXmlFormsNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlFormsNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlLoginFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlLoginFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_LOGIN_FORM);
			}break;

			case CMTranslationXmlAuthorizationFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlAuthorizationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_AUTHORIZATION_FORM);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlRegistrationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_REGISTRATION_FORM);
			}break;
			
			case CMTranslationXmlPaymentFormNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlPaymentFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_PAYMENT_FORM);
			}break;
			
			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFormMessagesNodeParser extends CCTranslationXmlFormMessagesNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlFormMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlPageNodeParser extends CCTranslationXmlPageNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlPageNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlPagesNodeParser extends CCTranslationXmlPagesNodeParser
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlPagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlMainPageNodeParser::NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlMainPageNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlPagesNode::i_CHILD_NODE_INDEX_MAIN_PAGE);
			}break;

			/*case CMTranslationXmlLoginFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlLoginFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_LOGIN_FORM);
			}break;

			case CMTranslationXmlAuthorizationFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlAuthorizationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_AUTHORIZATION_FORM);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlRegistrationFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_REGISTRATION_FORM);
			}break;*/
			
			case CMTranslationXmlPaymentFormNodeParser::NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlPaymentFormNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CCTranslationXmlFormsNode::i_CHILD_NODE_INDEX_PAYMENT_FORM);
			}break;
			
			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlMessageInfoNodeParser extends CCTranslationXmlMessageInfoNodeParser
{
	public const i_CHILD_NODE_ID_MESSAGE_NAME			= 'message_name';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlMessageInfoNode($aNameNode_str, $aOptParentNode_clss);
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlMessagesInfoNodeParser extends CCTranslationXmlMessagesInfoNodeParser
{
	public const i_NODE_NAME							= 'messages';

	private const _CHILD_NODE_ID_ACCESS_PROHIBITION_MESSAGE		= 'access_prohibition_message';
	private const _CHILD_NODE_ID_ACCESS_REQUIREMENT_MESSAGE		= 'access_requirement_message';
	private const _CHILD_NODE_ID_ACCESS_ERROR_MESSAGE			= 'access_error_message';
	private const _CHILD_NODE_ID_ACCESS_RESTRICTION_MESSAGE		= 'access_restriction_message';
	private const _CHILD_NODE_ID_ERROR_403_MESSAGE				= 'error_403_message';
	private const _CHILD_NODE_ID_ERROR_404_MESSAGE				= 'error_404_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlMessagesInfoNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_PROHIBITION_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_PROHIBITION_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_REQUIREMENT_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_REQUIREMENT_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_ERROR_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_ERROR_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ACCESS_RESTRICTION_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_RESTRICTION_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ERROR_403_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_403_MESSAGE);
			}break;

			case CCTranslationXmlMessagesInfoNodeParser::_CHILD_NODE_ID_ERROR_404_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlMessageInfoNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_404_MESSAGE);
			}break;

			default:
				CCXmlNodeParser::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



final class CMMysqlDatabaseCountriesTableController extends CCMysqlDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}
}



/*
IMPORT_PRIORITY:8
*/



final class CMMysqlDatabaseRegionsTableController extends CCMysqlDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}
}



/*
IMPORT_PRIORITY:8
*/



final class CMCachesController extends CCCachesController
{
	//private static $_fDatabase_obj;
	
	//protected $__fQuery_str = '';


	/***************************************************
	 * INTERFACE
	 */

	/*public function setDatabase($aDatabase_obj)
	{
		self::$_fDatabase_obj = $aDatabase_obj;
	}

	public function getDatabase()
	{
		return self::$_fDatabase_obj;
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected function __getMainData()
	{
		return CMainData::getInstance();
	}

	protected function __getUserData()
	{
		return CUserData::getInstance();
	}

	protected function __updateDatabaseInfo()
	{
		CSystem::instance()->updateDatabaseQueriesCount();
	}*/
}



/*
IMPORT_PRIORITY:8
*/



final class CMMysqlDatabaseCitiesTableController extends CCMysqlDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*public function getDataByRegionId($aRegionId_int, $aOptTableRows_str_arr = null)
	{
		$aRegionId_int = $this->__validateNumberValue($aRegionId_int);

		$lSelect_str = $this->__getSelectParams($aOptTableRows_str_arr);

		$this->__fQuery_str = 'select ' .$lSelect_str. '
								from ' .CDatabaseConst::TABLE_CITY. '
								where ' .CDatabaseConst::TABLE_CITY_REGION_ID. ' = ' .$aRegionId_int;
		
		return $this->__select();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlRootNodeParser extends CCTranslationXmlRootNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlRootNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CCTranslationXmlPagesNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->i_insertNode(CMTranslationXmlPagesNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRootNode::CHILD_NODE_ID_PAGES);
			}break;

			/*case CCTranslationXmlFormsNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlFormsNodeParser::parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRootNode::CHILD_NODE_ID_FORMS);
			}break;

			case CCTranslationXmlInfosNodeParser::i_NODE_NAME:
			{
				$aParentNode_clss->insertNode(CMTranslationXmlInfosNodeParser::parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRootNode::CHILD_NODE_ID_INFOS);
			}break;*/

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFormNodeParser extends CCTranslationXmlFormNodeParser
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlFormNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:8
*/



final class CMMysqlDatabaseUsersTableController extends CCMysqlDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*public function addUserData($aOptParams_obj_arr = null)
	{
		return $this->___addData($aOptParams_obj_arr);
	}

	public function getUserData($aOptParams_obj_arr = null, $aOptDataIndexAsDatabaseId_bl = false)
	{
		$lParams_str = $this->__getSelectParams($aOptParams_obj_arr);

		$lQuery_str = 'select sql_calc_found_rows ' .$lParams_str. '
						from ' .$this->__getTableName(). '
						where ' .CUserTableData::TABLE_FIELD_STATE. ' != ' .CControlParamConst::USER_STATE_UNKNOWN;

		return $this->__sendSelectQuery($lQuery_str, $aOptDataIndexAsDatabaseId_bl);
	}

	public function getUserDataByLogin($aLogin_str, $aOptParams_obj_arr = null)
	{
		$aLogin_str = CTools::convertToLowerCase($aLogin_str);
		$aLogin_str = $this->__validateStringValue($aLogin_str);

		$lParams_str = $this->__getSelectParams($aOptParams_obj_arr);

		$lQuery_str = 'select ' .$lParams_str. '
						from ' .$this->__getTableName(). '
						where LOWER(' .CDatabaseConst::TABLE_USER_LOGIN. ') = ' .$aLogin_str. '
						limit 0,1';
		
		return $this->__sendSelectQuery($lQuery_str);
	}

	public function getUserDataByEmail($aEmail_str, $aOptParams_obj_arr = null)
	{
		$aEmail_str = CTools::convertToLowerCase($aEmail_str);
		$aEmail_str = $this->__validateStringValue($aEmail_str);

		$lParams_str = $this->__getSelectParams($aOptParams_obj_arr);

		$lQuery_str = 'select ' .$lParams_str. '
						from ' .$this->__getTableName(). '
						where LOWER(' .CDatabaseConst::TABLE_USER_EMAIL. ') = ' .$aEmail_str. '
						limit 0,1';
		
		return $this->__sendSelectQuery($lQuery_str);
	}*/
/*
	public function getDataCountByStates($aOptUserId_int = 0, $aOptUseCityId_bl = true)
	{
		$lUserIdSearching_str = !empty($aOptUserId_int) ? ' and ' .CDatabaseConst::COMMON_TABLE_USER_ID. ' = ' .$aOptUserId_int : '';
		$lCityIdSearching_str = '';

		$this->__fQuery_str	= 'select count(' .CDatabaseConst::COMMON_TABLE_ID. ') as ' .CDatabaseConst::ADDITIONAL_TABLE_COUNT. ',
								(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_ACTIVATED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_ACTIVATED_COUNT. '\',
								(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_DEACTIVATED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_DEACTIVATED_COUNT. '\',
								(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_EMAIL_VERIFICATION_WAITING. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_EMAIL_VERIFICATION_WAITING_COUNT. '\',
								(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_BANNED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_BANNED_COUNT. '\',
								(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_BLOCKED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_BLOCKED_COUNT. '\',
								(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_DELETED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_DELETED_COUNT. '\'
								from ' .$this->__getTableName(). '
								where ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::USER_STATE_UNKNOWN. '
								' .$lUserIdSearching_str. '
								' .$lCityIdSearching_str;

		return $this->__select();
	}

	public function updateDataByVerificationKey($aVerificationKey_str, $aOptTableRows_str_arr = null)
	{
		$aVerificationKey_str = $this->__validateStringValue($aVerificationKey_str);

		$fSet_str = $this->__getUpdateParams($aOptTableRows_str_arr);

		$this->__fQuery_str = 'update ' .$this->__getTableName(). '
								set ' .$fSet_str. '
								where ' .CDatabaseConst::TABLE_USER_VERIFICATION_KEY. ' = ' .$aVerificationKey_str;

		return $this->__update();
	}

	public function setBlockedStateByStateExpireTime()
	{
		$lCurrentTime_int = CTime::getTime();

		$this->__fQuery_str = 'update ' .$this->__getTableName(). '
								set ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::STATE_BLOCKED. ',
									' .CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME. ' = ' .$lCurrentTime_int. '
								where ' .CDatabaseConst::COMMON_TABLE_STATE_EXPIRING_TIME. ' <= ' .$lCurrentTime_int. '
								and ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_EMAIL_VERIFICATION_WAITING;

		return $this->__update();
	}
*/
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}
/*
	protected function __transformParam($aName_str, $aValue_str)
	{
		switch ($aName_str)
		{
			case CDatabaseConst::TABLE_USER_IP_ADDRESS:
			{
				return $aName_str. ' = INET_ATON("' .$aValue_str. '")';
			}break;
		}

		return parent::__transformParam($aName_str, $aValue_str);
	}*/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFileController extends CCXmlFileController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_parseXmlFile($aFileName_str, $aNecessaryNodesFullNames_str_arr)
	{
		$lXmlDocument_sxmle = $this->__loadFile($aFileName_str);

		return CMTranslationXmlRootNodeParser::i_parseNode($lXmlDocument_sxmle, null, $aNecessaryNodesFullNames_str_arr);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlRootNode extends CCTranslationXmlRootNode
{
	public const i_CHILD_NODE_ID_PAGES					= 0;
	public const i_CHILD_NODE_ID_FORMS					= 1;
	public const i_CHILD_NODE_ID_INFOS					= 2;


	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getPagesNode()
	{
		return $this->i_getNode(CMTranslationXmlRootNode::i_CHILD_NODE_ID_PAGES);
	}

	public function ___getFormsNode()
	{
		return $this->i_getNode(CMTranslationXmlRootNode::i_CHILD_NODE_ID_FORMS);
	}

	public function ___getInfosNode()
	{
		return $this->i_getNode(CMTranslationXmlRootNode::i_CHILD_NODE_ID_INFOS);
	}
	//...INTERNAL

	public function i_getPagesTranslationData()
	{
		return $this->___getPagesNode();
	}

	public function i_getFormsTranslationData()
	{
		return $this->___getFormsNode();
	}

	public function i_getInfosTranslationData()
	{
		return $this->___getInfosNode();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMAccessRestrictionPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lAccessRestrictionMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessRestrictionMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessRestrictionMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_RESTRICTION_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);

		$lParamFileNames_str_arr = array($lAccessRestrictionMessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_SITE_FULL_NAME => SITE_FULL_NAME);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessRestrictionMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMAccessRequirementPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		/*$lAccessRequirementMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessRequirementMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessRequirementMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_REQUIREMENT_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);
		$lParamFileNames_str_arr = array($lAccessRequirementMessageFileName_str);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessRequirementMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlPagesNode extends CCTranslationXmlPagesNode
{
	public const i_CHILD_NODE_INDEX_MAIN_PAGE			= 0;
	public const i_CHILD_NODE_INDEX_PAYMENT_PAGE		= 1;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getMainPageNode()
	{
		return $this->i_getNode(CMTranslationXmlPagesNode::i_CHILD_NODE_INDEX_MAIN_PAGE);
	}
	
	public function ___getPaymentPageNode()
	{
		return $this->i_getNode(CMTranslationXmlPagesNode::i_CHILD_NODE_INDEX_PAYMENT_PAGE);
	}
	//...INTERNAL

	public function i_getMainPageTranslationData()
	{
		return $this->___getMainPageNode();
	}

	public function i_getPaymentPageTranslationData()
	{
		return $this->___getPaymentPageNode();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMRequestsController
{
	private $_fAuthorizationRequestController_clss;
	private $_fLoginRequestController_clss;
	private $_fRegistrationRequestController_clss;
	private $_fPaymentRequestController_clss;
	/*private $_fLogoutRequestController_clss;
	private $_fSelectCityRequestController_clss;
*/


	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function update()
	{
		$lSiteId_str = $this->__getMainData()->getURLParam(CCRequestParamConst::GET_PARAM_ID_SITE);
		switch ($lSiteId_str)
		{
			case CCSiteConst::SITE_ID_MAIN:
			{
				$this->__update();
			}break;

			default:
				//$this->_getCustomRequestsController()->update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __init()
	{
	}

	protected function __getMainData()
	{
		return CMainManager::getInstance()->getMainData();
	}

	protected function __getAvailableCommonRequests()
	{
		return CRequestConst::$AVAILABLE_COMMON_REQUESTS;
	}

	protected function __update()
	{
		$lPostParamRequestId_str = $this->__getMainData()->getPostParamRequestId();
		if (empty($lPostParamRequestId_str))
		{
			return;
		}

		$lAvailableCommonRequests_str_arr = $this->__getAvailableCommonRequests();
		if (!in_array($lPostParamRequestId_str, $lAvailableCommonRequests_str_arr))
		{
			new CException('__update', 'Unavailable request id: ' .$lPostParamRequestId_str);
		}

		switch ($lPostParamRequestId_str)
		{
			case CMRequestConst::REQUEST_ID_LOGIN:
			{
				$this->_getLoginRequestController()->update();
			}break;

			case CMRequestConst::REQUEST_LOGOUT:
			{
				$this->_getLogoutRequestController()->update();
			}break;

			case CMRequestConst::REQUEST_ID_REGISTRATION:
			{
				$this->_getRegistrationRequestController()->update();
			}break;

			case CMRequestConst::REQUEST_ID_AUTHORIZATION:
			{
				$this->_getAuthorizationRequestController()->update();
			}break;
			
			case CMRequestConst::REQUEST_ID_PAYMENT:
			{
				$this->_getPaymentRequestController()->update();
			}break;
			
			/*
			case CMRequestConst::REQUEST_SELECT_CITY:
			{
				$this->_getSelectCityRequestController()->update();
			}break;
*/

			default:
				new CException('__update', 'Unsupported post param request id: ' .$lPostParamRequestId_str);
			break;
		}
	}

	private function _getAuthorizationRequestController()
	{
		return isset($this->_fAuthorizationRequestController_clss) ? $this->_fAuthorizationRequestController_clss : ($this->_fAuthorizationRequestController_clss = new CAuthorizationRequestController());
	}

	private function _getLoginRequestController()
	{
		return isset($this->_fLoginRequestController_clss) ? $this->_fLoginRequestController_clss : ($this->_fLoginRequestController_clss = new CLoginRequestController());
	}

	private function _getLogoutRequestController()
	{
		return isset($this->_fLogoutRequestController_clss) ? $this->_fLogoutRequestController_clss : ($this->_fLogoutRequestController_clss = new CLogoutRequestController());
	}

	private function _getRegistrationRequestController()
	{
		return isset($this->_fRegistrationRequestController_clss) ? $this->_fRegistrationRequestController_clss : ($this->_fRegistrationRequestController_clss = new CRegistrationRequestController());
	}
	
	private function _getPaymentRequestController()
	{
		return isset($this->_fPaymentRequestController_clss) ? $this->_fPaymentRequestController_clss : ($this->_fPaymentRequestController_clss = new CMPaymentRequestController());
	}
	
	private function _getSelectCityRequestController()
	{
		return isset($this->_fSelectCityRequestController_clss) ? $this->_fSelectCityRequestController_clss : ($this->_fSelectCityRequestController_clss = new CSelectCityRequestController());
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMSelectCityForm extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	
	protected function __getId()
	{
		return CFieldIdConst::FORM_SELECT_CITY;
	}


	protected function __getAction()
	{
		return CURLConversion::getRealURLByParams(array(CParamConst::SITE => CSiteConst::SITE_MAIN,
														CParamConst::PAGE => CPageConst::PAGE_SELECT_CITY));
	}
	

	protected function __headerContent()
	{
		return CFieldNameConst::FORM_SELECT_CITY;
	}
	
	
	protected function __bodyContent()
	{
		$lCookieCityId_int = $this->__getHostData()->getCookie(CMainConst::COOKIE_USER_CITY_ID);

		//labellist
		$lCityData_arr = $this->__getDatabaseData()->getCityData(CDatabaseData::TYPE_CITY_DATA_BY_TYPE);
		if (!$lCityData_arr)
		{
			throw new Exception('City Data By Type is undefined', CMainConst::ERROR_TYPE_403);
		}

		$lElements_arr = null;
		
		$lCount_int = count($lCityData_arr);
		foreach ($lCityData_arr as $lData_arr)
		{
			$lCityId_int = $lData_arr[CDatabaseConst::TABLE_CITY_ID];
			$lCityName_str = $lData_arr[CDatabaseConst::TABLE_CITY_NAME];

			$lParams_arr 	= array(CParamConst::SITE 	=> CSiteConst::SITE_MAIN,
									CParamConst::PAGE 	=> CPageConst::PAGE_SELECT_CITY);

			$lState_str = $lCityId_int == $lCookieCityId_int ? CComponentParam::ELEMENT_STATE_SELECTED : CComponentParam::ELEMENT_STATE_ENABLED;
			$lElements_arr[] 	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> $lCityName_str,
										CComponentParam::ELEMENT_PARAM_HREF 	=> CURLConversion::getRealURLByParams($lParams_arr, array(CParamConst::CITY_ID => $lCityId_int)),
										CComponentParam::ELEMENT_PARAM_STATE 	=> $lState_str);
		}
		
		$lLength_int = ceil($lCount_int / 4);

		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, 0, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);

		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, $lLength_int, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);
		
		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, $lLength_int * 2, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);
		
		//labellist
		$lParams_arr 	= array(CComponentParam::LABELLIST_TYPE	 			=> CLabelList::TYPE_NAVIGATION_CATEGORY,
								CComponentParam::LABELLIST_ELEMENTS	 		=> array_slice($lElements_arr, $lLength_int * 3, $lLength_int),
								CComponentParam::LABELLIST_STYLE			=> 'vertical-align:top; display:inline-block;',
								CComponentParam::LABELLIST_STYLE_COMPONENT	=> 'width:190px;');
		$this->__getComponents()->getLabellist()->draw($lParams_arr);
		
		//separator
		$this->__getComponents()->getSeparator();
		
		//select city
		$lRegionData_arr = $this->__getDatabaseData()->getRegionData(CDatabaseData::TYPE_REGION_DATA);
		$lElements_arr = CTools::getElementsFromData($lRegionData_arr, CDatabaseConst::TABLE_REGION_NAME, CDatabaseConst::TABLE_REGION_ID);
		
		$lJsChange_str = 'listboxSetComponentStateDisabled(\'' .CFieldIdConst::FORM_SELECT_CITY_REGION. '\', \'button_' .CRequestConst::REQUEST_SELECT_CITY. '\');';
		
		$lComponents_arr[CSelectCityCompositeComponent::LISTBOX_COMPONENT_REGION] 	= array(CComponentParam::COMPONENT_PARAM_ID 				=> CFieldIdConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_TRANSMIT 			=> CTransmitConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_ELEMENTS 			=> $lElements_arr,
																							CComponentParam::COMPONENT_PARAM_VALUE	 			=> '',
																							CComponentParam::COMPONENT_PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_SELECT_REGION,
																							CComponentParam::COMPONENT_PARAM_REQUIRED_FILLED	=> $this->__getUserFieldsData()->isFormFieldNeedFilled(CTransmitConst::FORM_SELECT_CITY_REGION),
																							CComponentParam::COMPONENT_PARAM_JS_CHANGE			=> $lJsChange_str);

		$lJsChange_str = 'listboxUpdateComponentState(\'' .CFieldIdConst::FORM_SELECT_CITY_CITY. '\', \'button_' .CRequestConst::REQUEST_SELECT_CITY. '\');';

		$lComponents_arr[CSelectCityCompositeComponent::LISTBOX_COMPONENT_CITY] 		= array(CComponentParam::COMPONENT_PARAM_ID 			=> CFieldIdConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_TRANSMIT 			=> CTransmitConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_ELEMENTS 			=> null,
																							CComponentParam::COMPONENT_PARAM_VALUE	 			=> '',
																							CComponentParam::COMPONENT_PARAM_REQUIRED_FILLED 	=> $this->__getUserFieldsData()->isFormFieldNeedFilled(CTransmitConst::FORM_SELECT_CITY_CITY),
																							CComponentParam::COMPONENT_PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_SELECT_CITY,
																							CComponentParam::COMPONENT_PARAM_JS_CHANGE			=> $lJsChange_str);

		$lParams_arr = array(CComponentParam::COMPOSITE_COMPONENTS => $lComponents_arr);
		$this->__getComponents()->getCompositeComponents()->getSelectCityCompositeComponent()->draw($lParams_arr);

		//button
		$lParams_arr 	= array(CComponentParam::BUTTON_ID 					=> CRequestConst::REQUEST_SELECT_CITY,
								CComponentParam::BUTTON_NAME 				=> CFieldNameConst::BUTTON_SET,
								CComponentParam::BUTTON_TYPE 				=> CButton::TYPE_SUBMIT,
								CComponentParam::BUTTON_COLOR 				=> CButton::COLOR_BLUE,
								CComponentParam::BUTTON_STATE 				=> CButton::STATE_DISABLED,
								CComponentParam::BUTTON_STYLE 				=> 'display:inline-block;');
		$this->__getComponents()->getButton()->draw($lParams_arr);

		//hidden
		$lParams_arr 	= array(CComponentParam::TEXTFIELD_ID 				=> CFieldIdConst::FORM_SELECT_CITY_HIDDEN,
								CComponentParam::TEXTFIELD_TRANSMIT 		=> CTransmitConst::FORM_SELECT_CITY_HIDDEN,
								CComponentParam::TEXTFIELD_VALUE 			=> $this->__getHostData()->getCookie(CMainConst::COOKIE_ANTI_SPAM),
								CComponentParam::TEXTFIELD_NUM_CHARS 		=> CFieldLengthConst::HIDDEN,
								CComponentParam::TEXTFIELD_TYPE 			=> CTextField::TYPE_HIDDEN,
								CComponentParam::TEXTFIELD_STYLE 			=> 'padding:0;');
		$this->__getComponents()->getTextfield()->draw($lParams_arr);
	}
}




/*
IMPORT_PRIORITY:8
*/



class CMRegistrationFormView extends CMFormView
{
	//JS PHP AGREEMENTS...
	const JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD			= 0;
	//...JS PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getId()
	{
		return CFieldIdConst::FORM_REGISTRATION;
	}

	protected function __isJSSupportAllowed()
	{
		return true;
	}

	protected function __initJS()
	{
		$lComponentValidationParams_obj_arr = CRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD;
		$lRegistrationEventView_clss = CModulesView::getInstance()->getEventsView()->getRegistrationEventView();

		$lJSComponentValidationParams_obj_arr = $this->__generateJSComponentValidationParams($lComponentValidationParams_obj_arr, $lRegistrationEventView_clss);

		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.jsSetFormAttrs(\'' .CJSTools::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		lJSForm_clss.jsSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';
	}

	protected function __drawJS()
	{
		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.jsInitDOMForm();';
	}

	protected function __getJSForm()
	{
		return 'bsp.JSCMain.jsGetPages().jsGetRegistrationPage().jsGetModules().jsGetForms().jsGetRegistrationForm()';
	}

	protected function __getClasses()
	{
		return 'css_registration_form ' .parent::__getClasses();
	}

	protected function __getAction()
	{
		$lStaticParams_obj_arr = array(	CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_REGISTRATION);
		return CURLConversion::generateURLByParams($lStaticParams_obj_arr);
	}

	protected function __drawHeaderContent()
	{
		return CFieldNameConst::FORM_REGISTRATION;
	}

	protected function __drawBodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSimpleCheckboxComponentView_clss = $lComponentsView_clss->getCheckboxComponentsView()->getSimpleCheckboxComponentView();

		$lUserComponentFilledData_clss = $this->__getUserComponentFilledData();
		$lRegistrationFormTranslationData_clss = $this->__getFormsTranslationData()->getRegistrationFormTranslationData();

		//labellist
		/*$lPage_str = $this->__getMainData()->getParam(CParamConst::PAGE);
		$lData_arr = $this->__getComponentData()->getAuthorizationLabelListData();
		
		$lParams_arr	= array(CComponentParam::LABELLIST_TYPE				=> CLabelList::TYPE_NAVIGATION_MENU,
								CComponentParam::LABELLIST_ELEMENTS 		=> CTools::getElementsFromComponentData($lData_arr, $lPage_str));
		$lComponents_clss->getLabellist()->draw($lParams_arr);*/

		//text
		/*$lParams_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
								CComponentParam::TEXT_NAME 					=> CTools::replace(CFieldDescriptionConst::TEXT_READ_RULES, CPageConst::PAGE_RULES, CViewConst::REPLACE_HREF),
								CComponentParam::TEXT_STYLE_COMPONENT 		=> 'text-align:left;');
		$lComponents_clss->getText()->draw($lParams_arr);*/
		
		//login
		$lLoginTextfieldData_clss = $lRegistrationFormTranslationData_clss->getLoginTextfieldData();

		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID							=> CFieldIdConst::FORM_REGISTRATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_NAME						=> $lLoginTextfieldData_clss->getName(),
									CSimpleTextfieldComponentView::PARAM_VALUE						=> $this->__getUserComponentFilledData()->getComponentValue(CFieldIdConst::FORM_REGISTRATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_FILLING_MODE				=> $this->__getUserComponentFilledData()->getComponentValueFillingMode(CFieldIdConst::FORM_REGISTRATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT			=> CFieldLengthConst::FORM_REGISTRATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_DESCRIPTION				=> CTools::replace($lLoginTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_LOGIN, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CSimpleTextfieldComponentView::PARAM_CLASSES					=> 'css_textfield_component_login',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES			=> 'css_textfield_component_login_element',
									CSimpleTextfieldComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									CSimpleTextfieldComponentView::PARAM_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc());
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);

		//password
		$lPasswordTextfieldData_clss = $lRegistrationFormTranslationData_clss->getPasswordTextfieldData();

		$lParams_obj_arr	= array(CSecureTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_PASSWORD,
									CSecureTextfieldComponentView::PARAM_NAME				=> $lPasswordTextfieldData_clss->getName(),
									CSecureTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_PASSWORD,
									CSecureTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lPasswordTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_PASSWORD, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CSecureTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_password',
									CSecureTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_password_element');
		$lTextfieldComponentsView_clss->getSecureTextfieldComponentView()->draw($lParams_obj_arr);
		
		//repeat password
		$lRepeatPasswordTextfieldData_clss = $lRegistrationFormTranslationData_clss->getRepeatPasswordTextfieldData();

		$lParams_obj_arr	= array(CSecureTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_REPEAT_PASSWORD,
									CSecureTextfieldComponentView::PARAM_NAME				=> $lRepeatPasswordTextfieldData_clss->getName(),
									CSecureTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_REPEAT_PASSWORD,
									CSecureTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lRepeatPasswordTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_PASSWORD, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CSecureTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_repeat_password',
									CSecureTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_repeat_password_element');
		$lTextfieldComponentsView_clss->getSecureTextfieldComponentView()->draw($lParams_obj_arr);

		//email
		$lEmailTextfieldData_clss = $lRegistrationFormTranslationData_clss->getEmailTextfieldData();

		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_EMAIL,
									CSimpleTextfieldComponentView::PARAM_NAME				=> $lEmailTextfieldData_clss->getName(),
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_EMAIL,
									CSimpleTextfieldComponentView::PARAM_DESCRIPTION		=> $lEmailTextfieldData_clss->getDescription(),
									CSimpleTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_email',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_email_element');
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);
		
		//hidden
		$lParams_obj_arr	= array(CHiddenTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_hidden_textfield_component');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}

	protected function __drawFooterContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();

		$lRegistrationFormTranslationData_clss = $this->__getFormsTranslationData()->getRegistrationFormTranslationData();

		//button
		$lParams_obj_arr	= array(CSubmitButtonComponentView::PARAM_ID						=> CRequestConst::REQUEST_ID_REGISTRATION,
									CSubmitButtonComponentView::PARAM_NAME						=> $lRegistrationFormTranslationData_clss->getSubmitButtonData()->getName(),
									CSubmitButtonComponentView::PARAM_CLASSES					=> 'css_button_component_submit',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES			=> 'css_button_component_submit_element css_blue',
									CSubmitButtonComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
									CSubmitButtonComponentView::PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc());
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);
		
		//text
		/*$lParams_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
								CComponentParam::TEXT_NAME 					=> CFieldDescriptionConst::TEXT_FIELD_REQUIRED,
								CComponentParam::TEXT_STYLE					=> 'float:right;',
								CComponentParam::TEXT_STYLE_COMPONENT 		=> 'text-align:right;');
		$lComponents_clss->getText()->draw($lParams_arr);*/
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMAccessProhibitionPageSectionsView extends CMAccessPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lAccessProhibitionMessageTranslationData_clss = $this->__getMessagesTranslationData()->getAccessProhibitionMessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lAccessProhibitionMessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ACCESSES_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ACCESS_PROHIBITION_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);

		$lParamFileNames_str_arr = array($lAccessProhibitionMessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_EMAIL => CMainConst::SITE_SUPPORT_EMAIL);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lAccessProhibitionMessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMFormsMessagesView extends CCFormsMessagesView
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlPageNode extends CCTranslationXmlPageNode
{
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	//...INTERNAL
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFormMessagesNode extends CCTranslationXmlFormMessagesNode
{
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getEmptyMandatoryFieldsMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlFormMessagesNode::i_CHILD_NODE_INDEX_EMPTY_MANDATORY_FIELDS_MESSAGE);
	}
	//...INTERNAL

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFormsNode extends CCTranslationXmlFormsNode
{
	public const i_CHILD_NODE_INDEX_LOGIN_FORM			= 0;
	public const i_CHILD_NODE_INDEX_AUTHORIZATION_FORM	= 1;
	public const i_CHILD_NODE_INDEX_REGISTRATION_FORM	= 2;
	public const i_CHILD_NODE_INDEX_PAYMENT_FORM		= 3;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getLoginFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_LOGIN_FORM);
	}

	public function ___getAuthorizationFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_AUTHORIZATION_FORM);
	}

	public function ___getRegistrationFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_REGISTRATION_FORM);
	}
	
	public function ___getPaymentFormNode()
	{
		return $this->i_getNode(CMTranslationXmlFormsNode::i_CHILD_NODE_INDEX_PAYMENT_FORM);
	}
	//...INTERNAL

	public function i_getLoginFormTranslationData()
	{
		return $this->___getLoginFormNode();
	}

	public function i_getAuthorizationFormTranslationData()
	{
		return $this->___getAuthorizationFormNode();
	}

	public function i_getRegistrationFormTranslationData()
	{
		return $this->___getRegistrationFormNode();
	}
	
	public function i_getPaymentFormTranslationData()
	{
		return $this->___getPaymentFormNode();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlFormNode extends CCTranslationXmlFormNode
{
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getFormNameNode()
	{
		return $this->i_getNode(CMTranslationXmlFormNode::i_CHILD_NODE_INDEX_FORM_NAME);
	}

	public function ___getFormMessagesNode()
	{
		return $this->i_getNode(CMTranslationXmlFormNode::i_CHILD_NODE_INDEX_FORM_MESSAGES);
	}

	public function ___getSubmitButtonNode()
	{
		return $this->i_getNode(CMTranslationXmlFormNode::i_CHILD_NODE_INDEX_SUBMIT_BUTTON);
	}
	//...INTERNAL
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlInfosNode extends CCTranslationXmlInfosNode
{
	public const i_CHILD_NODE_INDEX_MESSAGES			= 0;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getMessagesTranslationNode()
	{
		return $this->i_getNode(CMTranslationXmlInfosNode::i_CHILD_NODE_INDEX_MESSAGES);
	}
	//...INTERNAL

	public function i_getMessagesTranslationData()
	{
		return $this->___getMessagesTranslationNode();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlMessagesInfoNode extends CCTranslationXmlMessagesInfoNode
{
	public const i_CHILD_NODE_INDEX_ACCESS_REQUIREMENT_MESSAGE	= 0;
	public const i_CHILD_NODE_INDEX_ACCESS_RESTRICTION_MESSAGE	= 1;
	public const i_CHILD_NODE_INDEX_ACCESS_ERROR_MESSAGE		= 2;
	public const i_CHILD_NODE_INDEX_ACCESS_PROHIBITION_MESSAGE	= 3;
	public const i_CHILD_NODE_INDEX_ERROR_403_MESSAGE			= 4;
	public const i_CHILD_NODE_INDEX_ERROR_404_MESSAGE			= 5;

	
	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getAccessRequirementMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_REQUIREMENT_MESSAGE);
	}

	public function ___getAccessRestrictionMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_RESTRICTION_MESSAGE);
	}

	public function ___getAccessErrorMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_ERROR_MESSAGE);
	}

	public function ___getAccessProhibitionMessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ACCESS_PROHIBITION_MESSAGE);
	}

	public function ___getError403MessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_403_MESSAGE);
	}

	public function ___getError404MessageNode()
	{
		return $this->i_getNode(CMTranslationXmlMessagesInfoNode::i_CHILD_NODE_INDEX_ERROR_404_MESSAGE);
	}
	//...INTERNAL

	public function i_getAccessRequirementMessageTranslationData()
	{
		return $this->___getAccessRequirementMessageNode();
	}

	public function i_getAccessRestrictionMessageTranslationData()
	{
		return $this->___getAccessRestrictionMessageNode();
	}

	public function i_getAccessErrorMessageTranslationData()
	{
		return $this->___getAccessErrorMessageNode();
	}

	public function i_getAccessProhibitionMessageTranslationData()
	{
		return $this->___getAccessProhibitionMessageNode();
	}

	public function i_getError403MessageTranslationData()
	{
		return $this->___getError403MessageNode();
	}

	public function i_getError404MessageTranslationData()
	{
		return $this->___getError404MessageNode();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:8
*/



class CMRegistrationPageSectionView extends CMPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		//$this->__getFormsView()->getRegistrationFormView()->draw();
	}
}



/*
IMPORT_PRIORITY:8
*/



class CMTranslationXmlMessageInfoNode extends CCTranslationXmlMessageInfoNode
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_getMessageName()
	{
		return $this->___getMessageNameNode()->i_getNodeValue();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:7
*/



class CMError403PageSectionsView extends CMErrorPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lError403MessageTranslationData_clss = $this->__getMessagesTranslationData()->getError403MessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lError403MessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ERRORS_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ERROR_403_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);
		$lParamFileNames_str_arr = array($lError403MessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_SITE_FULL_NAME => SITE_FULL_NAME);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lError403MessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMError404PageSectionsView extends CMErrorPageSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	protected function __drawContentSection()
	{
		/*$lError404MessageTranslationData_clss = $this->__getMessagesTranslationData()->getError404MessageTranslationData();

		$lLangId_str = $this->__getMainData()->getParam(CParamConst::LANG_ID);

		$lError404MessageFileName_str = CTools::replace(CFileConst::TRANSLATIONS_ERRORS_MESSAGES_COMMON_DIRECTORY_NAME . CFileConst::ERROR_404_MESSAGE_FILE_NAME, $lLangId_str, CTools::REPLACING_PATTERN_LANG_ID);
		$lParamFileNames_str_arr = array($lError404MessageFileName_str);
		$lParamReplacingParams_obj_arr = array(CTools::REPLACING_PATTERN_SITE_FULL_NAME => SITE_FULL_NAME);

		$lParams_obj_arr	= array(CInformationMessageInfoView::PARAM_NAME						=> $lError404MessageTranslationData_clss->getMessageName(),
									CInformationMessageInfoView::PARAM_FILE_NAMES				=> $lParamFileNames_str_arr,
									CInformationMessageInfoView::PARAM_REPLACING_PARAMS			=> $lParamReplacingParams_obj_arr,
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> false);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_obj_arr);*/
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMTranslationXmlRegistrationFormNodeParser extends CMTranslationXmlFormNodeParser
{
	public const i_NODE_NAME							= 'registration_form';

	private const _CHILD_NODE_ID_LOGIN_TEXTFIELD			= 'login_textfield';
	private const _CHILD_NODE_ID_PASSWORD_TEXTFIELD			= 'password_textfield';
	private const _CHILD_NODE_ID_REPEAT_PASSWORD_TEXTFIELD	= 'repeat_password_textfield';
	private const _CHILD_NODE_ID_EMAIL_TEXTFIELD			= 'email_textfield';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlRegistrationFormNode($aNameNode_str, $aOptParentNode_clss);
	}*/

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			/*case CMTranslationXmlRegistrationFormNodeParser::__CHILD_NODE_ID_FORM_MESSAGES:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlRegistrationFormMessagesNodeParser::parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_FORM_MESSAGES);
			}break;*/

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_LOGIN_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_LOGIN_TEXTFIELD);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_PASSWORD_TEXTFIELD);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_REPEAT_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_REPEAT_PASSWORD_TEXTFIELD);
			}break;

			case CMTranslationXmlRegistrationFormNodeParser::_CHILD_NODE_ID_EMAIL_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlRegistrationFormNode::i_CHILD_NODE_INDEX_EMAIL_TEXTFIELD);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMTranslationXmlRegistrationFormMessagesNodeParser extends CMTranslationXmlFormMessagesNodeParser
{
	private const _CHILD_NODE_NAME_USER_ALREADY_EXIST_MESSAGE	= 'user_already_exist_message';
	private const _CHILD_NODE_NAME_LOGIN_DATA_EMPTY_MESSAGE		= 'login_data_empty_message';


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlRegistrationFormMessagesNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlRegistrationFormMessagesNodeParser::_CHILD_NODE_NAME_USER_ALREADY_EXIST_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlRegistrationFormMessagesNode::i_CHILD_NODE_INDEX_USER_ALREADY_EXIST_MESSAGE);
			}break;

			case CMTranslationXmlRegistrationFormMessagesNodeParser::_CHILD_NODE_NAME_LOGIN_DATA_EMPTY_MESSAGE:
			{
				$aParentNode_clss->i_insertNode(parent::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlRegistrationFormMessagesNode::i_CHILD_NODE_INDEX_LOGIN_DATA_EMPTY_MESSAGE);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMTranslationXmlMainPageNodeParser extends CMTranslationXmlPageNodeParser
{
	public const i_NODE_NAME							= 'main_page';

	private const _CHILD_NODE_ID_TITLE					= 'title';
	private const _CHILD_NODE_ID_META_KEYWORDS			= 'meta_keywords';
	private const _CHILD_NODE_ID_META_DESCRIPTION		= 'meta_description';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlMainPageNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlMainPageNodeParser::_CHILD_NODE_ID_TITLE:
			{
				$aParentNode_clss->i_insertNode(CCXmlNodeParser::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_TITLE);
			}break;

			case CMTranslationXmlMainPageNodeParser::_CHILD_NODE_ID_META_KEYWORDS:
			{
				$aParentNode_clss->i_insertNode(CCXmlNodeParser::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_KEYWORDS);
			}break;

			case CMTranslationXmlMainPageNodeParser::_CHILD_NODE_ID_META_DESCRIPTION:
			{
				$aParentNode_clss->i_insertNode(CCXmlNodeParser::i_parseSimpleNode($aChildNode_sxmle, $aChildNodeName_str, $aParentNode_clss), CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_DESCRIPTION);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMTranslationXmlLoginFormNodeParser extends CMTranslationXmlFormNodeParser
{
	public const i_NODE_NAME							= 'login_form';

	private const _CHILD_NODE_ID_LOGIN_TEXTFIELD		= 'login_textfield';
	private const _CHILD_NODE_ID_PASSWORD_TEXTFIELD		= 'password_textfield';
	private const _CHILD_NODE_ID_REMEMBER_ME_CHECKBOX	= 'remember_me_checkbox';
	private const _CHILD_NODE_ID_REGISTRATION_TEXT		= 'registration_text';
	private const _CHILD_NODE_ID_RECOVERY_PASSWORD_TEXT	= 'recovery_password_text';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlLoginFormNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_LOGIN_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_LOGIN_TEXTFIELD);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_PASSWORD_TEXTFIELD);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_REMEMBER_ME_CHECKBOX:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlCheckboxComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_REMEMBER_ME_CHECKBOX);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_REGISTRATION_TEXT:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_REGISTRATION_TEXT);
			}break;

			case CmTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_RECOVERY_PASSWORD_TEXT:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlLoginFormNode::i_CHILD_NODE_INDEX_RECOVERY_PASSWORD_TEXT);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:7
*/



final class CMMysqlDatabaseTablesController
{
	private $_fMysqlDatabaseUsersTableController_clss;
	private $_fMysqlDatabaseCitiesTableController_clss;
	private $_fMysqlDatabaseRegionsTableController_clss;
	private $_fMysqlDatabaseCountriesTableController_clss;


	public function __construct()
	{
		$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_getMysqlDatabaseUsersTableController()
	{
		return $this->_getMysqlDatabaseUsersTableController();
	}

	public function i_getMysqlDatabaseCitiesTableController()
	{
		return $this->_getMysqlDatabaseCitiesTableController();
	}

	public function i_getMysqlDatabaseRegionsTableController()
	{
		return $this->_getMysqlDatabaseRegionsTableController();
	}

	public function i_getMysqlDatabaseCountriesTableController()
	{
		return $this->_getMysqlDatabaseCountriesTableController();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	private function _init()
	{
	}

	private function _getMysqlDatabaseUsersTableController()
	{
		return isset($this->_fMysqlDatabaseUsersTableController_clss) ?  $this->_fMysqlDatabaseUsersTableController_clss : ($this->_fMysqlDatabaseUsersTableController_clss = new CMMysqlDatabaseUsersTableController());
	}

	private function _getMysqlDatabaseCitiesTableController()
	{
		return isset($this->_fMysqlDatabaseCitiesTableController_clss) ?  $this->_fMysqlDatabaseCitiesTableController_clss : ($this->_fMysqlDatabaseCitiesTableController_clss = new CMMysqlDatabaseCitiesTableController());
	}

	private function _getMysqlDatabaseRegionsTableController()
	{
		return isset($this->_fMysqlDatabaseRegionsTableController_clss) ?  $this->_fMysqlDatabaseRegionsTableController_clss : ($this->_fMysqlDatabaseRegionsTableController_clss = new CMMysqlDatabaseRegionsTableController());
	}

	private function _getMysqlDatabaseCountriesTableController()
	{
		return isset($this->_fMysqlDatabaseCountriesTableController_clss) ?  $this->_fMysqlDatabaseCountriesTableController_clss : ($this->_fMysqlDatabaseCountriesTableController_clss = new CMMysqlDatabaseCountriesTableController());
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMXmlFilesController extends CCXmlFilesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __generateTranslationXmlFileController()
	{
		return new CMTranslationXmlFileController();
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMTranslationXmlAuthorizationFormNodeParser extends CMTranslationXmlFormNodeParser
{
	public const i_NODE_NAME							= 'authorization_form';

	private const _CHILD_NODE_ID_LOGIN_TEXTFIELD		= 'login_textfield';
	private const _CHILD_NODE_ID_PASSWORD_TEXTFIELD		= 'password_textfield';
	private const _CHILD_NODE_ID_REMEMBER_ME_CHECKBOX	= 'remember_me_checkbox';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected static function __generateXmlNode($aNameNode_str, CCXmlNode $aOptParentNode_clss = null):CCXmlNode
	{
		return new CMTranslationXmlAuthorizationFormNode($aNameNode_str, $aOptParentNode_clss);
	}

	protected static function __parseChildNode($aChildNodeName_str, \SimpleXMLElement $aChildNode_sxmle, CCXmlNode $aParentNode_clss, $aNecessaryNodesFullNames_str_arr)
	{
		switch ($aChildNodeName_str)
		{
			case CMTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_LOGIN_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlAuthorizationFormNode::i_CHILD_NODE_INDEX_LOGIN_TEXTFIELD);
			}break;

			case CMTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_PASSWORD_TEXTFIELD:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlTextfieldComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlAuthorizationFormNode::i_CHILD_NODE_INDEX_PASSWORD_TEXTFIELD);
			}break;

			case CMTranslationXmlLoginFormNodeParser::_CHILD_NODE_ID_REMEMBER_ME_CHECKBOX:
			{
				$aParentNode_clss->i_insertNode(CCTranslationXmlCheckboxComponentNodeParser::i_parseNode($aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr), CMTranslationXmlAuthorizationFormNode::i_CHILD_NODE_INDEX_REMEMBER_ME_CHECKBOX);
			}break;

			default:
				parent::__parseChildNode($aChildNodeName_str, $aChildNode_sxmle, $aParentNode_clss, $aNecessaryNodesFullNames_str_arr);
			break;
		}
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMTranslationXmlMainPageNode extends CMTranslationXmlPageNode
{
	/*indexes updating required for classes descendents*/
	public const i_CHILD_NODE_INDEX_TITLE				= 0;
	public const i_CHILD_NODE_INDEX_META_KEYWORDS		= 1;
	public const i_CHILD_NODE_INDEX_META_DESCRIPTION	= 2;
	public const i_COMMON_CHILD_NODES_COUNT				= 3;


	/***************************************************
	 * INTERFACE
	 */

	//INTERNAL...
	public function ___getTitleNode()
	{
		return $this->i_getNode(CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_TITLE);
	}

	public function ___getMetaKeywordsNode()
	{
		return $this->i_getNode(CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_KEYWORDS);
	}

	public function ___getMetaDescriptionNode()
	{
		return $this->i_getNode(CMTranslationXmlMainPageNode::i_CHILD_NODE_INDEX_META_DESCRIPTION);
	}
	//...INTERNAL

	public function i_getTitle()
	{
		return $this->___getTitleNode()->i_getNodeValue();
	}

	public function i_getMetaKeywords()
	{
		return $this->___getMetaKeywordsNode()->i_getNodeValue();
	}

	public function i_getMetaDescription()
	{
		return $this->___getMetaDescriptionNode()->i_getNodeValue();
	}

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:7
*/



class CMFormsView
{
	private $_fRegistrationFormView_clss;
	private $_fPaymentFormView_clss;

	
	public function __construct()
	{
		$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */
	
	public function getRegistrationFormView()
	{
		return $this->_getRegistrationFormView();
	}
	
	public function getPaymentFormView()
	{
		return $this->_getPaymentFormView();
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	private function _init()
	{
	}

	private function _getRegistrationFormView()
	{
		return isset($this->_fRegistrationFormView_clss) ? $this->_fRegistrationFormView_clss : ($this->_fRegistrationFormView_clss = new CMRegistrationFormView());
	}
	
	private function _getPaymentFormView()
	{
		return isset($this->_fPaymentFormView_clss) ? $this->_fPaymentFormView_clss : ($this->_fPaymentFormView_clss = new CMPaymentFormView());
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMSectionsView extends CCSectionsView
{
	private $_fHeaderSectionView_clss;
	private $_fPreContentSectionView_clss;
	private $_fContentSectionView_clss;
	private $_fLeftSectionView_clss;
	private $_fRightSectionView_clss;
	private $_fPostContentSectionView_clss;
	private $_fFooterSectionView_clss;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getViewData()
	{
		return CViewManager::getInstance()->getViewsData()->getMainViewData();
	}

	protected function __getHeaderSectionView()
	{
		return isset($this->_fHeaderSectionView_clss) ? $this->_fHeaderSectionView_clss : ($this->_fHeaderSectionView_clss = new CMHeaderSectionView());
	}

	protected function __getPreContentSectionView()
	{
		return isset($this->_fPreContentSectionView_clss) ? $this->_fPreContentSectionView_clss : ($this->_fPreContentSectionView_clss = new CMPreContentSectionView());
	}

	protected function __getContentSectionView()
	{
		return isset($this->_fContentSectionView_clss) ? $this->_fContentSectionView_clss : ($this->_fContentSectionView_clss = new CMContentSectionView());
	}

	protected function __getLeftSectionView()
	{
		return isset($this->_fLeftSectionView_clss) ? $this->_fLeftSectionView_clss : ($this->_fLeftSectionView_clss = new CMLeftSectionView());
	}

	protected function __getRightSectionView()
	{
		return isset($this->_fRightSectionView_clss) ? $this->_fRightSectionView_clss : ($this->_fRightSectionView_clss = new CMRightSectionView());
	}

	protected function __getPostContentSectionView()
	{
		return isset($this->_fPostContentSectionView_clss) ? $this->_fPostContentSectionView_clss : ($this->_fPostContentSectionView_clss = new CMPostContentSectionView());
	}

	protected function __getFooterSectionView()
	{
		return isset($this->_fFooterSectionView_clss) ? $this->_fFooterSectionView_clss : ($this->_fFooterSectionView_clss = new CMFooterSectionView());
	}
}



/*
IMPORT_PRIORITY:7
*/



class CMPagesSectionsView
{
	/*private $_fAccessProhibitionPageSectionView_clss;
	private $_fAccessErrorPageSectionView_clss;
	private $_fAccessRequirementPageSectionView_clss;
	private $_fAccessRestrictionPageSectionView_clss;
	private $_fError403PageSectionView_clss;
	private $_fError404PageSectionView_clss;*/
	private $_fMainPageSectionView_clss;
	private $_fPaymentPageSectionView_clss;
	/*private $_fRegistrationPageSectionView_clss;
	private $_fAuthorizationPageSectionView_clss;
	private $_fSelectCityPageSectionView_clss;
*/
	
	
	public function __construct()
	{
		$this->_init();
	}
	
	/***************************************************
	 * INTERFACE
	 */

	public function getMainPageSectionView()
	{
		return $this->_getMainPageSectionView();
	}
	
	public function getPaymentPageSectionView()
	{
		return $this->_getPaymentPageSectionView();
	}
	/*
	public function getRegistrationPageSectionView()
	{
		return $this->_getRegistrationPageSectionView();
	}
	
	public function getAuthorizationPageSectionView()
	{
		return $this->_getAuthorizationPageSectionView();
	}

	public function getSelectCityPageSectionView()
	{
		return $this->_getSelectCityPageSectionView();
	}

	public function getAccessProhibitionPageSectionView()
	{
		return $this->_getAccessProhibitionPageSectionView();
	}

	public function getAccessErrorPageSectionView()
	{
		return $this->_getAccessErrorPageSectionView();
	}

	public function getAccessRequirementPageSectionView()
	{
		return $this->_getAccessRequirementPageSectionView();
	}

	public function getAccessRestrictionPageSectionView()
	{
		return $this->_getAccessRestrictionPageSectionView();
	}

	public function getError403PageSectionView()
	{
		return $this->_getError403PageSectionView();
	}

	public function getError404PageSectionView()
	{
		return $this->_getError404PageSectionView();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/
	
	private function _init()
	{
	}
	
	private function _getMainPageSectionView()
	{
		return isset($this->_fMainPageSectionView_clss) ? $this->_fMainPageSectionView_clss : ($this->_fMainPageSectionView_clss = new CMMainPageSectionView());
	}
	
	private function _getPaymentPageSectionView()
	{
		return isset($this->_fPaymentPageSectionView_clss) ? $this->_fPaymentPageSectionView_clss : ($this->_fPaymentPageSectionView_clss = new CMPaymentPageSectionView());
	}
	/*
	private function _getRegistrationPageSectionView()
	{
		return isset($this->_fRegistrationPageSectionView_clss) ? $this->_fRegistrationPageSectionView_clss : ($this->_fRegistrationPageSectionView_clss = new CRegistrationPageSectionView());
	}
	
	private function _getAuthorizationPageSectionView()
	{
		return isset($this->_fAuthorizationPageSectionView_clss) ? $this->_fAuthorizationPageSectionView_clss : ($this->_fAuthorizationPageSectionView_clss = new CAuthorizationPageSectionView());
	}

	private function _getSelectCityPageSectionView()
	{
		return isset($this->_fSelectCityPageSectionView_clss) ? $this->_fSelectCityPageSectionView_clss : ($this->_fSelectCityPageSectionView_clss = new CSelectCityPageSectionView());
	}

	private function _getAccessProhibitionPageSectionView()
	{
		return isset($this->_fAccessProhibitionPageSectionView_clss) ? $this->_fAccessProhibitionPageSectionView_clss : ($this->_fAccessProhibitionPageSectionView_clss = new CAccessProhibitionPageSectionsView());
	}

	private function _getAccessErrorPageSectionView()
	{
		return isset($this->_fAccessErrorPageSectionView_clss) ? $this->_fAccessErrorPageSectionView_clss : ($this->_fAccessErrorPageSectionView_clss = new CAccessErrorPageSectionsView());
	}

	private function _getAccessRequirementPageSectionView()
	{
		return isset($this->_fAccessRequirementPageSectionView_clss) ? $this->_fAccessRequirementPageSectionView_clss : ($this->_fAccessRequirementPageSectionView_clss = new CAccessRequirementPageSectionsView());
	}

	private function _getAccessRestrictionPageSectionView()
	{
		return isset($this->_fAccessRestrictionPageSectionView_clss) ? $this->_fAccessRestrictionPageSectionView_clss : ($this->_fAccessRestrictionPageSectionView_clss = new CAccessRestrictionPageSectionsView());
	}

	private function _getError403PageSectionView()
	{
		return isset($this->_fError403PageSectionView_clss) ? $this->_fError403PageSectionView_clss : ($this->_fError403PageSectionView_clss = new CError403PageSectionsView());
	}

	private function _getError404PageSectionView()
	{
		return isset($this->_fError404PageSectionView_clss) ? $this->_fError404PageSectionView_clss : ($this->_fError404PageSectionView_clss = new CError404PageSectionsView());
	}*/
}



/*
IMPORT_PRIORITY:7
*/



class CMDialogsView extends CCDialogsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}



/*
IMPORT_PRIORITY:5
*/



class CMAjaxesController extends CCAjaxesController
{
	private $_fCitiesAjaxController_clss;
	private $_fRegionsAjaxController_clss;
	private $_fUsersAjaxController_clss;


	/***************************************************
	 * INTERFACE
	 */

	public function i_update()
	{
		$lGetParamAjaxRequestId_str = $this->__getMainData()->i_getGetParamAjaxRequest();
		switch ($lGetParamAjaxRequestId_str)
		{
			default:
				parent::i_update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getCitiesAjaxController()
	{
		return isset($this->_fCitiesAjaxController_clss) ? $this->_fCitiesAjaxController_clss : ($this->_fCitiesAjaxController_clss = new CMCitiesAjaxController());
	}

	private function _getRegionsAjaxController()
	{
		return isset($this->_fRegionsAjaxController_clss) ? $this->_fRegionsAjaxController_clss : ($this->_fRegionsAjaxController_clss = new CMRegionsAjaxController());
	}

	private function _getUsersAjaxController()
	{
		return isset($this->_fUsersAjaxController_clss) ? $this->_fUsersAjaxController_clss : ($this->_fUsersAjaxController_clss = new CMUsersAjaxController());
	}
}



/*
IMPORT_PRIORITY:5
*/



class CMViewsController extends CCViewsController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//FORMS MESSAGES...
	protected function __generateFormsMessagesController()
	{
		return new CCFormsMessagesController();
	}
	//...FORMS MESSAGES
}








class CPanelsInfo
{
	private $_fSelectCityPanelInfo_clss;
	private $_fContentControlsAdminPanelInfo_clss;

	
	public function __construct()
	{
		$this->_init();
	}
	
	
	/***************************************************
	 * INTERFACE
	 */

	
	public function getSelectCityPanelInfo()
	{
		return $this->_getSelectCityPanelInfo();
	}


	public function getContentControlsAdminPanelInfo()
	{
		return $this->_getContentControlsAdminPanelInfo();
	}


	/*
	 * INTERFACE
	 ***************************************************/


	private function _init()
	{
	}
	
	
	private function _getSelectCityPanelInfo()
	{
		return isset($this->_fSelectCityPanelInfo_clss) ? $this->_fSelectCityPanelInfo_clss : ($this->_fSelectCityPanelInfo_clss = new CSelectCityPanelInfo());
	}


	private function _getContentControlsAdminPanelInfo()
	{
		return isset($this->_fContentControlsAdminPanelInfo_clss) ? $this->_fContentControlsAdminPanelInfo_clss : ($this->_fContentControlsAdminPanelInfo_clss = new CContentControlsAdminPanelInfo());
	}
}









class CSelectCityPanelInfo extends CInfoBase
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	
	protected function __draw()
	{
		echo
		'<div class="module_info rounded_high" style="background:#ebf3fa; border:#a5c1dd solid 1px; margin:2px;">',
			$this->__module(),
		'</div>';
	}
	
	
	protected function __header()
	{
	}


	protected function __body()
	{
		echo
		'<div class="body_info" style="padding:0;">',
			$this->__bodyContent(),
		'</div>';
	}


	protected function __footer()
	{
	}
	
	
	protected function __bodyContent()
	{
		//user city
		$lCityData_arr = $this->__getDatabaseData()->getCityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
		$lRegionData_arr = $this->__getDatabaseData()->getRegionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);

		$lValue_str = $lCityData_arr[CDatabaseConst::TABLE_CITY_NAME]. '<br>(' .$lRegionData_arr[CDatabaseConst::TABLE_REGION_NAME]. ')';
		
		$lParams_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
								CComponentParam::TEXT_NAME 					=> $lValue_str,
								CComponentParam::TEXT_STYLE_COMPONENT 		=> 'font-weight:bold; text-align:center;');
		$this->__getComponents()->getText()->draw($lParams_arr);
		
		//select city button
		$lParams_arr 	= array(CComponentParam::BUTTON_NAME 				=> CFieldNameConst::BUTTON_SELECT_CITY,
								CComponentParam::BUTTON_TYPE 				=> CButton::TYPE_LINK,
								CComponentParam::BUTTON_COLOR 				=> CButton::COLOR_BLUE,
								CComponentParam::BUTTON_HREF 				=> CURLConversion::getRealURLByParams(array(CParamConst::SITE => CSiteConst::SITE_MAIN, CParamConst::PAGE => CPageConst::PAGE_SELECT_CITY)),
								CComponentParam::BUTTON_STYLE 				=> 'padding:2px; text-align:center;',
								CComponentParam::BUTTON_STYLE_COMPONENT 	=> 'display:inline-block;');
		$this->__getComponents()->getButton()->draw($lParams_arr);
	}
}









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








class CMSelectCityResponseController extends  CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		$lValidGETParams_str_arr 	= array(CParamConst::i_SITE 			=> true,
											CParamConst::i_PAGE 			=> true,
											CParamConst::i_ACTION 		=> true,
											CParamConst::i_SEARCHING_CITY => true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		parent::__update();

		$lCityId_int = $this->__getMainData()->i_getParam(CParamConst::i_CITY_ID);
		if ($lCityId_int)
		{
			$this->__getHostData()->i_addCookie(CMainConst::i_COOKIE_USER_CITY_ID, $lCityId_int, CControlParamConst::i_LIFE_TIME_ONE_YEAR);
			$this->__getMainData()->i_setRedirect(CPageConst::i_PAGE_MAIN);
		}
		else
		{
			$this->__getRegionResponseController()->i_getData();
			$this->__getCityResponseController()->i_getDataByType(CControlParamConst::i_CITY_TYPE_CAPITAL);
		}
	}
}








class CMPageResponsesController
{
	private $_fUserResponseController_clss;
	private $_fPaymentResponseController_clss;
	//static private $_fCityResponseController_clss;
	//static private $_fRegionResponseController_clss;
	//static private $_fCountryResponseController_clss;

	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_getUserResponseController()
	{
		return $this->_getUserResponseController();
	}
	
	public function i_getPaymentResponseController()
	{
		return $this->_getPaymentResponseController();
	}
	
	/*static public function getCityResponseController()
	{
		//return self::_getCityResponseController();
	}

	static public function getRegionResponseController()
	{
		//return self::_getRegionResponseController();
	}

	static public function getCountryResponseController()
	{
		//return self::_getCountryResponseController();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __init()
	{
	}

	private function _getUserResponseController()
	{
		return isset($this->_fUserResponseController_clss) ? $this->_fUserResponseController_clss : ($this->_fUserResponseController_clss = new CMUserResponseController());
	}
	
	private function _getPaymentResponseController()
	{
		return isset($this->_fPaymentResponseController_clss) ? $this->_fPaymentResponseController_clss : ($this->_fPaymentResponseController_clss = new CMPaymentResponseController());
	}
/*
	static private function _getCityResponseController()
	{
		//return isset(self::$_fCityResponseController_clss) ? self::$_fCityResponseController_clss : (self::$_fCityResponseController_clss = new CMCityResponseController());
	}

	static private function _getRegionResponseController()
	{
		//return isset(self::$_fRegionResponseController_clss) ? self::$_fRegionResponseController_clss : (self::$_fRegionResponseController_clss = new CMRegionResponseController());
	}

	static private function _getCountryResponseController()
	{
		//return isset(self::$_fCountryResponseController_clss) ? self::$_fCountryResponseController_clss : (self::$_fCountryResponseController_clss = new CMCountryResponseController());
	}*/
}








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








class CMainResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		//----throw new Exception('Unsupported main page', CMainConst::ERROR_TYPE_404);
	}
}








class CMAccessErrorResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $this->__getMainData()->getParam(CParamConst::PAGE);
		switch ($lPage_str)
		{
			case CPageConst::PAGE_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ERROR_403:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_403);
			}break;


			default:
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			break;
		}*/
	}
}








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








class CMError404ResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		$this->__getMainData()->i_setHttpHeader(CMainConst::i_HEADER_TYPE_NOT_FOUND);

		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $lMainData_clss->getParam(CParamConst::PAGE);
		switch ($lPage_str)
		{
			case CPageConst::PAGE_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ERROR_403:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_403);
			}break;


			default:
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			break;
		}*/
	}
}








class CMAccessRestrictionResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $lMainData_clss->getParam(CParamConst::PAGE);
		switch ($lPage_str)
		{
			case CPageConst::PAGE_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ERROR_403:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_403);
			}break;


			default:
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			break;
		}*/
	}
}








class CMAccessProhibitionResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $lMainData_clss->getParam(CParamConst::PAGE);
		switch ($lPage_str)
		{
			case CPageConst::PAGE_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ERROR_403:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_403);
			}break;


			default:
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			break;
		}*/
	}
}








class CMAccessRequirementResponseController extends CCResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __update()
	{
		/*$lValidGETParams_str_arr 	= array(CParamConst::SITE 			=> true,
											CParamConst::PAGE 			=> true);
		$this->__validateGETParamsByPage($lValidGETParams_str_arr);

		$lMainData_clss = $this->__getMainData();
		$lPage_str = $lMainData_clss->getParam(CParamConst::PAGE);
		switch ($lPage_str)
		{
			case CPageConst::PAGE_ERROR_404:
			{
				$lMainData_clss->setErrorType(CMainConst::ERROR_TYPE_404);
			}break;


			case CPageConst::PAGE_ERROR_403:
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