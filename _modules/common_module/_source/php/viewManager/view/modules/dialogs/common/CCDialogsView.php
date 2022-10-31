<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*virtual*/class CCDialogsView
{
	//IDS...
	private const _DIALOG_VIEW_ID_DEBUG					= 0;
	protected const __DIALOG_VIEWS_COUNT				= 1;
	//...IDS

	private $_fDialogView_clss_arr = [];
	

	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSupportFormDialogView()
	{
		return $this->__getDialogView(self::_DIALOG_VIEW_ID_DEBUG);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getDialogView(int $aDialogViewId_int)
	{
		return $this->_fDialogView_clss_arr[$aDialogViewId_int] ?? ($this->_fDialogView_clss_arr[$aDialogViewId_int] = $this->__generateDialogView($aDialogViewId_int));
	}

	/*virtual*/protected function __generateDialogView(int $aDialogViewId_int):CCInfoView
	{
		$lDialogView_clss = null;

		switch ($aDialogViewId_int)
		{
			case self::_DIALOG_VIEW_ID_DEBUG:
			{
				$lDialogView_clss = new CCSupportFormDialogView();
			}break;

			default:
				new CException('__generateDialogView', 'Unsupported dialog view id: ' .$aDialogViewId_int);
			break;
		}

		return $lDialogView_clss;
	}
}


?>