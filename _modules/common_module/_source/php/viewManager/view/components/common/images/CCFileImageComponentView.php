<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCFileImageComponentView extends CCImageComponentView
{
	//JS PHP AGREEMENTS...
	public const i_JS_COMPONENT_ATTR_ELEMENT_LOADING_ID			= 'COMPONENT_ATTR_ELEMENT_LOADING_ID';
	public const i_JS_COMPONENT_ATTR_ELEMENT_DELETING_BUTTON_ID	= 'COMPONENT_ATTR_ELEMENT_DELETING_BUTTON_ID';
	//...JS PHP AGREEMENTS

	//IDS...
	private const _ID_COMPONENT_ELEMENT_LOADING			= 'element_loading_id_';
	private const _ID_COMPONENT_ELEMENT_DELETING_BUTTON	= 'element_deleting_button_id_';
	//...IDS
	
	//CSS...
	private const _CSS_COMPONENT							= 'css_file_image_component';
	private const _CSS_COMPONENT_ELEMENT_LOADING			= 'css_element_loading';
	private const _CSS_COMPONENT_ELEMENT_LOADING_INDICATOR	= 'css_element_loading_indicator';
	private const _CSS_COMPONENT_DELETING_BUTTON			= 'css_deleting_button';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}

	/*override*/protected function __getJSComponent():string
	{
		return 'bsp.components_ns.images_ns.i_importJSCFileImageComponentViewClass()';
	}

	/*override*/protected function __getJSComponentAttrs():array
	{
		$lJSComponentAttrs_obj_arr	= [	self::i_JS_COMPONENT_ATTR_ELEMENT_LOADING_ID			=> $this->_getComponentElementloadingId(),
										self::i_JS_COMPONENT_ATTR_ELEMENT_DELETING_BUTTON_ID	=> $this->_getComponentElementDeletingButtonId()];

		return CArrayTools::i_merge(parent::__getJSComponentAttrs(), $lJSComponentAttrs_obj_arr);
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		$lComponentAlt_str = $this->__getComponentAlt();

		echo
		'<img class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '" src="' .$this->__getComponentFileName(). '" title="' .$lComponentAlt_str. '" alt="' .$lComponentAlt_str. '" width="' .$this->__getComponentWidth(). '" height="' .$this->__getComponentHeight(). '" border="0">'.
		'<span class="' .self::_CSS_COMPONENT_ELEMENT_LOADING. ' ' .self::_CSS_COMPONENT_ELEMENT_LOADING_INDICATOR. '" style="display:inline-block;" id="' .$this->_getComponentElementloadingId(). '"></span>'.
		'<div class="' .self::_CSS_COMPONENT_DELETING_BUTTON. '" id="' .$this->_getComponentElementDeletingButtonId(). '"></div>'.
		'<input type="hidden" name="' .$this->__getComponentElementId(). '" value="">';
	}
	//...HTMLS
	
	private function _getComponentElementloadingId():string
	{
		return self::_ID_COMPONENT_ELEMENT_LOADING . $this->__getComponentId();
	}

	private function _getComponentElementDeletingButtonId():string
	{
		return self::_ID_COMPONENT_ELEMENT_DELETING_BUTTON . $this->__getComponentId();
	}

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	//...PARAMS
}


?>