<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCSupportFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_FORM_ID								= 'support_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_FORM_ID. '_form_name';
	public const i_FORM_COMPONENT_ID_CAPTION			= self::i_FORM_ID. '_caption';
	public const i_FORM_COMPONENT_ID_EMAIL				= self::i_FORM_ID. '_email';
	public const i_FORM_COMPONENT_ID_MESSAGE			= self::i_FORM_ID. '_message';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_FORM_ID. '_submit';
	//...IDS

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_CAPTION		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_CAPTION		= 64;

	public const i_MIN_CHARS_COUNT_FIELD_EMAIL			= 1;
	public const i_MAX_CHARS_COUNT_FIELD_EMAIL			= 64;
	
	public const i_MIN_CHARS_COUNT_FIELD_MESSAGE		= 1;
	public const i_MAX_CHARS_COUNT_FIELD_MESSAGE		= 1024;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_support_form';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES								= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES						= 'css_text_component_element_form_name';

	private const _TEXTFIELD_COMPONENT_LOGIN_CLASSES							= 'css_textfield_component_login';
	private const _TEXTFIELD_COMPONENT_ELEMENT_LOGIN_CLASSES					= 'css_textfield_component_element_login';

	private const _TEXTFIELD_COMPONENT_PASSWORD_CLASSES							= 'css_textfield_component_password';
	private const _TEXTFIELD_COMPONENT_ELEMENT_PASSWORD_CLASSES					= 'css_textfield_component_element_password';

	private const _TEXTFIELD_COMPONENT_REPEAT_PASSWORD_CLASSES					= 'css_textfield_component_repeat_password';
	private const _TEXTFIELD_COMPONENT_ELEMENT_REPEAT_PASSWORD_CLASSES			= 'css_textfield_component_element_repeat_password';

	private const _TEXTFIELD_COMPONENT_EMAIL_CLASSES							= 'css_textfield_component_email';
	private const _TEXTFIELD_COMPONENT_ELEMENT_EMAIL_CLASSES					= 'css_textfield_component_element_email';

	private const _BUTTON_COMPONENT_SUBMIT_CLASSES								= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES						= 'css_button_component_element_submit css_blue css_rounded_low';

	private const _TEXT_COMPONENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES			= 'css_text_component_about_mandatory_fields_note css_inline_show';
	private const _TEXT_COMPONENT_ELEMENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES	= 'css_text_component_element_about_mandatory_fields_note';
	//...CLASSES

	//TRANSLATIONS...
	public const i_FORM_XML_NODE_ID										= 'support_form';
	//public const i_LOGIN_TEXTFIELD_XML_NODE_ID							= 'login_textfield';
	//public const i_PASSWORD_TEXTFIELD_XML_NODE_ID						= 'password_textfield';
	//public const i_REPEAT_PASSWORD_TEXTFIELD_XML_NODE_ID				= 'repeat_password_textfield';
	//public const i_EMAIL_TEXTFIELD_XML_NODE_ID							= 'email_textfield';
	private const _SUBMIT_BUTTON_XML_NODE_ID							= 'submit_button';
	private const _ABOUT_MANDATORY_FIELDS_NOTE_TEXT_XML_NODE_ID			= 'about_mandatory_fields_note_text';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		return CVariableTools::i_toString(CCRequestConst::i_REQUEST_ID_SUPPORT);
	}

	//JS...
	/*override*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

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

		return 'bsp.CMain.i_getSite(\'' .$lSiteId_str. '\').i_getPages().i_getPage(\'' .$lPageId_str. '\').i_getForms().i_getSupportFormView()';*/

		return '';
	}
	//...JS
	
	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

		//FORM NAME...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_FORM_NAME,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormTranslationData_clss->i_getFormName(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_FORM_NAME_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		/*$lComponentsView_clss = $this->__getComponentsView();
		$lTextareaComponentsView_clss = $lComponentsView_clss->i_getTextareaComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();

		$lSiteId_str = $this->__getMainData()->i_getURLParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lTranslationXMLFileData_clss = $this->__getXMLFilesData()->i_getXMLFileData($lSiteId_str)->i_getTranslationXMLFileData();
		$lFormTranslationData_clss = $lTranslationXMLFileData_clss->i_getFormsTranslationData()->i_getSupportFormTranslationData();

		//CAPTION...
		$lCaptionTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getCaptionTextfieldTranslationData();

		$lParams_obj_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID						=> self::i_FORM_COMPONENT_ID_CAPTION,
								CCSimpleTextfieldComponentView::i_PARAM_NAME					=> $lCaptionTextfieldTranslationData_clss->i_getName(),
								CCSimpleTextfieldComponentView::i_PARAM_VALUE					=> $this->__getMainData()->i_getPostParam(self::i_FORM_COMPONENT_ID_CAPTION),
								CCSimpleTextfieldComponentView::i_PARAM_PLACEHOLDER				=> $lCaptionTextfieldTranslationData_clss->i_getPlaceholder(),
								CCSimpleTextfieldComponentView::i_PARAM_FILLING_MODE			=> CCSupportRequestController::i_COMPONENT_VALIDATION_PARAMS_CAPTION_TEXTFIELD[CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE],
								CCSimpleTextfieldComponentView::i_PARAM_MAX_CHARS_COUNT			=> self::i_CAPTION_FIELD_MAX_CHARS_COUNT,
								CCSimpleTextfieldComponentView::i_PARAM_DESCRIPTION				=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
								CCSimpleTextfieldComponentView::i_PARAM_CLASSES					=> 'css_textfield_component_caption',
								CCSimpleTextfieldComponentView::i_PARAM_ELEMENT_CLASSES			=> 'css_textfield_component_element_caption',
								//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID		=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_obj_arr);
		//...CAPTION

		//EMAIL...
		$lEmailTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getEmailTextfieldTranslationData();

		$lParams_obj_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID						=> self::i_FORM_COMPONENT_ID_EMAIL,
								CCSimpleTextfieldComponentView::i_PARAM_NAME					=> $lEmailTextfieldTranslationData_clss->i_getName(),
								CCSimpleTextfieldComponentView::i_PARAM_VALUE					=> $this->__getMainData()->i_getPostParam(self::i_FORM_COMPONENT_ID_EMAIL),
								CCSimpleTextfieldComponentView::i_PARAM_PLACEHOLDER				=> $lEmailTextfieldTranslationData_clss->i_getPlaceholder(),
								CCSimpleTextfieldComponentView::i_PARAM_FILLING_MODE			=> CCSupportRequestController::i_COMPONENT_VALIDATION_PARAMS_EMAIL_TEXTFIELD[CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE],
								CCSimpleTextfieldComponentView::i_PARAM_MAX_CHARS_COUNT			=> self::i_EMAIL_FIELD_MAX_CHARS_COUNT,
								CCSimpleTextfieldComponentView::i_PARAM_DESCRIPTION				=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
								CCSimpleTextfieldComponentView::i_PARAM_CLASSES					=> 'css_textfield_component_email',
								CCSimpleTextfieldComponentView::i_PARAM_ELEMENT_CLASSES			=> 'css_textfield_component_element_email',
								//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID		=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_obj_arr);
		//...EMAIL

		//MESSAGE...
		$lMessageTextareaTranslationData_clss = $lFormTranslationData_clss->i_getMessageTextareaTranslationData();

		$lParams_obj_arr	= [	CCSimpleTextareaComponentView::i_PARAM_ID						=> self::i_FORM_COMPONENT_ID_MESSAGE,
								CCSimpleTextareaComponentView::i_PARAM_NAME						=> $lMessageTextareaTranslationData_clss->i_getName(),
								CCSimpleTextareaComponentView::i_PARAM_VALUE					=> $this->__getMainData()->i_getPostParam(self::i_FORM_COMPONENT_ID_MESSAGE),
								CCSimpleTextareaComponentView::i_PARAM_PLACEHOLDER				=> $lMessageTextareaTranslationData_clss->i_getPlaceholder(),
								CCSimpleTextareaComponentView::i_PARAM_FILLING_MODE				=> CCSupportRequestController::i_COMPONENT_VALIDATION_PARAMS_MESSAGE_TEXTAREA[CCRequestController::i_COMPONENT_VALIDATION_PARAM_ID_COMPONENT_FILLING_MODE],
								CCSimpleTextareaComponentView::i_PARAM_MAX_CHARS_COUNT			=> self::i_MESSAGE_FIELD_MAX_CHARS_COUNT,
								CCSimpleTextareaComponentView::i_PARAM_DESCRIPTION				=> '',//CTools::i_replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::i_ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::i_REPLACING_PATTERN_MIN_CHARS_COUNT),
								CCSimpleTextareaComponentView::i_PARAM_CLASSES					=> 'css_textarea_component_message',
								CCSimpleTextareaComponentView::i_PARAM_ELEMENT_CLASSES			=> 'css_textarea_component_element_message',
								//CCSimpleTextareaComponentView::i_PARAM_JS_COMPONENT_ID		=> CRegistrationFormView::i_JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCSimpleTextareaComponentView::i_PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSFormComponentInitFunc()];
		$lTextareaComponentsView_clss->i_getSimpleTextareaComponentView()->i_draw($lParams_obj_arr);
		//...MESSAGE
		
		//HIDDEN...
		//$this->__drawHiddenComponent(CJOBAvatarGenerationFormView::i_FORM_COMPONENT_ID_HIDDEN);
		//...HIDDEN*/
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		//SUBMIT...
		$lSubmitButtonTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_SUBMIT_BUTTON_XML_NODE_ID);

		$lParams_a_arr	= [	CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::i_FORM_COMPONENT_ID_SUBMIT,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lSubmitButtonTranslationData_clss->i_getName(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_REQUEST_ID		=> $this->__getFormPOSTRequestId(),
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCSubmitButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lButtonComponentsView_clss->i_getSubmitButtonComponentView()->i_draw($lParams_a_arr);
		//...SUBMIT

		//ABOUT MANDATORY FIELDS NOTE...
		$lAboutMandatoryFieldsNoteTextTranslationData_clss = $this->__getTranslationXMLTextfieldComponentNode(self::_ABOUT_MANDATORY_FIELDS_NOTE_TEXT_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lAboutMandatoryFieldsNoteTextTranslationData_clss->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES];
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
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_SUPPORT];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getFormNodeName():string
	{
		return self::i_FORM_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>