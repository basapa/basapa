<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CJOBInfosView extends CCInfosView
{
	//IDS...
	private const _INFO_VIEW_ID_JOB_VACANCY_CONTENT						= self::__INFO_VIEWS_COUNT;
	private const _INFO_VIEW_ID_JOB_CONTENT_PREVIEW						= self::__INFO_VIEWS_COUNT + 1;
	private const _INFO_VIEW_ID_JOB_CONTENTS_PREVIEWS					= self::__INFO_VIEWS_COUNT + 2;
	private const _INFO_VIEW_ID_JOB_CONTENT_GROUP_PREVIEW_BY_CATEGORY	= self::__INFO_VIEWS_COUNT + 3;
	private const _INFO_VIEW_ID_JOB_CONTENT_GROUP_RANDOM_PREVIEW		= self::__INFO_VIEWS_COUNT + 4;
	private const _INFO_VIEW_ID_JOB_WELCOME_DESCRIPTION					= self::__INFO_VIEWS_COUNT + 5;
	private const _INFO_VIEW_ID_JOB_TOP_CITIES_PREVIEW					= self::__INFO_VIEWS_COUNT + 6;
	//...IDS


	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBInfosView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	public function i_getWelcomeDescriptionInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_WELCOME_DESCRIPTION);
	}

	public function i_getTopCitiesPreviewInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_TOP_CITIES_PREVIEW);
	}

	public function i_getContentInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_VACANCY_CONTENT);
	}
	
	public function i_getContentPreviewInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_CONTENT_PREVIEW);
	}

	public function i_getContentsPreviewsInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_CONTENTS_PREVIEWS);
	}

	public function i_getContentGroupPreviewByCategoryInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_CONTENT_GROUP_PREVIEW_BY_CATEGORY);
	}
	
	public function i_getContentGroupRandomPreviewInfoView()
	{
		return $this->__getInfoView(self::_INFO_VIEW_ID_JOB_CONTENT_GROUP_RANDOM_PREVIEW);
	}
	
	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __generateInfoView(int $aInfoViewId_int):CCInfoView
	{
		$lInfoView_clss = null;

		switch ($aInfoViewId_int)
		{
			case self::_INFO_VIEW_ID_JOB_WELCOME_DESCRIPTION:
			{
				$lInfoView_clss = new CJOBWelcomeDescriptionInfoView();
			}break;

			case self::_INFO_VIEW_ID_JOB_TOP_CITIES_PREVIEW:
			{
				$lInfoView_clss = new CJOBTopCitiesPreviewInfoView();
			}break;

			case self::_INFO_VIEW_ID_JOB_VACANCY_CONTENT:
			{
				$lInfoView_clss = new CJOBContentInfoView();
			}break;
			
			case self::_INFO_VIEW_ID_JOB_CONTENT_PREVIEW:
			{
				$lInfoView_clss = new CJOBContentPreviewInfoView();
			}break;

			case self::_INFO_VIEW_ID_JOB_CONTENTS_PREVIEWS:
			{
				$lInfoView_clss = new CJOBContentsPreviewsInfoView();
			}break;

			case self::_INFO_VIEW_ID_JOB_CONTENT_GROUP_PREVIEW_BY_CATEGORY:
			{
				$lInfoView_clss = new CJOBContentGroupPreviewByCategoryInfoView();
			}break;
			
			case self::_INFO_VIEW_ID_JOB_CONTENT_GROUP_RANDOM_PREVIEW:
			{
				$lInfoView_clss = new CJOBContentGroupRandomPreviewInfoView();
			}break;
			
			default:
				$lInfoView_clss = parent::__generateInfoView($aInfoViewId_int);
			break;
		}

		return $lInfoView_clss;
	}

	/*override*/protected function __generateNavigationsInfoView()
	{
		return new CJOBNavigationsInfoView();
	}
	
	/*override*/protected function __generatePanelsInfoView()
	{
		return new CJOBPanelsInfoView();
	}

	/*override*/protected function __generateSortingsInfoView()
	{
		return new CJOBSortingsInfoView();
	}
}


?>