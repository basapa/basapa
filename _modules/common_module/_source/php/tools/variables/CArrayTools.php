<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CArrayTools
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_isArrayDefined(?array $a_var_arr):bool
	{
		return isset($a_var_arr);
	}

	static public function i_isEmptyArray(?array $a_var_arr):bool
	{
		return CArrayTools::i_isArrayDefined($a_var_arr)
				&& empty($a_var_arr);
	}

	static public function i_diff(array $a1_var_arr, array $a2_var_arr):array
	{
		if (
				!CVariableTools::i_isArray($a1_var_arr)
				|| !CVariableTools::i_isArray($a1_var_arr)
			)
		{
			new CException('i_diff', 'Invalid args!');
		}

		return array_diff($a1_var_arr, $a2_var_arr);
	}

	static public function i_merge(array $a1_var_arr, array $a2_var_arr):array
	{
		if (
				!CVariableTools::i_isArray($a1_var_arr)
				|| !CVariableTools::i_isArray($a1_var_arr)
			)
		{
			new CException('i_merge', 'Invalid args!');
		}

		return array_merge($a1_var_arr, $a2_var_arr);
	}

	static public function i_rand(array $a_var_arr, int $aOptCount_int = 1)
	{
		if (
				!CVariableTools::i_isArray($a_var_arr)
				|| !CVariableTools::i_isInt($aOptCount_int)
			)
		{
			new CException('i_rand', 'Invalid args!');
		}

		return array_rand($a_var_arr, $aOptCount_int);
	}

	static public function i_splice(array $a_var_arr, int $aOffset_int, int $aLength_int):array
	{
		if (
				!CVariableTools::i_isArray($a_var_arr)
				|| !CVariableTools::i_isInt($aOffset_int)
				|| !CVariableTools::i_isInt($aLength_int)
			)
		{
			new CException('i_splice', 'Invalid args!');
		}

		return array_splice($a_var_arr, $aOffset_int, $aLength_int);
	}

	static public function i_join(array $a_var_arr, string $aSeparator_str):string
	{
		if (
				!CVariableTools::i_isArray($a_var_arr)
				|| !CVariableTools::i_isString($aSeparator_str)
			)
		{
			new CException('i_join', 'Invalid args!');
		}

		return implode($aSeparator_str, $a_var_arr);
	}

	static public function i_getUniqueValues(array $a_var_arr):array
	{
		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_getUniqueValues', 'Invalid args!');
		}

		return array_unique($a_var_arr);
	}

	static public function i_insertAtStart(array &$a_var_arr, $aValue_var):void
	{
		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_insertAtStart', 'Invalid args!');
		}

		array_unshift($a_var_arr, $aValue_var);
	}

	/**$return int|string*/
	static public function i_extractLastValue(array &$a_var_arr)
	{
		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_extractLastValue', 'Invalid args!');
		}

		return array_pop($a_var_arr);
	}

	static public function i_count(?array $a_var_arr, bool $aOptAllowNullValue_bl = false):int
	{
		if (
				$aOptAllowNullValue_bl
				&& !isset($a_var_arr)
			)
		{
			return 0;
		}

		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_count', 'Invalid arg!');
		}

		return count($a_var_arr);
	}

	static public function i_isInArray($aValue_var, array $a_var_arr):bool
	{
		if (
				!CVariableTools::i_isArray($a_var_arr)
				||
				(
					!CVariableTools::i_isInt($aValue_var)
					&& !CVariableTools::i_isNumber($aValue_var)
					&& !CVariableTools::i_isString($aValue_var)
				)
			)
		{
			new CException('i_isValueExist', 'Invalid args!');
		}

		return in_array($aValue_var, $a_var_arr);
	}
	
	/**$return int|string*/
	static public function i_getLastValue(array $a_var_arr, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null)
	{
		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_getLastValue', 'Invalid arg!');
		}

		$l_var = end($a_var_arr);
		if ($l_var === false)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('i_getLastValue', 'Failed: ' .self::i_toString($a_var_arr));
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}

	static public function i_isKeyExist($aValue_var, array $a_var_arr):bool
	{
		if (
				!CVariableTools::i_isArray($a_var_arr)
				||
				(
					!CVariableTools::i_isInt($aValue_var)
					&& !CVariableTools::i_isNumber($aValue_var)
					&& !CVariableTools::i_isString($aValue_var)
				)
			)
		{
			new CException('i_isKeyExist', 'Invalid args!');
		}

		return array_key_exists($aValue_var, $a_var_arr);
	}

	static public function i_getKeys(array $a_var_arr):array
	{
		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_getKeys', 'Invalid arg!');
		}

		return array_keys($a_var_arr);
	}

	/*static public function i_isValueExist($aValue_var, array $a_var_arr):bool
	{
		if (
				!CVariableTools::i_isArray($a_var_arr)
				||
				(
					!CVariableTools::i_isInt($aValue_var)
					&& !CVariableTools::i_isNumber($aValue_var)
					&& !CVariableTools::i_isString($aValue_var)
				)
			)
		{
			new CException('i_isValueExist', 'Invalid args!');
		}

		return in_array($aValue_var, $a_var_arr);
	}*/

	static public function i_getValues(array $a_var_arr):array
	{
		if (!CVariableTools::i_isArray($a_var_arr))
		{
			new CException('i_getValues', 'Invalid arg!');
		}

		return array_values($a_var_arr);
	}

	static public function i_toString(?array $a_var_arr):string
	{
		if (
				isset($a_var_arr)
				&& !CVariableTools::i_isArray($a_var_arr)
			)
		{
			new CException('i_toString', 'Invalid arg!');
		}

		$l_str = '';

		if (isset($a_var_arr))
		{
			foreach ($a_var_arr as $lKey_var => $lValue_var)
			{
				if (
						CVariableTools::i_isArray($lValue_var)
						|| CVariableTools::i_isAssocArray($lValue_var)
					)
				{
					$lValue_var = self::i_toString($lValue_var);
				}

				$l_str .= '[\'' .CVariableTools::i_toString($lKey_var). '\' => \'' .CVariableTools::i_toString($lValue_var). '\'];';
			}
		}

		return $l_str;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>