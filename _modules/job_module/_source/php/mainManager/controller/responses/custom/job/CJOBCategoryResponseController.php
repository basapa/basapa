<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/responses/custom/JOB/CJOBRParentResponseController.php');


class CJOBRCategoryResponseController //extends CJOBRParentResponseController
{
	/***************************************************
	 * PUBLIC
	 */

	
	public function getDataWithCountContent($aOptTableRows_str_arr = null, $aOptDataIndexAsDatabaseId_bl = false)
	{
		$this->_getDataWithCountContent($aOptTableRows_str_arr, $aOptDataIndexAsDatabaseId_bl);
	}
	

	/*
	 * PUBLIC
	 ***************************************************/


	protected function __responseName()
	{
		return 'CATEGORY JOB RESPONSE';
	}


	private function _getDataWithCountContent($aTableRows_str_arr, $aDataIndexAsDatabaseId_bl)
	{
		$this->__fResult_arr = $this->__databaseController()->getDataWithContentCount($aTableRows_str_arr, $aDataIndexAsDatabaseId_bl);
		$this->__validate(CJOBRDatabaseData::TYPE_CATEGORY_DATA);
	}

	
	protected function __databaseController()
	{
		return $this->__databaseManager()->getDatabaseController()->getCustomDatabasesController()->getJOBDatabasesController()->getCategoryDatabaseController();
	}
	
	
	protected function __validate($aDataType_int)
	{
		if (!isset($this->__fResult_arr))
		{
			$this->__data()->addEvent(CJOBREventConst::DATABASE_CATEGORY_SELECT_FAILED);
		}
		else
		{
			$this->__databaseCustomData()->addCategoryData($this->__fResult_arr, $aDataType_int, $this->__data()->contentType());

			$this->__data()->addEvent(CJOBREventConst::DATABASE_CATEGORY_SELECT_SUCCESS);
		}
	}
}


?>
