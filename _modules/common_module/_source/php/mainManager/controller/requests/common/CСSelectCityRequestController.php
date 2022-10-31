<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCCitySelectRequestController extends CCRequestController
{
	private $_fCityId_int;
	private $_fRegionId_int;


	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	protected function __validateRequestFields()
	{
		parent::__validateRequestFields();

		$this->__fParams_arr 	= array(CRequestControllerBase::i_PARAM_TRANSMIT 			=> CTransmitConst::i_FORM_SELECT_CITY_CITY,
										CRequestControllerBase::i_PARAM_REQUIRED 			=> CFieldRequiredConst::i_FORM_SELECT_CITY_CITY);
		$this->_fCityId_int = $this->__validateListBox();

		$this->__fParams_arr 	= array(CRequestControllerBase::i_PARAM_TRANSMIT 			=> CTransmitConst::i_FORM_SELECT_CITY_REGION,
										CRequestControllerBase::i_PARAM_REQUIRED 			=> CFieldRequiredConst::i_FORM_SELECT_CITY_REGION);
		$this->_fRegionId_int = $this->__validateListBox();

		if (!$this->__validateFieldsRequired())
		{
			$this->__getMainData()->addEvent(CEventConst::i_SELECT_CITY_DATA_EMPTY);
			return false;
		}
		
		return $this->__validateFieldsIncorrectlyCount();
	}
	

	protected function __request()
	{
		$this->__fResult_str = $this->__getDatabaseController()->i_getCityDatabaseController()->i_getDataById($this->_fCityId_int, '');
		if (!$this->__fResult_str)
		{
			$this->__getMainData()->addEvent(CEventConst::i_SELECT_CITY_WRONG_DATA);
			return;
		}

		$this->__fResult_str = $this->__getDatabaseController()->getRegionDatabaseController()->getDataById($this->_fRegionId_int, '');
		if (!$this->__fResult_str)
		{
			$this->__getMainData()->i_addEvent(CEventConst::i_SELECT_CITY_WRONG_DATA);
			return;
		}

		$this->__getHostData()->addCookie(CMainConst::COOKIE_USER_CITY_ID, $this->_fCityId_int, CControlParamConst::i_LIFE_TIME_ONE_YEAR);
		$this->__getMainData()->setRedirect(CPageConst::PAGE_MAIN);
	}
}


?>
