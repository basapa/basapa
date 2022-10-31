<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJavascriptsView
{
	private $_fJavascriptView_clss_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lMainData_clss = $this->_getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		
		$this->_getJavascriptView($lSiteId_str)->i_draw();

		echo
		'<script type="text/javascript">
			var JSMain = bsp.i_importJSMainClass();
			var lMain_clss = new JSMain();
			bsp.main = lMain_clss;
			lMain_clss.i_getMainData().i_setGETParams(\'' .CJSTools::i_convertAssociativeArrayToJSObject($lMainData_clss->i_getGETParams()). '\');
		</script>';
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

	private function _getJavascriptView(string $aSiteId_str):CCJavascriptView
	{
		if (!isset($this->_fJavascriptView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMJavascriptView();
				}break;

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBJavascriptView();
				}break;

				default:
					new CException('_getJavascriptView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fJavascriptView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fJavascriptView_clss_arr[$aSiteId_str];
	}
}


?>