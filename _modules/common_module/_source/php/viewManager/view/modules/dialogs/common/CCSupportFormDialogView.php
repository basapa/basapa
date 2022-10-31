<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCSupportFormDialogView extends CCDialogView
{
	//JS PHP AGREEMENTS...
	public const i_JS_DIALOG_MODULE_ID_SUPPORT_FORM		= 0;
	//...JS PHP AGREEMENTS

	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __drawPreJS():void
	{
		/*echo
		'var lJSDialog_clss = ' .$this->__getJSDialog(). ';';*/
	}

	/*override*/protected function __drawPostJS():void
	{
		/*echo
		'var lJSDialog_clss = ' .$this->__getJSDialog(). ';
		lJSDialog_clss.jsInitDOMDialog();';*/
	}

	/*override*/protected function __getJSDialog():string
	{
		/*$lMainData_clss = $this->__getMainData();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();

		return 'bsp.JSMain.jsGetSite(\'' .$lSiteId_str. '\').jsGetPages().jsGetPage(\'' .$lPageId_str. '\').jsGetModules().jsGetDialogs().jsGetSupportFormDialog()';*/

		return '';
	}
	//...JS
	
	/*override*/protected function __drawHeaderContent():void
	{
		//must be empty
	}

	/*override*/protected function __drawBodyContent():void
	{
		/*$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		$lParams_obj_arr	= [	CCFormView::i_PARAM_CLASSES				=> 'css_inline_show',
								CCFormView::i_PARAM_JS_FORM_ID			=> self::i_JS_DIALOG_MODULE_ID_SUPPORT_FORM,
								CCFormView::i_PARAM_JS_FORM_INIT_FUNC		=> $this->__getJSDialogComponentInitFunc()];
		$this->__getModulesView()->i_getFormsView()->i_getFormsView($lSiteId_str)->i_getSupportFormView()->i_draw($lParams_obj_arr);*/
	}

	/*override*/protected function __drawFooterContent():void
	{
		//must be empty
	}
}


?>
