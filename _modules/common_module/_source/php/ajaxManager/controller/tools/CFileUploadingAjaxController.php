<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CFileUploadingAjaxController extends CCAjaxController
{
	/***************************************************
	 * INTERFACE
	 */

	/*override*/public function i_send():void
	{
		/*if (SOURCES_EXECUTION_MODE == SOURCES_EXECUTION_MODE_DEBUG)
		{
			CLog::addMessage('REQUEST AJAX: ' .$this->__getRequestName());
		}

		$lFile_obj = $_FILES['image_uploading'];
		$lFileName_str = mb_strtolower($lFile_obj['name'], 'utf-8');
		$lFileExtension_str = end(explode(".", $lFileName_str));
		$lTempFileName_str = CSystem::time(). '.' .$lFileExtension_str;
		$lTempFileName_str = CFileConst::STORAGE_IMAGE_DIRECTORY_TEMP . $lTempFileName_str;

		if ($this->_checkImageFileParams($lFile_obj)
			&& move_uploaded_file($lFile_obj['tmp_name'], $lTempFileName_str))
		{
			$lResizingFilesParams_str_arr_arr = CTools::generateResizingImages($lTempFileName_str, array(12000));

			ob_start();

			$lParams_arr 	= array(CComponentParam::IMAGE_ID 			=> 'qwerty',
									CComponentParam::IMAGE_FILE_NAME 	=> $lResizingFilesParams_str_arr_arr[0][0],
									CComponentParam::IMAGE_WIDTH 		=> $lResizingFilesParams_str_arr_arr[0][1],
									CComponentParam::IMAGE_HEIGHT 		=> $lResizingFilesParams_str_arr_arr[0][2],
									CComponentParam::IMAGE_TYPE 		=> CImage::TYPE_IMAGE_FILEFIELD);
			CComponentsView::getInstance()->getImage()->draw($lParams_arr);

			$lHTMLFile_str = ob_get_contents();

			ob_clean();

			echo
			'<script language="Javascript">top.jsFilefieldUploadingCompleted(\'' .'image_uploading'. '\', \'' .$lHTMLFile_str. '\');</script>';
		}
		else
		{
			echo
			'<script language="Javascript">top.jsFilefieldUploadingFailed(\'' .'image_uploading'. '\', \'' .$lFileName_str. '\');</script>';
		}*/
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __getAjaxRequestId():string
	{
		return '';
	}

	/*protected function __getRequestName()
	{
		return 'FILE_UPLOADING';
	}

	private function _checkImageFileParams($aFile_obj)
	{
		switch ($aFile_obj['error'])
		{
			case UPLOAD_ERR_OK:
			{
				$lFileSize_int = $aFile_obj['size'];
				if ($lFileSize_int > CFileConst::FILE_IMAGE_SIZE_MAX)
				{
					CLog::addMessage('Invalid image file size: ' .$lFileSize_int);
					return false;
				}

				$aImageInfo_obj = getimagesize($aFile_obj['tmp_name']);
				if (!$aImageInfo_obj)
				{
					CLog::addMessage('Image file not found');
					return false;
				}

				$lImageType_int = $aImageInfo_obj[2];
				if ($lImageType_int != IMAGETYPE_GIF
					&& $lImageType_int != IMAGETYPE_JPEG
					&& $lImageType_int != IMAGETYPE_PNG
					&& $lImageType_int != IMAGETYPE_JPEG2000)
				{
					CLog::addMessage('Invalid image file type: ' .$lImageType_int);
					return false;
				}

				$lImageResolutionX_int = $aImageInfo_obj[0];
				$lImageResolutionY_int = $aImageInfo_obj[1];
				if (($lImageResolutionX_int > CFileConst::IMAGE_RESOLUTION_MAX)
					|| ($lImageResolutionY_int > CFileConst::IMAGE_RESOLUTION_MAX))
				{
					CLog::addMessage('Invalid image file resolution: ' .$lImageResolutionX_int. '/' .$lImageResolutionY_int);
					return false;
				}
			}break;


			case UPLOAD_ERR_FORM_SIZE:
			case UPLOAD_ERR_PARTIAL:
			case UPLOAD_ERR_NO_FILE:
			{
				CLog::addMessage('Unknown image file error');
				return false;
			}break;
		}

		return true;
	}*/
}


?>