<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCUserAuthorizationPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawContentSection():void
	{
		$lSiteId_str = $this->__getMainData()->i_getGetParamSiteId();

		$this->__getModulesView()->i_getFormsView()->i_getFormsView($lSiteId_str)->i_getUserAuthorizationFormView()->i_draw();
	}
}


?>