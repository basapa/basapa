<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:2
*/
namespace basapa_ns;


final class CComponentsView
{
	private $_fComponentsView_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainComponentsView():CMComponentsView
	{
		return $this->_getComponentsView(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBComponentsView():CJOBComponentsView
	{
		return $this->_getComponentsView(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getComponentsView(string $aSiteId_str):CCComponentsView
	{
		return $this->_getComponentsView($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getComponentsView(string $aSiteId_str)
	{
		if (!isset($this->_fComponentsView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMComponentsView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBComponentsView();
				}break;

				default:
					new CException('_getComponentsView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fComponentsView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fComponentsView_clss_arr[$aSiteId_str];
	}
}


?>