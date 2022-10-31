<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCSimpleLabelfieldComponentView extends CCLabelfieldComponentView
{
	//CSS...
	private const _CSS_COMPONENT						= 'css_simple_labelfield_component';
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
		return 'bsp.components_ns.labelfields_ns.i_importJSCSimpleLabelfieldComponentViewClass()';
	}
	//...JS
	
	//HTMLS...
	/*override*/protected function __drawHTMLComponentElement():void
	{
		echo
		'<span class="' .$this->__getComponentElementClasses(). '" id="' .$this->__getComponentElementId(). '" style="' .$this->__getComponentElementStyles(). '">',
			$this->__getComponentValue();
		echo
		'</span>';
	}
	//...HTMLS
	
	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}
	//...PARAMS
	
	/*private function _getLabelfieldValue()
	{
		$lValue_str = $this->__getValue();
		$lHref_str = $this->__getHref();

		if ($lHref_str)
		{
			if ($this->__isProtectedValue())
			{
				$lValue_str = '<noscript>необходим JavaScript</noscript>
								<script type="text/javascript">
									document.write(\'<a href="' .$lHref_str. '" rel="nofollow">' .$this->__applyNoindex($lValue_str). '</a>\');
								</script>';
			}
			else
			{
				$lValue_str = '<a href="' .$lHref_str. '">' .$lValue_str. '</a>';
			}
		}

		return $lValue_str;
	}*/
}


?>