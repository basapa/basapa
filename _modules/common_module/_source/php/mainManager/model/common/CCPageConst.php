<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCPageConst
{
	//JS PHP AGREEMENTS...
	public const i_PAGE_ID_ACCESS_ERROR						= 'access_error';
	public const i_PAGE_ID_ACCESS_PROHIBITION				= 'access_prohibition';
	public const i_PAGE_ID_ACCESS_REQUIREMENT				= 'access_requirement';
	public const i_PAGE_ID_ACCESS_RESTRICTION				= 'access_restriction';
	public const i_PAGE_ID_DEBUG							= 'debug';
	public const i_PAGE_ID_ERROR_403						= 'error_403';
	public const i_PAGE_ID_ERROR_404						= 'error_404';
	public const i_PAGE_ID_MAIN								= 'main';
	public const i_PAGE_ID_PAYMENT							= 'payment';
	public const i_PAGE_ID_SUPPORT							= 'support';
	public const i_PAGE_ID_UNKNOWN_ERROR					= 'unknown_error';
	public const i_PAGE_ID_USER_AUTHORIZATION				= 'user_authorization';
	public const i_PAGE_ID_USER_REGISTRATION				= 'user_registration';
	public const i_PAGE_ID_EXTERNAL_REDIRECT				= 'external_redirect';
	public const i_PAGE_ID_ADMINISTRATION					= 'administration';
	//...JS PHP AGREEMENTS

	public const i_PAGE_ID_DEFAULT							= CCPageConst::i_PAGE_ID_MAIN;
}


?>