<?php
/*
IMPORT_PRIORITY:7
*/
namespace basapa_ns;


class CMPagesSectionsView
{
	/*private $_fAccessProhibitionPageSectionView_clss;
	private $_fAccessErrorPageSectionView_clss;
	private $_fAccessRequirementPageSectionView_clss;
	private $_fAccessRestrictionPageSectionView_clss;
	private $_fError403PageSectionView_clss;
	private $_fError404PageSectionView_clss;*/
	private $_fMainPageSectionView_clss;
	private $_fPaymentPageSectionView_clss;
	/*private $_fRegistrationPageSectionView_clss;
	private $_fAuthorizationPageSectionView_clss;
	private $_fSelectCityPageSectionView_clss;
*/
	
	
	public function __construct()
	{
		$this->_init();
	}
	
	/***************************************************
	 * INTERFACE
	 */

	public function getMainPageSectionView()
	{
		return $this->_getMainPageSectionView();
	}
	
	public function getPaymentPageSectionView()
	{
		return $this->_getPaymentPageSectionView();
	}
	/*
	public function getRegistrationPageSectionView()
	{
		return $this->_getRegistrationPageSectionView();
	}
	
	public function getAuthorizationPageSectionView()
	{
		return $this->_getAuthorizationPageSectionView();
	}

	public function getSelectCityPageSectionView()
	{
		return $this->_getSelectCityPageSectionView();
	}

	public function getAccessProhibitionPageSectionView()
	{
		return $this->_getAccessProhibitionPageSectionView();
	}

	public function getAccessErrorPageSectionView()
	{
		return $this->_getAccessErrorPageSectionView();
	}

	public function getAccessRequirementPageSectionView()
	{
		return $this->_getAccessRequirementPageSectionView();
	}

	public function getAccessRestrictionPageSectionView()
	{
		return $this->_getAccessRestrictionPageSectionView();
	}

	public function getError403PageSectionView()
	{
		return $this->_getError403PageSectionView();
	}

	public function getError404PageSectionView()
	{
		return $this->_getError404PageSectionView();
	}*/

	/*
	 * INTERFACE
	 ***************************************************/
	
	private function _init()
	{
	}
	
	private function _getMainPageSectionView()
	{
		return isset($this->_fMainPageSectionView_clss) ? $this->_fMainPageSectionView_clss : ($this->_fMainPageSectionView_clss = new CMMainPageSectionView());
	}
	
	private function _getPaymentPageSectionView()
	{
		return isset($this->_fPaymentPageSectionView_clss) ? $this->_fPaymentPageSectionView_clss : ($this->_fPaymentPageSectionView_clss = new CMPaymentPageSectionView());
	}
	/*
	private function _getRegistrationPageSectionView()
	{
		return isset($this->_fRegistrationPageSectionView_clss) ? $this->_fRegistrationPageSectionView_clss : ($this->_fRegistrationPageSectionView_clss = new CRegistrationPageSectionView());
	}
	
	private function _getAuthorizationPageSectionView()
	{
		return isset($this->_fAuthorizationPageSectionView_clss) ? $this->_fAuthorizationPageSectionView_clss : ($this->_fAuthorizationPageSectionView_clss = new CAuthorizationPageSectionView());
	}

	private function _getSelectCityPageSectionView()
	{
		return isset($this->_fSelectCityPageSectionView_clss) ? $this->_fSelectCityPageSectionView_clss : ($this->_fSelectCityPageSectionView_clss = new CSelectCityPageSectionView());
	}

	private function _getAccessProhibitionPageSectionView()
	{
		return isset($this->_fAccessProhibitionPageSectionView_clss) ? $this->_fAccessProhibitionPageSectionView_clss : ($this->_fAccessProhibitionPageSectionView_clss = new CAccessProhibitionPageSectionsView());
	}

	private function _getAccessErrorPageSectionView()
	{
		return isset($this->_fAccessErrorPageSectionView_clss) ? $this->_fAccessErrorPageSectionView_clss : ($this->_fAccessErrorPageSectionView_clss = new CAccessErrorPageSectionsView());
	}

	private function _getAccessRequirementPageSectionView()
	{
		return isset($this->_fAccessRequirementPageSectionView_clss) ? $this->_fAccessRequirementPageSectionView_clss : ($this->_fAccessRequirementPageSectionView_clss = new CAccessRequirementPageSectionsView());
	}

	private function _getAccessRestrictionPageSectionView()
	{
		return isset($this->_fAccessRestrictionPageSectionView_clss) ? $this->_fAccessRestrictionPageSectionView_clss : ($this->_fAccessRestrictionPageSectionView_clss = new CAccessRestrictionPageSectionsView());
	}

	private function _getError403PageSectionView()
	{
		return isset($this->_fError403PageSectionView_clss) ? $this->_fError403PageSectionView_clss : ($this->_fError403PageSectionView_clss = new CError403PageSectionsView());
	}

	private function _getError404PageSectionView()
	{
		return isset($this->_fError404PageSectionView_clss) ? $this->_fError404PageSectionView_clss : ($this->_fError404PageSectionView_clss = new CError404PageSectionsView());
	}*/
}


?>