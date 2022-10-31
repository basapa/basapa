<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CMMysqlDatabaseCountriesTableController extends CCMysqlDatabaseTableController
{
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getTableName()
	{
		return CMUserTableData::i_TABLE_NAME;
	}
}


?>