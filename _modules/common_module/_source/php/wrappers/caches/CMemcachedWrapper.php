<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CMemcachedWrapper
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

	//SERVERS IDS...
	public const i_SERVER_ID_DEFAULT					= 0;
	//...SERVERS IDS

	private const _AVAILABLE_STATS_PARAMS				= [	self::i_STATS_PARAM_ID_CURRENT_ITEMS_COUNT,
															self::i_STATS_PARAM_ID_MEMORY_USED,
															self::i_STATS_PARAM_ID_MEMORY_RESERVED,
															self::i_STATS_PARAM_ID_CURRENT_CONNECTIONS_COUNT,
															self::i_STATS_PARAM_ID_GET_REQUESTS_COUNT,
															self::i_STATS_PARAM_ID_SET_REQUESTS_COUNT,
															self::i_STATS_PARAM_ID_HITS_COUNT,
															self::i_STATS_PARAM_ID_MISSES_COUNT];

	static private $_fInstance_clss;

	/**@var \Memcached*/
	private $_fMemcachedRef_mc;

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

		return self::$_fInstance_clss;
	}

	public function i_openCacheConnection(bool $aOptPersistentConnection_bl = false):void
	{
		ignore_user_abort(true);

		$lMemcachedRef_mc = new \Memcached($aOptPersistentConnection_bl ? 'persistent_pool' : '');
		if (!isset($lMemcachedRef_mc))
		{
			new CException('i_openCacheConnection', 'Cache open connection failed.');
		}

		$l_bl = $lMemcachedRef_mc->addServer($this->_getServerIP(self::i_SERVER_ID_DEFAULT), $this->_getServerPort(self::i_SERVER_ID_DEFAULT));
		if ($l_bl === false)
		{
			new CException('i_openCacheConnection', 'Server ' .$this->_getServerIP(self::i_SERVER_ID_DEFAULT). ' addition failed: ' .$lMemcachedRef_mc->getResultMessage());
		}
		$this->_fMemcachedRef_mc = $lMemcachedRef_mc;
	}

	public function i_closeCacheConnection():void
	{
		ignore_user_abort(false);

		$l_bl = $this->_fMemcachedRef_mc->quit();
		if ($l_bl === false)
		{
			new CException('i_closeCacheConnection', 'Cache close connection failed: ' .$this->_fMemcachedRef_mc->getResultMessage());
		}
		$this->_fMemcachedRef_mc = null;
	}

	public function i_isCacheConnectionOpened():bool
	{
		return isset($this->_fMemcachedRef_mc);
	}

	public function i_addCacheData(string $aCacheName_str, string $aCacheValue_str, int $aOptCacheLifeTime_int = 0, int $aOptServerId_int = self::i_SERVER_ID_DEFAULT, bool $aOptThrowIfNotExist_bl = true):void
	{
		$l_bl = $this->_fMemcachedRef_mc->add($aCacheName_str, $aCacheValue_str, $aOptCacheLifeTime_int);
		if (
				$l_bl === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_addCacheData', 'Cache data ' .$aCacheName_str. ' already exist: ' .$this->_fMemcachedRef_mc->getResultMessage());
		}
	}

	public function i_replaceCacheData(string $aCacheName_str, string $aCacheValue_str, int $aOptCacheExpiringTimeInSec_int = 0, int $aOptServerId_int = self::i_SERVER_ID_DEFAULT, bool $aOptThrowIfNotExist_bl = true):void
	{
		$l_bl = $this->_fMemcachedRef_mc->replace($aCacheName_str, $aCacheValue_str, $aOptCacheExpiringTimeInSec_int);
		if (
				$l_bl === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_replaceCacheData', 'Cache data ' .$aCacheName_str. ' already exist: ' .$this->_fMemcachedRef_mc->getResultMessage());
		}
	}

	public function i_getCacheData(string $aCacheName_str, int $aOptServerId_int = self::i_SERVER_ID_DEFAULT, bool $aOptThrowIfNotExist_bl = true):?string
	{
		$l_var = $this->_fMemcachedRef_mc->get($aCacheName_str);
		if (
				$l_var === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_getCacheData', 'Cache data ' .$aCacheName_str. ' not exist: ' .$this->_fMemcachedRef_mc->getResultMessage());
		}
		return $l_var === false ? null : CVariableTools::i_toString($l_var);
	}

	/*public function i_getAllCacheNames(bool $aOptThrowIfNotExist_bl = true):array
	{
		$l_var = $this->_fMemcachedRef_mc->getAllKeys();
		if (
				$l_var === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_getAllCacheData', 'Cache data not exist!');
		}
		return $l_var;
	}*/

	public function i_deleteCacheData(string $aCacheName_str, int $aOptServerId_int = self::i_SERVER_ID_DEFAULT, bool $aOptThrowIfNotExist_bl = true):void
	{
		$l_bl = $this->_fMemcachedRef_mc->delete($aCacheName_str);
		if (
				$l_bl === false
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_deleteCacheData', 'Cache data ' .$aCacheName_str. ' not exist: ' .$this->_fMemcachedRef_mc->getResultMessage());
		}
	}

	public function i_deleteAllCacheData():void
	{
		$l_bl = $this->_fMemcachedRef_mc->flush();
		if ($l_bl === false)
		{
			new CException('i_deleteAllCacheData', 'Cache data not deleted: ' .$this->_fMemcachedRef_mc->getResultMessage());
		}
	}

	public function i_getStatsParamsValues(array $aOptStatsParamsIds_str_arr = null, $aOptResetPreviouslyStatsParamsValuesReceived_bl = false):array
	{
		if (
				!$this->_fStatsParamsValuesReceived_a_arr
				|| $aOptResetPreviouslyStatsParamsValuesReceived_bl
			)
		{
			$l_var = $this->_fMemcachedRef_mc->getStats();
			if ($l_var === false)
			{
				new CException('i_getStatsParamsValues', 'Servers cache stats not available: ' .$this->_fMemcachedRef_mc->getResultMessage());
			}

			 $lLocalhostCacheServerStats_a_arr = $l_var[$this->_getServerStringId(self::i_SERVER_ID_DEFAULT)];
			if (!isset($lLocalhostCacheServerStats_a_arr))
			{
				new CException('i_getStatsParamsValues', 'Localhost server cache stats not available.');
			}

			$lStatsParamsValues_a_arr = [];

			foreach ($lLocalhostCacheServerStats_a_arr as $lName_str => $lValue_var)
			{
				if (!CArrayTools::i_isInArray($lName_str, self::_AVAILABLE_STATS_PARAMS))
				{
					continue;
				}

				if (
						isset($aOptStatsParamsIds_str_arr)
						&& !CArrayTools::i_isInArray($lName_str, $aOptStatsParamsIds_str_arr)
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

	private function _getServerIP(int $aServerId_int):string
	{
		$lIP_str = '';

		switch ($aServerId_int)
		{
			case self::i_SERVER_ID_DEFAULT:
			{
				$lIP_str = '127.0.0.1';
			}break;

			default:
				new CException('_getServerIP', 'Unsupported server id: ' .$aServerId_int);
			break;
		}

		return $lIP_str;
	}

	private function _getServerPort(int $aServerId_int):int
	{
		$lPort_int = 0;

		switch ($aServerId_int)
		{
			case self::i_SERVER_ID_DEFAULT:
			{
				$lPort_int = 11211;
			}break;

			default:
				new CException('_getServerPort', 'Unsupported server id: ' .$aServerId_int);
			break;
		}

		return $lPort_int;
	}

	private function _getServerStringId(int $aServerId_int):string
	{
		$lStringId_str = '';

		switch ($aServerId_int)
		{
			case self::i_SERVER_ID_DEFAULT:
			{
				$lStringId_str = $this->_getServerIP($aServerId_int). ':' .$this->_getServerPort($aServerId_int);
			}break;

			default:
				new CException('_getServerStringId', 'Unsupported server id: ' .$aServerId_int);
			break;
		}

		return $lStringId_str;
	}
}


?>