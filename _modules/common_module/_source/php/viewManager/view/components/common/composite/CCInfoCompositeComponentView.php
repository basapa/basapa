<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


abstract class CCInfoCompositeComponentView extends CCCompositeComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_OPT_COMPOSITE_COMPONENT_NAME	= 'name';
	//...PARAM IDS

	//FILLING MODES...
	//...FILLING MODES

	//CSS...
	private const _CSS_COMPONENT						= 'css_info_composite_component';
	private const _CSS_COMPOSITE_COMPONENT_NAME			= 'css_name';
	//...CSS


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//HTMLS...
	/*virtual override*/protected function __drawHTMLCompositeComponentNameIfRequired():void
	{
		if ($this->__isCompositeComponentNameDefined())
		{
			$l_str = $this->__getCompositeComponentName();
			if (!empty($l_str))
			{
				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPOSITE_COMPONENT_NAME);
			}
		}
	}
	//...HTMLS

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	//NAME...
	private function _getCompositeComponentNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPOSITE_COMPONENT_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isCompositeComponentNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getCompositeComponentNameVar(false));
	}

	protected function __getCompositeComponentName():string
	{
		return CVariableTools::i_toString($this->_getCompositeComponentNameVar());
	}
	//...NAME
	//...PARAMS
}


?>