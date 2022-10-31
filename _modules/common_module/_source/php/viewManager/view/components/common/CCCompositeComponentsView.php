<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


/*virtual*/class CCCompositeComponentsView
{
	//IDS...
	private const _COMPOSITE_COMPONENT_VIEW_ID_FILEFIELD			= 0;
	private const _COMPOSITE_COMPONENT_VIEW_ID_FILES_UPLOADING		= 1;
	private const _COMPOSITE_COMPONENT_VIEW_ID_TIME_RANGE			= 2;
	private const _COMPOSITE_COMPONENT_VIEW_ID_CHECKBOXES			= 3;
	private const _COMPOSITE_COMPONENT_VIEW_ID_SELECT_CITY			= 4;
	protected const __COMPOSITE_COMPONENT_VIEWS_COUNT				= 5;
	//...IDS

	private $_fCompositeComponentView_clss_arr = [];

	private $_fComponentsView_clss;


	public function __construct(CCComponentsView $aComponentsView_clss)
	{
		$this->__init($aComponentsView_clss);
	}
	
	/***************************************************
	 * INTERFACE
	 */

	public function i_getCheckboxesFormCompositeComponentView()
	{
		return $this->__getCompositeComponentView(self::_COMPOSITE_COMPONENT_VIEW_ID_CHECKBOXES);
	}

	public function i_getFilefieldFormCompositeComponentView()
	{
		return $this->__getCompositeComponentView(self::_COMPOSITE_COMPONENT_VIEW_ID_FILEFIELD);
	}

	public function i_getFilesUploadingFormCompositeComponentView()
	{
		return $this->__getCompositeComponentView(self::_COMPOSITE_COMPONENT_VIEW_ID_FILES_UPLOADING);
	}

	public function i_getTimeRangeFormCompositeComponentView()
	{
		//return $this->__getCompositeComponentView(self::_COMPOSITE_COMPONENT_VIEW_ID_TIME_RANGE);
	}

	public function i_getSelectCityFormCompositeComponentView()
	{
		return $this->__getCompositeComponentView(self::_COMPOSITE_COMPONENT_VIEW_ID_SELECT_CITY);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*/protected function __init(CCComponentsView $aComponentsView_clss):void
	{
		$this->_fComponentsView_clss = $aComponentsView_clss;
	}

	protected function __getCompositeComponentView(int $aCompositeComponentViewId_int)
	{
		return $this->_fCompositeComponentView_clss_arr[$aCompositeComponentViewId_int] ?? ($this->_fCompositeComponentView_clss_arr[$aCompositeComponentViewId_int] = $this->__generateCompositeComponentView($aCompositeComponentViewId_int, $this->_fComponentsView_clss));
	}

	/*virtual*/protected function __generateCompositeComponentView(int $aCompositeComponentViewId_int, $aComponentsView_clss):CCCompositeComponentView
	{
		$lCompositeComponentView_clss = null;

		switch ($aCompositeComponentViewId_int)
		{
			case self::_COMPOSITE_COMPONENT_VIEW_ID_CHECKBOXES:
			{
				$lCompositeComponentView_clss = new CCCheckboxesFormCompositeComponentView($aComponentsView_clss);
			}break;

			case self::_COMPOSITE_COMPONENT_VIEW_ID_FILEFIELD:
			{
				$lCompositeComponentView_clss = new CCFilefieldFormCompositeComponentView($aComponentsView_clss);
			}break;

			case self::_COMPOSITE_COMPONENT_VIEW_ID_FILES_UPLOADING:
			{
				$lCompositeComponentView_clss = new CCFilesUploadingFormCompositeComponentView($aComponentsView_clss);
			}break;

			/*case self::_COMPOSITE_COMPONENT_VIEW_ID_TIME_RANGE:
			{
				//$lCompositeComponentView_clss = new CCTimeRangeCompositeComponentView($aComponentsView_clss);
			}break;
			*/

			case self::_COMPOSITE_COMPONENT_VIEW_ID_SELECT_CITY:
			{
				$lCompositeComponentView_clss = new CCSelectCityFormCompositeComponentView($aComponentsView_clss);
			}break;

			default:
				new CException('__generateCompositeComponentView', 'Unsupported composite component view id: ' .$aCompositeComponentViewId_int);
			break;
		}

		return $lCompositeComponentView_clss;
	}
}


?>