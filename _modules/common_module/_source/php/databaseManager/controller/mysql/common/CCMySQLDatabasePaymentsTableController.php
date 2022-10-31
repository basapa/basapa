<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCMySQLDatabasePaymentsTableController extends CCMySQLDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*public function i_addPaymentData(array $aTableItemData_a_arr):void
	{
		$this->___addData($aTableItemData_a_arr);
	}

	public function i_getPaymentsData(array $aOptTableRows_str_arr = null):CCTableQueriesData
	{
		return $this->___getData($aOptTableRows_str_arr);
	}

	public function i_updatePaymentData(int $aId_int, array $aTableItemData_a_arr):void
	{
		//$this->___updateData($aId_int, $aTableItemData_a_arr);
	}

	public function i_getAddedPaymentId():int
	{
		return $this->___getLastInsertId();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCPaymentsTableData::i_TABLE_NAME;
	}

	/*override*/protected function __generateContentTableData($aTableData_a_arr):CCTableData
	{
		return new CCPaymentsTableData($aTableData_a_arr);
	}
}


?>