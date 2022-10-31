<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCSimpleListboxComponentView extends CCListboxComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_simple_listbox_component';
	//...CSS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*//*protected function __drawPreJS():void
	{
	}*/

	/*override*//*protected function __drawPostJS():void
	{
	}*/

	/*override*/ protected function __getJSComponent():string
	{
		return 'bsp.components_ns.listboxes_ns.i_importJSCSimpleListboxComponentViewClass()';
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