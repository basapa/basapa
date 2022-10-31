<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CJOBContentTableData extends CCContentTableData
{
	//DATABASE PHP AGREEMENTS...
	public const i_TABLE_NAME								= 'job_content';

	public const i_TABLE_FIELD_CAPTION						= 'caption';				//char(128)
	public const i_TABLE_FIELD_WAGE_FROM					= 'wage_from';				//smallint(6)
	public const i_TABLE_FIELD_WAGE_TO						= 'wage_to';				//smallint(6)
	public const i_TABLE_FIELD_WAGE_CURRENCY				= 'wage_currency';			//char(3)
	public const i_TABLE_FIELD_DESCRIPTION					= 'description';			//text(256)
	public const i_TABLE_FIELD_EMPLOYER						= 'employer';				//char(64)
	public const i_TABLE_FIELD_EMPLOYER_CITY_ID				= 'employer_city_id';		//smallint(5)
	public const i_TABLE_FIELD_EXPERIENCE_TYPE_ID			= 'experience_type_id';		//tiny(3)
	public const i_TABLE_FIELD_SCHEDULE_TYPE_ID				= 'schedule_type_id';		//tiny(3)
	public const i_TABLE_FIELD_SOURCE_ID					= 'source_id';				//char(64)
	public const i_TABLE_FIELD_EXTERNAL_SOURCE_ID			= 'external_source_id';		//char(255)
	//...DATABASE PHP AGREEMENTS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBContentTableData*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	/*override*/public function i_getTableName():string
	{
		return self::i_TABLE_NAME;
	}

	public function i_isTableFieldCaptionDefined():bool
	{
		return !empty($this->i_getTableFieldCaption());
	}

	public function i_getTableFieldCaption():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_CAPTION);
	}

	public function i_getTableFieldWageFrom():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_WAGE_FROM));
	}

	public function i_getTableFieldWageTo():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_WAGE_TO));
	}

	public function i_getTableFieldWageCurrency():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_WAGE_CURRENCY);
	}

	public function i_getTableFieldDescription():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_DESCRIPTION);
	}

	public function i_getTableFieldEmployer():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_EMPLOYER);
	}

	public function i_getTableFieldEmployerCityId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_EMPLOYER_CITY_ID));
	}

	public function i_getTableFieldExperienceTypeId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_EXPERIENCE_TYPE_ID));
	}

	public function i_getTableFieldScheduleTypeId():int
	{
		return CVariableTools::i_toInt($this->__getTableFieldStringValue(self::i_TABLE_FIELD_SCHEDULE_TYPE_ID));
	}

	public function i_getTableFieldSourceId():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_SOURCE_ID);
	}

	public function i_getTableFieldExternalSourceId():string
	{
		return $this->__getTableFieldStringValue(self::i_TABLE_FIELD_EXTERNAL_SOURCE_ID);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>