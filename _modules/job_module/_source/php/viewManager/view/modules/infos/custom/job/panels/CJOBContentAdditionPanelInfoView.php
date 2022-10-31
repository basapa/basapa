<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentAdditionPanelInfoView extends CCPanelInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'content_addition_panel_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_content_addition_panel_info';
	//...CSS

	//CLASSES...
	private const _BUTTON_COMPONENT_CONTENT_ADDITION_CLASSES			= 'css_button_component_content_addition ' .self::__SHOW_COMMON_CLASS;
	private const _BUTTON_COMPONENT_ELEMENT_CONTENT_ADDITION_CLASSES	= 'css_button_component_element_content_addition ' .self::__GREEN_COLOR_COMMON_CLASS. ' ' .self::__ROUNDED_LOW_COMMON_CLASS;
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'content_addition_panel_info';
	private const _BUTTON_COMPONENT_XML_NODE_ID			= 'content_addition_button';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
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
		$this->__drawBody();
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lContentAdditionButtonTranslationData_clss = $this->__getTranslationXMLButtonComponentNode(self::_BUTTON_COMPONENT_XML_NODE_ID);

		//CONTENT ADDITON BUTTON...
		$lStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE		=> CSiteConst::i_SITE_ID_JOB,
									CCRequestParamConst::i_GET_PARAM_ID_PAGE		=> CJOBPageConst::i_PAGE_ID_CONTENT,
									CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION	=> CJOBActionConst::i_ACTION_ID_ADD];

		$lParams_a_arr	= [	CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_NAME			=> $lContentAdditionButtonTranslationData_clss->i_getName(),
							CCLinkButtonComponentView::i_PARAM_ID_COMPONENT_HREF				=> CURLTools::i_generateURLByParams($lStaticParams_a_arr),
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_IS_NO_FOLLOW	=> true,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_BUTTON_COMPONENT_CONTENT_ADDITION_CLASSES,
							CCLinkButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_BUTTON_COMPONENT_ELEMENT_CONTENT_ADDITION_CLASSES];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_a_arr);
		//...CONTENT ADDITON BUTTON
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
