<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CCFilefieldFormCompositeComponentView extends CCFormCompositeComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD	= 'COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD';
	public const i_JS_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON	= 'COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON';
	//...JS PHP AGREEMENTS

	public const i_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD		= 0;
	public const i_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON		= 1;

	//CSS...
	private const _CSS_COMPONENT						= 'css_filefield_composite_component';
	//...CSS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.composite_ns.i_importJSCFilefieldCompositeComponentViewClass()';
	}
	//...JS

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lCompositeComponentParams_a_arr = $this->__getCompositeComponentParams();
		$lCompositeComponentFillingMode_int = $this->__getCompositeComponentFillingMode();

		//FILE NAME...
		$lParams_a_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD];
		if ($lCompositeComponentFillingMode_int === self::i_FILLING_MODE_ID_MANDATORY)
		{
			if (isset($lParams_a_arr[CCLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME]))
			{
				$lParams_a_arr[CCLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_NAME] .= self::__MANDATORY_FIELD_MARKER;
			}
			else if (isset($lParams_a_arr[CCLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION]))
			{
				$lParams_a_arr[CCLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION] .= self::__MANDATORY_FIELD_MARKER;
			}
		}

		$this->_drawSimpleLabelfieldComponent($lParams_a_arr, self::i_JS_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD, 'css_labelfield_component_file_name', 'css_labelfield_component_element_file_name');
		//...FILE NAME

		//FILE UPLOADING BUTTON...
		$lParams_a_arr = $lCompositeComponentParams_a_arr[self::i_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON];

		$this->_drawFileButtonComponent($lParams_a_arr, self::i_JS_COMPOSITE_COMPONENT_ID_FILE_UPLOADING_BUTTON, 'css_button_component_file_uploading_button', 'css_button_component_element_file_uploading_button css_blue css_rounded_low');
		//...FILE UPLOADING BUTTON
	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	//...PARAMS

	private function _drawSimpleLabelfieldComponent(array $aParams_a_arr, string $aJSComponentId_str, string $aClassesParam_str, string $aElementClassesParam_str):void
	{
		$lParams_a_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aClassesParam_str,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aElementClassesParam_str,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID				=> $aJSComponentId_str,
							CCSimpleLabelfieldComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSCompositeComponentInitFunc()];

		foreach ($aParams_a_arr as $lKey_str => $lValue_var)
		{
			if (isset($lParams_a_arr[$lKey_str]))
			{
				new CException('_drawSimpleLabelfieldComponent', 'Labelfield param already exist: ' .$lKey_str);
			}
		}

		$lParams_a_arr = CArrayTools::i_merge($lParams_a_arr, $aParams_a_arr);
		$this->__getComponentsView()->i_getLabelfieldComponentsView()->i_getSimpleLabelfieldComponentView()->i_draw($lParams_a_arr/*, true, $this->__fComponentJSDrawingContents_str_arr[CCFilesUploadingCompositeComponentView::i_JS_COMPOSITE_COMPONENT_ID_FILE_NAME_LABELFIELD]*/);
	}

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
}


?>