<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCCurrenciesSTableData extends CCSTableData
{
	public const i_TABLE_NAME							= 'c_currencies_s';


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCCurrenciesSTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>