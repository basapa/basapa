<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCSortingInfoView extends CCInfoView
{
	//CSS...
	private const _CSS_INFO								= 'css_sorting_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*virtual override*/protected function __getJSInfoImport():string
	{
		return '';
	}

	/*virtual override*/protected function __getJSInfo():string
	{
		return '';
	}

	/*virtual override*/protected function __drawPreJS():void
	{
	}

	/*virtual override*/protected function __drawPostJS():void
	{
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	protected function __generateItemParams(int $aItemIndex_int, string $aItemName_str, string $aItemValue_str, int $aItemState_int):array
	{
		$lItemParams_a_arr	= [	CCLabellistComponentItem::i_PARAM_ID_ITEM_COMPONENT_ID		=> $this->__getInfoId(),
								CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> CVariableTools::i_toString($aItemIndex_int),
								CCLabellistComponentItem::i_PARAM_ID_ITEM_NAME				=> $aItemName_str,
								CCLabellistComponentItem::i_PARAM_ID_ITEM_VALUE				=> $aItemValue_str,
								CCLabellistComponentItem::i_PARAM_ID_ITEM_STATE				=> $aItemState_int,
								CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_CLASSES		=> 'css_rounded_low'];
		return $lItemParams_a_arr;
	}

	//PARAMS...
	/*virtual override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>