<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBMainPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		parent::__update();

		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		$lJOBMySQLDatabaseTablesController_clss = $this->__getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController();

		$lMySQLDatabaseRegionsTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseRegionsTableController();
		$lMySQLDatabaseRegionsTableController_clss->___retrieveData(
																		[
																			CCMySQLDatabaseRegionsTableController::i_QUERY_PARAM_ID_STATES	=> [CCSTableData::i_CONTENT_STATE_ID_ACTIVATED]
																		],
																		null,
																		CCCitiesSTableData::i_TABLE_FIELD_ID
																	);

		//temporary while tomsk region only
		$lMySQLDatabaseCitiesTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseCitiesTableController();
		$lMySQLDatabaseCitiesTableController_clss->___retrieveData(
																		[
																			CCMySQLDatabaseCitiesTableController::i_QUERY_PARAM_ID_STATES		=> [CCSTableData::i_CONTENT_STATE_ID_ACTIVATED],
																			CCMySQLDatabaseCitiesTableController::i_QUERY_PARAM_ID_REGION_ID	=> 2/*tomsk*/
																		],
																		null,
																		CCCitiesSTableData::i_TABLE_FIELD_ID
																	);
	}
}


?>