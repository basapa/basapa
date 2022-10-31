<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CRequestTools
{
	//REQUEST METHODS (do not modify)...
	public const i_REQUEST_METHOD_POST					= 'POST';
	public const i_REQUEST_METHOD_GET					= 'GET';
	//...REQUEST METHODS (do not modify)
	
	//REQUEST CONTENT TYPES (do not modify)...
	public const i_REQUEST_CONTENT_TYPE_IMAGE_PNG		= 'Content-type:image/png';
	public const i_REQUEST_CONTENT_TYPE_TEXT_HTML		= 'Content-type:text/HTML';
	//...REQUEST CONTENT TYPES (do not modify)
	
	
	/***************************************************
	 * INTERFACE
	 */

	static public function i_sendRequest(string $aRequestURL_str, array $aRequestContentParams_a_arr, string $aRequestContentType_str, bool $aOptSecureMode_bl = true, string $aOptRequestMethod_str = self::i_REQUEST_METHOD_POST)
	{
		$lContext_res = stream_context_create(['http'	=> ['method'	=> $aOptRequestMethod_str,
															'header'	=> $aRequestContentType_str,
															'content'	=> http_build_query($aRequestContentParams_a_arr)]
												]);
		return CFileTools::i_getFileAllContentAsString(CURLTools::i_applyHTTPURL($aRequestURL_str, $aOptSecureMode_bl), $lContext_res);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>