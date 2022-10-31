<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCError404PageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
	}

	/*override*/protected function __getResponseHTTPCode():int
	{
		return CHostData::i_NATIVE_HTTP_CODE_NOT_FOUND;
	}
}


?>