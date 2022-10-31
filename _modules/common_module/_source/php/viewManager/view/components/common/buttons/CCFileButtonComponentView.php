<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCFileButtonComponentView extends CCButtonComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_OPT_MAX_FILE_SIZE				= 'max_file_size';
	public const i_PARAM_ID_OPT_MAX_FILES_COUNT				= 'max_files_count';
	public const i_PARAM_ID_OPT_SUPPORTED_FILE_TYPES		= 'supported_file_types';
	public const i_PARAM_ID_OPT_IS_MULTIPLE_MODE_ALLOWED	= 'opt_is_multiple_mode_allowed';
	//...PARAM IDS
	
	//SUPPORTED TYPES...
	public const i_SUPPORTED_FILE_TYPE_JPG				= CImageTools::i_IMAGE_TYPE_JPEG;
	public const i_SUPPORTED_FILE_TYPE_PNG				= CImageTools::i_IMAGE_TYPE_PNG;
	//...SUPPORTED TYPES

	//SUPPORTED MIME-TYPES...
	//private const i_SUPPORTED_FILE_MIME_TYPE_IMAGE	= 'image&frasl;*';
	private const _SUPPORTED_FILE_MIME_TYPE_JPG			= 'image&frasl;jpeg';
	private const _SUPPORTED_FILE_MIME_TYPE_PNG			= 'image&frasl;png';
	//...SUPPORTED MIME-TYPES

	//CSS...
	private const _CSS_COMPONENT						= 'css_file_button_component';
	private const _CSS_COMPONENT_FILE_INPUT				= 'css_file_input';
	private const _CSS_COMPONENT_ELEMENT_CUT_CONTAINER	= 'css_element_cut_container';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentPreNameIfRequired();
			$this->__drawHTMLComponentElement();
			$this->__drawHTMLComponentPostNameIfRequired();
		echo
		'</div>',
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
			$this->__drawHTMLComponentHintIfRequired();
		echo
		'</div>';
	}

	//JS...
	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.buttons_ns.i_importJSCFileButtonComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentSupportedFileMimeTypes_str_arr = [];

		$lComponentSupportedFileTypes_str_arr = $this->__getComponentSupportedFileTypes();
		$lCount_int = CArrayTools::i_count($lComponentSupportedFileTypes_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			switch ($lComponentSupportedFileTypes_str_arr[$i])
			{
				case self::i_SUPPORTED_FILE_TYPE_JPG:
				{
					$lComponentSupportedFileMimeTypes_str_arr[] = self::_SUPPORTED_FILE_MIME_TYPE_JPG;
				}break;

				case self::i_SUPPORTED_FILE_TYPE_PNG:
				{
					$lComponentSupportedFileMimeTypes_str_arr[] = self::_SUPPORTED_FILE_MIME_TYPE_PNG;
				}break;

				default:
					new CException('__drawHTMLComponentElement', 'Unsupported file type: ' .$lComponentSupportedFileTypes_str_arr[$i]);
				break;
			}
		}

		$lSupportedFileMimeTypes_str = CArrayTools::i_join($lComponentSupportedFileMimeTypes_str_arr, ',');
		$lIsMultipleMode_str = CVariableTools::i_toString($this->__isComponentMultipleModeAllowed());

		echo
		'<div class="' .$this->__getComponentElementClasses(). '" style="' .$this->__getComponentElementStyles(). '">';
			$this->__drawHTMLComponentNameIfRequired();
			echo
			'<div class="' .self::_CSS_COMPONENT_ELEMENT_CUT_CONTAINER. '">
				<input class="' .self::_CSS_COMPONENT_FILE_INPUT. '" id="' .$this->__getComponentElementId(). '" name="' .$this->__getComponentId(). '" type="file" size="1" multiple="' .$lIsMultipleMode_str. '" accept="' .$lSupportedFileMimeTypes_str. '">
			</div>
		</div>';
	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//MAX FILE SIZE...
	protected function __getComponentMaxFileSize():int
	{
		//TODO: optimization required
		return CVariableTools::i_toInt($this->__getParamValue(self::i_PARAM_ID_OPT_MAX_FILE_SIZE, false, 1));
	}

	protected function __getComponentMaxFilesCount():int
	{
		//TODO: optimization required
		return CVariableTools::i_toInt($this->__getParamValue(self::i_PARAM_ID_OPT_MAX_FILES_COUNT, false, 1));
	}
	//...MAX FILE SIZE

	protected function __getComponentSupportedFileTypes():array
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_SUPPORTED_FILE_TYPES, false, [self::i_SUPPORTED_FILE_TYPE_JPG, self::i_SUPPORTED_FILE_TYPE_PNG]);
	}

	protected function __isComponentMultipleModeAllowed():bool
	{
		return CVariableTools::i_toBoolean($this->__getParamValue(self::i_PARAM_ID_OPT_IS_MULTIPLE_MODE_ALLOWED, false, false));
	}
	//...PARAMS
}


?>