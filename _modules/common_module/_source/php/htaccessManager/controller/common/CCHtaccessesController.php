<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*abstract*/class CCHtaccessesController
{
	//IDS...
	private const _HTACCESS_CONTROLLER_ID_URL_REWRITING		= 0;
	protected const __HTACCESS_CONTROLLERS_COUNT			= 1;
	//...IDS

	private $_fHtaccessController_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getURLRewritingHtaccessController():CCURLRewritingHtaccessController
	{
		return $this->__getHtaccessController(self::_HTACCESS_CONTROLLER_ID_URL_REWRITING);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getHtaccessController(int $aHtaccessControllerId_int)
	{
		return $this->_fHtaccessController_clss_arr[$aHtaccessControllerId_int] ??  ($this->_fHtaccessController_clss_arr[$aHtaccessControllerId_int] = $this->__generateHtaccessController($aHtaccessControllerId_int));
	}

	/*virtual*/protected function __generateHtaccessController(int $aHtaccessControllerId_int):CCHtaccessController
	{
		$lHtaccessController_clss = null;

		switch ($aHtaccessControllerId_int)
		{
			case self::_HTACCESS_CONTROLLER_ID_URL_REWRITING:
			{
				$lHtaccessController_clss = $this->__generateURLRewritingHtaccessController();
			}break;

			default:
				new CException('__generateHtaccessController', 'Unsupported htaccess controller id: ' .$lHtaccessController_clss);
			break;
		}

		return $lHtaccessController_clss;
	}

	/*virtual*/protected function __generateURLRewritingHtaccessController():CCURLRewritingHtaccessController
	{
		return new CCURLRewritingHtaccessController();
	}
}


?>