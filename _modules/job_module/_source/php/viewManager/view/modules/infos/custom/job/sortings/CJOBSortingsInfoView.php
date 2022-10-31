<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBSortingsInfoView extends CCSortingsInfoView
{
	//IDS...
	private const _SORTING_INFO_VIEW_ID_JOB_CONTENT	= self::__SORTING_INFO_VIEWS_COUNT;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBSortingsInfoView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getContentSortingInfoView()
	{
		return $this->__getSortingInfoView(self::_SORTING_INFO_VIEW_ID_JOB_CONTENT);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateSortingInfoView(int $aSortingInfoViewId_int):CCSortingInfoView
	{
		$lSortingInfoView_clss = null;

		switch ($aSortingInfoViewId_int)
		{
			case self::_SORTING_INFO_VIEW_ID_JOB_CONTENT:
			{
				$lSortingInfoView_clss = new CJOBContentSortingInfoView();
			}break;

			default:
				$lSortingInfoView_clss = parent::__generateSortingInfoView($aSortingInfoViewId_int);
			break;
		}

		return $lSortingInfoView_clss;
	}
}


?>