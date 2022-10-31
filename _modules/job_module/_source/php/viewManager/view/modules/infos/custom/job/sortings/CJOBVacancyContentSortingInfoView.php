<?php


//include_once(ROOT_PHP_DIRECTORY. 'viewManager/view/modules/infos/custom/job/sortings/CJOBRParentSortingInfo.php');


final class CJOBContentSortingInfoView //extends CJOBRParentSortingInfo
{
	/***************************************************
	 * PUBLIC
	 */

	/*
	 * PUBLIC
	 ***************************************************/


	protected function __bodyContent()
	{
		$lStaticParams_arr 	= array(CParamConst::SITE 	=> CSiteConst::SITE_JOB,
									CParamConst::PAGE 	=> CPageConst::PAGE_JOB_VACANCIES);

		$lCommonDynamicParams_arr 	= array(CParamConst::SEARCHING_CITY 					=> $this->__data()->param(CParamConst::SEARCHING_CITY),
											CParamConst::SEARCHING_REGION 					=> $this->__data()->param(CParamConst::SEARCHING_REGION),
											CParamConst::SEARCHING_CATEGORY 				=> $this->__data()->param(CParamConst::SEARCHING_CATEGORY),
											CParamConst::SEARCHING_NAME 					=> $this->__data()->param(CParamConst::SEARCHING_NAME),
											CParamConst::SEARCHING_PAY_MIN 					=> $this->__data()->param(CParamConst::SEARCHING_PAY_MIN),
											CParamConst::SEARCHING_PAY_MAX 					=> $this->__data()->param(CParamConst::SEARCHING_PAY_MAX),
											CParamConst::SEARCHING_AGREEMENT 				=> $this->__data()->param(CParamConst::SEARCHING_AGREEMENT),
											CParamConst::SEARCHING_TYPE_WORK 				=> $this->__data()->param(CParamConst::SEARCHING_TYPE_WORK),
											CParamConst::SEARCHING_LEVEL_EDUCATION 			=> $this->__data()->param(CParamConst::SEARCHING_LEVEL_EDUCATION),
											CParamConst::SEARCHING_TOTAL_WORK_EXPERIENCE 	=> $this->__data()->param(CParamConst::SEARCHING_TOTAL_WORK_EXPERIENCE),
											CParamConst::SEARCHING_SEX 						=> $this->__data()->param(CParamConst::SEARCHING_SEX),
											CParamConst::LEAF								=> $this->__data()->param(CParamConst::LEAF));

		//release
		$lSorting_str = $this->__data()->param(CParamConst::SORTING_RELEASE_TIME);
		$lDynamicParams_arr = $lCommonDynamicParams_arr;
		$lDynamicParams_arr[CParamConst::SORTING_RELEASE_TIME] = $this->__sortingType($lSorting_str);
		$lElements_arr[]	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> 'Добавлена',
									CComponentParam::ELEMENT_PARAM_HREF		=> CUrlConversion::getRealUrlByParams($lStaticParams_arr, $lDynamicParams_arr),
									CComponentParam::ELEMENT_PARAM_ICON		=> $this->__sortingIcon($lSorting_str),
									CComponentParam::ELEMENT_PARAM_STYLE	=> 'width:80px;');

		//pays
		$lSorting_str = $this->__data()->param(CParamConst::SORTING_PAY_MIN);
		$lDynamicParams_arr = $lCommonDynamicParams_arr;
		$lDynamicParams_arr[CParamConst::SORTING_PAY_MIN] = $this->__sortingType($lSorting_str);
		$lElements_arr[]	= array(CComponentParam::ELEMENT_PARAM_NAME 	=> 'Зарплата',
									CComponentParam::ELEMENT_PARAM_HREF		=> CUrlConversion::getRealUrlByParams($lStaticParams_arr, $lDynamicParams_arr),
									CComponentParam::ELEMENT_PARAM_ICON		=> $this->__sortingIcon($lSorting_str),
									CComponentParam::ELEMENT_PARAM_STYLE	=> 'width:200px;');

		$lParams_arr	= array(CComponentParam::SORTING_LIST_ELEMENTS		=> $lElements_arr);
		$this->__components()->listsComponents()->sortingListComponent()->draw($lParams_arr);
	}
}


?>
