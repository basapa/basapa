<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*virtual override*/class CCChainNavigationInfoView extends CCNavigationInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'chain_navigation_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_chain_navigation_info';
	//...CSS

	//CLASSES...
	private const _LABELLIST_COMPONENT_CLASSES			= 'css_labellist_component_01';
	private const _LABELLIST_COMPONENT_ELEMENT_CLASSES	= 'css_labellist_component_01_element';
	//...CLASSES


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lLabellistComponentsView_clss = $lComponentsView_clss->i_getLabellistComponentsView();

		$lParams_a_arr	= [	CCSimpleLabellistComponentView::i_PARAM_ID_ITEMS_PARAMS						=> $this->_generateItemsParams(),
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> CCChainNavigationInfoView::_LABELLIST_COMPONENT_CLASSES,
							CCSimpleLabellistComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> CCChainNavigationInfoView::_LABELLIST_COMPONENT_ELEMENT_CLASSES];
		$lLabellistComponentsView_clss->i_getSimpleLabellistComponentView()->i_draw($lParams_a_arr);
	}

	/*virtual*/protected function __getMaxContentPagesCount():int
	{
		new CAbstractException('__getMaxContentPagesCount');
		return -1;
	}

	private function _getMinNavigationItemsCount():int
	{
		return 5;
	}

	/*virtual*/protected function __getMaxNavigationItemsCount():int
	{
		return 7;
	}

	/*private function _getNavigationSelectedItemIndex($aSelectedContentPageIndex_int):int
	{
		if ($aSelectedContentPageIndex_int === 0)
		{
			$lNavigationSelectedItemIndex_int = 0;
		}
		else if ($aSelectedContentPageIndex_int === 1)
		{
			$lNavigationSelectedItemIndex_int = 1;
		}
		else
		{
			$lNavigationSelectedItemIndex_int = CMathTools::i_floor($this->__getMaxNavigationItemsCount() / 2);
		}
		
		return $lNavigationSelectedItemIndex_int;
	}*/
	
	/*virtual*/protected function __getNavigationCurrentItemIndex():int
	{
		return CMathTools::i_floor(($this->__getMaxNavigationItemsCount() - 1) / 2);
	}

	private function _generateItemsParams():array
	{
		$lItemsParams_a_arr_arr = [];

		$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		$lCurrentPageIndex_int = CVariableTools::i_toInt($lMainData_clss->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX, false));
		$lMaxContentPagesCount_int = $this->__getMaxContentPagesCount();
		$lMinNavigationItemsCount_int = $this->_getMinNavigationItemsCount();
		$lMaxNavigationItemsCount_int = $this->__getMaxNavigationItemsCount();
		if ($lMaxNavigationItemsCount_int < $lMinNavigationItemsCount_int)
		{
			new CException('_generateItemsParams', 'Max navigation items count must be more or equal '. $lMinNavigationItemsCount_int);
		}

		$lLastPageIndex_int = $lMaxContentPagesCount_int - 1;
		$lNavigationCurrentItemIndex_int = $this->__getNavigationCurrentItemIndex();

		$lPagesIndexes_int_arr = [];

		if ($lMaxContentPagesCount_int <= $lMaxNavigationItemsCount_int)
		{
			for ($i = 0; $i < $lMaxContentPagesCount_int; $i++)
			{
				$lPagesIndexes_int_arr[] = $i;
			}
		}
		else
		{
			$lMaxLeftNeighbourIndex_int = $lCurrentPageIndex_int - $lNavigationCurrentItemIndex_int;
			$lMaxRightNeighbourIndex_int = $lCurrentPageIndex_int + $lNavigationCurrentItemIndex_int;
			$lIsLeftGapRequired_bl = $lCurrentPageIndex_int > 2;
			$lIsRightGapRequired_bl = $lCurrentPageIndex_int < $lLastPageIndex_int - 2;

			for ($i = 0; $i < $lMaxNavigationItemsCount_int; $i++)
			{
				$lPageIndex_int = $i;

				if ($lMaxLeftNeighbourIndex_int >= 0)
				{
					$lPageIndex_int += $lMaxLeftNeighbourIndex_int;
				}

				if ($lMaxRightNeighbourIndex_int >= $lMaxContentPagesCount_int)
				{
					$lPageIndex_int -= $lMaxRightNeighbourIndex_int - $lLastPageIndex_int;
				}

				if ($lIsLeftGapRequired_bl)
				{
					if ($i === 0)
					{
						$lPageIndex_int = 0;
					}
					else if ($i === 1)
					{
						$lPageIndex_int = CVariableTools::i_INTEGER_MIN_VALUE;
					}
				}

				if ($lIsRightGapRequired_bl)
				{
					if ($i === $lMaxNavigationItemsCount_int - 1)
					{
						$lPageIndex_int = $lLastPageIndex_int;
					}
					else if ($i === $lMaxNavigationItemsCount_int - 2)
					{
						$lPageIndex_int = CVariableTools::i_INTEGER_MAX_VALUE;
					}
				}

				$lPagesIndexes_int_arr[] = $lPageIndex_int;
			}
		}

		//Static URL...
		$lNavigationURLStaticParams_a_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE	=> $lSiteId_str,
												CCRequestParamConst::i_GET_PARAM_ID_PAGE	=> $lPageId_str];

		$lStaticGETParamIds_str_arr = CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_STATIC_GET_PARAMS();
		foreach ($lStaticGETParamIds_str_arr as $lStaticGETParamId_str)
		{
			if ($lMainData_clss->i_isGETParamDefined($lStaticGETParamId_str))
			{
				$lNavigationURLStaticParams_a_arr[$lStaticGETParamId_str] = $lMainData_clss->i_getGETParam($lStaticGETParamId_str);
			}
		}
		//...Static URL

		//Dynamic URL...
		$lDynamicGETParamIds_str_arr = CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_DYNAMIC_GET_PARAMS();
		foreach ($lDynamicGETParamIds_str_arr as $lDynamicGETParamId_str)
		{
			if ($lMainData_clss->i_isGETParamDefined($lDynamicGETParamId_str))
			{
				$lNavigationURLDynamicParams_a_arr[$lDynamicGETParamId_str] = $lMainData_clss->i_getGETParam($lDynamicGETParamId_str);
			}
		}
		//...Dynamic URL

		$lCount_int = CArrayTools::i_count($lPagesIndexes_int_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lPageIndex_int = $lPagesIndexes_int_arr[$i];

			$lItemIndex_int = $i;

			if (
					$lPageIndex_int === CVariableTools::i_INTEGER_MIN_VALUE
					|| $lPageIndex_int === CVariableTools::i_INTEGER_MAX_VALUE
				)
			{
				$lItemName_str = '...';
				$lItemHint_str = '';
				$lItemValue_str = '';
				$lItemState_int = CCLabellistComponentItem::i_ITEM_STATE_DISABLED;
			}
			else
			{
				//Dynamic URL...
				$lNavigationURLDynamicParams_a_arr[CCRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX] = $lPageIndex_int;
				//...Dynamic URL

				$lItemName_str = CNumberTools::i_formatValue($lPageIndex_int + 1);
				$lItemHint_str = '';
				$lItemValue_str = CURLTools::i_generateURLByParams($lNavigationURLStaticParams_a_arr, $lNavigationURLDynamicParams_a_arr);
				$lItemState_int = $lPageIndex_int === $lCurrentPageIndex_int ? CCLabellistComponentItem::i_ITEM_STATE_SELECTED : CCLabellistComponentItem::i_ITEM_STATE_ENABLED;
			}

			$lItemsParams_a_arr_arr[] = $this->__generateItemParams($lItemIndex_int, $lItemName_str, $lItemHint_str, $lItemValue_str, $lItemState_int);
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
}


?>