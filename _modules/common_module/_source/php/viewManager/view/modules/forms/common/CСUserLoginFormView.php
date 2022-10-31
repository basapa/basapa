<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserLoginFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_FORM_ID								= 'user_login_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_FORM_ID. '_form_name';
	public const i_FORM_COMPONENT_ID_LOGIN				= self::i_FORM_ID. '_login';
	public const i_FORM_COMPONENT_ID_PASSWORD			= self::i_FORM_ID. '_password';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_FORM_ID. '_submit';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_LOGIN				= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_PASSWORD			= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_LOGIN				= 1;
	public const i_MAX_CHARS_COUNT_FIELD_LOGIN				= 32;

	public const i_MIN_CHARS_COUNT_FIELD_PASSWORD			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_PASSWORD			= 32;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_user_login_form';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES				= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES		= 'css_text_component_element_form_name';
	
	private const _TEXTFIELD_COMPONENT_LOGIN_CLASSES			= 'css_textfield_component_login';
	private const _TEXTFIELD_COMPONENT_ELEMENT_LOGIN_CLASSES	= 'css_textfield_component_element_login';
	
	private const _TEXTFIELD_COMPONENT_PASSWORD_CLASSES			= 'css_textfield_component_password';
	private const _TEXTFIELD_COMPONENT_ELEMENT_PASSWORD_CLASSES	= 'css_textfield_component_element_password';
	
	private const _BUTTON_COMPONENT_SUBMIT_CLASSES				= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES		= 'css_button_component_element_submit css_blue css_rounded_low';
	//...CLASSES
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*override*/protected function __getFormPOSTRequestId():string
	{
		//return CCRequestConst::i_REQUEST_ID_USER_LOGIN;

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
		//lJSForm_clss.jsSetFormAttrs(\'' .CJSTools::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		//lJSForm_clss.jsSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';
	}

	/*override*/protected function __drawPostJS():void
	{
	/*	echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.i_initDOMForm();';*/
	}

	/*override*/protected function __getJSForm():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.JSMain.jsGetSite(\'' .$lSiteId_str. '\').jsGetPages().jsGetPage(\'' .$lPageId_str. '\').jsGetModules().jsGetForms().jsGetPaymentForm()';*/

		return '';
	}
	//...JS
	
	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();
		
		$lTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getUserLoginFormTranslationData();

		//LOGIN...
		$lTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getLoginTextfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_LOGIN,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $this->__getMainData()->i_getPostParam(self::i_FORM_COMPONENT_ID_LOGIN),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_LOGIN,
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_LOGIN,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION		=> CStringTools::i_replace($lTextfieldTranslationData_clss->i_getDescription(), CVariableTools::i_toString(self::i_MIN_CHARS_COUNT_FIELD_LOGIN), CStringTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_LOGIN_CLASSES,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_LOGIN_CLASSES,
							//CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...LOGIN
		
		//PASSWORD...
		$lTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getPasswordTextfieldTranslationData();

		$lParams_a_arr	= [	CCSecureTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_PASSWORD,
							CCSecureTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lTextfieldTranslationData_clss->i_getName(),
							CCSecureTextfieldComponentView::i_PARAM_ID_VALUE							=> $this->__getMainData()->i_getPostParam(self::i_FORM_COMPONENT_ID_PASSWORD),
							CCSecureTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_PASSWORD,
							CCSecureTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_PASSWORD,
							CCSecureTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION		=> CStringTools::i_replace($lTextfieldTranslationData_clss->i_getDescription(), CVariableTools::i_toString(self::i_MIN_CHARS_COUNT_FIELD_PASSWORD), CStringTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSecureTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_PASSWORD_CLASSES,
							CCSecureTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_PASSWORD_CLASSES,
							//CCSecureTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSecureTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...PASSWORD

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
		
		//separator
		//$lComponentsView_clss->drawSeparator();

		//remember me
		/*$lParams_obj_arr	= array(CSimpleCheckboxComponentView::PARAM_ID					=> CFieldIdConst::FORM_LOGIN_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_POST_NAME			=> $lLoginFormTranslationData_clss->getRememberMeCheckboxData()->getPostName(),//CFieldNameConst::FORM_LOGIN_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_VALUE				=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_REMEMBER),
									//CSimpleCheckboxComponent::IS_MANDATORY_FIELD_PARAM	=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_REMEMBER),
									CSimpleCheckboxComponentView::PARAM_CLASSES				=> 'css_checkbox_component_01',
									CSimpleCheckboxComponentView::PARAM_ELEMENT_CLASSES		=> 'css_checkbox_component_01_element');
		$lSimpleCheckboxComponentView_clss->draw($lParams_obj_arr);*/

		//recovery password
		/*$lStaticURLParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_RECOVERY_PASSWORD);

		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $lLoginFormTranslationData_clss->getRecoveryPasswordTextData()->getValue(),//CFieldNameConst::FORM_LOGIN_RECOVERY_PASSWORD,
									CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByParams($lStaticURLParams_obj_arr),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_01',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_01_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);*/

		//separator
		//$lComponentsView_clss->drawSeparator();

		//registration
		/*$lStaticURLParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_REGISTRATION);

		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $lLoginFormTranslationData_clss->getRegistrationTextData()->getValue(),//CFieldNameConst::FORM_LOGIN_REGISTRATION,
									CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByParams($lStaticURLParams_obj_arr),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_02',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_02_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);*/
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
