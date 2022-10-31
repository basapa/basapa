<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabaseUserMessagesTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_addUserMessageData(array $aTableItemData_a_arr):void
	{
		$this->___addData($aTableItemData_a_arr);
	}

	public function i_getUserMessagesData(array $aOptTableRows_str_arr = null):CCTableQueriesData
	{
		return $this->___getData($aOptTableRows_str_arr);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCUserMessagesTableData::i_TABLE_NAME;
	}
	
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		return $this->__getDatabaseData()->i_getUserMessagesTableQueriesData();
	}

	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCUserMessagesTableData($aTableData_a_arr);
	}
}


?>