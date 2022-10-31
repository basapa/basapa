<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:3
*/
namespace basapa_ns;


final class CJOBComponentsView extends CCComponentsView
{
	/***************************************************
	 * INTERFACE
	 */

	/**@return CJOBComponentsView*/
	static public function i_toClassType(&$a_clss)
	{
		return $a_clss;
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*override*/protected function __generateCompositeComponentsView($aCComponentsView_clss)
	{
		return new CJOBCompositeComponentsView($aCComponentsView_clss);
	}
}


?>