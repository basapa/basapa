<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserMessageAdditingFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_FORM_ID								= 'user_message_additing_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_FORM_ID. '_01';
	public const i_FORM_COMPONENT_ID_USER_NAME			= self::i_FORM_ID. '_02';
	public const i_FORM_COMPONENT_ID_MESSAGE			= self::i_FORM_ID. '_03';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_FORM_ID. '_04';
	//...IDS

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_USER_NAME		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_USER_NAME		= 64;

	public const i_MIN_CHARS_COUNT_FIELD_MESSAGE		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_MESSAGE		= 1024;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_user_message_additing_form';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		//return CCRequestConst::i_REQUEST_ID_USER_MESSAGE_ADDITION;

		return '';
	}

	//JS...
	/*override*//*protected function __isJSSupportAllowed():bool
	{
		return true;
	}*/

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
		'var lJSForm_clss = ' .$this->__getJSForm(). ';';*/
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

		return 'bsp.CMain.i_getSite(\'' .$lSiteId_str. '\').i_getPages().i_getPage(\'' .$lPageId_str. '\').i_getForms().i_getUserMessageAdditingFormView()';*/

		return '';
	}
	//...JS
	
	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lTranslationXMLFileData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationXMLFileData_clss->i_getFormsTranslationData()->i_getUserMessageAdditingFormTranslationData();

		//FORM NAME...
		$lFormName_str = $lFormTranslationData_clss->i_getFormName();

		$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_FORM_NAME,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormName_str,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_SIZE					=> CCCaptionTextComponentView::i_SIZE_3,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_form_name',
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_form_name',
							//CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextareaComponentsView_clss = $lComponentsView_clss->i_getTextareaComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();

		$lTranslationXMLFileData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationXMLFileData_clss->i_getFormsTranslationData()->i_getUserMessageAdditingFormTranslationData();

		//USER NAME...
		$lCaptionTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getCaptionTextfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_USER_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lCaptionTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $this->__getMainData()->i_getPOSTParam(self::i_FORM_COMPONENT_ID_USER_NAME, false, ''),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_PLACEHOLDER					=> $lCaptionTextfieldTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> CCUserMessageAdditingRequestController::i_COMPONENT_VALIDATION_PARAMS_USER_NAME_TEXTFIELD[CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE],
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_USER_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION		=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_textfield_component_user_name',
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_textfield_component_element_user_name',
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...USER NAME

		//MESSAGE...
		$lMessageTextareaTranslationData_clss = $lFormTranslationData_clss->i_getMessageTextareaTranslationData();

		$lParams_a_arr	= [	CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_MESSAGE,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lMessageTextareaTranslationData_clss->i_getName(),
							CCSimpleTextareaComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $this->__getMainData()->i_getPOSTParam(self::i_FORM_COMPONENT_ID_MESSAGE, false, ''),
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_PLACEHOLDER			=> $lMessageTextareaTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> CCUserMessageAdditingRequestController::i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA[CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE],
							CCSimpleTextareaComponentView::i_PARAM_ID_COMPONENT_MAX_CHARS_COUNT			=> self::i_MAX_CHARS_COUNT_FIELD_MESSAGE,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION			=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_textarea_component_message',
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_textarea_component_element_message',
							//CCSimpleTextareaComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextareaComponentsView_clss->i_getSimpleTextareaComponentView()->i_draw($lParams_a_arr);
		//...MESSAGE
		
		//HIDDEN...
		//$this->__drawHiddenComponent(CJOBAvatarGenerationFormView::i_FORM_COMPONENT_ID_HIDDEN);
		//...HIDDEN
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lTranslationXMLFileData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationXMLFileData_clss->i_getFormsTranslationData()->i_getUserMessageAdditingFormTranslationData();

		//SUBMIT...
		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lFormTranslationData_clss->i_getSubmitButtonTranslationData()->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_button_component_submit',
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_button_component_element_submit css_gray',
							//CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT

		//ABOUT MANDATORY FIELDS NOTE...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE				=> $lFormTranslationData_clss->i_getAboutMandatoryFieldsNoteTextTranslationData()->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_about_mandatory_fields_note',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_about_mandatory_fields_note'];
		$lComponentsView_clss->i_getTextComponentsView()->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...ABOUT MANDATORY FIELDS NOTE
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
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_DEBUG];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}
	//...PARAMS
}


?>