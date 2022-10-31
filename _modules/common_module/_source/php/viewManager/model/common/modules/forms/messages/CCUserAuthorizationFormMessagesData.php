<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserAuthorizationFormMessagesData extends CCFormMessagesData
{
	public const i_FORM_MESSAGE_ID_LOGIN_EMPTY_DATA				= self::__FORM_MESSAGES_COUNT;
	public const i_FORM_MESSAGE_ID_LOGIN_ILLEGAL_CHARS			= self::__FORM_MESSAGES_COUNT + 1;
	public const i_FORM_MESSAGE_ID_LOGIN_WRONG_CHARS_COUNT		= self::__FORM_MESSAGES_COUNT + 2;

	public const i_FORM_MESSAGE_ID_PASSWORD_EMPTY_DATA			= self::__FORM_MESSAGES_COUNT + 3;
	public const i_FORM_MESSAGE_ID_PASSWORD_ILLEGAL_CHARS		= self::__FORM_MESSAGES_COUNT + 4;
	public const i_FORM_MESSAGE_ID_PASSWORD_WRONG_CHARS_COUNT	= self::__FORM_MESSAGES_COUNT + 5;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}


?>