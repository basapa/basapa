<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CJOBPagesSectionsView extends CCPagesSectionsView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generatePageSectionView(string $aPageId_str):CCPageSectionView
	{
		switch ($aPageId_str)
		{
			case CJOBPageConst::i_PAGE_ID_CONTENTS:
			{
				$lPageSectionView_clss = new CJOBContentsPageSectionView();
			}break;

			case CJOBPageConst::i_PAGE_ID_CONTENT:
			{
				$lPageSectionView_clss = new CJOBContentPageSectionView();
			}break;

			case CJOBPageConst::i_PAGE_ID_ADMINISTRATION:
			{
				$lPageSectionView_clss = new CJOBContentsAdministrationPageSectionView();
			}break;

			default:
				$lPageSectionView_clss = parent::__generatePageSectionView($aPageId_str);
			break;
		}

		return $lPageSectionView_clss;
	}

	//MAIN PAGE...
	/**@return CJOBMainPageSectionView*/
	/*override*/protected function __generateMainPageSectionView():CCMainPageSectionView
	{
		return new CJOBMainPageSectionView();
	}
	//...MAIN PAGE
}


?>