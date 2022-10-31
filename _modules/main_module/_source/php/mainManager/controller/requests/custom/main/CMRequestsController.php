<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMRequestsController
{
	private $_fAuthorizationRequestController_clss;
	private $_fLoginRequestController_clss;
	private $_fRegistrationRequestController_clss;
	private $_fPaymentRequestController_clss;
	/*private $_fLogoutRequestController_clss;
	private $_fSelectCityRequestController_clss;
*/


	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function update()
	{
		$lSiteId_str = $this->__getMainData()->getURLParam(CCRequestParamConst::GET_PARAM_ID_SITE);
		switch ($lSiteId_str)
		{
			case CCSiteConst::SITE_ID_MAIN:
			{
				$this->__update();
			}break;

			default:
				//$this->_getCustomRequestsController()->update();
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __init()
	{
	}

	protected function __getMainData()
	{
		return CMainManager::getInstance()->getMainData();
	}

	protected function __getAvailableCommonRequests()
	{
		return CRequestConst::$AVAILABLE_COMMON_REQUESTS;
	}

	protected function __update()
	{
		$lPostParamRequestId_str = $this->__getMainData()->getPostParamRequestId();
		if (empty($lPostParamRequestId_str))
		{
			return;
		}

		$lAvailableCommonRequests_str_arr = $this->__getAvailableCommonRequests();
		if (!in_array($lPostParamRequestId_str, $lAvailableCommonRequests_str_arr))
		{
			new CException('__update', 'Unavailable request id: ' .$lPostParamRequestId_str);
		}

		switch ($lPostParamRequestId_str)
		{
			case CMRequestConst::REQUEST_ID_LOGIN:
			{
				$this->_getLoginRequestController()->update();
			}break;

			case CMRequestConst::REQUEST_LOGOUT:
			{
				$this->_getLogoutRequestController()->update();
			}break;

			case CMRequestConst::REQUEST_ID_REGISTRATION:
			{
				$this->_getRegistrationRequestController()->update();
			}break;

			case CMRequestConst::REQUEST_ID_AUTHORIZATION:
			{
				$this->_getAuthorizationRequestController()->update();
			}break;
			
			case CMRequestConst::REQUEST_ID_PAYMENT:
			{
				$this->_getPaymentRequestController()->update();
			}break;
			
			/*
			case CMRequestConst::REQUEST_SELECT_CITY:
			{
				$this->_getSelectCityRequestController()->update();
			}break;
*/

			default:
				new CException('__update', 'Unsupported post param request id: ' .$lPostParamRequestId_str);
			break;
		}
	}

	private function _getAuthorizationRequestController()
	{
		return isset($this->_fAuthorizationRequestController_clss) ? $this->_fAuthorizationRequestController_clss : ($this->_fAuthorizationRequestController_clss = new CAuthorizationRequestController());
	}

	private function _getLoginRequestController()
	{
		return isset($this->_fLoginRequestController_clss) ? $this->_fLoginRequestController_clss : ($this->_fLoginRequestController_clss = new CLoginRequestController());
	}

	private function _getLogoutRequestController()
	{
		return isset($this->_fLogoutRequestController_clss) ? $this->_fLogoutRequestController_clss : ($this->_fLogoutRequestController_clss = new CLogoutRequestController());
	}

	private function _getRegistrationRequestController()
	{
		return isset($this->_fRegistrationRequestController_clss) ? $this->_fRegistrationRequestController_clss : ($this->_fRegistrationRequestController_clss = new CRegistrationRequestController());
	}
	
	private function _getPaymentRequestController()
	{
		return isset($this->_fPaymentRequestController_clss) ? $this->_fPaymentRequestController_clss : ($this->_fPaymentRequestController_clss = new CMPaymentRequestController());
	}
	
	private function _getSelectCityRequestController()
	{
		return isset($this->_fSelectCityRequestController_clss) ? $this->_fSelectCityRequestController_clss : ($this->_fSelectCityRequestController_clss = new CSelectCityRequestController());
	}
}


?>