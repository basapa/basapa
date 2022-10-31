<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBPanelsInfoView extends CCPanelsInfoView
{
	//IDS...
	private const _PANEL_INFO_VIEW_ID_CONTENT_ADDITION	= self::__PANEL_INFO_VIEWS_COUNT;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBPanelsInfoView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getContentAdditionPanelInfoView()
	{
		return $this->__getPanelInfoView(self::_PANEL_INFO_VIEW_ID_CONTENT_ADDITION);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generatePanelInfoView(int $aPanelInfoViewId_int):CCPanelInfoView
	{
		$lPanelInfoView_clss = null;

		switch ($aPanelInfoViewId_int)
		{
			case self::_PANEL_INFO_VIEW_ID_CONTENT_ADDITION:
			{
				$lPanelInfoView_clss = new CJOBContentAdditionPanelInfoView();
			}break;

			default:
				$lPanelInfoView_clss = parent::__generatePanelInfoView($aPanelInfoViewId_int);
			break;
		}

		return $lPanelInfoView_clss;
	}
}


?>