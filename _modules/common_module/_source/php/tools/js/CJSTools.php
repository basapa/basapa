<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CJSTools
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_convertArrayToJSArray(array $a_obj_arr):string
	{
		if (!isset($a_obj_arr))
		{
			new CException('i_convertArrayToJSArray', 'Invalid arg: ' .$a_obj_arr);
		}
		
		$lJSArray_str = '';
		
		$lCount_int = count($a_obj_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lJSArrayElementsSeparator_str = $i === 0 ? '' : ',';
			$lJSArray_str .= $lJSArrayElementsSeparator_str . $a_obj_arr[$i];
		}
		
		return $lJSArray_str;
	}

	static public function i_convertAssociativeArrayToJSObject(array $a_obj_arr):string
	{
		if (!isset($a_obj_arr))
		{
			new CException('i_convertAssociativeArrayToJSObject', 'Invalid arg: ' .$a_obj_arr);
		}
		
		$lJSArray_str = '';
		
		$lIndex_int = 0;
		foreach ($a_obj_arr as $lName_str => $lValue_str)
		{
			$lJSArrayElementsSeparator_str = $lIndex_int === 0 ? '' : ';';
			$lJSArray_str .= $lJSArrayElementsSeparator_str . $lName_str. ':' .$lValue_str;
			$lIndex_int++;
		}
		
		return $lJSArray_str;
	}
	
	static public function i_convertMultiArrayToJSArray(array $a_obj_arr):string
	{
		if (!isset($a_obj_arr))
		{
			new CException('i_convertMultiArrayToJSArray', 'Invalid arg: ' .$a_obj_arr);
		}
		
		$lJSArray_str = '';
		
		$lCount_int = count($a_obj_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lJSArrayElementsSeparator_str = $i == 0 ? '' : '|';
			$lJSArray_str .= $lJSArrayElementsSeparator_str . self::i_convertArrayToJSArray($a_obj_arr[$i]);
		}
		
		return $lJSArray_str;
	}

	static public function i_convertMultiAssociativeArrayToJSObject(array $a_obj_arr):string
	{
		if (!isset($a_obj_arr))
		{
			new CException('i_convertMultiAssociativeArrayToJSObject', 'Invalid arg: ' .$a_obj_arr);
		}
		
		$lJSArray_str = '';
		
		$lIndex_int = 0;
		foreach ($a_obj_arr as $lElement_obj)
		{
			$lJSArrayElementsSeparator_str = $lIndex_int == 0 ? '' : '|';
			$lJSArray_str .= $lJSArrayElementsSeparator_str . self::i_convertAssociativeArrayToJSObject($lElement_obj);
			$lIndex_int++;
		}
		
		return $lJSArray_str;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>