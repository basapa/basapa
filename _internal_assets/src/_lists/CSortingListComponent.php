<?php


namespace basapa_ns;


class CSortingListComponent //extends CListComponentBase
{
	const SYMBOL_SORTING_NO									= '▲▼';
	const SYMBOL_SORTING_ASC								= '▲ ';
	const SYMBOL_SORTING_DESC								= '▼ ';


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __getComponentType()
	{
		return 'css_slc';
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
		echo
		'<div class="css_component" style="' .$this->__getStyleComponent(). '">',
			'<div class="css_elements">',
				$this->__drawElementsIfExist(),
			'</div>',
		'</div>';
	}


	protected function __drawEnabledElement($aElement_obj)
	{
		echo
		'<a class="css_element css_rounded_medium css_enabled" style="' .$this->__getElementStyle($aElement_obj). '" href="' .$this->__getElementHref($aElement_obj). '" onclick="' .$this->__getElementClick($aElement_obj). '">',
			$this->__tryAddElementIcon($aElement_obj),
			$this->__tryAddElementValue($aElement_obj),
			$this->__tryAddElementName($aElement_obj),
			$this->__tryAddElementHint($aElement_obj),
		'</a>';
	}
}


?>