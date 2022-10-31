<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBNavigationsInfoView extends CCNavigationsInfoView
{
	//IDS...
	//private const _NAVIGATION_INFO_VIEW_ID_CONTENTS			= self::__NAVIGATION_INFO_VIEWS_COUNT ;
	//private const _NAVIGATION_INFO_VIEW_ID_CATEGORIES		= self::__NAVIGATION_INFO_VIEWS_COUNT + 1;
	//private const _NAVIGATION_INFO_VIEW_ID_SUBCATEGORIES	= self::__NAVIGATION_INFO_VIEWS_COUNT + 2;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBNavigationsInfoView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	/*public function i_getCategoriesNavigationInfoView()
	{
		return $this->__getNavigationInfoView(self::_NAVIGATION_INFO_VIEW_ID_CATEGORIES);
	}

	public function i_getSubcategoriesNavigationInfoView()
	{
		return $this->__getNavigationInfoView(self::_NAVIGATION_INFO_VIEW_ID_SUBCATEGORIES);
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateNavigationInfoView(int $aNavigationInfoViewId_int):CCNavigationInfoView
	{
		$lNavigationInfoView_clss = null;

		switch ($aNavigationInfoViewId_int)
		{
			/*case self::_NAVIGATION_INFO_VIEW_ID_CATEGORIES:
			{
				$lNavigationInfoView_clss = new CJOBCategoriesNavigationInfoView();
			}break;

			case self::_NAVIGATION_INFO_VIEW_ID_SUBCATEGORIES:
			{
				$lNavigationInfoView_clss = new CJOBSubcategoriesNavigationInfoView();
			}break;*/

			default:
				$lNavigationInfoView_clss = parent::__generateNavigationInfoView($aNavigationInfoViewId_int);
			break;
		}

		return $lNavigationInfoView_clss;
	}

	/*override*/protected function __generateAdditionalPagesNavigationInfoView()
	{
		return new CJOBAdditionalPagesNavigationInfoView();
	}

	/*override*/protected function __generatePagesNavigationInfoView()
	{
		return new CJOBPagesNavigationInfoView();
	}

	/*override*/protected function __generateContentsNavigationInfoView()
	{
		return new CJOBContentsNavigationInfoView();
	}
}


?>