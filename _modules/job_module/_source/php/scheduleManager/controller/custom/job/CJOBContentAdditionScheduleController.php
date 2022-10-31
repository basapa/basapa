<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentAdditionScheduleController extends CCScheduleController
{
	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_update():void
	{
		return;

		CSystem::i_getInstance()->i_setAppPHPScriptMaxExecutionTime(0);

		$lURLsFileAllContent_str_arr = CFileTools::i_getFileAllContentAsStrings('../_external_assets/JOBmaker_ru/urls.txt');

		$lDatabaseManager_clss = CDatabaseManager::i_getInstance();
		$lDatabaseTablesController_clss = $lDatabaseManager_clss->i_getDatabaseTablesController();
		$lDatabaseTablesController_clss->i_openConnection();
		$lJOBMySQLDatabaseTablesController_clss = $lDatabaseTablesController_clss->i_getJOBMySQLDatabaseTablesController();
		$lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseContentCategoriesTableController()->i_getContentCategoriesData(null, CJOBContentCategoriesTableData::i_TABLE_FIELD_CATEGORY_STRING_ID);
		$lJOBMySQLDatabaseTablesController_clss->i_getMySQLDatabaseContentSubcategoriesTableController()->i_getContentSubcategoriesData(null, CJOBContentSubcategoriesTableData::i_TABLE_FIELD_ID);

		$lJOBDatabaseData_clss = $lDatabaseManager_clss->i_getDatabasesData()->i_getJOBDatabaseData();
		$lContentCategoriesData_clss_arr = $lJOBDatabaseData_clss->i_getContentCategoriesTableQueriesData()->i_getContentCategoriesData();
		$lContentSubcategoriesData_clss_arr = $lJOBDatabaseData_clss->i_getContentSubcategoriesTableQueriesData()->i_getContentSubcategoriesData();

		$lCount_int = CArrayTools::i_count($lURLsFileAllContent_str_arr);
		for ($i = 0; $i < 1; $i++)
		{
			$lContentCategoryParams_str_arr = CStringTools::i_split($lURLsFileAllContent_str_arr[$i], ':');

			$lContentXMLFileName_str = $lContentCategoryParams_str_arr[0];
			$lCategoryStringId_str = $lContentCategoryParams_str_arr[2];
			$lSubcategoryStringId_str = $lContentCategoryParams_str_arr[3];

			$lCategoryId_int = $this->_determineCategoryId($lCategoryStringId_str, $lContentCategoriesData_clss_arr);
			$lSubcategoryId_int = $this->_determineSubcategoryId($lCategoryId_int, $lSubcategoryStringId_str, $lContentSubcategoriesData_clss_arr);

			$lSimpleXMLElementWrapper_clss = new CSimpleXMLElementWrapper();
			$lSimpleXMLElementWrapper_clss->i_loadXMLFromFile('../_external_assets/JOBmaker_ru/contents/' .$lContentXMLFileName_str. '.xml');

			$this->_addContentsInDatabase($lSimpleXMLElementWrapper_clss, $lCategoryId_int, $lSubcategoryId_int);
		}

		$lDatabaseTablesController_clss->i_closeConnection();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _addContentsInDatabase(CSimpleXMLElementWrapper $aSimpleXMLElementWrapper_clss, int $aCategoryId_int, int $aSubcategoryId_int):void
	{
		$lCount_int = $aSimpleXMLElementWrapper_clss->i_getXMLNodeChildsCount();
		$lSimpleXMLElementWrapper_clss = $aSimpleXMLElementWrapper_clss->i_getXMLNodeChildsAsSimpleXMLElement();
		for ($i = 0; $i < 1; $i++)
		{
			$this->_addContentInDatabase($lSimpleXMLElementWrapper_clss->i_getXMLChildNodeByNodeName('content', $i), $aCategoryId_int, $aSubcategoryId_int);
		}
	}

	private function _addContentInDatabase(CSimpleXMLElementWrapper $aSimpleXMLElementWrapper_clss, int $aCategoryId_int, int $aSubcategoryId_int):void
	{
		$lFullFileName_str = '../_external_assets/JOBmaker_ru/' .$aSimpleXMLElementWrapper_clss->i_getXMLChildNodeByNodeName('files_names', 0)->i_getXMLChildNodeByNodeName('file_name')->i_getXMLNodeValue();

		$lImagesFullDirectoryName_str = CJOBFileConst::i_EXTERNALS_IMAGES_FULL_DIRECTORY_NAME;
		$lContentDirectoryName_str = CJOBFileConst::i_CONTENT_DIRECTORY_NAME;
		$lContentFullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$lImagesFullDirectoryName_str, $lContentDirectoryName_str]);

		$lDesiredDirectoryName_str = $this->_determineDesiredDirectoryName($lContentFullDirectoryName_str);

		$lDesiredFullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$lContentFullDirectoryName_str, $lDesiredDirectoryName_str]);
		$lResampledFullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$lContentFullDirectoryName_str, 'resampled']);
		$lResampled90x90FullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$lResampledFullDirectoryName_str, '90x90']);
		$lDesiredResampled90x90FullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$lResampled90x90FullDirectoryName_str, $lDesiredDirectoryName_str]);

		if (!CFileSystemTools::i_isDirectoryExist($lResampledFullDirectoryName_str))
		{
			CFileSystemTools::i_createDirectory($lResampledFullDirectoryName_str);
		}

		if (!CFileSystemTools::i_isDirectoryExist($lResampled90x90FullDirectoryName_str))
		{
			CFileSystemTools::i_createDirectory($lResampled90x90FullDirectoryName_str);
		}

		if (!CFileSystemTools::i_isDirectoryExist($lDesiredFullDirectoryName_str))
		{
			if (CFileSystemTools::i_isDirectoryExist($lDesiredResampled90x90FullDirectoryName_str))
			{
				new CException('__update', 'Directory already exist: ' .$lDesiredResampled90x90FullDirectoryName_str, CException::i_EXCEPTION_TYPE_EXTERNAL_LOGIC_ERROR);
			}

			CFileSystemTools::i_createDirectory($lDesiredFullDirectoryName_str);
			CFileSystemTools::i_createDirectory($lDesiredResampled90x90FullDirectoryName_str);
		}

		$lNewDesiredFileName_str = $this->_determineNewDesiredFileName($lDesiredFullDirectoryName_str, CFileSystemTools::i_getFileExtension($lFullFileName_str));

		$lDesiredNewFullFileName_str = CFileSystemTools::i_concatAsFullFileName($lDesiredFullDirectoryName_str, $lNewDesiredFileName_str);
		$lDesiredResampledNewFullFileName_str = CFileSystemTools::i_concatAsFullFileName($lDesiredResampled90x90FullDirectoryName_str, $lNewDesiredFileName_str);

		if (CFileSystemTools::i_isFileExist($lDesiredNewFullFileName_str))
		{
			new CException('__update', 'File already exist: ' .$lDesiredNewFullFileName_str, CException::i_EXCEPTION_TYPE_EXTERNAL_LOGIC_ERROR);
		}

		CFileSystemTools::i_copyFile($lFullFileName_str, $lDesiredNewFullFileName_str);

		CImageTools::i_createResampledImage($lDesiredNewFullFileName_str, 90, 0, $lDesiredResampledNewFullFileName_str);

		/*$lTableData_a_arr	= [	CJOBContentTableData::i_TABLE_FIELD_JOB_NAME				=> '',
								CJOBContentTableData::i_TABLE_FIELD_JOB_FILE_NAME			=> CFileSystemTools::i_getFileName($lDesiredFullFileName_str, 1),
								CJOBContentTableData::i_TABLE_FIELD_JOB_PREVIEW_FILE_NAME	=> CFileSystemTools::i_getFileName($lResampledDesiredFullFileName_str, 1),
								CJOBContentTableData::i_TABLE_FIELD_JOB_TAGS				=> '',
								CJOBContentTableData::i_TABLE_FIELD_JOB_CATEGORY_ID		=> $aCategoryId_int,
								CJOBContentTableData::i_TABLE_FIELD_JOB_SUBCATEGORY_ID	=> $aSubcategoryId_int,

								CJOBContentTableData::i_TABLE_FIELD_USER_ID					=> 1,
								CJOBContentTableData::i_TABLE_FIELD_ADDITION_TIME			=> CDateTimeTools::i_getCurrentUTimeInSec(),
								CJOBContentTableData::i_TABLE_FIELD_TYPE						=> CJOBContentTableData::i_CONTENT_TYPE_ID_UNDEFINED,
								CJOBContentTableData::i_TABLE_FIELD_STATE					=> CJOBContentTableData::i_CONTENT_STATE_ID_ACTIVATED,
								CJOBContentTableData::i_TABLE_FIELD_STATUS					=> CJOBContentTableData::i_CONTENT_STATUS_ID_UNDEFINED];
*/
		//CDatabaseManager::i_getInstance()->i_getDatabaseTablesController()->i_getJOBMySQLDatabaseTablesController()->i_getMySQLDatabaseContentTableController()->i_addContentData($lTableData_a_arr, true);
	}

	private function _determineCategoryId(string $aCategoryStringId_str, array $aCategoriesData_clss_arr):int
	{
		$lAVTContentCategoriesTableData_clss = CJOBContentCategoriesTableData::i_toClassType($aCategoriesData_clss_arr[$aCategoryStringId_str]);
		return $lAVTContentCategoriesTableData_clss->i_getTableFieldId();
	}

	private function _determineSubcategoryId(int $aCategoryId_int, string $aSubcategoryStringId_str, array $aSubcategoriesData_clss_arr):int
	{
		foreach ($aSubcategoriesData_clss_arr as $lSubcategoryData_clss)
		{
			$lAVTContentSubcategoriesTableData_clss = CJOBContentSubcategoriesTableData::i_toClassType($lSubcategoryData_clss);
			if (
					$lAVTContentSubcategoriesTableData_clss->i_getTableFieldSubcategoryCategoryId() === $aCategoryId_int
					&& $lAVTContentSubcategoriesTableData_clss->i_getTableFieldSubcategoryStringId() === $aSubcategoryStringId_str
				)
			{
				return $lAVTContentSubcategoriesTableData_clss->i_getTableFieldId();
			}
		}

		new CException('_determineSubcategoryId', 'ILE!', CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
		return -1;
	}

	private function _determineDesiredDirectoryName(string $aRootFullDirectoryName_str, int $aOptDirectoryFilesCountLimit_int = 1000):string
	{
		$lDesiredDirectoryName_str = '0';

		$lDirectoriesNames_str_arr = CArrayTools::i_diff(CFileSystemTools::i_getAllDirectoriesNames($aRootFullDirectoryName_str, CFileSystemTools::i_FILE_SYSTEM_SORT_MODE_DESC), ['.', '..', 'resampled']);

		var_dump($lDirectoriesNames_str_arr);

		if (CArrayTools::i_count($lDirectoriesNames_str_arr) > 0)
		{
			$lDesiredDirectoryName_str = $lDirectoriesNames_str_arr[0];
		}

		var_dump($lDesiredDirectoryName_str);

		$lDesiredFullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$aRootFullDirectoryName_str, $lDesiredDirectoryName_str]);

		if (CFileSystemTools::i_isDirectoryExist($lDesiredFullDirectoryName_str))
		{
			$lFilesNames_str_arr = CArrayTools::i_diff(CFileSystemTools::i_getAllFilesNames($lDesiredFullDirectoryName_str), ['.', '..']);
			if (CArrayTools::i_count($lFilesNames_str_arr) >= $aOptDirectoryFilesCountLimit_int)
			{
				$lDesiredDirectoryName_str = CVariableTools::i_toString(CVariableTools::i_toInt($lDesiredDirectoryName_str) + 1);
				$lDesiredFullDirectoryName_str = CFileSystemTools::i_concatAsFullDirectoryName([$aRootFullDirectoryName_str, $lDesiredDirectoryName_str]);

				if (CFileSystemTools::i_isDirectoryExist($lDesiredFullDirectoryName_str))
				{
					new CException('_determineDesiredDirectoryName', 'Directory already exist: '. $lDesiredFullDirectoryName_str, CException::i_EXCEPTION_TYPE_INTERNAL_LOGIC_ERROR);
				}
			}
		}

		return $lDesiredDirectoryName_str;
	}

	private function _determineNewDesiredFileName(string $aDesiredFullDirectoryName_str, string $aFileExtension_str):string
	{
		$lDesiredFileNameWithoutExtension_str = '0';

		$lFilesNames_str_arr = CArrayTools::i_diff(CFileSystemTools::i_getAllFilesNames($aDesiredFullDirectoryName_str, CFileSystemTools::i_FILE_SYSTEM_SORT_MODE_DESC), ['.', '..']);
		if (CArrayTools::i_count($lFilesNames_str_arr) > 0)
		{
			$lDesiredFileNameWithoutExtension_str = CVariableTools::i_toString(CVariableTools::i_toInt(CFileSystemTools::i_getFileNameWithoutExtension($lFilesNames_str_arr[0])) + 1);
		}

		return $lDesiredFileNameWithoutExtension_str. '.' .$aFileExtension_str;
	}
}


?>