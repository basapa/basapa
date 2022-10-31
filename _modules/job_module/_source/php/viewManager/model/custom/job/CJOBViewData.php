<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBViewData extends CCViewData
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	//FORMS...
	/*override*/protected function __generateFormsMessagesData()
	{
		return new CJOBFormsMessagesData();
	}
	//...FORMS

	//COMPONENTS...
	//...COMPONENTS

	//SECTIONS IDS...
	/*override*/protected function __generateSectionsIds(string $aPageId_str):array
	{
		switch ($aPageId_str)
		{
			case CJOBPageConst::i_PAGE_ID_CONTENTS:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_HEADER,
											/*CCViewConst::i_SECTION_ID_RIGHT,*/
											CCViewConst::i_SECTION_ID_LEFT,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CJOBPageConst::i_PAGE_ID_CONTENT:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_HEADER,
											CCViewConst::i_SECTION_ID_RIGHT,
											CCViewConst::i_SECTION_ID_LEFT,
											CCViewConst::i_SECTION_ID_PRE_CONTENT,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_POST_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			case CJOBPageConst::i_PAGE_ID_ADMINISTRATION:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_HEADER,
											CCViewConst::i_SECTION_ID_PRE_CONTENT,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_POST_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;

			/*case CJOBPageConst::i_PAGE_ID_SUPPORT:
			case CJOBPageConst::i_PAGE_ID_USER_REGISTRATION:
			case CJOBPageConst::i_PAGE_ID_PAYMENT:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_HEADER,
											CCViewConst::i_SECTION_ID_PRE_CONTENT,
											CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;*/
			
			/*case CJOBPageConst::i_PAGE_ID_ERROR_404:
			{
				$lSectionsIds_int_arr	= [	CCViewConst::i_SECTION_ID_CONTENT,
											CCViewConst::i_SECTION_ID_FOOTER];
			}break;*/

			default:
				$lSectionsIds_int_arr = parent::__generateSectionsIds($aPageId_str);
			break;
		}

		return $lSectionsIds_int_arr;
	}

	/*override*/protected function __generateMainPageSectionsIds():array
	{
		return [CCViewConst::i_SECTION_ID_HEADER,
				CCViewConst::i_SECTION_ID_CONTENT,
				CCViewConst::i_SECTION_ID_FOOTER];
	}
	//...SECTIONS IDS

	//PAGES CSS CLASSES...
	/*override*/protected function __generatePageCSSClass(string $aPageId_str):string
	{
		switch ($aPageId_str)
		{
			case CJOBPageConst::i_PAGE_ID_CONTENTS:
			{
				$lPageCSSClass_str = 'css_job_contents_page ';
			}break;

			case CJOBPageConst::i_PAGE_ID_CONTENT:
			{
				$lPageCSSClass_str = 'css_job_content_page ';
			}break;

			case CJOBPageConst::i_PAGE_ID_ADMINISTRATION:
			{
				$lPageCSSClass_str = 'css_job_administration_page ';
			}break;

			/*case CJOBPageConst::i_PAGE_ID_USER_REGISTRATION:
			{
				$lPageCSSClass_str = 'css_user_registration_page ';
			}break;

			case CJOBPageConst::i_PAGE_ID_SUPPORT:
			{
				$lPageCSSClass_str = 'css_support_page ';
			}break;*/

			/*case CJOBPageConst::i_PAGE_ID_ERROR_404:
			{
				$lPageCSSClass_str = 'css_error_404_page ';
			}break;*/

			/*case CJOBPageConst::i_PAGE_ID_PAYMENT:
			{
				$lPageCSSClass_str = 'css_payment_page ';
			}break;*/

			default:
				$lPageCSSClass_str = parent::__generatePageCSSClass($aPageId_str);
			break;
		}

		return $lPageCSSClass_str;
	}

	/*override*/protected function __generateMainPageCSSClass():string
	{
		return 'css_job_main_page ' .parent::__generateMainPageCSSClass();
	}
	//...PAGES CSS CLASSES
}


?>