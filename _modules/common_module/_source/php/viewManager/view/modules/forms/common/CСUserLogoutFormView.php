<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserLogoutFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_FORM_ID								= 'user_logout_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_FORM_ID. '_form_name';
	public const i_FORM_COMPONENT_ID_LOGIN				= self::i_FORM_ID. '_login';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_FORM_ID. '_submit';
	//...IDS

	//FILLING_MODES...
	//...FILLING_MODES

	//CHARS COUNT...
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_user_logout_form';
	//...CSS

	//CLASSES...
	private const _TEXTFIELD_COMPONENT_LOGIN_CLASSES			= 'css_textfield_component_login';
	private const _TEXTFIELD_COMPONENT_ELEMENT_LOGIN_CLASSES	= 'css_textfield_component_element_login';
	
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
		//return CCRequestConst::i_REQUEST_ID_USER_LOGOUT;

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
		/*echo
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
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();
		
		$lTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getUserLogoutFormTranslationData();
		
		//login
		/*$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $this->__getUserData()->getUserLogin(),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_01',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_01_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		*/
		
		//LOGIN...
		/*$lTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getLoginTextfieldTranslationData();

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
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);*/
		//...LOGIN
		
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

		//administration
		/*if ($this->__getUserData()->isAdmin() || $this->__getUserData()->isModerator())
		{
			$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
												CParamConst::PAGE_ID => CPageConst::PAGE_ID_REGISTRATION);

			$lParams_obj_arr 	= array(CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByStaticParams($lURLStaticParams_obj_arr),
										CSubdescriptionTextComponentView::PARAM_VALUE			=> CFieldNameConst::FORM_LOGOUT_ADMIN,
										CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_02',
										CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_02_element');
			$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		}*/

		//account
		/*$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID => CPageConst::PAGE_ID_USER);

		$lParams_obj_arr 	= array(CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByStaticParams($lURLStaticParams_obj_arr ),
									CSubdescriptionTextComponentView::PARAM_VALUE			=> CFieldNameConst::FORM_LOGOUT_ACCOUNT,
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_03',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_03_element');
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
