<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


final class CCMySQLDatabaseUsersTableController extends CCMySQLDatabaseContentTableController
{
	/***************************************************
	 * INTERFACE
	 */

	/*public function i_addUserData(array $aTableItemData_a_arr):void
	{
		$this->___addData($aTableItemData_a_arr);
	}

	public function i_retrieveUsersData(array $aOptTableRows_str_arr = null):void
	{
		$this->___retrieveData($aOptTableRows_str_arr);
	}

	public function i_retrieveUsersDataById(int $aId_int, array $aOptTableRows_str_arr = null):void
	{
		$this->___retrieveDataById($aId_int, $aOptTableRows_str_arr);
	}

	public function i_retrieveUsersDataByLogin(string $aLogin_str, array $aOptTableRows_str_arr = null):void
	{
		$lTableRows_str = $this->__convertSelectTableRowsToString($aOptTableRows_str_arr);

		//sql_cache

		$lQuery_str = 'select ' .$lTableRows_str. '
						from ' .$this->__getTableName(). '
						where ' .CCUsersTableData::i_TABLE_FIELD_LOGIN. ' = ' .$this->__applyStringValueQuote($aLogin_str). '
						limit 0,1';

		$this->__sendSelectQuery($lQuery_str, $aOptTableRows_str_arr);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray();
		if ($lTableItemData_a_arr)
		{
			$lTableQueriesData_clss->i_setSelectUserDataByLogin($this->__generateTableData($lTableItemData_a_arr));
		}
	}

	public function i_retrieveUsersDataByEmail(string $aEmail_str, array $aOptTableRows_str_arr = null):void
	{
		$lTableRows_str = $this->__convertSelectTableRowsToString($aOptTableRows_str_arr);

		//sql_cache

		$lQuery_str = 'select ' .$lTableRows_str. '
						from ' .$this->__getTableName(). '
						where ' .CCUsersTableData::i_TABLE_FIELD_EMAIL. ' = ' .$this->__applyStringValueQuote($aEmail_str). '
						limit 0,1';

		$this->__sendSelectQuery($lQuery_str, $aOptTableRows_str_arr);

		$lTableQueriesData_clss = $this->__getTableQueriesData();

		$lPDOWrapper_clss = CPDOWrapper::i_getInstance();
		$lTableItemData_a_arr = $lPDOWrapper_clss->i_getDatabaseNextRowAsAssocArray();
		if ($lTableItemData_a_arr)
		{
			$lTableQueriesData_clss->i_setSelectUserDataByEmail($this->__generateTableData($lTableItemData_a_arr));
		}
	}

	/*
	public function getUserData($aOptParams_obj_arr = null, $aOptDataIndexAsDatabaseId_bl = false)
	{
		$lParams_str = $this->__getSelectParams($aOptParams_obj_arr);

		$lQuery_str = 'select sql_calc_found_rows ' .$lParams_str. '
						from ' .$this->__getTableName(). '
						where ' .CUserTableData::TABLE_FIELD_STATE. ' != ' .CControlParamConst::USER_STATE_UNKNOWN;

		return $this->__sendSelectQuery($lQuery_str, $aOptDataIndexAsDatabaseId_bl);
	}

	public function getUserDataByLogin($aLogin_str, $aOptParams_obj_arr = null)
	{
		$aLogin_str = CTools::convertToLowerCase($aLogin_str);
		$aLogin_str = $this->__validateStringValue($aLogin_str);

		$lParams_str = $this->__getSelectParams($aOptParams_obj_arr);

		$lQuery_str = 'select ' .$lParams_str. '
						from ' .$this->__getTableName(). '
						where LOWER(' .CDatabaseConst::TABLE_USER_LOGIN. ') = ' .$aLogin_str. '
						limit 0,1';

		return $this->__sendSelectQuery($lQuery_str);
	}*/

