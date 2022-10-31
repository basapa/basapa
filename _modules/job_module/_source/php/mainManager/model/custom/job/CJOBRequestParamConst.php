<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBRequestParamConst extends CCRequestParamConst
{
	//JS PHP AGREEMENTS...
	public const i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS		= 'addition_time_filters';
	public const i_GET_PARAM_ID_OPT_WAGE_FILTERS				= 'wage_filters';
	public const i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS		= 'work_experience_filters';
	public const i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS		= 'work_schedule_filters';

	//public const i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID		= 'category_string_id';
	//public const i_GET_PARAM_ID_OPT_SUBCATEGORY_STRING_ID	= 'subcategory_string_id';


	//STATIC...
	/*override*/static public function i_GET_PARAMS_UNDEFINED_VALUES():array
	{
		//TODO: optimize required
		return CArrayTools::i_merge(parent::i_GET_PARAMS_UNDEFINED_VALUES(), [	self::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS		=> '0',
																				self::i_GET_PARAM_ID_OPT_WAGE_FILTERS				=> '0',
																				self::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS	=> 'ALL',
																				self::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS		=> 'ALL']);
	}

	/*override*//*static public function i_STATIC_GET_PARAMS():array
	{
		//TODO: optimize required
		return CArrayTools::i_merge(parent::i_STATIC_GET_PARAMS(), [self::i_GET_PARAM_ID_OPT_CATEGORY_STRING_ID, self::i_GET_PARAM_ID_OPT_SUBCATEGORY_STRING_ID]);
	}*/

	/*override*/static public function i_DYNAMIC_GET_PARAMS():array
	{
		//TODO: optimize required
		return CArrayTools::i_merge(parent::i_DYNAMIC_GET_PARAMS(), [	self::i_GET_PARAM_ID_OPT_ADDITION_TIME_FILTERS,
																		self::i_GET_PARAM_ID_OPT_WAGE_FILTERS,
																		self::i_GET_PARAM_ID_OPT_WORK_EXPERIENCE_FILTERS,
																		self::i_GET_PARAM_ID_OPT_WORK_SCHEDULE_FILTERS]);
	}
	//...STATIC
	//...JS PHP AGREEMENTS
}


?>