<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCSectionView
{
	static private $_fPagesSectionsView_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		$lSectionTag_str = $this->__getSectionTag();

		echo
		'<' .$lSectionTag_str. ' class="' .$this->__getSectionClasses(). '">';
			$this->_draw();
		echo
		'</' .$lSectionTag_str. '>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	/*virtual*/protected function __getSectionTag()
	{
		return 'div';
	}

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	protected function __getViewsData()
	{
		return CViewManager::i_getInstance()->i_getViewsData();
	}

	/*virtual*/protected function __getSectionClasses():string
	{
		return 'css_page_section';
	}

	/*virtual*/protected function __getSectionId():int
	{
		return CCViewConst::i_SECTION_ID_INVALID;
	}

	protected function __getPagesSectionsView()
	{
		return self::$_fPagesSectionsView_clss ?? (self::$_fPagesSectionsView_clss = new CPagesSectionsView());
	}

	private function _draw():void
	{
		$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();
		$lPagesSectionsView_clss = $this->__getPagesSectionsView()->i_getPagesSectionsView($lSiteId_str);

		$lSectionId_int = $this->__getSectionId();
		$lPageId_str = $this->__getMainData()->i_getGETParamPageId();

		$lPagesSectionsView_clss->i_getPageSectionView($lPageId_str)->i_draw($lSectionId_int);
	}
}


?>