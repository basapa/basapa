<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CCAccessRestrictionInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'access_restriction_info_id';
	private const _INFO_COMPONENT_ID_TITLE				= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_DESCRIPTION		= self::_INFO_ID. '_02';
	//...IDS
	
	//CSS...
	private const _CSS_INFO								= 'css_access_restriction_info';
	//...CSS
	
	//CLASSES...
	private const _TEXT_COMPONENT_INFO_TITLE_CLASSES				= 'css_text_component_title';
	private const _TEXT_COMPONENT_ELEMENT_INFO_TITLE_CLASSES		= 'css_text_component_element_title';
	private const _TEXT_COMPONENT_INFO_DESCRIPTION_CLASSES			= 'css_text_component_description';
	private const _TEXT_COMPONENT_ELEMENT_INFO_DESCRIPTION_CLASSES	= 'css_text_component_element_description';
	//...CLASSES
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __draw():void
	{
		$this->__drawHeader();
		$this->__drawBody();
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

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lInfoTranslationData_clss = $lTranslationData_clss->i_getInfosTranslationData()->i_getAccessRestrictionTextInfoTranslationData();

		//TITLE...
		$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_TITLE,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoTranslationData_clss->i_getInfoName(),
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_SIZE					=> CCCaptionTextComponentView::i_SIZE_3,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_INFO_TITLE_CLASSES,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_INFO_TITLE_CLASSES,
							//CCCaptionTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);
		//...TITLE
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		//DESCRIPTION...
		$lLangId_str = $this->__getMainData()->i_getGETParamLangId();
		$lFullFileName_str = CStringTools::i_replace(CCFileConst::i_INTERNALS_TRANSLATIONS_ACCESSES_TEXTS_DIRECTORY_NAME . CCFileConst::i_ACCESS_RESTRICTION_TEXT_FILE_NAME, $lLangId_str, CStringTools::i_REPLACING_PATTERN_LANG_ID);
		$lDescription_str = CFileTools::i_getFileAllContentAsString($lFullFileName_str);
		$lDescription_str = CStringTools::i_replace($lDescription_str, SITE_FULL_NAME, CStringTools::i_REPLACING_PATTERN_SITE_FULL_NAME);

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lDescription_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_INFO_DESCRIPTION_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_INFO_DESCRIPTION_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
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
}


?>