<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CCFilesUploadingFormCompositeComponentView extends CCFormCompositeComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON	= 'i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON';
	public const i_JS_COMPOSITE_COMPONENT_PREFIX_FILE_IMAGE_		= 'i_COMPOSITE_COMPONENT_PREFIX_FILE_IMAGE_';
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_MAX_AVAILABLE_FILES_COUNT	= 'max_available_files_count';
	//...PARAM IDS

	//IDS...
	public const i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON	= 'files_uploading_button';
	public const i_COMPOSITE_COMPONENT_PREFIX_FILE_IMAGE_			= 'file_image_';
	//...IDS

	//CSS...
	private const _CSS_COMPONENT						= 'css_files_uploading_composite_component';
	//...CSS

	//CLASSES...
	private const _FILES_UPLOADING_BUTTON_COMPONENT_CLASSES			= 'css_button_component_file_uploading_button';
	private const _FILES_UPLOADING_BUTTON_COMPONENT_ELEMENT_CLASSES	= 'css_button_component_element_file_uploading_button css_blue css_rounded_low';
	//...CLASSES


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.composite_ns.i_importJSCFilesUploadingCompositeComponentViewClass()';
	}
	//...JS

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lCompositeComponentParams_a_arr = $this->__getCompositeComponentParams();

		//FILE UPLOADING BUTTON...
		$lParams_a_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON];

		$this->_drawFileButtonComponent($lParams_a_arr, self::i_JS_COMPOSITE_COMPONENT_ID_FILES_UPLOADING_BUTTON, self::_FILES_UPLOADING_BUTTON_COMPONENT_CLASSES, self::_FILES_UPLOADING_BUTTON_COMPONENT_ELEMENT_CLASSES);
		//...FILE UPLOADING BUTTON

		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->_drawFileImageComponent();
		echo
		'</div>';
	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	private function _getCompositeComponentMaxAvailableFilesCount():int
	{
		//TODO: optimization required
		return CVariableTools::i_toInt($this->__getParamValue(self::i_PARAM_ID_MAX_AVAILABLE_FILES_COUNT, true));
	}
	//...PARAMS

	/*private function _drawFileImageComponents($aTranslationData_clss_arr, $aValidationParams_obj_arr)
	{
		//FILE IMAGE...
		$this->_drawFileImageComponent(CCFilesUploadingCompositeComponentView::i_COMPOSITE_COMPONENT_IMAGE_FILE_IMAGE, $aTranslationData_clss_arr, $aValidationParams_obj_arr, 'css_image_component_file_image', 'css_image_component_element_file_image');
		//...FILE IMAGE

		//FILE IMAGE 2...
		$this->_drawFileImage2Component(CCFilesUploadingCompositeComponentView::i_COMPOSITE_COMPONENT_IMAGE_FILE_IMAGE_2, $aTranslationData_clss_arr, $aValidationParams_obj_arr, 'css_image_component_file_image', 'css_image_component_element_file_image');
		//...FILE IMAGE 2
	}*/

	private function _drawFileButtonComponent(array $aParams_a_arr, string $aJSComponentId_str, string $aClassesParam_str, string $aElementClassesParam_str)
	{
		$lParams_a_arr	= [	CCFileButtonComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> $aClassesParam_str,
							CCFileButtonComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> $aElementClassesParam_str,
							CCFileButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> $aJSComponentId_str,
							CCFileButtonComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSCompositeComponentInitFunc()];

		foreach ($aParams_a_arr as $lKey_str => $lValue_var)
		{
			if (isset($lParams_a_arr[$lKey_str]))
			{
				new CException('_drawFileButtonComponent', 'Button param already exist: ' .$lKey_str);
			}
		}

		$lParams_a_arr = CArrayTools::i_merge($lParams_a_arr, $aParams_a_arr);
		$this->__getComponentsView()->i_getButtonComponentsView()->i_getFileButtonComponentView()->i_draw($lParams_a_arr/*, true, $this->__fComponentJSDrawingContents_str_arr[CCFilesUploadingCompositeComponentView::i_JS_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON]*/);
	}

	private function _drawFileImageComponent():void
	{
		$lComponentTranslationData_clss = null;//$aComponentTranslationData_clss_arr[$aCompositeComponentType_int];
		$lComponentId_str = 'ID3';//$aComponentValidationParams_a_arr[CJOBRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID][$aCompositeComponentType_int];

		$lParams_a_arr	= [	CCFileImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> $lComponentId_str,
							CCFileImageComponentView::i_PARAM_ID_OPT_COMPONENT_NAME					=> 'LABEL',//$lComponentTranslationData_clss->getName(),
							CCFileImageComponentView::i_PARAM_ID_COMPONENT_WIDTH					=> 80,
							CCFileImageComponentView::i_PARAM_ID_COMPONENT_HEIGHT					=> 80,
							CCFileImageComponentView::i_PARAM_ID_COMPONENT_FILE_NAME				=> CURLTools::i_applyFullSiteName(CCFileConst::i_INTERNALS_IMAGES_DIRECTORY_NAME. '/' .CCFileConst::i_IMAGE_LOGO_80x80_FILE_NAME),
							CCFileImageComponentView::i_PARAM_ID_OPT_COMPONENT_ALT					=> '',//CTools::replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
							//CCFileImageComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> $aClassesParam_str,
							//CCFileImageComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> $aElementClassesParam_str,
							//CCFileImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> self::i_JS_COMPOSITE_COMPONENT_ID_FILE_IMAGE,
							CCFileImageComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC			=> $this->__getJSCompositeComponentInitFunc()];
		$this->__getComponentsView()->i_getImageComponentsView()->i_getFileImageComponentView()->i_draw($lParams_a_arr/*, true, $this->__fComponentJSDrawingContents_str_arr[CCFilesUploadingCompositeComponentView::i_JS_COMPOSITE_COMPONENT_ID_FILE_IMAGE]*/);
	}

	/*private function _drawFileImage2Component(int $aCompositeComponentType_int, array $aComponentTranslationData_clss_arr, array $aComponentValidationParams_obj_arr, string $aClassesParam_str, string $aElementClassesParam_str)
	{
		$lComponentTranslationData_clss = null;//$aComponentTranslationData_clss_arr[$aCompositeComponentType_int];
		$lComponentId_str = 'ID4';//$aComponentValidationParams_obj_arr[CJOBRequestController::COMPONENT_VALIDATION_PARAM_ID_FIELD_ID][$aCompositeComponentType_int];

		$lParams_obj_arr	= array(CCFileImageComponentView::i_PARAM_ID						=> $lComponentId_str,
			//CCFileImageComponentView::PARAM_NAME					=> 'LABEL',//$lComponentTranslationData_clss->getName(),
			CCFileImageComponentView::i_PARAM_WIDTH					=> 80,
			CCFileImageComponentView::i_PARAM_HEIGHT					=> 80,
			CCFileImageComponentView::i_PARAM_FILE_NAME				=> CURLTools::i_applyFullSiteName(CCFileConst::i_INTERNALS_IMAGES_DIRECTORY_NAME . CCFileConst::i_IMAGE_LOGO_80x80_FILE_NAME),
			CCFileImageComponentView::i_PARAM_ALT						=> '',//CTools::replace($lEncodingTextTextareaData_clss->getDescription(), CJOBTextAvatarGenerationFormView::ENCODING_TEXT_FIELD_MIN_CHARS_COUNT, CTools::REPLACING_PATTERN_MIN_CHARS_COUNT),
			CCFileImageComponentView::i_PARAM_CLASSES					=> $aClassesParam_str,
			CCFileImageComponentView::i_PARAM_ELEMENT_CLASSES			=> $aElementClassesParam_str,
			CCFileImageComponentView::i_PARAM_JS_COMPONENT_ID			=> CCFilesUploadingCompositeComponentView::i_JS_COMPOSITE_COMPONENT_ID_FILE_IMAGE_2,
			CCFileImageComponentView::i_PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSCompositeComponentInitFunc());
		$this->__getComponentsView()->i_getImageComponentsView()->i_getFileImageComponentView()->i_draw($lParams_obj_arr, true, $this->__fComponentJSDrawingContents_str_arr[CCFilesUploadingCompositeComponentView::i_JS_COMPOSITE_COMPONENT_ID_FILE_IMAGE_2]);
	}*/
}


?>