<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


require_once(ROOT_EXTERNAL_PHP_DIRECTORY. './simplehtmldom_1_5/simple_html_dom.php');


final class CHTMLFileTools
{
	//REFERERS...
	private const _REFERERS								= [	'http://google.com/',
															'http://ya.ru/',
															'http://mail.ru/'];
	//...REFERERS

	//USER AGENTS...
	private const _USER_AGENTS							= ['Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0'];
	//...USER AGENTS

	//PROXIES...
	private const _PROXIES								= ['85.26.146.169:80'];
	//...PROXIES


	/***************************************************
	 * INTERFACE
	 */
	
	static public function i_createHTMLContent(string $aHTMLContent_str):\simple_html_dom
	{
		$l_obj = new \simple_html_dom();
		$l_obj->load($aHTMLContent_str);
		return $l_obj;
	}
	
	static public function i_loadHTMLFromFile(string $aFullFileName_str):\simple_html_dom
	{
		$l_obj = new \simple_html_dom();
		$l_obj->load_file($aFullFileName_str);
		return $l_obj;
	}

	static public function i_loadHTMLFromURL(string $aURL_str, bool $aOptAllowRandomLoadingAwaiting_bl = true, bool $aOptAllowLoadingViaProxy_bl = true):\simple_html_dom
	{
		if ($aOptAllowRandomLoadingAwaiting_bl)
		{
			sleep(2);
		}

		if ($aOptAllowLoadingViaProxy_bl)
		{
			$lCurl_res = \curl_init($aURL_str);
			if (!$lCurl_res)
			{
				new CException('i_loadHTMLFromURL', 'Init curl resource failed!');
			}

			$lUserAgent_str = self::_USER_AGENTS[rand(0, count(self::_USER_AGENTS) - 1)];
			$lReferer_str = self::_REFERERS[rand(0, count(self::_REFERERS) - 1)];
			$lProxy_str = self::_PROXIES[rand(0, count(self::_PROXIES) - 1)];

			$lCurlParams_obj_arr	= [	CURLOPT_PROXY				=> $lProxy_str,
										CURLOPT_USERAGENT			=> $lUserAgent_str,
										CURLOPT_REFERER				=> $lReferer_str,
										CURLOPT_FOLLOWLOCATION		=> true,
										CURLOPT_RETURNTRANSFER		=> true,
										CURLOPT_HTTPPROXYTUNNEL		=> false,
										CURLOPT_CONNECTTIMEOUT		=> 20,
										CURLOPT_TIMEOUT				=> 20,
										CURLOPT_MAXREDIRS			=> 10,
										CURLOPT_HEADER				=> false,
										CURLOPT_FAILONERROR			=> true,
										CURLOPT_SSL_VERIFYPEER		=> 0,
										CURLOPT_SSL_VERIFYHOST		=> 0];

			\curl_setopt_array($lCurl_res, $lCurlParams_obj_arr);
			$l_str = \curl_exec($lCurl_res);
			$l_str = \curl_error($lCurl_res);
			\curl_close($lCurl_res);
		}

		var_dump($l_str);

		$l_obj = new \simple_html_dom();

		if ($aOptAllowLoadingViaProxy_bl)
		{
			$l_obj->load($l_str);
		}
		else
		{
			$l_obj->load_file($aURL_str);
		}

		return $l_obj;
	}

	static public function i_isHTMLFileLoaded(\simple_html_dom $aHTML_obj):bool
	{
		return $aHTML_obj !== null;
	}
	
	static public function i_findHTMLElement(\simple_html_dom $aHTMLElement_obj, string $aHTMLTagsSearchPattern_str):\simple_html_dom
	{
		return $aHTMLElement_obj->find($aHTMLTagsSearchPattern_str, 0);
	}
	
	static public function i_findHTMLElements(\simple_html_dom $aHTMLElement_obj, string $aHTMLTagsSearchPattern_str):\simple_html_dom
	{
		return $aHTMLElement_obj->find($aHTMLTagsSearchPattern_str);
	}
	
	static public function i_getHTMLPlainText(\simple_html_dom $aHTMLElement_obj):string
	{
		return $aHTMLElement_obj->plaintext;
	}
	
	static public function i_getHTMLInnerText(\simple_html_dom $aHTMLElement_obj):string
	{
		return $aHTMLElement_obj->innertext;
	}
	
	static public function i_getHTMLOuterText(\simple_html_dom $aHTMLElement_obj):string
	{
		return $aHTMLElement_obj->outertext;
	}
	
	static public function i_createHTMLElementAsString(string $aHTMLElementName_str, string $aHTMLElementValue_str):string
	{
		return '<' .$aHTMLElementName_str. '>' .$aHTMLElementValue_str. '</' .$aHTMLElementName_str. '>';
	}
	
	static public function i_setHTMLElementValue(\simple_html_dom &$aHTMLElement_obj, string $aHTMLElementValue_str)
	{
		$aHTMLElement_obj->innertext = $aHTMLElementValue_str;
	}
	
	static public function i_addHTMLElementToEnd(\simple_html_dom &$aHTMLElement_obj, string $aHTMLElementName_str, string $aHTMLElementValue_str):void
	{
		$aHTMLElement_obj->innertext = $aHTMLElement_obj->innertext . self::i_createHTMLElementAsString($aHTMLElementName_str, $aHTMLElementValue_str);
	}
	
	static public function i_removeHTMLElement(\simple_html_dom &$aHTMLElement_obj):void
	{
		$aHTMLElement_obj->outertext = '';
	}
	
	static public function i_saveHTMLFile(\simple_html_dom $aHTML_obj, string $aFullFileName_str):void
	{
		if (!self::i_isHTMLFileLoaded($aHTML_obj))
		{
			new CException('i_saveHTMLFile', 'HTML file is not loaded!');
		}
		self::_throwIfFileExist($aFullFileName_str);
		$aHTML_obj->save($aFullFileName_str);
	}
	
	static public function i_resaveHTMLFile(\simple_html_dom $aHTML_obj, string $aFullFileName_str):void
	{
		if (!self::i_isHTMLFileLoaded($aHTML_obj))
		{
			new CException('i_resaveHTMLFile', 'HTML file is not loaded!');
		}
		self::_throwIfFileNotExist($aFullFileName_str);
		$aHTML_obj->save($aFullFileName_str);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/
	 
	static private function _throwIfFileNotExist(string $aFullFileName_str)
	{
		if (!CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileNotExist', 'HTML file not exist: ' .$aFullFileName_str);
		}
	}
	
	static private function _throwIfFileExist(string $aFullFileName_str)
	{
		if (CFileSystemTools::i_isFileExist($aFullFileName_str))
		{
			new CException('_throwIfFileExist', 'HTML file not exist: ' .$aFullFileName_str);
		}
	}
}


?>