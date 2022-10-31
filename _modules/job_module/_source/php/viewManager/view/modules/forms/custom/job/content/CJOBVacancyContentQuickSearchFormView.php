<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual override*/class CJOBVacancyContentQuickSearchFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	/*internal*/public const ___JS_FORM_COMPONENT_ID_SELECT_CITY	= 'FORM_COMPONENT_ID_SELECT_CITY';
	//...JS PHP AGREEMENTS

	//IDS...
	private const _ID_FORM								= 'job_vacancy_content_quick_search_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::_ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_SEARCH_TEXT		= self::_ID_FORM. '_02';
	public const i_FORM_COMPONENT_ID_REGION				= self::_ID_FORM. '_03';
	public const i_FORM_COMPONENT_ID_CITY				= self::_ID_FORM. '_04';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::_ID_FORM. '_08';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_SEARCH_TEXT		= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_REGION			= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_CITY				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_SEARCH_TEXT	= 1;
	public const i_MAX_CHARS_COUNT_FIELD_SEARCH_TEXT	= 64;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_job_vacancy_content_quick_search_form css_rounded_high';
	//...CSS
	
	//CLASSES...
	private const _TEXTFIELD_COMPONENT_SEARCH_TEXT_CLASSES			= 'css_textfield_component_search_text';
	private const _TEXTFIELD_COMPONENT_ELEMENT_SEARCH_TEXT_CLASSES	= 'css_textfield_component_element_search_text';

	private const _SELECT_CITY_COMPOSITE_COMPONENT_CLASSES			= 'css_select_city_composite_component_01';
	private const _SELECT_CITY_COMPOSITE_COMPONENT_ELEMENT_CLASSES	= 'css_select_city_composite_component_element_01';

	private const _BUTTON_COMPONENT_SUBMIT_CLASSES			= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES	= 'css_button_component_element_submit css_blue css_rounded_low';
	//...CLASSES

	//TRANSLATIONS...
	private const _FORM_XML_NODE_ID						= 'vacancy_content_quick_search_form';
	private const _SEARCH_TEXT_TEXTFIELD_XML_NODE_ID	= 'search_text_textfield';
	private const _REGION_LISTBOX_XML_NODE_ID			= 'region_listbox';
	private const _CITY_LISTBOX_XML_NODE_ID				= 'city_listbox';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		return CVariableTools::i_toString(CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_QUICK_SEARCH);
	}

	//JS...
	/*override*//*protected function __isJSSupportAllowed():bool
	{
		return true;
	}*/

	/*override*/protected function __drawPreJS():void
	{
		/*echo
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

		return 'bsp.main.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getFormsView().i_getVacancyContentQuickSearchFormView()';*/

		return '';
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lMainData_clss = $this->__getMainData();

		$lComponentsView_clss = $this->__getComponentsView();
		$lComponentsView_clss = CJOBComponentsView::i_toClassType($lComponentsView_clss);
		$lCompositeComponentsView_clss = $lComponentsView_clss->i_getCompositeComponentsView();
		$lCompositeComponentsView_clss = CJOBCompositeComponentsView::i_toClassType($lCompositeComponentsView_clss);
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		//SEARCH TEXT...
		$lTextfieldTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_SEARCH_TEXT_TEXTFIELD_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_SEARCH_TEXT,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $lMainData_clss->i_isGETParamDefined(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SEARCH_TEXT) ? $lMainData_clss->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SEARCH_TEXT) : $lTextfieldTranslationData_clss->i_getValue(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_PLACEHOLDER					=> $lTextfieldTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_SEARCH_TEXT,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_SEARCH_TEXT,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_SEARCH_TEXT_CLASSES,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_SEARCH_TEXT_CLASSES,
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...SEARCH TEXT

		//SELECT CITY...
		$lRegionId_int = CCListboxComponentItem::i_EMPTY_ITEM_VALUE;
		$lCityId_int = CCListboxComponentItem::i_EMPTY_ITEM_VALUE;

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lRegionId_int = $lDatabaseData_clss->i_getRegionsTableQueriesData()->i_getDataByStringId($lMainData_clss->i_getGETParam($lGETParamId_str))->i_getTableFieldId();
		}

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID;
		if ($lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			$lCityId_int = $lDatabaseData_clss->i_getCitiesTableQueriesData()->i_getDataByStringId($lMainData_clss->i_getGETParam($lGETParamId_str))->i_getTableFieldId();
		}

		$lTranslationData_clss_arr = [
										$this->__getTranslationXMLListboxComponentNode(self::_REGION_LISTBOX_XML_NODE_ID),
										$this->__getTranslationXMLListboxComponentNode(self::_CITY_LISTBOX_XML_NODE_ID)
									];
		$lValidationData_obj_arr_arr = [
											CCSelectCityFormCompositeComponentView::i_COMPOSITE_COMPONENT_ID_REGION_LISTBOX =>
											[
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ID						=> self::i_FORM_COMPONENT_ID_REGION,
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_FILLING_MODE			=> self::i_FILLING_MODE_FIELD_REGION,
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ITEMS_DATA				=> $lDatabaseData_clss->i_getRegionsTableQueriesData()->___getSelectData(),
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_SELECTED_ITEM_VALUE		=> CVariableTools::i_toString(/*$lRegionId_int*/2)
											],
											CCSelectCityFormCompositeComponentView::i_COMPOSITE_COMPONENT_ID_CITY_LISTBOX =>
											[
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ID						=> self::i_FORM_COMPONENT_ID_CITY,
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_FILLING_MODE			=> self::i_FILLING_MODE_FIELD_CITY,
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ITEMS_DATA				=> $lDatabaseData_clss->i_getCitiesTableQueriesData()->___areSelectDataDefined() ? $lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectData() : [],
												CCSelectCityFormCompositeComponentView::i_VALIDATION_DATA_COMPONENT_SELECTED_ITEM_VALUE		=> CVariableTools::i_toString($lCityId_int)
											]
										];

		$lComponentsParams_obj_arr	= [	CCSelectCityFormCompositeComponentView::i_COMPOSITE_COMPONENT_PARAM_TRANSLATION_DATA	=> $lTranslationData_clss_arr,
										CCSelectCityFormCompositeComponentView::i_COMPOSITE_COMPONENT_PARAM_VALIDATION_DATA		=> $lValidationData_obj_arr_arr];

		$lParams_a_arr	= [	CCSelectCityFormCompositeComponentView::i_PARAM_ID_COMPOSITE_COMPONENTS_PARAMS		=> $lComponentsParams_obj_arr,
							CCSelectCityFormCompositeComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_SELECT_CITY_COMPOSITE_COMPONENT_CLASSES,
							CCSelectCityFormCompositeComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_SELECT_CITY_COMPOSITE_COMPONENT_ELEMENT_CLASSES,
							CCSelectCityFormCompositeComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::___JS_FORM_COMPONENT_ID_SELECT_CITY/*,
							CCSelectCityFormCompositeComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()*/];
		$lCompositeComponentsView_clss->i_getSelectCityFormCompositeComponentView()->i_draw($lParams_a_arr);
		//...SELECT CITY

		//SUBMIT...
		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lFormTranslationData_clss->i_getSubmitButtonTranslationData()->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON/*,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()*/];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT
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

	/*virtual override*//*protected function __getFormAction():string
	{
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENTS];
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
	/*virtual override*/protected function __getFormNodeName():string
	{
		return self::_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>
