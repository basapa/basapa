<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCSiteCopyrightInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'site_copyright_info_id';
	private const _INFO_COMPONENT_ID_INFO_TITLE			= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_INFO_DESCRIPTION	= self::_INFO_ID. '_02';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_site_copyright_info';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_DESCRIPTION_CLASSES				= 'css_text_component_description';
	private const _TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES		= 'css_text_component_element_description';
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'site_copyright_info';
	private const _DESCRIPTION_TEXT_XML_NODE_ID			= 'description_text';
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

	/*protected function __drawHeaderContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->getTextComponentsView();

		$lTranslationData_clss = $this->__getTranslationsData()->getCsTranslationData()->getTranslationData();
		$lInfoTranslationData_clss = $lTranslationData_clss->getInfosTranslationData()->getSiteCopyrightInfoTranslationData();

		//TITLE...
		$lInfoName_str = $lInfoTranslationData_clss->getInfoName();

		$lParams_obj_arr	= array(CCCaptionTextComponentView::PARAM_ID						=> self::_ID_INFO_COMPONENT_SITE_COPYRIGHT_TITLE,
									CCCaptionTextComponentView::PARAM_VALUE						=> $lInfoName_str,
									CCCaptionTextComponentView::PARAM_CLASSES					=> 'css_text_component_title',
									CCCaptionTextComponentView::PARAM_ELEMENT_CLASSES			=> 'css_text_component_element_title',
									//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									CCCaptionTextComponentView::PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc());
		$lTextComponentsView_clss->getCaptionTextComponentView()->draw($lParams_obj_arr);
		//...TITLE
	}*/

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lSiteCopyrightDescriptionTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_DESCRIPTION_TEXT_XML_NODE_ID);

		//TITLE...
		/*$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_ID_INFO_COMPONENT_INFO_TITLE,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoTranslationData_clss->i_getInfoName(),
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_title',
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_title',
							//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);*/
		//...TITLE

		//DESCRIPTION...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_INFO_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> CStringTools::i_replace($lSiteCopyrightDescriptionTextTranslationData_clss->i_getValue(), CVariableTools::i_toString(CDateTimeTools::i_getYearInt()), '#YEAR_PLACEHOLDER#'),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_DESCRIPTION_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES,
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...DESCRIPTION
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