<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCSessionData
{
	public const i_SESSION_PARAM_ID_USER_ID				= 'bsp_user_id';
	public const i_SESSION_PARAM_ID_USER_HASH			= 'bsp_user_hash';

	/*virtual*/static public function i_SUPPORTED_SESSION_PARAMS():array
	{
		//TODO: optimize required
		return [self::i_SESSION_PARAM_ID_USER_ID,
				self::i_SESSION_PARAM_ID_USER_HASH];
	}

	private $_fSessionName_str = '';
	private $_fIsSessionLaunched_bl = false;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSessionParams():array
	{
		return $this->_getNativeSessionParams();
	}

	public function i_startSession():void
	{
		if (!session_start())
		{
			new CException('i_startSession', 'Session not started!');
		}
		$this->_fIsSessionLaunched_bl = true;
	}

	public function i_stopSession():void
	{
		if (!session_destroy())
		{
			new CException('stopSession', 'Session not destroyed!');
		}
		$this->_fIsSessionLaunched_bl = false;
	}

	public function i_isSessionLaunched():bool
	{
		return $this->_fIsSessionLaunched_bl;
	}

	public function i_getSessionName():string
	{
		if (empty($this->_fSessionName_str))
		{
			$this->_fSessionName_str = session_name();
		}
		return $this->_fSessionName_str;
	}

	public function i_isSessionAvailable():bool
	{
		return isset(CHostData::i_getNativeRequestParams()[$this->i_getSessionName()]);
	}

	public function i_isSessionParamDefined(string $aSessionParamId_str):bool
	{
		return isset($this->_getNativeSessionParams()[$aSessionParamId_str]);
	}

	public function i_getSessionParam(string $aSessionParamId_str, bool $aOptThrowIsNotExist_bl = true):string
	{
		if (!$this->i_isSessionParamDefined($aSessionParamId_str))
		{
			if ($aOptThrowIsNotExist_bl)
			{
				new CException('i_getSessionParamValue', 'Session param not defined: ' .$aSessionParamId_str);
			}
		}

		return $this->_getNativeSessionParams()[$aSessionParamId_str];
	}

	public function i_setSessionParam(string $aSessionParamId_str, string $aSessionParamValue_str, bool $aOptThrowIsExist_bl = true):void
	{
		if (
				$this->i_isSessionParamDefined($aSessionParamId_str)
				&& $aOptThrowIsExist_bl
			)
		{
			new CException('i_getSessionParamValue', 'Session param already exist: ' .$aSessionParamId_str);
		}

		self::_getNativeSessionParams()[$aSessionParamId_str] = $aSessionParamValue_str;
	}

	public function i_clearSessionParam(string $aSessionParamId_str, bool $aOptThrowIsNotExist_bl = true):void
	{
		if (!CArrayTools::i_isInArray($aSessionParamId_str, self::i_SUPPORTED_SESSION_PARAMS()))
		{
			new CException('i_clearSessionParam', 'Session param not supported: ' .$aSessionParamId_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}

		if (
				!$this->i_isSessionParamDefined($aSessionParamId_str)
				&& $aOptThrowIsNotExist_bl
			)
		{
			new CException('i_clearSessionParam', 'Session param not exist: ' .$aSessionParamId_str);
		}

		self::_getNativeSessionParams()[$aSessionParamId_str] = null;
	}

	public function i_clearSessionParams():void
	{
		foreach ($this->_getNativeSessionParams() as $lName_str => $lValue_var)
		{
			if (!CArrayTools::i_isInArray($lName_str, self::i_SUPPORTED_SESSION_PARAMS()))
			{
				continue;
			}

			$this->i_clearSessionParam($lName_str, true);
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*virtual*//*protected function __init():void
	{
	}*/

	private function _getNativeSessionParams():array
	{
		if (
				!$this->i_isSessionAvailable()
				&& !$this->i_isSessionLaunched()
			)
		{
			new CException('_getNativeSessionParams', 'Session not available!');
		}
		return $_SESSION;
	}
}


?>