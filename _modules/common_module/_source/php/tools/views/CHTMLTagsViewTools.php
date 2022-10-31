<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CHTMLTagsViewTools
{
	//HTML TAG IDS...
	public const i_HTML_TAG_ID_DIV						= 0;
	public const i_HTML_TAG_ID_FIELDSET					= 1;
	public const i_HTML_TAG_ID_SPAN						= 2;
	//...HTML TAG IDS
	
	//HTML TAG ATTR NAMES (do not modify)...
	public const i_HTML_TAG_ATTR_NAME_CLASS				= 'class';
	public const i_HTML_TAG_ATTR_NAME_ID				= 'id';
	public const i_HTML_TAG_ATTR_NAME_STYLE				= 'style';
	//...HTML TAG ATTR NAMES (do not modify)
	
	
	/***************************************************
	 * INTERFACE
	 */

	static public function i_drawHTMLTag(int $aHTMLTagId_int, bool $aAsOpenTag_bl, array $aOptHTMLTagAttrs_a_arr = null):void
	{
		echo self::_getHTMLTag($aHTMLTagId_int, $aAsOpenTag_bl, $aOptHTMLTagAttrs_a_arr);
	}
	
	static public function i_applyHTMLTagWrap(int $aHTMLTagId_int, string $aContent_str, array $aOptHTMLTagAttrs_a_arr = null):string
	{
		return self::_getHTMLTag($aHTMLTagId_int, true, $aOptHTMLTagAttrs_a_arr) . $aContent_str . self::_getHTMLTag($aHTMLTagId_int, false);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
	
	static private function _getHTMLTag(int $aHTMLTagId_int, bool $aAsOpenTag_bl, array $aOptHTMLTagAttrs_a_arr = null):string
	{
		if (
				!$aAsOpenTag_bl
				&& CArrayTools::i_isArrayDefined($aOptHTMLTagAttrs_a_arr)
			)
		{
			new CException('_getHTMLTag', 'ILE!');
		}

		$lHTMLOpenTagAttrs_str = '';
		
		if (isset($aOptHTMLTagAttrs_a_arr))
		{
			foreach ($aOptHTMLTagAttrs_a_arr as $aHTMLTagAttrName_str => $aHTMLTagAttrValue_var)
			{
				$lHTMLOpenTagAttrs_str .= ' ' .$aHTMLTagAttrName_str. '="' .$aHTMLTagAttrValue_var. '"';
			}
		}
		
		$lHTMLTag_str = '';
		
		switch ($aHTMLTagId_int)
		{
			case self::i_HTML_TAG_ID_DIV:
			{
				$lHTMLTag_str = $aAsOpenTag_bl ? '<div' .$lHTMLOpenTagAttrs_str. '>' : '</div>';
			}break;

			case self::i_HTML_TAG_ID_FIELDSET:
			{
				$lHTMLTag_str = $aAsOpenTag_bl ? '<fieldset' .$lHTMLOpenTagAttrs_str. '>' : '</fieldset>';
			}break;

			default:
				new CException('_getHTMLTag', 'Unsupported HTML tag id: ' .$aHTMLTagId_int);
			break;
		}
		
		return $lHTMLTag_str;
	}
}


?>