<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCCookieData
{
	public const i_COOKIE_PARAM_ID_USER_ID				= 'bsp_user_id';
	public const i_COOKIE_PARAM_ID_USER_HASH			= 'bsp_user_hash';
	public const i_COOKIE_PARAM_ID_SESSION_ID			= 'bsp_sid';
	public const i_COOKIE_PARAM_ID_EVENT_ID				= 'bsp_event_id';
	public const i_COOKIE_PARAM_ID_BROWSER_INFO			= 'bsp_browser_info';
	public const i_COOKIE_PARAM_ID_ANTI_SPAM			= 'bsp_anti_spam';
	public const i_COOKIE_PARAM_ID_PREV_URL				= 'bsp_prev_url';

	/*virtual*/static public function i_SUPPORTED_COOKIE_PARAMS():array
	{
		//TODO: optimize required
		return [self::i_COOKIE_PARAM_ID_USER_ID,
				self::i_COOKIE_PARAM_ID_USER_HASH,
				self::i_COOKIE_PARAM_ID_SESSION_ID,
				self::i_COOKIE_PARAM_ID_EVENT_ID,
				self::i_COOKIE_PARAM_ID_BROWSER_INFO,
				self::i_COOKIE_PARAM_ID_ANTI_SPAM,
				self::i_COOKIE_PARAM_ID_PREV_URL];
	}

	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getCookieParams():array
	{
		return $this->_getNativeCookieParams();
	}

	public function i_isCookieParamDefined(string $aCookieParamId_str):bool
	{
		return isset($this->_getNativeCookieParams()[$aCookieParamId_str]);
	}

	public function i_isCookieAvailable():bool
	{
		return true;
	}

	public function i_getCookieParam(string $aCookieParamId_str, bool $aOptThrowIfNotExist_bl = true):string
	{
		if (!$this->i_isCookieParamDefined($aCookieParamId_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getCookieParamValue', 'Cookie param id not exist: ' .$aCookieParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
			}
		}

		return $this->_getNativeCookieParams()[$aCookieParamId_str];
	}

	public function i_setCookieParam(string $aCookieParamId_str, string $aCookieParamValue_str, int $aOptCookieLifeTime_int = CFilesConst::i_LIFE_TIME_NONE, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$this->i_isCookieParamDefined($aCookieParamId_str)
				&& $aOptThrowIfExist_bl
			)
		{
			new CException('i_setCookieParam', 'Cookie param already exist: ' .$aCookieParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		$lCookieParamLifeTime_int = $aOptCookieLifeTime_int === CFilesConst::i_LIFE_TIME_NONE ? $aOptCookieLifeTime_int : CDateTimeTools::i_getCurrentUTimeInSec() + $aOptCookieLifeTime_int;

		setcookie($aCookieParamId_str, $aCookieParamValue_str, $lCookieParamLifeTime_int, '/', SITE_NAME);
	}

	public function i_clearCookieParam(string $aCookieParamId_str, bool $aOptThrowIfNotExist_bl = true):void
	{
		if (!CArrayTools::i_isInArray($aCookieParamId_str, self::i_SUPPORTED_COOKIE_PARAMS()))
		{
			new CException('i_clearCookieParam', 'Cookie param not supported: ' .$aCookieParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		if (
				!$this->i_isCookieParamDefined($aCookieParamId_str)
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_clearCookieParam', 'Cookie param not exist: ' .$aCookieParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		setcookie($aCookieParamId_str, '', -1, '/', SITE_NAME);
	}

	public function i_clearCookieParams():void
	{
		foreach ($this->_getNativeCookieParams() as $lName_str => $lValue_var)
		{
			if (!CArrayTools::i_isInArray($lName_str, self::i_SUPPORTED_COOKIE_PARAMS()))
			{
				continue;
			}

			$this->i_clearCookieParam($lName_str, true);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	private function _getNativeCookieParams():array
	{
		if (!$this->i_isCookieAvailable())
		{
			new CException('_getNativeCookieParams', 'Cookie not available!');
		}
		return $_COOKIE;
	}
}


?>