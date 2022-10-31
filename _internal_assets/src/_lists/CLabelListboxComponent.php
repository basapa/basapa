<?php


namespace basapa_ns;


final class CCLabelListboxComponent// extends CCListComponent
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __getComponentName()
	{
		return 'css_llbc';
	}


	protected function __draw()
	{
		switch ($this->__getType())
		{
			default:
				$this->_drawTypeSimple();
			break;
		}
	}


	private function _drawTypeSimple()
	{
		$lFirstSelectedElement_obj = $this->__getFirstSelectedElement();

		echo
		'<div class="css_component" style="' .$this->__getStyleComponent(). '">',
			$this->__drawSelectedElement($lFirstSelectedElement_obj),
			'<div class="css_elements css_shadow_low css_rounded_medium">',
				$this->__drawElementsIfExist(),
			'</div>',
			'<input class="css_component_value" id="value_' .$this->__getId(). '" type="hidden" name="value_' .$this->__getTransmit(). '" value="' .$this->__getElementValue($lFirstSelectedElement_obj). '">',
		'</div>';
	}


	protected function __drawElementsIfExist()
	{
		$lElements_arr = $this->__getElements();
		if (!$lElements_arr)
		{
			return;
		}

		$lCount_int = count($lElements_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lElement_obj = $lElements_arr[$i];
			switch ($this->__getElementState($lElement_obj))
			{
				case CComponentParam::ELEMENT_STATE_SELECTED:
				case CComponentParam::ELEMENT_STATE_ENABLED:
				{
					$this->__drawEnabledElement($lElement_obj);
				}break;


				case CComponentParam::ELEMENT_STATE_DISABLED:
				{
					$this->__drawDisabledElement($lElement_obj);
				}break;


				default:
				break;
			}
		}
	}


	protected function __drawEnabledElement($aElement_obj)
	{
		$lElementClick_str = 'jsLlbcElementClicked(\'selected_element_' .$this->__getId(). '\', \'value_' .$this->__getId(). '\', this); return false;';

		echo
		'<a class="css_element css_rounded_medium css_enabled" style="' .$this->__getElementStyle($aElement_obj). '" href="#" onclick="' .$lElementClick_str. '">',
			$this->__tryAddElementValue($aElement_obj),
			$this->__tryAddElementIcon($aElement_obj),
			$this->__tryAddElementName($aElement_obj),
			$this->__tryAddElementHint($aElement_obj),
		'</a>';
	}


	protected function __drawSelectedElement($aElement_obj)
	{
		echo
		'<a id="selected_element_' .$this->__getId(). '" class="css_element css_rounded_medium css_selected" style="' .$this->__getElementStyle($aElement_obj). '" href="#" onclick="">',
			$this->__tryAddElementValue($aElement_obj),
			$this->__tryAddElementName($aElement_obj),
			'<img style="padding:2px;" src="/internals/resources/common/images/components/label_list/arrow_dropped_list.gif" alt="список">',
		'</a>';
	}
}


?>