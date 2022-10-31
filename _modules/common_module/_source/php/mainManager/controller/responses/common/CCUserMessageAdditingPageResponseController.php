<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserMessageAdditingPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		$lSupportedGetParams_str_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE,
											CCRequestParamConst::i_GET_PARAM_ID_PAGE,
											CCRequestParamConst::i_GET_PARAM_ID_LANG];
		$this->__validateSupportedGETParams($lSupportedGetParams_str_arr);

		$lHostData_clss = $this->__getMainData()->i_getHostData();
		$lHostData_clss->i_setHttpHeader(CHostData::i_RESPONSE_HEADER_TYPE_OK);

		/*$lTableQueriesData_clss = $this->__getDatabaseTablesController()->getMainMySQLDatabaseTablesController()->getMySQLDatabaseJOBSizesListTableController()->getJOBSizesListData();
		if (!isset($lTableQueriesData_clss))
		{
			new CException('__update', CException::ERROR_MESSAGE_DATA_RECEIVING_FAILED, CException::EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}*/
	}
}


?>