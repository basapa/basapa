<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserMessageAdditingRequestController extends CCRequestController
{
	public const i_COMPONENT_VALIDATION_PARAMS_USER_NAME_TEXTFIELD	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCUserMessageAdditingFormView::i_FORM_COMPONENT_ID_USER_NAME,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCFormComponentView::i_FILLING_MODE_ID_MANDATORY,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_USER_NAME_ILLEGAL_CHARS,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_USER_NAME_WRONG_CHARS_COUNT,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_USER_NAME_EMPTY_DATA,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCUserMessageAdditingFormView::i_MIN_CHARS_COUNT_FIELD_USER_NAME,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCUserMessageAdditingFormView::i_MAX_CHARS_COUNT_FIELD_USER_NAME];

	public const i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CCUserMessageAdditingFormView::i_FORM_COMPONENT_ID_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE									=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTAREA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE							=> CCFormComponentView::i_FILLING_MODE_ID_MANDATORY,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN				=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID			=> CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID		=> CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CCUserMessageAdditingFormView::i_MIN_CHARS_COUNT_FIELD_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CCUserMessageAdditingFormView::i_MAX_CHARS_COUNT_FIELD_MESSAGE];
																	
	public const i_COMPONENTS_VALIDATIONS_PARAMS	= [	self::i_COMPONENT_VALIDATION_PARAMS_USER_NAME_TEXTFIELD,
														self::i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA];
													
	public const i_COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [];
	
	public const i_COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/**@return CCUserMessageAdditingFormMessagesData*/
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getFormsMessagesData()->i_getUserMessageAdditingFormMessagesData();
	}

	/*override*/protected function __getComponentsValidationsParams():array
	{
		return self::i_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getCompositeComponentsValidationsParams():array
	{
		return self::i_COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS;
	}

	/*override*/protected function __getHiddenComponentValidationParams():array
	{
		return self::i_COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD;
	}

	/*override*/protected function __getEmptyDataFormMessageId():int
	{
		return CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*virtual*/protected function __update():void
	{
		$lComponentFieldId_str = CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lUserNameTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::i_COMPONENT_VALIDATION_PARAMS_USER_NAME_TEXTFIELD[$lComponentFieldId_str]);
		$lMessageTextareaComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA[$lComponentFieldId_str]);

		$lTableData_a_arr	= [	CCUserMessagesTableData::i_TABLE_FIELD_USER_NAME		=> $lUserNameTextfieldComponentValue_str,
								CCUserMessagesTableData::i_TABLE_FIELD_MESSAGE			=> $lMessageTextareaComponentValue_str,
								CCUserMessagesTableData::i_TABLE_FIELD_ADDITING_TIME	=> CDateTimeTools::i_getCurrentUTimeInSec()];

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$this->__getDatabaseTablesController()->i_getMySQLDatabaseTablesController($lSiteId_str)->i_getMySQLDatabaseUserMessagesTableController()->i_addUserMessageData($lTableData_a_arr);

		$this->__addFormMessageId(CCUserMessageAdditingFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS);

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_DEBUG];

		$this->__getMainData()->i_getHostData()->i_setRedirect($lStaticParams_a_arr);
	}
}


?>