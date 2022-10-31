<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CCPaymentConst
{
	//ROBOKASSA...
	public const i_ROBOKASSA_LOGIN							= 'avatar_bsp';
	public const i_ROBOKASSA_PASSWORD						= 'jcfjzf4430QXg7pykIiC';
	public const i_ROBOKASSA_SECOND_PASSWORD				= 'WIDH2wFO65pgwk6VBUN5';
	public const i_ROBOKASSA_TEST_PASSWORD					= 'eZIB63WD9FQaXfE5Y4TC';
	public const i_ROBOKASSA_SECOND_TEST_PASSWORD			= 'aHqqLj5vA3xPu1Xx9Ba9';
	public const i_ROBOKASSA_DESCRIPTION					= 'robokassa payment';
	public const i_ROBOKASSA_SITE_URL						= 'auth.robokassa.ru/';
	public const i_ROBOKASSA_PAYMENT_URL					= 'Merchant/Index.aspx';

	public const i_ROBOKASSA_PARAM_ID_LOGIN					= 'MerchantLogin';
	public const i_ROBOKASSA_PARAM_ID_ORDER_ID				= 'InvId';
	public const i_ROBOKASSA_PARAM_ID_ORDER_DEFAULT_PRICE	= 'DefaultSum';
	public const i_ROBOKASSA_PARAM_ID_ORDER_PRICE			= 'OutSum';
	public const i_ROBOKASSA_PARAM_ID_ORDER_DESCRIPTION		= 'Description';
	public const i_ROBOKASSA_PARAM_ID_SIGNATURE				= 'SignatureValue';
	public const i_ROBOKASSA_PARAM_ID_TEST_MODE				= 'IsTest';
	//...ROBOKASSA
}


?>
