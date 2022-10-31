<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCBanner
{
//	protected $__fBanners_arr = null;


	/*public function __construct()
	{
	//	$this->__init();
	}*/


	/***************************************************
	 * INTERFACE
	 */

/*
	public function i_draw($aType_int)
	{
		$this->__draw($aType_int);
	}


	public function i_redraw()
	{
		if (!isset($this->__fBanners_arr))
		{
			return;
		}

		echo
		'<script type="text/javascript">';

		foreach ($this->__fBanners_arr as $lBannerId_str => $lDummyId_str)
		{
			echo
			'jsApplyBanner(\'' .$lBannerId_str. '\', \'' .$lDummyId_str. '\');';
		}

		echo
		'</script>';
	}


	public function isBannerDefined($aBannerId_str)
	{
		return isset($this->__fBanners_arr[$aBannerId_str]);
	}
*/

	/*
	 * INTERFACE
	 ***************************************************/

/*
	protected function __init()
	{
	}
*/
	/*
	protected function __getMainData()
	{
		return CMainData::i_getInstance();
	}


	protected function __getComponents()
	{
		return CComponentsView::i_getInstance();
	}

*//*
	protected function __draw($aType_int)
	{
		switch ($aType_int)
		{
			case CBannerConst::i_TYPE_PRE_CONTENT:
			{
				$this->__drawPreContent();
			}break;


			case CBannerConst::i_TYPE_CONTENT_TOP:
			{
				$this->__drawContentTop();
			}break;


			case CBannerConst::TYPE_CONTENT_MIDDLE:
			{
				$this->__drawContentMiddle();
			}break;


			case CBannerConst::TYPE_CONTENT_BOTTOM:
			{
				$this->__drawContentBottom();
			}break;


			case CBannerConst::TYPE_LEFT_TOP:
			{
				$this->__drawLeftTop();
			}break;


			case CBannerConst::TYPE_LEFT_MIDDLE:
			{
				$this->__drawLeftMiddle();
			}break;


			case CBannerConst::TYPE_LEFT_BOTTOM:
			{
				$this->__drawLeftBottom();
			}break;


			case CBannerConst::TYPE_RIGHT_TOP:
			{
				$this->__drawRightTop();
			}break;


			case CBannerConst::TYPE_RIGHT_MIDDLE:
			{
				$this->__drawRightMiddle();
			}break;


			case CBannerConst::TYPE_RIGHT_BOTTOM:
			{
				$this->__drawRightBottom();
			}break;


			case CBannerConst::TYPE_POST_CONTENT:
			{
				$this->__drawPostContent();
			}break;
		}
	}*/

/*
	protected function __drawPreContent()
	{
	}


	protected function __drawContentTop()
	{
		$lParams_arr	= array(CComponentParam::IMAGE_FILE_NAME 		=> CFileConst::BANNER_DIRECTORY_RED . CFileConst::BANNER_468X60,
								CComponentParam::IMAGE_WIDTH 			=> 468,
								CComponentParam::IMAGE_HEIGHT 			=> 60,
								CComponentParam::IMAGE_TYPE 			=> CImage::TYPE_IMAGE,
								CComponentParam::IMAGE_CLASS 			=> 'css_banner');
		$this->__getComponents()->getImage()->draw($lParams_arr);
	}


	protected function __drawContentMiddle()
	{
	}


	protected function __drawContentBottom()
	{
	}


	protected function __drawLeftTop()
	{
		$lParams_arr	= array(CComponentParam::IMAGE_FILE_NAME 		=> CFileConst::BANNER_DIRECTORY_RED . CFileConst::BANNER_120X600,
								CComponentParam::IMAGE_WIDTH 			=> 120,
								CComponentParam::IMAGE_HEIGHT 			=> 600,
								CComponentParam::IMAGE_TYPE 			=> CImage::TYPE_IMAGE,
								CComponentParam::IMAGE_CLASS 			=> 'css_banner');
		$this->__getComponents()->getImage()->draw($lParams_arr);
	}*/

/*
	protected function __drawLeftMiddle()
	{
	}


	protected function __drawLeftBottom()
	{
	}


	protected function __drawRightTop()
	{
		$lParams_arr	= array(CComponentParam::IMAGE_FILE_NAME 		=> CFileConst::BANNER_DIRECTORY_RED . CFileConst::BANNER_160X600,
								CComponentParam::IMAGE_WIDTH 			=> 160,
								CComponentParam::IMAGE_HEIGHT 			=> 600,
								CComponentParam::IMAGE_TYPE 			=> CImage::TYPE_IMAGE,
								CComponentParam::IMAGE_CLASS 			=> 'css_banner');
		$this->__getComponents()->getImage()->draw($lParams_arr);
	}


	protected function __drawRightMiddle()
	{
	}


	protected function __drawRightBottom()
	{
	}
*/
/*
	protected function __drawPostContent()
	{
	}


	protected function __prepareBanner($aBannerId_str, $aDummyId_str)
	{
		$aBannerId_str = 'banner_' .$aBannerId_str;

		$this->__fBanners_arr[$aBannerId_str] = $aDummyId_str;

		echo
		'<div id="' .$aBannerId_str. '" class="css_banner"></div>';
	}*/
}


?>
