<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCCitiesAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_send():void
	{
		//$lMainData_clss = $this->__getMainData();
		//$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		//$lLangId_str = $lMainData_clss->i_getGETParamLangId();

		$lDatabaseTablesController_clss = $this->_getDatabaseTablesController();
		$lDatabaseTablesController_clss->i_openConnection();





		$lMainData_clss = $this->__getMainData();

		$lDatabaseData_clss = $this->_getDatabaseData();


		$lRegionId_int = $lMainData_clss->i_getPOSTParam(CCAjaxConst::i_REQUEST_PARAM_ID_FIRST);


		$lJOBMySQLDatabaseTablesController_clss = $lDatabaseTablesController_clss->i_getJOBMySQLDatabaseTablesController();



		/*$lMySQLDatabaseRegionsTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseRegionsTableController();
		$lMySQLDatabaseRegionsTableController_clss->___retrieveData(
																		[
																			CCMySQLDatabaseRegionsTableController::i_QUERY_PARAM_ID_STATES	=> [CCSTableData::i_CONTENT_STATE_ID_ACTIVATED]
																		],
																		null,
																		CCCitiesSTableData::i_TABLE_FIELD_ID
																	);

		$lGETParamId_str = CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID;
		if (!$lMainData_clss->i_isGETParamDefined($lGETParamId_str))
		{
			new CException('__update', 'GET param must be defined: ' .$lGETParamId_str);
		}*/

		//$lRegionId_int = $lDatabaseData_clss->i_getRegionsTableQueriesData()->i_getDataByStringId($lMainData_clss->i_getGETParam($lGETParamId_str))->i_getTableFieldId();

		$lMySQLDatabaseCitiesTableController_clss = $lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseCitiesTableController();
		$lMySQLDatabaseCitiesTableController_clss->___retrieveData(
																		[
																			CCMySQLDatabaseCitiesTableController::i_QUERY_PARAM_ID_STATES		=> [CCSTableData::i_CONTENT_STATE_ID_ACTIVATED],
																			CCMySQLDatabaseCitiesTableController::i_QUERY_PARAM_ID_REGION_ID	=> $lRegionId_int
																		],
																		null,
																		CCCitiesSTableData::i_TABLE_FIELD_ID
																	);
//CJSONFileTools::i_encodeJSON()


		$lDatabaseTablesController_clss->i_closeConnection();

		$this->__getMainData()->i_getHostData()->i_sendHTTPHeader(CHostData::i_RESPONSE_HTTP_HEADER_JSON_CONTENT_TYPE);

		echo CJSONFileTools::i_encodeJSON($lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectDataAsMultiAssociativeArray());

		//echo CJSTools::i_convertMultiAssociativeArrayToJSObject($lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectDataAsMultiAssociativeArray());

		//echo $lDatabaseData_clss->i_getCitiesTableQueriesData()->___getSelectData();



		/*if ($lMainData_clss->i_isFILESParamDefined(CCAjaxConst::i_REQUEST_PARAM_ID_FILE))
		{
			$lNativeFileParams_a_arr = $lMainData_clss->i_getFILESParam(CCAjaxConst::i_REQUEST_PARAM_ID_FILE);

			$lUploadedFileOriginalName_str = CFileSystemTools::i_getUploadedFileOriginalName($lNativeFileParams_a_arr);
			$lUploadedFullFileName_str = CFileSystemTools::i_getUploadedFullFileName($lNativeFileParams_a_arr);

			$lFileExtension_str = CFileSystemTools::i_getFileExtension($lUploadedFileOriginalName_str, false);
			$lFileNameWithoutExtension_str = CFileSystemTools::i_getFileNameWithoutExtension($lUploadedFileOriginalName_str, false);

			$lFullFileName_str = CCFileConst::i_TEMP_IMAGES_DIRECTORY_NAME. '/' .CEncryptionTools::i_encryptValue($lFileNameWithoutExtension_str . CDateTimeTools::i_getCurrentUTimeInMSec()). '.' .$lFileExtension_str;

			CFileSystemTools::i_moveUploadedFile($lUploadedFullFileName_str, $lFullFileName_str);

			echo CURLTools::i_applyFullSiteName($lFullFileName_str);
		}*/
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getAjaxRequestId():string
	{
		return '';
	}

	private function _getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	private function _getDatabaseTablesController()
	{
		return CDatabaseManager::i_getInstance()->i_getDatabaseTablesController();
	}

	/*protected function __getRequestName()
	{
		return 'CITY';
	}

	protected function __getRequest()
	{
		return CDatabaseManager::getInstance()->getDatabaseController()->getCityDatabaseController()->getDataByRegionId($this->__paramValue(), '');
	}

	private function _checkFileParams($aFile_obj)
	{
		switch ($aFile_obj['error'])
		{
			case UPLOAD_ERR_OK:
			{
				if ($aFile_obj['size'] > CFileConst::IMAGE_FILE_SIZE_MAX)
				{
					return;
				}

				$aImageInfo_obj = getimagesize($aFile_obj['tmp_name']);
				if (!$aImageInfo_obj)
				{
					return;
				}

				if ($aImageInfo_obj[2] != IMAGETYPE_GIF
					&& $aImageInfo_obj[2] != IMAGETYPE_JPEG
					&& $aImageInfo_obj[2] != IMAGETYPE_PNG
					&& $aImageInfo_obj[2] != IMAGETYPE_JPEG2000)
				{
					return;
				}

				if (($aImageInfo_obj[0] < CFileConst::IMAGE_RESOLUTION_64)
					|| ($aImageInfo_obj[0] > CFileConst::IMAGE_RESOLUTION_150)
					||($aImageInfo_obj[1] < CFileConst::IMAGE_RESOLUTION_64)
					|| ($aImageInfo_obj[1] > CFileConst::IMAGE_RESOLUTION_150))
				{
				}
			}break;

			case UPLOAD_ERR_FORM_SIZE:
			{
			}break;

			case UPLOAD_ERR_PARTIAL:
			{
			}break;

			case UPLOAD_ERR_NO_FILE:
			{
			}break;
		}
	}*/
}


?>