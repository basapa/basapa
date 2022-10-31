<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCCountriesSTableData extends CCSTableData
{
	public const i_TABLE_NAME							= 'c_countries_s';

	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_STRING_ID				= 'string_id';		//char(32)
	//...DATABASE PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCCountriesSTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getTableFieldStringId():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_STRING_ID);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>