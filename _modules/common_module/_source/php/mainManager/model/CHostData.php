<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CHostData
{
	//RESPONSE HTTP HEADERS...
	public const i_RESPONSE_HTTP_HEADER_JSON_CONTENT_TYPE	= 0;
	public const i_RESPONSE_HTTP_HEADER_TEXT_CONTENT_TYPE	= 1;
	//...RESPONSE HTTP HEADERS

	//REDIRECT TYPES...
	public const i_REDIRECT_TYPE_UNKNOWN				= -1;
	public const i_REDIRECT_TYPE_META					= 0;
	public const i_REDIRECT_TYPE_301					= 1;
	public const i_REDIRECT_TYPE_302					= 2;
	public const i_REDIRECT_TYPE_404					= 3;
	public const i_REDIRECT_TYPE_500					= 4;
	//...REDIRECT TYPES

	//NATIVE HTTP CODES...
	public const i_NATIVE_HTTP_CODE_UNDEFINED				= 0;
	public const i_NATIVE_HTTP_CODE_OK						= 200;
	public const i_NATIVE_HTTP_CODE_MOVED_PERMANENTLY		= 301;
	public const i_NATIVE_HTTP_CODE_MOVED_TEMPORARILY		= 302;
	public const i_NATIVE_HTTP_CODE_FORBIDDEN				= 403;
	public const i_NATIVE_HTTP_CODE_NOT_FOUND				= 404;
	public const i_NATIVE_HTTP_CODE_INTERNAL_SERVER_ERROR	= 500;
	//...NATIVE HTTP CODES


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getNativeRequestParams():array
	{
		return $_REQUEST;
	}

	static public function i_getNativeServerParams():array
	{
		return $_SERVER;
	}

	public function i_sendSimpleRedirect(string $aRedirectURL_str, bool $aOptReplacePreviousSimilarHeader_bl = true, int $aOptHTTPResponceCode_int = self::i_NATIVE_HTTP_CODE_MOVED_TEMPORARILY):void
	{
		$this->_sendHTTPHeader('Location: ' .$aRedirectURL_str, $aOptReplacePreviousSimilarHeader_bl, $aOptHTTPResponceCode_int);
		exit;
	}

	public function i_setMetaRedirect(string $aRedirectURL_str, int $aOptRedirectAwaitingTime_int = 0):void
	{
		echo '<meta http-equiv="refresh" content="' .$aOptRedirectAwaitingTime_int. '; URL=' .$aRedirectURL_str. '/">';
	}

	public function i_setJSRedirect(string $aRedirectURL_str, int $aOptRedirectAwaitingTime_int = 0):void
	{
		echo '<script>setTimeout(\'location="' .$aRedirectURL_str. '";\', ' .$aOptRedirectAwaitingTime_int. ' );</script>';
	}

	public function i_sendRedirect(array $aStaticParams_a_arr, array $aOptDynamicParams_a_arr = null, int $aOptRedirectType_int = CHostData::i_REDIRECT_TYPE_UNKNOWN, int $aOptRedirectAwaitingTime_int = 0):void
	{
		$lRedirectURL_str = CURLTools::i_generateURLByParams($aStaticParams_a_arr, $aOptDynamicParams_a_arr);

		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			CLogFile::i_writeContentInLogFile('REDIRECT: ' .$lRedirectURL_str);
		}

		if (
				$aOptRedirectAwaitingTime_int !== 0
				&& $aOptRedirectType_int !== CHostData::i_REDIRECT_TYPE_META
			)
		{
			new CException('i_sendRedirect', 'ILE!');
		}

		switch ($aOptRedirectType_int)
		{
			case CHostData::i_REDIRECT_TYPE_301:
			{
				CHostData::i_sendSimpleRedirect($lRedirectURL_str, true, self::i_NATIVE_HTTP_CODE_MOVED_PERMANENTLY);
			}break;

			case CHostData::i_REDIRECT_TYPE_302:
			{
				CHostData::i_sendSimpleRedirect($lRedirectURL_str, true, self::i_NATIVE_HTTP_CODE_MOVED_TEMPORARILY);
			}break;

			case CHostData::i_REDIRECT_TYPE_404:
			{
				CHostData::i_sendSimpleRedirect($lRedirectURL_str, true, self::i_NATIVE_HTTP_CODE_NOT_FOUND);
			}break;

			case CHostData::i_REDIRECT_TYPE_500:
			{
				CHostData::i_sendSimpleRedirect($lRedirectURL_str, true, self::i_NATIVE_HTTP_CODE_INTERNAL_SERVER_ERROR);
			}break;

			case CHostData::i_REDIRECT_TYPE_META:
			{
				CHostData::i_setMetaRedirect($lRedirectURL_str, $aOptRedirectAwaitingTime_int);
			}break;

			default:
				CHostData::i_sendSimpleRedirect($lRedirectURL_str);
			break;
		}

		exit;
	}

	public function i_sendResponseHTTPStringCode(int $aResponseHTTPCode_int):void
	{
		$lHeaderValue_str = '';

		switch ($aResponseHTTPCode_int)
		{
			case CHostData::i_NATIVE_HTTP_CODE_OK:
			{
				$lHeaderValue_str = 'HTTP/1.1 200 OK';
			}break;

			case CHostData::i_NATIVE_HTTP_CODE_MOVED_PERMANENTLY:
			{
				$lHeaderValue_str = 'HTTP/1.1 301 Moved Permanently';
			}break;

			case CHostData::i_NATIVE_HTTP_CODE_MOVED_TEMPORARILY:
			{
				$lHeaderValue_str = 'HTTP/1.1 302 Moved Temporarily';
			}break;

			case CHostData::i_NATIVE_HTTP_CODE_FORBIDDEN:
			{
				$lHeaderValue_str = 'HTTP/1.1 403 Forbidden';
			}break;

			case CHostData::i_NATIVE_HTTP_CODE_NOT_FOUND:
			{
				$lHeaderValue_str = 'HTTP/1.1 404 Not Found';
			}break;

			case CHostData::i_NATIVE_HTTP_CODE_INTERNAL_SERVER_ERROR:
			{
				$lHeaderValue_str = 'HTTP/1.1 500 Internal Server Error';
			}break;

			default:
				new CException('i_sendResponseHTTPStringCode', 'Invalid HTTP code: ' .$aResponseHTTPCode_int);
			break;
		}

		$this->_sendHTTPHeader($lHeaderValue_str);
	}

	public function i_sendHTTPHeader(int $aResponseHTTPHeaderType_int):void
	{
		$lHeaderValue_str = '';

		switch ($aResponseHTTPHeaderType_int)
		{
			case CHostData::i_RESPONSE_HTTP_HEADER_JSON_CONTENT_TYPE:
			{
				$lHeaderValue_str = 'Content-Type: application/json';
			}break;

			case CHostData::i_RESPONSE_HTTP_HEADER_TEXT_CONTENT_TYPE:
			{
				$lHeaderValue_str = 'Content-Type: text/html';
			}break;

			default:
				new CException('i_sendHTTPHeader', 'Invalid HTTP header type: ' .$aResponseHTTPHeaderType_int);
			break;
		}

		$this->_sendHTTPHeader($lHeaderValue_str);
	}

	public function i_isServerParamDefined(string $aServerParamId_str):bool
	{
		return isset(self::i_getNativeServerParams()[$aServerParamId_str]);
	}

	public function i_getServerParamDocumentRoot(bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam('DOCUMENT_ROOT', $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_getServerParamHttpHost(bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam('HTTP_HOST', $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_getServerParamHttpReferer(bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam('HTTP_REFERER', $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}
	
	public function i_getServerParamHttpUserAgent(bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam('HTTP_USER_AGENT', $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_getServerParamRemoteAddr(bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam('REMOTE_ADDR', $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_isServerRemoteAddrAsLocahost():bool
	{
		return $this->i_getServerParamRemoteAddr() === '127.0.0.1';
	}

	public function i_getServerParamRequestURI(bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam('REQUEST_URI', $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_getServerParam(string $aServerParamName_str, bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getServerParam($aServerParamName_str, $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_isRequestParamDefined(string $aRequestParamId_str):bool
	{
		return isset(self::i_getNativeRequestParams()[$aRequestParamId_str]);
	}

	public function i_getRequestParam(string $aRequestParamName_str, bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		return $this->_getRequestParam($aRequestParamName_str, $aOptThrowIsNotExist_bl, $aOptRetValueIfNotExist_var);
	}

	public function i_getCurrentURL():string
	{
		return CURLTools::i_applyHTTPURL($this->i_getServerParamHttpHost() . $this->i_getServerParamRequestUri());
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _sendHTTPHeader(string $a_str, bool $aOptReplacePreviousSimilarHeader_bl = true, int $aOptHTTPResponceCode_int = self::i_NATIVE_HTTP_CODE_UNDEFINED):void
	{
		header($a_str, $aOptReplacePreviousSimilarHeader_bl, $aOptHTTPResponceCode_int);
	}

	private function _getServerParam(string $aServerParamId_str, bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		if (!$this->i_isServerParamDefined($aServerParamId_str))
		{
			if ($aOptThrowIsNotExist_bl)
			{
				new CException('_getServerParam', 'Server param not exist: ' .$aServerParamId_str);
			}
			return $aOptRetValueIfNotExist_var;
		}
		return self::i_getNativeServerParams()[$aServerParamId_str];
	}

	private function _getRequestParam(string $aRequestParamId_str, bool $aOptThrowIsNotExist_bl = true, $aOptRetValueIfNotExist_var = null):?string
	{
		if (!$this->i_isRequestParamDefined($aRequestParamId_str))
		{
			if ($aOptThrowIsNotExist_bl)
			{
				new CException('_getRequestParam', 'Request param not exist: ' .$aRequestParamId_str);
			}
			return $aOptRetValueIfNotExist_var;
		}
		return self::i_getNativeRequestParams()[$aRequestParamId_str];
	}
}


?>