<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CStringTools
{
	//REPLACING_PATTERNS (do not modify)...
	public const i_REPLACING_PATTERN_LANG_ID			= '#LANG_ID#';
	public const i_REPLACING_PATTERN_SITE_FULL_NAME		= '#SITE_FULL_NAME#';
	public const i_REPLACING_PATTERN_EMAIL				= '#EMAIL#';
	public const i_REPLACING_PATTERN_MIN_CHARS_COUNT	= '#MIN_CHARS_COUNT#';
	public const i_REPLACING_PATTERN_MAX_CHARS_COUNT	= '#MAX_CHARS_COUNT#';
	public const i_REPLACING_PATTERN_NAME				= '#NAME#';
	public const i_REPLACING_PATTERN_VALUE				= '#VALUE#';
	//...REPLACING_PATTERNS (do not modify)

	//ENCODING (do not modify)...
	public const i_ENCODING_ID_ASCII					= 'ASCII';
	public const i_ENCODING_ID_UTF8						= 'UTF-8';
	//...ENCODING (do not modify)

	static private $_fCharsSet_str_arr					= [	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z',
															'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z',
															'1','2','3','4','5','6','7','8','9','0'];


	/***************************************************
	 * INTERFACE
	 */

	static public function i_generateRandomStringValue(int $aOptCharsCount_int = 6):string
	{
		$lCharsSet_str_arr = self::$_fCharsSet_str_arr;

		$lValue_str = '';

		$lCount_int = CArrayTools::i_count($lCharsSet_str_arr);
		for ($i = 0; $i < $aOptCharsCount_int; $i++)
		{
			$lIndex_int = rand(0, $lCount_int - 1);
			$lValue_str .= $lCharsSet_str_arr[$lIndex_int];
		}

		return $lValue_str;
	}

	static public function i_generateUniqueStringId(string $aOptPrefix_str = ''):string
	{
		return CEncryptionTools::i_encryptValue($aOptPrefix_str . self::i_generateRandomStringValue() . CDateTimeTools::i_getCurrentUTimeInMSec());
	}

	static public function i_replace(string $a_str, string $aNew_str, string $aOld_str):string
	{
		return str_replace($aOld_str, $aNew_str, $a_str);
	}

	static public function i_replaceArr(array $a_str_arr, array $aNew_str_arr, array $aOld_str_arr):array
	{
		return str_replace($aOld_str_arr, $aNew_str_arr, $a_str_arr);
	}

	static public function i_replaceRegEx(string $a_str, string $aPattern_str, string $aNew_str, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null):?string
	{
		$l_var = preg_replace($aPattern_str, $aNew_str, $a_str);
		if ($l_var === null)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('i_replaceRegEx', 'Failed: ' .$a_str);
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}

	static public function i_replaceRegExArr(array $a_str_arr, array $aPattern_str_arr, array $aNew_str_arr, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null):array
	{
		$l_var = preg_replace($aPattern_str_arr, $aNew_str_arr, $a_str_arr);
		if ($l_var === null)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('i_replaceRegExArr', 'Failed: ' .CArrayTools::i_toString($a_str_arr));
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}

	static public function i_compare(string $a1_str, string $a2_str):int
	{
		return strcmp($a1_str, $a2_str);
	}
	
	static public function i_length(string $a_str, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null):?int
	{
		$l_var = mb_strlen($a_str);
		if ($l_var === false)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('i_length', 'Failed: ' .$a_str);
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}
	
	static public function i_cut(string $a_str, int $aIndex_int, int $aLength_int):string
	{
		return mb_substr($a_str, $aIndex_int, $aLength_int);
	}
	
	static public function i_split(string $a_str, string $aSeparator_str):array
	{
		return explode($aSeparator_str, $a_str);
	}

	static public function i_splitRegEx(string $a_str, string $aPattern_str):array
	{
		return mb_split($aPattern_str, $a_str);
	}

	static public function i_search(string $a_str, string $aSearch_str):bool
	{
		return CVariableTools::i_toBoolean(mb_strstr($a_str, $aSearch_str));
	}

	static public function i_searchRegEx(string $a_str, string $aPattern_str, array &$aOptRet_str_arr = null):bool
	{
		return CVariableTools::i_toBoolean(preg_match($aPattern_str, $a_str, $aOptRet_str_arr));
	}

	static public function i_convertAllCharsToHTMLSymbols(string $a_str):string
	{
		return htmlentities($a_str, ENT_COMPAT | ENT_HTML401, CMainConst::i_DEFAULT_ENCODING_TYPE);
	}
	
	static public function i_convertAllHTMLSymbolsToChars(string $a_str):string
	{
		return html_entity_decode($a_str, ENT_COMPAT | ENT_HTML401, CMainConst::i_DEFAULT_ENCODING_TYPE);
	}
	
	static public function i_convertSpecialCharsToHTMLSymbols(string $a_str):string
	{
		return htmlspecialchars($a_str, ENT_COMPAT | ENT_HTML401, CMainConst::i_DEFAULT_ENCODING_TYPE);
	}
	
	static public function i_convertSpecialHTMLSymbolsToChars(string $a_str):string
	{
		return htmlspecialchars_decode($a_str, ENT_COMPAT | ENT_HTML401);
	}
	
	static public function i_toLowerCase(string $a_str):string
	{
		return mb_strtolower($a_str);
	}
	
	static public function i_toUpperCase(string $a_str):string
	{
		return mb_strtoupper($a_str);
	}
	
	static public function i_trim(string $a_str, string $aOptCharsList_str = " \t\n\r\0\x0B"):string
	{
		return trim($a_str, $aOptCharsList_str);
	}
	
	static public function i_applyCharsEscaping(string $a_str):string
	{
		return addslashes($a_str);
	}
	
	static public function i_removeCharsEscaping(string $a_str):string
	{
		return stripslashes($a_str);
	}

	//ENCODING...
	static public function i_detectEncoding(string $a_str):string
	{
		return mb_detect_encoding($a_str);
	}

	static public function i_checkEncoding(string $a_str, string $aEncodingId_str = self::i_ENCODING_ID_UTF8):bool
	{
		return mb_check_encoding($a_str, $aEncodingId_str);
	}

	static public function i_encodeTo(string $a_str, string $aEncodingId_str = self::i_ENCODING_ID_UTF8):string
	{
		return mb_convert_encoding($a_str, $aEncodingId_str, 'auto');
	}
	//...ENCODING

	/*
	 * INTERFACE
	 ***************************************************/
}


?>