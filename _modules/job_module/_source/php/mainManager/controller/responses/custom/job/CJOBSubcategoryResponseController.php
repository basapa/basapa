<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/responses/custom/JOB/CJOBRParentResponseController.php');


class CJOBRSubcategoryResponseController// extends CJOBRParentResponseController
{
	/***************************************************
	 * PUBLIC
	 */

	
	public function getDataWithCountContent($aParams_arr = '', $aReturnDatabaseId_bl = true)
	{
		$this->_getDataWithCountContent($aParams_arr, $aReturnDatabaseId_bl);
	}

	
	/*
	 * PUBLIC
	 ***************************************************/


	protected function __responseName()
	{
		return 'SUBCATEGORY JOB RESPONSE';
	}


	private function _getDataWithCountContent($aParams_arr, $aReturnDatabaseId_bl)
	{
		$this->__fResult_arr = $this->__databaseController()->getDataWithContentCount($aParams_arr, $aReturnDatabaseId_bl);
		$this->__validate(CJOBRDatabaseData::TYPE_SUBCATEGORY_DATA);
	}


	protected function __databaseController()
	{
		return $this->__databaseManager()->getDatabaseController()->getCustomDatabasesController()->getJOBDatabasesController()->getSubcategoryDatabaseController();
	}
	
	
	protected function __validate($aDataType_int)
	{
		if (!isset($this->__fResult_arr))
		{
			$this->__data()->addEvent(CJOBREventConst::DATABASE_SUBCATEGORY_SELECT_FAILED);
		}
		else
		{
			$this->__databaseCustomData()->addSubcategoryData($this->__fResult_arr, $aDataType_int, $this->__data()->contentType());

			$this->__data()->addEvent(CJOBREventConst::DATABASE_SUBCATEGORY_SELECT_SUCCESS);
		}
	}
}


?>
