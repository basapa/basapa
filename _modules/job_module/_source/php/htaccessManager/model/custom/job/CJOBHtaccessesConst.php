<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBHtaccesConst extends CCHtaccesConst
{
	//STATIC...
	/*override*/static public function i_STATIC_GET_PARAMS_SEQUENCE():array
	{
		//TODO: optimize required
		return [CJOBRequestParamConst::i_GET_PARAM_ID_OPT_SUBPAGE,
				CJOBRequestParamConst::i_GET_PARAM_ID_OPT_REGION_STRING_ID,
				CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CITY_STRING_ID,
				CJOBRequestParamConst::i_GET_PARAM_ID_OPT_ACTION,
				CJOBRequestParamConst::i_GET_PARAM_ID_OPT_CONTENT_ID];
	}
	//...STATIC
}


?>