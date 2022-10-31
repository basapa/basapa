<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCSectionsView
{
	private $_fHeaderSectionView_clss;
	private $_fPreContentSectionView_clss;
	private $_fContentSectionView_clss;
	private $_fLeftSectionView_clss;
	private $_fRightSectionView_clss;
	private $_fPostContentSectionView_clss;
	private $_fFooterSectionView_clss;


	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lMainData_clss = $this->_getMainData();
		$lPageId_str = $lMainData_clss->i_getGETParamPageId();
		$lSiteId_str = $lMainData_clss->i_getGETParamSiteId();
		$lSectionsIds_int_arr = $this->__getViewsData()->i_getViewData($lSiteId_str)->i_getSectionsIds($lPageId_str);

		if (CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_HEADER, $lSectionsIds_int_arr))
		{
			echo
			'<div class="css_page_header">';
				$this->_getHeaderSectionView()->i_draw();
			echo
			'</div>';
		}

		$lIsPreContentSectionDefined_bl = CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_PRE_CONTENT, $lSectionsIds_int_arr);
		$lIsLeftSectionDefined_bl = CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_LEFT, $lSectionsIds_int_arr);
		$lIsContentSectionDefined_bl = CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_CONTENT, $lSectionsIds_int_arr);
		$lIsRightSectionDefined_bl = CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_RIGHT, $lSectionsIds_int_arr);
		$lIsPostContentSectionDefined_bl = CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_POST_CONTENT, $lSectionsIds_int_arr);

		if (
				$lIsPreContentSectionDefined_bl
				|| $lIsLeftSectionDefined_bl
				|| $lIsContentSectionDefined_bl
				|| $lIsRightSectionDefined_bl
				|| $lIsPostContentSectionDefined_bl
			)
		{
			echo
			'<div class="css_page_body">';
		}

		if ($lIsPreContentSectionDefined_bl)
		{
			$this->_getPreContentSectionView()->i_draw();
		}

		if ($lIsLeftSectionDefined_bl)
		{
			$this->_getLeftSectionView()->i_draw();
		}

		if ($lIsContentSectionDefined_bl)
		{
			$this->_getContentSectionView()->i_draw();
		}

		if ($lIsRightSectionDefined_bl)
		{
			$this->_getRightSectionView()->i_draw();
		}

		if ($lIsPostContentSectionDefined_bl)
		{
			$this->_getPostContentSectionView()->i_draw();
		}

		if (
				$lIsPreContentSectionDefined_bl
				|| $lIsLeftSectionDefined_bl
				|| $lIsContentSectionDefined_bl
				|| $lIsRightSectionDefined_bl
				|| $lIsPostContentSectionDefined_bl
			)
		{
			echo
			'</div>';
		}

		if (CArrayTools::i_isInArray(CCViewConst::i_SECTION_ID_FOOTER, $lSectionsIds_int_arr))
		{
			echo
			'<div class="css_page_footer">';
				$this->_getFooterSectionView()->i_draw();
			echo
			'</div>';
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getViewsData()
	{
		return CViewManager::i_getInstance()->i_getViewsData();
	}

	private function _getHeaderSectionView()
	{
		return $this->_fHeaderSectionView_clss ?? ($this->_fHeaderSectionView_clss = new CCHeaderSectionView());
	}

	private function _getPreContentSectionView()
	{
		return $this->_fPreContentSectionView_clss ?? ($this->_fPreContentSectionView_clss = new CCPreContentSectionView());
	}

	private function _getContentSectionView()
	{
		return $this->_fContentSectionView_clss ?? ($this->_fContentSectionView_clss = new CCContentSectionView());
	}

	private function _getLeftSectionView()
	{
		return $this->_fLeftSectionView_clss ?? ($this->_fLeftSectionView_clss = new CCLeftSectionView());
	}

	private function _getRightSectionView()
	{
		return $this->_fRightSectionView_clss ?? ($this->_fRightSectionView_clss = new CCRightSectionView());
	}

	private function _getPostContentSectionView()
	{
		return $this->_fPostContentSectionView_clss ?? ($this->_fPostContentSectionView_clss = new CCPostContentSectionView());
	}

	private function _getFooterSectionView()
	{
		return $this->_fFooterSectionView_clss ?? ($this->_fFooterSectionView_clss = new CCFooterSectionView());
	}
}


?>