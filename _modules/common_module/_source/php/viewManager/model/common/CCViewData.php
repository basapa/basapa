<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*virtual*/class CCViewData
{
	private $_fSectionsIds_int_arr_arr;
	private $_fPagesCSSClasses_str_arr;

	private $_fFormsMessagesData_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getSectionsIds(string $aPageId_str):array
	{
		return $this->_getSectionsIds($aPageId_str);
	}

	public function i_getPageClass(string $aPageId_str):string
	{
		return $this->_getPageCSSClass($aPageId_str);
	}

	public function i_getFormsMessagesData()
	{
		return $this->_getFormsMessagesData();
	}

	/*
	 * INTERFACE
	 ***************************************************/
	 
	/*virtual*//*protected function __init():void
	{
	}*/

	//FORMS...
	private function _getFormsMessagesData()
	{
		return $this->_fFormsMessagesData_clss ?? ($this->_fFormsMessagesData_clss = $this->__generateFormsMessagesData());
	}

	/*virtual*/protected function __generateFormsMessagesData()
	{
		return new CCFormsMessagesData();
	}
	//...FORMS

	//SECTIONS IDS...
	private function _getSectionsIds(string $aPageId_str):array
	{
		return $this->_fSectionsIds_int_arr_arr[$aPageId_str] ?? $this->_initSectionsIds($aPageId_str);
	}

	private function _initSectionsIds(string $aPageId_str):array
	{
		$lSectionsIds_int_arr = $this->__generateSectionsIds($aPageId_str);
		$this->_fSectionsIds_int_arr_arr[$aPageId_str] = $lSectionsIds_int_arr;
		return $lSectionsIds_int_arr;
	}

	/*virtual*/protected function __generateSectionsIds(string $aPageId_str):array
	{
		$lSectionsIds_int_arr = null;

		switch ($aPageId_str)
		{
			case CCPageConst::i_PAGE_ID_ACCESS_ERROR:
			case CCPageConst::i_PAGE_ID_ACCESS_PROHIBITION:
			case CCPageConst::i_PAGE_ID_ACCESS_REQUIREMENT:
			case CCPageConst::i_PAGE_ID_ACCESS_RESTRICTION:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CCPageConst::i_PAGE_ID_DEBUG:
			{
				$lSectionsIds_int_arr	= [CCViewConst::i_SECTION_ID_HEADER,
											CCViewConst::i_SECTION_ID_PRE_CONTENT,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_POST_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_403:
			case CCPageConst::i_PAGE_ID_ERROR_404:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CCPageConst::i_PAGE_ID_USER_AUTHORIZATION:
			case CCPageConst::i_PAGE_ID_USER_REGISTRATION:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CCPageConst::i_PAGE_ID_SUPPORT:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_HEADER,
											CCViewConst::i_SECTION_ID_PRE_CONTENT,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_POST_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CCPageConst::i_PAGE_ID_MAIN:
			{
				$lSectionsIds_int_arr = $this->__generateMainPageSectionsIds();
			}break;

			case CCPageConst::i_PAGE_ID_EXTERNAL_REDIRECT:
			{
				$lSectionsIds_int_arr	= [CCViewConst::i_SECTION_ID_HEADER,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			default:
				new CException('__generateSectionsIds', 'Invalid page id: ' .$aPageId_str);
			break;
		}

		return $lSectionsIds_int_arr;
	}

	/*virtual*/protected function __generateMainPageSectionsIds():array
	{
		return [CCViewConst::i_SECTION_ID_HEADER,
				CCViewConst::i_SECTION_ID_RIGHT,
				CCViewConst::i_SECTION_ID_LEFT,
				CCViewConst::i_SECTION_ID_PRE_CONTENT,
				CCViewConst::i_SECTION_ID_CONTENT,
				CCViewConst::i_SECTION_ID_POST_CONTENT,
				CCViewConst::i_SECTION_ID_FOOTER];
	}
	//...SECTIONS IDS

	//PAGES CSS CLASSES...
	private function _getPageCSSClass(string $aPageId_str):string
	{
		return $this->_fPagesCSSClasses_str_arr[$aPageId_str] ?? $this->_initPageCSSClass($aPageId_str);
	}

	private function _initPageCSSClass(string $aPageId_str):string
	{
		$lPageCSSClass_str = $this->__generatePageCSSClass($aPageId_str);
		$lPageCSSClass_str .= ' css_page';
		$this->_fPagesCSSClasses_str_arr[$aPageId_str] = $lPageCSSClass_str;
		return $lPageCSSClass_str;
	}

	/*virtual*/protected function __generatePageCSSClass(string $aPageId_str):string
	{
		$lPageCSSClass_str = '';

		switch ($aPageId_str)
		{
			case CCPageConst::i_PAGE_ID_ACCESS_ERROR:
			{
				$lPageCSSClass_str = 'css_access_error_page ';
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_PROHIBITION:
			{
				$lPageCSSClass_str = 'css_access_prohibition_page ';
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lPageCSSClass_str = 'css_access_requirement_page ';
			}break;

			case CCPageConst::i_PAGE_ID_ACCESS_RESTRICTION:
			{
				$lPageCSSClass_str = 'css_access_restriction_page ';
			}break;

			case CCPageConst::i_PAGE_ID_DEBUG:
			{
				$lPageCSSClass_str = 'css_debug_page ';
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_403:
			{
				$lPageCSSClass_str = 'css_error_403_page ';
			}break;

			case CCPageConst::i_PAGE_ID_ERROR_404:
			{
				$lPageCSSClass_str = 'css_error_404_page ';
			}break;

			case CCPageConst::i_PAGE_ID_USER_AUTHORIZATION:
			{
				$lPageCSSClass_str = 'css_user_authorization_page ';
			}break;

			case CCPageConst::i_PAGE_ID_USER_REGISTRATION:
			{
				$lPageCSSClass_str = 'css_user_registration_page ';
			}break;

			case CCPageConst::i_PAGE_ID_SUPPORT:
			{
				$lPageCSSClass_str = 'css_support_page ';
			}break;

			case CCPageConst::i_PAGE_ID_MAIN:
			{
				$lPageCSSClass_str = $this->__generateMainPageCSSClass();
			}break;

			case CCPageConst::i_PAGE_ID_EXTERNAL_REDIRECT:
			{
				$lPageCSSClass_str = 'css_external_redirect_page ';
			}break;

			default:
				new CException('__generatePageCSSClass', 'Invalid page id: ' .$aPageId_str);
			break;
		}

		return $lPageCSSClass_str;
	}

	/*virtual*/protected function __generateMainPageCSSClass():string
	{
		return 'css_main_page ';
	}
	//...PAGES CSS CLASSES
}


?>