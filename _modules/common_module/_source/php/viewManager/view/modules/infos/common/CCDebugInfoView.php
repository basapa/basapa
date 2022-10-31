<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CCDebugInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//IDS...
	private const _INFO_ID								= 'debug_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_debug_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//JS...
	/*override*/protected function __getJSInfoImport():string
	{
		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}
	//...JS

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();

		//TEXTS...
		/*$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lParams_obj_arr	= [	CCTitleTextComponentView::i_PARAM_VALUE						=> 'Title Text Component'];
		$lTextComponentsView_clss->i_getTitleTextComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCCaptionTextComponentView::i_PARAM_VALUE						=> 'Caption Text Component'];
		$lTextComponentsView_clss->i_getCaptionTextComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCSubcaptionTextComponentView::i_PARAM_VALUE					=> 'Subcaption Text Component'];
		$lTextComponentsView_clss->i_getSubcaptionTextComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCSimpleTextComponentView::i_PARAM_VALUE						=> 'Simple Text Component'];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_obj_arr);
		//...TEXTS*/

		//BUTTONS...
		/*$lButtonComponentsView_clss = $lComponentsView_clss->i_getButtonComponentsView();

		$lParams_obj_arr	= [	CCLinkButtonComponentView::i_PARAM_NAME						=> 'Link Button Component',
								CCLinkButtonComponentView::i_PARAM_HREF						=> 'Href'];
		$lButtonComponentsView_clss->i_getLinkButtonComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCSubmitButtonComponentView::i_PARAM_NAME						=> 'Submit Button Component',
								CCSubmitButtonComponentView::i_PARAM_REQUEST_ID				=> 'RequestId'];
		$lButtonComponentsView_clss->getSubmitButtonComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCFileButtonComponentView::i_PARAM_NAME						=> 'File Button Component'];
		$lButtonComponentsView_clss->i_getFileButtonComponentView()->i_draw($lParams_obj_arr);
		//...BUTTONS

		//CHECKBOXES...
		$lCheckboxComponentsView_clss = $lComponentsView_clss->getCheckboxComponentsView();

		$lParams_obj_arr	= [	CCSimpleCheckboxComponentView::i_PARAM_VALUE					=> CCSimpleCheckboxComponentView::i_NON_CHECKED_VALUE];
		$lCheckboxComponentsView_clss->i_getSimpleCheckboxComponentView()->i_draw($lParams_obj_arr);
		//...CHECKBOXES*/

		//LABELFIELDS...
		/*$lLabelfieldComponentsView_clss = $lComponentsView_clss->i_getLabelfieldComponentsView();

		$lParams_obj_arr	= [	CCSimpleLabelfieldComponentView::i_PARAM_NAME					=> 'Simple Labelfield Component',
								CCSimpleLabelfieldComponentView::i_PARAM_VALUE				=> 'Value'];
		$lLabelfieldComponentsView_clss->i_getSimpleLabelfieldComponentView()->i_draw($lParams_obj_arr);
		//...LABELFIELDS*/

		//LISTBOXES...
		/*$lListboxComponentsView_clss = $lComponentsView_clss->i_getListboxComponentsView();

		$lItemsParams_obj_arr	= [[CCListboxComponentItem::i_PARAM_COMPONENT_ID				=> 'Simple Listbox Component Id',
									CCListboxComponentItem::i_PARAM_ID						=> 0,
									CCListboxComponentItem::i_PARAM_NAME						=> 'Listbox Component Item',
									CCListboxComponentItem::i_PARAM_VALUE						=> 'Value']];

		$lParams_obj_arr	= [	CCSimpleListboxComponentView::i_PARAM_ID						=> 'Simple Listbox Component Id',
								CCSimpleListboxComponentView::i_PARAM_NAME					=> 'Simple Listbox Component',
								CCSimpleListboxComponentView::i_PARAM_ITEMS_PARAMS			=> $lItemsParams_obj_arr];
		$lListboxComponentsView_clss->i_getSimpleListboxComponentView()->i_draw($lParams_obj_arr);
		//...LISTBOXES*/

		//RADIOBUTTONS...
		/*$lRadiobuttonComponentsView_clss = $lComponentsView_clss->i_getRadiobuttonComponentsView();

		$lItemsParams_obj_arr	= [[CCRadiobuttonComponentItem::i_PARAM_COMPONENT_ID				=> 'Simple Radiobutton Component Id',
									CCRadiobuttonComponentItem::i_PARAM_ID						=> '1',
									CCRadiobuttonComponentItem::i_PARAM_NAME						=> 'Radiobutton Component Item',
									CCRadiobuttonComponentItem::i_PARAM_VALUE						=> 'Value']];

		$lParams_obj_arr	= [	CCSimpleRadiobuttonComponentView::i_PARAM_ID						=> 'Simple Radiobutton Component Id',
								CCSimpleRadiobuttonComponentView::i_PARAM_NAME					=> 'Simple Radiobutton Component',
								CCSimpleRadiobuttonComponentView::i_PARAM_VALUE					=> 'Value',
								CCSimpleRadiobuttonComponentView::i_PARAM_ITEMS_PARAMS			=> $lItemsParams_obj_arr];
		$lRadiobuttonComponentsView_clss->i_getSimpleRadiobuttonComponentView()->i_draw($lParams_obj_arr);
		//...RADIOBUTTONS*/

		//TEXTFIELDS...
		/*$lTextfieldComponentsView_clss = $lComponentsView_clss->i_getTextfieldComponentsView();

		$lParams_obj_arr	= [	CCSimpleTextfieldComponentView::i_PARAM_ID						=> 'Simple Textfield Component Id',
								CCSimpleTextfieldComponentView::i_PARAM_NAME						=> 'Simple Textfield Component',
								CCSimpleTextfieldComponentView::i_PARAM_VALUE						=> 'Value',
								CCSimpleTextfieldComponentView::i_PARAM_MAX_CHARS_COUNT			=> 1];
		$lTextfieldComponentsView_clss->i_getSimpleTextfieldComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCSecureTextfieldComponentView::i_PARAM_ID						=> 'Secure Textfield Component Id',
								CCSecureTextfieldComponentView::i_PARAM_NAME						=> 'Secure Textfield Component',
								CCSecureTextfieldComponentView::i_PARAM_VALUE						=> 'Value',
								CCSecureTextfieldComponentView::i_PARAM_MAX_CHARS_COUNT			=> 1];
		$lTextfieldComponentsView_clss->i_getSecureTextfieldComponentView()->i_draw($lParams_obj_arr);
*/
		/*$lParams_obj_arr	= [	CCHiddenTextfieldComponentView::PARAM_ID						=> 'Hidden Textfield Component Id',
								CCHiddenTextfieldComponentView::PARAM_NAME						=> 'Hidden Textfield Component',
								CCHiddenTextfieldComponentView::PARAM_VALUE						=> 'Value',
								CCHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT			=> 1];
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);*/
		//...TEXTFIELDS

		//TEXTAREAS...
		/*$lTextareaComponentsView_clss = $lComponentsView_clss->i_getTextareaComponentsView();

		$lParams_obj_arr	= [	CCSimpleTextareaComponentView::i_PARAM_ID							=> 'Simple Textarea Component Id',
								CCSimpleTextareaComponentView::i_PARAM_NAME						=> 'Simple Textarea Component',
								CCSimpleTextareaComponentView::i_PARAM_VALUE						=> 'Value',
								CCSimpleTextareaComponentView::i_PARAM_MAX_CHARS_COUNT			=> 1];
		$lTextareaComponentsView_clss->i_getSimpleTextareaComponentView()->i_draw($lParams_obj_arr);
		//...TEXTAREAS*/

		//LABELLISTS...
		/*$lLabellistComponentsView_clss = $lComponentsView_clss->i_getLabellistComponentsView();

		$lItemsParams_obj_arr	= [[CCLabellistComponentItem::i_PARAM_COMPONENT_ID				=> 'Simple Labellist Component Id',
									CCLabellistComponentItem::i_PARAM_ID							=> '1',
									CCLabellistComponentItem::i_PARAM_VALUE						=> 'Value',
									CCLabellistComponentItem::i_PARAM_HREF						=> 'Href']];

		$lParams_obj_arr	= [	CCSimpleLabellistComponentView::i_PARAM_ID						=> 'Simple Labellist Component Id',
								CCSimpleLabellistComponentView::i_PARAM_VALUE						=> 'Value',
								CCSimpleLabellistComponentView::i_PARAM_ITEMS_PARAMS				=> $lItemsParams_obj_arr];
		$lLabellistComponentsView_clss->i_getSimpleLabellistComponentView()->i_draw($lParams_obj_arr);

		$lItemsParams_obj_arr	= [[CCLabellistComponentItem::i_PARAM_COMPONENT_ID				=> 'Tab Labellist Component Id',
									CCLabellistComponentItem::i_PARAM_ID							=> '1',
									CCLabellistComponentItem::i_PARAM_VALUE						=> 'Value',
									CCLabellistComponentItem::i_PARAM_HREF						=> 'Href']];

		$lParams_obj_arr	= [	CCTabLabellistComponentView::i_PARAM_ID							=> 'Tab Labellist Component Id',
								CCTabLabellistComponentView::i_PARAM_VALUE						=> 'Value',
								CCTabLabellistComponentView::i_PARAM_ITEMS_PARAMS					=> $lItemsParams_obj_arr];
		$lLabellistComponentsView_clss->i_getTabLabellistComponentView()->i_draw($lParams_obj_arr);
		//...LABELLISTS*/

		//IMAGES...
		/*$lImageComponentsView_clss = $lComponentsView_clss->i_getImageComponentsView();

		$lParams_obj_arr	= [	CCSimpleImageComponentView::i_PARAM_ID							=> 'Simple Image Component Id',
								CCSimpleImageComponentView::i_PARAM_FILE_NAME						=> CURLTools::i_applyFullSiteName(CCFileConst::i_INTERNALS_IMAGES_DIRECTORY_NAME . CCFileConst::i_IMAGE_LOGO_80x80_FILE_NAME),
								CCSimpleImageComponentView::i_PARAM_WIDTH							=> 80,
								CCSimpleImageComponentView::i_PARAM_HEIGHT						=> 80];
		$lImageComponentsView_clss->i_getSimpleImageComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCLinkImageComponentView::i_PARAM_ID								=> 'Link Image Component Id',
								CCLinkImageComponentView::i_PARAM_FILE_NAME						=> CURLTools::i_applyFullSiteName(CCFileConst::i_INTERNALS_IMAGES_DIRECTORY_NAME . CCFileConst::i_IMAGE_LOGO_80x80_FILE_NAME),
								CCLinkImageComponentView::i_PARAM_WIDTH							=> 80,
								CCLinkImageComponentView::i_PARAM_HEIGHT							=> 80,
								CCLinkImageComponentView::i_PARAM_HREF							=> 'Href'];
		$lImageComponentsView_clss->i_getLinkImageComponentView()->i_draw($lParams_obj_arr);

		$lParams_obj_arr	= [	CCFileImageComponentView::i_PARAM_ID								=> 'Link Image Component Id',
								CCFileImageComponentView::i_PARAM_FILE_NAME						=> CURLTools::i_applyFullSiteName(CCFileConst::i_INTERNALS_IMAGES_DIRECTORY_NAME . CCFileConst::i_IMAGE_LOGO_80x80_FILE_NAME),
								CCFileImageComponentView::i_PARAM_WIDTH							=> 80,
								CCFileImageComponentView::i_PARAM_HEIGHT							=> 80];
		$lImageComponentsView_clss->i_getFileImageComponentView()->i_draw($lParams_obj_arr);
		//...IMAGES*/
	}

	//PARAMS...
	/*override*/protected function __getInfoId():string
	{
		return self::_INFO_ID;
	}

	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	//...PARAMS
}


?>