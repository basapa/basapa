<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBVacancyContentFilteringFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _ID_FORM										= 'job_vacancy_content_filtering_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME					= self::_ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_ADDITION_TIME_FILTERS		= self::_ID_FORM. '_02';
	public const i_FORM_COMPONENT_ID_WAGE_FILTERS				= self::_ID_FORM. '_03';
	public const i_FORM_COMPONENT_ID_WORK_EXPERIENCE_FILTERS	= self::_ID_FORM. '_04';
	public const i_FORM_COMPONENT_ID_WORK_SCHEDULE_FILTERS		= self::_ID_FORM. '_05';
	public const i_FORM_COMPONENT_ID_SUBMIT						= self::_ID_FORM. '_08';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_ADDITION_TIME_FILTERS		= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_WAGE_FILTERS				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_WORK_EXPERIENCE_FILTERS	= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_WORK_SCHEDULE_FILTERS		= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	//...FILLING_MODES

	//CSS...
	private const _CSS_FORM								= 'css_job_vacancy_content_filtering_form css_rounded_high';
	//...CSS
	
	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES			= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES	= 'css_text_component_element_form_name';

	private const _RADIOBUTTON_COMPONENT_ADDITION_TIME_FILTERS_CLASSES			= 'css_radiobutton_component_addition_time_filters';
	private const _RADIOBUTTON_COMPONENT_ELEMENT_ADDITION_TIME_FILTERS_CLASSES	= 'css_radiobutton_component_element_addition_time_filters';

	private const _RADIOBUTTON_COMPONENT_WAGE_FILTERS_CLASSES			= 'css_radiobutton_component_wage';
	private const _RADIOBUTTON_COMPONENT_ELEMENT_WAGE_FILTERS_CLASSES	= 'css_radiobutton_component_element_wage';

	private const _RADIOBUTTON_COMPONENT_WORK_EXPERIENCE_FILTERS_CLASSES			= 'css_radiobutton_component_work_experience';
	private const _RADIOBUTTON_COMPONENT_ELEMENT_WORK_EXPERIENCE_FILTERS_CLASSES	= 'css_radiobutton_component_element_work_experience';

	private const _RADIOBUTTON_COMPONENT_WORK_SCHEDULE_FILTERS_CLASSES			= 'css_radiobutton_component_work_schedule';
	private const _RADIOBUTTON_COMPONENT_ELEMENT_WORK_SCHEDULE_FILTERS_CLASSES	= 'css_radiobutton_component_element_work_schedule';

	private const _BUTTON_COMPONENT_SUBMIT_CLASSES			= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES	= 'css_button_component_element_submit css_blue css_rounded_low';
	//...CLASSES

	//TRANSLATIONS...
	private const _FORM_XML_NODE_ID									= 'vacancy_content_filtering_form';
	private const _ADDITION_TIME_FILTERS_RADIOBUTTON_XML_NODE_ID	= 'addition_time_filters_radiobutton';
	private const _WAGE_FILTERS_RADIOBUTTON_XML_NODE_ID				= 'wage_filters_radiobutton';
	private const _WORK_EXPERIENCE_FILTERS_RADIOBUTTON_XML_NODE_ID	= 'work_experience_filters_radiobutton';
	private const _WORK_SCHEDULE_FILTERS_RADIOBUTTON_XML_NODE_ID	= 'work_schedule_filters_radiobutton';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		return CVariableTools::i_toString(CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_FILTERING);
	}

	//JS...
	/*override*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

	/*override*/protected function __drawPreJS():void
	{
	/*	echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_setFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_initDOMForm();';*/
	}

	/*override*/protected function __getFormJSAttrs():array
	{
		/*$l_a_arr = parent::__getFormJSAttrs();
		$l_a_arr[self::i_FORM_COMPONENT_ID_SUBMIT] = self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON;
		return $l_a_arr;*/

		return [];
	}

	/*override*/protected function __getJSForm():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.CMain.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getFormsView().i_getContentAdditionFormView()';*/

		return '';
	}
	//...JS

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

		//FORM NAME...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_FORM_NAME,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormTranslationData_clss->i_getFormName(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_FORM_NAME_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lRadiobuttonComponentsView_clss = $lComponentsView_clss->i_getRadiobuttonComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		//ADDITION TIME FILTERS...
		$lRadiobuttonTranslationData_clss = $this->__getTranslationXMLRadiobuttonComponentNode(self::_ADDITION_TIME_FILTERS_RADIOBUTTON_XML_NODE_ID);

		$lAdditionTimeFiltersSData_clss_arr = $lDatabaseData_clss->i_getAdditionTimeFiltersSTableQueriesData()->i_getAdditionTimeFiltersSData();

		$lGETParamValue_str = $this->__getMainData()->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS, false);

		$lItemsData_a_arr = $this->_generateAdditionTimeFiltersRadiobuttonItemsData(self::i_FORM_COMPONENT_ID_ADDITION_TIME_FILTERS, $lAdditionTimeFiltersSData_clss_arr, $lGETParamValue_str);

		$lParams_a_arr	= [	CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lRadiobuttonTranslationData_clss->i_getName(),
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_ITEMS_DATA						=> $lItemsData_a_arr,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_ADDITION_TIME_FILTERS,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_RADIOBUTTON_COMPONENT_ADDITION_TIME_FILTERS_CLASSES,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_RADIOBUTTON_COMPONENT_ELEMENT_ADDITION_TIME_FILTERS_CLASSES];
		$lRadiobuttonComponentsView_clss->i_getSimpleRadiobuttonComponentView()->i_draw($lParams_a_arr);
		//...ADDITION TIME FILTERS

		//WAGE FILTERS...
		$lRadiobuttonTranslationData_clss = $this->__getTranslationXMLRadiobuttonComponentNode(self::_WAGE_FILTERS_RADIOBUTTON_XML_NODE_ID);

		$lWageFiltersSData_clss_arr = $lDatabaseData_clss->i_getWageFiltersSTableQueriesData()->i_getWageFiltersSData();

		$lGETParamValue_str = $this->__getMainData()->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WAGE_FILTERS, false);

		$lItemsData_a_arr = $this->_generateWageFiltersRadiobuttonItemsData(self::i_FORM_COMPONENT_ID_WAGE_FILTERS, $lWageFiltersSData_clss_arr, $lGETParamValue_str);

		$lParams_a_arr	= [	CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lRadiobuttonTranslationData_clss->i_getName(),
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_ITEMS_DATA						=> $lItemsData_a_arr,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_WAGE_FILTERS,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_RADIOBUTTON_COMPONENT_WAGE_FILTERS_CLASSES,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_RADIOBUTTON_COMPONENT_ELEMENT_WAGE_FILTERS_CLASSES];
		$lRadiobuttonComponentsView_clss->i_getSimpleRadiobuttonComponentView()->i_draw($lParams_a_arr);
		//...WAGE FILTERS

		//WORK EXPERIENCE FILTERS...
		$lRadiobuttonTranslationData_clss = $this->__getTranslationXMLRadiobuttonComponentNode(self::_WORK_EXPERIENCE_FILTERS_RADIOBUTTON_XML_NODE_ID);

		$lWorkExperienceFiltersSData_clss_arr = $lDatabaseData_clss->i_getWorkExperienceFiltersSTableQueriesData()->i_getWorkExperienceFiltersSData();

		$lGETParamValue_str = $this->__getMainData()->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS, false);

		$lItemsData_a_arr = $this->_generateWorkExperienceFiltersRadiobuttonItemsData(self::i_FORM_COMPONENT_ID_WORK_EXPERIENCE_FILTERS, $lWorkExperienceFiltersSData_clss_arr, $lGETParamValue_str);

		$lParams_a_arr	= [	CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lRadiobuttonTranslationData_clss->i_getName(),
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_ITEMS_DATA						=> $lItemsData_a_arr,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_WORK_EXPERIENCE_FILTERS,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_RADIOBUTTON_COMPONENT_WORK_EXPERIENCE_FILTERS_CLASSES,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_RADIOBUTTON_COMPONENT_ELEMENT_WORK_EXPERIENCE_FILTERS_CLASSES];
		$lRadiobuttonComponentsView_clss->i_getSimpleRadiobuttonComponentView()->i_draw($lParams_a_arr);
		//...WORK EXPERIENCE FILTERS

		//WORK SCHEDULE FILTERS...
		$lRadiobuttonTranslationData_clss = $this->__getTranslationXMLRadiobuttonComponentNode(self::_WORK_SCHEDULE_FILTERS_RADIOBUTTON_XML_NODE_ID);

		$lWorkScheduleFiltersSData_clss_arr = $lDatabaseData_clss->i_getWorkScheduleFiltersSTableQueriesData()->i_getWorkScheduleFiltersSData();

		$lGETParamValue_str = $this->__getMainData()->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS, false);

		$lItemsData_a_arr = $this->_generateWorkScheduleFiltersRadiobuttonItemsData(self::i_FORM_COMPONENT_ID_WORK_SCHEDULE_FILTERS, $lWorkScheduleFiltersSData_clss_arr, $lGETParamValue_str);

		$lParams_a_arr	= [	CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lRadiobuttonTranslationData_clss->i_getName(),
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_ITEMS_DATA						=> $lItemsData_a_arr,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_WORK_SCHEDULE_FILTERS,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_RADIOBUTTON_COMPONENT_WORK_SCHEDULE_FILTERS_CLASSES,
							CCSimpleRadiobuttonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_RADIOBUTTON_COMPONENT_ELEMENT_WORK_SCHEDULE_FILTERS_CLASSES];
		$lRadiobuttonComponentsView_clss->i_getSimpleRadiobuttonComponentView()->i_draw($lParams_a_arr);
		//...WORK SCHEDULE FILTERS
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

		//SUBMIT...
		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lFormTranslationData_clss->i_getSubmitButtonTranslationData()->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES,
							//CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT
	}

	private function _generateAdditionTimeFiltersRadiobuttonItemsData(string $aFormComponentId_str, array $aFiltersSData_clss_arr, string $aGETParamValue_str):array
	{
		$lCount_int = CArrayTools::i_count($aFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBAdditionTimeFiltersSTableData::i_toClassType($aFiltersSData_clss_arr[$i]);

			$lId_int = $lFilterSData_clss->i_getTableFieldId();
			$lValue_str = CVariableTools::i_toString($lFilterSData_clss->i_getTableFieldValue());
			$lName_str = $lFilterSData_clss->i_getTableFieldName();
			$lState_int = $this->_getRadiobuttonItemState($lValue_str, $aGETParamValue_str);

			$lItemsData_a_arr[] = $this->_generateRadiobuttonItemData($aFormComponentId_str, $lId_int, $lName_str, $lValue_str, $lState_int);
		}

		return $lItemsData_a_arr;
	}

	private function _generateWageFiltersRadiobuttonItemsData(string $aFormComponentId_str, array $aFiltersSData_clss_arr, string $aGETParamValue_str):array
	{
		$lCount_int = CArrayTools::i_count($aFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBWageFiltersSTableData::i_toClassType($aFiltersSData_clss_arr[$i]);

			$lId_int = $lFilterSData_clss->i_getTableFieldId();
			$lValue_int = $lFilterSData_clss->i_getTableFieldValue();
			$lName_str = $lFilterSData_clss->i_getTableFieldName();

			$lValue_str = CVariableTools::i_toString($lValue_int);
			$lState_int = $this->_getRadiobuttonItemState($lValue_str, $aGETParamValue_str);

			$lName_str = CStringTools::i_replace($lName_str,  CNumberFormatTools::i_formatValueAsMoney($lValue_int), CStringTools::i_REPLACING_PATTERN_VALUE);

			$lItemsData_a_arr[] = $this->_generateRadiobuttonItemData($aFormComponentId_str, $lId_int, $lName_str, $lValue_str, $lState_int);
		}

		return $lItemsData_a_arr;
	}

	private function _generateWorkExperienceFiltersRadiobuttonItemsData(string $aFormComponentId_str, array $aFiltersSData_clss_arr, string $aGETParamValue_str):array
	{
		$lCount_int = CArrayTools::i_count($aFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBWorkExperienceFiltersSTableData::i_toClassType($aFiltersSData_clss_arr[$i]);

			$lId_int = $lFilterSData_clss->i_getTableFieldId();
			$lStringId_str = $lFilterSData_clss->i_getTableFieldStringId();
			$lName_str = $lFilterSData_clss->i_getTableFieldName();
			$lState_int = $this->_getRadiobuttonItemState($lStringId_str, $aGETParamValue_str);

			$lItemsData_a_arr[] = $this->_generateRadiobuttonItemData($aFormComponentId_str, $lId_int, $lName_str, $lStringId_str, $lState_int);
		}

		return $lItemsData_a_arr;
	}

	private function _generateWorkScheduleFiltersRadiobuttonItemsData(string $aFormComponentId_str, array $aFiltersSData_clss_arr, string $aGETParamValue_str):array
	{
		$lCount_int = CArrayTools::i_count($aFiltersSData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lFilterSData_clss = CJOBWorkScheduleFiltersSTableData::i_toClassType($aFiltersSData_clss_arr[$i]);

			$lId_int = $lFilterSData_clss->i_getTableFieldId();
			$lStringId_str = $lFilterSData_clss->i_getTableFieldStringId();
			$lName_str = $lFilterSData_clss->i_getTableFieldName();
			$lState_int = $this->_getRadiobuttonItemState($lStringId_str, $aGETParamValue_str);

			$lItemsData_a_arr[] = $this->_generateRadiobuttonItemData($aFormComponentId_str, $lId_int, $lName_str, $lStringId_str, $lState_int);
		}

		return $lItemsData_a_arr;
	}

	private function _getRadiobuttonItemState(string $aValue_str, string $aGETParamValue_str):int
	{
		return $aValue_str === $aGETParamValue_str ? CCRadiobuttonComponentItem::i_ITEM_STATE_SELECTED : CCRadiobuttonComponentItem::i_ITEM_STATE_ENABLED;
	}

	private function _generateRadiobuttonItemData(string $aFormComponentId_str, int $aId_int, string $aName_str, string $aValue_str, int $aState_int):array
	{
		$lItemParams_a_arr	= [	CCRadiobuttonComponentItem::i_PARAM_ID_OPT_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
								CCRadiobuttonComponentItem::i_PARAM_ID_OPT_ITEM_ID				=> CVariableTools::i_toString($aId_int),
								CCRadiobuttonComponentItem::i_PARAM_ID_ITEM_NAME				=> $aName_str,
								CCRadiobuttonComponentItem::i_PARAM_ID_ITEM_VALUE				=> $aValue_str,
								CCRadiobuttonComponentItem::i_PARAM_ID_ITEM_STATE				=> $aState_int];

		$lItemData_a_arr	= [	CCRadiobuttonComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCRadiobuttonComponentView::i_ITEM_DATA_TYPE_SINGLE,
								CCRadiobuttonComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];

		return $lItemData_a_arr;
	}

	//PARAMS...
	/*override*/protected function __getFormId():string
	{
		return self::_ID_FORM;
	}

	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*//*protected function __getFormAction():string
	{
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CJOBPageConst::i_PAGE_ID_CONTENTS];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}*/

	/*override*/protected function __getFormSendingDataMethod():string
	{
		return self::i_SENDING_DATA_METHOD_POST;
	}

	/*override*/protected function __getFormSendingDataType():string
	{
		return self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA;
	}
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return self::_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>
