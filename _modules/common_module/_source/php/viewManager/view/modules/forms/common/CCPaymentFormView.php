<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCPaymentFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS
	
	//IDS...
	public const i_FORM_ID								= 'payment_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_FORM_ID. '_form_name';
	public const i_FORM_COMPONENT_ID_AMOUNT				= self::i_FORM_ID. '_amount';
	public const i_FORM_COMPONENT_ID_NAME				= self::i_FORM_ID. '_name';
	public const i_FORM_COMPONENT_ID_EMAIL				= self::i_FORM_ID. '_email';
	public const i_FORM_COMPONENT_ID_MESSAGE			= self::i_FORM_ID. '_message';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_FORM_ID. '_submit';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_AMOUNT			= CCFormComponentView::i_FILLING_MODE_ID_MANDATORY;
	public const i_FILLING_MODE_FIELD_NAME				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_EMAIL				= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	public const i_FILLING_MODE_FIELD_MESSAGE			= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_AMOUNT			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_AMOUNT			= 64;

	public const i_MIN_CHARS_COUNT_FIELD_NAME			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_NAME			= 64;

	public const i_MIN_CHARS_COUNT_FIELD_EMAIL			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_EMAIL			= 64;
	
	public const i_MIN_CHARS_COUNT_FIELD_MESSAGE		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_MESSAGE		= 1024;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_payment_form';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		//return CCRequestConst::i_REQUEST_ID_PAYMENT;

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
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		lJSForm_clss.JSSetFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');';*/
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

		return 'bsp.CMain.i_getSite(\'' .$lSiteId_str. '\').i_getPages().i_getPage(\'' .$lPageId_str. '\').i_getForms().i_getPaymentFormView()';*/

		return '';
	}
	//...JS
	
	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		//$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		//$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		//$lTranslationData_clss = $this->__getXMLFilesData()->i_getXMLFileData($lSiteId_str)->i_getTranslationXMLFileData();
		//$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getPaymentFormTranslationData();

		//FORM NAME...
		/*$lFormName_str = $lFormTranslationData_clss->getFormName();

		$lParams_a_arr	= [	CCCaptionTextComponentView::PARAM_ID						=> self::FORM_COMPONENT_ID_FORM_NAME,
								CCCaptionTextComponentView::PARAM_VALUE						=> $lFormName_str,
								CCCaptionTextComponentView::PARAM_CLASSES					=> 'css_text_component_form_name',
								CCCaptionTextComponentView::PARAM_ELEMENT_CLASSES			=> 'css_text_component_element_form_name',
								//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCCaptionTextComponentView::PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->getCaptionTextComponentView()->draw($lParams_a_arr);*/
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextareaComponentsView_clss = $lComponentsView_clss->i_getTextareaComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();

		$lTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getPaymentFormTranslationData();

		//AMOUNT...
		$lAmountTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getAmountTextfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID						=> self::i_FORM_COMPONENT_ID_AMOUNT,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION					=> $lAmountTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ERROR_MESSAGE				=> 'Необходимо&nbsp;заполнить',
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_IS_COMPONENT_ERROR_MESSAGE_ALLOWED	=> false,//$this->__isComponentErrorMessageAllowed(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE									=> '',//$this->__getComponentFilledValue(self::i_FORM_COMPONENT_ID_AMOUNT),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_PLACEHOLDER							=> $lAmountTextfieldTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE				=> self::i_FILLING_MODE_FIELD_AMOUNT,
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT							=> self::i_MAX_CHARS_COUNT_FIELD_AMOUNT,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION				=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES					=> 'css_textfield_component_amount',
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES			=> 'css_textfield_component_element_amount',
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID							=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC				=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...AMOUNT

		//NAME...
		$lNameTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getNameTextfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION			=> $lNameTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> '',//$this->__getComponentFilledValue(self::i_FORM_COMPONENT_ID_NAME),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_PLACEHOLDER					=> $lNameTextfieldTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION		=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_textfield_component_name',
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_textfield_component_element_name',
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...NAME

		//EMAIL...
		$lEmailTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getEmailTextfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_EMAIL,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION			=> $lEmailTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> '',//$this->__getComponentFilledValue(self::i_FORM_COMPONENT_ID_EMAIL),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_PLACEHOLDER					=> $lEmailTextfieldTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_EMAIL,
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_EMAIL,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_DESCRIPTION		=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_textfield_component_email',
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_textfield_component_element_email',
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...EMAIL

		//MESSAGE...
		$lMessageTextareaTranslationData_clss = $lFormTranslationData_clss->i_getMessageTextareaTranslationData();

		$lParams_a_arr	= [	CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_MESSAGE,
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION				=> $lMessageTextareaTranslationData_clss->i_getName(),
							CCSimpleTextareaComponentView::i_PARAM_ID_COMPONENT_VALUE					=>'',// $this->__getComponentFilledValue(self::i_FORM_COMPONENT_ID_MESSAGE),
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_PLACEHOLDER			=> $lMessageTextareaTranslationData_clss->i_getPlaceholder(),
							CCSimpleTextareaComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_MESSAGE,
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

		$lTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationData_clss->i_getFormsTranslationData()->i_getPaymentFormTranslationData();

		//SUBMIT...
		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lFormTranslationData_clss->i_getSubmitButtonTranslationData()->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_button_component_submit',
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_button_component_element_submit css_gray',
							//CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT

		//ABOUT MANDATORY FIELDS NOTE...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormTranslationData_clss->i_getAboutMandatoryFieldsNoteTextTranslationData()->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_text_component_about_mandatory_fields_note',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_text_component_element_about_mandatory_fields_note'];
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
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_MAIN];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}
	//...PARAMS
}


?>