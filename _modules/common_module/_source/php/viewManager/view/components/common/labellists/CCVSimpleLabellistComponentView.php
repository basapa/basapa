<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CCVSimpleLabellistComponentView extends CCSimpleLabellistComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_v_simple_labellist_component';
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

	/*override*/ protected function __getJSComponent():string
	{
		return 'bsp.components_ns.labellists_ns.i_importJSCVSimpleLabellistComponentClass()';
	}
	//...JS
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	//...PARAMS
}


?>