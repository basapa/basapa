<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CVariableTools
{
	//VARIABLE TYPES (do not modify)...
	public const i_VARIABLE_TYPE_INT					= 'integer';
	public const i_VARIABLE_TYPE_NUMBER					= 'float';
	public const i_VARIABLE_TYPE_STRING					= 'string';
	public const i_VARIABLE_TYPE_BOOLEAN				= 'boolean';
	public const i_VARIABLE_TYPE_OBJECT					= 'object';
	public const i_VARIABLE_TYPE_ARRAY					= 'array';
	public const i_VARIABLE_TYPE_RESOURCE				= 'resource';
	//...VARIABLE TYPES (do not modify)

	public const i_INTEGER_MIN_VALUE					= PHP_INT_MIN;
	public const i_INTEGER_MAX_VALUE					= PHP_INT_MAX;
	public const i_NUMBER_MIN_VALUE						= PHP_FLOAT_MIN;
	public const i_NUMBER_MAX_VALUE						= PHP_FLOAT_MAX;


	/***************************************************
	 * INTERFACE
	 */

	static public function i_getType($a_var):string
	{
		return gettype($a_var);
	}

	static public function i_isClassInstance($a_clss, string $aClassName_str):bool
	{
		return is_a($a_clss, $aClassName_str);
	}
	
	static public function i_isInt($a_var):bool
	{
		return is_int($a_var);
	}
	
	static public function i_isNumber($a_var):bool
	{
		return is_float($a_var);
	}
	
	static public function i_isString($a_var):bool
	{
		return is_string($a_var);
	}

	static public function i_isStringEmpty($a_var):bool
	{
		return empty($a_var);
	}

	static public function i_isBoolean($a_var):bool
	{
		return is_bool($a_var);
	}
	
	static public function i_isObject($a_var):bool
	{
		return is_object($a_var);
	}
	
	static public function i_isArray($a_var):bool
	{
		return is_array($a_var);
	}

	static public function i_isAssocArray($a_var):bool
	{
		if (self::i_isArray($a_var))
		{
			$lKeys_var_arr = CArrayTools::i_getKeys($a_var);
			return CArrayTools::i_getKeys($lKeys_var_arr) !== $lKeys_var_arr;
		}
		return false;
	}

	static public function i_toInt($a_var):int
	{
		return intval($a_var);
	}

	static public function i_toIntArray($a_var):array
	{
		self::i_throwIfNotArray($a_var);

		$l_int_arr = [];

		foreach ($a_var as $l_var)
		{
			$l_int_arr[] = self::i_toInt($l_var);
		}

		return $l_int_arr;
	}

	static public function i_toNumber($a_var):float
	{
		return floatval($a_var);
	}
	
	static public function i_toString($a_var):string
	{
		return strval($a_var);
	}
	
	static public function i_toBoolean($a_var):bool
	{
		return boolval($a_var);
	}
	
	static public function i_throwIfNotInt($a_var):void
	{
		if (!self::i_isInt($a_var))
		{
			new CException('i_throwIfNotInt', 'Value not int: ' .$a_var);
		}
	}
	
	static public function i_throwIfNotNumber($a_var):void
	{
		if (!self::i_isNumber($a_var))
		{
			new CException('i_throwIfNotNumber', 'Value not number: ' .$a_var);
		}
	}
	
	static public function i_throwIfNotString($a_var):void
	{
		if (!self::i_isString($a_var))
		{
			new CException('i_throwIfNotString', 'Value not string: ' .$a_var);
		}
	}
	
	static public function i_throwIfNotBoolean($a_var):void
	{
		if (!self::i_isBoolean($a_var))
		{
			new CException('i_throwIfNotBoolean', 'Value not boolean: ' .$a_var);
		}
	}
	
	static public function i_throwIfNotObject($a_var):void
	{
		if (!self::i_isObject($a_var))
		{
			new CException('i_throwIfNotObject', 'Value not object: ' .$a_var);
		}
	}
	
	static public function i_throwIfNotArray($a_var_arr):void
	{
		if (!self::i_isArray($a_var_arr))
		{
			new CException('i_throwIfNotArray', 'Value not array: ' .$a_var_arr);
		}
	}
	
	static public function i_throwIfNotAssocArray($a_a_arr):void
	{
		if (!self::i_isAssocArray($a_a_arr))
		{
			new CException('i_throwIfNotAssocArray', 'Value not assoc array: ' .$a_a_arr);
		}
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>