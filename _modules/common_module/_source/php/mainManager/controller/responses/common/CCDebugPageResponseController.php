<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCDebugPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getSupportedGETParams():array
	{
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_RELEASE)
		{
			new CException('__getSupportedGETParams', 'Debug page allowed in DEBUG mode only!', CException::i_EXCEPTION_TYPE_UNSUPPORTED_PAGE);
		}

		return [CCRequestParamConst::i_GET_PARAM_ID_SITE,
				CCRequestParamConst::i_GET_PARAM_ID_PAGE,
				CCRequestParamConst::i_GET_PARAM_ID_LANG];
	}

	/*override*/protected function __getResponseHTTPCode():int
	{
		return CHostData::i_NATIVE_HTTP_CODE_OK;
	}
}


?>