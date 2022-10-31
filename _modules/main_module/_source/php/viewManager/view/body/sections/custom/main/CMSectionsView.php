<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMSectionsView extends CCSectionsView
{
	private $_fHeaderSectionView_clss;
	private $_fPreContentSectionView_clss;
	private $_fContentSectionView_clss;
	private $_fLeftSectionView_clss;
	private $_fRightSectionView_clss;
	private $_fPostContentSectionView_clss;
	private $_fFooterSectionView_clss;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __getViewData()
	{
		return CViewManager::getInstance()->getViewsData()->getMainViewData();
	}

	protected function __getHeaderSectionView()
	{
		return isset($this->_fHeaderSectionView_clss) ? $this->_fHeaderSectionView_clss : ($this->_fHeaderSectionView_clss = new CMHeaderSectionView());
	}

	protected function __getPreContentSectionView()
	{
		return isset($this->_fPreContentSectionView_clss) ? $this->_fPreContentSectionView_clss : ($this->_fPreContentSectionView_clss = new CMPreContentSectionView());
	}

	protected function __getContentSectionView()
	{
		return isset($this->_fContentSectionView_clss) ? $this->_fContentSectionView_clss : ($this->_fContentSectionView_clss = new CMContentSectionView());
	}

	protected function __getLeftSectionView()
	{
		return isset($this->_fLeftSectionView_clss) ? $this->_fLeftSectionView_clss : ($this->_fLeftSectionView_clss = new CMLeftSectionView());
	}

	protected function __getRightSectionView()
	{
		return isset($this->_fRightSectionView_clss) ? $this->_fRightSectionView_clss : ($this->_fRightSectionView_clss = new CMRightSectionView());
	}

	protected function __getPostContentSectionView()
	{
		return isset($this->_fPostContentSectionView_clss) ? $this->_fPostContentSectionView_clss : ($this->_fPostContentSectionView_clss = new CMPostContentSectionView());
	}

	protected function __getFooterSectionView()
	{
		return isset($this->_fFooterSectionView_clss) ? $this->_fFooterSectionView_clss : ($this->_fFooterSectionView_clss = new CMFooterSectionView());
	}
}


?>