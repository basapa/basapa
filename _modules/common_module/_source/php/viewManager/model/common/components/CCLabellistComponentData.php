<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


class CCLabellistComponentData
{
	private $_fPageNavigationData_clss_arr;
	private $_fAdditionalPageNavigationData_clss_arr;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/
	
	/***************************************************
	 * INTERFACE
	 */
	
	/*
	public function getPageNavigationData()
	{
		return $this->_getPageNavigationData();
	}


	public function getAdditionalPageNavigationData()
	{
		return $this->_geAdditionalPageNavigationData();
	}*/


	/*
	 * INTERFACE
	 ***************************************************/
	 
	/*private function _init():void
	{
	}*/

	//PAGE NAVIGATION DATA...
	/*private function _getPageNavigationData()
	{
		return isset($this->_fPageNavigationData_clss_arr) ? $this->_fPageNavigationData_clss_arr : $this->_initPageNavigationData();
	}
	
	
	private function _initPageNavigationData()
	{
		$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_MAIN);
		$lParams_obj_arr	= array(CLabellistComponentItem::PARAM_NAME			=> CNamePageConst::PAGE_MAIN,
									CLabellistComponentItem::PARAM_HREF			=> CURLConversion::generateURLByParams($lURLStaticParams_obj_arr),
									CLabellistComponentItem::PARAM_STATE		=> CLabellistComponentItem::PARAM_STATE_ENABLED,
									CLabellistComponentItem::PARAM_IS_VISIBLE	=> true);
		$l_clss_arr[] = new CLabellistComponentItem($lParams_obj_arr);

		$this->_fPageNavigationData_clss_arr = $l_clss_arr;
		return $l_clss_arr;
	}
	//...PAGE NAVIGATION DATA


	//ADDITIONAL PAGE NAVIGATION DATA...
	private function _geAdditionalPageNavigationData()
	{
		return isset($this->_fAdditionalPageNavigationData_clss_arr) ? $this->_fAdditionalPageNavigationData_clss_arr : $this->_initAdditionalPageNavigationData();
	}


	private function _initAdditionalPageNavigationData()
	{
		$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_REQUIREMENTS);
		$lParams_obj_arr	= array(CLabellistComponentItem::PARAM_NAME			=> CNamePageConst::PAGE_REQUIREMENTS,
									CLabellistComponentItem::PARAM_HREF			=> CURLConversion::generateURLByParams($lURLStaticParams_obj_arr),
									CLabellistComponentItem::PARAM_STATE		=> CLabellistComponentItem::PARAM_STATE_ENABLED,
									CLabellistComponentItem::PARAM_IS_VISIBLE	=> true);
		$l_clss_arr[] = new CLabellistComponentItem($lParams_obj_arr);

		$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID	=> CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID	=> CPageConst::PAGE_ID_SUPPORT);
		$lParams_obj_arr	= array(CLabellistComponentItem::PARAM_NAME			=> CNamePageConst::PAGE_SUPPORT,
									CLabellistComponentItem::PARAM_HREF			=> CURLConversion::generateURLByParams($lURLStaticParams_obj_arr),
									CLabellistComponentItem::PARAM_STATE		=> CLabellistComponentItem::PARAM_STATE_ENABLED,
									CLabellistComponentItem::PARAM_IS_VISIBLE	=> true);
		$l_clss_arr[] = new CLabellistComponentItem($lParams_obj_arr);

		$this->_fAdditionalPageNavigationData_clss_arr = $l_clss_arr;
		return $l_clss_arr;
	}
	//...ADDITIONAL PAGE NAVIGATION DATA*/
}


?>
