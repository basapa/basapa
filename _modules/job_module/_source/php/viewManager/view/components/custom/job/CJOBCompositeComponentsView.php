<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CJOBCompositeComponentsView extends CCCompositeComponentsView
{
	//IDS...
	private const _COMPOSITE_COMPONENT_VIEW_ID_WAGE_RANGE	= CCCompositeComponentsView::__COMPOSITE_COMPONENT_VIEWS_COUNT;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBCompositeComponentsView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getWageRangeCompositeComponentView()
	{
		return $this->__getCompositeComponentView(self::_COMPOSITE_COMPONENT_VIEW_ID_WAGE_RANGE);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateCompositeComponentView(int $aCompositeComponentViewId_int, $aComponentsView_clss):CCCompositeComponentView
	{
		$lCompositeComponentView_clss = null;

		switch ($aCompositeComponentViewId_int)
		{
			case self::_COMPOSITE_COMPONENT_VIEW_ID_WAGE_RANGE:
			{
				$lCompositeComponentView_clss = new CJOBWageRangeCompositeComponentView($aComponentsView_clss);
			}break;

			default:
				$lCompositeComponentView_clss = parent::__generateCompositeComponentView($aCompositeComponentViewId_int, $aComponentsView_clss);
			break;
		}

		return $lCompositeComponentView_clss;
	}
}


?>