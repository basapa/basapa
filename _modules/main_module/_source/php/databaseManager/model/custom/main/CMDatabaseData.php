<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CMDatabaseData extends CCDatabaseData
{
	private $_fUsersTableData_clss;


	/***************************************************
	 * INTERFACE
	 */

	public function i_getUsersTableData()
	{
		return $this->_getUsersTableData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getUsersTableData()
	{
		return isset($this->_fUsersTableData_clss) ? $this->_fUsersTableData_clss : ($this->_fUsersTableData_clss = new CMUsersTableData());
	}
}


?>