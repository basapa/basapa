<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*override*/abstract class CJOBContentAdditionFormView extends CCFormView
{
	//IDS...
	protected const __ID_FORM							= 'content_addition_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::__ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::__ID_FORM. '_99';
	//...IDS

	//CSS...
	private const _CSS_FORM								= 'css_job_content_addition_form';
	//...CSS
	
	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES				= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES		= 'css_text_component_element_form_name';

	private const _BUTTON_COMPONENT_SUBMIT_CLASSES				= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES		= 'css_button_component_element_submit css_blue css_rounded_low';
	
	private const _TEXT_COMPONENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES			= 'css_text_component_about_mandatory_fields_note css_inline_show';
	private const _TEXT_COMPONENT_ELEMENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES	= 'css_text_component_element_about_mandatory_fields_note';
	//...CLASSES

	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
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
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...FORM NAME
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lFormTranslationData_clss = $this->__getTranslationXMLFormNode();

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

		//ABOUT MANDATORY FIELDS NOTE...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormTranslationData_clss->i_getAboutMandatoryFieldsNoteTextTranslationData()->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_ABOUT_MANDATORY_FIELDS_NOTE_CLASSES];
		$lComponentsView_clss->i_getTextComponentsView()->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...ABOUT MANDATORY FIELDS NOTE
	}

	//PARAMS...
	/*override*/protected function __getFormId():string
	{
		return self::__ID_FORM;
	}

	/*virtual override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*/protected function __getFormSendingDataType():string
	{
		return self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA;
	}
	//...PARAMS
}


?>
