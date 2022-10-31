<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentAdditionRequestController extends CCRequestController
{
	private const _COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_CAPTION,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_CAPTION,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_ILLEGAL_CHARS,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_WRONG_CHARS_COUNT,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_CAPTION_EMPTY_DATA,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_CAPTION,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_CAPTION];

	private const _COMPONENT_VALIDATION_PARAMS_WAGE_COMPOSITE_WAGE_RANGE	= [
																				[	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_WAGE_FROM,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_WAGE_FROM,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_NUMBERS,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_FROM_ILLEGAL_CHARS,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_FROM_WRONG_CHARS_COUNT,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_FROM_EMPTY_DATA,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_WAGE_FROM,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_WAGE_FROM
																				],
																				[	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_WAGE_TO,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_WAGE_TO,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_NUMBERS,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_TO_ILLEGAL_CHARS,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_TO_WRONG_CHARS_COUNT,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_TO_EMPTY_DATA,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_WAGE_TO,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_WAGE_TO
																				],
																				[	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_WAGE_CURRENCY,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_LISTBOX,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_WAGE_CURRENCY,
																					self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_WAGE_CURRENCY_EMPTY_DATA
																				]
	];

	private const _COMPONENT_VALIDATION_PARAMS_DESCRIPTION_TEXTAREA	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_DESCRIPTION,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTAREA,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_DESCRIPTION,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_DESCRIPTION_ILLEGAL_CHARS,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_DESCRIPTION_WRONG_CHARS_COUNT,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_DESCRIPTION_EMPTY_DATA,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_DESCRIPTION,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_DESCRIPTION];

	private const _COMPONENT_VALIDATION_PARAMS_EMPLOYER_TEXTFIELD	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_EMPLOYER,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_EMPLOYER,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_TEXT,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_ILLEGAL_CHARS,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_WRONG_CHARS_COUNT,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_EMPTY_DATA,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_EMPLOYER,
																		self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_EMPLOYER];

	private const _COMPONENT_VALIDATION_PARAMS_EMPLOYER_CITY_LISTBOX	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_EMPLOYER_CITY,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_LISTBOX,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_EMPLOYER_CITY,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPLOYER_CITY_EMPTY_DATA];

	private const _COMPONENT_VALIDATION_PARAMS_EXTERNAL_SOURCE_TEXTFIELD	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID										=> CJOBVacancyContentAdditionFormView::i_FORM_COMPONENT_ID_EXTERNAL_SOURCE,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE								=> self::___VALIDATION_COMPONENT_TYPE_TEXTFIELD,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE						=> CJOBVacancyContentAdditionFormView::i_FILLING_MODE_FIELD_EXTERNAL_SOURCE,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_VALIDATION_PATTERN			=> self::__COMPONENT_VALUE_VALIDATION_PATTERN_URL,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_ILLEGAL_CHARS_EVENT_ID		=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EXTERNAL_SOURCE_ILLEGAL_CHARS,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_WRONG_CHARS_COUNT_EVENT_ID	=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EXTERNAL_SOURCE_WRONG_CHARS_COUNT,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_EMPTY_DATA_EVENT_ID			=> CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EXTERNAL_SOURCE_EMPTY_DATA,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MIN_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MIN_CHARS_COUNT_FIELD_EXTERNAL_SOURCE,
																				self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_VALUE_MAX_CHARS_COUNT				=> CJOBVacancyContentAdditionFormView::i_MAX_CHARS_COUNT_FIELD_EXTERNAL_SOURCE];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_DESCRIPTION_TEXTAREA,
														self::_COMPONENT_VALIDATION_PARAMS_EMPLOYER_TEXTFIELD,
														self::_COMPONENT_VALIDATION_PARAMS_EMPLOYER_CITY_LISTBOX,
														self::_COMPONENT_VALIDATION_PARAMS_EXTERNAL_SOURCE_TEXTFIELD
	];

	private const _COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [self::_COMPONENT_VALIDATION_PARAMS_WAGE_COMPOSITE_WAGE_RANGE];

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
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentAdditionFormMessagesData();
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
		return CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lCaptionTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD[$lComponentFieldId_str]);
		$lWageFromTextfieldComponentValue_int = $this->__getPOSTRequestIntegerComponentValue(self::_COMPONENT_VALIDATION_PARAMS_WAGE_COMPOSITE_WAGE_RANGE[CJOBWageRangeCompositeComponentView::i_WAGE_FROM_COMPOSITE_COMPONENT_TYPE_TEXTFIELD][$lComponentFieldId_str]);
		$lWageToTextfieldComponentValue_int = $this->__getPOSTRequestIntegerComponentValue(self::_COMPONENT_VALIDATION_PARAMS_WAGE_COMPOSITE_WAGE_RANGE[CJOBWageRangeCompositeComponentView::i_WAGE_TO_COMPOSITE_COMPONENT_TYPE_TEXTFIELD][$lComponentFieldId_str]);
		$lWageCurrencyListboxComponentValue_int = $this->__getPOSTRequestIntegerComponentValue(self::_COMPONENT_VALIDATION_PARAMS_WAGE_COMPOSITE_WAGE_RANGE[CJOBWageRangeCompositeComponentView::i_WAGE_CURRENCY_COMPOSITE_COMPONENT_TYPE_LISTBOX][$lComponentFieldId_str]);
		$lDescriptionTextareaComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_DESCRIPTION_TEXTAREA[$lComponentFieldId_str]);
		$lEmployerTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_EMPLOYER_TEXTFIELD[$lComponentFieldId_str]);
		$lEmployerCityListboxComponentValue_int = $this->__getPOSTRequestIntegerComponentValue(self::_COMPONENT_VALIDATION_PARAMS_EMPLOYER_CITY_LISTBOX[$lComponentFieldId_str]);
		$lExternalSourceTextfieldComponentValue_str = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_EXTERNAL_SOURCE_TEXTFIELD[$lComponentFieldId_str]);

		$lTableData_a_arr	= [	CJOBContentTableData::i_TABLE_FIELD_CAPTION					=> $lCaptionTextfieldComponentValue_str,
								CJOBContentTableData::i_TABLE_FIELD_WAGE_FROM				=> $lWageFromTextfieldComponentValue_int,
								CJOBContentTableData::i_TABLE_FIELD_WAGE_TO					=> $lWageToTextfieldComponentValue_int,
								CJOBContentTableData::i_TABLE_FIELD_WAGE_CURRENCY			=> $lWageCurrencyListboxComponentValue_int,
								CJOBContentTableData::i_TABLE_FIELD_DESCRIPTION				=> $lDescriptionTextareaComponentValue_str,
								CJOBContentTableData::i_TABLE_FIELD_EMPLOYER				=> $lEmployerTextfieldComponentValue_str,
								CJOBContentTableData::i_TABLE_FIELD_EMPLOYER_CITY_ID		=> $lEmployerCityListboxComponentValue_int,
								CJOBContentTableData::i_TABLE_FIELD_EXTERNAL_SOURCE_ID		=> $lExternalSourceId_int,

								CJOBContentTableData::i_TABLE_FIELD_USER_ID					=> 0,
								CJOBContentTableData::i_TABLE_FIELD_ADDITION_TIME			=> CDateTimeTools::i_getCurrentUTimeInSec(),
								CJOBContentTableData::i_TABLE_FIELD_TYPE					=> CJOBContentTableData::i_CONTENT_TYPE_ID_UNDEFINED,
								CJOBContentTableData::i_TABLE_FIELD_STATE					=> CJOBContentTableData::i_CONTENT_STATE_ID_MODERATION_WAITING,
								CJOBContentTableData::i_TABLE_FIELD_STATUS					=> CJOBContentTableData::i_CONTENT_STATUS_ID_UNDEFINED];

		$this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController()->i_getMySQLDatabaseContentTableController()->i_addContentData($lTableData_a_arr);

		$this->__addFormMessageId(CJOBVacancyContentAdditionFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS);
	}
}


?>
