<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCFormsMessagesView
{
	//IDS...
	private const _FORM_MESSAGES_VIEW_ID_CITY_SELECT			= 0;
	private const _FORM_MESSAGES_VIEW_ID_PAYMENT				= 1;
	private const _FORM_MESSAGES_VIEW_ID_SUPPORT				= 2;
	private const _FORM_MESSAGES_VIEW_ID_USER_AUTHORIZATION		= 3;
	private const _FORM_MESSAGES_VIEW_ID_USER_LOGIN				= 4;
	private const _FORM_MESSAGES_VIEW_ID_USER_LOGOUT			= 5;
	private const _FORM_MESSAGES_VIEW_ID_USER_MESSAGE_ADDITION	= 6;
	private const _FORM_MESSAGES_VIEW_ID_USER_REGISTRATION		= 7;
	protected const __FORM_MESSAGES_VIEWS_COUNT					= 8;
	//...IDS

	private $_fFormMessagesView_clss_arr = [];


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lMainData_clss = $this->__getMainData();
		if (!$lMainData_clss->i_isPOSTParamRequestIdDefined())
		{
			return;
		}

		$this->__draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	/*virtual*/protected function __draw():void
	{
		$lPOSTParamRequestId_str = $this->__getMainData()->i_getPOSTParamRequestId();
		switch ($lPOSTParamRequestId_str)
		{
			/*case CCRequestConst::i_REQUEST_ID_CITY_SELECT:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_CITY_SELECT)->i_draw();
			}break;*/
			
			case CCRequestConst::i_REQUEST_ID_PAYMENT:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_PAYMENT)->i_draw();
			}break;
			
			case CCRequestConst::i_REQUEST_ID_SUPPORT:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_SUPPORT)->i_draw();
			}break;
			
			/*case CCRequestConst::i_REQUEST_ID_USER_AUTHORIZATION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_AUTHORIZATION)->i_draw();
			}break;
			
			case CCRequestConst::i_REQUEST_ID_USER_LOGIN:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_LOGIN)->i_draw();
			}break;
			
			case CCRequestConst::i_REQUEST_ID_USER_LOGOUT:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_LOGOUT)->i_draw();
			}break;
			
			case CCRequestConst::i_REQUEST_ID_USER_MESSAGE_ADDITION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_MESSAGE_ADDITION)->i_draw();
			}break;
			
			case CCRequestConst::i_REQUEST_ID_USER_REGISTRATION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_REGISTRATION)->i_draw();
			}break;*/

			case CCRequestConst::i_REQUEST_ID_USER_AUTHORIZATION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_AUTHORIZATION)->i_draw();
			}break;

			case CCRequestConst::i_REQUEST_ID_USER_REGISTRATION:
			{
				$this->__generateFormMessagesView(self::_FORM_MESSAGES_VIEW_ID_USER_REGISTRATION)->i_draw();
			}break;

			default:
				new CException('__draw', 'Unsupported POST param request id: ' .$lPOSTParamRequestId_str);
			break;
		}
	}

	protected function __getFormMessagesView(int $aFormMessagesViewId_int)
	{
		return $this->_fFormMessagesView_clss_arr[$aFormMessagesViewId_int] ?? ($this->_fFormMessagesView_clss_arr[$aFormMessagesViewId_int] = $this->__generateFormMessagesView($aFormMessagesViewId_int));
	}

	/*virtual*/protected function __generateFormMessagesView(int $aFormMessagesViewId_int):CCFormMessagesView
	{
		$lFormMessagesView_clss = null;

		switch ($aFormMessagesViewId_int)
		{
			case self::_FORM_MESSAGES_VIEW_ID_CITY_SELECT:
			{
				$lFormMessagesView_clss = new CCCitySelectFormMessagesView();
			}break;
			
			case self::_FORM_MESSAGES_VIEW_ID_PAYMENT:
			{
				$lFormMessagesView_clss = new CCPaymentFormMessagesView();
			}break;

			case self::_FORM_MESSAGES_VIEW_ID_SUPPORT:
			{
				$lFormMessagesView_clss = new CCSupportFormMessagesView();
			}break;
			
			case self::_FORM_MESSAGES_VIEW_ID_USER_AUTHORIZATION:
			{
				$lFormMessagesView_clss = new CCUserAuthorizationFormMessagesView();
			}break;
			
			case self::_FORM_MESSAGES_VIEW_ID_USER_LOGIN:
			{
				$lFormMessagesView_clss = new CCUserLoginFormMessagesView();
			}break;
			
			case self::_FORM_MESSAGES_VIEW_ID_USER_LOGOUT:
			{
				$lFormMessagesView_clss = new CCUserLogoutFormMessagesView();
			}break;
			
			case self::_FORM_MESSAGES_VIEW_ID_USER_MESSAGE_ADDITION:
			{
				$lFormMessagesView_clss = new CCUserMessageAdditionFormMessagesView();
			}break;
			
			case self::_FORM_MESSAGES_VIEW_ID_USER_REGISTRATION:
			{
				$lFormMessagesView_clss = new CCUserRegistrationFormMessagesView();
			}break;
			
			default:
				new CException('__generateFormMessagesView', 'Unsupported form messages view id: ' .$aFormMessagesViewId_int);
			break;
		}

		return $lFormMessagesView_clss;
	}
}


?>