	/*public function getUserDataByEmail($aEmail_str, $aOptParams_obj_arr = null)
	{
		$aEmail_str = CTools::convertToLowerCase($aEmail_str);
		$aEmail_str = $this->__validateStringValue($aEmail_str);

		$lParams_str = $this->__getSelectParams($aOptParams_obj_arr);

		$lQuery_str = 'select ' .$lParams_str. '
						from ' .$this->__getTableName(). '
						where LOWER(' .CDatabaseConst::TABLE_USER_EMAIL. ') = ' .$aEmail_str. '
						limit 0,1';

		return $this->__sendSelectQuery($lQuery_str);
	}*/
	/*
		public function getDataCountByStates($aOptUserId_int = 0, $aOptUseCityId_bl = true)
		{
			$lUserIdSearching_str = !empty($aOptUserId_int) ? ' and ' .CDatabaseConst::COMMON_TABLE_USER_ID. ' = ' .$aOptUserId_int : '';
			$lCityIdSearching_str = '';

			$this->__fQuery_str	= 'select count(' .CDatabaseConst::COMMON_TABLE_ID. ') as ' .CDatabaseConst::ADDITIONAL_TABLE_COUNT. ',
									(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_ACTIVATED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_ACTIVATED_COUNT. '\',
									(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_DEACTIVATED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_DEACTIVATED_COUNT. '\',
									(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_EMAIL_VERIFICATION_WAITING. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_EMAIL_VERIFICATION_WAITING_COUNT. '\',
									(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_BANNED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_BANNED_COUNT. '\',
									(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_BLOCKED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_BLOCKED_COUNT. '\',
									(select count(' .CDatabaseConst::COMMON_TABLE_ID. ') from ' .$this->__getTableName(). ' where ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_DELETED. ' ' .$lUserIdSearching_str . $lCityIdSearching_str. ') as \'' .CDatabaseConst::ADDITIONAL_TABLE_STATE_DELETED_COUNT. '\'
									from ' .$this->__getTableName(). '
									where ' .CDatabaseConst::COMMON_TABLE_STATE. ' != ' .CControlParamConst::USER_STATE_UNKNOWN. '
									' .$lUserIdSearching_str. '
									' .$lCityIdSearching_str;

			return $this->__select();
		}

		public function updateDataByVerificationKey($aVerificationKey_str, $aOptTableRows_str_arr = null)
		{
			$aVerificationKey_str = $this->__validateStringValue($aVerificationKey_str);

			$fSet_str = $this->__getUpdateParams($aOptTableRows_str_arr);

			$this->__fQuery_str = 'update ' .$this->__getTableName(). '
									set ' .$fSet_str. '
									where ' .CDatabaseConst::TABLE_USER_VERIFICATION_KEY. ' = ' .$aVerificationKey_str;

			return $this->__update();
		}

		public function setBlockedStateByStateExpireTime()
		{
			$lCurrentTime_int = CTime::getTime();

			$this->__fQuery_str = 'update ' .$this->__getTableName(). '
									set ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::STATE_BLOCKED. ',
										' .CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME. ' = ' .$lCurrentTime_int. '
									where ' .CDatabaseConst::COMMON_TABLE_STATE_EXPIRING_TIME. ' <= ' .$lCurrentTime_int. '
									and ' .CDatabaseConst::COMMON_TABLE_STATE. ' = ' .CControlParamConst::USER_STATE_EMAIL_VERIFICATION_WAITING;

			return $this->__update();
		}
	*/

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getTableName():string
	{
		return CCUsersTableData::i_TABLE_NAME;
	}

	/**@return CCUsersTableQueriesData*/
	/*override*/protected function __getTableQueriesData():CCTableQueriesData
	{
		return $this->__getDatabaseData()->i_getUsersTableQueriesData();
	}

	/**@return CCUsersTableData*/
	/*override*/protected function __generateTableData(array $aTableData_a_arr):CCTableData
	{
		return new CCUsersTableData($aTableData_a_arr);
	}

	/*
	protected function __transformParam($aName_str, $aValue_str)
	{
		switch ($aName_str)
		{
			case CDatabaseConst::TABLE_USER_IP_ADDRESS:
			{
				return $aName_str. ' = INET_ATON("' .$aValue_str. '")';
			}break;
		}

		return parent::__transformParam($aName_str, $aValue_str);
	}*/
}


?>