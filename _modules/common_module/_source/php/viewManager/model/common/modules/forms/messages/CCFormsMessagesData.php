<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


/*virtual*/class CCFormsMessagesData
{
	//IDS...
	private const _FORM_MESSAGES_DATA_ID_PAYMENT				= 0;
	private const _FORM_MESSAGES_DATA_ID_SUPPORT				= 1;
	private const _FORM_MESSAGES_DATA_ID_USER_MESSAGE_ADDITION	= 2;
	private const _FORM_MESSAGES_DATA_ID_USER_REGISTRATION		= 3;
	private const _FORM_MESSAGES_DATA_ID_USER_AUTHORIZATION		= 4;
	protected const __FORM_MESSAGES_DATAS_COUNT					= 5;
	//...IDS

	private $_fFormMessagesData_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getPaymentFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_PAYMENT);
	}

	public function i_getSupportFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_SUPPORT);
	}

	public function i_getUserMessageAdditingFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_USER_MESSAGE_ADDITION);
	}

	public function i_getUserRegistrationFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_USER_REGISTRATION);
	}

	public function i_getUserAuthorizationFormMessagesData()
	{
		return $this->__getFormMessagesData(self::_FORM_MESSAGES_DATA_ID_USER_AUTHORIZATION);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getFormMessagesData(int $aFormMessagesDataId_int):CCFormMessagesData
	{
		return $this->_fFormMessagesData_clss_arr[$aFormMessagesDataId_int] ?? ($this->_fFormMessagesData_clss_arr[$aFormMessagesDataId_int] = $this->__generateFormMessagesData($aFormMessagesDataId_int));
	}

	/*virtual*/protected function __generateFormMessagesData(int $aFormMessagesDataId_int):CCFormMessagesData
	{
		$lFormMessagesData_clss = null;

		switch ($aFormMessagesDataId_int)
		{
			case self::_FORM_MESSAGES_DATA_ID_PAYMENT:
			{
				$lFormMessagesData_clss = new CCPaymentFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_SUPPORT:
			{
				$lFormMessagesData_clss = new CCSupportFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_USER_MESSAGE_ADDITION:
			{
				$lFormMessagesData_clss = new CCUserMessageAdditingFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_USER_REGISTRATION:
			{
				$lFormMessagesData_clss = new CCUserRegistrationFormMessagesData();
			}break;

			case self::_FORM_MESSAGES_DATA_ID_USER_AUTHORIZATION:
			{
				$lFormMessagesData_clss = new CCUserAuthorizationFormMessagesData();
			}break;

			default:
				new CException('__generateFormMessagesData', 'Unsupported form messages data id: ' .$aFormMessagesDataId_int);
			break;
		}

		return $lFormMessagesData_clss;
	}
}


?>