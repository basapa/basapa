<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCTranslationXMLFileNodesFullName
{
	public const i_ROOT_NODE_FULL_NAME						= './translations';

	//PAGES...
	public const i_PAGES_NODE_FULL_NAME							= self::i_ROOT_NODE_FULL_NAME. '/pages';
	public const i_ACCESS_ERROR_PAGE_NODE_FULL_NAME				= self::i_PAGES_NODE_FULL_NAME. '/access_error_page';
	public const i_ACCESS_REQUIREMENT_PAGE_NODE_FULL_NAME		= self::i_PAGES_NODE_FULL_NAME. '/access_requirement_page';
	public const i_ACCESS_RESTRICTION_PAGE_NODE_FULL_NAME		= self::i_PAGES_NODE_FULL_NAME. '/access_restriction_page';
	public const i_ACCESS_PROHIBITION_PAGE_NODE_FULL_NAME		= self::i_PAGES_NODE_FULL_NAME. '/access_prohibition_page';
	public const i_DEBUG_PAGE_NODE_FULL_NAME					= self::i_PAGES_NODE_FULL_NAME. '/debug_page';
	public const i_ERROR_403_PAGE_NODE_FULL_NAME				= self::i_PAGES_NODE_FULL_NAME. '/error_403_page';
	public const i_ERROR_404_PAGE_NODE_FULL_NAME				= self::i_PAGES_NODE_FULL_NAME. '/error_404_page';
	public const i_MAIN_PAGE_NODE_FULL_NAME						= self::i_PAGES_NODE_FULL_NAME. '/main_page';
	public const i_USER_REGISTRATION_PAGE_NODE_FULL_NAME		= self::i_PAGES_NODE_FULL_NAME. '/user_registration_page';
	public const i_SUPPORT_PAGE_NODE_FULL_NAME					= self::i_PAGES_NODE_FULL_NAME. '/support_page';
	public const i_PAYMENT_PAGE_NODE_FULL_NAME					= self::i_PAGES_NODE_FULL_NAME. '/payment_page';


	//...PAGES

	//FORMS...
	public const i_FORMS_NODE_FULL_NAME							= self::i_ROOT_NODE_FULL_NAME. '/forms';
	public const i_PAYMENT_FORM_NODE_FULL_NAME					= self::i_FORMS_NODE_FULL_NAME. '/payment_form';
	public const i_SUPPORT_FORM_NODE_FULL_NAME					= self::i_FORMS_NODE_FULL_NAME. '/support_form';
	public const i_USER_REGISTRATION_FORM_NODE_FULL_NAME		= self::i_FORMS_NODE_FULL_NAME. '/user_registration_form';
	public const i_USER_MESSAGE_ADDITING_FORM_NODE_FULL_NAME	= self::i_FORMS_NODE_FULL_NAME. '/user_message_additing_form';
	//...FORMS

	//INFOS...
	public const i_INFOS_NODE_FULL_NAME							= self::i_ROOT_NODE_FULL_NAME. '/infos';
	public const i_ACCESS_ERROR_TEXT_INFO_NODE_FULL_NAME		= self::i_INFOS_NODE_FULL_NAME. '/access_error_text_info';
	public const i_ACCESS_REQUIREMENT_TEXT_INFO_NODE_FULL_NAME	= self::i_INFOS_NODE_FULL_NAME. '/access_requirement_text_info';
	public const i_ACCESS_RESTRICTION_TEXT_INFO_NODE_FULL_NAME	= self::i_INFOS_NODE_FULL_NAME. '/access_restriction_text_info';
	public const i_ACCESS_PROHIBITION_TEXT_INFO_NODE_FULL_NAME	= self::i_INFOS_NODE_FULL_NAME. '/access_prohibition_text_info';
	public const i_ERROR_403_TEXT_INFO_NODE_FULL_NAME			= self::i_INFOS_NODE_FULL_NAME. '/error_403_text_info';
	public const i_ERROR_404_TEXT_INFO_NODE_FULL_NAME			= self::i_INFOS_NODE_FULL_NAME. '/error_404_text_info';
	public const i_SITE_CAPTION_INFO_NODE_FULL_NAME				= self::i_INFOS_NODE_FULL_NAME. '/site_caption_info';
	public const i_SITE_COPYRIGHT_INFO_NODE_FULL_NAME			= self::i_INFOS_NODE_FULL_NAME. '/site_copyright_info';
	public const i_SITE_DESCRIPTION_INFO_NODE_FULL_NAME			= self::i_INFOS_NODE_FULL_NAME. '/site_description_info';
	public const i_SITE_DONATION_INFO_NODE_FULL_NAME			= self::i_INFOS_NODE_FULL_NAME. '/site_donation_info';
	public const i_SITE_DONATION_STATS_INFO_NODE_FULL_NAME		= self::i_INFOS_NODE_FULL_NAME. '/site_donation_stats_info';
	//...INFOS
}


?>