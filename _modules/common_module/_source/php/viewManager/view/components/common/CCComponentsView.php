<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:4
*/
namespace basapa_ns;


/*virtual*/class CCComponentsView
{
	//IDS...
	private const _COMPONENTS_VIEW_ID_BUTTON			= 0;
	private const _COMPONENTS_VIEW_ID_CHECKBOX			= 1;
	private const _COMPONENTS_VIEW_ID_IMAGE				= 2;
	private const _COMPONENTS_VIEW_ID_LABELFIELD		= 3;
	private const _COMPONENTS_VIEW_ID_LABELLIST			= 4;
	private const _COMPONENTS_VIEW_ID_LISTBOX			= 5;
	private const _COMPONENTS_VIEW_ID_RADIOBUTTON		= 6;
	private const _COMPONENTS_VIEW_ID_TEXT				= 7;
	private const _COMPONENTS_VIEW_ID_TEXTAREA			= 8;
	private const _COMPONENTS_VIEW_ID_TEXTFIELD			= 9;
	private const _COMPONENTS_VIEW_ID_TABLE				= 10;
	protected const __COMPONENTS_VIEWS_COUNT			= 11;
	//...IDS

	private $_fComponentsView_clss_arr = [];

	private $_fCompositeComponentsView_clss;
	private $_fPaymentComponentsView_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getButtonComponentsView():CCButtonComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_BUTTON);
	}

	public function i_getCheckboxComponentsView():CCCheckboxComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_CHECKBOX);
	}

	public function i_getImageComponentsView():CCImageComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_IMAGE);
	}

	public function i_getLabelfieldComponentsView():CCLabelfieldComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_LABELFIELD);
	}

	public function i_getLabellistComponentsView():CCLabellistComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_LABELLIST);
	}

	public function i_getListboxComponentsView():CCListboxComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_LISTBOX);
	}

	public function i_getRadiobuttonComponentsView():CCRadiobuttonComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_RADIOBUTTON);
	}

	public function i_getTextComponentsView():CCTextComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_TEXT);
	}

	public function i_getTextareaComponentsView():CCTextareaComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_TEXTAREA);
	}

	public function i_getTextfieldComponentsView():CCTextfieldComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_TEXTFIELD);
	}

	public function i_getTableComponentsView():CCTableComponentsView
	{
		return $this->__getComponentsView(self::_COMPONENTS_VIEW_ID_TABLE);
	}

	public function i_getCompositeComponentsView()
	{
		return $this->_getCompositeComponentsView();
	}
	
	public function i_getPaymentComponentsView()
	{
		return $this->_getPaymentComponentsView();
	}

	public function i_openWrapperContainer()
	{
		echo '<div class="wrapper_container">';
	}

	public function i_closeWrapperContainer()
	{
		echo '</div>';
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getComponentsView(int $aComponentsViewId_int)
	{
		return $this->_fComponentsView_clss_arr[$aComponentsViewId_int] ?? ($this->_fComponentsView_clss_arr[$aComponentsViewId_int] = $this->__generateComponentsView($aComponentsViewId_int));
	}

	/*virtual*/protected function __generateComponentsView(int $aComponentsViewId_int)
	{
		$lComponentsView_clss = null;

		switch ($aComponentsViewId_int)
		{
			case self::_COMPONENTS_VIEW_ID_BUTTON:
			{
				$lComponentsView_clss = new CCButtonComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_CHECKBOX:
			{
				$lComponentsView_clss = new CCCheckboxComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_IMAGE:
			{
				$lComponentsView_clss = new CCImageComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_LABELFIELD:
			{
				$lComponentsView_clss = new CCLabelfieldComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_LABELLIST:
			{
				$lComponentsView_clss = new CCLabellistComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_LISTBOX:
			{
				$lComponentsView_clss = new CCListboxComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_RADIOBUTTON:
			{
				$lComponentsView_clss = new CCRadiobuttonComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_TEXT:
			{
				$lComponentsView_clss = new CCTextComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_TEXTAREA:
			{
				$lComponentsView_clss = new CCTextareaComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_TEXTFIELD:
			{
				$lComponentsView_clss = new CCTextfieldComponentsView();
			}break;

			case self::_COMPONENTS_VIEW_ID_TABLE:
			{
				$lComponentsView_clss = new CCTableComponentsView();
			}break;

			default:
				new CException('__generateComponentsView', 'Unsupported components view id: ' .$aComponentsViewId_int);
			break;
		}

		return $lComponentsView_clss;
	}

	private function _getCompositeComponentsView()
	{
		return $this->_fCompositeComponentsView_clss ?? ($this->_fCompositeComponentsView_clss = $this->__generateCompositeComponentsView($this));
	}

	/*virtual*/protected function __generateCompositeComponentsView($aCComponentsView_clss)
	{
		return new CCCompositeComponentsView($aCComponentsView_clss);
	}

	private function _getPaymentComponentsView()
	{
		return $this->_fPaymentComponentsView_clss ?? ($this->_fPaymentComponentsView_clss = new CCPaymentComponentsView());
	}
}


?>