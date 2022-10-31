<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


/*virtual*/class CCRequestsController
{
	//IDS...
	private const _REQUEST_CONTROLLER_ID_PAYMENT				= 0;
	private const _REQUEST_CONTROLLER_ID_SUPPORT				= 1;
	private const _REQUEST_CONTROLLER_ID_USER_MESSAGE_ADDITION	= 2;
	private const _REQUEST_CONTROLLER_ID_USER_AUTHORIZATION		= 3;
	private const _REQUEST_CONTROLLER_ID_USER_REGISTRATION		= 4;
	protected const __REQUEST_CONTROLLERS_COUNT					= 5;
	//...IDS

	private $_fRequestController_clss_arr = [];


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lPostParamRequestId_str = $this->__getMainData()->i_getPOSTParamRequestId();
		switch ($lPostParamRequestId_str)
		{
			case CCRequestConst::i_REQUEST_ID_USER_AUTHORIZATION:
			{
				$this->i_getUserAuthorizationRequestController()->i_update();
			}break;

			case CCRequestConst::i_REQUEST_ID_USER_REGISTRATION:
			{
				$this->i_getUserRegistrationRequestController()->i_update();
			}break;

			/*case CCRequestConst::i_REQUEST_ID_PAYMENT:
			{
				$this->_getPaymentRequestController()->i_update();
			}break;

			case CCRequestConst::i_REQUEST_ID_USER_MESSAGE_ADDITING:
			{
				$this->_getUserMessageAdditingRequestController()->i_update();
			}break;

			case CCRequestConst::i_REQUEST_ID_SUPPORT:
			{
				$this->_getSupportRequestController()->i_update();
			}break;*/
			
			default:
				new CException('update', 'Unsupported post param request id: ' .$lPostParamRequestId_str);
			break;
		}
	}

	public function i_getPaymentRequestController()
	{
		return $this->__getRequestController(self::_REQUEST_CONTROLLER_ID_PAYMENT);
	}

	public function i_getSupportRequestController()
	{
		return $this->__getRequestController(self::_REQUEST_CONTROLLER_ID_SUPPORT);
	}

	public function i_getUserMessageAdditingRequestController()
	{
		return $this->__getRequestController(self::_REQUEST_CONTROLLER_ID_USER_MESSAGE_ADDITION);
	}

	public function i_getUserAuthorizationRequestController()
	{
		return $this->__getRequestController(self::_REQUEST_CONTROLLER_ID_USER_AUTHORIZATION);
	}

	public function i_getUserRegistrationRequestController()
	{
		return $this->__getRequestController(self::_REQUEST_CONTROLLER_ID_USER_REGISTRATION);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function _init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getRequestController(int $aRequestControllerId_int)
	{
		return isset($this->_fRequestController_clss_arr[$aRequestControllerId_int]) ?  $this->_fRequestController_clss_arr[$aRequestControllerId_int] : ($this->_fRequestController_clss_arr[$aRequestControllerId_int] = $this->__generateRequestController($aRequestControllerId_int));
	}

	/*virtual*/protected function __generateRequestController(int $aRequestControllerId_int):CCRequestController
	{
		$lRequestController_clss = null;

		switch ($aRequestControllerId_int)
		{
			case self::_REQUEST_CONTROLLER_ID_PAYMENT:
			{
				$lRequestController_clss = new CCPaymentRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_SUPPORT:
			{
				$lRequestController_clss = new CCSupportRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_USER_MESSAGE_ADDITION:
			{
				$lRequestController_clss = new CCUserMessageAdditingRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_USER_AUTHORIZATION:
			{
				$lRequestController_clss = new CCUserAuthorizationRequestController();
			}break;

			case self::_REQUEST_CONTROLLER_ID_USER_REGISTRATION:
			{
				$lRequestController_clss = new CCUserRegistrationRequestController();
			}break;

			default:
				new CException('__generateRequestController', 'Unsupported request controller id: ' .$aRequestControllerId_int);
			break;
		}

		return $lRequestController_clss;
	}
}


?>