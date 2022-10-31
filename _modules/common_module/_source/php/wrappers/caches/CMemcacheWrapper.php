<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CMemcacheWrapper
{
	//STATS PARAMS (do not modify)...
	public const i_STATS_PARAM_ID_CURRENT_ITEMS_COUNT			= 'curr_items';
	public const i_STATS_PARAM_ID_MEMORY_USED					= 'bytes';
	public const i_STATS_PARAM_ID_MEMORY_RESERVED				= 'limit_maxbytes';
	public const i_STATS_PARAM_ID_CURRENT_CONNECTIONS_COUNT		= 'curr_connections';
	public const i_STATS_PARAM_ID_GET_REQUESTS_COUNT			= 'cmd_get';
	public const i_STATS_PARAM_ID_SET_REQUESTS_COUNT			= 'cmd_set';
	public const i_STATS_PARAM_ID_HITS_COUNT					= 'get_hits';
	public const i_STATS_PARAM_ID_MISSES_COUNT					= 'get_misses';
	//...STATS PARAMS (do not modify)

	private const _AVAILABLE_STATS_PARAMS				= [	self::i_STATS_PARAM_ID_CURRENT_ITEMS_COUNT,
															self::i_STATS_PARAM_ID_MEMORY_USED,
															self::i_STATS_PARAM_ID_MEMORY_RESERVED,
															self::i_STATS_PARAM_ID_CURRENT_CONNECTIONS_COUNT,
															self::i_STATS_PARAM_ID_GET_REQUESTS_COUNT,
															self::i_STATS_PARAM_ID_SET_REQUESTS_COUNT,
															self::i_STATS_PARAM_ID_HITS_COUNT,
															self::i_STATS_PARAM_ID_MISSES_COUNT];

	static private $_fInstance_clss;

	/**@var \Memcache*/
	private $_fMemcacheRef_mc;

	//OPTIMIZATION...
	private $_fStatsParamsValuesReceived_a_arr = null;
	//...OPTIMIZATION


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance():self
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}

		new CException('i_getInstance', 'Memcache is deprecated, use memcached instead!');

		return self::$_fInstance_clss;
	}

	public function i_openCacheConnection(bool $aOptPersistentConnection_bl = false):void
	{
		if (CACHE_TYPE !== CACHE_TYPE_MEMCACHE)
		{
			new CException('i_openCacheConnection', 'Cache type is invalid: ' .CACHE_TYPE);
		}

		ignore_user_abort(true);

		$lHost_str = '127.0.0.1';
		$lPort_int = 11211;

		$lMemcacheRef_mc = new \Memcache;
		$l_var = $aOptPersistentConnection_bl ? $lMemcacheRef_mc->pconnect($lHost_str, $lPort_int) : $lMemcacheRef_mc->connect($lHost_str, $lPort_int);
		if ($l_var === false)
		{
			new CException('i_openCacheConnection', 'Cache open connection failed.');
		}
		$this->_fMemcacheRef_mc = $lMemcacheRef_mc;
	}

	public function i_closeCacheConnection():void
	{
		ignore_user_abort(false);

		$l_var = $this->_fMemcacheRef_mc->close();
		if ($l_var === false)
		{
			new CException('i_closeCacheConnection', 'Cache close connection failed.');
		}
		$this->_fMemcacheRef_mc = null;
	}

	public function i_isCacheConnectionOpened():bool
	{
		return isset($this->_fMemcacheRef_mc);
	}

	public function i_addCacheData(string $aCacheName_str, string $aCacheValue_str, bool $aOptIsCompressedData_bl = false, int $aOptCacheLifeTime_int = 0, bool $aOptThrowIfNotExist_bl = true):void
	{
		$l_var = $this->_fMemcacheRef_mc->add($aCacheName_str, $aCacheValue_str, $aOptIsCompressedData_bl, $aOptCacheLifeTime_int);
		if (
				$l_var === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_addCacheData', 'Cache data already exist: ' .$aCacheName_str);
		}
	}

	public function i_replaceCacheData(string $aCacheName_str, string $aCacheValue_str, bool $aOptIsCompressedData_bl = false, int $aOptCacheExpiringTimeInSec_int = 0, bool $aOptThrowIfNotExist_bl = true):void
	{
		$l_var = $this->_fMemcacheRef_mc->replace($aCacheName_str, $aCacheValue_str, $aOptIsCompressedData_bl, $aOptCacheExpiringTimeInSec_int);
		if (
				$l_var === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_replaceCacheData', 'Cache data already exist: ' .$aCacheName_str);
		}
	}

	public function i_getCacheData(string $aCacheName_str, bool $aOptThrowIfNotExist_bl = true):string
	{
		$l_var = $this->_fMemcacheRef_mc->get($aCacheName_str);
		if (
				$l_var === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_getCacheData', 'Cache data not exist: ' .$aCacheName_str);
		}
		return $l_var;
	}

	public function i_deleteCacheData(string $aCacheName_str, bool $aOptThrowIfNotExist_bl = true):void
	{
		$l_var = $this->_fMemcacheRef_mc->delete($aCacheName_str);
		if (
				$l_var === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_deleteCacheData', 'Cache data not exist: ' .$aCacheName_str);
		}
	}

	public function i_resetCachesData():void
	{
		$l_var = $this->_fMemcacheRef_mc->flush();
		if ($l_var === false)
		{
			new CException('i_resetCachesData', 'Cache data not reset.');
		}
	}

	public function i_getStatsParamsValues(array $aOptStatsParamsIds_str_arr = null, $aOptResetPreviouslyStatsParamsValuesReceived_bl = false):array
	{
		if (
				!$this->_fStatsParamsValuesReceived_a_arr
				|| $aOptResetPreviouslyStatsParamsValuesReceived_bl
			)
		{
			$l_var = $this->_fMemcacheRef_mc->getStats();
			if ($l_var === false)
			{
				new CException('i_getStats', 'Cache stats not available.');
			}

			$lStatsParamsValues_a_arr = [];

			foreach ($l_var as $lName_str => $lValue_var)
			{
				if (!CArrayTools::i_isKeyExist($lName_str, self::_AVAILABLE_STATS_PARAMS))
				{
					continue;
				}

				if (
					isset($aOptStatsParamsIds_str_arr)
					&& !CArrayTools::i_isKeyExist($lName_str, $aOptStatsParamsIds_str_arr)
				)
				{
					continue;
				}

				$lStatsParamsValues_a_arr[$lName_str] = $lValue_var;
			}

			$this->_fStatsParamsValuesReceived_a_arr = $lStatsParamsValues_a_arr;
		}

		return $this->_fStatsParamsValuesReceived_a_arr;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
}


?>