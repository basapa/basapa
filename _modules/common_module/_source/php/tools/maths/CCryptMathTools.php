<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CCryptMathTools
{
	/***************************************************
	 * INTERFACE
	 */

	static public function i_randomInt(int $aMin_int, int $aMax_int):int
	{
		return random_int($aMin_int, $aMax_int);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>