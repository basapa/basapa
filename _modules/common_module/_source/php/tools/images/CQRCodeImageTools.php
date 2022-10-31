<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CQRCodeImageTools
{
	//PARAMS...
	//public const i_QRCODE_IMAGE_PARAM_ID_SIZE					= 'size';
	//public const i_QRCODE_IMAGE_PARAM_ID_BG_COLOR_RGB			= 'bg_color_rgb';
	//public const i_QRCODE_IMAGE_PARAM_ID_FG_COLOR_RGB			= 'fg_color_rgb';
	//public const i_QRCODE_IMAGE_PARAM_ID_ENCODING				= 'encoding';
	public const i_QRCODE_IMAGE_PARAM_ID_ERROR_CORRECTION_LEVEL	= 'error_correction_level';
	public const i_QRCODE_IMAGE_PARAM_ID_MARGIN					= 'margin';
	//...PARAMS
	
	//ENCODING IDS...
	public const i_QRCODE_IMAGE_ENCODING_ID_UTF8				= 0;
	public const i_QRCODE_IMAGE_ENCODING_ID_DEFAULT				= self::i_QRCODE_IMAGE_ENCODING_ID_UTF8;
	//...ENCODING IDS
	
	//ERROR CORRECTION LEVEL IDS...
	public const i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_L			= 0;
	public const i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_M			= 1;
	public const i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_Q			= 2;
	public const i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_H			= 3;
	public const i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_DEFAULT	= self::i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_L;
	//...ERROR CORRECTION LEVEL IDS
	
	//GENERATION MODES...
	public const i_QRCODE_IMAGE_GENERATION_MODE_PHPQRCODE_LIB	= 0;
	public const i_QRCODE_IMAGE_GENERATION_MODE_GOOGLE_API		= 1;
	public const i_QRCODE_IMAGE_GENERATION_MODE_DEFAULT			= self::i_QRCODE_IMAGE_GENERATION_MODE_GOOGLE_API;
	//...GENERATION MODES
	
	
	/***************************************************
	 * INTERFACE
	 */

	static public function i_generateQRCodeImageBinaryData(string $aQRCodeImageContent_str, int $aOptQRCodeImageGenerationMode_int = self::i_QRCODE_IMAGE_GENERATION_MODE_DEFAULT):string
	{
		$lQRCodeImageBinaryData_str = '';
		if ($aOptQRCodeImageGenerationMode_int === self::i_QRCODE_IMAGE_GENERATION_MODE_PHPQRCODE_LIB)
		{
			$lQRCodeImageContent_str = HTMLspecialchars($aQRCodeImageContent_str);

			$lQRCodeImageBinaryData_str = \QRcode::text($lQRCodeImageContent_str, false, QR_ECLEVEL_H);
		}
		else
		{
			new CException('i_generateQrcodeImageBinaryData', 'Current qrcode generation mode not supported!');
		}
		
		return $lQRCodeImageBinaryData_str;
	}

	static public function i_generateQRCodeImagePNG(array $aQRCodeImageParams_a_arr, int $aOptQRCodeImageGenerationMode_int = self::i_QRCODE_IMAGE_GENERATION_MODE_DEFAULT):bool
	{
		$lQRCodeImageContent_str = HTMLspecialchars($aQRCodeImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_CONTENT]);
		$lQRCodeImageFullFileName_str = $aQRCodeImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_FILE_NAME];
		$lQRCodeImageWidth_int = $aQRCodeImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_WIDTH];
		$lQRCodeImageHeight_int = $aQRCodeImageParams_a_arr[CImageTools::i_IMAGE_PARAM_ID_HEIGHT];
		//$lQRCodeImageEncodingId_int = isset($aQRCodeImageParams_a_arr[self::i_QRCODE_IMAGE_PARAM_ID_ENCODING]) ? $aQRCodeImageParams_a_arr[self::i_QRCODE_IMAGE_PARAM_ID_ENCODING] : self::i_QRCODE_IMAGE_ENCODING_ID_DEFAULT;
		$lQRCodeImageErrorCorrectionLevelId_int = isset($aQRCodeImageParams_a_arr[self::i_QRCODE_IMAGE_PARAM_ID_ERROR_CORRECTION_LEVEL]) ? $aQRCodeImageParams_a_arr[self::i_QRCODE_IMAGE_PARAM_ID_ERROR_CORRECTION_LEVEL] : self::i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_DEFAULT;
		$lQRCodeImageMargin_int = isset($aQRCodeImageParams_a_arr[self::i_QRCODE_IMAGE_PARAM_ID_MARGIN]) ? $aQRCodeImageParams_a_arr[self::i_QRCODE_IMAGE_PARAM_ID_MARGIN] : 0;
		if ($lQRCodeImageWidth_int != $lQRCodeImageHeight_int)
		{
			new CException('i_generateQrcodeImagePNG', 'Qrcode image width and height must be equal!');
		}
		
		if ($aOptQRCodeImageGenerationMode_int === self::i_QRCODE_IMAGE_GENERATION_MODE_PHPQRCODE_LIB)
		{
			\QRcode::png_bsp($lQRCodeImageContent_str, $lQRCodeImageFullFileName_str, QR_ECLEVEL_L, /*$lQRCodeImageSize_int*/1000, 0, false, $lQRCodeImageWidth_int);

			return true;
		}
		else if ($aOptQRCodeImageGenerationMode_int === self::i_QRCODE_IMAGE_GENERATION_MODE_GOOGLE_API)
		{
			$lImageErrorCorrectionLevel_str = self::_getQRCodeImageErrorCorrectionLevelByGoogleApiMode($lQRCodeImageErrorCorrectionLevelId_int);

			$lContentParams_obj_arr	= [	'chs'	=> $lQRCodeImageWidth_int. 'x' .$lQRCodeImageHeight_int,
										'chld'	=> $lImageErrorCorrectionLevel_str. '|' .$lQRCodeImageMargin_int,
										'chl'	=> $lQRCodeImageContent_str];

			$lImageData_str = CRequestTools::i_sendRequest('chart.googleapis.com/chart?cht=qr', $lContentParams_obj_arr, CRequestTools::i_REQUEST_CONTENT_TYPE_IMAGE_PNG);
			
			return file_put_contents($lQRCodeImageFullFileName_str, $lImageData_str);
		}
		else
		{
			new CException('i_generateQRCodeImagePNG', 'Current qrcode generation mode not supported!');
		}

		return false;
	}

	/*
	 * INTERFACE
	 ***************************************************/

	static private function _getQRCodeImageErrorCorrectionLevelByGoogleApiMode(int $aQRCodeImageErrorCorrectionLevelId_int):string
	{
		$lQRCodeImageErrorCorrectionLevel_str = '';
		if ($aQRCodeImageErrorCorrectionLevelId_int === self::i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_L)
		{
			$lQRCodeImageErrorCorrectionLevel_str = 'L';
		}
		else if ($aQRCodeImageErrorCorrectionLevelId_int === self::i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_M)
		{
			$lQRCodeImageErrorCorrectionLevel_str = 'M';
		}
		else if ($aQRCodeImageErrorCorrectionLevelId_int === self::i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_Q)
		{
			$lQRCodeImageErrorCorrectionLevel_str = 'Q';
		}
		else if ($aQRCodeImageErrorCorrectionLevelId_int === self::i_QRCODE_IMAGE_ERROR_CORRECTION_LEVEL_ID_H)
		{
			$lQRCodeImageErrorCorrectionLevel_str = 'H';
		}
		else
		{
			new CException('_getQRCodeImageErrorCorrectionLevelByGoogleApiMode', 'Unsupported error correction level id: ' .$aQRCodeImageErrorCorrectionLevelId_int);
		}

		return $lQRCodeImageErrorCorrectionLevel_str;
	}
}


?>