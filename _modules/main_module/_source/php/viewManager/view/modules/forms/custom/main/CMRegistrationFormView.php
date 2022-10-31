<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMRegistrationFormView extends CMFormView
{
	//JS PHP AGREEMENTS...
	const JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD			= 0;
	//...JS PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getId()
	{
		return CFieldIdConst::FORM_REGISTRATION;
	}

	protected function __isJSSupportAllowed()
	{
		return true;
	}

	protected function __initJS()
	{
		$lComponentValidationParams_obj_arr = CRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD;
		$lRegistrationEventView_clss = CModulesView::getInstance()->getEventsView()->getRegistrationEventView();

		$lJSComponentValidationParams_obj_arr = $this->__generateJSComponentValidationParams($lComponentValidationParams_obj_arr, $lRegistrationEventView_clss);

		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.jsSetFormAttrs(\'' .CJSTools::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		lJSForm_clss.jsSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';
	}

	protected function __drawJS()
	{
		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.jsInitDOMForm();';
	}

	protected function __getJSForm()
	{
		return 'bsp.JSCMain.jsGetPages().jsGetRegistrationPage().jsGetModules().jsGetForms().jsGetRegistrationForm()';
	}

	protected function __getClasses()
	{
		return 'css_registration_form ' .parent::__getClasses();
	}

	protected function __getAction()
	{
		$lStaticParams_obj_arr = array(	CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_REGISTRATION);
		return CURLConversion::generateURLByParams($lStaticParams_obj_arr);
	}

	protected function __drawHeaderContent()
	{
		return CFieldNameConst::FORM_REGISTRATION;
	}

	protected function __drawBodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSimpleCheckboxComponentView_clss = $lComponentsView_clss->getCheckboxComponentsView()->getSimpleCheckboxComponentView();

		$lUserComponentFilledData_clss = $this->__getUserComponentFilledData();
		$lRegistrationFormTranslationData_clss = $this->__getFormsTranslationData()->getRegistrationFormTranslationData();

		//labellist
		/*$lPage_str = $this->__getMainData()->getParam(CParamConst::PAGE);
		$lData_arr = $this->__getComponentData()->getAuthorizationLabelListData();
		
		$lParams_arr	= array(CComponentParam::LABELLIST_TYPE				=> CLabelList::TYPE_NAVIGATION_MENU,
								CComponentParam::LABELLIST_ELEMENTS 		=> CTools::getElementsFromComponentData($lData_arr, $lPage_str));
		$lComponents_clss->getLabellist()->draw($lParams_arr);*/

		//text
		/*$lParams_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
								CComponentParam::TEXT_NAME 					=> CTools::replace(CFieldDescriptionConst::TEXT_READ_RULES, CPageConst::PAGE_RULES, CViewConst::REPLACE_HREF),
								CComponentParam::TEXT_STYLE_COMPONENT 		=> 'text-align:left;');
		$lComponents_clss->getText()->draw($lParams_arr);*/
		
		//login
		$lLoginTextfieldData_clss = $lRegistrationFormTranslationData_clss->getLoginTextfieldData();

		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID							=> CFieldIdConst::FORM_REGISTRATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_NAME						=> $lLoginTextfieldData_clss->getName(),
									CSimpleTextfieldComponentView::PARAM_VALUE						=> $this->__getUserComponentFilledData()->getComponentValue(CFieldIdConst::FORM_REGISTRATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_FILLING_MODE				=> $this->__getUserComponentFilledData()->getComponentValueFillingMode(CFieldIdConst::FORM_REGISTRATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT			=> CFieldLengthConst::FORM_REGISTRATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_DESCRIPTION				=> CTools::replace($lLoginTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_LOGIN, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CSimpleTextfieldComponentView::PARAM_CLASSES					=> 'css_textfield_component_login',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES			=> 'css_textfield_component_login_element',
									CSimpleTextfieldComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									CSimpleTextfieldComponentView::PARAM_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc());
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);

		//password
		$lPasswordTextfieldData_clss = $lRegistrationFormTranslationData_clss->getPasswordTextfieldData();

		$lParams_obj_arr	= array(CSecureTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_PASSWORD,
									CSecureTextfieldComponentView::PARAM_NAME				=> $lPasswordTextfieldData_clss->getName(),
									CSecureTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_PASSWORD,
									CSecureTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lPasswordTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_PASSWORD, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CSecureTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_password',
									CSecureTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_password_element');
		$lTextfieldComponentsView_clss->getSecureTextfieldComponentView()->draw($lParams_obj_arr);
		
		//repeat password
		$lRepeatPasswordTextfieldData_clss = $lRegistrationFormTranslationData_clss->getRepeatPasswordTextfieldData();

		$lParams_obj_arr	= array(CSecureTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_REPEAT_PASSWORD,
									CSecureTextfieldComponentView::PARAM_NAME				=> $lRepeatPasswordTextfieldData_clss->getName(),
									CSecureTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_REPEAT_PASSWORD,
									CSecureTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lRepeatPasswordTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_PASSWORD, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
									CSecureTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_repeat_password',
									CSecureTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_repeat_password_element');
		$lTextfieldComponentsView_clss->getSecureTextfieldComponentView()->draw($lParams_obj_arr);

		//email
		$lEmailTextfieldData_clss = $lRegistrationFormTranslationData_clss->getEmailTextfieldData();

		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_EMAIL,
									CSimpleTextfieldComponentView::PARAM_NAME				=> $lEmailTextfieldData_clss->getName(),
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_EMAIL,
									CSimpleTextfieldComponentView::PARAM_DESCRIPTION		=> $lEmailTextfieldData_clss->getDescription(),
									CSimpleTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_email',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_email_element');
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);
		
		//hidden
		$lParams_obj_arr	= array(CHiddenTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_REGISTRATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_REGISTRATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_hidden_textfield_component');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}

	protected function __drawFooterContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();

		$lRegistrationFormTranslationData_clss = $this->__getFormsTranslationData()->getRegistrationFormTranslationData();

		//button
		$lParams_obj_arr	= array(CSubmitButtonComponentView::PARAM_ID						=> CRequestConst::REQUEST_ID_REGISTRATION,
									CSubmitButtonComponentView::PARAM_NAME						=> $lRegistrationFormTranslationData_clss->getSubmitButtonData()->getName(),
									CSubmitButtonComponentView::PARAM_CLASSES					=> 'css_button_component_submit',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES			=> 'css_button_component_submit_element css_blue',
									CSubmitButtonComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
									CSubmitButtonComponentView::PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc());
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);
		
		//text
		/*$lParams_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
								CComponentParam::TEXT_NAME 					=> CFieldDescriptionConst::TEXT_FIELD_REQUIRED,
								CComponentParam::TEXT_STYLE					=> 'float:right;',
								CComponentParam::TEXT_STYLE_COMPONENT 		=> 'text-align:right;');
		$lComponents_clss->getText()->draw($lParams_arr);*/
	}
}


?>