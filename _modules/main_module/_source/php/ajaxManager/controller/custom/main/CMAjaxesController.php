<?php
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


class CMAjaxesController extends CCAjaxesController
{
	private $_fCitiesAjaxController_clss;
	private $_fRegionsAjaxController_clss;
	private $_fUsersAjaxController_clss;


	/***************************************************
	 * INTERFACE
	 */

	public function i_update()
	{
		$lGetParamAjaxRequestId_str = $this->__getMainData()->i_getGetParamAjaxRequest();
		switch ($lGetParamAjaxRequestId_str)
		{
			default:
				parent::i_update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getCitiesAjaxController()
	{
		return isset($this->_fCitiesAjaxController_clss) ? $this->_fCitiesAjaxController_clss : ($this->_fCitiesAjaxController_clss = new CMCitiesAjaxController());
	}

	private function _getRegionsAjaxController()
	{
		return isset($this->_fRegionsAjaxController_clss) ? $this->_fRegionsAjaxController_clss : ($this->_fRegionsAjaxController_clss = new CMRegionsAjaxController());
	}

	private function _getUsersAjaxController()
	{
		return isset($this->_fUsersAjaxController_clss) ? $this->_fUsersAjaxController_clss : ($this->_fUsersAjaxController_clss = new CMUsersAjaxController());
	}
}


?>