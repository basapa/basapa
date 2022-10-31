<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCDatabaseData
{
	public const i_TABLE_QUERIES_DATA_ID_USERS				= 0;
	public const i_TABLE_QUERIES_DATA_ID_USER_MESSAGES		= 1;
	public const i_TABLE_QUERIES_DATA_ID_PAYMENTS			= 2;
	public const i_TABLE_QUERIES_DATA_ID_SUPPORT_MESSAGES	= 3;
	public const i_TABLE_QUERIES_DATA_ID_CITIES				= 4;
	public const i_TABLE_QUERIES_DATA_ID_REGIONS			= 5;
	public const i_TABLE_QUERIES_DATA_ID_CURRENCIES			= 6;
	public const i_TABLE_QUERIES_DATA_ID_STATES				= 7;
	protected const __TABLE_QUERIES_DATAS_COUNT				= 8;

	private $_fTableQueriesData_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getUsersTableQueriesData():CCUsersTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_USERS);
	}

	public function i_getUserMessagesTableQueriesData():CCTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_USER_MESSAGES);
	}

	public function i_getPaymentsTableQueriesData():CCTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_PAYMENTS);
	}

	public function i_getSupportMessagesTableQueriesData():CCTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_SUPPORT_MESSAGES);
	}

	public function i_getCitiesTableQueriesData():CCCitiesSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_CITIES);
	}

	public function i_getRegionsTableQueriesData():CCRegionsSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_REGIONS);
	}

	public function i_getStatesTableQueriesData():CCContentStatesSTableQueriesData
	{
		return $this->__getTableQueriesData(self::i_TABLE_QUERIES_DATA_ID_STATES);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getTableQueriesData(int $aTableQueriesDataId_int)
	{
		return isset($this->_fTableQueriesData_clss_arr[$aTableQueriesDataId_int]) ? $this->_fTableQueriesData_clss_arr[$aTableQueriesDataId_int] : ($this->_fTableQueriesData_clss_arr[$aTableQueriesDataId_int] = $this->__generateTableQueriesData($aTableQueriesDataId_int));
	}

	/*virtual*/protected function __generateTableQueriesData(int $aTableQueriesDataId_int):CCTableQueriesData
	{
		$lTableQueriesData_clss = null;

		switch ($aTableQueriesDataId_int)
		{
			case self::i_TABLE_QUERIES_DATA_ID_USER_MESSAGES:
			case self::i_TABLE_QUERIES_DATA_ID_PAYMENTS:
			case self::i_TABLE_QUERIES_DATA_ID_SUPPORT_MESSAGES:
			{
				$lTableQueriesData_clss = new CCTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_USERS:
			{
				$lTableQueriesData_clss = new CCUsersTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_CITIES:
			{
				$lTableQueriesData_clss = new CCCitiesSTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_REGIONS:
			{
				$lTableQueriesData_clss = new CCRegionsSTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_CURRENCIES:
			{
				$lTableQueriesData_clss = new CCCurrenciesSTableQueriesData();
			}break;

			case self::i_TABLE_QUERIES_DATA_ID_STATES:
			{
				$lTableQueriesData_clss = new CCContentStatesSTableQueriesData();
			}break;

			default:
				new CException('__generateTableQueriesData', 'Unsupported table queries data id: ' .$aTableQueriesDataId_int);
			break;
		}

		return $lTableQueriesData_clss;
	}
}


?>