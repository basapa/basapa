<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


/*virtual*/class CCFormsView
{
	//IDS...
	private const _FORM_VIEW_ID_CITY_SELECT				= 0;
	private const _FORM_VIEW_ID_PAYMENT					= 1;
	private const _FORM_VIEW_ID_SUPPORT					= 2;
	private const _FORM_VIEW_ID_USER_AUTHORIZATION		= 3;
	private const _FORM_VIEW_ID_USER_LOGIN				= 4;
	private const _FORM_VIEW_ID_USER_LOGOUT				= 5;
	private const _FORM_VIEW_ID_USER_MESSAGE_ADDITION	= 6;
	private const _FORM_VIEW_ID_USER_REGISTRATION		= 7;
	protected const __FORM_VIEWS_COUNT					= 8;
	//...IDS

	private $_fFormView_clss_arr = [];

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */
	 
	public function i_getCitySelectFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_CITY_SELECT);
	}
	
	public function i_getPaymentFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_PAYMENT);
	}

	public function i_getSupportFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_SUPPORT);
	}
	
	public function i_getUserAuthorizationFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_USER_AUTHORIZATION);
	}
	
	public function i_getUserLoginFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_USER_LOGIN);
	}
	
	public function i_getUserLogoutFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_USER_LOGOUT);
	}
	
	public function i_getUserMessageAdditingFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_USER_MESSAGE_ADDITION);
	}

	public function i_getUserRegistrationFormView()
	{
		return $this->__getFormView(self::_FORM_VIEW_ID_USER_REGISTRATION);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	protected function __getFormView(int $aFormViewId_int)
	{
		return $this->_fFormView_clss_arr[$aFormViewId_int] ?? ($this->_fFormView_clss_arr[$aFormViewId_int] = $this->__generateFormView($aFormViewId_int));
	}

	/*virtual*/protected function __generateFormView(int $aFormViewId_int):CCFormView
	{
		$lFormView_clss = null;

		switch ($aFormViewId_int)
		{
			case self::_FORM_VIEW_ID_CITY_SELECT:
			{
				$lFormView_clss = new CCCitySelectFormView();
			}break;
			
			case self::_FORM_VIEW_ID_PAYMENT:
			{
				$lFormView_clss = new CCPaymentFormView();
			}break;
			
			case self::_FORM_VIEW_ID_SUPPORT:
			{
				$lFormView_clss = new CCSupportFormView();
			}break;
			
			case self::_FORM_VIEW_ID_USER_AUTHORIZATION:
			{
				$lFormView_clss = new CCUserAuthorizationFormView();
			}break;
			
			case self::_FORM_VIEW_ID_USER_LOGIN:
			{
				$lFormView_clss = new CCUserLoginFormView();
			}break;
			
			case self::_FORM_VIEW_ID_USER_LOGOUT:
			{
				$lFormView_clss = new CCUserLogoutFormView();
			}break;
			
			case self::_FORM_VIEW_ID_USER_MESSAGE_ADDITION:
			{
				$lFormView_clss = new CCUserMessageAdditingFormView();
			}break;

			case self::_FORM_VIEW_ID_USER_REGISTRATION:
			{
				$lFormView_clss = new CCUserRegistrationFormView();
			}break;

			default:
				new CException('__generateFormView', 'Unsupported form view id: ' .$aFormViewId_int);
			break;
		}

		return $lFormView_clss;
	}
}


?>