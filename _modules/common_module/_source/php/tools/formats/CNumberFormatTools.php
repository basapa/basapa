<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CNumberFormatTools
{
	//CURRENCY IDS...
	public const i_CURRENCY_ID_EUR						= 'EUR';
	public const i_CURRENCY_ID_RUB						= 'RUR';
	public const i_CURRENCY_ID_USD						= 'USD';
	//...CURRENCY IDS


	/***************************************************
	 * INTERFACE
	 */

	static public function i_formatValue($aValue_var, int $aOptDecimalNumbersCount_int = 0):string
	{
		if (
				!CVariableTools::i_isInt($aValue_var)
				&& !CVariableTools::i_isNumber($aValue_var)
			)
		{
			new CException('i_formatValue', 'Invalid arg!');
		}

		return number_format($aValue_var, $aOptDecimalNumbersCount_int);
	}

	static public function i_formatValueAsMoney($aValue_var, string $aOptCurrencyId_str = self::i_CURRENCY_ID_RUB):string
	{
		if (
				!CVariableTools::i_isInt($aValue_var)
				&& !CVariableTools::i_isNumber($aValue_var)
			)
		{
			new CException('i_formatValueAsMoney', 'Invalid arg!');
		}

		$lLocale_str = 'ru_RU';//https://gist.github.com/jacobbubu/1836273

		$l_nf = \numfmt_create($lLocale_str, \NumberFormatter::CURRENCY);
		//return \numfmt_format($l_nf, $aValue_var);
		return numfmt_format_currency($l_nf, $aValue_var, $aOptCurrencyId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>