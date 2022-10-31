<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CMainData
{
	private $_fHostData_clss;
	private $_fUserData_clss;

	private $_fGETParams_a_arr;
	private $_fPOSTParams_a_arr;
	private $_fFILESParams_a_arr;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getNativePOSTParams():array
	{
		return $_POST;
	}

	static public function i_getNativeGETParams():array
	{
		return $_GET;
	}

	static public function i_getNativeFILESParams():array
	{
		return $_FILES;
	}

	public function i_getHostData()
	{
		return isset($this->_fHostData_clss) ? $this->_fHostData_clss : ($this->_fHostData_clss = new CHostData());
	}

	public function i_getUserData()
	{
		return isset($this->_fUserData_clss) ? $this->_fUserData_clss : ($this->_fUserData_clss = new CUserData());
	}

	//GET PARAMS...
	public function i_isGETParamSiteIdDefined():bool
	{
		return $this->i_isGETParamDefined(CCRequestParamConst::i_GET_PARAM_ID_SITE);
	}
	
	public function i_getGETParamSiteId():string
	{
		return $this->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_SITE);
	}
	
	public function i_isGETParamPageIdDefined():bool
	{
		return $this->i_isGETParamDefined(CCRequestParamConst::i_GET_PARAM_ID_PAGE);
	}
	
	public function i_getGETParamPageId():string
	{
		return $this->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_PAGE);
	}
	
	public function i_isGETParamLangIdDefined():bool
	{
		return $this->i_isGETParamDefined(CCRequestParamConst::i_GET_PARAM_ID_LANG);
	}
	
	public function i_getGETParamLangId():string
	{
		return $this->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_LANG);
	}

	public function i_isGETParamLocationIdDefined():bool
	{
		return $this->i_isGETParamDefined(CCRequestParamConst::i_GET_PARAM_ID_LOCATION);
	}

	public function i_getGETParamLocationId():string
	{
		return $this->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_LOCATION);
	}

	public function i_isGETParamAjaxRequestDefined():bool
	{
		return $this->i_isGETParamDefined(CCRequestParamConst::i_GET_PARAM_ID_AJAX_REQUEST);
	}

	public function i_getGETParamAjaxRequest():string
	{
		return $this->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_AJAX_REQUEST);
	}

	public function i_isGETParamScheduleRequestDefined():bool
	{
		return $this->i_isGETParamDefined(CCRequestParamConst::i_GET_PARAM_ID_SCHEDULE_REQUEST);
	}

	public function i_getGETParamScheduleRequest():string
	{
		return $this->i_getGETParam(CCRequestParamConst::i_GET_PARAM_ID_SCHEDULE_REQUEST);
	}

	public function i_isGETParamDefined(string $aGETParamId_str):bool
	{
		return isset($this->_fGETParams_a_arr[$aGETParamId_str]);
	}
	
	public function i_getGETParam(string $aGETParamId_str, bool $aOptThrowIfNotExist_bl = true):string
	{
		if (!$this->i_isGETParamDefined($aGETParamId_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('i_getGETParam', 'GET param not exist: ' .$aGETParamId_str);
			}

			return CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_GET_PARAMS_UNDEFINED_VALUES()[$aGETParamId_str];
		}
		return $this->_fGETParams_a_arr[$aGETParamId_str];
	}
	
	public function i_setGETParam(string $aGETParamId_str, string $aGETParamValue_str, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$aOptThrowIfExist_bl
				&& $this->i_isGETParamDefined($aGETParamId_str)
			)
		{
			new CException('i_setGETParam', 'GET param already exist: ' .$aGETParamId_str);
		}
		$this->_fGETParams_a_arr[$aGETParamId_str] = $aGETParamValue_str;
	}

	public function i_getGETParams():array
	{
		return $this->_fGETParams_a_arr;
	}

	public function i_getGETParamIds():array
	{
		return CArrayTools::i_getKeys($this->_fGETParams_a_arr);
	}

	public function i_setGETParams(array $aGETParams_a_arr):void
	{
		$this->_fGETParams_a_arr = $aGETParams_a_arr;
	}

	public function i_getStaticGETParams():array
	{
		$lStaticGETParams_a_arr = [];

		$lStaticGETParamIds_str_arr = CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_STATIC_GET_PARAMS();
		foreach ($lStaticGETParamIds_str_arr as $lStaticGETParamId_str)
		{
			if ($this->i_isGETParamDefined($lStaticGETParamId_str))
			{
				$lStaticGETParams_a_arr[$lStaticGETParamId_str] = $this->i_getGETParam($lStaticGETParamId_str);
			}
		}

		return $lStaticGETParams_a_arr;
	}

	public function i_getDynamicGETParams():array
	{
		$lDynamicGETParams_a_arr = [];

		$lDynamicGETParamIds_str_arr = CClassFactory::i_getInstance()->i_getClassFactory()->i_getRequestParamConstNSClassName()::i_DYNAMIC_GET_PARAMS();
		foreach ($lDynamicGETParamIds_str_arr as $lDynamicGETParamId_str)
		{
			if ($this->i_isGETParamDefined($lDynamicGETParamId_str))
			{
				$lDynamicGETParams_a_arr[$lDynamicGETParamId_str] = $this->i_getGETParam($lDynamicGETParamId_str);
			}
		}

		return $lDynamicGETParams_a_arr;
	}
	//...GET PARAMS

	//POST PARAMS...
	public function i_isPOSTParamRequestIdDefined():bool
	{
		return $this->i_isPOSTParamDefined(CCRequestParamConst::i_POST_PARAM_ID_REQUEST);
	}
	
	public function i_getPOSTParamRequestId():string
	{
		return $this->i_getPOSTParam(CCRequestParamConst::i_POST_PARAM_ID_REQUEST);
	}

	public function i_isPOSTParamDefined($aPOSTParamId_str):bool
	{
		return isset($this->_fPOSTParams_a_arr[$aPOSTParamId_str]);
	}
	
	public function i_getPOSTParam(string $aPOSTParamId_str)
	{
		if (!$this->i_isPOSTParamDefined($aPOSTParamId_str))
		{
			new CException('i_getPOSTParam', 'POST param not exist: ' .$aPOSTParamId_str);
		}
		return $this->_fPOSTParams_a_arr[$aPOSTParamId_str];
	}

	public function i_setPOSTParam(string $aPOSTParamId_str, $aPOSTParamValue_var, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$aOptThrowIfExist_bl
				&& $this->i_isPostParamDefined($aPOSTParamId_str)
			)
		{
			new CException('i_setPOSTParam', 'POST param already exist: ' .$aPOSTParamId_str);
		}
		$this->_fPOSTParams_a_arr[$aPOSTParamId_str] = $aPOSTParamValue_var;
	}

	public function i_getPOSTParams():array
	{
		return $this->_fPOSTParams_a_arr;
	}
	
	public function i_setPOSTParams(array $aPOSTParams_a_arr):void
	{
		$this->_fPOSTParams_a_arr = $aPOSTParams_a_arr;
	}
	//...POST PARAMS

	//FILES PARAMS...
	public function i_isFILESParamDefined($aName_str):bool
	{
		return isset($this->_fFILESParams_a_arr[$aName_str]);
	}

	public function i_getFILESParam(string $aFILESParamId_str):array
	{
		if (!$this->i_isFILESParamDefined($aFILESParamId_str))
		{
			new CException('i_getFILESParam', 'FILES param not exist: ' .$aFILESParamId_str);
		}
		return $this->_fFILESParams_a_arr[$aFILESParamId_str];
	}

	public function i_setFILESParam(string $aFILESParamId_str, array $aFILESParamValue_a_arr, bool $aOptThrowIfExist_bl = true):void
	{
		if (
				$aOptThrowIfExist_bl
				&& $this->i_isFILESParamDefined($aFILESParamId_str)
			)
		{
			new CException('i_setFILESParam', 'FILES param already exist: ' .$aFILESParamId_str);
		}
		$this->_fFILESParams_a_arr[$aFILESParamId_str] = $aFILESParamValue_a_arr;
	}

	public function i_getFILESParams():array
	{
		return $this->_fFILESParams_a_arr;
	}

	public function i_setFILESParams(array $aFILESParams_a_arr):void
	{
		$this->_fFILESParams_a_arr = $aFILESParams_a_arr;
	}
	//...FILES PARAMS

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
}


?>