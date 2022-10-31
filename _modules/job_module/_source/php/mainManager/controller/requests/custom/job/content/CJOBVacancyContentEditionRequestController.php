<?php


//include_once(ROOT_PHP_DIRECTORY. 'mainManager/controller/requests/custom/JOB/contents/JOB/CJOBRAddJOBRequestController.php');


class CJOBVacancyContentEditionRequestController //extends CJOBRAddJOBRequestController
{
	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/


	protected function __request()
	{
		$_lTime_int = CSystem::time();

		$lIdCategory_arr = null;
		$lIdSubcategory_arr = null;
		foreach ($this->_idSubcategories as $lValue_obj)
		{
			$l_arr = explode('_', $lValue_obj);
			$lIdCategory_arr[] = $l_arr[0];
			$lIdSubcategory_arr[] = isset($l_arr[1]) ? $l_arr[1] : CValueTransmitConst::COMMON_NOT_SELECTED;
		}

		$lParams_arr 	= array(CJOBRDatabaseConst::TABLE_JOB_TRANSLIT				=> CTools::convertStringRuToEn($this->_name),
								CJOBRDatabaseConst::TABLE_JOB_NAME 					=> $this->_name,
								CJOBRDatabaseConst::TABLE_JOB_PAY_MIN 				=> $this->_payMin,
								CJOBRDatabaseConst::TABLE_JOB_PAY_MAX				=> $this->_payMax,
								CJOBRDatabaseConst::TABLE_JOB_AGREEMENT				=> $this->_agreement,
								CJOBRDatabaseConst::TABLE_JOB_TYPE_WORK 			=> $this->_typeWork,
								CJOBRDatabaseConst::TABLE_JOB_TERMS					=> $this->_terms,
								CJOBRDatabaseConst::TABLE_JOB_COUNTRY_ID			=> 1,
								CJOBRDatabaseConst::TABLE_JOB_REGION_ID				=> $this->_idRegion,
								CJOBRDatabaseConst::TABLE_JOB_CITY_ID				=> $this->_idCity,
								CJOBRDatabaseConst::TABLE_JOB_MOVE_ANOTHER_CITY 	=> $this->_moveOtherCity,
								CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID 			=> $lIdCategory_arr[0],
								CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_2 		=> $lIdCategory_arr[1],
								CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_3 		=> $lIdCategory_arr[2],
								CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_4 		=> $lIdCategory_arr[3],
								CJOBRDatabaseConst::TABLE_JOB_CATEGORY_ID_5 		=> $lIdCategory_arr[4],
								CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID 		=> $lIdSubcategory_arr[0],
								CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_2 		=> $lIdSubcategory_arr[1],
								CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_3 		=> $lIdSubcategory_arr[2],
								CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_4 		=> $lIdSubcategory_arr[3],
								CJOBRDatabaseConst::TABLE_JOB_SUBCATEGORY_ID_5 		=> $lIdSubcategory_arr[4],
								CJOBRDatabaseConst::TABLE_JOB_AGE_MIN 				=> $this->_ageMin,
								CJOBRDatabaseConst::TABLE_JOB_AGE_MAX 				=> $this->_ageMax,
								CJOBRDatabaseConst::TABLE_JOB_LEVEL_EDUCATION 		=> $this->_levelEducation,
								CJOBRDatabaseConst::TABLE_JOB_TOTAL_WORK_EXPERIENCE => $this->_totalWorkExperience,
								CJOBRDatabaseConst::TABLE_JOB_SEX 					=> $this->_sex,
								CJOBRDatabaseConst::TABLE_JOB_EXPERIENCE 			=> $this->_experience,
								CJOBRDatabaseConst::TABLE_JOB_CONTACT_NAME 			=> $this->_contactName,
								CJOBRDatabaseConst::TABLE_JOB_PHONE_CODE			=> $this->_phoneCode,
								CJOBRDatabaseConst::TABLE_JOB_PHONE_NUMBER			=> $this->_phoneNumber,
								CJOBRDatabaseConst::TABLE_JOB_PHONE_ADDITIONAL		=> $this->_phoneAdditional,
								CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL_PHONE_CODE			=> $this->_additionalPhoneCode,
								CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL_PHONE_NUMBER		=> $this->_additionalPhoneNumber,
								CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL_PHONE_ADDITIONAL	=> $this->_additionalPhoneAdditional,
								CJOBRDatabaseConst::TABLE_JOB_EMAIL 				=> $this->_email,
								CJOBRDatabaseConst::TABLE_JOB_ICQ 					=> $this->_icq,
								CJOBRDatabaseConst::TABLE_JOB_SKYPE					=> $this->_skype,
								CJOBRDatabaseConst::TABLE_JOB_ADDITIONAL 			=> $this->_additional,
								CJOBRDatabaseConst::TABLE_JOB_TYPE_STORAGE			=> CValueTransmitConst::STORAGE_TYPE_PUBLIC,
								CJOBRDatabaseConst::TABLE_JOB_UPDATING_TIME 			=> $_lTime_int);

		$this->__fResult_str = $this->__customDatabaseController()->getVacancyDatabaseController()->updateData($this->__data()->param(CParamConst::ID), $lParams_arr);
		if (!$this->__fResult_str)
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_JOB_FAILED);
		}
		else
		{
			$this->__data()->addEvent(CJOBREventConst::EDIT_JOB_SUCCESS);
			$this->__data()->setRedirect(CPageConst::PAGE_JOB_ACCOUNT, CSiteConst::SITE_JOB, CSubpageConst::SUBPAGE_JOB_VACANCY);
		}
	}
}


?>
