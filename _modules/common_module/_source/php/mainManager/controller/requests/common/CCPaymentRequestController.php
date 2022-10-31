<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCPaymentRequestController extends CCRequestController
{
	public const i_COMPONENT_VALIDATION_PARAMS_AMOUNT_TEXTFIELD	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCPaymentFormView::i_FORM_COMPONENT_ID_AMOUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCPaymentFormView::i_FILLING_MODE_FIELD_AMOUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_AMOUNT_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_AMOUNT_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_AMOUNT_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCPaymentFormView::i_MIN_CHARS_COUNT_FIELD_AMOUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCPaymentFormView::i_MAX_CHARS_COUNT_FIELD_AMOUNT];

	public const i_COMPONENT_VALIDATION_PARAMS_NAME_TEXTFIELD	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID								=> CCPaymentFormView::i_FORM_COMPONENT_ID_NAME,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCPaymentFormView::i_FILLING_MODE_FIELD_NAME,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_NAME_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_NAME_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_NAME_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCPaymentFormView::i_MIN_CHARS_COUNT_FIELD_NAME,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCPaymentFormView::i_MAX_CHARS_COUNT_FIELD_NAME];

	public const i_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCPaymentFormView::i_FORM_COMPONENT_ID_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCPaymentFormView::i_FILLING_MODE_FIELD_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCPaymentFormView::i_MIN_CHARS_COUNT_FIELD_EMAIL,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCPaymentFormView::i_MAX_CHARS_COUNT_FIELD_EMAIL];

	public const i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA	= [	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID									=> CCPaymentFormView::i_FORM_COMPONENT_ID_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> CCRequestController::___VALIDATION_COMPONENT_TYPE_TEXTAREA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CCPaymentFormView::i_FILLING_MODE_FIELD_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> CCRequestController::i_COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_ILLEGAL_CHARS,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_WRONG_CHARS_COUNT,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID		=> CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_MESSAGE_EMPTY_DATA,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT			=> CCPaymentFormView::i_MIN_CHARS_COUNT_FIELD_MESSAGE,
																	CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT			=> CCPaymentFormView::i_MAX_CHARS_COUNT_FIELD_MESSAGE];
																	
	public const i_COMPONENTS_VALIDATIONS_PARAMS	= [	self::i_COMPONENT_VALIDATION_PARAMS_AMOUNT_TEXTFIELD,
														self::i_COMPONENT_VALIDATION_PARAMS_NAME_TEXTFIELD,
														self::i_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD,
														self::i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA];

	public const i_COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [];
	
	public const i_COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		return $this->__getFormsMessagesData()->i_getPaymentFormMessagesData();
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
		return CCPaymentFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lAmountTextfieldComponentValue_num = $this->__getPostRequestNumberComponentValue(self::i_COMPONENT_VALIDATION_PARAMS_AMOUNT_TEXTFIELD[$lComponentFieldId_str]);
		$lNameTextfieldComponentValue_str = $this->__getPostRequestStringComponentValue(self::i_COMPONENT_VALIDATION_PARAMS_NAME_TEXTFIELD[$lComponentFieldId_str]);
		$lEmailTextfieldComponentValue_str = $this->__getPostRequestStringComponentValue(self::i_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD[$lComponentFieldId_str]);
		$lMessageTextareaComponentValue_str = $this->__getPostRequestStringComponentValue(self::i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA[$lComponentFieldId_str]);

		$lTableData_obj_arr		= [	CCPaymentsTableData::i_TABLE_FIELD_AMOUNT				=> $lAmountTextfieldComponentValue_num,
									CCPaymentsTableData::i_TABLE_FIELD_NAME					=> $lNameTextfieldComponentValue_str,
									CCPaymentsTableData::i_TABLE_FIELD_EMAIL				=> $lEmailTextfieldComponentValue_str,
									CCPaymentsTableData::i_TABLE_FIELD_MESSAGE				=> $lMessageTextareaComponentValue_str,
									CCPaymentsTableData::i_TABLE_FIELD_PAYMEMT_TIME			=> CDateTimeTools::i_getCurrentUTimeInSec(),
									CCPaymentsTableData::i_TABLE_FIELD_PAYMEMT_STATUS		=> CCPaymentsTableData::i_PAYMEMT_STATUS_STARTED];

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$this->__getDatabaseTablesController()->i_getMySQLDatabaseTablesController($lSiteId_str)->i_getMySQLDatabasePaymentsTableController()->i_addPaymentData($lTableData_obj_arr);

		$lTableFieldId_int = $this->__getDatabaseData()->i_getPaymentsTableQueriesData()->i_getInsertData()->i_getTableFieldId();

		//$this->_moveToRobokassaPayment($lAmountTextfieldComponentValue_num, CCPaymentConst::i_ROBOKASSA_DESCRIPTION, $lTableFieldId_int);
	}
	
	private function _moveToRobokassaPayment(string $aOrderPrice_str, string $aOrderDescription_str, string $aOrderId_str):void
	{
		$lLogin_str = CCPaymentConst::i_ROBOKASSA_LOGIN;
		$lPassword_str = PAYMENT_MODE == PAYMENT_MODE_TEST ? CCPaymentConst::i_ROBOKASSA_TEST_PASSWORD : CCPaymentConst::i_ROBOKASSA_PASSWORD;
		$lSignature_str = md5($lLogin_str. ':' .$aOrderPrice_str. ':' .$aOrderId_str. ':' .$lPassword_str);
		
		$lDynamicParams_a_arr	= [	CCPaymentConst::i_ROBOKASSA_PARAM_ID_LOGIN				=> $lLogin_str,
									CCPaymentConst::i_ROBOKASSA_PARAM_ID_ORDER_ID			=> $aOrderId_str,
									CCPaymentConst::i_ROBOKASSA_PARAM_ID_ORDER_PRICE		=> $aOrderPrice_str,
									CCPaymentConst::i_ROBOKASSA_PARAM_ID_ORDER_DESCRIPTION	=> $aOrderDescription_str,
									CCPaymentConst::i_ROBOKASSA_PARAM_ID_SIGNATURE			=> $lSignature_str,
									CCPaymentConst::i_ROBOKASSA_PARAM_ID_TEST_MODE			=> PAYMENT_MODE === PAYMENT_MODE_TEST ? 1 : 0];

		$lPaymentURL_str = CURLTools::i_addDynamicParamsToStaticURL(CCPaymentConst::i_ROBOKASSA_PAYMENT_URL, $lDynamicParams_a_arr, true, false, CURLTools::i_applyHTTPURL(CCPaymentConst::i_ROBOKASSA_SITE_URL, true));

		$this->__getMainData()->i_getHostData()->i_setSimpleRedirect($lPaymentURL_str);
	}
}


?>