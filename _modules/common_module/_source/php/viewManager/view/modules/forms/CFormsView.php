<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CFormsView
{
	private $_fFormsView_clss_arr;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_getMainFormsView():CMFormsView
	{
		return $this->_getFormsView(CSiteConst::i_SITE_ID_MAIN);
	}*/

	public function i_getJOBFormsView():CJOBFormsView
	{
		return $this->_getFormsView(CSiteConst::i_SITE_ID_JOB);
	}

	public function i_getFormsView(string $aSiteId_str):CCFormsView
	{
		return $this->_getFormsView($aSiteId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	private function _getFormsView(string $aSiteId_str)
	{
		if (!isset($this->_fFormsView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				/*case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMFormsView();
				}break;*/

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBFormsView();
				}break;

				default:
					new CException('_getFormsView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fFormsView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fFormsView_clss_arr[$aSiteId_str];
	}
}


?>