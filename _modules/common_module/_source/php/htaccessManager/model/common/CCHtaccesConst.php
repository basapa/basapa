<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


/*abstract*/class CCHtaccesConst
{
	//STATIC...
	/*virtual*/static public function i_STATIC_GET_PARAMS_SEQUENCE():array
	{
		//TODO: optimize required
		return [CCRequestParamConst::i_GET_PARAM_ID_OPT_SUBPAGE,
				//CCRequestParamConst::i_GET_PARAM_ID_OPT_CATEGORY_ID,
				//CCRequestParamConst::i_GET_PARAM_ID_OPT_SUBCATEGORY_ID,
				CCRequestParamConst::i_GET_PARAM_ID_OPT_ACTION];
	}
	//...STATIC
}


?>