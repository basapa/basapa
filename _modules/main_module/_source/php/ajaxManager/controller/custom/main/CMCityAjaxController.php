<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CMCitiesAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_update()
	{
		/*$lFile_obj = $_FILES['datafile'];
		$lName_str = $lFile_obj['name'];
		$lFileExtension_str = end(explode(".", $lName_str));
		$lFileName_str = 'test'. '.' .$lFileExtension_str;
*/
		/*if (!file_exists($lFileName_str))
		{
			mkdir($lFileName_str, 0750);
		}*/

		/*if (!move_uploaded_file($lFile_obj['tmp_name'], 'release/'.$lName_str))
		{
			return;
		}

		echo '<script language="Javascript">parent.test(\'' .$lName_str. '\', \''.SITE_FULL_NAME.'release/'.'\');</script>';*/
	}

	/*
	 * INTERFACE
	 ***************************************************/

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