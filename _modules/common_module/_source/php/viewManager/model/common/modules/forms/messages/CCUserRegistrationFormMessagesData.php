<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCUserRegistrationFormMessagesData extends CCFormMessagesData
{
	public const i_FORM_MESSAGE_ID_LOGIN_EMPTY_DATA			= self::__FORM_MESSAGES_COUNT;
	public const i_FORM_MESSAGE_ID_LOGIN_ILLEGAL_CHARS		= self::__FORM_MESSAGES_COUNT + 1;
	public const i_FORM_MESSAGE_ID_LOGIN_WRONG_CHARS_COUNT	= self::__FORM_MESSAGES_COUNT + 2;

	public const i_FORM_MESSAGE_ID_PASSWORD_EMPTY_DATA			= self::__FORM_MESSAGES_COUNT + 3;
	public const i_FORM_MESSAGE_ID_PASSWORD_ILLEGAL_CHARS		= self::__FORM_MESSAGES_COUNT + 4;
	public const i_FORM_MESSAGE_ID_PASSWORD_WRONG_CHARS_COUNT	= self::__FORM_MESSAGES_COUNT + 5;

	public const i_FORM_MESSAGE_ID_REPEAT_PASSWORD_EMPTY_DATA			= self::__FORM_MESSAGES_COUNT + 6;
	public const i_FORM_MESSAGE_ID_REPEAT_PASSWORD_ILLEGAL_CHARS		= self::__FORM_MESSAGES_COUNT + 7;
	public const i_FORM_MESSAGE_ID_REPEAT_PASSWORD_WRONG_CHARS_COUNT	= self::__FORM_MESSAGES_COUNT + 8;

	public const i_FORM_MESSAGE_ID_EMAIL_EMPTY_DATA				= self::__FORM_MESSAGES_COUNT + 9;
	public const i_FORM_MESSAGE_ID_EMAIL_ILLEGAL_CHARS			= self::__FORM_MESSAGES_COUNT + 10;
	public const i_FORM_MESSAGE_ID_EMAIL_WRONG_CHARS_COUNT		= self::__FORM_MESSAGES_COUNT + 11;

	public const i_FORM_MESSAGE_ID_LOGIN_ALREADY_EXIST			= self::__FORM_MESSAGES_COUNT + 12;
	public const i_FORM_MESSAGE_ID_EMAIL_ALREADY_EXIST			= self::__FORM_MESSAGES_COUNT + 13;
	public const i_FORM_MESSAGE_ID_DO_NOT_MATCH_PASSWORDS		= self::__FORM_MESSAGES_COUNT + 14;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
}


?>