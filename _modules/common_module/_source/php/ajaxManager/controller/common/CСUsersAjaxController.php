<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCDatabaseUsersTableAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_send():void
	{
		/*$lMainData_clss = $this->__getMainData();
		//$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		//$lLangId_str = $lMainData_clss->i_getGETParamLangId();

		if ($lMainData_clss->i_isFILESParamDefined(CCAjaxConst::i_REQUEST_PARAM_ID_FILE))
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

	/*protected function __getRequestName()
	{
		return 'USER';
	}*/

	/*override*/protected function __getAjaxRequestId():string
	{
		//return DatabaseManager::instance()->databaseController()->userDatabaseController()->getDataById($this->__ajaxValue(), '');
		return '';
	}
}


?>