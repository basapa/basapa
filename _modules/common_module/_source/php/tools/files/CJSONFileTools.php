<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CJSONFileTools
{
	/***************************************************
	 * INTERFACE
	 */
	
	static public function i_decodeJSON(string $aJSON_str):string
	{
		$l_var = json_decode($aJSON_str, true);
		if ($l_var === null)
		{
			new CException('i_decodeJSON', 'JSON decode failed: ' .json_last_error_msg());
		}
		
		return CVariableTools::i_toString($l_var);
	}
	
	static public function i_encodeJSON($a_a_arr):string
	{
		$l_var = json_encode($a_a_arr);
		if ($l_var === false)
		{
			new CException('i_encodeJSON', 'JSON encode failed: ' .json_last_error_msg());
		}
		
		return CVariableTools::i_toString($l_var);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
}


?>