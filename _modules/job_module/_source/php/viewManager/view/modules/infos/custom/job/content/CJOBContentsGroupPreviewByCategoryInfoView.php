<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentsGroupPreviewByCategoryInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_JOB_CONTENT_TABLE_DATA	= 'JOB_content_table_data';
	//...PARAM IDS
	
	//IDS...
	private const _INFO_ID								= 'JOB_contents_group_preview_by_category_info_id';
	private const _ID_INFO_COMPONENT_CATEGORY_NAME		= self::_INFO_ID. '_01';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_JOB_JOB_contents_group_preview_by_category_info';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_CATEGORY_NAME_CLASSES				= 'css_text_component_category_name';
	private const _TEXT_COMPONENT_ELEMENT_CATEGORY_NAME_CLASSES		= 'css_text_component_element_category_name';
	//...CLASSES


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

	/*override*/protected function __draw():void
	{
		$this->__drawBody();
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lContentTableSelectData_clss_arr = $this->_getContentTableData();

		$lInfosTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getInfosTranslationData();
		$lInfosTranslationData_clss = CJOBTranslationXMLInfosNode::i_toClassType($lInfosTranslationData_clss);
		$lInfoTranslationData_clss = $lInfosTranslationData_clss->i_getContentGroupPreviewByCategoryInfoTranslationData();

		//CATEGORY NAME...
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);
		$lContentCategoriesTableSelectData_clss_arr = $lDatabaseData_clss->i_getContentCategoriesTableQueriesData()->i_getSelectDataWithContentCount();

		$lContentTableSelectFirstData_clss = CContentTableData::i_toClassType($lContentTableSelectData_clss_arr[0]);
		$lTableFieldJOBCategoryId_int = $lContentTableSelectFirstData_clss->i_getTableFieldJOBCategoryId();

		$lCategoryNameTextTranslationData_clss = $lInfoTranslationData_clss->i_getCategoryNameTextTranslationData();

		$lContentCategoryName_str = '';
		$lContentCategoryURL_str = '';

		$lCount_int = CArrayTools::i_count($lContentCategoriesTableSelectData_clss_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lContentCategoriesTableSelectData_clss = $lContentCategoriesTableSelectData_clss_arr[$i];
			$lContentCategoriesTableSelectData_clss = CContentCategoriesTableData::i_toClassType($lContentCategoriesTableSelectData_clss);

			if ($lContentCategoriesTableSelectData_clss->i_getTableFieldId() === $lTableFieldJOBCategoryId_int)
			{
				$lContentCategoryName_str = $lCategoryNameTextTranslationData_clss->i_getValue();
				$lContentCategoryName_str = CStringTools::i_replace($lContentCategoryName_str, CStringTools::i_toLowerCase($lContentCategoriesTableSelectData_clss->i_getTableFieldCategoryName()), CStringTools::i_REPLACING_PATTERN_NAME);

				$lContentCategoryURL_str = $lContentCategoriesTableSelectData_clss->i_getTableFieldCategoryStringId();

				break;
			}
		}

		$lURLStaticParams_a_arr	= [	CJOBRequestParamConst::i_GET_PARAM_ID_SITE						=> CSiteConst::i_SITE_ID_JOB,
									CJOBRequestParamConst::i_GET_PARAM_ID_PAGE						=> CJOBPageConst::i_PAGE_ID_,
									CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID	=> $lContentCategoryURL_str];

		$lParams_a_arr	= [	CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID				=> self::_ID_INFO_COMPONENT_CATEGORY_NAME,
							CCLinkTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lContentCategoryName_str,
							CCLinkTextComponentView::i_PARAM_ID_COMPONENT_HREF					=> CURLTools::i_generateURLByParams($lURLStaticParams_a_arr),
							CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> self::_TEXT_COMPONENT_CATEGORY_NAME_CLASSES,
							CCLinkTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> self::_TEXT_COMPONENT_ELEMENT_CATEGORY_NAME_CLASSES,
							//CCLinkTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCLinkTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getLinkTextComponentView()->i_draw($lParams_a_arr);
		//...CATEGORY NAME

		//JOB CONTENT PREVIEW INFO...
		$lContentPreviewInfoView_clss = new CJOBContentPreviewInfoView();

		foreach ($lContentTableSelectData_clss_arr as $lContentTableSelectData_clss)
		{
			$lContentPreviewInfoView_clss->i_draw([CJOBContentPreviewInfoView::i_PARAM_ID_JOB_CONTENT_TABLE_DATA => $lContentTableSelectData_clss]);
		}
		//...JOB CONTENT PREVIEW INFO
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

	//JOB CONTENT TABLE DATA...
	private function _getContentTableData():array
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_JOB_CONTENT_TABLE_DATA);
	}
	//...JOB CONTENT TABLE DATA
	//...PARAMS
}


?>