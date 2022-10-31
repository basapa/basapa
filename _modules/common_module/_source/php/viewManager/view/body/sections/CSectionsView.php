<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CSectionsView
{
	private $_fSectionsView_clss_arr;


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
		
		$this->_getSectionsView($lSiteId_str)->i_draw();
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
	
	private function _getSectionsView(string $aSiteId_str):CCSectionsView
	{
		if (!isset($this->_fSectionsView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMSectionsView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBSectionsView();
				}break;

				default:
					new CException('_getSectionsView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fSectionsView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fSectionsView_clss_arr[$aSiteId_str];
	}
}


?>