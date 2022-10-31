<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCPageSectionView
{
	/*public function __construct()
	{
		$this->__init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw(int $aSectionId_int):void
	{
		switch ($aSectionId_int)
		{
			case CCViewConst::i_SECTION_ID_HEADER:
			{
				$this->__drawHeaderSection();
			}break;

			case CCViewConst::i_SECTION_ID_PRE_CONTENT:
			{
				$this->__drawPreContentSection();
			}break;

			case CCViewConst::i_SECTION_ID_LEFT:
			{
				$this->__drawLeftSection();
			}break;

			case CCViewConst::i_SECTION_ID_RIGHT:
			{
				$this->__drawRightSection();
			}break;

			case CCViewConst::i_SECTION_ID_CONTENT:
			{
				$this->__getModulesView()->i_getFormsMessagesView()->i_draw();

				$this->__drawContentSection();
			}break;

			case CCViewConst::i_SECTION_ID_POST_CONTENT:
			{
				$this->__drawPostContentSection();
			}break;

			case CCViewConst::i_SECTION_ID_FOOTER:
			{
				$this->__drawFooterSection();
			}break;

			default:
				new CException('draw', 'Unsupported section id: '.  $aSectionId_int);
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getDatabaseData()
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

		return CDatabaseManager::i_getInstance()->i_getDatabasesData()->i_getDatabaseData($lSiteId_str);
	}

	protected function __getModulesView()
	{
		return CViewManager::i_getInstance()->i_getModulesView();
	}

	protected function __getFormsView()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();
		return $this->__getModulesView()->i_getFormsView()->i_getFormsView($lSiteId_str);
	}

	protected function __getInfosView()
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();
		return $this->__getModulesView()->i_getInfosView()->i_getInfosView($lSiteId_str);
	}

	/*virtual*/protected function __drawHeaderSection():void
	{
		$this->__getInfosView()->i_getSiteCaptionInfoView()->i_draw();

		/*if ($this->__getUserData()->isLogged())
		{
			$this->__getModulesView()->getFormsView()->getLogoutFormView()->draw();
		}
		else
		{
			$this->__getModulesView()->getFormsView()->getLoginFormView()->draw();
		}*/
	}

	/*virtual*/protected function __drawPreContentSection():void
	{
		//$this->__getBanners()->draw(CBannerConst::TYPE_PRE_CONTENT);
	}

	/*virtual*/protected function __drawLeftSection():void
	{
		//$this->__getBanners()->draw(CBannerConst::TYPE_LEFT_MIDDLE);
	}

	/*virtual*/protected function __drawRightSection():void
	{
		//$this->__getModulesView()->getInfosView()->getAvatarInfosView()->getAvatarImageInfoView()->draw();
	}

	/*virtual*/protected function __drawContentSection():void
	{
		//$this->__banners()->draw(CBannerConst::TYPE_CONTENT_TOP);
	}

	/*virtual*/protected function __drawPostContentSection():void
	{
		//$this->__getModulesView()->getInfosView()->getNavigationsInfoView()->getAdditionalPageNavigationInfoView()->draw();
	}

	/*virtual*/protected function __drawFooterSection():void
	{
		$this->__getInfosView()->i_getSiteCopyrightInfoView()->i_draw();
	}

	//private function _validateErrors()
	//{
	/*if ($this->__getAvatarData()->getErrorType() != CAvatarConst::ERROR_TYPE_NO_ERROR)
	{
		$lParams_str_arr 	= array(CInformationMessageInfoView::PARAM_NAME						=> CViewConst::ERROR_MESSAGE_404_NAME,
									CInformationMessageInfoView::PARAM_VALUE					=> $this->__getAvatarData()->getErrorMessage(),
									CInformationMessageInfoView::PARAM_IS_CLOSE_BUTTON_ALLOWED	=> true);
		$this->__getModulesView()->getInfosView()->getMessagesInfoView()->getInformationMessageInfoView()->draw($lParams_str_arr);

		return false;
	}*/

	//return true;
	//}
}


?>