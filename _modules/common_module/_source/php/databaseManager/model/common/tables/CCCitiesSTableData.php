<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCCitiesSTableData extends CCSTableData
{
	public const i_TABLE_NAME							= 'c_cities_s';

	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_FIELD_STRING_ID				= 'string_id';		//char(32)
	public const i_TABLE_FIELD_REGION_ID				= 'region_id';		//smallint(4)
	public const i_TABLE_FIELD_COUNTRY_ID				= 'country_id';		//smallint(4)
	//...DATABASE PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CCCitiesSTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getTableFieldStringId():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_STRING_ID);
	}

	public function i_getTableFieldRegionId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_REGION_ID));
	}

	public function i_getTableFieldCountryId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_COUNTRY_ID));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>