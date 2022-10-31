<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CNumberTools
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_formatValue($aValue_var, int $aOptDecimalNumbersCount_int = 0):string
	{
		return CNumberFormatTools::i_formatValue($aValue_var, $aOptDecimalNumbersCount_int);
	}

	static public function i_formatValueAsMoney($aValue_var):string
	{
		return CNumberFormatTools::i_formatValueAsMoney($aValue_var);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>