<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentTableQueriesData extends CCContentTableQueriesData
{
	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	/**@return CJOBContentTableData*/
	/*override internal*/public function ___getSelectDataById():CCTableData
	{
		return parent::___getSelectDataById();
	}
	//...SELECT
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>