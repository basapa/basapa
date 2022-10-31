<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMMainPageSectionView extends CMPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawContentSection()
	{
		/*$this->__banners()->draw(CBannerConst::TYPE_CONTENT_TOP);

		//heading description
		$lCityData_arr = $this->__databaseData()->cityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);

		$lParams_str_arr 	= array(CModuleParam::INFO_ID		=> CJOBFieldIdConst::INFO_JOB_HEADING_DESCRIPTION,
									CModuleParam::INFO_NAME 	=> 'Вакансии ' .$lCityData_arr[CDatabaseConst::TABLE_CITY_SEO],
									CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:0 2px; background-color:#fefef1;');
		$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

		$lParams_str_arr 	= array(CModuleParam::INFO_ID		=> CJOBFieldIdConst::INFO_JOB_HEADING_DESCRIPTION_2,
									CModuleParam::INFO_NAME 	=> 'Резюме ' .$lCityData_arr[CDatabaseConst::TABLE_CITY_SEO],
									CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:0 2px; background-color:#fefef1; display:none;');
		$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

		//search content
		$this->__forms()->customForms()->jobForms()->getSearchContentForm()->draw();

		//category navigation
		$lParams_str_arr = array(CModuleParam::INFO_ID => 'category_navigation');
		$this->__infos()->customInfos()->jobInfos()->getNavigationsInfo()->getCategoryNavigationInfo()->draw($lParams_str_arr);

		//vacancy content
		$lContentData_arr = $this->__databaseJobData()->vacancyData(CJOBDatabaseData::TYPE_VACANCY_DATA);
		if ($lContentData_arr)
		{
			//heading description
			$lParams_str_arr 	= array(CModuleParam::INFO_NAME 	=> 'Последние вакансии',
										CModuleParam::INFO_STYLE 	=> 'padding:0 2px; margin:2px; background-color:#fefef1;');
			$this->__infos()->customInfos()->jobInfos()->getHeadingDescriptionInfo()->draw($lParams_str_arr);

			$lParams_str_arr = array(CModuleParam::INFO_STYLE => 'width:382px; vertical-align:top; height:130px; display:inline-block;');
			$lCount_int = count($lContentData_arr);
			for ($i = 0; $i < $lCount_int; $i++)
			{
				$this->__infos()->customInfos()->jobInfos()->getContentsInfo()->getVipVacancyContentInfo()->draw($lContentData_arr[$i], $lParams_str_arr);
			}
		}

		//site description
		$lCityData_arr = $this->__databaseData()->cityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
		$lRegionData_arr = $this->__databaseData()->regionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);

		$lValue_str = str_replace(CViewConst::REPLACE_NAME, SITE_NAME, CViewConst::SITE_MAIN_MESSAGE_DESCRIPTION);
		$lValue_str = str_replace(CViewConst::REPLACE_CITY, $lCityData_arr[CDatabaseConst::TABLE_CITY_SEO], $lValue_str);
		$lValue_str = str_replace(CViewConst::REPLACE_REGION, $lRegionData_arr[CDatabaseConst::TABLE_REGION_SEO], $lValue_str);

		$lParams_str_arr 	= array(CModuleParam::MESSAGE_NAME 					=> CViewConst::SITE_MAIN_MESSAGE_NAME,
									CModuleParam::MESSAGE_VALUE 				=> $lValue_str,
									CModuleParam::MESSAGE_BUTTON_CLOSE_STATE 	=> CModuleParam::BUTTON_STATE_HIDDEN);
		$this->__modules()->messages()->informationMessage()->draw($lParams_str_arr);*/
	}
}


?>