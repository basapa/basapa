<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CMathTools
{
	public const i_PI									= M_PI;


	/***************************************************
	 * INTERFACE
	 */

	static public function i_randomInt(int $aMin_int, int $aMax_int):int
	{
		return mt_rand($aMin_int, $aMax_int);
	}

	static public function i_absInt(int $a_int):int
	{
		return CVariableTools::i_toInt(self::i_abs($a_int));
	}

	static public function i_abs(float $a_num):float
	{
		return CVariableTools::i_toNumber(abs($a_num));
	}

	static public function i_floor(float $a_num):int
	{
		return CVariableTools::i_toInt(floor($a_num));
	}

	static public function i_ceil(float $a_num):int
	{
		return CVariableTools::i_toInt(ceil($a_num));
	}

	static public function i_roundInt(float $a_num):int
	{
		return CVariableTools::i_toInt(self::i_round($a_num));
	}

	static public function i_round(float $a_num, $aOptPrecision_int = 0):float
	{
		return round($a_num, $aOptPrecision_int);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>