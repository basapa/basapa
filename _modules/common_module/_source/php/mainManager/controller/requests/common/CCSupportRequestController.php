<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCSupportRequestController extends CCRequestController
{
	private const _COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCSupportFormView::i_FORM_COMPONENT_ID_CAPTION,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCFormComponentView::i_FILLING_MODE_ID_MANDATORY,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_ILLEGAL_CHARS,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_WRONG_CHARS_COUNT,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_EMPTY_DATA,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCSupportFormView::i_MIN_CHARS_COUNT_FIELD_CAPTION,
																		CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCSupportFormView::i_MAX_CHARS_COUNT_FIELD_CAPTION];

	private const _COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCSupportFormView::i_FORM_COMPONENT_ID_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCFormComponentView::i_FILLING_MODE_ID_MANDATORY,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCSupportFormView::i_MIN_CHARS_COUNT_FIELD_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCSupportFormView::i_MAX_CHARS_COUNT_FIELD_EMAIL];

	private const _COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCSupportFormView::i_FORM_COMPONENT_ID_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTAREA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCFormComponentView::i_FILLING_MODE_ID_MANDATORY,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCSupportFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCSupportFormView::i_MIN_CHARS_COUNT_FIELD_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCSupportFormView::i_MAX_CHARS_COUNT_FIELD_MESSAGE];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA];

	private const _COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [];

	private const _COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/**@return CCSupportFormMessagesData*/
	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getFormsMessagesData()->i_getSupportFormMessagesData();
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
		return CCSupportFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lCaptionTextfieldComponentValue_str = $this->__getPostRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD[$lComponentFieldId_str]);
		$lEmailTextfieldComponentValue_str = $this->__getPostRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD[$lComponentFieldId_str]);
		$lMessageTextareaComponentValue_str = $this->__getPostRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA[$lComponentFieldId_str]);

		/*$lTableData_obj_arr		= [	CCPaymentsTableData::i_TABLE_FIELD_NAME						=> $lNameTextfieldComponentValue_str,
									CCPaymentsTableData::i_TABLE_FIELD_EMAIL						=> $lEmailTextfieldComponentValue_str,
									CCPaymentsTableData::i_TABLE_FIELD_MESSAGE					=> $lMessageTextareaComponentValue_str,
									CCPaymentsTableData::i_TABLE_FIELD_TIME						=> CTime::i_getInstance()->getCurrentTimeInSec()];

		$lSiteId_str = $this->__getMainData()->getGetParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);

		$lTableQueriesData_clss = $this->__getDatabaseTablesController()->getMySQLDatabaseTablesController($lSiteId_str)->getMySQLDatabaseSupportMessagesTableController()->addSupportMessageData($lTableData_obj_arr);
		if (!isset($lTableQueriesData_clss))
		{
			$this->__getEventData()->addEventId(CCEventConst::i_SUPPORT_EVENT_ID_FAILED);
			return;
		}*/

		$lHostData_clss = $this->__getMainData()->i_getHostData();
		$lMessageTextareaComponentValue_str .= '<br><br>ip address: ' .$lHostData_clss->i_getServerParamRemoteAddr();
		$lMessageTextareaComponentValue_str .= '<br>user agent: ' .$lHostData_clss->i_getServerParamHttpUserAgent();

		/*if (!CMailTools::i_sendMail(CMainConst::i_SITE_SUPPORT_EMAIL, $lEmailTextfieldComponentValue_str, $lCaptionTextfieldComponentValue_str, $lMessageTextareaComponentValue_str))
		{
			$this->__addFormMessageId(CCSupportFormMessagesData::i_FORM_MESSAGE_ID_FAILED);
			return;
		}*/

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$lStaticParams_obj_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE				=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE				=> CCPageConst::i_PAGE_ID_MAIN];

		$this->__getMainData()->i_getHostData()->i_sendRedirect($lStaticParams_obj_arr);
	}
}


?>