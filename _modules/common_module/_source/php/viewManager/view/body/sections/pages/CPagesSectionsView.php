<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CPagesSectionsView
{
	private $_fPagesSectionsView_clss_arr;

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainPagesSectionsView():CMPagesSectionsView
	{
		return $this->_getPagesSectionsView(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBPagesSectionsView():CJOBPagesSectionsView
	{
		return $this->_getPagesSectionsView(CSiteConst::i_SITE_ID_JOB);
	}
	
	public function i_getPagesSectionsView(string $aSiteId_str):CCPagesSectionsView
	{
		return $this->_getPagesSectionsView($aSiteId_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/
	
	private function _getPagesSectionsView(string $aSiteId_str)
	{
		if (!isset($this->_fPagesSectionsView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMPagesSectionsView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBPagesSectionsView();
				}break;

				default:
					new CException('_getPagesSectionsView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fPagesSectionsView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fPagesSectionsView_clss_arr[$aSiteId_str];
	}
}


?>