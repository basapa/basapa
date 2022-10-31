<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCExternalRedirectPageSectionView extends CCPageSectionView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __drawContentSection():void
	{
		$this->__getInfosView()->i_getExternalRedirectInfoView()->i_draw();
	}
}


?>