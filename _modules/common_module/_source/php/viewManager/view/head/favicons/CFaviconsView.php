<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CFaviconsView
{
	private $_fFaviconView_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lSiteId_str = $this->_getMainData()->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
		
		$this->_getFaviconView($lSiteId_str)->i_draw();
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
	
	private function _getFaviconView(string $aSiteId_str):CCFaviconView
	{
		if (!isset($this->_fFaviconView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMFaviconView();
				}break;

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBFaviconView();
				}break;

				default:
					new CException('_getFaviconView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fFaviconView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fFaviconView_clss_arr[$aSiteId_str];
	}
}


?>