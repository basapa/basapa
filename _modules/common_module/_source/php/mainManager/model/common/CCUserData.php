<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCUserData
{
	//private $_fUserId_int;
	//private $_fUserHash_str;
	//private $_fUserLogin_str = '';
	//private $_fUserType_int = CControlParamConst::i_USER_TYPE_UNKNOWN;
	//private $_fUserState_int = CControlParamConst::i_USER_STATE_UNKNOWN;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*public function i_isLogged():bool
	{
		return $this->i_getUserId() > 0;
	}*/

	/*public function i_updateUserSessionParams(array $aParams_a_arr):void
	{
		$this->_updateUserSessionParams($aParams_a_arr);
	}*/

	public function i_getUserHash():string
	{
		return $this->__getSessionData()->i_getSessionParam(CCSessionData::i_SESSION_PARAM_ID_USER_HASH);
	}

	public function i_getUserId():int
	{
		return CVariableTools::i_toInt($this->__getSessionData()->i_getSessionParam(CCSessionData::i_SESSION_PARAM_ID_USER_ID));
	}

	/*public function i_getUserLogin():string
	{
		return $this->_fUserLogin_str;
	}

	public function i_getUserType():int
	{
		return $this->_fUserType_int;
	}

	public function i_getUserState():int
	{
		return $this->_fUserState_int;
	}*/

	/*public function i_isAccessDenied():bool
	{
		return $this->i_getUserState() == CControlParamConst::i_USER_STATE_BANNED;
	}

	public function i_isAdmin():bool
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_ADMIN;
	}

	public function i_isModerator():bool
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_MODERATOR;
	}

	public function i_isTrusted():bool
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_TRUSTED;
	}*/

	//USER SETTINGS...
	/*virtual*/public function i_getMaxContentsDisplayCountOnPage():int
	{
		return 5;//10;
	}
	//...USER SETTINGS

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getSessionData()
	{
		$lSiteId_str = CMainManager::i_getInstance()->i_getMainData()->i_getGETParamSiteId();
		return CFileManager::i_getInstance()->i_getFilesData()->i_getSessionsData()->i_getSessionData($lSiteId_str);
	}

	/*private function _updateUserSessionParams(array $aParams_a_arr):void
	{
		if (
				empty($aData_a_arr[CCSessionData::i_SESSION_PARAM_ID_USER_ID])
				|| empty($aData_a_arr[CCSessionData::i_SESSION_PARAM_ID_USER_HASH])
				//|| empty($aData_a_arr[CAvatarConst::i_SESSION_USER_LOGIN])
				//|| empty($aData_a_arr[CAvatarConst::i_SESSION_USER_TYPE])
				//|| empty($aData_a_arr[CAvatarConst::i_SESSION_USER_STATE])
			)
		{
			new CException('_updateUserSessionParams', 'ILE!', CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		}



		$this->_fUserId_int = $aParams_a_arr[CCSessionData::i_SESSION_PARAM_ID_USER_ID];
		$this->_fUserHash_str = $aParams_a_arr[CCSessionData::i_SESSION_PARAM_ID_USER_HASH];
		//$this->_fUserLogin_str = $aParams_a_arr[CAvatarConst::i_SESSION_USER_LOGIN];
		//$this->_fUserType_int = $aParams_a_arr[CAvatarConst::i_SESSION_USER_TYPE];
		//$this->_fUserState_int = $aParams_a_arr[CAvatarConst::i_SESSION_USER_STATE];
	}*/
}


?>