<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CMetasView
{
	private $_fMetaView_clss_arr;

	
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
		
		$this->_getMetaView($lSiteId_str)->i_draw();

		echo
		'<meta http-equiv="Content-Type" content="text/HTML; charset=' .CMainConst::i_DEFAULT_ENCODING_TYPE. '">',
		'<meta name="robots" content="index, follow">',
		'<meta name="google-site-verification" content="">',
		'<meta name="yandex-verification" content="">';
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

	private function _getMetaView(string $aSiteId_str):CCMetaView
	{
		if (!isset($this->_fMetaView_clss_arr[$aSiteId_str]))
		{
			$l_clss = null;

			switch ($aSiteId_str)
			{
				case CSiteConst::i_SITE_ID_MAIN:
				{
					$l_clss = new CMMetaView();
				}break;

				case CSiteConst::i_SITE_ID_JOB:
				{
					$l_clss = new CJOBMetaView();
				}break;

				default:
					new CException('_getMetaView', 'Unsupported site id: ' .$aSiteId_str);
				break;
			}
			
			$this->_fMetaView_clss_arr[$aSiteId_str] = $l_clss;
		}
		
		return $this->_fMetaView_clss_arr[$aSiteId_str];
	}
}


?>