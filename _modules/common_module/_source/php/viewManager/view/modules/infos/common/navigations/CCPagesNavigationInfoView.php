<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*virtual override*/class CCPagesNavigationInfoView extends CCNavigationInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'pages_navigation_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_pages_navigation_info';
	//...CSS

	//CLASSES...
	private const _LABELLIST_COMPONENT_01_CLASSES				= 'css_labellist_component_01';
	private const _LABELLIST_COMPONENT_ELEMENT_01_CLASSES		= 'css_labellist_component_01_element';
	//...CLASSES

	//TRANSLATIONS...
	private const _INFO_XML_NODE_ID						= 'pages_navigation_info';
	private const _PAGES_LABELLIST_XML_NODE_ID			= 'pages_labellist';
	//...TRANSLATIONS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __getNavigationPagesIds():array
	{
		$lPageIds_str_arr = [];

		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			$lPageIds_str_arr[] = CCPageConst::i_PAGE_ID_DEBUG;
		}

		return $lPageIds_str_arr;
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lLabellistComponentsView_clss = $lComponentsView_clss->i_getLabellistComponentsView();

		$lParams_a_arr	= [	CCSimpleLabellistComponentView::i_PARAM_ID_ITEMS_PARAMS						=> $this->__generateItemsParams(),
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELLIST_COMPONENT_01_CLASSES,
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELLIST_COMPONENT_ELEMENT_01_CLASSES];
		$lLabellistComponentsView_clss->i_getSimpleLabellistComponentView()->i_draw($lParams_a_arr);
	}

	/*virtual*/protected function __generateItemsParams():array
	{
		$lLabellistItemsTranslationData_clss = $this->__getTranslationXMLLabellistComponentNode(self::_PAGES_LABELLIST_XML_NODE_ID)->i_getItemsData();

		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		$lPageId_str = $this->__getMainData()->i_getGETParamPageId();

		//URLs...
		$lPageIds_str_arr = $this->__getNavigationPagesIds();

		$lNavigationURLStaticParams_a_arr_arr = [];

		$lCount_int = CArrayTools::i_count($lPageIds_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lNavigationURLStaticParams_a_arr_arr[] = [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
														CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> $lPageIds_str_arr[$i]];
		}
		//...URLs

		$lItemsParams_a_arr_arr = [];

		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lItemIndex_int = $i;
			$lItemName_str = $lLabellistItemsTranslationData_clss->i_getItemNameByItemId($lPageIds_str_arr[$i]);
			$lItemHint_str = '';
			$lItemValue_str = CURLTools::i_generateURLByParams($lNavigationURLStaticParams_a_arr_arr[$i]);
			$lItemState_int = $lPageIds_str_arr[$i] === $lPageId_str ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED;

			$lItemsParams_a_arr_arr[$i] = $this->__generateItemParams($lItemIndex_int, $lItemName_str, $lItemHint_str, $lItemValue_str, $lItemState_int);
		}

		return $lItemsParams_a_arr_arr;
	}

	//PARAMS...
	/*virtual override*/protected function __getInfoId():string
	{
		return self::_INFO_ID;
	}

	/*virtual override*/protected function __getInfoClasses():string
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