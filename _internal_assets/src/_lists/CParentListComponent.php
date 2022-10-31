<?php


namespace basapa_ns;


class CListComponentBase //extends CComponentBase
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/
	
	
	protected function __tryAddName()
	{
		$lName_str = $this->__getName();
		return $lName_str ? '<span class="css_list_name">' .$lName_str. '</span>' : '';
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
				case CComponentParam::ELEMENT_STATE_ENABLED:
				{
					$this->__drawEnabledElement($lElement_obj);
				}break;


				case CComponentParam::ELEMENT_STATE_DISABLED:
				{
					$this->__drawDisabledElement($lElement_obj);
				}break;


				case CComponentParam::ELEMENT_STATE_SELECTED:
				{
					$this->__drawSelectedElement($lElement_obj);
				}break;


				default:
					$this->__drawEnabledElement($lElement_obj);
				break;
			}
		}
	}
	
	
	protected function __drawEnabledElement($aElement_obj)
	{
		echo
		'<a class="css_element css_rounded_medium css_enabled" style="' .$this->__getElementStyle($aElement_obj). '" href="' .$this->__getElementHref($aElement_obj). '" onclick="' .$this->__getElementClick($aElement_obj). '">',
			$this->__tryAddElementValue($aElement_obj),
			$this->__tryAddElementIcon($aElement_obj),
			$this->__tryAddElementName($aElement_obj),
			$this->__tryAddElementHint($aElement_obj),
		'</a>';
	}


	protected function __drawDisabledElement($aElement_obj)
	{
		echo
		'<div class="css_element css_rounded_medium css_disabled" style="' .$this->__getElementStyle($aElement_obj). '">',
			$this->__tryAddElementIcon($aElement_obj),
			$this->__tryAddElementName($aElement_obj),
		'</div>';
	}


	protected function __drawSelectedElement($aElement_obj)
	{
		echo
		'<a class="css_element css_rounded_medium css_selected" style="' .$this->__getElementStyle($aElement_obj). '" href="' .$this->__getElementHref($aElement_obj). '" onclick="' .$this->__getElementClick($aElement_obj). '">',
			$this->__tryAddElementValue($aElement_obj),
			$this->__tryAddElementIcon($aElement_obj),
			$this->__tryAddElementName($aElement_obj),
		'</a>';
	}
	
	
	protected function __tryAddElementIcon($aElement_obj)
	{
		$lElementIcon_str = $this->__getElementIcon($aElement_obj);
		return $lElementIcon_str ? '<span class="css_element_icon">' .$lElementIcon_str. '</span>' : '';
	}
	
	
	protected function __tryAddElementName($aElement_obj)
	{
		$lElementName_str = $this->__getElementName($aElement_obj);
		return $lElementName_str ? '<span class="css_element_name">' .$lElementName_str. '</span>' : '';
	}
	
	
	protected function __tryAddElementValue($aElement_obj)
	{
		$lElementValue_str = $this->__getElementValue($aElement_obj);
		return $lElementValue_str ? '<span class="css_element_value">' .$lElementValue_str. '</span>' : '';
	}
	
	
	protected function __tryAddElementHint($aElement_obj)
	{
		$lElementHint_str = $this->__getElementHint($aElement_obj);
		return $lElementHint_str ? '<span class="css_element_hint css_hint css_rounded_medium css_shadow_medium">' .$lElementHint_str. '<span class="css_hint_pointer"></span></span>' : '';
	}
	
	
	protected function __getFirstSelectedElement()
	{
		$lElements_arr = $this->__getElements();
		if (!$lElements_arr)
		{
			return null;
		}

		$lCount_int = count($lElements_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lElement_obj = $lElements_arr[$i];
			
			if ($this->__getElementState($lElement_obj) == CComponentParam::ELEMENT_STATE_SELECTED)
			{
				return $lElement_obj;
			}
		}
		
		return null;
	}
}


?>