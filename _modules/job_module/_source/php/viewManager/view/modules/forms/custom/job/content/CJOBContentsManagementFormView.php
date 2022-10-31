<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentsManagementFormView extends CCFormView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	public const i_ID_FORM								= '_content_management_form_id';
	public const i_FORM_COMPONENT_ID_FORM_NAME			= self::i_ID_FORM. '_01';
	public const i_FORM_COMPONENT_ID_SUBMIT				= self::i_ID_FORM. '_08';
	//...IDS

	//CSS...
	private const _CSS_FORM								= 'css_job_contents_management_form';
	//...CSS
	
	//CLASSES...
	private const _TEXT_COMPONENT_FORM_NAME_CLASSES			= 'css_text_component_form_name';
	private const _TEXT_COMPONENT_ELEMENT_FORM_NAME_CLASSES	= 'css_text_component_element_form_name';
	
	private const _BUTTON_COMPONENT_SUBMIT_CLASSES			= 'css_button_component_submit css_inline_show';
	private const _BUTTON_COMPONENT_ELEMENT_SUBMIT_CLASSES	= 'css_button_component_element_submit css_blue css_rounded_low';
	//...CLASSES


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getFormPOSTRequestId():string
	{
		//return CVariableTools::i_toString(CJOBRequestConst::i_REQUEST_ID_JOB_CONTENT_ADDITION);

		return '';
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
		/*echo
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
		$lFormTranslationData_clss = $lFormsTranslationData_clss->i_getContentAdditionFormTranslationData();

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
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lFormsTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getFormsTranslationData();
		$lFormsTranslationData_clss = CJOBTranslationXMLFormsNode::i_toClassType($lFormsTranslationData_clss);
		$lFormTranslationData_clss = $lFormsTranslationData_clss->i_getContentAdditionFormTranslationData();

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
		return self::i_ID_FORM;
	}

	/*override*/protected function __getFormClasses():string
	{
		return self::_CSS_FORM. ' ' .parent::__getFormClasses();
	}

	/*override*/protected function __getFormAction():string
	{
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENT,
									CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION	=> CJOBActionConst::i_ACTION_ID_ADD];
		return CURLTools::i_generateURLByParams($lStaticParams_a_arr);
	}

	/*override*/protected function __getFormSendingDataType():string
	{
		return self::i_SENDING_DATA_TYPE_MULTIPART_FORM_DATA;
	}
	//...PARAMS
}


?>
