<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCDialogView
{
	//JS PHP AGREEMENTS...
	public const i_JS_DIALOG_ATTR_ID					= 'DIALOG_ATTR_ID';
	public const i_JS_DIALOG_COMPONENT_ID_CLOSE_BUTTON	= 100;
	//...JS PHP AGREEMENTS
	
	//PARAM IDS...
	public const i_PARAM_ID_OPT_DIALOG_ID				= 'id';
	public const i_PARAM_ID_OPT_DIALOG_CLASSES			= 'classes';
	//...PARAM IDS
	
	//IDS...
	private const _DIALOG_ID							= 'dialog_id_';
	//...IDS
	
	//CSS...
	private const _CSS_DIALOG							= 'css_dialog';
	private const _CSS_DIALOG_HEADER					= 'css_header';
	private const _CSS_DIALOG_BODY						= 'css_body';
	private const _CSS_DIALOG_FOOTER					= 'css_footer';
	//...CSS
	
	static private $_fRandomIndex_int = 0;
	private $_fRandomId_str;

	private $_fParams_a_arr;


	public function __construct()
	{
		$this->__init();
	}

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw(array $aOptParams_a_arr = null):void
	{
		$this->_fParams_a_arr = $aOptParams_a_arr;

		if (!$this->__validateParams())
		{
			new CException('i_draw', 'Invalid params: ' .CArrayTools::i_toString($aOptParams_a_arr));
		}

		$lIsJSSupportAllowed_bl = $this->__isJSSupportAllowed();
		if ($lIsJSSupportAllowed_bl)
		{
			echo
			'<script type="text/javascript">';
				$this->__drawPreJS();
			echo
			'</script>';
		}

		echo
		'<div class="' .$this->__getDialogClasses(). '" id="' .$this->__getDialogId(). '">';
			$this->__draw();
		echo
		'</div>';

		if ($lIsJSSupportAllowed_bl)
		{
			echo
			'<script type="text/javascript">';
				$this->__drawPostJS();
			echo
			'</script>';
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init():void
	{
		$this->_fRandomId_str = $this->_generateDialogRandomId();
	}

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getComponentsView()
	{
		return CViewManager::i_getInstance()->i_getComponentsView();
	}

	protected function __getModulesView()
	{
		return CViewManager::i_getInstance()->i_getModulesView();
	}

	protected function __getViewsData()
	{
		return CViewManager::i_getInstance()->i_getViewsData();
	}

	/*virtual*/protected function __validateParams():bool
	{
		return true;
	}

	/*virtual*/protected function __draw()
	{
		$this->__drawHeader();
		$this->__drawBody();
		$this->__drawFooter();
	}

	//JS...
	/*virtual*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}
	
	/*virtual*/protected function __getDialogJSAttrs():array
	{
		return [CCDialogView::i_JS_DIALOG_ATTR_ID => $this->__getDialogId()];
	}

	abstract protected function __getJSDialog():string;

	protected function __getJSDialogComponentInitFunc():string
	{
		return $this->__getJSDialog(). '.jsInitDialogModule';
	}

	abstract protected function __drawPreJS():void;

	abstract protected function __drawPostJS():void;
	//...JS
	
	protected function __drawHeader():void
	{
		echo
		'<div class="' .self::_CSS_DIALOG_HEADER. '">';
			$this->__drawHeaderContent();
		echo
		'</div>';
	}

	protected function __drawBody():void
	{
		echo
		'<div class="' .self::_CSS_DIALOG_BODY. '">';
			$this->__drawBodyContent();
		echo
		'</div>';
	}

	protected function __drawFooter():void
	{
		echo
		'<div class="' .self::_CSS_DIALOG_FOOTER. '">';
			$this->__drawFooterContent();
		echo
		'</div>';
	}

	/*virtual*/protected function __drawHeaderContent():void
	{
	}

	/*virtual*/protected function __drawBodyContent():void
	{
	}

	/*virtual*/protected function __drawFooterContent():void
	{
	}

	protected function __isParamValueDefined(string $aParamId_str):bool
	{
		return isset($this->_fParams_a_arr[$aParamId_str]);
	}

	protected function __getParamValue(string $aParamId_str, bool $aOptThrowIfNotExist_bl = true, $aOptParamValueIfNotExist_var = null)
	{
		if (!$this->__isParamValueDefined($aParamId_str))
		{
			if ($aOptThrowIfNotExist_bl)
			{
				new CException('__getParamValue', 'Param not exist: ' .$aParamId_str);
			}
			return $aOptParamValueIfNotExist_var;
		}
		return $this->_fParams_a_arr[$aParamId_str];
	}

	//PARAMS...
	/*virtual*/protected function __getDialogId():string
	{
		//TODO: optimization required
		return CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_DIALOG_ID, false, $this->_fRandomId_str));
	}

	/*virtual*/protected function __getDialogClasses():string
	{
		//TODO: optimization required
		return self::_CSS_DIALOG. ' ' .CVariableTools::i_toString($this->__getParamValue(self::i_PARAM_ID_OPT_DIALOG_CLASSES, false, ''));
	}
	//...PARAMS

	private function _generateDialogRandomId():string
	{
		return self::_DIALOG_ID . self::$_fRandomIndex_int++;
	}
}


?>