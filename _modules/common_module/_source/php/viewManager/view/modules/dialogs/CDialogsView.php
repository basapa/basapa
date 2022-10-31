<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CDialogsView
{
	private $_fDialogsView_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainDialogsView():CMDialogsView
	{
		return $this->_getDialogsView(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBDialogsView():CJOBDialogsView
	{
		return $this->_getDialogsView(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getDialogsView(string $aSiteId_str):CCDialogsView
	{
		return $this->_getDialogsView($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getDialogsView(string $aSiteId_str)
	{
		if (!isset($this->_fDialogsView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMDialogsView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBDialogsView();
				}break;

				default:
					new CException('_getDialogsView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fDialogsView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fDialogsView_clss_arr[$aSiteId_str];
	}
}


?>