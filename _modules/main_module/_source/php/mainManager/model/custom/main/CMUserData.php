<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMUserData extends CCUserData
{
	private $_fUserHash_str = '';
	private $_fUserId_int = 0;
	private $_fUserLogin_str = '';
	private $_fUserType_int = CControlParamConst::i_USER_TYPE_UNKNOWN;
	private $_fUserState_int = CControlParamConst::i_USER_STATE_UNKNOWN;


	/***************************************************
	 * INTERFACE
	 */

	public function i_isLogged()
	{
		return $this->i_getUserId() > 0;
	}

	public function updateData($aData_obj_arr)
	{
		$this->_updateData($aData_obj_arr);
	}

	public function i_getUserHash()
	{
		return $this->_fUserHash_str;
	}

	public function i_getUserId()
	{
		return $this->_fUserId_int;
	}

	public function i_getUserLogin()
	{
		return $this->_fUserLogin_str;
	}

	public function i_getUserType()
	{
		return $this->_fUserType_int;
	}

	public function i_getUserState()
	{
		return $this->_fUserState_int;
	}

	public function i_isAccessDenied()
	{
		return $this->i_getUserState() == CControlParamConst::i_USER_STATE_BANNED;
	}

	public function i_isAdmin()
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_ADMIN;
	}

	public function i_isModerator()
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_MODERATOR;
	}

	public function i_isTrusted()
	{
		return $this->i_getUserType() == CControlParamConst::i_USER_TYPE_TRUSTED;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _updateData($aData_obj_arr)
	{
		if (empty($aData_obj_arr[CMainConst::i_SESSION_USER_HASH])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_ID])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_LOGIN])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_TYPE])
			|| empty($aData_obj_arr[CMainConst::i_SESSION_USER_STATE]))
		{
			new CException(CException::i_ERROR_TYPE_INTERNAL_LOGIC_ERROR, '_updateData');
		}

		$this->_fUserHash_str = $aData_obj_arr[CMainConst::i_SESSION_USER_HASH];
		$this->_fUserId_int = $aData_obj_arr[CMainConst::i_SESSION_USER_ID];
		$this->_fUserLogin_str = $aData_obj_arr[CMainConst::i_SESSION_USER_LOGIN];
		$this->_fUserType_int = $aData_obj_arr[CMainConst::i_SESSION_USER_TYPE];
		$this->_fUserState_int = $aData_obj_arr[CMainConst::i_SESSION_USER_STATE];
	}
}


?>