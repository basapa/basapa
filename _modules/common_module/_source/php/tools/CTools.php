<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CTools
{
	//public const i_WORD_COMPLETION_TYPE_AS_ONE			= 0;
	//public const i_WORD_COMPLETION_TYPE_AS_TWO			= 1;
	//public const i_WORD_COMPLETION_TYPE_AS_FIVE			= 2;

	/*public const i_REPLACING_PATTERN_LANG_ID				= '#LANG_ID#';
	public const i_REPLACING_PATTERN_SITE_FULL_NAME		= '#SITE_FULL_NAME#';
	public const i_REPLACING_PATTERN_EMAIL				= '#EMAIL#';
	public const i_REPLACING_PATTERN_MIN_CHARS_COUNT		= '#MIN_CHARS_COUNT#';
	public const i_REPLACING_PATTERN_MAX_CHARS_COUNT		= '#MAX_CHARS_COUNT#';
	public const i_REPLACING_PATTERN_NAME					= '#NAME#';*/
/*
	static private $_fCharsSet_str_arr					= [	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z',
															'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z',
															'1','2','3','4','5','6','7','8','9','0'];

	/***************************************************
	 * INTERFACE
	 */
	
	/*static public function i_generateRandomStringValue($aOptCharsCount_int = 6)
	{
		$lCharsSet_str_arr = self::$_fCharsSet_str_arr;

		$lValue_str = '';

		$lCount_int = count($lCharsSet_str_arr);
		for ($i = 0; $i < $aOptCharsCount_int; $i++)
		{
			$lIndex_int = rand(0, $lCount_int - 1);
			$lValue_str .= $lCharsSet_str_arr[$lIndex_int];
		}

		return $lValue_str;
	}

	static public function i_secureStringValue($aValue_str)
	{
		return sha1($aValue_str);
	}

	static public function i_generateUniqueHashString()
	{
		return self::i_secureStringValue(self::i_generateRandomStringValue() . CDateTimeTools::i_getCurrentUTimeInSec());
	}*/





	/*static public function i_generateResizingImages($aFileName_str, $aResolutions_int_arr)
	{
		$lResizingFilesParams_str_arr_arr = null;

		$lImageInfo_obj = getimagesize($aFileName_str);
		$lWidth_int = $lImageInfo_obj[0];
		$lHeight_int = $lImageInfo_obj[1];
		$lType_int = $lImageInfo_obj[2];

		foreach ($aResolutions_int_arr as $lResolution_int)
		{
			if (($lWidth_int > $lResolution_int) || ($lHeight_int > $lResolution_int))
			{
				$lSize_int_arr = CTools::i_getScaledImageWidthAndHeight($lWidth_int, $lHeight_int, $lResolution_int);

				$lFileParts_str_arr = explode(".", $aFileName_str);
				$lNewFileName_str = $lFileParts_str_arr[0]. '_' .$lResolution_int. '.' .$lFileParts_str_arr[1];

				switch ($lType_int)
				{
					case IMAGETYPE_GIF:
					{
						$lImage_obj = new Imagick($aFileName_str);
						$lImage_obj = $lImage_obj->coalesceImages();

						do
						{
							$lImage_obj->resizeImage($lSize_int_arr[0], $lSize_int_arr[1], Imagick::FILTER_BOX, 1);
						} while ($lImage_obj->nextImage());

						$lImage_obj = $lImage_obj->deconstructImages();
						$lImage_obj->writeImages($lNewFileName_str, true);
						$lImage_obj->clear();
						$lImage_obj->destroy();
					}break;


					case IMAGETYPE_JPEG:
					case IMAGETYPE_JPEG2000:
					{
						$lImage_obj = imagecreatetruecolor($lSize_int_arr[0], $lSize_int_arr[1]);

						imagecopyresampled($lImage_obj, imagecreatefromjpeg($aFileName_str), 0, 0, 0, 0, $lSize_int_arr[0], $lSize_int_arr[1], $lWidth_int, $lHeight_int);
						imagejpeg($lImage_obj, $lNewFileName_str, 100);
						imagedestroy($lImage_obj);
					}break;


					case IMAGETYPE_PNG:
					{
						$lImage_obj = imagecreatetruecolor($lSize_int_arr[0], $lSize_int_arr[1]);

						imagecopyresampled($lImage_obj, imagecreatefrompng($aFileName_str), 0, 0, 0, 0, $lSize_int_arr[0], $lSize_int_arr[1], $lWidth_int, $lHeight_int);
						imagepng($lImage_obj, $lNewFileName_str);
						imagedestroy($lImage_obj);
					}break;


					default:
					break;
				}

				$lResizingFilesParams_str_arr_arr[] = array($lNewFileName_str, $lSize_int_arr[0], $lSize_int_arr[1]);
			}
		}

		return !isset($lResizingFilesParams_str_arr_arr) ? array(array($aFileName_str, $lWidth_int, $lHeight_int)) : $lResizingFilesParams_str_arr_arr;
	}*/

	/*static public function i_getScaledImageWidthAndHeight($aOriginalWidth_int, $aOriginalHeight_int, $aMaxWidthOrHeight_int)
	{
		if ($aOriginalWidth_int != $aOriginalHeight_int)
		{
			if ($aOriginalWidth_int > $aOriginalHeight_int)
			{
				$lRatio_num = $aOriginalWidth_int / $aOriginalHeight_int;

				return $aOriginalWidth_int >= $aMaxWidthOrHeight_int ? array($aMaxWidthOrHeight_int, round($aMaxWidthOrHeight_int / $lRatio_num)) : array($aOriginalWidth_int, $aOriginalHeight_int);
			}
			else
			{
				$lRatio_num = $aOriginalHeight_int / $aOriginalWidth_int;

				return $aOriginalHeight_int >= $aMaxWidthOrHeight_int ? array(round($aMaxWidthOrHeight_int / $lRatio_num), $aMaxWidthOrHeight_int) : array($aOriginalWidth_int, $aOriginalHeight_int);
			}
		}

		return $aOriginalWidth_int >= $aMaxWidthOrHeight_int ? array($aMaxWidthOrHeight_int, $aMaxWidthOrHeight_int) : array($aOriginalWidth_int, $aOriginalHeight_int);
	}*/

	/*static public function i_sendMail($aToEmail_str, $aFromEmail_str, $aTitle_str, $aBody_str)
	{
		$lHeaders_str = 'MIME-Version: 1.0' ."\n". 'Content-type: text/HTML; charset=utf-8' ."\n". 'From: ' .SITE_NAME. '<' .$aFromEmail_str. '>' . "\n";

		$lTitle_str = '=?utf-8?B?' .base64_encode($aTitle_str). '?=';

		return mail($aToEmail_str, $lTitle_str, $aBody_str, $lHeaders_str);
	}*/
	
	/*static public function i_getStringByWordCompletionType($aStrings_str_arr, $aWordCompletionType_int, $aOptValue_int = 0)
	{
		$l_str = $aStrings_str_arr[$aWordCompletionType_int];
	
		if ($aOptValue_int != 0)
		{
			$l_str = CTools::i_replace($l_str, $aOptValue_int, "#VALUE#");
		}
		
		return $l_str;
	}*/

	/*static public function i_getWordCompletionType($aValue_int)
	{
		switch($aValue_int)
		{
			case 1:
			case 21:
			case 31:
			case 41:
			case 51:
			case 61:
			case 71:
			case 81:
			case 91:
			{
				return CTools::i_WORD_COMPLETION_TYPE_AS_ONE;
			}break;
			
			
			case 2:
			case 3:
			case 4:
			case 22:
			case 23:
			case 24:
			case 32:
			case 33:
			case 34:
			case 42:
			case 43:
			case 44:
			case 52:
			case 53:
			case 54:
			case 62:
			case 63:
			case 64:
			case 72:
			case 73:
			case 74:
			case 82:
			case 83:
			case 84:
			case 92:
			case 93:
			case 94:
			{
				return CTools::i_WORD_COMPLETION_TYPE_AS_TWO;
			}break;
			
			
			default:
				return CTools::i_WORD_COMPLETION_TYPE_AS_FIVE;
			break;
		}
	}*/

	/*static public function i_removeData(&$aData)
	{
		$aData = null;
	
		//unset($aData);
	}*/

	/*static public function i_calcAge($aTime_int, $aDay_int, $aMonth_int, $aYear_int)
	{
		list($lDay_int, $lMonth_int, $lYear_int) = explode(':', date('d:m:Y', $aTime_int));

		if (
				($lMonth_int > $aMonth_int)
				||
				(
					$lMonth_int == $aMonth_int
					&& $lDay_int > $aDay_int
				)
			)
		{
			return $aYear_int - $lYear_int - 1;
		}

		return $aYear_int - $lYear_int;
	}*/
	
	/*static public function i_convertToCharCodes($aValue_str)
	{
		$l_str = '';
		$lLen_int = mb_strlen($aValue_str, 'utf-8');
		for ($i = 0; $i < $lLen_int; $i++)
		{
			$l_str .= '&#' .ord($aValue_str{$i}). ';';
		}
		return $l_str;
	}*/

	/*static public function i_getValueById($aData, $aId, $aTypeOfReturnValue)
	{
		//----return isset($aData[$aId]) ? $aData[$aId][$aTypeOfReturnValue] : false;
	}*/

	/*static public function i_getValueFromData($aData, $aValue, $aTypeOfReturnValue, $aTypeOfValue = CDatabaseConst::i_COMMON_TABLE_ID)
	{
		foreach ($aData as $_data)
		{
			if ($_data[$aTypeOfValue] == $aValue)
			{
				return $_data[$aTypeOfReturnValue];
			}
		}

		return false;//----
	}*/

	/*static public function i_getValuesFromData($aData, $aTypeOfReturnValues)
	{
		$_values = null;
		
		foreach ($aData as $_data)
		{
			$_values[] = $_data[$aTypeOfReturnValues];
		}

		return $_values;//----
	}*/

	/*static public function i_setValueInData()
	{
		foreach ($aData as &$_data)
		{
			if ($_data[$aName] == $aValue)
			{
				$_data[$aSetName] = $aSetValue; 
				
				return true;
			}
		}
		
		return false;//----
	}*/
	
	/*static public function i_getElementsFromData($aDatas_arr, $aName_str, $aValue_str, $aGetName_str = CComponentParam::i_ELEMENT_PARAM_NAME, $aGetValue_str = CComponentParam::i_ELEMENT_PARAM_VALUE)
	{
		$lElements_arr = null;
		
		if (!$aDatas_arr)
		{
			return $lElements_arr;
		}
		
		foreach ($aDatas_arr as $lData_arr)
		{
			$lElements_arr[] 	= array($aGetName_str	=> $lData_arr[$aName_str],
										$aGetValue_str	=> $lData_arr[$aValue_str]);
		}
		
		return $lElements_arr;
	}*/

	/*static public function i_getItemsFromComponentData($aComponentData_arr, $aSelectedItemId_str)
	{
		$lItems_arr_arr = null;
		
		$lCount_int = count($aComponentData_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lComponentItemData_arr = $aComponentData_arr[$i];
		
			if (isset($lComponentItemData_arr[CItemParam::i_IS_VISIBLE])
				&& $lComponentItemData_arr[CItemParam::i_IS_VISIBLE] == false)
			{
				continue;
			}

			$lItem_arr = $lComponentItemData_arr;
			
			if (isset($lComponentItemData_arr[CItemParam::i_ID])
				&& $lComponentItemData_arr[CItemParam::i_ID] == $aSelectedItemId_str)
			{
				$lItem_arr[CItemParam::i_STATE] = CItemParam::i_STATE_SELECTED;
			}
			else
			{
				$lItem_arr[CItemParam::i_STATE] = CItemParam::i_STATE_ENABLED;
			}
			
			$lItems_arr_arr[] = $lItem_arr;
		}

		return $lItems_arr_arr;
	}*/

	/*static public function i_updateComponentElement($aComponentData_arr, $aElementParam_str, $aValue_obj, $aNewValue_obj)
	{
		$lElements_arr = null;

		if (!$aComponentData_arr)
		{
			return $lElements_arr;
		}

		foreach ($aComponentData_arr as $lData_obj)
		{
			if ($lData_obj[$aElementParam_str] == $aValue_obj)
			{
				$lData_obj[$aElementParam_str] = $aNewValue_obj;
			}

			$lElements_arr[] = $lData_obj;
		}

		return $lElements_arr;
	}*/

	/*static public function i_convertStringRuToEn($aString_str)
	{
		$lChars_str_arr = array('а'=>'a',	'б'=>'b',	'в'=>'v',	'г'=>'g',	'д'=>'d',
								'е'=>'e',	'ё'=>'e',	'ж'=>'zh',	'з'=>'z',	'и'=>'i',
								'й'=>'y',	'к'=>'k',	'л'=>'l',	'м'=>'m',	'н'=>'n',
								'о'=>'o',	'п'=>'p',	'р'=>'r',	'с'=>'s',	'т'=>'t',
								'у'=>'u',	'ф'=>'f',	'х'=>'h',	'ц'=>'ts',	'ч'=>'ch',
								'ш'=>'sh',	'щ'=>'sch',	'ь'=>'',	'ы'=>'y',	'ъ'=>'',
								'э'=>'e',	'ю'=>'yu',	'я'=>'ya',	' '=>'-',	'#'=>'',
								'*'=>'',	'('=>'',	')'=>'',	'?'=>'',	'_'=>'-',
								'+'=>'',	'='=>'',	'.'=>'',	','=>'',	';'=>'',
								':'=>'',	'"'=>'',	'\''=>'',	'№'=>'',	'%'=>'',
								'!'=>'',	'@'=>'',	'&'=>'',	'['=>'',	']'=>'',
								'$'=>'',	'\\'=>'-',	'/'=>'-');

		$l_str = mb_strtolower(HTMLspecialchars_decode($aString_str), 'utf-8');

		return str_replace(array_keys($lChars_str_arr), array_values($lChars_str_arr), $l_str);
	}*/



	/*static public function i_secureEmail($aValue_str)
	{
		return CTools::i_convertToCharCodes($aValue_str);
	}*/

	/*static public function i_getSubstr($aText_str, $aMaxLength_int)
	{
		$lLength_int = mb_strlen($aText_str, 'utf-8');
		if ($lLength_int > $aMaxLength_int)
		{
			return mb_substr($aText_str, 0, $aMaxLength_int, 'utf8'). '...';
		}
		return $aText_str;
	}*/

	/*static public function trim($aText_str, $aOptTrimPattern_str = '(^\s+)|(\s+$)/us')
	{
		return mb_ereg_replace($aOptTrimPattern_str, '', $aText_str);
	}*/

	/*static public function i_sortMultiArrayByName($aArray1_arr, $aArray2_arr)
	{
		//return CTools::_sortMultiArrayByValue($aArray1_arr, $aArray2_arr, CDatabaseConst::COMMON_TABLE_NAME);
	}

	static public function i_sortMultiArrayByReleased($aArray1_arr, $aArray2_arr)
	{
	//	return CTools::_sortMultiArrayByValue($aArray1_arr, $aArray2_arr, CDatabaseConst::COMMON_TABLE_RELEASE_TIME, true);
	}*/
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*static private function _sortMultiArrayByValue($aArray1_arr, $aArray2_arr, $aTypeOfValue_str, $aSortByDesc_bl = false)
	{
	    return CTools::_stringCompare($aArray1_arr[$aTypeOfValue_str], $aArray2_arr[$aTypeOfValue_str], $aSortByDesc_bl);
	}
	

	static private function _stringCompare($aString1_str, $aString2_str, $aSortByDesc_bl)
	{
		if ($aSortByDesc_bl)
		{
			return ($aString1_str == $aString2_str ? 0 : ($aString1_str > $aString2_str ? -1 : 1));
		}
		
		return ($aString1_str == $aString2_str ? 0 : ($aString1_str > $aString2_str ? 1 : -1));
	}
	

	static private function _numberCompare($aNumber1_int, $aNumber2_int, $aSortByDesc_bl)
	{
		return CTools::_stringCompare($aNumber1_int, $aNumber2_int, $aSortByDesc_bl);
	}*/
}


?>