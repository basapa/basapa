<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CFormsMessagesView
{
	private $_fFormsMessagesView_clss_arr;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		
		$this->_getFormsMessagesView($lSiteId_str)->i_draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}
	
	private function _getFormsMessagesView(string $aSiteId_str):CCFormsMessagesView
	{
		if (!isset($this->_fFormsMessagesView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMFormsMessagesView();
				}break;

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBFormsMessagesView();
				}break;

				default:
					new CException('_getFormsMessagesView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fFormsMessagesView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fFormsMessagesView_clss_arr[$aSiteId_str];
	}
}


?>