<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMSectionView extends CCSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	public function i_draw()
	{
		$this->__draw();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __draw()
	{
		$lPageId_str = $this->__getMainData()->getURLParam(CMURLParamConst::GET_PARAM_ID_PAGE);
		switch ($lPageId_str)
		{
			case CCPageConst::PAGE_ID_MAIN:
			{
				$this->__getPagesSectionsView()->getMainPagesSectionsView()->getMainPageSectionView()->draw($this->__getSectionId());
			}break;

			/*case CPageConst::PAGE_ID_ERROR_404:
			case CPageConst::PAGE_ID_ERROR_403:
			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$this->__getViewData()->setLayout(CViewConst::LAYOUT_ID_NONE);
			}break;
*/
			/*case CPageConst::PAGE_ID_RECOVERY_PASSWORD:
			case CPageConst::PAGE_ID_AUTHORIZATION:
			case CPageConst::PAGE_ID_REGISTRATION:
			case CPageConst::PAGE_ID_RULES:
			case CPageConst::PAGE_ID_PROMOTION:
			case CPageConst::PAGE_ID_SUPPORT:
			case CPageConst::PAGE_ID_REQUIREMENTS:
			case CPageConst::PAGE_ID_SELECT_CITY:
			case CPageConst::PAGE_ID_SITEMAP:
			case CPageConst::PAGE_ID_DEBUG:
			case CPageConst::PAGE_ID_USER:
			case CPageConst::PAGE_ID_ADMIN:
		{
			$this->__getPagesSectionsView()->getMainPagesSectionsView()->getMainPageSectionView()->draw($this->__getSectionId());
		}break;*/

			default:
				new CException('__draw', 'Invalid main page id: ' .$lPageId_str);
			break;
		}
	}
}


?>