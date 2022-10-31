<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCFooterSectionView extends CCSectionView
{
	//CSS...
	private const _CSS_SECTION							= 'css_page_footer_section';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*//*protected function __getSectionTag()
	{
		return 'footer';
	}*/

	/*override*/protected function __getSectionClasses():string
	{
		return self::_CSS_SECTION. ' ' .parent::__getSectionClasses();
	}

	/*override*/protected function __getSectionId():int
	{
		return CCViewConst::i_SECTION_ID_FOOTER;
	}
}


?>