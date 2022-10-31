<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CImageTools
{
	//PARAMS...
	public const i_IMAGE_PARAM_ID_WIDTH					= 'width';
	public const i_IMAGE_PARAM_ID_HEIGHT				= 'height';
	public const i_IMAGE_PARAM_ID_TYPE					= 'type';
	//...PARAMS

	//RESOLUTIONS...
	public const i_IMAGE_RESOLUTION_MIN_WIDTH			= 0;
	public const i_IMAGE_RESOLUTION_MAX_WIDTH			= CFilesConst::i_IMAGE_MAX_RESOLUTION;
	public const i_IMAGE_RESOLUTION_MIN_HEIGHT			= 0;
	public const i_IMAGE_RESOLUTION_MAX_HEIGHT			= CFilesConst::i_IMAGE_MAX_RESOLUTION;
	//...RESOLUTIONS

	//TYPES...
	public const i_IMAGE_TYPE_GIF						= IMAGETYPE_GIF;
	public const i_IMAGE_TYPE_JPEG						= IMAGETYPE_JPEG;
	public const i_IMAGE_TYPE_JPEG2000					= IMAGETYPE_JPEG2000;
	public const i_IMAGE_TYPE_PNG						= IMAGETYPE_PNG;
	public const i_IMAGE_TYPES							= [	self::i_IMAGE_TYPE_GIF,
															self::i_IMAGE_TYPE_JPEG,
															self::i_IMAGE_TYPE_JPEG2000,
															self::i_IMAGE_TYPE_PNG];
	//...TYPES


	/***************************************************
	 * INTERFACE
	 */

	static public function i_getImageParams(string $aImageFullFileName_str):array
	{
		if (!CFileSystemTools::i_isFileExist($aImageFullFileName_str))
		{
			new CException('i_getImageParams', 'File must be exist: ' .$aImageFullFileName_str);
		}
		
		$aRet_var = getimagesize($aImageFullFileName_str);
		self::_throwIfRetFailed($aRet_var);

		$lImageParams_a_arr = [];
		$lImageParams_a_arr[self::i_IMAGE_PARAM_ID_WIDTH] = $aRet_var[0];
		$lImageParams_a_arr[self::i_IMAGE_PARAM_ID_HEIGHT] = $aRet_var[1];
		$lImageParams_a_arr[self::i_IMAGE_PARAM_ID_TYPE] = $aRet_var[2];
		return $lImageParams_a_arr;
	}

	static public function i_getImageWidth(array $aImageParams_a_arr):int
	{
		if (!CVariableTools::i_isArray($aImageParams_a_arr))
		{
			new CException('i_getImageWidth', 'Invalid arg: ' .$aImageParams_a_arr);
		}
		return $aImageParams_a_arr[self::i_IMAGE_PARAM_ID_WIDTH];
	}
	
	static public function i_getImageHeight(array $aImageParams_a_arr):int
	{
		if (!CVariableTools::i_isArray($aImageParams_a_arr))
		{
			new CException('i_getImageHeight', 'Invalid arg: ' .$aImageParams_a_arr);
		}
		return $aImageParams_a_arr[self::i_IMAGE_PARAM_ID_HEIGHT];
	}

	static public function i_getImageType(array $aImageParams_a_arr):int
	{
		if (!CVariableTools::i_isArray($aImageParams_a_arr))
		{
			new CException('i_getImageType', 'Invalid arg: ' .$aImageParams_a_arr);
		}
		return $aImageParams_a_arr[self::i_IMAGE_PARAM_ID_TYPE];
	}

	static public function i_validateSupportedMinMaxImageResolution(int $aImageWidth_int, int $aImageHeight_int):bool
	{
		if (
				$aImageWidth_int < self::i_IMAGE_RESOLUTION_MIN_WIDTH
				|| $aImageWidth_int > self::i_IMAGE_RESOLUTION_MAX_WIDTH
			)
		{
			CLogFile::i_writeContentInLogFile('Unsupported image width: ' .$aImageWidth_int);
			return false;
		}

		if (
			$aImageHeight_int < self::i_IMAGE_RESOLUTION_MIN_HEIGHT
			|| $aImageHeight_int > self::i_IMAGE_RESOLUTION_MAX_HEIGHT
		)
		{
			CLogFile::i_writeContentInLogFile('Unsupported image height: ' .$aImageHeight_int);
			return false;
		}

		return true;
	}

	static public function i_validateSupportedImageType(int $aImageType_int):bool
	{
		if (!CArrayTools::i_isInArray($aImageType_int, self::i_IMAGE_TYPES))
		{
			CLogFile::i_writeContentInLogFile('Unsupported image type: ' .$aImageType_int);
			return false;
		}

		return true;
	}

	static public function i_createResampledImage(string $aFullFileName_str, int $aOptDesiredWidth_int = 0, int $aOptDesiredHeight_int = 0, string $aOptResampledFullFileName_str = ''):string
	{
		$lImageParams_a_arr = self::i_getImageParams($aFullFileName_str);
		$lWidth_int = self::i_getImageWidth($lImageParams_a_arr);
		$lHeight_int = self::i_getImageHeight($lImageParams_a_arr);
		$lType_int = self::i_getImageType($lImageParams_a_arr);

		$lDesiredWH_int_arr = self::_calcDesiredImageWH($lWidth_int, $lHeight_int, $aOptDesiredWidth_int, $aOptDesiredHeight_int);
		$lDesiredWidth_int = $lDesiredWH_int_arr[0];
		$lDesiredHeight_int = $lDesiredWH_int_arr[1];

		if (
				$lWidth_int === $lDesiredWidth_int
				&& $lHeight_int === $lDesiredHeight_int
			)
		{
			new CException('i_createResampledImage', 'Original WH and Desired WH cannot be equal!');
		}

		if (empty($aOptResampledFullFileName_str))
		{
			$lFileParts_str_arr = CStringTools::i_split($aFullFileName_str, '/');
			$lFileName_str = CArrayTools::i_extractLastValue($lFileParts_str_arr);
			$lFileNameParts_str_arr = CStringTools::i_split($lFileName_str, '.');
			$lResampledFullFileName_str = CArrayTools::i_join($lFileParts_str_arr, '/'). '/' .$lFileNameParts_str_arr[0]. '_' .$lDesiredWidth_int. 'x' .$lDesiredHeight_int. '.' .$lFileNameParts_str_arr[1];
		}
		else
		{
			$lResampledFullFileName_str = $aOptResampledFullFileName_str;
		}

		switch ($lType_int)
		{
			case self::i_IMAGE_TYPE_GIF:
			{
				//$lImage_obj = new \Imagick($aFullFileName_str);
				//$lImage_obj = $lImage_obj->coalesceImages();

				/*do
				{
					$lImage_obj->resizeImage($lDesiredWidth_int, $lDesiredHeight_int, \Imagick::FILTER_BOX, 1);
				} while ($lImage_obj->nextImage());

				$lImage_obj = $lImage_obj->deconstructImages();
				$lImage_obj->writeImages($lResampledFullFileName_str, true);*/
				//$lImage_obj->clear();
				//$lImage_obj->destroy();
			}break;

			case self::i_IMAGE_TYPE_JPEG:
			case self::i_IMAGE_TYPE_JPEG2000:
			{
				$lImage_obj = imagecreatetruecolor($lDesiredWidth_int, $lDesiredHeight_int);

				imagecopyresampled($lImage_obj, imagecreatefromjpeg($aFullFileName_str), 0, 0, 0, 0, $lDesiredWidth_int, $lDesiredHeight_int, $lWidth_int, $lHeight_int);
				imagejpeg($lImage_obj, $lResampledFullFileName_str, 100);
				imagedestroy($lImage_obj);
			}break;

			case self::i_IMAGE_TYPE_PNG:
			{
				$lImage_obj = imagecreatetruecolor($lDesiredWidth_int, $lDesiredHeight_int);

				imagecopyresampled($lImage_obj, imagecreatefrompng($aFullFileName_str), 0, 0, 0, 0, $lDesiredWidth_int, $lDesiredHeight_int, $lWidth_int, $lHeight_int);
				imagepng($lImage_obj, $lResampledFullFileName_str);
				imagedestroy($lImage_obj);
			}break;

			default:
				new CException('i_createResampledImage', 'Unsupported image type: ' .$lType_int);
			break;
		}

		return $lResampledFullFileName_str;
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	static private function _calcDesiredImageWH(int $aOriginalWidth_int, int $aOriginalHeight_int, int $aOptDesiredWidth_int = 0, int $aOptDesiredHeight_int = 0):array
	{
		if (
				$aOptDesiredWidth_int === 0
				&& $aOptDesiredHeight_int === 0
			)
		{
			return [$aOriginalWidth_int, $aOriginalHeight_int];
		}

		$l_int_arr = null;

		if ($aOptDesiredWidth_int === 0)
		{
			$lOriginalRatio_num = $aOriginalHeight_int / $aOriginalWidth_int;

			$l_int_arr = [CMathTools::i_roundInt($aOptDesiredHeight_int / $lOriginalRatio_num), $aOptDesiredHeight_int];
		}
		else if ($aOptDesiredHeight_int === 0)
		{
			$lOriginalRatio_num = $aOriginalWidth_int / $aOriginalHeight_int;

			$l_int_arr = [$aOptDesiredWidth_int, CMathTools::i_roundInt($aOptDesiredWidth_int / $lOriginalRatio_num)];
		}

		return $l_int_arr;
	}
	
	static private function _throwIfRetFailed($aRet_var)
	{
		if ($aRet_var === false)
		{
			new CException('_throwIfRetFailed', 'Ret value: ' .$aRet_var);
		}
	}
}


?>