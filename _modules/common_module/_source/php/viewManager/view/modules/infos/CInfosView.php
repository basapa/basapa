<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CInfosView
{
	private $_fMessagesInfoView_clss;

	private $_fInfosView_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getMessagesInfoView()
	{
		return $this->_getMessagesInfoView();
	}

	/*public function i_getMainInfosView():CMInfosView
	{
		return $this->_getInfosView(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBInfosView():CJOBInfosView
	{
		return $this->_getInfosView(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getInfosView(string $aSiteId_str):CCInfosView
	{
		return $this->_getInfosView($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMessagesInfoView()
	{
		return $this->_fMessagesInfoView_clss ?? ($this->_fMessagesInfoView_clss = new CCMessagesInfoView());
	}
	
	private function _getInfosView(string $aSiteId_str)
	{
		if (!isset($this->_fInfosView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMInfosView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBInfosView();
				}break;

				default:
					new CException('_getInfosView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fInfosView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fInfosView_clss_arr[$aSiteId_str];
	}
}


?>