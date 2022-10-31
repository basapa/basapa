<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserAuthorizationRequestController extends CCRequestController
{
	private const _COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD	= [	self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserAuthorizationFormView::i_FORM_COMPONENT_ID_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCUserAuthorizationFormView::i_FILLING_MODE_FIELD_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::i_COMPONENT_VALUE_VALIDATION_PATTERN_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_ILLEGAL_CHARS,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_WRONG_CHARS_COUNT,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_LOGIN_EMPTY_DATA,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserAuthorizationFormView::i_MIN_CHARS_COUNT_FIELD_LOGIN,
																	self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserAuthorizationFormView::i_MAX_CHARS_COUNT_FIELD_LOGIN];

	private const _COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD	= [	self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserAuthorizationFormView::i_FORM_COMPONENT_ID_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCUserAuthorizationFormView::i_FILLING_MODE_FIELD_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::i_COMPONENT_VALUE_VALIDATION_PATTERN_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_ILLEGAL_CHARS,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_WRONG_CHARS_COUNT,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_PASSWORD_EMPTY_DATA,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserAuthorizationFormView::i_MIN_CHARS_COUNT_FIELD_PASSWORD,
																		self::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserAuthorizationFormView::i_MAX_CHARS_COUNT_FIELD_PASSWORD];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD];

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
		return $lFormsMessagesData_clss->i_getUserAuthorizationFormMessagesData();
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
		return CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = self::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lLoginTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD[$lComponentFieldId_str]);
		$lPasswordTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_PASSWORD_TEXTFIELD[$lComponentFieldId_str]);

		$lTableData_a_arr	= [	CCUsersTableData::i_TABLE_FIELD_LOGIN				=> $lLoginTextfieldComponentValue_str,
								CCUsersTableData::i_TABLE_FIELD_PASSWORD			=> $lPasswordTextfieldComponentValue_str];

		$this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController()->i_getMySQLDatabaseUsersTableController()->i_getUsersData($lTableData_a_arr);

		$this->__addFormMessageId(CCUserAuthorizationFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS);
	}
}


?>
