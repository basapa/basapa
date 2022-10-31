<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCPaymentsTableData extends CCTableData
{
	public const i_TABLE_NAME							= 'payments';

	public const i_TABLE_FIELD_AMOUNT					= 'amount';			//float(10)
	public const i_TABLE_FIELD_NAME						= 'name';			//char(32)
	public const i_TABLE_FIELD_EMAIL					= 'email';			//char(32)
	public const i_TABLE_FIELD_MESSAGE					= 'message';		//text(1024)

	public const i_TABLE_FIELD_PAYMEMT_TIME				= 'payment_time';	//int(10)
	public const i_TABLE_FIELD_PAYMEMT_STATUS			= 'payment_status';	//tinyint(3)

	//SUPPORTED STATUSES...
	public const i_PAYMEMT_STATUS_STARTED				= 0;
	public const i_PAYMEMT_STATUS_SYSTEM_CONFIRMED		= 1;
	public const i_PAYMEMT_STATUS_CANCELED				= 2;
	public const i_PAYMEMT_STATUS_COMPLETED				= 3;
	//...SUPPORTED STATUSES


	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_getTableName():string
	{
		return self::i_TABLE_NAME;
	}

	public function i_getTableFieldAmount():float
	{
		return CVariableTools::i_toNumber($this->__getTableFieldStringValue(self::i_TABLE_FIELD_AMOUNT));
	}

	public function i_getTableFieldName():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_NAME);
	}
	
	public function i_getTableFieldEmail():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_EMAIL);
	}
	
	public function i_getTableFieldMessage():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_MESSAGE);
	}

	public function i_getTableFieldPaymentTime():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_PAYMEMT_TIME));
	}

	public function i_getTableFieldPaymentStatus():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_PAYMEMT_STATUS));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>