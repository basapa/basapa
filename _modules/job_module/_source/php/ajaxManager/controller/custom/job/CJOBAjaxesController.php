<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBAjaxesController extends CCAjaxesController
{
	private $_fUserAjaxController_clss;


	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_update():void
	{
		$lGETParamAjaxRequestId_str = $this->__getMainData()->i_getGetParamAjaxRequest();
		switch ($lGETParamAjaxRequestId_str)
		{
			default:
				parent::i_update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getUserAjaxController()
	{
		return isset($this->_fUserAjaxController_clss) ? $this->_fUserAjaxController_clss : ($this->_fUserAjaxController_clss = new CJOBUserAjaxController());
	}
}


?>