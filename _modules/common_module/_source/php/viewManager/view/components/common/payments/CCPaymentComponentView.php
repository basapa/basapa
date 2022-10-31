<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


abstract class CCPaymentComponentView
{
	//PARAM IDS...
	public const i_PARAM_ID_COMPONENT_LOGIN					= 'login';
	public const i_PARAM_ID_COMPONENT_PASSWORD				= 'password';
	public const i_PARAM_ID_COMPONENT_ORDER_ID				= 'order_id';
	public const i_PARAM_ID_COMPONENT_ORDER_PRICE			= 'order_price';
	public const i_PARAM_ID_COMPONENT_ORDER_DESCRIPTION		= 'order_description';
	//...PARAM IDS

	private $_fParams_a_arr;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw(array $aParams_a_arr)
	{
		$this->_fParams_a_arr = $aParams_a_arr;

		if (!$this->__validateParams())
		{
			new CException('i_draw', 'Invalid params: ' .CArrayTools::i_toString($aParams_a_arr));
		}

		$this->__draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
	
	/*virtual*/protected function __validateParams():bool
	{
		return $this->__isComponentLoginDefined()
				&& $this->__isComponentPasswordDefined()
				&& $this->__isComponentOrderIdDefined()
				&& $this->__isComponentOrderPriceDefined()
				&& $this->__isComponentOrderDescriptionDefined();
	}

	abstract protected function __draw():void;

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
	//LOGIN...
	private function _getComponentLoginVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_LOGIN, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentLoginDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentLoginVar(false));
	}

	protected function __getComponentLogin():string
	{
		return CVariableTools::i_toString($this->_getComponentLoginVar());
	}
	//...LOGIN

	//PASSWORD...
	private function _getComponentPasswordVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_PASSWORD, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentPasswordDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentPasswordVar(false));
	}

	protected function __getComponentPassword():string
	{
		return CVariableTools::i_toString($this->_getComponentPasswordVar());
	}
	//...PASSWORD

	//ORDER ID...
	private function _getComponentOrderIdVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_ORDER_ID, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentOrderIdDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentOrderIdVar(false));
	}

	protected function __getComponentOrderId():string
	{
		return CVariableTools::i_toString($this->_getComponentOrderIdVar());
	}
	//...ORDER ID

	//ORDER PRICE...
	private function _getComponentOrderPriceVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_ORDER_PRICE, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentOrderPriceDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentOrderPriceVar(false));
	}

	protected function __getComponentOrderPrice():string
	{
		return CVariableTools::i_toString($this->_getComponentOrderPriceVar());
	}
	//...ORDER PRICE

	//ORDER DESCRIPTION...
	private function _getComponentOrderDescriptionVar(bool $aOptThrowIfNotExist_bl = true)
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_COMPONENT_ORDER_DESCRIPTION, $aOptThrowIfNotExist_bl);
	}

	protected function __isComponentOrderDescriptionDefined():bool
	{
		return CVariableTools::i_isString($this->_getComponentOrderPriceVar(false));
	}

	protected function __getComponentOrderDescription():string
	{
		return CVariableTools::i_toString($this->_getComponentOrderPriceVar());
	}
	//...ORDER DESCRIPTION
	//...PARAMS
}


?>