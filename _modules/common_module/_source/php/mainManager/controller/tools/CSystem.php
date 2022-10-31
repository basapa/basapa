<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CSystem
{
	//APP PARAM IDS...
	public const i_APP_PARAM_ID_SESSION_NAME			= 'session.name';
	public const i_APP_PARAM_ID_SESSION_SAVE_PATH		= 'session.save_path';
	public const i_APP_PARAM_ID_SESSION_LIFE_TIME		= 'session.gc_maxlifetime';
	public const i_APP_PARAM_ID_COOKIE_DOMAIN			= 'session.cookie_domain';
	public const i_APP_PARAM_ID_COOKIE_SAVE_PATH		= 'session.cookie_path';
	public const i_APP_PARAM_ID_COOKIE_LIFE_TIME		= 'session.cookie_lifetime';
	public const i_APP_PARAM_ID_MEMORY_LIMIT			= 'memory_limit';
	public const i_APP_PARAM_ID_TIME_ZONE				= 'time_zone';
	//...APP PARAM IDS

	//TIME ZONES...
	public const i_TIME_ZONE_ASIA_NOVOSIBIRSK			= 'Asia/Novosibirsk';
	//...TIME ZONES

	static private $_fInstance_clss;

	private $_fAppStartTimeInMSec_int;
	private $_fAppDatabaseRequestsCount_int = 0;
	private $_fAppDatabaseRequestsExecutionTimeInMSec_int = 0;


	/*private function __construct()
	{
		$this->_init();
	}*/
	
	static public function i_getInstance()
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new CSystem();
		}
		return self::$_fInstance_clss;
	}
	
	/***************************************************
	 * INTERFACE
	 */

	//APP PARAMS...
	static public function i_getAppParam(string $aParamId_str):string
	{
		return ini_get($aParamId_str);
	}

	static public function i_setAppParam(string $aParamId_str, string $aParamValue_str):void
	{
		if ($aParamId_str === self::i_APP_PARAM_ID_TIME_ZONE)
		{
			date_default_timezone_set($aParamValue_str);
		}
		else
		{
			ini_set($aParamId_str, $aParamValue_str);
		}
	}

	static public function i_setAppParams(array $aParams_a_arr):void
	{
		foreach ($aParams_a_arr as $lParamId_str => $lParamValue_str)
		{
			self::i_setAppParam($lParamId_str, $lParamValue_str);
		}
	}
	//...APP PARAMS

	//APP EXECUTION TIME...
	public function i_setAppStartTimeInMSec(int $aTimeInMSec_int):void
	{
		$this->_fAppStartTimeInMSec_int = $aTimeInMSec_int;
	}

	public function i_getAppStartTimeInMSec():int
	{
		if (!isset($this->_fAppStartTimeInMSec_int))
		{
			new CException('i_getAppStartTimeInMSec', 'App start time value is undefined!');
		}
		return $this->_fAppStartTimeInMSec_int;
	}

	public function i_getAppExecutionTimeInMSec():int
	{
		return CDateTimeTools::i_getCurrentUTimeInMSec() - $this->i_getAppStartTimeInMSec();
	}

	public function i_getFormattedAppExecutionTimeInSec():string
	{
		return CVariableTools::i_toString(CMathTools::i_round($this->i_getAppExecutionTimeInMSec() / 1000, 2));
	}

	public function i_setAppPHPScriptMaxExecutionTime(int $aTimeInSecs_int):void
	{
		set_time_limit($aTimeInSecs_int);
	}
	//...APP EXECUTION TIME
	
	//APP DATABASE REQUESTS...
	public function i_incAppDatabaseRequestsCount():void
	{
		$this->_fAppDatabaseRequestsCount_int++;
	}

	public function i_getAppDatabaseRequestsCount():int
	{
		return $this->_fAppDatabaseRequestsCount_int;
	}

	public function i_addAppDatabaseRequestExecutionTimeInMSec(int $aTimeInSec_int):void
	{
		$this->_fAppDatabaseRequestsExecutionTimeInMSec_int += $aTimeInSec_int;
	}

	public function i_getAppDatabaseRequestsExecutionTimeInMSec():int
	{
		return $this->_fAppDatabaseRequestsExecutionTimeInMSec_int;
	}

	public function i_getAppDatabaseRequestsExecutionTimeInSec():string
	{
		return CVariableTools::i_toString(CMathTools::i_round($this->i_getAppDatabaseRequestsExecutionTimeInMSec() / 1000, 5));
	}
	//...APP DATABASE REQUESTS
	
	//APP MEMORY...
	public function i_getAppMemoryUsageCountInBytes():int
	{
		return memory_get_usage(true);
	}

	public function i_getFormattedAppMemoryUsageCountInMBytes():string
	{
		return CVariableTools::i_toString(CMathTools::i_round($this->i_getAppMemoryUsageCountInBytes() / (1024 * 1024), 2));
	}

	public function i_getAppMemoryAvailableCountInMBytes():int
	{
		return CVariableTools::i_toInt(self::i_getAppParam(self::i_APP_PARAM_ID_MEMORY_LIMIT));
	}
	//...APP MEMORY

	//APP ENCODING...
	public function i_getAppPHPScriptEncoding():string
	{
		return mb_internal_encoding();
	}

	public function i_setAppPHPScriptEncoding(string $aEncodingType_str):void
	{
		mb_internal_encoding($aEncodingType_str);
	}
	//...APP ENCODING

	//APP MEMCACHED...
	public function i_getFormattedAppMemcachedMemoryUsedInMBytes():string
	{
		return CVariableTools::i_toString(CMathTools::i_round(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_MEMORY_USED] / (1024 * 1024), 2));
	}

	public function i_getFormattedAppMemcachedMemoryReservedInMBytes():string
	{
		return CVariableTools::i_toString(CMathTools::i_round(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_MEMORY_RESERVED] / (1024 * 1024), 2));
	}

	public function i_getAppMemcachedCurrentItemsCount():string
	{
		return CVariableTools::i_toString(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_CURRENT_ITEMS_COUNT]);
	}

	public function i_getAppMemcachedCurrentConnectionsCount():string
	{
		return CVariableTools::i_toString(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_CURRENT_CONNECTIONS_COUNT]);
	}

	public function i_getAppMemcachedGETRequestsCount():string
	{
		return CVariableTools::i_toString(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_GET_REQUESTS_COUNT]);
	}

	public function i_getAppMemcachedSETRequestsCount():string
	{
		return CVariableTools::i_toString(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_SET_REQUESTS_COUNT]);
	}

	public function i_getAppMemcachedHitsCount():string
	{
		return CVariableTools::i_toString(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_HITS_COUNT]);
	}

	public function i_getAppMemcachedMissesCount():string
	{
		return CVariableTools::i_toString(CMemcachedWrapper::i_getInstance()->i_getStatsParamsValues()[CMemcachedWrapper::i_STATS_PARAM_ID_MISSES_COUNT]);
	}
	//...APP MEMCACHED

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init()
	{
	}*/
}


?>