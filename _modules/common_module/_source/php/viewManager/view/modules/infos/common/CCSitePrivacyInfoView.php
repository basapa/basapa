<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCSitePrivacyInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'site_privacy_info_id';
	private const _INFO_COMPONENT_ID_CAPTION			= self::_INFO_ID. '_01';
	private const _INFO_COMPONENT_ID_DESCRIPTION		= self::_INFO_ID. '_02';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_site_privacy_info';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_CAPTION_CLASSES			= 'css_text_component_caption';
	private const _TEXT_COMPONENT_ELEMENT_CAPTION_CLASSES	= 'css_text_component_element_caption';

	private const _TEXT_COMPONENT_DESCRIPTION_CLASSES			= 'css_text_component_description';
	private const _TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES	= 'css_text_component_element_description';
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'site_privacy_info';
	private const _CAPTION_TEXT_XML_NODE_ID				= 'caption_text';
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
		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		/*$lSiteId_str = $this->__getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lPageId_str = $this->__getMainData()->i_getGetParam(CCRequestParamConst::i_GET_PARAM_ID_PAGE);

		return 'bsp.main.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getInfosView().i_getSitePrivacyInfoView()';*/

		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
		/*echo
		'var lInfo_clss = ' .$this->__getJSInfo(). ';
		lInfo_clss.i_setInfoAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getInfoJSAttrs()). '\');';*/
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lInfo_clss = ' .$this->__getJSInfo(). ';
		lInfo_clss.i_initDOMInfo();';*/
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		//CAPTION...
		$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_CAPTION_TEXT_XML_NODE_ID);

		$lParams_a_arr	= [	CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_CAPTION,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_SIZE					=> CCCaptionTextComponentView::i_SIZE_1,
							CCCaptionTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lTextTranslationData_clss->i_getValue(),
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_CAPTION_CLASSES,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_CAPTION_CLASSES,
							//CCCaptionTextComponentView::PARAM_JS_COMPONENT_ID						=> self::___INFO_COMPONENT_ID_CAPTION,
							CCCaptionTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_a_arr);
		//...CAPTION

		//DESCRIPTION...
		$lTextTranslationData_clss = $this->__getTranslationXMLTextComponentNode(self::_DESCRIPTION_TEXT_XML_NODE_ID);

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_INFO_COMPONENT_ID_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE				=> $lTextTranslationData_clss->i_getValue(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_DESCRIPTION_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_DESCRIPTION_CLASSES,
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID					=> self::___INFO_COMPONENT_ID_DESCRIPTION,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc()];
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