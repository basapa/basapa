<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CCMessagesInfoView
{
	//IDS...
	private const _MESSAGE_INFO_VIEW_ID_ERROR			= 0;
	private const _MESSAGE_INFO_VIEW_ID_INFORMATION		= 1;
	private const _MESSAGE_INFO_VIEW_ID_SUCCESS			= 2;
	private const _MESSAGE_INFO_VIEW_ID_WARNING			= 3;
	protected const __MESSAGE_INFO_VIEWS_COUNT			= 4;
	//...IDS

	private $_fMessageInfoView_clss_arr = [];

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */
	
	public function i_getErrorMessageInfoView()
	{
		return $this->__getMessageInfoView(self::_MESSAGE_INFO_VIEW_ID_ERROR);
	}

	public function i_getInformationMessageInfoView()
	{
		return $this->__getMessageInfoView(self::_MESSAGE_INFO_VIEW_ID_INFORMATION);
	}
	
	public function i_getSuccessMessageInfoView()
	{
		return $this->__getMessageInfoView(self::_MESSAGE_INFO_VIEW_ID_SUCCESS);
	}

	public function i_getWarningMessageInfoView()
	{
		return $this->__getMessageInfoView(self::_MESSAGE_INFO_VIEW_ID_WARNING);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	protected function __getMessageInfoView(int $aMessageInfoViewId_int)
	{
		return $this->_fMessageInfoView_clss_arr[$aMessageInfoViewId_int] ?? ($this->_fMessageInfoView_clss_arr[$aMessageInfoViewId_int] = $this->__generateMessageInfoView($aMessageInfoViewId_int));
	}

	/*virtual*/protected function __generateMessageInfoView(int $aMessageInfoViewId_int):CCMessageInfoView
	{
		$lMessageInfoView_clss = null;

		switch ($aMessageInfoViewId_int)
		{
			case self::_MESSAGE_INFO_VIEW_ID_ERROR:
			{
				$lMessageInfoView_clss = new CCErrorMessageInfoView();
			}break;
			
			case self::_MESSAGE_INFO_VIEW_ID_INFORMATION:
			{
				$lMessageInfoView_clss = new CCInformationMessageInfoView();
			}break;
			
			case self::_MESSAGE_INFO_VIEW_ID_SUCCESS:
			{
				$lMessageInfoView_clss = new CCSuccessMessageInfoView();
			}break;
			
			case self::_MESSAGE_INFO_VIEW_ID_WARNING:
			{
				$lMessageInfoView_clss = new CCWarningMessageInfoView();
			}break;
			
			default:
				new CException('__generateMessageInfoView', 'Unsupported message info view id: ' .$aMessageInfoViewId_int);
			break;
		}

		return $lMessageInfoView_clss;
	}
}


?>