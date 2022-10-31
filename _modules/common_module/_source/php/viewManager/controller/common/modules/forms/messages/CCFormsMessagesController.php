<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCFormsMessagesController
{
	//IDS...
	private const _FORM_MESSAGES_CONTROLLER_ID_PAYMENT				= 0;
	private const _FORM_MESSAGES_CONTROLLER_ID_SUPPORT				= 1;
	private const _FORM_MESSAGES_CONTROLLER_ID_USER_AUTHORIZATION	= 2;
	private const _FORM_MESSAGES_CONTROLLER_ID_USER_REGISTRATION	= 3;
	protected const __FORM_MESSAGES_CONTROLLERS_COUNT				= 4;
	//...IDS

	private $_fFormMessagesController_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$lMainData_clss = $this->__getMainData();
		if (!$lMainData_clss->i_isPOSTParamRequestIdDefined())
		{
			return;
		}

		$this->__update();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	/*virtual*/protected function __update():void
	{
		$lPOSTParamRequestId_str = $this->__getMainData()->i_getPOSTParamRequestId();
		switch ($lPOSTParamRequestId_str)
		{
			case CCRequestConst::i_REQUEST_ID_PAYMENT:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_PAYMENT)->i_update();
			}break;

			case CCRequestConst::i_REQUEST_ID_SUPPORT:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_SUPPORT)->i_update();
			}break;

			case CCRequestConst::i_REQUEST_ID_USER_AUTHORIZATION:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_USER_AUTHORIZATION)->i_update();
			}break;

			case CCRequestConst::i_REQUEST_ID_USER_REGISTRATION:
			{
				$this->__getFormMessagesController(self::_FORM_MESSAGES_CONTROLLER_ID_USER_REGISTRATION)->i_update();
			}break;

			default:
				new CException('__update', 'Unsupported POST param request id: ' .$lPOSTParamRequestId_str);
			break;
		}
	}

	protected function __getFormMessagesController(int $aFormMessagesControllerId_int)
	{
		return $this->_fFormMessagesController_clss_arr[$aFormMessagesControllerId_int] ?? ($this->_fFormMessagesController_clss_arr[$aFormMessagesControllerId_int] = $this->__generateFormMessagesController($aFormMessagesControllerId_int));
	}

	/*virtual*/protected function __generateFormMessagesController(int $aFormMessagesControllerId_int):CCFormMessagesController
	{
		$lFormMessagesController_clss = null;

		switch ($aFormMessagesControllerId_int)
		{
			case self::_FORM_MESSAGES_CONTROLLER_ID_PAYMENT:
			{
				$lFormMessagesController_clss = new CCPaymentFormMessagesController();
			}break;

			case self::_FORM_MESSAGES_CONTROLLER_ID_SUPPORT:
			{
				$lFormMessagesController_clss = new CCSupportFormMessagesController();
			}break;

			case self::_FORM_MESSAGES_CONTROLLER_ID_USER_AUTHORIZATION:
			{
				$lFormMessagesController_clss = new CCUserAuthorizationFormMessagesController();
			}break;

			case self::_FORM_MESSAGES_CONTROLLER_ID_USER_REGISTRATION:
			{
				$lFormMessagesController_clss = new CCUserRegistrationFormMessagesController();
			}break;

			default:
				new CException('__generateFormMessagesController', 'Unsupported form messages controller id: ' .$aFormMessagesControllerId_int);
			break;
		}

		return $lFormMessagesController_clss;
	}
}


?>