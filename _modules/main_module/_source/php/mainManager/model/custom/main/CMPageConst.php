<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMPageConst extends CCPageConst
{
	const i_PAGE_ID_REGISTRATION								= 'registration';
	const i_PAGE_ID_AUTHORIZATION								= 'authorization';
	const i_PAGE_ID_SELECT_CITY								= 'select_city';
	const i_PAGE_ID_ACCESS_PROHIBITION						= 'access_prohibition';
	const i_PAGE_ID_ACCESS_RESTRICTION						= 'access_restriction';
	const i_PAGE_ID_ACCESS_REQUIREMENT						= 'access_requirement';
	const i_PAGE_ID_ACCESS_ERROR								= 'access_error';
	const i_PAGE_ID_ERROR_404									= 'error_404';
	const i_PAGE_ID_ERROR_403									= 'error_403';

	public static $i_AVAILABLE_PAGE_IDS						= array(CMPageConst::i_PAGE_ID_MAIN,
																	CMPageConst::i_PAGE_ID_REGISTRATION,
																	CMPageConst::i_PAGE_ID_AUTHORIZATION,
																	CMPageConst::i_PAGE_ID_SELECT_CITY,
																	CMPageConst::i_PAGE_ID_ACCESS_PROHIBITION,
																	CMPageConst::i_PAGE_ID_ACCESS_RESTRICTION,
																	CMPageConst::i_PAGE_ID_ACCESS_REQUIREMENT,
																	CMPageConst::i_PAGE_ID_ACCESS_ERROR,
																	CMPageConst::i_PAGE_ID_ERROR_404,
																	CMPageConst::i_PAGE_ID_ERROR_403);
}


?>