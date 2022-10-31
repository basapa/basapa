<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBCategoriesNavigationInfoView extends CCNavigationInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'job_categories_navigation_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_categories_navigation_info';
	//...CSS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lLabellistComponentsView_clss = $lComponentsView_clss->i_getLabellistComponentsView();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentCategoriesTableData_clss_arr = $lDatabaseData_clss->i_getContentCategoriesTableQueriesData()->i_getSelectDataWithContentCount();
		//$lContentSubcategoriesTableData_clss_arr = $lDatabaseData_clss->i_getContentSubcategoriesTableQueriesData()->i_getSelectDataWithContentCount();

		$lItemsParams_a_arr_arr = [];

		$lMainData_clss = $this->__getMainData();
		$lCategoryStringId_str = $lMainData_clss->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID, false);
		$lSubcategoryStringId_str = $lMainData_clss->i_getGETParam(CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SUBCATEGORY_STRING_ID, false);

		$lCount_int = CArrayTools::i_count($lContentCategoriesTableData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lContentCategoriesTableData_clss = CJOBContentCategoriesTableData::i_toClassType($lContentCategoriesTableData_clss_arr[$i]);
			
			//$lSubcategoriesTableData_clss_arr = $this->_getContentSubcategoriesDataByCategoryId($lContentSubcategoriesTableData_clss_arr, $lContentCategoriesTableData_clss->i_getTableFieldId());

			$lURLStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE						=> CSiteConst::i_SITE_ID_JOB,
										CJOBRequestParamConst::i_GET_PARAM_ID_PAGE						=> CJOBPageConst::i_PAGE_ID_,
										CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID	=> $lContentCategoriesTableData_clss->i_getTableFieldCategoryStringId()];

			$lItemIndex_int = $i;
			$lItemName_str = CSymbolsTools::i_getSymbolStringValue(CSymbolsTools::i_SYMBOL_ID_RSAQUO) . CSymbolsTools::i_getSymbolMnemonicValue(CSymbolsTools::i_SYMBOL_ID_NBSP) . $lContentCategoriesTableData_clss->i_getTableFieldCategoryName();
			$lItemHint_str = CNumberTools::i_formatValue($lContentCategoriesTableData_clss->i_getTableFieldCategoryContentCount());
			$lItemValue_str = CURLTools::i_generateURLByParams($lURLStaticParams_a_arr);
			$lItemState_int = $lContentCategoriesTableData_clss->i_getTableFieldCategoryStringId() === $lCategoryStringId_str ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED;
			$lItemState_int = $lContentCategoriesTableData_clss->i_getTableFieldCategoryContentCount() === 0 ? CCLabellistComponentItem::i_ITEM_STATE_DISABLED : $lItemState_int;

			if (
					$lItemState_int !== CCLabellistComponentItem::i_ITEM_STATE_DISABLED
					&& isset($lSubcategoriesTableData_clss_arr)
				)
			{
				$lSubItemsParams_a_arr_arr = null;

				$lSubcategoriesTableDataCount_int = CArrayTools::i_count($lSubcategoriesTableData_clss_arr);
				for ($j = 0; $j < $lSubcategoriesTableDataCount_int; $j++)
				{
					$lSubcategoryTableData_clss = $lSubcategoriesTableData_clss_arr[$j];
					$lSubcategoryTableData_clss = CJOBContentSubcategoriesTableData::i_toClassType($lSubcategoryTableData_clss);

					$lURLStaticParamsEx_a_arr = $lURLStaticParams_a_arr;
					$lURLStaticParamsEx_a_arr[CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SUBCATEGORY_STRING_ID] = $lSubcategoryTableData_clss->i_getTableFieldSubcategoryStringId();

					$lSubItemIndex_int = $j;
					$lSubItemName_str = CSymbolsTools::i_getSymbolStringValue(CSymbolsTools::i_SYMBOL_ID_RAQUO) . CSymbolsTools::i_getSymbolMnemonicValue(CSymbolsTools::i_SYMBOL_ID_NBSP) . $lSubcategoryTableData_clss->i_getTableFieldSubcategoryName();
					$lSubItemHint_str = CVariableTools::i_toString($lSubcategoryTableData_clss->i_getTableFieldSubcategoryContentCount());
					$lSubItemValue_str = CURLTools::i_generateURLByParams($lURLStaticParamsEx_a_arr);
					$lSubItemState_int = $lSubcategoryTableData_clss->i_getTableFieldSubcategoryStringId() === $lSubcategoryStringId_str ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED;
					$lSubItemState_int = $lSubcategoryTableData_clss->i_getTableFieldSubcategoryContentCount() === 0 ? CCLabellistComponentItem::i_ITEM_STATE_DISABLED : $lSubItemState_int;

					$lSubItemsParams_a_arr_arr[$j] = $this->__generateItemParams($lSubItemIndex_int, $lSubItemName_str, $lSubItemHint_str, $lSubItemValue_str, $lSubItemState_int);
				}

				$lItemsParams_a_arr_arr[$i] = $this->__generateMultipleItemParams($lItemIndex_int, $lItemName_str, $lItemHint_str, $lItemValue_str, $lItemState_int, $lSubItemsParams_a_arr_arr);
			}
			else
			{
				$lItemsParams_a_arr_arr[$i] = $this->__generateItemParams($lItemIndex_int, $lItemName_str, $lItemHint_str, $lItemValue_str, $lItemState_int);
			}
		}

		$lParams_a_arr	= [	CCVSimpleLabellistComponentView::i_PARAM_ID_ITEMS_PARAMS					=> $lItemsParams_a_arr_arr,
							CCVSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_labellist_component_01',
							CCVSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_labellist_component_01_element'];
		$lLabellistComponentsView_clss->i_getVSimpleLabellistComponentView()->i_draw($lParams_a_arr);
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

	/*virtual override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>