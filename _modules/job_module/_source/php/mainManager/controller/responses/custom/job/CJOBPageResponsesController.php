<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBPageResponsesController extends CCPageResponsesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generatePageResponseController(string $aPageId_str):CCPageResponseController
	{
		$lPageResponseController_clss = null;

		switch ($aPageId_str)
		{
			case CJOBPageConst::i_PAGE_ID_CONTENTS:
			{
				$lPageResponseController_clss = new CJOBVacancyContentsPageResponseController();
			}break;

			case CJOBPageConst::i_PAGE_ID_CONTENT:
			{
				$lPageResponseController_clss = new CJOBVacancyContentPageResponseController();
			}break;

			case CJOBPageConst::i_PAGE_ID_ADMINISTRATION:
			{
				$lPageResponseController_clss = new CJOBContentsAdministrationPageResponseController();
			}break;

			default:
				$lPageResponseController_clss = parent::__generatePageResponseController($aPageId_str);
			break;
		}

		return $lPageResponseController_clss;
	}

	//MAIN PAGE...
	/**@return CJOBMainPageResponseController*/
	/*override*/protected function __generateMainPageResponseController():CCPageResponseController
	{
		return new CJOBMainPageResponseController();
	}
	//...MAIN PAGE
}


?>