<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


class CCListboxComponentData
{
	//listbox
	private $_fDayData_clss_arr;
	private $_getMonthListBoxData;
	private $_getYearListBoxData;
	private $_getAgeListBoxData;
	private $_getMaritalStatusListBoxData;
	private $_getNationalityListBoxData;
	private $_getChildrenListBoxData;
	private $_getLevelEducationListBoxData;
	private $_getSexListBoxData;
	private $_getPhoneTypeListBoxData;
	private $_getAdminUserStateListBoxData;


	public function __construct()
	{
		$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */


	public function i_getDayData()
	{
		return $this->_getDayData();
	}


	public function i_getMonthData()
	{
		return $this->_getMonthData();
	}


	public function i_getYearData()
	{
		return $this->_getYearData();
	}


	public function i_getAgeData()
	{
		return $this->_getAgeData();
	}


	public function i_getMaritalStatusData()
	{
		return $this->_getMaritalStatusData();
	}


	public function i_getNationalityData()
	{
		return $this->_getNationalityData();
	}


	public function i_getChildrenData()
	{
		return $this->_getChildrenData();
	}


	public function i_getLevelEducationData()
	{
		return $this->_getLevelEducationData();
	}


	public function i_getSexData()
	{
		return $this->_getSexData();
	}


	public function i_getPhoneTypeData()
	{
		return $this->_getPhoneTypeData();
	}

	
	/*
	 * INTERFACE
	 ***************************************************/


	private function _init()
	{
	}


	private function _getNationalityData()
	{
		return isset($this->_getNationalityListBoxData) ? $this->_getNationalityListBoxData : ($this->_getNationalityListBoxData 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_RUS,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_RUS),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_ABH,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_ABH),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_AZE,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_AZE),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_BLR,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_BLR),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_GEO,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_GEO),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_WORLD, CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_WORLD),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_KAZ,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_KAZ),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_KGZ,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_KGZ),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_LVA,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_LVA),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_LTU,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_LTU),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_MDA,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_MDA),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_TJK,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_TJK),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_TKM,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_TKM),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_UZB,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_UZB),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_UKR,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_UKR),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_EST,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_EST),
																																	array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::NATIONALITY_OST,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::NATIONALITY_OST)));
	}


	private function _getMaritalStatusListBoxData()
	{
		return isset($this->_getMaritalStatusListBoxData) ? $this->_getMaritalStatusListBoxData : ($this->_getMaritalStatusListBoxData 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::MARITAL_STATUS_SINGLE, CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::MARITAL_STATUS_SINGLE),
																																		array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::MARITAL_STATUS_MARRIED,  CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::MARITAL_STATUS_MARRIED)));
	}


	private function _getChildrenListBoxData()
	{
		return isset($this->_getChildrenListBoxData) ? $this->_getChildrenListBoxData : ($this->_getChildrenListBoxData 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::CHILDREN_YES,  CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::CHILDREN_YES,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::CHILDREN_INFO_YES),
																														array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::CHILDREN_NO,  CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::CHILDREN_NO,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::CHILDREN_INFO_NO)));
	}


	private function _getLevelEducationListBoxData()
	{
		return isset($this->_getLevelEducationListBoxData) ? $this->_getLevelEducationListBoxData : ($this->_getLevelEducationListBoxData 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::LEVEL_EDUCATION_HIGHER,				 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::LEVEL_EDUCATION_HIGHER,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::LEVEL_EDUCATION_INFO_HIGHER),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::LEVEL_EDUCATION_INCOMPLETE_HIGHER,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::LEVEL_EDUCATION_INCOMPLETE_HIGHER,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::LEVEL_EDUCATION_INFO_INCOMPLETE_HIGHER),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::LEVEL_EDUCATION_SECONDARY_VOCATIONAL, CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::LEVEL_EDUCATION_SECONDARY_VOCATIONAL,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::LEVEL_EDUCATION_INFO_SECONDARY_VOCATIONAL),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::LEVEL_EDUCATION_SECONDARY,			 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::LEVEL_EDUCATION_SECONDARY,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::LEVEL_EDUCATION_INFO_SECONDARY),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::LEVEL_EDUCATION_STUDENT,				 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::LEVEL_EDUCATION_STUDENT,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::LEVEL_EDUCATION_INFO_STUDENT)));
	}


	private function _getSexListBoxData()
	{
		return isset($this->_getSexListBoxData) ? $this->_getSexListBoxData : ($this->_getSexListBoxData = array(array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::SEX_MALE, CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::SEX_MALE,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::SEX_INFO_MALE),
																										array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::SEX_FEMALE,  CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::SEX_FEMALE,  CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::SEX_INFO_FEMALE)));
	}


	private function _getPhoneTypeListBoxData()
	{
		return isset($this->_getPhoneTypeListBoxData) ? $this->_getPhoneTypeListBoxData : ($this->_getPhoneTypeListBoxData 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::PHONE_TYPE_MOBILE, CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::PHONE_TYPE_MOBILE),
																															array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::PHONE_TYPE_CITY,	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::PHONE_TYPE_CITY),
																															array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::PHONE_TYPE_FREE_800, CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::PHONE_TYPE_FREE_800),
																															array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::PHONE_TYPE_FAX, 	 CComponentParam::ELEMENT_PARAM_VALUE => CValueTransmitConst::PHONE_TYPE_FAX)));
	}


	private function _getAdminUserStateListBoxData()
	{
		return isset($this->_getAdminUserStateListBoxData) ? $this->_getAdminUserStateListBoxData : ($this->_getAdminUserStateListBoxData	= array(
		//array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::USER_STATE_ACTIVATED,			CComponentParam::ELEMENT_PARAM_VALUE => CControlParamConst::USER_STATE_ACTIVATED,			CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::USER_STATE_INFO_ACTIVATED),
																																			//array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::USER_STATE_BLOCKED,			CComponentParam::ELEMENT_PARAM_VALUE => CControlParamConst::USER_STATE_BLOCKED,				CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::USER_STATE_INFO_BLOCKED),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CNameTransmitConst::USER_STATE_BANNED,				CComponentParam::ELEMENT_PARAM_VALUE => CControlParamConst::USER_STATE_BANNED, 				CComponentParam::ELEMENT_PARAM_NAME_INFO => CNameTransmitConst::USER_STATE_INFO_BANNED)));
	}


	private function _getLabellistComponentData()
	{
		return CLabellistComponentData::getInstance();
	}


	private function _getAuthorizationLabelListData()
	{
		return isset($this->_getAuthorizationLabelListData) ? $this->_getAuthorizationLabelListData : ($this->_getAuthorizationLabelListData = array(array(CComponentParam::ELEMENT_PARAM_NAME => CFieldNameConst::FORM_AUTHORIZATION,		 CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CPageConst::PAGE_AUTHORIZATION,	 CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_AUTHORIZATION)),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CFieldNameConst::FORM_REGISTRATION,		 CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CPageConst::PAGE_REGISTRATION,	 CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_REGISTRATION)),
																																			array(CComponentParam::ELEMENT_PARAM_NAME => CFieldNameConst::FORM_RECOVERY_PASSWORD,	 CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CPageConst::PAGE_RECOVERY_PASSWORD, CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_RECOVERY_PASSWORD))));
	}


	private function _getAccountSettingsLabelListData()
	{
		return isset($this->_getAccountSettingsLabelListData) ? $this->_getAccountSettingsLabelListData : ($this->_getAccountSettingsLabelListData 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CFieldNameConst::FORM_ACCOUNT_SETTINGS,					CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CPageConst::PAGE_USER,									CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_USER)),
																																					array(CComponentParam::ELEMENT_PARAM_NAME => CFieldNameConst::FORM_ACCOUNT_SETTINGS_CHANGE_PASSWORD,	CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CActionConst::ACTION_ACCOUNT_SETTINGS_CHANGE_PASSWORD, 	CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_USER, CSubpageConst::SUBPAGE_ACCOUNT_SETTINGS, CActionConst::ACTION_ACCOUNT_SETTINGS_CHANGE_PASSWORD)),
																																					array(CComponentParam::ELEMENT_PARAM_NAME => CFieldNameConst::FORM_USER_SETTINGS_CHANGE_EMAIL		,	CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CActionConst::ACTION_ACCOUNT_SETTINGS_CHANGE_EMAIL, 	CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_USER, CSubpageConst::SUBPAGE_ACCOUNT_SETTINGS, CActionConst::ACTION_ACCOUNT_SETTINGS_CHANGE_EMAIL))));
	}


	private function _getPageLabelListData()
	{
		return isset($this->_fPageLabelListData_arr_arr) ? $this->_fPageLabelListData_arr_arr : ($this->_fPageLabelListData_arr_arr 	= array(array(CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_JOB_MAIN,				CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CPageConst::PAGE_MAIN,					CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_MAIN))/*,*/
																																				/*array(CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_JOB_VACANCIES,		CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CJOBPageConst::PAGE_VACANCIES,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_JOB, CJOBPageConst::PAGE_VACANCIES)),
																																				array(CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_JOB_REZUMES,			CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CJOBPageConst::PAGE_REZUMES,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_JOB, CJOBPageConst::PAGE_REZUMES)),
																																				array(CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_JOB_COMPANIES,		CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CJOBPageConst::PAGE_COMPANIES,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_JOB, CJOBPageConst::PAGE_COMPANIES)),
																																				array(CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_JOB_ADVERTISEMENTS,	CComponentParam::ELEMENT_PARAM_HREF_SELECTED => CJOBPageConst::PAGE_ADVERTISEMENTS,		CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_JOB, CJOBPageConst::PAGE_ADVERTISEMENTS))*/));
	}


	private function _getFooterPageLabelListData()
	{
		return isset($this->_fFooterPageLabelListData_arr) ? $this->_fFooterPageLabelListData_arr : ($this->_fFooterPageLabelListData_arr 	= array(array(CComponentParam::VISIBLE => !RELEASE_MODE,	CComponentParam::ID => CPageConst::PAGE_DEBUG,			CComponentParam::NAME => CNamePageConst::PAGE_DEBUG,			CComponentParam::HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_DEBUG)),
																																					array(CComponentParam::VISIBLE => !RELEASE_MODE,	CComponentParam::ID => CPageConst::PAGE_SITEMAP,		CComponentParam::NAME => CNamePageConst::PAGE_SITEMAP,			CComponentParam::HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_SITEMAP)),
																																					array(CComponentParam::VISIBLE => true,				CComponentParam::ID => CPageConst::PAGE_SUPPORT,		CComponentParam::NAME => CNamePageConst::PAGE_SUPPORT,			CComponentParam::HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_SUPPORT)),
																																					array(CComponentParam::VISIBLE => true,				CComponentParam::ID => CPageConst::PAGE_PROMOTION,		CComponentParam::NAME => CNamePageConst::PAGE_PROMOTION,		CComponentParam::HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_PROMOTION)),
																																					array(CComponentParam::VISIBLE => true,				CComponentParam::ID => CPageConst::PAGE_REQUIREMENTS,	CComponentParam::NAME => CNamePageConst::PAGE_REQUIREMENTS,		CComponentParam::HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_REQUIREMENTS)),
																																					array(CComponentParam::VISIBLE => true,				CComponentParam::ID => CPageConst::PAGE_RULES,			CComponentParam::NAME => CNamePageConst::PAGE_RULES,			CComponentParam::HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_RULES))));
	}


	private function _getSitemapLabelListData()
	{
		return isset($this->_getSitemapLabelListData) ? $this->_getSitemapLabelListData : ($this->_getSitemapLabelListData 	= array(array(CComponentParam::ELEMENT_PARAM_TYPE => true,				CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_MAIN,					CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_MAIN)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => true,				CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_RULES,					CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_RULES)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_REGISTRATION,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_REGISTRATION)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_AUTHORIZATION,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_AUTHORIZATION)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_RECOVERY_PASSWORD,		CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_RECOVERY_PASSWORD)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => true,				CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_PROMOTION,				CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_PROMOTION)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => true,				CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_SUPPORT,				CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_SUPPORT)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => true,				CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_REQUIREMENTS,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_REQUIREMENTS)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ACCOUNT,				CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_USER)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_SELECT_CITY,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_SELECT_CITY)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ACCESS_DENIED,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_ACCESS_DENIED)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ACCESS_LIMITED,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_ACCESS_LIMITED)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ACCESS_IMPOSIBLE,		CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_ACCESS_IMPOSSIBLE)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ACCESS_ERROR,			CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_ACCESS_ERROR)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ERROR_404,				CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_ERROR_404)),
																															array(CComponentParam::ELEMENT_PARAM_TYPE => !RELEASE_MODE,		CComponentParam::ELEMENT_PARAM_NAME => CNamePageConst::PAGE_ERROR_403,				CComponentParam::ELEMENT_PARAM_HREF => CURLConversion::getRealURL(CSiteConst::SITE_MAIN, CPageConst::PAGE_ERROR_403))));
	}


	private function _fDayData_clss_arr()
	{
		return isset($this->_fDayData_clss_arr) ? $this->_fDayData_clss_arr : ($this->_fDayData_clss_arr = $this->_initDaysListBoxData());
	}


	private function _getMonthListBoxData()
	{
		return isset($this->_getMonthListBoxData) ? $this->_getMonthListBoxData : ($this->_getMonthListBoxData = $this->_initMonthsListBoxData());
	}


	private function _getYearListBoxData()
	{
		return isset($this->_getYearListBoxData) ? $this->_getYearListBoxData : ($this->_getYearListBoxData = $this->_initYearsListBoxData());
	}


	private function _getAgeListBoxData()
	{
		return isset($this->_getAgeListBoxData) ? $this->_getAgeListBoxData : ($this->_getAgeListBoxData = $this->_initAgesListBoxData());
	}


	private function _initDaysListBoxData()
	{
		$lResult_arr = null;

		$lDaysListData_int_arr = $this->_getDaysListData();
		foreach ($lDaysListData_int_arr as $lData_int)
		{
			$lResult_arr[] 	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> $lData_int,
									CComponentParam::ELEMENT_PARAM_VALUE 	=> $lData_int);
		}

		return $lResult_arr;
	}


	private function _initMonthsListBoxData()
	{
		$lResult_arr = null;

		$lMonthsListData_str_arr = $this->_getMonthsListData();

		$lCount_int = count($lMonthsListData_str_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lResult_arr[] 	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> $lMonthsListData_str_arr[$i],
									CComponentParam::ELEMENT_PARAM_VALUE 	=> $i + 1);
		}

		return $lResult_arr;
	}


	private function _initYearsListBoxData()
	{
		$lResult_arr = null;

		$lYearsListData_int_arr = $this->_getYearsListData();
		foreach ($lYearsListData_int_arr as $lData_int)
		{
			$lResult_arr[] 	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> $lData_int,
									CComponentParam::ELEMENT_PARAM_VALUE 	=> $lData_int);
		}

		return $lResult_arr;
	}


	private function _initAgesListBoxData()
	{
		$lResult_arr = null;

		$lAgeListBoxData_int_arr = $this->_getAgesListData();
		foreach ($lAgeListBoxData_int_arr as $lData_int)
		{
			$lResult_arr[] 	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> $lData_int,
									CComponentParam::ELEMENT_PARAM_VALUE 	=> $lData_int);
		}

		return $lResult_arr;
	}


	private function _getDaysListData()
	{
		return isset($this->_fDaysListData_int_arr) ? $this->_fDaysListData_int_arr : ($this->_fDaysListData_int_arr = $this->_initDaysListData());
	}


	private function _getMonthsListData()
	{
		return isset($this->_fMonthsListData_str_arr) ? $this->_fMonthsListData_str_arr : ($this->_fMonthsListData_str_arr = $this->_initMonthsListData());
	}


	private function _getYearsListData()
	{
		return isset($this->_fYearsListData_int_arr) ? $this->_fYearsListData_int_arr : ($this->_fYearsListData_int_arr = $this->_initYearListData());
	}


	private function _getAgesListData()
	{
		return isset($this->_fAgesListData_int_arr) ? $this->_fAgesListData_int_arr : ($this->_fAgesListData_int_arr = $this->_initAgesListData());
	}


	private function _getCurrentYear()
	{
		return $this->_fCurrentYear_int;
	}


	private function _getCurrentMonth()
	{
		return $this->_fCurrentMonth_int;
	}


	private function _getCurrentDay()
	{
		return $this->_fCurrentDay_int;
	}


	private function _initCurrentDate()
	{
		list($this->_fCurrentDay_int, $this->_fCurrentMonth_int, $this->_fCurrentYear_int) = explode(':', date('d:m:Y', CTime::getTime()));
	}


	private function _initDaysListData()
	{
		$lData_int_arr = null;

		for ($i = 0; $i < 31; $i++)
		{
			$lData_int_arr[$i] = $i + 1;
		}

		return $lData_int_arr;
	}


	private function _initMonthsListData()
	{
		return array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	}


	private function _initYearListData()
	{
		$lData_int_arr = null;

		for ($i = 0; $i < 70; $i++)
		{
			$lData_int_arr[$i] = $this->_getCurrentYear() - $i - 10;
		}

		return $lData_int_arr;
	}


	private function _initAgesListData()
	{
		$lData_int_arr = null;

		for ($i = 0; $i < 60; $i++)
		{
			$lData_int_arr[$i] = $i + 14;
		}

		return $lData_int_arr;
	}
}


?>
