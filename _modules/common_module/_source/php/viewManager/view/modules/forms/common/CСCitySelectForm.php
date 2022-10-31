<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCCitySelectForm extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_FORM_ID								= 'city_select_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_FORM_ID. '_form_name';
	public const i_FORM_COMPONENT_ID_LOGIN				= self::i_FORM_ID. '_login';
	public const i_FORM_COMPONENT_ID_PASSWORD			= self::i_FORM_ID. '_password';
	public const i_FORM_COMPONENT_ID_PASSWORD_REPEAT	= self::i_FORM_ID. '_repeat_password';
	public const i_FORM_COMPONENT_ID_EMAIL				= self::i_FORM_ID. '_email';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_FORM_ID. '_submit';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_LOGIN				= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_PASSWORD			= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_PASSWORD_REPEAT	= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_EMAIL				= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_LOGIN				= 1;
	public const i_MAX_CHARS_COUNT_FIELD_LOGIN				= 32;

	public const i_MIN_CHARS_COUNT_FIELD_PASSWORD			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_PASSWORD			= 32;

	public const i_MIN_CHARS_COUNT_FIELD_PASSWORD_REPEAT	= 1;
	public const i_MAX_CHARS_COUNT_FIELD_PASSWORD_REPEAT	= 32;

	public const i_MIN_CHARS_COUNT_FIELD_EMAIL				= 1;
	public const i_MAX_CHARS_COUNT_FIELD_EMAIL				= 64;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_city_select_form';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES								= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES						= 'css_text_component_element_form_name';
	
	private const _TEXTFIELD_COMPONENT_LOGIN_CLASSES							= 'css_textfield_component_login';
	private const _TEXTFIELD_COMPONENT_ELEMENT_LOGIN_CLASSES					= 'css_textfield_component_element_login';
	
	private const _TEXTFIELD_COMPONENT_PASSWORD_CLASSES							= 'css_textfield_component_password';
	private const _TEXTFIELD_COMPONENT_ELEMENT_PASSWORD_CLASSES					= 'css_textfield_component_element_password';
	
	private const _TEXTFIELD_COMPONENT_PASSWORD_REPEAT_CLASSES					= 'css_textfield_component_password_repeat';
	private const _TEXTFIELD_COMPONENT_ELEMENT_PASSWORD_REPEAT_CLASSES			= 'css_textfield_component_element_password_repeat';
	
	private const _TEXTFIELD_COMPONENT_EMAIL_CLASSES							= 'css_textfield_component_email';
	private const _TEXTFIELD_COMPONENT_ELEMENT_EMAIL_CLASSES					= 'css_textfield_component_element_email';
	
	private const _BUTTON_COMPONENT_SUBMIT_CLASSES								= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES						= 'css_button_component_element_submit css_blue css_rounded_low';
	
	private const _TEXT_COMPONENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES			= 'css_text_component_about_mandatory_fields_note css_inline_show';
	private const _TEXT_COMPONENT_ELEMENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES	= 'css_text_component_element_about_mandatory_fields_note';
	//...CLASSES
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*override*/protected function __getFormPOSTRequestId():string
	{
		//return CCRequestConst::i_REQUEST_ID_SELECT_CITY;

		return '';
	}

	//JS...
	/*override*//*protected function __isJSSupportAllowed():bool
	{
		return true;
	}*/

	/*override*/protected function __drawPreJS():void
	{
		//$lComponentValidationParams_obj_arr = CRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD;
		//$lRegistrationEventView_clss = CModulesView::getInstance()->getEventsView()->getRegistrationEventView();

		//$lJSComponentValidationParams_obj_arr = $this->__generateJSComponentValidationParams($lComponentValidationParams_obj_arr, $lRegistrationEventView_clss);

		//echo
		//'var lJSForm_clss = ' .$this->__getJSForm(). ';
		//lJSForm_clss.JSSetFormAttrs(\'' .CJSTools::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		//lJSForm_clss.JSSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.JSInitDOMForm();';*/
	}

	/*override*/protected function __getJSForm():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.JSMain.JSGetSite(\'' .$lSiteId_str. '\').JSGetPages().JSGetPage(\'' .$lPageId_str. '\').JSGetModules().JSGetForms().JSGetPaymentForm()';*/

		return '';
	}
	//...JS
	
	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getUserRegistrationFormTranslationData();

		
		/*$lCookieCityId_int = $this->__getHostData()->getCookie(CMainConst::COOKIE_USER_CITY_ID);

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
		
		$lJSChange_str = 'listboxSetComponentStateDisabled(\'' .CFieldIdConst::FORM_SELECT_CITY_REGION. '\', \'button_' .CRequestConst::REQUEST_SELECT_CITY. '\');';
		
		$lComponents_arr[CSelectCityCompositeComponent::LISTBOX_COMPONENT_REGION] 	= array(CComponentParam::COMPONENT_PARAM_ID 				=> CFieldIdConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_TRANSMIT 			=> CTransmitConst::FORM_SELECT_CITY_REGION,
																							CComponentParam::COMPONENT_PARAM_ELEMENTS 			=> $lElements_arr,
																							CComponentParam::COMPONENT_PARAM_VALUE	 			=> '',
																							CComponentParam::COMPONENT_PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_SELECT_REGION,
																							CComponentParam::COMPONENT_PARAM_REQUIRED_FILLED	=> $this->__getUserFieldsData()->isFormFieldNeedFilled(CTransmitConst::FORM_SELECT_CITY_REGION),
																							CComponentParam::COMPONENT_PARAM_JS_CHANGE			=> $lJSChange_str);

		$lJSChange_str = 'listboxUpdateComponentState(\'' .CFieldIdConst::FORM_SELECT_CITY_CITY. '\', \'button_' .CRequestConst::REQUEST_SELECT_CITY. '\');';

		$lComponents_arr[CSelectCityCompositeComponent::LISTBOX_COMPONENT_CITY] 		= array(CComponentParam::COMPONENT_PARAM_ID 			=> CFieldIdConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_REQUIRED 			=> CFieldRequiredConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_TRANSMIT 			=> CTransmitConst::FORM_SELECT_CITY_CITY,
																							CComponentParam::COMPONENT_PARAM_ELEMENTS 			=> null,
																							CComponentParam::COMPONENT_PARAM_VALUE	 			=> '',
																							CComponentParam::COMPONENT_PARAM_REQUIRED_FILLED 	=> $this->__getUserFieldsData()->isFormFieldNeedFilled(CTransmitConst::FORM_SELECT_CITY_CITY),
																							CComponentParam::COMPONENT_PARAM_PLACEHOLDER 		=> CFieldPlaceholderConst::PLACEHOLDER_SELECT_CITY,
																							CComponentParam::COMPONENT_PARAM_JS_CHANGE			=> $lJSChange_str);

		$lParams_arr = array(CComponentParam::COMPOSITE_COMPONENTS => $lComponents_arr);
		$this->__getComponents()->getCompositeComponents()->getSelectCityCompositeComponent()->draw($lParams_arr);
*/

		//SUBMIT...
		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lFormTranslationData_clss->i_getSubmitButtonTranslationData()->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT
		
		//button
		/*$lParams_arr 	= array(CComponentParam::BUTTON_ID 					=> CRequestConst::REQUEST_SELECT_CITY,
								CComponentParam::BUTTON_NAME 				=> CFieldNameConst::BUTTON_SET,
								CComponentParam::BUTTON_TYPE 				=> CButton::TYPE_SUBMIT,
								CComponentParam::BUTTON_COLOR 				=> CButton::COLOR_BLUE,
								CComponentParam::BUTTON_STATE 				=> CButton::STATE_DISABLED,
								CComponentParam::BUTTON_STYLE 				=> 'display:inline-block;');
		$this->__getComponents()->getButton()->draw($lParams_arr);*/
	}
	
	//PARAMS...
	/*override*/protected function __getFormId():string
	{
		return self::i_FORM_ID;
	}

	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*/protected function __getFormAction():string
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_MAIN];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}
	//...PARAMS
}


?>
