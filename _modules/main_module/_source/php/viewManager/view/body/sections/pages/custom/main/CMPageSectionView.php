<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw($aSectionId_int)
	{
		switch ($aSectionId_int)
		{
			case CMViewConst::SECTION_ID_HEADER:
			{
				$this->__drawHeaderSection();
			}break;

			case CMViewConst::SECTION_ID_PRE_CONTENT:
			{
				$this->__drawPreContentSection();
			}break;

			case CMViewConst::SECTION_ID_LEFT:
			{
				$this->__drawLeftSection();
			}break;

			case CMViewConst::SECTION_ID_RIGHT:
			{
				$this->__drawRightSection();
			}break;

			case CMViewConst::SECTION_ID_CONTENT:
			{
				$this->__drawContentSection();
			}break;

			case CMViewConst::SECTION_ID_POST_CONTENT:
			{
				$this->__drawPostContentSection();
			}break;

			case CMViewConst::SECTION_ID_FOOTER:
			{
				$this->__drawFooterSection();
			}break;

			default:
				new CException('draw', 'Invalid main section id: '.  $aSectionId_int);
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*
	protected function __getDatabaseData()
	{
		return CDatabaseData::getInstance();
	}

	protected function __getViewData()
	{
		return CViewData::getInstance();
	}

	protected function __getUserData()
	{
		return CUserData::getInstance();
	}*/

	/*protected function __getComponentsView()
	{
		return CComponentsView::getInstance();
	}
	
	protected function __getModulesView()
	{
		return CModulesView::getInstance();
	}

	protected function __getFormsView()
	{
		return $this->__getModulesView()->getFormsView();
	}

	protected function __getInfosView()
	{
		return $this->__getModulesView()->getInfosView();
	}

	protected function __getBanners()
	{
		return $this->__getModulesView()->getBannersView();
	}*/

	protected function __drawHeaderSection()
	{
		$this->_drawHeaderLogoImage();
		$this->_drawHeaderLogoText();

		/*if ($this->__getUserData()->isLogged())
		{
			$this->__getModulesView()->getFormsView()->getLogoutFormView()->draw();
		}
		else
		{
			$this->__getModulesView()->getFormsView()->getLoginFormView()->draw();
		}*/
	}

	protected function __drawPreContentSection()
	{
		//$this->__getBanners()->draw(CBannerConst::TYPE_PRE_CONTENT);

		//$this->__getInfosView()->getNavigationsInfoView()->getPageNavigationInfoView()->draw();
	}

	protected function __drawLeftSection()
	{
		//$this->__modules()->navigations()->getCustomNavigations()->getJobNavigations()->getCategoryNavigation()->draw();

		//$this->__getBanners()->draw(CBannerConst::TYPE_LEFT_MIDDLE);
	}

	protected function __drawRightSection()
	{
		//$this->_modules()->forms()->searchForm()->draw();

		/*$lPanelsInfo_clss = $this->__getModules()->getInfos()->getPanelsInfo();
		$lCustomPanelsInfo_clss = $this->__getModules()->getInfos()->getCustomInfos()->getJobInfos()->getPanelsInfo();

		$lPanelsInfo_clss->getSelectCityPanelInfo()->draw();
		$lCustomPanelsInfo_clss->getAddContentPanelInfo()->draw();
		$lCustomPanelsInfo_clss->getReferenceBookPanelInfo()->draw();

		$lUserData_clss = $this->__getUserData();
		if ($lUserData_clss->isAdmin()
			|| $lUserData_clss->isModerator())
		{
			$lPanelsInfo_clss->getContentControlsAdminPanelInfo()->draw();
			$lCustomPanelsInfo_clss->getContentControlsAdminPanelInfo()->draw();
		}

		$this->__getBanners()->draw(CBannerConst::TYPE_RIGHT_TOP);

		$lParams_str_arr 	= array(CComponentParam::TEXT_TYPE 					=> CText::TYPE_LOW,
									CComponentParam::TEXT_NAME 					=> 'Наши партнеры: jooble.ru - Работа в Томске',
									CComponentParam::TEXT_HREF 					=> 'http:&frasl;&frasl;jooble.ru/main-vacancy-tomsk',
									CComponentParam::TEXT_NEW_PAGE 				=> true,
									CComponentParam::TEXT_STYLE_COMPONENT 		=> '');
		$this->__getComponents()->getText()->draw($lParams_str_arr);*/
	}

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

	protected function __drawPostContentSection()
	{
		//$this->__getInfosView()->getNavigationsInfoView()->getAdditionalPageNavigationInfoView()->draw();
	}

	protected function __drawFooterSection()
	{
		/*$lCopyRightText_str = ' - Бесплатные объявления по России и зарубежью.';
$lCityData_arr = $this->__getDatabaseData()->getCityData(CDatabaseData::TYPE_CITY_DATA_BY_ID);
$lRegionData_arr = $this->__getDatabaseData()->getRegionData(CDatabaseData::TYPE_REGION_DATA_BY_ID);
if ($lCityData_arr && $lRegionData_arr)
{
	$lCitySeo_str = $lCityData_arr[CDatabaseConst::TABLE_CITY_SEO];
	$lRegionSeo_str = $lRegionData_arr[CDatabaseConst::TABLE_REGION_SEO];

	$lCopyRightText_str = ' - Бесплатные объявления ' .$lCitySeo_str. ' и ' .$lRegionSeo_str. '.';
}

$lParams_str_arr 	= array(CSubdescriptionTextComponent::PARAM_VALUE 	=> CMainConst::SITE_COPY_RIGHT . SITE_NAME. $lCopyRightText_str,
							CSubdescriptionTextComponent::PARAM_STYLE 	=> 'text-align:center;');
$this->__getComponents()->getTextComponents()->getSubdescriptionTextComponent()->draw($lParams_str_arr);*/
	//}

	//private function _validateErrors()
	//{
		/*if ($this->__getMainData()->getErrorType() != CMainConst::ERROR_TYPE_NO_ERROR)
		{
			$lParams_str_arr 	= array(CInformationMessageInfoView::PARAM_NAME						=> CViewConst::ERROR_MESSAGE_404_NAME,
										CInformationMessageInfoView::PARAM_VALUE					=> $this->__getMainData()->getErrorMessage(),
										CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> true);
			$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_str_arr);

			return false;
		}*/

		//return true;
	}

	private function _drawHeaderLogoImage()
	{
		$lParams_obj_arr	= array(CCSimpleImageComponentView::PARAM_FILE_NAME		=> CFilesConst::ROOT_INTERNALS_IMAGES_RESOURCES_DIRECTORY_NAME . CFilesConst::IMAGE_LOGO_80x80_FILE_NAME,
									CCSimpleImageComponentView::PARAM_WIDTH			=> 80,
									CCSimpleImageComponentView::PARAM_HEIGHT		=> 80,
									CCSimpleImageComponentView::PARAM_STYLES		=> 'float:left; padding:0;');
		$this->__getComponentsView()->getImageComponentsView()->getSimpleImageComponentView()->draw($lParams_obj_arr);
	}

	private function _drawHeaderLogoText()
	{
		$lParams_obj_arr	= array(CCSubcaptionTextComponentView::PARAM_VALUE				=> 'rerer',//CMainConst::SITE_LOGO_TEXT. '<br>' .CMainConst::SITE_PATTERN_BRIEF,
									CCSubcaptionTextComponentView::PARAM_STYLES				=> 'float:left; padding:14px;',
									CCSubcaptionTextComponentView::PARAM_ELEMENT_STYLES		=> 'color:#eeeeee; font-weight:bold;');
		$this->__getComponentsView()->getTextComponentsView()->getSubcaptionTextComponentView()->draw($lParams_obj_arr);
	}
}


?>