<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentFilteringRequestController extends CCRequestController
{
	private const _COMPONENT_VALIDATION_PARAMS_ADDITION_TIME_FILTERS_RADIOBUTTON	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID					=> CJOBVacancyContentFilteringFormView::i_FORM_COMPONENT_ID_ADDITION_TIME_FILTERS,
																						self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE			=> self::___VALIDATION_COMPONENT_TYPE_RADIOBUTTON,
																						self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE	=> CJOBVacancyContentFilteringFormView::i_FILLING_MODE_FIELD_ADDITION_TIME_FILTERS];

	private const _COMPONENT_VALIDATION_PARAMS_WAGE_FILTERS_RADIOBUTTON	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID					=> CJOBVacancyContentFilteringFormView::i_FORM_COMPONENT_ID_WAGE_FILTERS,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE			=> self::___VALIDATION_COMPONENT_TYPE_RADIOBUTTON,
																			self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE	=> CJOBVacancyContentFilteringFormView::i_FILLING_MODE_FIELD_WAGE_FILTERS];

	private const _COMPONENT_VALIDATION_PARAMS_WORK_EXPERIENCE_FILTERS_RADIOBUTTON	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID					=> CJOBVacancyContentFilteringFormView::i_FORM_COMPONENT_ID_WORK_EXPERIENCE_FILTERS,
																						self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE			=> self::___VALIDATION_COMPONENT_TYPE_RADIOBUTTON,
																						self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE	=> CJOBVacancyContentFilteringFormView::i_FILLING_MODE_FIELD_WORK_EXPERIENCE_FILTERS];

	private const _COMPONENT_VALIDATION_PARAMS_WORK_SCHEDULE_FILTERS_RADIOBUTTON	= [	self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID					=> CJOBVacancyContentFilteringFormView::i_FORM_COMPONENT_ID_WORK_SCHEDULE_FILTERS,
																						self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_TYPE			=> self::___VALIDATION_COMPONENT_TYPE_RADIOBUTTON,
																						self::__COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE	=> CJOBVacancyContentFilteringFormView::i_FILLING_MODE_FIELD_WORK_SCHEDULE_FILTERS];

	private const _COMPONENTS_VALIDATIONS_PARAMS	= [	self::_COMPONENT_VALIDATION_PARAMS_ADDITION_TIME_FILTERS_RADIOBUTTON,
														self::_COMPONENT_VALIDATION_PARAMS_WAGE_FILTERS_RADIOBUTTON,
														self::_COMPONENT_VALIDATION_PARAMS_WORK_EXPERIENCE_FILTERS_RADIOBUTTON,
														self::_COMPONENT_VALIDATION_PARAMS_WORK_SCHEDULE_FILTERS_RADIOBUTTON
	];

	private const _COMPOSITE_COMPONENTS_VALIDATIONS_PARAMS	= [];

	private const _COMPONENT_VALIDATION_PARAMS_HIDDEN_TEXTFIELD	= [];


	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/

	/*override*/protected function __getFormMessagesData():CCFormMessagesData
	{
		$lFormsMessagesData_clss = $this->__getFormsMessagesData();
		$lFormsMessagesData_clss = CJOBFormsMessagesData::i_toClassType($lFormsMessagesData_clss);
		return $lFormsMessagesData_clss->i_getVacancyContentFilteringFormMessagesData();
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
		return CJOBVacancyContentFilteringFormMessagesData::i_FORM_MESSAGE_ID_EMPTY_DATA;
	}

	/*override*/protected function __update():void
	{
		$lComponentFieldId_str = self::__COMPONENT_VALIDATION_PARAM_ID_FIELD_ID;
		$lAdditionTimeFiltersRadiobuttonComponentValue_int = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_ADDITION_TIME_FILTERS_RADIOBUTTON[$lComponentFieldId_str]);
		$lWageFiltersRadiobuttonComponentValue_int = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_WAGE_FILTERS_RADIOBUTTON[$lComponentFieldId_str]);
		$lWorkExperienceFiltersRadiobuttonComponentValue_int = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_WORK_EXPERIENCE_FILTERS_RADIOBUTTON[$lComponentFieldId_str]);
		$lWorkScheduleFiltersRadiobuttonComponentValue_int = $this->__getPOSTRequestStringComponentValue(self::_COMPONENT_VALIDATION_PARAMS_WORK_SCHEDULE_FILTERS_RADIOBUTTON[$lComponentFieldId_str]);

		$this->__addFormMessageId(CJOBVacancyContentQuickSearchFormMessagesData::i_FORM_MESSAGE_ID_SUCCESS);

		$lStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CJOBRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENTS];

		$lMainData_clss = $this->__getMainData();

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lStaticParams_a_arr[$lGETParamId_str] = $lMainData_clss->i_getGETParam($lGETParamId_str);
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lStaticParams_a_arr[$lGETParamId_str] = $lMainData_clss->i_getGETParam($lGETParamId_str);
		}

		$lDynamicParams_a_arr = CArrayTools::i_merge($lMainData_clss->i_getDynamicGETParams(), [CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS		=> $lAdditionTimeFiltersRadiobuttonComponentValue_int,
																								CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WAGE_FILTERS				=> $lWageFiltersRadiobuttonComponentValue_int,
																								CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS	=> $lWorkExperienceFiltersRadiobuttonComponentValue_int,
																								CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS		=> $lWorkScheduleFiltersRadiobuttonComponentValue_int]);

		$this->__getHostData()->i_sendSimpleRedirect(CURLTools::i_generateURLByParams($lStaticParams_a_arr, $lDynamicParams_a_arr, true, false));
	}
}


?>
