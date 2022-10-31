<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCFileConst
{
	/****************************************************
	 * IMAGES RESOURCES
	 */
	public const i_TEMP_IMAGES_DIRECTORY_NAME			= './resources/temp/images';
	public const i_INTERNALS_IMAGES_DIRECTORY_NAME		= './resources/internals/images/common';

	public const i_IMAGE_LOGO_80x80_FILE_NAME			= '_logo80x80.jpg';
	public const i_IMAGE_LOGO_160x160_FILE_NAME			= '_logo160x160.jpg';


	/****************************************************
	 * TEXTS RESOURCES
	 */
	public const i_INTERNALS_TEXTS_DIRECTORY_NAME		= './resources/internals/texts/common';


	/****************************************************
	 * TRANSLATIONS RESOURCES
	 */
	public const i_INTERNALS_TRANSLATIONS_DIRECTORY_NAME				= './resources/internals/translations/common/#LANG_ID#';
	public const i_TRANSLATIONS_XML_FILE_NAME							= '_translations.xml';

	public const i_INTERNALS_TRANSLATIONS_TEXTS_DIRECTORY_NAME			= './resources/internals/translations/common/#LANG_ID#/texts';
	public const i_INTERNALS_TRANSLATIONS_ERRORS_TEXTS_DIRECTORY_NAME	= './resources/internals/translations/common/#LANG_ID#/texts/errors';
	public const i_INTERNALS_TRANSLATIONS_ACCESSES_TEXTS_DIRECTORY_NAME	= './resources/internals/translations/common/#LANG_ID#/texts/accesses';

	public const i_ACCESS_REQUIREMENT_TEXT_FILE_NAME		= '_access_requirement.txt';
	public const i_ACCESS_RESTRICTION_TEXT_FILE_NAME		= '_access_restriction.txt';
	public const i_ACCESS_ERROR_TEXT_FILE_NAME				= '_access_error.txt';
	public const i_ACCESS_PROHIBITION_TEXT_FILE_NAME		= '_access_prohibition.txt';

	public const i_ERROR_403_TEXT_FILE_NAME					= '_error_403.txt';
	public const i_ERROR_404_TEXT_FILE_NAME					= '_error_404.txt';
	
	static public $i_TEXTS_FILES_NAMES					= [	CCFileConst::i_ACCESS_REQUIREMENT_TEXT_FILE_NAME,
															CCFileConst::i_ACCESS_RESTRICTION_TEXT_FILE_NAME,
															CCFileConst::i_ACCESS_ERROR_TEXT_FILE_NAME,
															CCFileConst::i_ACCESS_PROHIBITION_TEXT_FILE_NAME,
															CCFileConst::i_ERROR_403_TEXT_FILE_NAME,
															CCFileConst::i_ERROR_404_TEXT_FILE_NAME];


	/****************************************************
	 * BANNERS RESOURCES
	 */
	public const i_INTERNALS_BANNER_DIRECTORY_RED		= '/resources/internals/images/common/banners/red';

	public const i_BANNER_120X600						= '_120x600.gif';
	public const i_BANNER_160X600						= '_160x600.gif';
	public const i_BANNER_250X250						= '_250x250.gif';
	public const i_BANNER_300X250						= '_300x250.gif';
	public const i_BANNER_468X60						= '_468x60.gif';
	public const i_BANNER_728X90						= '_728x90.gif';
}


?>