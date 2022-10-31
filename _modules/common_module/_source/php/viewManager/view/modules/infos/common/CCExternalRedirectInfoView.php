<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCExternalRedirectInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'external_redirect_info_id';
	private const _INFO_COMPONENT_ID_INFO_NAME			= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_DESCRIPTION		= self::_INFO_ID. '_02';
	private const _INFO_COMPONENT_ID_AWAITING_INDICATOR	= self::_INFO_ID. '_03';
	private const _INFO_COMPONENT_ID_HELP				= self::_INFO_ID. '_04';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_external_redirect_info css_rounded_high';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_INFO_NAME_CLASSES			= 'css_text_component_info_name';
	private const _TEXT_COMPONENT_ELEMENT_INFO_NAME_CLASSES	= 'css_text_component_element_info_name';

	private const _TEXT_COMPONENT_DESCRIPTION_CLASSES					= 'css_text_component_description';
	private const _TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES			= 'css_text_component_element_description';

	private const _IMAGE_COMPONENT_AWAITING_INDICATOR_CLASSES			= 'css_image_component_awaiting_indicator';
	private const _IMAGE_COMPONENT_ELEMENT_AWAITING_INDICATOR_CLASSES	= 'css_image_component_element_awaiting_indicator';

	private const _TEXT_COMPONENT_HELP_CLASSES							= 'css_text_component_help';
	private const _TEXT_COMPONENT_ELEMENT_HELP_CLASSES					= 'css_text_component_element_help';
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'external_redirect_info';
	private const _DESCRIPTION_TEXT_XML_NODE_ID			= 'description_text';
	private const _HELP_TEXT_XML_NODE_ID				= 'help_text';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSInfoImport():string
	{
		//return 'bsp.JSCCs.JSGetPages().JSGetRegistrationPage().JSGetModules().JSGetForms().JSGetRegistrationForm()';
		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		//return 'bsp.JSCCs.JSGetPages().JSGetRegistrationPage().JSGetModules().JSGetForms().JSGetRegistrationForm()';
		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
		/*$lComponentValidationParams_obj_arr = CRegistrationRequestController::$COMPONENT_VALIDATION_PARAMS_LOGIN_TEXTFIELD;
		$lRegistrationEventView_clss = CCodulesView::getInstance()->getEventsView()->getRegistrationEventView();

		$lJSComponentValidationParams_obj_arr = $this->__generateJSComponentValidationParams($lComponentValidationParams_obj_arr, $lRegistrationEventView_clss);

		echo
		'var lJSForm_clss = ' .$this->__getJSForm(). ';
		*///lJSForm_clss.JSSetFormAttrs(\'' .CJSUtil::convertAssociativeArrayToJSObject($this->__getFormJSAttrs()). '\');
		//lJSForm_clss.JSSetFormComponentValidationParams(\'' .CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD. '\', \'' .$lJSComponentValidationParams_obj_arr. '\');';
	}

	/*override*/protected function __drawPostJS():void
	{
		//echo
		//'var lJSForm_clss = ' .$this->__getJSForm(). ';
		//lJSForm_clss.JSInitDOMForm();';
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lInfoTranslationData_clss = $this->__getTranslationXMLInfoNode();

		//INFO NAME...
		$lParams_obj_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_INFO_NAME,
								CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoTranslationData_clss->i_getInfoName(),
								CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_INFO_NAME_CLASSES,
								CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_INFO_NAME_CLASSES,
								//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
								CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_obj_arr);
		//...INFO NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();
		$lImageComponentsView_clss = $lComponentsView_clss->i_getImageComponentsView();

		//DESCRIPTION...
		$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_DESCRIPTION_TEXT_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), CVariableTools::i_toString(CDateTimeTools::i_getYearInt()), '#YEAR_PLACEHOLDER#'),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_DESCRIPTION_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES,
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...DESCRIPTION

		//IMAGE...
		$lImageInternalFullFileName_str = './resources/internals/images/common/components/_joints/loading_indicators/rect/_blue.gif';
		$lImageFullFileName_str = CURLTools::i_applyFullSiteName($lImageInternalFullFileName_str);

		$lImageParams_a_arr = CImageTools::i_getImageParams($lImageInternalFullFileName_str);

		$lParams_a_arr	= [	CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_AWAITING_INDICATOR,
							CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_FILE_NAME				=> $lImageFullFileName_str,
							CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_WIDTH					=> CImageTools::i_getImageWidth($lImageParams_a_arr),
							CCSimpleImageComponentView::i_PARAM_ID_COMPONENT_HEIGHT					=> CImageTools::i_getImageHeight($lImageParams_a_arr),
							CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_IMAGE_COMPONENT_AWAITING_INDICATOR_CLASSES,
							CCSimpleImageComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_IMAGE_COMPONENT_ELEMENT_AWAITING_INDICATOR_CLASSES,
							//CCSimpleImageComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lImageComponentsView_clss->i_getSimpleImageComponentView()->i_draw($lParams_a_arr);
		//...IMAGE

		//HELP...
		$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_HELP_TEXT_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_HELP,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> CStringTools::i_replace($lTextTranslationData_clss->i_getValue(), $this->__getCookieData()->i_getCookieParam(CCCookieData::i_COOKIE_PARAM_ID_PREV_URL), '#HREF_PLACEHOLDER#'),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_HELP_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_HELP_CLASSES,
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...HELP
	}

	//PARAMS...
	/*override*/protected function __getInfoId():string
	{
		return self::_INFO_ID;
	}

	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS

	//TRANSLATIONS...
	/*override*/protected function __getInfoNodeName():string
	{
		return self::_INFO_XML_NODE_ID;
	}
	//...TRANSLATIONS
}


?>