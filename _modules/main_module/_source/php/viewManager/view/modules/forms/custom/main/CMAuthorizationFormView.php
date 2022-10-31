<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMAuthorizationFormView extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/


	protected function __getId()
	{
		return CFieldIdConst::FORM_AUTHORIZATION;
	}


	protected function __getJSFormComponentSubmitButtonId()
	{
		return CRequestConst::REQUEST_ID_AUTHORIZATION;
	}


	protected function __getClasses()
	{
		return 'css_authorization_form ' .parent::__getClasses();
	}


	protected function __getAction()
	{
		$lStaticParams_obj_arr = array(	CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID => CPageConst::PAGE_ID_AUTHORIZATION);
		return CURLConversion::generateURLByStaticParams($lStaticParams_obj_arr);
	}


	protected function __drawHeaderContent()
	{
		return CFieldNameConst::FORM_AUTHORIZATION;
	}


	protected function __drawBodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSimpleCheckboxComponentView_clss = $lComponentsView_clss->getCheckboxComponentsView()->getSimpleCheckboxComponentView();

		$lUserComponentFilledData_clss = $this->__getUserComponentFilledData();
		$lAuthorizationFormTranslationData_clss = $this->__getFormsTranslationData()->getAuthorizationFormTranslationData();

		//labellist
		/*$lPageId_str = $this->__getMainData()->getParam(CParamConst::PAGE_ID);
		$lData_arr = $this->__getComponentData()->getAuthorizationLabelListData();
		
		$lParams_arr	= array(CComponentParam::LABELLIST_TYPE				=> CLabelList::TYPE_NAVIGATION_MENU,
								CComponentParam::LABELLIST_ELEMENTS 		=> CTools::getElementsFromComponentData($lData_arr, $lPageId_str));
		$lComponentsView_clss->getLabellist()->draw($lParams_arr);*/

		//login
		$lLoginTextfieldData_clss = $lAuthorizationFormTranslationData_clss->getLoginTextfieldData();

		$lParams_obj_arr	= array(CSimpleTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_AUTHORIZATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_NAME				=> $lLoginTextfieldData_clss->getName(),//CFieldNameConst::FORM_AUTHORIZATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_VALUE				=> $this->__getUserComponentFilledData()->getComponentValue(CFieldIdConst::FORM_AUTHORIZATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_FILLING_MODE		=> $this->__getUserComponentFilledData()->getComponentValueFillingMode(CFieldIdConst::FORM_AUTHORIZATION_LOGIN),
									CSimpleTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_AUTHORIZATION_LOGIN,
									CSimpleTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lLoginTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_LOGIN, CTools::REPLACING_PATTERN_CHARS_COUNT),
									CSimpleTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_01',
									CSimpleTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_01_element');
		$lTextfieldComponentsView_clss->getSimpleTextfieldComponentView()->draw($lParams_obj_arr);
		
		//password
		$lPasswordTextfieldData_clss = $lAuthorizationFormTranslationData_clss->getPasswordTextfieldData();

		$lParams_obj_arr	= array(CPasswordTextfieldComponentView::PARAM_ID				=> CFieldIdConst::FORM_AUTHORIZATION_PASSWORD,
									CPasswordTextfieldComponentView::PARAM_NAME				=> $lPasswordTextfieldData_clss->getName(),//CFieldNameConst::FORM_AUTHORIZATION_PASSWORD,
									CPasswordTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_AUTHORIZATION_PASSWORD,
									CPasswordTextfieldComponentView::PARAM_DESCRIPTION		=> CTools::replace($lPasswordTextfieldData_clss->getDescription(), CFieldLengthConst::MIN_PASSWORD, CTools::REPLACING_PATTERN_CHARS_COUNT),
									CPasswordTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_02',
									CPasswordTextfieldComponentView::PARAM_ELEMENT_CLASSES	=> 'css_textfield_component_02_element');
		$lTextfieldComponentsView_clss->getPasswordTextfieldComponentView()->draw($lParams_obj_arr);
		
		//remember me
		$lParams_obj_arr	= array(CSimpleCheckboxComponentView::PARAM_ID 					=> CFieldIdConst::FORM_AUTHORIZATION_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_POST_NAME			=> $lAuthorizationFormTranslationData_clss->getRememberMeCheckboxData()->getPostName(),//CFieldNameConst::FORM_AUTHORIZATION_REMEMBER,
									CSimpleCheckboxComponentView::PARAM_CLASSES				=> 'css_checkbox_component_01',
									CSimpleCheckboxComponentView::PARAM_ELEMENT_CLASSES		=> 'css_checkbox_component_01_element');
		$lSimpleCheckboxComponentView_clss->draw($lParams_obj_arr);
		
		//hidden
		$lParams_obj_arr	= array(CHiddenTextfieldComponentView::PARAM_ID					=> CFieldIdConst::FORM_AUTHORIZATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookieParamValue(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::FORM_AUTHORIZATION_HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_hidden_textfield_component');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}


	protected function __drawFooterContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();

		$lAuthorizationFormTranslationData_clss = $this->__getFormsTranslationData()->getAuthorizationFormTranslationData();

		//button
		$lParams_obj_arr	= array(CSubmitButtonComponentView::PARAM_ID				=> $this->__getJSFormComponentSubmitButtonId(),
									CSubmitButtonComponentView::PARAM_NAME				=> $lAuthorizationFormTranslationData_clss->getSubmitButtonData()->getName(),//CFieldNameConst::BUTTON_ENTER,
									CSubmitButtonComponentView::PARAM_CLASSES			=> 'css_button_component_01',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES	=> 'css_button_component_01_element css_blue');
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);
	}
}


?>
