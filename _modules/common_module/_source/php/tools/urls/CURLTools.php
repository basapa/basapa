<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CURLTools
{
	//URL COMPONENT IDS (do not modify)...
	public const i_URL_COMPONENT_ID_HOST				= PHP_URL_HOST;
	public const i_URL_COMPONENT_ID_STATIC_PATH			= PHP_URL_PATH;
	public const i_URL_COMPONENT_ID_DYNAMIC_PATH		= PHP_URL_QUERY;
	//...URL COMPONENT IDS (do not modify)
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*JS PHP AGREEMENTS REQUIRED*/
	static public function i_generateURLByParams(array $aStaticParams_a_arr, array $aOptDynamicParams_a_arr = null, bool $aOptIsSiteNameRequired_bl = true, bool $aOptUseAmpAsHTML_bl = true, string $aOptSiteName_str = SITE_FULL_NAME):string
	{
		$lURL_str = self::_convertStaticParamsToStaticURLString($aStaticParams_a_arr);

		if (isset($aOptDynamicParams_a_arr))
		{
			$lURL_str .= self::_convertDynamicParamsToDynamicURLString($aOptDynamicParams_a_arr, $aOptUseAmpAsHTML_bl);
		}

		return $aOptIsSiteNameRequired_bl ? $aOptSiteName_str . $lURL_str : '/'. $lURL_str;
	}

	static public function i_addDynamicParamsToStaticURL(string $aStaticURL_str, array $aDynamicParams_a_arr, bool $aOptIsSiteNameRequired_bl = true, bool $aOptUseAmpAsHTML_bl = true, string $aOptSiteName_str = SITE_FULL_NAME):string
	{
		$lDynamicURL_str = self::_convertDynamicParamsToDynamicURLString($aDynamicParams_a_arr, $aOptUseAmpAsHTML_bl);
		$lURL_str = $aStaticURL_str . $lDynamicURL_str;

		return $aOptIsSiteNameRequired_bl ? $aOptSiteName_str . $lURL_str : '/'. $lURL_str;
	}

	static public function i_applyHTTPURL(string $aURL_str, bool $aOptIsSecureMode_bl = false):string
	{
		$lProtocol_str = $aOptIsSecureMode_bl ? 'https:' : 'http:';

		$lSlashSymbolHTMLValue_str = CSymbolsTools::i_getSymbolHTMLValue(CSymbolsTools::i_SYMBOL_ID_SLASH);

		return $lProtocol_str . CStringTools::i_convertAllHTMLSymbolsToChars($lSlashSymbolHTMLValue_str . $lSlashSymbolHTMLValue_str) . $aURL_str;
	}

	static public function i_validateHTTPURL(string $aURL_str):bool
	{
		return CStringTools::i_searchRegEx($aURL_str, '/^(http)|(https):\/\/(.*)$/iu');
	}

	static public function i_validateURL(string $aURL_str):bool
	{
		return self::i_validateHTTPURL($aURL_str);
	}

	static public function i_applyFullSiteName(string $aFullFileName_str, string $aOptSiteFullName_str = SITE_FULL_NAME):string
	{
		return $aOptSiteFullName_str . $aFullFileName_str;
	}

	static public function i_removeNonURLChars(string $a_str):string
	{
		if (
				empty($a_str)
				|| !CVariableTools::i_isString($a_str)
			)
		{
			new CException('i_removeNonURLChars', 'String not valid: ' .$a_str);
		}

		$lChars_str_arr	= [	' '=>'-',	'#'=>'',	'$'=>'',	'\\'=>'-',	'/'=>'-',
							'*'=>'',	'('=>'',	')'=>'',	'?'=>'',	'_'=>'-',
							'+'=>'',	'='=>'',	'.'=>'',	','=>'',	';'=>'',
							':'=>'',	'"'=>'',	'\''=>'',	'№'=>'',	'%'=>'',
							'!'=>'',	'@'=>'',	'&'=>'',	'['=>'',	']'=>''];

		$a_str = CStringTools::i_toLowerCase(CStringTools::i_convertSpecialHTMLSymbolsToChars($a_str));

		return CStringTools::i_replaceArr([$a_str], CArrayTools::i_getKeys($lChars_str_arr), CArrayTools::i_getValues($lChars_str_arr))[0];
	}
	
	static public function i_getHostName(string $aURL_str, bool $aOptThrowIfNotFound_bl = true, $aOptRetValueIfNotFound_var = null):?string
	{
		return self::i_getURLComponent($aURL_str, self::i_URL_COMPONENT_ID_HOST, $aOptThrowIfNotFound_bl, $aOptRetValueIfNotFound_var);
	}
	
	static public function i_getDomainName(string $aURL_str, bool $aOptThrowIfNotFound_bl = true, $aOptRetValueIfNotFound_var = null):?string
	{
		$lHostName_str = self::i_getHostName($aURL_str, $aOptThrowIfNotFound_bl, $aOptRetValueIfNotFound_var);
		if ($lHostName_str === null)
		{
			return null;
		}

		$lHostNameParts_str_arr = CStringTools::i_split($lHostName_str, '.');
		
		if (CArrayTools::i_count($lHostNameParts_str_arr) !== 2)
		{
			if ($aOptThrowIfNotFound_bl)
			{
				new CException('i_getDomainName', 'Domain name not found: ' .$lHostName_str);
			}
			return $aOptRetValueIfNotFound_var;
		}
		
		return $lHostNameParts_str_arr[0];
	}
	
	static public function i_getSubdomainName(string $aURL_str, bool $aOptThrowIfNotFound_bl = true, $aOptRetValueIfNotFound_var = null):?string
	{
		$lHostName_str = self::i_getHostName($aURL_str, $aOptThrowIfNotFound_bl, $aOptRetValueIfNotFound_var);
		if ($lHostName_str === null)
		{
			return null;
		}

		$lHostNameParts_str_arr = CStringTools::i_split($lHostName_str, '.');
		
		if (CArrayTools::i_count($lHostNameParts_str_arr) !== 3)
		{
			if ($aOptThrowIfNotFound_bl)
			{
				new CException('i_getSubdomainName', 'Subdomain name not found: ' .$lHostName_str);
			}
			return $aOptRetValueIfNotFound_var;
		}
		
		return $lHostNameParts_str_arr[0];
	}
	
	static public function i_getStaticURLString(string $aURL_str):string
	{
		return self::i_getURLComponent($aURL_str, self::i_URL_COMPONENT_ID_STATIC_PATH);
	}
	
	static public function i_getDynamicURLString(string $aURL_str):string
	{
		return self::i_getURLComponent($aURL_str, self::i_URL_COMPONENT_ID_DYNAMIC_PATH);
	}
	
	static public function i_getURLComponent(string $aURL_str, int $aURLComponentId_int, bool $aOptThrowIfFailed_bl = true, $aOptRetValueIfFailed_var = null):?string
	{
		$l_var = parse_url($aURL_str, $aURLComponentId_int);
		if (
				$l_var === false
				|| $l_var === null
			)
		{
			if ($aOptThrowIfFailed_bl)
			{
				new CException('i_getURLComponent', 'Failed: ' .$aURL_str);
			}
			return $aOptRetValueIfFailed_var;
		}
		return $l_var;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*JS PHP AGREEMENTS REQUIRED*/
	static private function _convertStaticParamsToStaticURLString(array $aStaticParams_a_arr, array $aOptStaticURLNonMandatoriesParamsSequence_str_arr = null):string
	{
		if (!isset($aStaticParams_a_arr))
		{
			new CException('_convertStaticParamsToStaticURLString', 'Static params must be defined!');
		}

		//mandatories params...
		$lResult_str = self::_convertStaticParamToStaticURLString($aStaticParams_a_arr, CCRequestParamConst::i_GET_PARAM_ID_SITE);
		$lResult_str .= self::_convertStaticParamToStaticURLString($aStaticParams_a_arr, CCRequestParamConst::i_GET_PARAM_ID_PAGE);
		//...mandatories params
		
		if (!isset($aOptStaticURLNonMandatoriesParamsSequence_str_arr))
		{
			$lStaticGETParamsSequence_str_arr = CClassFactory::i_getInstance()->i_getClassFactory()->i_getHtaccesConstNSClassName()::i_STATIC_GET_PARAMS_SEQUENCE();
			foreach ($lStaticGETParamsSequence_str_arr as $lStaticGETParam_str)
			{
				$lResult_str .= self::_convertStaticParamToStaticURLString($aStaticParams_a_arr, $lStaticGETParam_str, false);
			}
		}
		else
		{
			$lCount_int = CArrayTools::i_count($aOptStaticURLNonMandatoriesParamsSequence_str_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$lResult_str .= self::_convertStaticParamToStaticURLString($aStaticParams_a_arr, $aOptStaticURLNonMandatoriesParamsSequence_str_arr[$i]);
			}
		}

		return $lResult_str;
	}

	/*JS PHP AGREEMENTS REQUIRED*/
	static private function _convertDynamicParamsToDynamicURLString(array $aDynamicParams_a_arr, bool $aOptUseHTMLAmp_bl = true):string
	{
		if (!isset($aDynamicParams_a_arr))
		{
			new CException('_convertDynamicParamsToDynamicURLString', 'Dynamic params must be defined!');
		}

		$lResult_str = '';
		$lIndex_int = 0;
		$lAmp_str = $aOptUseHTMLAmp_bl ? CSymbolsTools::i_getSymbolMnemonicValue(CSymbolsTools::i_SYMBOL_ID_AMP) : CSymbolsTools::i_getSymbolStringValue(CSymbolsTools::i_SYMBOL_ID_AMP);

		//http_build_query

		foreach ($aDynamicParams_a_arr as $lName_var => $lValue_var)
		{
			if ($lValue_var == CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_GET_PARAMS_UNDEFINED_VALUES()[$lName_var])
			{
				continue;
			}

			$lSeparator_str = $lIndex_int === 0 ? '?' : $lAmp_str;
			$lResult_str .= $lSeparator_str . $lName_var. '=' .$lValue_var;

			$lIndex_int++;
		}
		
		return $lResult_str;
	}

	/*JS PHP AGREEMENTS REQUIRED*/
	static private function _convertStaticParamToStaticURLString(array $aStaticParams_a_arr, string $aStaticParamName_str, bool $aOptThrowExceptionIfEmptyParam_bl = true):string
	{
		if (!isset($aStaticParams_a_arr))
		{
			new CException('_convertStaticParamToStaticURLString', 'Static params must be defined!');
		}

		if (!isset($aStaticParams_a_arr[$aStaticParamName_str]))
		{
			return '';
		}

		$lStaticParamValue_str = $aStaticParams_a_arr[$aStaticParamName_str];

		if (
				empty($lStaticParamValue_str)
				&& $aOptThrowExceptionIfEmptyParam_bl
			)
		{
			new CException('_convertStaticParamToStaticURLString', 'Static param cannot be empty: name [' .$aStaticParamName_str. ']');
		}

		if (
				(
					$aStaticParamName_str === CCRequestParamConst::i_GET_PARAM_ID_SITE
					&& $lStaticParamValue_str === CSiteConst::i_SITE_ID_DEFAULT
				)
				||
				(
					$aStaticParamName_str === CCRequestParamConst::i_GET_PARAM_ID_PAGE
					&& $lStaticParamValue_str === CCPageConst::i_PAGE_ID_DEFAULT
				)
			)
		{
			return '';
		}

		return $lStaticParamValue_str. '/';
	}
}


?>