<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBContentsPreviewsInfoView extends CCInfoView
{
	//JS PHP AGREEMENTS...
	//...JS PHP AGREEMENTS

	//PARAM IDS...
	public const i_PARAM_ID_JOB_CONTENT_TABLE_DATA		= 'job_vacancy_content_table_data';
	//...PARAM IDS

	//IDS...
	private const _INFO_ID								= 'job_vacancy_contents_previews_info_id';
	//...IDS

	//CSS...
	private const _CSS_INFO								= 'css_job_vacancy_contents_previews_info';
	//...CSS

	//CLASSES...
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
		$lContentTableSelectData_clss_arr = $this->_getContentTableData();

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