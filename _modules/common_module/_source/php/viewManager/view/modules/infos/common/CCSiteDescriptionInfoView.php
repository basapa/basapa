<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCSiteDescriptionInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	public const JS_ID_INFO_COMPONENT_SUPPORT_BUTTON	= 100;
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'site_description_info_id';
	private const _INFO_COMPONENT_ID_INFO_TITLE			= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_INFO_DESCRIPTION	= self::_INFO_ID. '_02';
	private const _INFO_COMPONENT_ID_SUPPORT_BUTTON		= self::_INFO_ID. '_03';
	private const _INFO_COMPONENT_ID_DONATION_BUTTON	= self::_INFO_ID. '_04';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_site_description_info';
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
		/*$lSiteId_str = $this->__getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lPageId_str = $this->__getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_PAGE);

		return 'bsp.JSMain.jsGetSite(\'' .$lSiteId_str. '\').jsGetPages().jsGetPage(\'' .$lPageId_str. '\').jsGetModules().jsGetInfos().jsGetSiteDescriptionInfo()';*/

		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
		/*echo
		'var lJSInfo_clss = ' .$this->__getJSInfo(). ';
		lJSInfo_clss.jsSetInfoAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getInfoJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lJSInfo_clss = ' .$this->__getJSInfo(). ';
		lJSInfo_clss.jsInitDOMInfo();';*/
	}
	//...JS
	
	/*protected function __drawHeaderContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->getTextComponentsView();

		$lTranslationData_clss = $this->__getTranslationsData()->getCsTranslationData()->getTranslationData();
		$lInfoTranslationData_clss = $lTranslationData_clss->getInfosTranslationData()->getSiteDescriptionInfoTranslationData();

		//TITLE...
		$lInfoName_str = $lInfoTranslationData_clss->getInfoName();

		$lParams_obj_arr	= array(CCCaptionTextComponentView::PARAM_ID						=> self::_ID_INFO_COMPONENT_SITE_DESCRIPTION_TITLE,
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

		$lTranslationXMLFileData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lInfoTranslationData_clss = $lTranslationXMLFileData_clss->i_getInfosTranslationData()->i_getSiteDescriptionInfoTranslationData();
		$lSiteDescriptionDescriptionTextTranslationData_clss = $lInfoTranslationData_clss->i_getSiteDescriptionDescriptionTextTranslationData();

		//TITLE...
		/*$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_ID_INFO_COMPONENT_INFO_TITLE,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoTranslationData_clss->i_getInfoName(),
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_SIZE					=> CCCaptionTextComponentView::i_SIZE_3,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_title',
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_title',
							//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);*/
		//...TITLE

		//PAYMENT...
		/*$lInfoTranslationData_clss = $lTranslationXMLFileData_clss->i_getInfosTranslationData()->i_getSiteDonationInfoTranslationData();
		$lSiteDonationButtonTranslationData_clss = $lInfoTranslationData_clss->i_getSiteDonationButtonTranslationData();

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_PAYMENT];

		$lParams_a_arr	= [	CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_ID_INFO_COMPONENT_DONATION_BUTTON,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lSiteDonationButtonTranslationData_clss->i_getName(),
							CCLinkButtonComponentView::i_PARAM_ID_COMPONENT_HREF					=> CURLTools::i_generateURLByParams($lStaticParams_a_arr),
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_button_component_payment',
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_button_component_element_payment css_gray',
							//CCLinkButtonComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_a_arr);*/
		//...PAYMENT
		
		//DESCRIPTION...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_INFO_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lSiteDescriptionDescriptionTextTranslationData_clss->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_text_component_description',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_text_component_element_description',
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...DESCRIPTION
	}

	/*override*/protected function __drawFooterContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lTranslationXMLFileData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData();
		$lInfoTranslationData_clss = $lTranslationXMLFileData_clss->i_getInfosTranslationData()->i_getSiteDescriptionInfoTranslationData();

		//SUPPORT...
		/*$lSupportButtonTranslationData_clss = $lInfoTranslationData_clss->i_getSupportButtonTranslationData();

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_SUPPORT];

		$lParams_a_arr	= [	CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_ID_INFO_COMPONENT_SUPPORT_BUTTON,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lSupportButtonTranslationData_clss->i_getName(),
							CCLinkButtonComponentView::i_PARAM_ID_COMPONENT_HREF					=> CURLTools::i_generateURLByParams($lStaticParams_a_arr),
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_button_component_support',
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_button_component_element_support css_gray',
							//CCLinkButtonComponentView::PARAM_JS_COMPONENT_ID						=> self::JS_ID_INFO_COMPONENT_SUPPORT_BUTTON,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_a_arr);*/
		//...SUPPORT
		
		//PAYMENT...
		/*$lInfoTranslationData_clss = $lTranslationXMLFileData_clss->i_getInfosTranslationData()->i_getSiteDonationInfoTranslationData();
		$lSiteDonationButtonTranslationData_clss = $lInfoTranslationData_clss->i_getSiteDonationButtonTranslationData();

		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> CCPageConst::i_PAGE_ID_PAYMENT];

		$lParams_a_arr	= [	CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_ID_INFO_COMPONENT_DONATION_BUTTON,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME				=> $lSiteDonationButtonTranslationData_clss->i_getName(),
							CCLinkButtonComponentView::i_PARAM_ID_COMPONENT_HREF					=> CURLTools::i_generateURLByParams($lStaticParams_a_arr),
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> 'css_button_component_payment',
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> 'css_button_component_element_payment css_gray',
							//CCLinkButtonComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_SUBMIT_BUTTON,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_a_arr);*/
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