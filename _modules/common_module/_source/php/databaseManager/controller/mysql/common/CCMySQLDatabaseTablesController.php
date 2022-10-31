<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


/*abstract*/class CCMySQLDatabaseTablesController
{
	private $_fMySQLDatabaseTableController_clss_arr = [];


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getMySQLDatabaseCurrenciesTableController():CCMySQLDatabaseCurrenciesTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_CURRENCIES);
	}

	public function i_getMySQLDatabaseCitiesTableController():CCMySQLDatabaseCitiesTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_CITIES);
	}

	public function i_getMySQLDatabaseRegionsTableController():CCMySQLDatabaseRegionsTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_REGIONS);
	}

	public function i_getMySQLDatabaseUsersTableController():CCMySQLDatabaseUsersTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_USERS);
	}

	public function i_getMySQLDatabaseUserMessagesTableController():CCMySQLDatabaseUserMessagesTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_USER_MESSAGES);
	}

	public function i_getMySQLDatabasePaymentsTableController():CCMySQLDatabasePaymentsTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_PAYMENTS);
	}

	public function i_getMySQLDatabaseSupportMessagesTableController():CCMySQLDatabaseSupportMessagesTableController
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_SUPPORT_MESSAGES);
	}

	public function i_getMySQLDatabaseStatesSTableController():CCMySQLDatabaseContentStatesTableController//----StatesS
	{
		return $this->__getMySQLDatabaseTableController(CCDatabaseData::i_TABLE_QUERIES_DATA_ID_STATES);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMySQLDatabaseTableController(int $aTableQueriesDataId_int)
	{
		return isset($this->_fMySQLDatabaseTableController_clss_arr[$aTableQueriesDataId_int]) ?  $this->_fMySQLDatabaseTableController_clss_arr[$aTableQueriesDataId_int] : ($this->_fMySQLDatabaseTableController_clss_arr[$aTableQueriesDataId_int] = $this->__generateMySQLDatabaseTableController($aTableQueriesDataId_int));
	}

	/*virtual*/protected function __generateMySQLDatabaseTableController(int $aTableQueriesDataId_int):CCMySQLDatabaseTableController
	{
		$lMySQLDatabaseTableController_clss = null;

		switch ($aTableQueriesDataId_int)
		{
			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_CURRENCIES:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseCurrenciesTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_CITIES:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseCitiesTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_REGIONS:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseRegionsTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_USERS:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseUsersTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_USER_MESSAGES:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseUserMessagesTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_PAYMENTS:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabasePaymentsTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_SUPPORT_MESSAGES:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseSupportMessagesTableController();
			}break;

			case CCDatabaseData::i_TABLE_QUERIES_DATA_ID_STATES:
			{
				$lMySQLDatabaseTableController_clss = new CCMySQLDatabaseContentStatesTableController();
			}break;

			default:
				new CException('__generateMySQLDatabaseTableController', 'Unsupported table queries data id: ' .$aTableQueriesDataId_int);
			break;
		}

		return $lMySQLDatabaseTableController_clss;
	}
}


?>