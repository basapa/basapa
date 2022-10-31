<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*abstract*/class CCRequestParamConst
{
	//JS PHP AGREEMENTS...
	public const i_POST_PARAM_ID_REQUEST				= 'request_id';

	public const i_GET_PARAM_ID_AJAX_REQUEST			= 'ajax_request_id';

	public const i_GET_PARAM_ID_SCHEDULE_REQUEST		= 'schedule_request_id';

	public const i_GET_PARAM_ID_SITE					= 'site_id';
	public const i_GET_PARAM_ID_PAGE					= 'page_id';
	public const i_GET_PARAM_ID_LANG					= 'lang_id';
	public const i_GET_PARAM_ID_LOCATION				= 'location_id';
	public const i_GET_PARAM_ID_OPT_CONTENT_ID			= 'content_id';
	public const i_GET_PARAM_ID_OPT_SUBPAGE				= 'subpage_id';
	public const i_GET_PARAM_ID_OPT_ACTION				= 'action_id';
	//public const i_GET_PARAM_ID_OPT_CATEGORY_ID			= 'category_id';
	//public const i_GET_PARAM_ID_OPT_SUBCATEGORY_ID		= 'subcategory_id';
	public const i_GET_PARAM_ID_OPT_CITY_STRING_ID		= 'city_string_id';
	public const i_GET_PARAM_ID_OPT_REGION_STRING_ID	= 'region_string_id';
	//public const i_GET_PARAM_ID_OPT_COUNTRY_NAME		= 'country_name';
	//public const i_GET_PARAM_ID_OPT_REGION_NAME			= 'region_name';
	public const i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX 	= 'content_page_index';
	public const i_GET_PARAM_ID_OPT_SEARCH_TEXT			= 'search_text';
	public const i_GET_PARAM_ID_OPT_ID					= 'id';

	public const i_GET_PARAM_ID_OPT_ID_SORTING				= 'id_sorting';
	public const i_GET_PARAM_ID_OPT_STATE_SORTING			= 'state';
	public const i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING	= 'addition_time';
	public const i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING	= 'updating_time';
	public const i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING	= 'expiring_time';

	//STATIC...
	public const i_GET_PARAM_INT_DEFAULT_VALUE			= '0';
	public const i_GET_PARAM_STRING_DEFAULT_VALUE		= '';

	/*virtual*/static public function i_GET_PARAMS_UNDEFINED_VALUES():array
	{
		//TODO: optimize required
		return [self::i_GET_PARAM_ID_OPT_SUBPAGE				=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_CONTENT_ID				=> self::i_GET_PARAM_INT_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_ID						=> self::i_GET_PARAM_INT_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_ACTION					=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				//self::i_GET_PARAM_ID_OPT_CATEGORY_ID			=> self::i_GET_PARAM_INT_DEFAULT_VALUE,
				//self::i_GET_PARAM_ID_OPT_SUBCATEGORY_ID		=> self::i_GET_PARAM_INT_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_CITY_STRING_ID			=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_REGION_STRING_ID		=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				//self::i_GET_PARAM_ID_OPT_REGION_NAME			=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_SEARCH_TEXT			=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX		=> self::i_GET_PARAM_INT_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_ID_SORTING				=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_STATE_SORTING			=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING	=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING	=> self::i_GET_PARAM_STRING_DEFAULT_VALUE,
				self::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING	=> self::i_GET_PARAM_STRING_DEFAULT_VALUE];
	}

	/*virtual*/static public function i_STATIC_GET_PARAMS():array
	{
		//TODO: optimize required
		return [self::i_GET_PARAM_ID_PAGE,
				self::i_GET_PARAM_ID_OPT_SUBPAGE,
				self::i_GET_PARAM_ID_OPT_CONTENT_ID,
				self::i_GET_PARAM_ID_OPT_ACTION,
				self::i_GET_PARAM_ID_OPT_CITY_STRING_ID,
				self::i_GET_PARAM_ID_OPT_REGION_STRING_ID];
	}

	/*virtual*/static public function i_DYNAMIC_GET_PARAMS():array
	{
		//TODO: optimize required
		return [self::i_GET_PARAM_ID_OPT_CONTENT_PAGE_INDEX,
				self::i_GET_PARAM_ID_OPT_SEARCH_TEXT,
				self::i_GET_PARAM_ID_OPT_ID,
				self::i_GET_PARAM_ID_OPT_ID_SORTING,
				self::i_GET_PARAM_ID_OPT_STATE_SORTING,
				self::i_GET_PARAM_ID_OPT_ADDITION_TIME_SORTING,
				self::i_GET_PARAM_ID_OPT_UPDATING_TIME_SORTING,
				self::i_GET_PARAM_ID_OPT_EXPIRING_TIME_SORTING];
	}
	//...STATIC
	//...JS PHP AGREEMENTS
}


?>