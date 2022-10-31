<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CDateTimeTools
{
	//TIME UNIT VALUES...
	public const i_TIME_UNIT_VALUE_NONE						= 0;
	public const i_TIME_UNIT_VALUE_HALF_MINUTES				= 30;
	public const i_TIME_UNIT_VALUE_ONE_MINUTE				= 60;
	public const i_TIME_UNIT_VALUE_HALF_HOURS				= 1800;
	public const i_TIME_UNIT_VALUE_ONE_HOUR					= 3600;
	public const i_TIME_UNIT_VALUE_THREE_HOURS				= 10800;
	public const i_TIME_UNIT_VALUE_TWELFTH_HOURS			= 43200;
	public const i_TIME_UNIT_VALUE_ONE_DAY					= 86400;
	public const i_TIME_UNIT_VALUE_THREE_DAYS				= 259200;
	public const i_TIME_UNIT_VALUE_ONE_WEEK					= 604800;
	public const i_TIME_UNIT_VALUE_TWO_WEEKS				= 1209600;
	public const i_TIME_UNIT_VALUE_ONE_MONTH				= 2592000;
	public const i_TIME_UNIT_VALUE_THREE_MONTHS				= 7776000;
	public const i_TIME_UNIT_VALUE_SIX_MONTHS				= 15768000;
	public const i_TIME_UNIT_VALUE_ONE_YEAR					= 31536000;
	//...TIME UNIT VALUES

	//TRANSLATIONS...
	public const i_MOUNTHS_NAMES_AS_DATE_PART			= ["января",
															"февраля",
															"марта",
															"апреля",
															"мая",
															"июня",
															"июля",
															"августа",
															"сентября",
															"октября",
															"ноября",
															"декабря"];
	//...TRANSLATIONS

	//DATE TIME UNIT PATTERNS (do not modify)...
	private const _DATE_TIME_UNIT_PATTERN_YEAR			= 'YYYY';
	private const _DATE_TIME_UNIT_PATTERN_S_YEAR		= 'YY';
	private const _DATE_TIME_UNIT_PATTERN_MONTH			= 'MM';
	private const _DATE_TIME_UNIT_PATTERN_S_MONTH		= 'M';
	private const _DATE_TIME_UNIT_PATTERN_DAY			= 'DD';
	private const _DATE_TIME_UNIT_PATTERN_S_DAY			= 'D';
	private const _DATE_TIME_UNIT_PATTERN_HOUR			= 'hh';
	private const _DATE_TIME_UNIT_PATTERN_MINUTE		= 'mm';
	private const _DATE_TIME_UNIT_PATTERN_SECOND		= 'ss';

	//https://www.php.net/manual/ru/datetime.format.php
	private const _DATE_TIME_UNIT_PATTERN_ACCORDANCE_WITH_NATIVE_DATE_UNIT_PATTERN	= [	self::_DATE_TIME_UNIT_PATTERN_YEAR		=> 'Y',
																						self::_DATE_TIME_UNIT_PATTERN_S_YEAR	=> 'y',
																						self::_DATE_TIME_UNIT_PATTERN_MONTH		=> 'm',
																						self::_DATE_TIME_UNIT_PATTERN_S_MONTH	=> 'n',
																						self::_DATE_TIME_UNIT_PATTERN_DAY		=> 'd',
																						self::_DATE_TIME_UNIT_PATTERN_S_DAY		=> 'j',
																						self::_DATE_TIME_UNIT_PATTERN_HOUR		=> 'H',
																						self::_DATE_TIME_UNIT_PATTERN_MINUTE	=> 'i',
																						self::_DATE_TIME_UNIT_PATTERN_SECOND	=> 's'];
	//...DATE TIME UNIT PATTERNS (do not modify)


	/***************************************************
	 * INTERFACE
	 */

	static public function i_getCurrentUTimeInMSec():int
	{
		return CVariableTools::i_toInt(microtime(true) * 1000);
	}

	static public function i_getCurrentUTimeInSec():int
	{
		return time();
	}
	
	static public function i_getFormattedDateTime(string $aDateTimeFormatPattern_str, int $aOptUTimeInSec_int = 0, array $aOptMounthsNames_str_arr = null, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null):?string
	{
		foreach (self::_DATE_TIME_UNIT_PATTERN_ACCORDANCE_WITH_NATIVE_DATE_UNIT_PATTERN as $lDateTimeUnitPattern_str => $lNativeDateUnitPattern_str)
		{
			if (
					isset($aOptMounthsNames_str_arr)
					&&
					(
						$lDateTimeUnitPattern_str === self::_DATE_TIME_UNIT_PATTERN_MONTH
						|| $lDateTimeUnitPattern_str === self::_DATE_TIME_UNIT_PATTERN_S_MONTH
					)
				)
			{
				$aDateTimeFormatPattern_str = CStringTools::i_replace($aDateTimeFormatPattern_str, $aOptMounthsNames_str_arr[self::i_getMonthInt($aOptUTimeInSec_int) - 1], $lDateTimeUnitPattern_str);
			}
			else
			{
				$lReplacementValue_str = $lNativeDateUnitPattern_str;
			}

			$aDateTimeFormatPattern_str = CStringTools::i_replace($aDateTimeFormatPattern_str, $lReplacementValue_str, $lDateTimeUnitPattern_str);
		}

		$l_var = date($aDateTimeFormatPattern_str, $aOptUTimeInSec_int === 0 ? self::i_getCurrentUTimeInSec() : $aOptUTimeInSec_int);
		if ($l_var === false)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('i_getFormattedDateTime', 'Failed: ' .$aDateTimeFormatPattern_str);
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}
	
	//UNITS...
	static public function i_getYearInt(int $aOptUTimeInSec_int = 0):int
	{
		return CVariableTools::i_toInt(self::_getDateTimeUnitValueStr(self::_DATE_TIME_UNIT_PATTERN_YEAR, $aOptUTimeInSec_int));
	}
	
	static public function i_getMonthInt(int $aOptUTimeInSec_int = 0):int
	{
		return CVariableTools::i_toInt(self::_getDateTimeUnitValueStr(self::_DATE_TIME_UNIT_PATTERN_MONTH, $aOptUTimeInSec_int));
	}
	
	static public function i_getDayInt(int $aOptUTimeInSec_int = 0):int
	{
		return CVariableTools::i_toInt(self::_getDateTimeUnitValueStr(self::_DATE_TIME_UNIT_PATTERN_DAY, $aOptUTimeInSec_int));
	}
	//...UNITS

	static public function i_calcElapsedYearsCount(int $aUTimeInSecFrom_int, int $aOptUTimeInSecTo_int = 0):int
	{
		return self::_getDateTimeRangeDifferenceData($aUTimeInSecFrom_int, $aOptUTimeInSecTo_int)->y;
	}

	static public function i_calcElapsedMonthsCount(int $aUTimeInSecFrom_int, int $aOptUTimeInSecTo_int = 0):int
	{
		return self::_getDateTimeRangeDifferenceData($aUTimeInSecFrom_int, $aOptUTimeInSecTo_int)->m;
	}

	static public function i_calcElapsedDaysCount(int $aUTimeInSecFrom_int, int $aOptUTimeInSecTo_int = 0):int
	{
		return self::_getDateTimeRangeDifferenceData($aUTimeInSecFrom_int, $aOptUTimeInSecTo_int)->d;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	static private function _getDateTimeRangeDifferenceData(int $aUTimeInSecFrom_int, int $aOptUTimeInSecTo_int = 0, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null):\DateInterval
	{
		if (
				$aOptUTimeInSecTo_int !== 0
				&& $aUTimeInSecFrom_int > $aOptUTimeInSecTo_int
			)
		{
			new CException('_getDateTimeRangeDifferenceData', 'Invalid range time from: ' .$aUTimeInSecFrom_int. ' to: ' .$aOptUTimeInSecTo_int);
		}

		$lDateTimeFormatPattern_str = 'YYYY-MM-DD';
		$lDateTimeFrom_dt = date_create(self::i_getFormattedDateTime($lDateTimeFormatPattern_str, $aUTimeInSecFrom_int));
		$lDateTimeTo_dt = date_create(self::i_getFormattedDateTime($lDateTimeFormatPattern_str, $aOptUTimeInSecTo_int));

		$l_var = $lDateTimeFrom_dt->diff($lDateTimeTo_dt);
		if ($l_var === false)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('_getDateTimeRangeDifferenceData', 'Failed from: ' .$aUTimeInSecFrom_int. ' to: ' .$aOptUTimeInSecTo_int);
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}

	static private function _getDateTimeUnitValueStr(string $aDateTimeUnitPattern_str, int $aOptUTimeInSec_int = 0):string
	{
		$lNativeDateUnitPattern_str = self::_DATE_TIME_UNIT_PATTERN_ACCORDANCE_WITH_NATIVE_DATE_UNIT_PATTERN[$aDateTimeUnitPattern_str];
		
		return date($lNativeDateUnitPattern_str, $aOptUTimeInSec_int === 0 ? self::i_getCurrentUTimeInSec() : $aOptUTimeInSec_int);
	}
}


?>