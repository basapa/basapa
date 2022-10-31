<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMLoginFormView extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	
	protected function __getId()
	{
		return CFieldIdConst::FORM_LOGIN;
	}

	
	protected function __getJSFormComponentSubmitButtonId()
	{
		return CRequestConst::REQUEST_ID_LOGIN;
	}
	

	protected function __getClasses()
	{
		return 'css_login_form ' .parent::__getClasses();
	}


	protected function __draw()
	{
		$this->__drawBody();
	}


	protected function __drawBodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSubdescriptionTextComponentView_clss = $lComponentsView_clss->getTextComponentsView()->getSubdescriptionTextComponentView();
		$lSimpleCheckboxComponentView_clss = $lComponentsView_clss->getCheckboxComponentsView()->getSimpleCheckboxComponentView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();

		$lUserComponentFilledData_clss = $this->__getUserComponentFilledData();
		$lLoginFormTranslationData_clss = $this->__getFormsTranslationData()->getLoginFormTranslationData();

		//login
		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID						=> CFieldIdConst::FORM_LOGIN_LOGIN,
									CSimpleTextfieldComponentView::PARAM_CAPTION				=> $lLoginFormTranslationData_clss->getLoginTextfieldData()->getCaption(),//CFieldNameConst::FORM_LOGIN_LOGIN,
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT		=> CFieldLengthConst::FORM_LOGIN_LOGIN,
									CSimpleTextfieldComponentView::PARAM_VALUE					=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_LOGIN),
									//CSimpleTextfieldComponent::IS_MANDATORY_FIELD_PARAM		=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_LOGIN),
									CSimpleTextfieldComponentView::PARAM_CLASSES				=> 'css_textfield_component_01',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES		=> 'css_textfield_component_01_element');
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);

		//password
		$lParams_obj_arr	= array(CSecureTextfieldComponentView::PARAM_ID						=> CFieldIdConst::FORM_LOGIN_PASSWORD,
									CSecureTextfieldComponentView::PARAM_CAPTION				=> $lLoginFormTranslationData_clss->getPasswordTextfieldData()->getCaption(),//CFieldNameConst::FORM_LOGIN_PASSWORD,
									CSecureTextfieldComponentView::PARAM_MAX_CHARS_COUNT		=> CFieldLengthConst::FORM_LOGIN_PASSWORD,
									CSecureTextfieldComponentView::PARAM_VALUE					=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_PASSWORD),
									//CSecureTextfieldComponentView::IS_MANDATORY_FIELD_PARAM		=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_PASSWORD),
									CSecureTextfieldComponentView::PARAM_CLASSES				=> 'css_textfield_component_02',
									CSecureTextfieldComponentView::PARAM_ELEMENT_CLASSES		=> 'css_textfield_component_02_element');
		$lTextfieldComponentsView_clss->getSecureTextfieldComponentView()->draw($lParams_obj_arr);

		//submit
		$lParams_obj_arr	= array(CSubmitButtonComponentView::PARAM_ID				=> $this->__getJSFormComponentSubmitButtonId(),
									CSubmitButtonComponentView::PARAM_NAME				=> $lLoginFormTranslationData_clss->getSubmitButtonData()->getName(),//CFieldNameConst::BUTTON_ENTER,
									CSubmitButtonComponentView::PARAM_CLASSES			=> 'css_button_component_01',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES	=> 'css_button_component_01_element css_blue');
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);

		//separator
		$lComponentsView_clss->drawSeparator();

		//remember me
		$lParams_obj_arr	= array(CSimpleCheckboxComponentView::PARAM_ID					=> CFieldIdConst::FORM_LOGIN_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_POST_NAME			=> $lLoginFormTranslationData_clss->getRememberMeCheckboxData()->getPostName(),//CFieldNameConst::FORM_LOGIN_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_VALUE				=> $lUserComponentFilledData_clss->getComponentValue(CFieldIdConst::FORM_LOGIN_REMEMBER),
									//CSimpleCheckboxComponent::IS_MANDATORY_FIELD_PARAM	=> $lUserFieldsData_clss->isFormFieldNeedFilled(CFieldIdConst::FORM_LOGIN_REMEMBER),
									CSimpleCheckboxComponentView::PARAM_CLASSES				=> 'css_checkbox_component_01',
									CSimpleCheckboxComponentView::PARAM_ELEMENT_CLASSES		=> 'css_checkbox_component_01_element');
		$lSimpleCheckboxComponentView_clss->draw($lParams_obj_arr);

		//recovery password
		$lStaticURLParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_RECOVERY_PASSWORD);

		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $lLoginFormTranslationData_clss->getRecoveryPasswordTextData()->getValue(),//CFieldNameConst::FORM_LOGIN_RECOVERY_PASSWORD,
									CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByParams($lStaticURLParams_obj_arr),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_01',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_01_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);

		//separator
		$lComponentsView_clss->drawSeparator();

		//registration
		$lStaticURLParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_REGISTRATION);

		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $lLoginFormTranslationData_clss->getRegistrationTextData()->getValue(),//CFieldNameConst::FORM_LOGIN_REGISTRATION,
									CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByParams($lStaticURLParams_obj_arr),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_02',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_02_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);

		//hidden
		$lParams_obj_arr	= array(CHiddenTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_LOGIN_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_LOGIN_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_hidden_textfield_component');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}
}


?>
