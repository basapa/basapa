<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBSubcategoriesNavigationInfoView extends CCNavigationInfoView
{
	//JS PHP AGREEMENTS...
	private const _JS_INFO_COMPONENT_ID_TOGGLE				= 'JS_INFO_COMPONENT_ID_TOGGLE';
	private const _JS_MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY	= 'JS_MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY';
	private const _JS_MIN_BODY_HEIGHT						= 'JS_MIN_BODY_HEIGHT';
	private const _JS_TOGGLE_NAME_HIDE						= 'JS_TOGGLE_NAME_HIDE';
	private const _JS_TOGGLE_NAME_SHOW						= 'JS_TOGGLE_NAME_SHOW';
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'job_subcategories_navigation_info_id';
	private const _INFO_COMPONENT_ID_TOGGLE				= 'job_subcategories_navigation_info_id_toggle';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_subcategories_navigation_info';
	//...CSS

	//CLASSES...
	private const _LABELLIST_COMPONENT_ITEMS_CLASSES			= 'css_labellist_component_01';
	private const _LABELLIST_COMPONENT_ELEMENT_ITEMS_CLASSES	= 'css_labellist_component_01_element';

	private const _TEXT_COMPONENT_TOGGLE_CLASSES				= 'css_text_component_toggle';
	private const _TEXT_COMPONENT_ELEMENT_TOGGLE_CLASSES		= 'css_text_component_toggle_element';
	//...CLASSES

	private const _MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY			= 4;
	private const _MIN_BODY_HEIGHT								= 50;

	private $_fSubcategoriesTableDataCount_int = 0;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSInfoImport():string
	{
		//return 'bsp.job_ns.modules_ns.infos_ns.navigations_ns.i_importCJOBAUSubcategoriesNavigationInfoViewClass()';

		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.CMain.i_getSiteView(\'' .$lSiteId_str. '\').i_getPagesView().i_getPageView(\'' .$lPageId_str. '\').i_getInfosView().i_getNavigationsInfoView().i_getAUSubcategoriesNavigationInfoView()';*/

		return '';
	}

	/*override*/protected function __getInfoJSAttrs():array
	{
		/*$lJSInfoAttrs_a_arr	= [	CJOBAUSubcategoriesNavigationInfoView::_JS_MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY	=> self::_MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY,
								CJOBAUSubcategoriesNavigationInfoView::_JS_MIN_BODY_HEIGHT 						=> self::_MIN_BODY_HEIGHT,
								CJOBAUSubcategoriesNavigationInfoView::_JS_TOGGLE_NAME_HIDE 					=> 'hide',
								CJOBAUSubcategoriesNavigationInfoView::_JS_TOGGLE_NAME_SHOW 					=> 'show'];

		return CArrayTools::i_merge(parent::__getInfoJSAttrs(), $lJSInfoAttrs_a_arr);*/

		return [];
	}

	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lInfo_clss = ' .$this->__getJSInfo(). ';
		lInfo_clss.i_setInfoAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getInfoJSAttrs()). '\');
		lInfo_clss.i_initDOMInfo();';*/
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
		$this->__drawFooter();
	}

	/*override*/protected function __getInfoBodyStyles():string
	{
		return 'height:' .self::_MIN_BODY_HEIGHT. 'px; ' .parent::__getInfoBodyStyles();
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lLabellistComponentsView_clss = $lComponentsView_clss->i_getLabellistComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentCategoriesTableData_clss_arr = $lDatabaseData_clss->i_getContentCategoriesTableQueriesData()->i_getSelectDataWithContentCount();
		$lContentSubcategoriesTableData_clss_arr = $lDatabaseData_clss->i_getContentSubcategoriesTableQueriesData()->i_getSelectDataWithContentCount();

		$lMainData_clss = $this->__getMainData();
		$lCategoryStringId_str = $lMainData_clss->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID, false);
		$lSubcategoryStringId_str = $lMainData_clss->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SUBCATEGORY_STRING_ID, false);

		$lCategoryId_int = $this->_getContentCategoryIdByCategoryStringId($lContentCategoriesTableData_clss_arr, $lCategoryStringId_str);

		$lSubcategoriesTableData_clss_arr = $this->_getContentSubcategoriesDataByCategoryId($lContentSubcategoriesTableData_clss_arr, $lCategoryId_int);
		if (!isset($lSubcategoriesTableData_clss_arr))
		{
			return;
		}

		$lURLStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE						=> CSiteConst::i_SITE_ID_JOB,
									CJOBRequestParamConst::i_GET_PARAM_ID_PAGE						=> CJOBPageConst::i_PAGE_ID_,
									CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID	=> $lCategoryStringId_str];

		$lItemsParams_a_arr = null;

		$lSubcategoriesTableDataCount_int = CArrayTools::i_count($lSubcategoriesTableData_clss_arr);
		$this->_fSubcategoriesTableDataCount_int = $lSubcategoriesTableDataCount_int;

		for ($i = 0; $i < $lSubcategoriesTableDataCount_int; $i++)
		{
			$lSubcategoryTableData_clss = $lSubcategoriesTableData_clss_arr[$i];
			$lSubcategoryTableData_clss = CJOBContentSubcategoriesTableData::i_toClassType($lSubcategoryTableData_clss);

			$lURLStaticParamsEx_a_arr = $lURLStaticParams_a_arr;
			$lURLStaticParamsEx_a_arr[CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SUBCATEGORY_STRING_ID] = $lSubcategoryTableData_clss->i_getTableFieldSubcategoryStringId();

			$lSubItemIndex_int = $i;
			$lSubItemName_str = CSymbolsTools::i_getSymbolStringValue(CSymbolsTools::i_SYMBOL_ID_RAQUO) . CSymbolsTools::i_getSymbolMnemonicValue(CSymbolsTools::i_SYMBOL_ID_NBSP) . $lSubcategoryTableData_clss->i_getTableFieldSubcategoryName();
			$lSubItemHint_str = CNumberTools::i_formatValue($lSubcategoryTableData_clss->i_getTableFieldSubcategoryContentCount());
			$lSubItemValue_str = CURLTools::i_generateURLByParams($lURLStaticParamsEx_a_arr);
			$lSubItemState_int = $lSubcategoryTableData_clss->i_getTableFieldSubcategoryStringId() === $lSubcategoryStringId_str ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED;
			$lSubItemState_int = $lSubcategoryTableData_clss->i_getTableFieldSubcategoryContentCount() === 0 ? CCLabellistComponentItem::i_ITEM_STATE_DISABLED : $lSubItemState_int;

			$lItemsParams_a_arr[$i] = $this->__generateItemParams($lSubItemIndex_int, $lSubItemName_str, $lSubItemHint_str, $lSubItemValue_str, $lSubItemState_int);
		}

		$lParams_a_arr	= [	CCSimpleLabellistComponentView::i_PARAM_ID_ITEMS_PARAMS						=> $lItemsParams_a_arr,
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_LABELLIST_COMPONENT_ITEMS_CLASSES,
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_LABELLIST_COMPONENT_ELEMENT_ITEMS_CLASSES];
		$lLabellistComponentsView_clss->i_getSimpleLabellistComponentView()->i_draw($lParams_a_arr);
	}

	/*override*/protected function __drawFooterContent():void
	{
		if ($this->_fSubcategoriesTableDataCount_int <= self::_MIN_ITEMS_COUNT_FOR_TOGGLE_DISPLAY)
		{
			return;
		}

		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		//TOGGLE...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_TOGGLE,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> 'show',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_TOGGLE_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_TOGGLE_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::_JS_INFO_COMPONENT_ID_TOGGLE,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...TOGGLE
	}

	private function _getContentCategoryIdByCategoryStringId(array $aContentCategoriesTableData_clss_arr, string $aCategoryStringId_str):int
	{
		$lCount_int = CArrayTools::i_count($aContentCategoriesTableData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lContentCategoryTableData_clss = CJOBContentCategoriesTableData::i_toClassType($aContentCategoriesTableData_clss_arr[$i]);
			if ($lContentCategoryTableData_clss->i_getTableFieldCategoryStringId() === $aCategoryStringId_str)
			{
				return $lContentCategoryTableData_clss->i_getTableFieldId();
			}
		}

		new CException('_getContentCategoryIdByCategoryStringId', 'ILE!');
		return -1;
	}

	private function _getContentSubcategoriesDataByCategoryId(array $aContentSubcategoriesTableData_clss_arr, int $aCategoryId_int):?array
	{
		$lContentSubcategoriesTableData_clss_arr = null;

		$lCount_int = CArrayTools::i_count($aContentSubcategoriesTableData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lContentSubcategoriesTableData_clss = CJOBContentSubcategoriesTableData::i_toClassType($aContentSubcategoriesTableData_clss_arr[$i]);
			if ($lContentSubcategoriesTableData_clss->i_getTableFieldSubcategoryCategoryId() === $aCategoryId_int)
			{
				$lContentSubcategoriesTableData_clss_arr[] = $lContentSubcategoriesTableData_clss;
			}
		}

		return $lContentSubcategoriesTableData_clss_arr;
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