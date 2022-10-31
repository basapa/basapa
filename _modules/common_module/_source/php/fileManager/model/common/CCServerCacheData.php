<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCServerCacheData
{
	/*virtual*/static public function i_SUPPORTED_SERVER_CACHE_PARAMS():array
	{
		//TODO: optimize required
		return [];
	}

	private $_fIsServerCacheLaunched_bl = false;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_startServerCache():void
	{
		CMemcachedWrapper::i_getInstance()->i_openCacheConnection(false);

		$this->_fIsServerCacheLaunched_bl = true;
	}

	public function i_stopServerCache():void
	{
		CMemcachedWrapper::i_getInstance()->i_closeCacheConnection();

		$this->_fIsServerCacheLaunched_bl = false;
	}

	public function i_isServerCacheLaunched():bool
	{
		return $this->_fIsServerCacheLaunched_bl;
	}

	public function i_isServerCacheAvailable():bool
	{
		return CACHE_TYPE === CACHE_TYPE_MEMCACHE;
	}

	public function i_isServerCacheParamDefined(string $aServerCacheParamId_str, int $aOptServerId_int = CMemcachedWrapper::i_SERVER_ID_DEFAULT):bool
	{
		return CVariableTools::i_toBoolean(CMemcachedWrapper::i_getInstance()->i_getCacheData($aServerCacheParamId_str, $aOptServerId_int, false));
	}

	public function i_getServerCacheParam(string $aServerCacheParamId_str, int $aOptServerId_int = CMemcachedWrapper::i_SERVER_ID_DEFAULT, bool $aOptThrowIfNotExist_bl = true):string
	{
		if (!$this->i_isServerCacheParamDefined($aServerCacheParamId_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getServerCacheParam', 'Server cache param id not exist: ' .$aServerCacheParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
			}
		}

		return CMemcachedWrapper::i_getInstance()->i_getCacheData($aServerCacheParamId_str, $aOptServerId_int);
	}

	public function i_setServerCacheParam(string $aServerCacheParamId_str, string $aServerCacheParamValue_str, int $aServerCacheLifeTime_int = CFilesConst::i_LIFE_TIME_NONE, int $aOptServerId_int = CMemcachedWrapper::i_SERVER_ID_DEFAULT, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$this->i_isServerCacheParamDefined($aServerCacheParamId_str)
				&& $aOptThrowIfExist_bl
			)
		{
			new CException('i_setServerCacheParam', 'Server cache param already exist: ' .$aServerCacheParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		$lServerCacheParamLifeTime_int = $aServerCacheLifeTime_int === CFilesConst::i_LIFE_TIME_NONE ? $aServerCacheLifeTime_int : CDateTimeTools::i_getCurrentUTimeInSec() + $aServerCacheLifeTime_int;

		CMemcachedWrapper::i_getInstance()->i_addCacheData($aServerCacheParamId_str, $aServerCacheParamValue_str, $lServerCacheParamLifeTime_int, $aOptServerId_int);
	}

	public function i_clearServerCacheParam(string $aServerCacheParamId_str, int $aOptServerId_int = CMemcachedWrapper::i_SERVER_ID_DEFAULT, bool $aOptThrowIfNotExist_bl = true):void
	{
		if (!CArrayTools::i_isInArray($aServerCacheParamId_str, self::i_SUPPORTED_SERVER_CACHE_PARAMS()))
		{
			new CException('i_clearServerCacheParam', 'Server cache param not supported: ' .$aServerCacheParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		if (
				!$this->i_isServerCacheParamDefined($aServerCacheParamId_str)
				&& $aOptThrowIfNotExist_bl
			)
		{
			new CException('i_clearServerCacheParam', 'Server cache param not exist: ' .$aServerCacheParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		CMemcachedWrapper::i_getInstance()->i_deleteCacheData($aServerCacheParamId_str, $aOptServerId_int);
	}

	public function i_clearServerCacheParams():void
	{
		CMemcachedWrapper::i_getInstance()->i_deleteAllCacheData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/
}


?>