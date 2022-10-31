<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBFileConst extends CCFileConst
{
	/****************************************************
	 * XMLS RESOURCES
	 */
	public const i_XML_SITEMAP_FILE_NAME				= '_JOB_sitemap.xml';

	/****************************************************
	 * IMAGES RESOURCES
	 */
	public const i_EXTERNALS_IMAGES_FULL_DIRECTORY_NAME	= './resources/externals/images/custom/JOB';
	public const i_INTERNALS_IMAGES_FULL_DIRECTORY_NAME	= './resources/internals/images/custom/JOB';

	public const i_SITE_LOGO_DIRECTORY_NAME				= 'site_logo';
	public const i_ICONS_DIRECTORY_NAME					= 'icons';

	public const i_IMAGE_LOGO_80x80_FILE_NAME			= '_logo80x80.jpg';
	public const i_IMAGE_LOGO_160x160_FILE_NAME			= '_logo160x160.jpg';
	public const i_IMAGE_FILE_NAME_LOCATION_ICON		= 'location.png';
	public const i_IMAGE_FILE_NAME_TIME_ICON			= 'time.png';


	/****************************************************
	 * TRANSLATIONS RESOURCES
	 */
	public const i_INTERNALS_TRANSLATIONS_DIRECTORY_NAME		= './resources/internals/translations/custom/JOB/#LANG_ID#';
	//public const i_INTERNALS_TRANSLATIONS_TXT_DIRECTORY_NAME	= self::i_INTERNALS_TRANSLATIONS_DIRECTORY_NAME. '/texts';
	public const i_TRANSLATIONS_XML_FILE_NAME					= '_translations.xml';

	//public const i_PRIVACY_TXT_FULL_FILE_NAME					= self::i_INTERNALS_TRANSLATIONS_TXT_DIRECTORY_NAME. '/_privacy.txt';


	/***************************************************
	 * INTERFACE
	 */

	public static function i_getJOBSiteLogoFullFileName(string $aFileNameWithoutExtention_str):string
	{
		return CJOBFileConst::i_INTERNALS_IMAGES_FULL_DIRECTORY_NAME. '/' .CJOBFileConst::i_SITE_LOGO_DIRECTORY_NAME. '/' .$aFileNameWithoutExtention_str. '.png';
	}

	public static function i_getJOBIconFullFileName(string $aFileName_str):string
	{
		return CJOBFileConst::i_INTERNALS_IMAGES_FULL_DIRECTORY_NAME. '/' .CJOBFileConst::i_ICONS_DIRECTORY_NAME. '/' .$aFileName_str;
	}

	/*public static function i_getJOBPreviewImageFullFileName(string $aJOBCategoryStringId_str, string $aubcategoryStringId_str, string $aTableFieldJOBFileName_str):string
	{
		$lContentFullDirectoryName_str = CJOBFileConst::i_EXTERNALS_IMAGES_FULL_DIRECTORY_NAME. '/' .CJOBFileConst::i_CONTENT_DIRECTORY_NAME;
		$lJOBImageFullFileName_str = $lContentFullDirectoryName_str. '/_preview/' .$aJOBCategoryStringId_str;
		if (!CVariableTools::i_isStringEmpty($aubcategoryStringId_str))
		{
			$lJOBImageFullFileName_str .= '/' .$aubcategoryStringId_str;
		}

		$lJOBImageFullFileName_str .= '/' .$aTableFieldJOBFileName_str;

		return $lJOBImageFullFileName_str;
	}*/

	/*
	 * INTERFACE
	 ***************************************************/
}


?>