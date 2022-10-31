<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBRequestConst extends CCRequestConst
{
	//REQUESTS...
	public const i_REQUEST_ID_VACANCY_CONTENT_ADDITION			= self::__REQUESTS_COUNT;
	public const i_REQUEST_ID_VACANCY_CONTENT_QUICK_SEARCH		= self::__REQUESTS_COUNT + 1;
	public const i_REQUEST_ID_VACANCY_CONTENT_FILTERING			= self::__REQUESTS_COUNT + 2;
	public const i_REQUEST_ID_VACANCY_CONTENTS_ADMINISTRATION	= self::__REQUESTS_COUNT + 3;
	//...REQUESTS

	static public $i_SUPPORTED_REQUESTS					= [	self::i_REQUEST_ID_VACANCY_CONTENT_ADDITION,
															self::i_REQUEST_ID_VACANCY_CONTENT_QUICK_SEARCH,
															self::i_REQUEST_ID_VACANCY_CONTENT_FILTERING,
															self::i_REQUEST_ID_VACANCY_CONTENTS_ADMINISTRATION];
}


?>