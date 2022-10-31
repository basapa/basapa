<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMFileConst
{
	/****************************************************
	 * XMLS RESOURCES
	 */
	public const i_XML_SITEMAP_FILE_NAME				= 'main_sitemap.xml';

	/****************************************************
	 * IMAGES RESOURCES
	 */
	public const i_IMAGES_DIRECTORY_NAME				= '/resources/internals/images/custom/main/';

	/****************************************************
	 * TEXTS RESOURCES
	 */
	public const i_TEXTS_DIRECTORY_NAME					= '/resources/internals/texts/custom/main/';

	public const i_TEXT_SYSTEM_RULES_FILE_NAME			= 'systems/rules.txt';
	public const i_TEXT_SYSTEM_PROMOTIONS_FILE_NAME		= 'systems/promotions.txt';
	public const i_TEXT_SYSTEM_REQUIREMENTS_FILE_NAME	= 'systems/requirements.txt';

	/****************************************************
	 * TRANSLATIONS RESOURCES
	 */
	public const i_TRANSLATIONS_DIRECTORY_NAME			= './resources/internals/translations/custom/main/#LANG_ID#/';
	public const i_TRANSLATIONS_XML_FILE_NAME			= 'translations.xml';

	public const i_TRANSLATIONS_MESSAGES_DIRECTORY_NAME				= './resources/internals/translations/custom/main/#LANG_ID#/messages/';
	public const i_TRANSLATIONS_ERRORS_MESSAGES_DIRECTORY_NAME		= './resources/internals/translations/custom/main/#LANG_ID#/messages/errors/';
	public const i_TRANSLATIONS_ACCESSES_MESSAGES_DIRECTORY_NAME	= './resources/internals/translations/custom/main/#LANG_ID#/messages/accesses/';

	public const i_ACCESS_REQUIREMENT_MESSAGE_FILE_NAME		= 'access_requirement_message.txt';
	public const i_ACCESS_RESTRICTION_MESSAGE_FILE_NAME		= 'access_restriction_message.txt';
	public const i_ACCESS_ERROR_MESSAGE_FILE_NAME			= 'access_error_message.txt';
	public const i_ACCESS_PROHIBITION_MESSAGE_FILE_NAME		= 'access_prohibition_message.txt';
	public const i_ERROR_403_MESSAGE_FILE_NAME				= 'error_403_message.txt';
	public const i_ERROR_404_MESSAGE_FILE_NAME				= 'error_404_message.txt';
	public static $i_MESSAGES_FILES_NAMES					= [	CMFileConst::i_ACCESS_REQUIREMENT_MESSAGE_FILE_NAME,
																CMFileConst::i_ACCESS_RESTRICTION_MESSAGE_FILE_NAME,
																CMFileConst::i_ACCESS_ERROR_MESSAGE_FILE_NAME,
																CMFileConst::i_ACCESS_PROHIBITION_MESSAGE_FILE_NAME,
																CMFileConst::i_ERROR_403_MESSAGE_FILE_NAME,
																CMFileConst::i_ERROR_404_MESSAGE_FILE_NAME];
}


?>