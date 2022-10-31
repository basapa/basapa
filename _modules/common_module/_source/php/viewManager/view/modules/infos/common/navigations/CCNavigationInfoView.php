<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCNavigationInfoView extends CCInfoView
{
	//CSS...
	private const _CSS_INFO								= 'css_navigation_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*virtual override*/protected function __isJSSupportAllowed():bool
	{
		return false;
	}

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

	/*virtual override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	protected function __generateMultipleItemParams(int $aItemIndex_int, string $aItemName_str, string $aItemHint_str, string $aItemValue_str, int $aItemState_int, array $aItemSubItemsParams_a_arr_arr, string $aOptClasses_str = ''):array
	{
		$lItemParams_a_arr	= [	CCLabellistComponentMultipleItem::i_PARAM_ID_OPT_ITEM_COMPONENT_ID	=> $this->__getInfoId(),
								CCLabellistComponentMultipleItem::i_PARAM_ID_OPT_ITEM_ID			=> CVariableTools::i_toString($aItemIndex_int),
								CCLabellistComponentMultipleItem::i_PARAM_ID_ITEM_NAME				=> $aItemName_str,
								CCLabellistComponentMultipleItem::i_PARAM_ID_OPT_ITEM_HINT			=> $aItemHint_str,
								CCLabellistComponentMultipleItem::i_PARAM_ID_ITEM_VALUE				=> $aItemValue_str,
								CCLabellistComponentMultipleItem::i_PARAM_ID_ITEM_STATE				=> $aItemState_int,
								CCLabellistComponentMultipleItem::i_PARAM_ID_SUB_ITEMS_PARAMS		=> $aItemSubItemsParams_a_arr_arr,
								CCLabellistComponentMultipleItem::i_PARAM_ID_OPT_ITEM_CLASSES		=> $aOptClasses_str];
		return $lItemParams_a_arr;
	}

	protected function __generateItemParams(int $aItemIndex_int, string $aItemName_str, string $aItemHint_str, string $aItemValue_str, int $aItemState_int, string $aOptClasses_str = ''):array
	{
		$lItemParams_a_arr	= [	CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_COMPONENT_ID	=> $this->__getInfoId(),
								CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_ID			=> CVariableTools::i_toString($aItemIndex_int),
								CCLabellistComponentItem::i_PARAM_ID_ITEM_NAME				=> $aItemName_str,
								CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_HINT			=> $aItemHint_str,
								CCLabellistComponentItem::i_PARAM_ID_ITEM_VALUE				=> $aItemValue_str,
								CCLabellistComponentItem::i_PARAM_ID_ITEM_STATE				=> $aItemState_int,
								CCLabellistComponentItem::i_PARAM_ID_OPT_ITEM_CLASSES		=> $aOptClasses_str];
		return $lItemParams_a_arr;
	}

	//PARAMS...
	/*virtual override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS

	//TRANSLATIONS...
	/**@return CCTranslationXMLNavigationInfoNode*/
	/*virtual override*/protected function __getTranslationXMLInfoNode():CCXMLNode
	{
		return CCTranslationXMLNavigationInfoNodeParser::i_parseNode($this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getTranslationXMLNavigationsInfoNativeNode()->i_getXMLChildNodeByNodeName($this->__getInfoNodeName()));
	}
	//...TRANSLATIONS
}


?>