<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CFilesConst
{
	public const i_ROOT_DIRECTORY_NAME					= './';
	public const i_FILE_PATH_SEPARATOR					= '/';

	/****************************************************
	 * XMLS RESOURCES
	 */
	public const i_XML_SITEMAP_RESOURCES_DIRECTORY_NAME		= './';

	public const i_XML_SITEMAPS_FILE_NAME					= 'sitemaps.xml';
	public const i_XML_SITEMAP_FILE_NAME					= 'sitemap.xml';

	/****************************************************
	 * IMAGES RESOURCES
	 */
	public const i_ROOT_INTERNALS_IMAGES_RESOURCES_DIRECTORY_NAME				= '/resources/internals/images/';
	public const i_ROOT_INTERNALS_CLOSE_ICONS_IMAGES_RESOURCES_DIRECTORY_NAME	= '/resources/internals/images/common/_joints/icons/';

	public const i_IMAGE_FAVICON_FILE_NAME				= 'favicon.ico';

	public const i_IMAGE_CLOSE_ICONS_FILE_NAME			= 'close.gif';

	/****************************************************
	 * TEXTS RESOURCES
	 */
	public const i_ROOT_INTERNALS_TEXTS_RESOURCES_DIRECTORY_NAME	= '/resources/internals/texts/';

	/****************************************************
	 * TRANSLATIONS RESOURCES
	 */
	public const i_ROOT_INTERNALS_TRANSLATIONS_RESOURCES_DIRECTORY_NAME		= './resources/internals/translations/';

	/****************************************************
	 * IMAGES RESOLUTIONS
	 */
	public const i_IMAGE_MAX_RESOLUTION					= 1024;

	/****************************************************
	 * FILES SIZES
	 */
	public const i_IMAGE_MAX_FILE_SIZE					= 524288;	//500 Kb

	/****************************************************
	 * LIFE TIMES
	 */
	public const i_LIFE_TIME_NONE						= CDateTimeTools::i_TIME_UNIT_VALUE_NONE;
	public const i_LIFE_TIME_HALF_HOUR					= CDateTimeTools::i_TIME_UNIT_VALUE_HALF_HOURS;
	public const i_LIFE_TIME_ONE_HOUR					= CDateTimeTools::i_TIME_UNIT_VALUE_ONE_HOUR;
	public const i_LIFE_TIME_THREE_HOURS				= CDateTimeTools::i_TIME_UNIT_VALUE_THREE_HOURS;
	public const i_LIFE_TIME_TWELFTH_HOURS				= CDateTimeTools::i_TIME_UNIT_VALUE_TWELFTH_HOURS;
	public const i_LIFE_TIME_ONE_DAY					= CDateTimeTools::i_TIME_UNIT_VALUE_ONE_DAY;
	public const i_LIFE_TIME_THREE_DAYS					= CDateTimeTools::i_TIME_UNIT_VALUE_THREE_DAYS;
	public const i_LIFE_TIME_ONE_WEEK					= CDateTimeTools::i_TIME_UNIT_VALUE_ONE_WEEK;
	public const i_LIFE_TIME_TWO_WEEKS					= CDateTimeTools::i_TIME_UNIT_VALUE_TWO_WEEKS;
	public const i_LIFE_TIME_ONE_MONTH					= CDateTimeTools::i_TIME_UNIT_VALUE_ONE_MONTH;
	public const i_LIFE_TIME_THREE_MONTHS				= CDateTimeTools::i_TIME_UNIT_VALUE_THREE_MONTHS;
	public const i_LIFE_TIME_SIX_MONTHS					= CDateTimeTools::i_TIME_UNIT_VALUE_SIX_MONTHS;
	public const i_LIFE_TIME_ONE_YEAR					= CDateTimeTools::i_TIME_UNIT_VALUE_ONE_YEAR;

	public const i_LIFE_TIME_COOKIE_DEFAULT				= CFilesConst::i_LIFE_TIME_ONE_MONTH;
	public const i_LIFE_TIME_SESSION_DEFAULT			= CFilesConst::i_LIFE_TIME_ONE_MONTH;
}


?>