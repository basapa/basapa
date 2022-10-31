<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentsGroupRandomPreviewInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_JOB_CONTENT_TABLE_DATA	= 'job_content_table_data';
	//...PARAM IDS
	
	//IDS...
	private const _INFO_ID								= 'job_content_group_random_preview_info_id';
	private const _INFO_COMPONENT_ID_INFO_NAME			= self::_INFO_ID. '_01';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_contents_group_random_preview_info';
	//...CSS

	//CLASSES...
	private const _TEXT_COMPONENT_INFO_NAME_CLASSES				= 'css_text_component_info_name';
	private const _TEXT_COMPONENT_ELEMENT_INFO_NAME_CLASSES		= 'css_text_component_element_info_name';
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
	
	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		$lInfosTranslationData_clss = $this->__getXMLFileData()->i_getTranslationXMLFileData()->i_getInfosTranslationData();
		$lInfosTranslationData_clss = CJOBTranslationXMLInfosNode::i_toClassType($lInfosTranslationData_clss);
		$lInfoTranslationData_clss = $lInfosTranslationData_clss->i_getContentGroupRandomPreviewInfoTranslationData();

		//INFO NAME...
		$lInfoName_str = $lInfoTranslationData_clss->i_getInfoName();

		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ID					=> self::_INFO_COMPONENT_ID_INFO_NAME,
							CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $lInfoName_str,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES				=> self::_TEXT_COMPONENT_INFO_NAME_CLASSES,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES		=> self::_TEXT_COMPONENT_ELEMENT_INFO_NAME_CLASSES,
							//CCSimpleTextComponentView::i_PARAM_JS_COMPONENT_ID					=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							CCSimpleTextComponentView::i_PARAM_ID_OPT_JS_COMPONENT_INIT_FUNC		=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...INFO NAME
	}

	/*override*/protected function __drawBodyContent():void
	{
		//JOB CONTENT PREVIEW INFO...
		$lDatabaseData_clss = $this->__getDatabaseData();
		$lDatabaseData_clss = CJOBDatabaseData::i_toClassType($lDatabaseData_clss);

		if ($lDatabaseData_clss->i_getContentTableQueriesData()->i_areContentRandomDataDefined())
		{
			$lContentTableSelectData_clss_arr = $lDatabaseData_clss->i_getContentTableQueriesData()->i_getContentRandomData();
			$lContentPreviewInfoView_clss = new CJOBContentPreviewInfoView();

			foreach ($lContentTableSelectData_clss_arr as $lContentTableSelectData_clss)
			{
				$lContentPreviewInfoView_clss->i_draw([CJOBContentPreviewInfoView::i_PARAM_ID_JOB_CONTENT_TABLE_DATA => $lContentTableSelectData_clss]);
			}
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
	//...PARAMS
}


?>