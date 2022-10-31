<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CMScheduleConst extends CCScheduleConst
{
	/****************************************************
	 * ACTIONS
	 */
	//const ACTION_CONFIRM_VERIFICATION_KEY				= 'confirm_verification_key';
	public const i_ACTION_SET_DEACTIVATED_STATE			= 'set_deactivated_state';
	public const i_ACTION_ADD_DATA_TO_SITEMAP			= 'add_data_to_sitemap';
	public const i_ACTION_GENERATE_DATA_TO_SITEMAP		= 'generate_data_to_sitemap';


	/****************************************************
	 * TIME LABELS
	 */
	public const i_TIME_LABEL_SITEMAP_UPDATING			= 4;


	/****************************************************
	 * PARAMS
	 */


	/********************************************************************************************************
	 * COMMON REQUESTS
	 */
	public const i_REQUEST_USER							= 'request_user';

	public static $i_COMMON_REQUESTS					= [CScheduleConst::i_REQUEST_USER];


	/********************************************************************************************************
	 * CUSTOM JOB REQUESTS
	 */
	public const i_REQUEST_JOB_VACANCY					= 'request_job_vacancy';
	public const i_REQUEST_JOB_RESUME					= 'request_job_rezume';
	public const i_REQUEST_JOB_COMPANY					= 'request_job_company';
	public const i_REQUEST_JOB_ADVERTISEMENT			= 'request_job_advertisement';

	public static $i_CUSTOM_JOB_REQUESTS				= [	CScheduleConst::i_REQUEST_JOB_VACANCY,
															CScheduleConst::i_REQUEST_JOB_RESUME,
															CScheduleConst::i_REQUEST_JOB_COMPANY,
															CScheduleConst::i_REQUEST_JOB_ADVERTISEMENT];
}


?>