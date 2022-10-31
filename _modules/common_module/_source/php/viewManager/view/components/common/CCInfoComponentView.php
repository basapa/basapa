<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


abstract class CCInfoComponentView extends CCComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_OPT_COMPONENT_NAME			= 'name';
	public const i_PARAM_ID_OPT_COMPONENT_PRE_NAME		= 'pre_name';
	public const i_PARAM_ID_OPT_COMPONENT_POST_NAME		= 'post_name';
	//...PARAM IDS
	
	//CSS...
	private const _CSS_COMPONENT						= 'css_info_component';
	private const _CSS_COMPONENT_NAME					= 'css_name';
	private const _CSS_COMPONENT_PRE_NAME				= 'css_pre_name';
	private const _CSS_COMPONENT_POST_NAME				= 'css_post_name';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//HTMLS...
	/*virtual*/protected function __drawHTMLComponentNameIfRequired(string $aOptPreString_str = '', string $aOptPostString_str = ''):void
	{
		if ($this->__isComponentNameDefined())
		{
			$l_str = $this->__getComponentName();
			if (!empty($l_str))
			{
				$l_str = $aOptPreString_str . $l_str . $aOptPostString_str;

				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_NAME);
			}
		}
	}
	
	protected function __drawHTMLComponentPreNameIfRequired():void
	{
		if ($this->__isComponentPreNameDefined())
		{
			$l_str = $this->__getComponentPreName();
			if (!empty($l_str))
			{
				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_PRE_NAME);
			}
		}
	}

	protected function __drawHTMLComponentPostNameIfRequired():void
	{
		if ($this->__isComponentPostNameDefined())
		{
			$l_str = $this->__getComponentPostName();
			if (!empty($l_str))
			{
				echo
				$this->__applyHTMLParamValueWrap($l_str, self::_CSS_COMPONENT_POST_NAME);
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
	private function _getComponentNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentNameVar(false));
	}
	
	protected function __getComponentName():string
	{
		return CVariableTools::i_toString($this->_getComponentNameVar());
	}
	//...NAME
	
	//PRE NAME...
	private function _getComponentPreNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_PRE_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentPreNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentPreNameVar(false));
	}
	
	protected function __getComponentPreName():string
	{
		return CVariableTools::i_toString($this->_getComponentPreNameVar());
	}
	//...PRE NAME
	
	//POST NAME...
	private function _getComponentPostNameVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_OPT_COMPONENT_POST_NAME, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentPostNameDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentPostNameVar(false));
	}
	
	protected function __getComponentPostName():string
	{
		return CVariableTools::i_toString($this->_getComponentPostNameVar());
	}
	//...POST NAME
	//...PARAMS
}


?>