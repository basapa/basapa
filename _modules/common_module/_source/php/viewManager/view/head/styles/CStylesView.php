<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CStylesView
{
	private $_fStyleView_clss_arr;


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
		
		$this->_getStyleView($lSiteId_str)->i_draw();
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
	
	private function _getStyleView(string $aSiteId_str):CCStyleView
	{
		if (!isset($this->_fStyleView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMStyleView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBStyleView();
				}break;

				default:
					new CException('_getStyleView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fStyleView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fStyleView_clss_arr[$aSiteId_str];
	}
}


?>