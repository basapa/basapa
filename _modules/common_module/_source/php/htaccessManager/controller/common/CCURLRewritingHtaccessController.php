<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*abstract*/class CCURLRewritingHtaccessController extends CCHtaccessController
{
	/***************************************************
	 * INTERFACE
	 */
	
	public function i_determineStaticGETParamIdsStruct(array $aStaticGETParamValues_str_arr):array
	{
		return $this->_determineStaticGETParamIdsStruct($aStaticGETParamValues_str_arr);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	private function _determineStaticGETParamIdsStruct(array $aStaticGETParamValues_str_arr):array
	{
		if (CArrayTools::i_isEmptyArray($aStaticGETParamValues_str_arr))
		{
			return [];
		}

		$lStaticGETParamsCount_int = CArrayTools::i_count($aStaticGETParamValues_str_arr);

		$l_str_arr = null;

		switch ($lStaticGETParamsCount_int)
		{
			case 1:
			{
				$l_str_arr = $this->__determineStaticGETParamIdByOneParam($aStaticGETParamValues_str_arr);
			}break;

			case 2:
			{
				$l_str_arr = $this->__determineStaticGETParamIdsByTwoParams($aStaticGETParamValues_str_arr);
			}break;

			case 3:
			{
				$l_str_arr = $this->__determineStaticGETParamIdsByThreeParams($aStaticGETParamValues_str_arr);
			}break;

			case 4:
			{
				$l_str_arr = $this->__determineStaticGETParamIdsByFourParams($aStaticGETParamValues_str_arr);
			}break;

			default:
				new CException('_determineStaticGETParamIdsStruct', 'Unsupported static GET params count: ' .$lStaticGETParamsCount_int, CException::i_EXCEPTION_TYPE_UNSUPPORTED_PAGE);
			break;
		}

		return $l_str_arr;
	}

	/*abstract*/protected function __determineStaticGETParamIdByOneParam(array $aStaticGETParamValues_str_arr):array
	{
		new CAbstractException('__determineStaticGETParamIdByOneParam');
		return [];
	}

	/*abstract*/protected function __determineStaticGETParamIdsByTwoParams(array $aStaticGETParamValues_str_arr):array
	{
		new CAbstractException('__determineStaticGETParamIdsByTwoParams');
		return [];
	}

	/*abstract*/protected function __determineStaticGETParamIdsByThreeParams(array $aStaticGETParamValues_str_arr):array
	{
		new CAbstractException('__determineStaticGETParamIdsByThreeParams');
		return [];
	}

	/*abstract*/protected function __determineStaticGETParamIdsByFourParams(array $aStaticGETParamValues_str_arr):array
	{
		new CAbstractException('__determineStaticGETParamIdsByFourParams');
		return [];
	}
}


?>