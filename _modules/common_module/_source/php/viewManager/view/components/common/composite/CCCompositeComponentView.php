<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCCompositeComponentView extends CCComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPOSITE_COMPONENTS_PARAMS				= 'components_params';
	public const i_PARAM_ID_OPT_COMPOSITE_COMPONENT_FILLING_MODE	= 'filling_mode';
	//...PARAM IDS

	//FILLING MODES...
	public const i_FILLING_MODE_ID_NON_MANDATORY		= 0;
	public const i_FILLING_MODE_ID_MANDATORY			= 1;
	//...FILLING MODES

	//CSS...
	private const _CSS_COMPONENT						= 'css_composite_component';
	//...CSS

	protected const __MANDATORY_FIELD_MARKER			= '<span class="css_mandatory_field">* </span>';

	private $_fComponentsView_clss;


	public function __construct(CCComponentsView $aComponentsView_clss)
	{
		parent::__construct();

		$this->_fComponentsView_clss = $aComponentsView_clss;
	}

	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __validateParams():bool
	{
		return parent::__validateParams()
			&& $this->__isCompositeComponentParamsDefined();
	}

	/*override*/protected function __draw():void
	{
		$this->__drawHTMLComponentCaptionIfRequired();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentElement();
		echo
		'</div>';
		$this->__drawHTMLComponentHintIfRequired();
		echo
		'<div class="' .self::__CSS_CONTAINER. '">';
			$this->__drawHTMLComponentDescriptionIfRequired();
		echo
		'</div>';
	}

	//JS...
	/*override*/protected function __drawPreJS():void
	{
		echo
		'var JSCCompositeComponentView = ' .$this->__getJSComponent(). ';
		var lCompositeComponentView_clss = new JSCCompositeComponentView();';

	}

	/*override*/protected function __drawPostJS():void
	{
		echo
		'lCompositeComponentView_clss.i_setComponentAttrs(\'' .CJSTools::i_convertAssociativeArrayToJSObject($this->__getJSComponentAttrs()). '\');
		lCompositeComponentView_clss.i_initDOMComponent();'.
		$this->__getJSComponentInitFunc(). '(\'' .$this->__getJSComponentId(). '\', lCompositeComponentView_clss);';
	}

	/*override*/protected function __getJSCompositeComponentInitFunc()
	{
		return 'lCompositeComponentView_clss.i_initCompositeComponent';
	}
	//...JS

	protected function __getComponentsView():CCComponentsView
	{
		return $this->_fComponentsView_clss;
	}

	//PARAMS...
	/*override*/protected function __getComponentClasses():string
	{
		return self::_CSS_COMPONENT. ' ' .parent::__getComponentClasses();
	}

	protected function __getCompositeComponentFillingMode():int
	{
		//TODO: optimization required
		return CVariableTools::i_toInt($this->__getParamValue(self::i_PARAM_ID_OPT_COMPOSITE_COMPONENT_FILLING_MODE, false, self::i_FILLING_MODE_ID_NON_MANDATORY));
	}

	//COMPONENTS PARAMS...
	private function _getCompositeComponentParamsVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPOSITE_COMPONENTS_PARAMS, $aOptThrowIfNotExist_bl);
	}

	protected function __isCompositeComponentParamsDefined():bool
	{
		return CVariableTools::i_isArray($this->_getCompositeComponentParamsVar(false));
	}

	protected function __getCompositeComponentParams():array
	{
		return $this->_getCompositeComponentParamsVar();
	}
	//...COMPONENTS PARAMS
	//...PARAMS
}


?>