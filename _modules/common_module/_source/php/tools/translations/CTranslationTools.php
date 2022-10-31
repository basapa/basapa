<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CTranslationTools
{
	//WORD ENDING TYPES...
	public const i_WORD_ENDING_TYPE_AS_ONE				= 0;
	public const i_WORD_ENDING_TYPE_AS_TWO				= 1;
	public const i_WORD_ENDING_TYPE_AS_FIVE				= 2;
	//...WORD ENDING TYPES


	/***************************************************
	 * INTERFACE
	 */

	//RU...
	static public function i_updateStringAccordingToWordEndingType(string $a_str, int $aWordEndingType_int):string
	{
		if (CMainManager::i_getInstance()->i_getMainData()->i_getGetParamLangId() !== CCLangConst::i_LANG_ID_RU)
		{
			new CException('i_updateStringAccordingToWordEndingType', 'ILE!');
		}

		if (empty($a_str))
		{
			new CException('i_updateStringAccordingToWordEndingType', 'Invalid arg value: ' .$a_str);
		}

		$l_str_arr = CStringTools::i_split($a_str, '__');

		if (CArrayTools::i_count($l_str_arr) !== 3)
		{
			new CException('i_updateStringAccordingToWordEndingType', 'Split string is incorrect: ' .$a_str);
		}

		return CStringTools::i_split($l_str_arr[1], '|')[$aWordEndingType_int];
	}

	static public function i_getWordEndingType(int $a_int):int
	{
		if ($a_int < 0)
		{
			new CException('i_getWordEndingType', 'Invalid arg value: ' .$a_int);
		}

		if (
				($a_int % 100 >= 11)
				&& ($a_int % 100 <= 19)
			)
		{
			$lWordEndingType_int = self::i_WORD_ENDING_TYPE_AS_FIVE;
		}
		else
		{
			switch ($a_int % 10)
			{
				case 1:
				{
					$lWordEndingType_int = self::i_WORD_ENDING_TYPE_AS_ONE;
				}break;

				case 2:
				case 3:
				case 4:
				{
					$lWordEndingType_int = self::i_WORD_ENDING_TYPE_AS_TWO;
				}break;

				default:
					$lWordEndingType_int = self::i_WORD_ENDING_TYPE_AS_FIVE;
				break;
			}
		}

		return $lWordEndingType_int;
	}

	static public function i_convertRuCharsToEnChars(string $a_str):string
	{
		if (empty($a_str))
		{
			new CException('i_convertRuCharsToEnChars', 'Invalid arg value: ' .$a_str);
		}

		$lChars_obj_arr	= [	'а'=>'a',	'б'=>'b',	'в'=>'v',	'г'=>'g',	'д'=>'d',
							'е'=>'e',	'ё'=>'e',	'ж'=>'zh',	'з'=>'z',	'и'=>'i',
							'й'=>'y',	'к'=>'k',	'л'=>'l',	'м'=>'m',	'н'=>'n',
							'о'=>'o',	'п'=>'p',	'р'=>'r',	'с'=>'s',	'т'=>'t',
							'у'=>'u',	'ф'=>'f',	'х'=>'h',	'ц'=>'ts',	'ч'=>'ch',
							'ш'=>'sh',	'щ'=>'sch',	'ь'=>'',	'ы'=>'y',	'ъ'=>'',
							'э'=>'e',	'ю'=>'yu',	'я'=>'ya'];

		return CStringTools::i_replaceArr([$a_str], CArrayTools::i_getKeys($lChars_obj_arr), CArrayTools::i_getValues($lChars_obj_arr))[0];
	}
	//...RU

	/*
	 * INTERFACE
	 ***************************************************/
}


?>