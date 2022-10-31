<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCSiteDonationInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID										= 'site_donation_info_id';
	private const _INFO_COMPONENT_ID_SITE_DONATION_TITLE		= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_SITE_DONATION_DESCRIPTION	= self::_INFO_ID. '_02';
	private const _INFO_COMPONENT_ID_SITE_DONATION_BUTTON		= self::_INFO_ID. '_03';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_site_donation_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSInfoImport():string
	{
		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}
	//...JS

	/*override*/protected function __draw():void
	{
		//$this->__drawHeader();
		$this->__drawBody();
	}

	/*protected function __drawHeaderContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->getTextComponentsView();

		$lTranslationData_clss = $this->__getTranslationsData()->getCsTranslationData()->getTranslationData();
		$lInfoTranslationData_clss = $lTranslationData_clss->getInfosTranslationData()->getSiteDonationInfoTranslationData();

		//TITLE...
		$lInfoName_str = $lInfoTranslationData_clss->getInfoName();

		$lParams_obj_arr	= array(CCCaptionTextComponentView::PARAM_ID						=> self::_ID_INFO_COMPONENT_SITE_DONATION_TITLE,
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
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$lTranslationXMLFileData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lInfoTranslationData_clss = $lTranslationXMLFileData_clss->i_getInfosTranslationData()->i_getSiteDonationInfoTranslationData();

		//TITLE...
		$lInfoName_str = $lInfoTranslationData_clss->i_getInfoName();

		$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_SITE_DONATION_TITLE,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoName_str,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_SIZE					=> CCCaptionTextComponentView::i_SIZE_2,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_title',
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_title',
							//CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);
		//...TITLE

		//DESCRIPTION...
		$lSiteDonationDescriptionTextTranslationData_clss = $lInfoTranslationData_clss->i_getSiteDonationDescriptionTextTranslationData();

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_SITE_DONATION_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lSiteDonationDescriptionTextTranslationData_clss->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_text_component_description',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_text_component_element_description',
							//CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...DESCRIPTION

		//PAYMENT...
		$lSiteDonationButtonTranslationData_clss = $lInfoTranslationData_clss->i_getSiteDonationButtonTranslationData();

		$lStaticParams_a_arr = [CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
								CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_PAYMENT];

		$lParams_a_arr	= [CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID							=> self::_INFO_COMPONENT_ID_SITE_DONATION_BUTTON,
									CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lSiteDonationButtonTranslationData_clss->i_getName(),
									CCLinkButtonComponentView::i_PARAM_ID_COMPONENT_HREF					=> CURLTools::i_generateURLByParams($lStaticParams_a_arr),
									CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_button_component_donation',
									CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_button_component_element_donation css_gray',
									//CCLinkButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> CRegistrationFormView::JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
									CCLinkButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_a_arr);
		//...PAYMENT
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