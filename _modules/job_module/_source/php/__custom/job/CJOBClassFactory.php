<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:-2
*/
namespace basapa_ns;


final class CJOBClassFactory extends CCClassFactory
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*override*/protected function __getHtaccesConstClassName():string
	{
		return 'CJOBHtaccesConst';
	}
	
	/*override*/protected function i_getRequestParamConstClassName():string
	{
		return 'CJOBRequestParamConst';
	}
}


?>