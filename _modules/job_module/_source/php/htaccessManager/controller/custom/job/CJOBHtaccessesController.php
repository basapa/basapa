<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBHtaccessesController extends CCHtaccessesController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/**@return CJOBURLRewritingHtaccessController*/
	/*override*/protected function __generateURLRewritingHtaccessController():CCURLRewritingHtaccessController
	{
		return new CJOBURLRewritingHtaccessController();
	}
}


?>