<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*override*/class CCUsersTableQueriesData extends CCTableQueriesData
{
	private $_fSelectUserDataByLogin_clss;
	private $_fSelectUserDataByEmail_clss;


	/***************************************************
	 * INTERFACE
	 */

	//SELECT...
	public function i_setSelectUserDataByLogin(CCUsersTableData $aData_clss):void
	{
		$this->_fSelectUserDataByLogin_clss = $aData_clss;
	}

	public function i_getSelectUserDataByLogin():CCUsersTableData
	{
		if (!$this->i_isSelectUserDataByLoginDefined())
		{
			new CException('___getSelectUserDataByLogin', 'User Data not exist!');
		}
		return $this->_fSelectUserDataByLogin_clss;
	}

	public function i_isSelectUserDataByLoginDefined():bool
	{
		return isset($this->_fSelectUserDataByLogin_clss);
	}

	public function i_setSelectUserDataByEmail(CCUsersTableData $aData_clss):void
	{
		$this->_fSelectUserDataByEmail_clss = $aData_clss;
	}

	public function i_getSelectUserDataByEmail():CCUsersTableData
	{
		if (!$this->i_isSelectUserDataByEmailDefined())
		{
			new CException('___getSelectUserDataByEmail', 'User Data not exist!');
		}
		return $this->_fSelectUserDataByEmail_clss;
	}

	public function i_isSelectUserDataByEmailDefined():bool
	{
		return isset($this->_fSelectUserDataByEmail_clss);
	}
	//...SELECT

	/*
	 * INTERFACE
	 ***************************************************/
}


?>