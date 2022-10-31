<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentSearchFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _ID_FORM							= 'JOB_content_search_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME		= self::_ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_JOB_NAME		= self::_ID_FORM. '_02';
	public const i_FORM_COMPONENT_ID_SUBMIT			= self::_ID_FORM. '_08';
	//...IDS

	//FILLING_MODES...
	public const i_FILLING_MODE_FIELD_JOB_NAME		= CCFormComponentView::i_FILLING_MODE_ID_NON_MANDATORY;
	//...FILLING_MODES

	//CHARS COUNT...
	public const i_MIN_CHARS_COUNT_FIELD_JOB_NAME	= 1;
	public const i_MAX_CHARS_COUNT_FIELD_JOB_NAME	= 32;
	//...CHARS COUNT

	//CSS...
	private const _CSS_FORM								= 'css_JOB_JOB_content_search_form';
	//...CSS
	
	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES					= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES			= 'css_text_component_element_form_name';
	
	private const _TEXTFIELD_COMPONENT_JOB_NAME_CLASSES			= 'css_textfield_component_JOB_name';
	private const _TEXTFIELD_COMPONENT_ELEMENT_JOB_NAME_CLASSES	= 'css_textfield_component_element_JOB_name';
	
	private const _BUTTON_COMPONENT_SUBMIT_CLASSES					= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES			= 'css_button_component_element_submit css_blue css_rounded_low';
	//...CLASSES
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		//return CVariableTools::i_toString(CJOBRequestConst::i_REQUEST_ID_JOB_CONTENT_SEARCH);
	}

	//JS...
	/*override*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

	/*override*/protected function __drawPreJS():void
	{
		/*echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_setFormAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
	/*	echo
		'var lForm_clss = ' .$this->__getJSForm(). ';
		lForm_clss.i_initDOMForm();';*/
	}

	/*override*/protected function __getFormJSAttrs():array
	{
		/*$l_a_arr = parent::__getFormJSAttrs();
		$l_a_arr[self::i_FORM_COMPONENT_ID_SUBMIT] = self::i_JS_FORM_COMPONENT_ID_SUBMIT_BUTTON;
		return $l_a_arr;*/

		return [];
	}

	/*override*/protected function __getJSForm():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.CMain.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getFormsView().i_getContentAdditionFormView()';*/

		return '';
	}
	//...JS

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lFormsTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData();
		$lFormsTranslationData_clss = CJOBTranslationXMLFormsNode::i_toClassType($lFormsTranslationData_clss);
		$lFormTranslationData_clss = $lFormsTranslationData_clss->i_getContentSearchFormTranslationData();

		//FORM NAME...
		$lFormName_str = $lFormTranslationData_clss->i_getFormName();

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_FORM_NAME,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lFormName_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_FORM_NAME_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...FORM NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();
		$lListboxComponentsView_clss = $lComponentsView_clss->i_getListboxComponentsView();

		$lFormsTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData();
		$lFormsTranslationData_clss = CJOBTranslationXMLFormsNode::i_toClassType($lFormsTranslationData_clss);
		$lFormTranslationData_clss = $lFormsTranslationData_clss->i_getContentSearchFormTranslationData();

		//JOB NAME...
		$lJOBNameTextfieldTranslationData_clss = $lFormTranslationData_clss->i_getJOBNameTextfieldTranslationData();

		$lParams_a_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::i_FORM_COMPONENT_ID_JOB_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lJOBNameTextfieldTranslationData_clss->i_getName(),
							CCSimpleTextfieldComponentView::i_PARAM_ID_VALUE							=> $this->__getMainData()->i_getPOSTParam(self::i_FORM_COMPONENT_ID_JOB_NAME),
							CCSimpleTextfieldComponentView::i_PARAM_ID_MAX_CHARS_COUNT					=> self::i_MAX_CHARS_COUNT_FIELD_JOB_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_FILLING_MODE		=> self::i_FILLING_MODE_FIELD_JOB_NAME,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXTFIELD_COMPONENT_JOB_NAME_CLASSES,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXTFIELD_COMPONENT_ELEMENT_JOB_NAME_CLASSES,
							//CCSimpleTextfieldComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSFormComponentInitFunc()];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_a_arr);
		//...JOB NAME

		//HIDDEN...
		//$this->__drawHiddenComponent(CJOBJOBGenerationFormView::i_FORM_COMPONENT_ID_HIDDEN);
		//...HIDDEN
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lFormsTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData();
		$lFormsTranslationData_clss = CJOBTranslationXMLFormsNode::i_toClassType($lFormsTranslationData_clss);
		$lFormTranslationData_clss = $lFormsTranslationData_clss->i_getContentSearchFormTranslationData();

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
	}

	//PARAMS...
	/*override*/protected function __getFormId():string
	{
		return self::_ID_FORM;
	}

	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*/protected function __getFormAction():string
	{
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENT,
									CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION	=> CJOBActionConst::i_ACTION_ID_SEARCH];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}

	/*override*/protected function __getFormSendingDataType():string
	{
		return self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA;
	}
	//...PARAMS
}


?>
