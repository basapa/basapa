<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBVacancyContentAdditionFormView extends CJOBContentAdditionFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_FORM_COMPONENT_ID_CAPTION					= self::__ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_WAGE_FROM					= self::__ID_FORM. '_02';
	public const i_FORM_COMPONENT_ID_WAGE_TO					= self::__ID_FORM. '_03';
	public const i_FORM_COMPONENT_ID_WAGE_CURRENCY				= self::__ID_FORM. '_04';
	public const i_FORM_COMPONENT_ID_DESCRIPTION				= self::__ID_FORM. '_05';
	public const i_FORM_COMPONENT_ID_WORK_EXPERIENCE			= self::__ID_FORM. '_06';
	public const i_FORM_COMPONENT_ID_WORK_SCHEDULE				= self::__ID_FORM. '_07';
	public const i_FORM_COMPONENT_ID_EMPLOYER					= self::__ID_FORM. '_08';
	public const i_FORM_COMPONENT_ID_EMPLOYER_CITY				= self::__ID_FORM. '_09';
	public const i_FORM_COMPONENT_ID_EXTERNAL_SOURCE			= self::__ID_FORM. '_10';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_CAPTION					= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_WAGE_FROM					= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_WAGE_TO					= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_WAGE_CURRENCY				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_DESCRIPTION				= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_WORK_EXPERIENCE			= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_WORK_SCHEDULE				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_EMPLOYER					= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_EMPLOYER_CITY				= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_EXTERNAL_SOURCE			= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_CAPTION		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_CAPTION		= 64;

	public const i_MIN_CHARS_COUNT_FIELD_WAGE_FROM		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_WAGE_FROM		= 7;

	public const i_MIN_CHARS_COUNT_FIELD_WAGE_TO		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_WAGE_TO		= 7;

	public const i_MIN_CHARS_COUNT_FIELD_DESCRIPTION	= 1;
	public const i_MAX_CHARS_COUNT_FIELD_DESCRIPTION	= 256;

	public const i_MIN_CHARS_COUNT_FIELD_EMPLOYER		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_EMPLOYER		= 64;

	public const i_MIN_CHARS_COUNT_FIELD_EXTERNAL_SOURCE	= 1;
	public const i_MAX_CHARS_COUNT_FIELD_EXTERNAL_SOURCE	= 256;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_job_vacancy_content_addition_form';
	//...CSS
	
	//CLASSES...
	private const _TEXTFIELD_COMPONENT_CAPTION_CLASSES				= 'css_textfield_component_caption';
	private const _TEXTFIELD_COMPONENT_ELEMENT_CAPTION_CLASSES		= 'css_textfield_component_element_caption';

	private const _TEXTAREA_COMPONENT_DESCRIPTION_CLASSES			= 'css_textarea_component_description';
	private const _TEXTAREA_COMPONENT_ELEMENT_DESCRIPTION_CLASSES	= 'css_textarea_component_element_description';

	private const _TEXTFIELD_COMPONENT_EMPLOYER_CLASSES				= 'css_textfield_component_employer';
	private const _TEXTFIELD_COMPONENT_ELEMENT_EMPLOYER_CLASSES		= 'css_textfield_component_element_employer';

	private const _LISTBOX_COMPONENT_EMPLOYER_CITY_CLASSES			= 'css_listbox_component_employer_city';
	private const _LISTBOX_COMPONENT_ELEMENT_EMPLOYER_CITY_CLASSES	= 'css_listbox_component_element_employer_city';

	private const _TEXTFIELD_COMPONENT_EXTERNAL_SOURCE_CLASSES			= 'css_textfield_component_external_source';
	private const _TEXTFIELD_COMPONENT_ELEMENT_EXTERNAL_SOURCE_CLASSES	= 'css_textfield_component_element_external_source';

	private const _BUTTON_COMPONENT_SUBMIT_CLASSES					= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES			= 'css_button_component_element_submit css_blue css_rounded_low';
	
	private const _TEXT_COMPONENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES			= 'css_text_component_about_mandatory_fields_note css_inline_show';
	private const _TEXT_COMPONENT_ELEMENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES	= 'css_text_component_element_about_mandatory_fields_note';
	//...CLASSES

	//TRANSLATIONS...
	private const _FORM_XML_NODE_ID							= 'vacancy_content_addition_form';
	private const _CAPTION_TEXTFIELD_XML_NODE_ID			= 'caption_textfield';
	private const _WAGE_FROM_TEXTFIELD_XML_NODE_ID			= 'wage_from_textfield';
	private const _WAGE_TO_TEXTFIELD_XML_NODE_ID			= 'wage_to_textfield';
	private const _WAGE_CURRENCY_LISTBOX_XML_NODE_ID		= 'wage_currency_listbox';
	private const _DESCRIPTION_TEXTAREA_XML_NODE_ID			= 'description_textarea';
	private const _EMPLOYER_TEXTFIELD_XML_NODE_ID			= 'employer_textfield';
	private const _EMPLOYER_CITY_LISTBOX_XML_NODE_ID		= 'employer_city_listbox';
	private const _EXTERNAL_SOURCE_TEXTFIELD_XML_NODE_ID	= 'external_source_textfield';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		return CVariableTools::i_toString(CJOBRequestConst::i_REQUEST_ID_VACANCY_CONTENT_ADDITION);
	}

	//JS...
	/*override*/protected function __drawPreJS():void
	{
		/*$lComponentValidationParams_obj_arr = CRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD;
		$lRegistrationEventView_clss = CJOBodulesView::getInstance()->getEventsView()->getRegistrationEventView();

		$lJSComponentValidationParams_obj_arr = $this->__generateJSComponentValidationParams($lComponentValidationParams_obj_arr, $lRegistrationEventView_clss);

		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		*///lJSForm_clss.JSSetFormAttrs(\'' .CJSUtil::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		//lJSForm_clss.JSSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';

		/*echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_setFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
	/*	echo
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

	/*override*/protected function __drawBodyContent():void
	{
		$lMainData_clss = $this->__getMainData();

		$lComponentsView_clss = $this->__getComponentsView();
		$lComponentsView_clss = CJOBComponentsView::i_toClassType($lComponentsView_clss);
		$lCompositeComponentsView_clss = $lComponentsView_clss->i_getCompositeComponentsView();
		$lCompositeComponentsView_clss = CJOBCompositeComponentsView::i_toClassType($lCompositeComponentsView_clss);
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();
		$lTextareaComponentsView_clss = $lComponentsView_clss->i_getTextareaComponentsView();
		$lListboxComponentsView_clss = $lComponentsView_clss->i_getListboxComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		//CAPTION...
		$lTextfieldTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_CAPTION_TEXTFIELD_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_CAPTION,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $lMainData_clss->i_isPOSTParamDefined(self::i_FORM_COMPONENT_ID_CAPTION) ? $lMainData_clss->i_getPOSTParam(self::i_FORM_COMPONENT_ID_CAPTION) : '',
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_CAPTION,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_CAPTION,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_CAPTION_CLASSES,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_CAPTION_CLASSES,
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...CAPTION

		//WAGE RANGE...
		$lTranslationData_clss_arr = [
										$this->__getTranslationXMLTextfieldComponentNode(self::_WAGE_FROM_TEXTFIELD_XML_NODE_ID),
										$this->__getTranslationXMLTextfieldComponentNode(self::_WAGE_TO_TEXTFIELD_XML_NODE_ID),
										$this->__getTranslationXMLListboxComponentNode(self::_WAGE_CURRENCY_LISTBOX_XML_NODE_ID)
									];
		$lValidationData_obj_arr_arr = [
											CJOBWageRangeCompositeComponentView::i_COMPOSITE_COMPONENT_ID_WAGE_FROM_TEXTFIELD =>
											[
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_WAGE_FROM,
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_WAGE_FROM,
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_MAX_CHARS_COUNT	=> self::i_MAX_CHARS_COUNT_FIELD_WAGE_FROM
											],
											CJOBWageRangeCompositeComponentView::i_COMPOSITE_COMPONENT_ID_WAGE_TO_TEXTFIELD =>
											[
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_WAGE_TO,
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_WAGE_TO,
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_MAX_CHARS_COUNT	=> self::i_MAX_CHARS_COUNT_FIELD_WAGE_TO
											],
											CJOBWageRangeCompositeComponentView::i_COMPOSITE_COMPONENT_ID_WAGE_CURRENCY_LISTBOX =>
											[
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_WAGE_CURRENCY,
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_WAGE_CURRENCY,
												CJOBWageRangeCompositeComponentView::i_VALIDATION_DATA_COMPONENT_ITEMS_DATA			=> $lDatabaseData_clss->i_getCurrenciesTableQueriesData()->___getSelectData()
											]
										];

		$lComponentsParams_obj_arr	= [	CJOBWageRangeCompositeComponentView::i_COMPOSITE_COMPONENT_PARAM_TRANSLATION_DATA	=> $lTranslationData_clss_arr,
										CJOBWageRangeCompositeComponentView::i_COMPOSITE_COMPONENT_PARAM_VALIDATION_DATA	=> $lValidationData_obj_arr_arr];

		$lParams_a_arr	= [CJOBWageRangeCompositeComponentView::i_PARAM_ID_COMPOSITE_COMPONENTS_PARAMS	=> $lComponentsParams_obj_arr];
		$lCompositeComponentsView_clss->i_getWageRangeCompositeComponentView()->i_draw($lParams_a_arr);
		//...WAGE RANGE

		//DESCRIPTION...
		$lTextareaTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_DESCRIPTION_TEXTAREA_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_DESCRIPTION,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextareaTranslationData_clss->i_getName(),
							CCSimpleTextareaComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lMainData_clss->i_isPOSTParamDefined(self::i_FORM_COMPONENT_ID_DESCRIPTION) ? $lMainData_clss->i_getPOSTParam(self::i_FORM_COMPONENT_ID_DESCRIPTION) : '',
							CCSimpleTextareaComponentView::i_PARAM_ID_COMPONENT_MAX_CHARS_COUNT			=> self::i_MAX_CHARS_COUNT_FIELD_DESCRIPTION,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_DESCRIPTION,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXTAREA_COMPONENT_DESCRIPTION_CLASSES,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXTAREA_COMPONENT_ELEMENT_DESCRIPTION_CLASSES,
							//CCSimpleTextareaComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextareaComponentsView_clss->i_getSimpleTextareaComponentView()->i_draw($lParams_a_arr);
		//...DESCRIPTION

		//EMPLOYER...
		$lTextfieldTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_EMPLOYER_TEXTFIELD_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_EMPLOYER,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $lMainData_clss->i_isPOSTParamDefined(self::i_FORM_COMPONENT_ID_EMPLOYER) ? $lMainData_clss->i_getPOSTParam(self::i_FORM_COMPONENT_ID_EMPLOYER) : '',
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_EMPLOYER,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_EMPLOYER,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_EMPLOYER_CLASSES,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_EMPLOYER_CLASSES,
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_EMPLOYER_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...EMPLOYER

		//EMPLOYER CITY...
		$lListboxTranslationData_clss = $this->__getTranslationXMLListboxComponentNode(self::_EMPLOYER_CITY_LISTBOX_XML_NODE_ID);

		$lItemsData_a_arr = $this->_generateListboxItemsData(self::i_FORM_COMPONENT_ID_EMPLOYER_CITY, $lListboxTranslationData_clss, $lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectData());

		$lParams_a_arr	= [	CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_EMPLOYER_CITY,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lListboxTranslationData_clss->i_getName(),
							CCSimpleListboxComponentView::i_PARAM_ID_ITEMS_DATA						=> $lItemsData_a_arr,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_EMPLOYER_CITY,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LISTBOX_COMPONENT_EMPLOYER_CITY_CLASSES,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LISTBOX_COMPONENT_ELEMENT_EMPLOYER_CITY_CLASSES,
							//CCSimpleListboxComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_EMPLOYER_CITY_LISTBOX,
							CCSimpleListboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lListboxComponentsView_clss->i_getSimpleListboxComponentView()->i_draw($lParams_a_arr);
		//...EMPLOYER CITY

		//EXTERNAL SOURCE...
		$lTextfieldTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_EXTERNAL_SOURCE_TEXTFIELD_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_EXTERNAL_SOURCE,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $lMainData_clss->i_isPOSTParamDefined(self::i_FORM_COMPONENT_ID_EXTERNAL_SOURCE) ? $lMainData_clss->i_getPOSTParam(self::i_FORM_COMPONENT_ID_EXTERNAL_SOURCE) : '',
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_EXTERNAL_SOURCE,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_EXTERNAL_SOURCE,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_EXTERNAL_SOURCE_CLASSES,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_EXTERNAL_SOURCE_CLASSES,
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_EXTERNAL_SOURCE_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...EXTERNAL SOURCE

		//HIDDEN...
		//$this->__drawHiddenComponent(CJOBJOBGenerationFormView::i_FORM_COMPONENT_ID_HIDDEN);
		//...HIDDEN
	}

	private function _generateListboxItemsData(string $aFormComponentId_str, CCTranslationXMLListboxComponentNode $aListboxTranslationData_clss, array $aTableData_clss_arr):array
	{
		$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
								//CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> '',
								CCListboxComponentItem::i_PARAM_ID_ITEM_NAME			=> $aListboxTranslationData_clss->i_getPlaceholder(),
								CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE			=> CVariableTools::i_toString(CCListboxComponentItem::i_EMPTY_ITEM_VALUE),
								CCListboxComponentItem::i_PARAM_ID_ITEM_STATE			=> CCListboxComponentItem::i_ITEM_STATE_SELECTED];

		$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
								CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];

		$lCount_int = CArrayTools::i_count($aTableData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lSTableData_clss = CCSTableData::i_toClassType($aTableData_clss_arr[$i]);

			$lId_int = $lSTableData_clss->i_getTableFieldId();
			$lName_str = $lSTableData_clss->i_getTableFieldName();

			$lItemParams_a_arr	= [	CCListboxComponentItem::i_PARAM_ID_ITEM_COMPONENT_ID	=> $aFormComponentId_str,
									CCListboxComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> CVariableTools::i_toString($lId_int),
									CCListboxComponentItem::i_PARAM_ID_ITEM_NAME			=> $lName_str,
									CCListboxComponentItem::i_PARAM_ID_ITEM_VALUE			=> CVariableTools::i_toString($lId_int),
									CCListboxComponentItem::i_PARAM_ID_ITEM_STATE			=> CCLabellistComponentItem::i_ITEM_STATE_ENABLED];

			$lItemsData_a_arr[] = [	CCListboxComponentView::i_ITEM_DATA_PARAM_ID_TYPE	=> CCListboxComponentView::i_ITEM_DATA_TYPE_SINGLE,
									CCListboxComponentView::i_ITEM_DATA_PARAM_ID_PARAMS	=> $lItemParams_a_arr];
		}

		return $lItemsData_a_arr;
	}

	//PARAMS...
	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*/protected function __getFormAction():string
	{
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENT,
									CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION	=> CJOBActionConst::i_ACTION_ID_ADD];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
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
