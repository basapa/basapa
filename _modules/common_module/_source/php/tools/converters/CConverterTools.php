<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CConverterTools
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_getSizeInKBytes($aSizeInBytes_int):float
	{
		return CVariableTools::i_toNumber($aSizeInBytes_int / 1024);
	}

	static public function i_getSizeInMBytes($aSizeInBytes_int):float
	{
		return CVariableTools::i_toNumber($aSizeInBytes_int / (1024 * 1024));
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>