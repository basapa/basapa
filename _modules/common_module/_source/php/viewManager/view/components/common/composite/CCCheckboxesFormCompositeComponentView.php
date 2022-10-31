<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


final class CCCheckboxesFormCompositeComponentView extends CCFormCompositeComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPOSITE_COMPONENT_PREFIX_CHECKBOX_	= 'COMPOSITE_COMPONENT_PREFIX_CHECKBOX_';
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_CHECKBOXES_COUNT			= 'checkboxes_count';
	//...PARAM IDS

	//CSS...
	private const _CSS_COMPONENT						= 'css_checkboxes_composite_component';
	//...CSS

	//CLASSES...
	private const _CHECKBOX_COMPONENT_CLASSES			= 'css_checkbox_component';
	private const _CHECKBOX_COMPONENT_ELEMENT_CLASSES	= 'css_checkbox_component_element';
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
		return 'bsp.components_ns.composite_ns.importJSCCheckboxesCompositeComponentClass()';
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentElement();
	}

	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		//$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<label for="' .$this->__getComponentId(). '">';
			$this->__drawHTMLCompositeComponentNameIfRequired();
			//$this->__drawHTMLComponentPreNameIfRequired();
			//$this->__drawHTMLComponentElement();
			//$this->__drawHTMLComponentPostNameIfRequired();
			//$this->__drawHTMLComponentHintIfRequired();
			//$this->__drawHTMLComponentErrorMessageIfRequired();

			$lCompositeComponentParams_a_arr = $this->__getCompositeComponentParams();
			$lCompositeComponentFillingMode_int = $this->__getCompositeComponentFillingMode();
			$lCompositeComponentCheckboxesCount_int = $this->_getCompositeComponentCheckboxesCount();

			for ($i = 0; $i < $lCompositeComponentCheckboxesCount_int; $i++)
			{
				//CHECKBOX...
				$lParams_a_arr = $lCompositeComponentParams_a_arr[$i];
				if ($lCompositeComponentFillingMode_int === self::i_FILLING_MODE_ID_MANDATORY)
				{
					/*if (isset($lParams_a_arr[CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_NAME]))
					{
						$lParams_a_arr[CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_NAME] .= self::__MANDATORY_FIELD_MARKER;
					}
					else if (isset($lParams_a_arr[CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION]))
					{
						$lParams_a_arr[CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_CAPTION] .= self::__MANDATORY_FIELD_MARKER;
					}*/
				}

				$this->_drawSimpleCheckboxComponent($lParams_a_arr, self::i_JS_COMPOSITE_COMPONENT_PREFIX_CHECKBOX_ . $i, self::_CHECKBOX_COMPONENT_CLASSES, self::_CHECKBOX_COMPONENT_ELEMENT_CLASSES);
				//...CHECKBOX
			}

		echo
		'</label>';
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			//$this->__drawHTMLComponentDescriptionIfRequired();
		echo
		'</div>';






	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	private function _getCompositeComponentCheckboxesCount():int
	{
		//TODO: optimization required
		return CVariableTools::i_toInt($this->__getParamValue(self::i_PARAM_ID_CHECKBOXES_COUNT, true));
	}
	//...PARAMS

	private function _drawSimpleCheckboxComponent(array $aParams_a_arr, string $aJSComponentId_str, string $aClassesParam_str, string $aElementClassesParam_str):void
	{
		$lParams_a_arr	= [	CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> $aClassesParam_str,
							CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> $aElementClassesParam_str,
							//CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_ID			=> $aJSComponentId_str,
							CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_COMPONENT_STYLES			=> 'display:inline-block;',
							CCSimpleCheckboxComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC	=> $this->__getJSCompositeComponentInitFunc()];

		foreach ($aParams_a_arr as $lKey_str => $lValue_var)
		{
			if (isset($lParams_a_arr[$lKey_str]))
			{
				new CException('_drawSimpleCheckboxComponent', 'Checkbox param already exist: ' .$lKey_str);
			}
		}

		$lParams_a_arr = CArrayTools::i_merge($lParams_a_arr, $aParams_a_arr);
		$this->__getComponentsView()->i_getCheckboxComponentsView()->i_getSimpleCheckboxComponentView()->i_draw($lParams_a_arr);
	}
}


?>