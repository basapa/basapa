<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CMDatabaseConst extends CCDatabaseConst
{
	/****************************************************
	 * Common database types
	 */
	//const TYPE_COMMON_DATA								= 0;
	//const TYPE_COMMON_DATA_BY_ID						= 1;
	//const TYPE_COMMON_DATA_BY_TYPE						= 2;
	//const TYPE_COMMON_DATA_BY_STATE						= 3;
	//const TYPE_COMMON_DATA_BY_USER_ID					= 4;
	//const TYPE_COMMON_DATA_COUNT						= 5;
	//const TYPE_COMMON_UNIQUE_DATA						= 6;
	//const TYPE_COMMON_DATA_COUNT_BY_STATES				= 7;
	

	/****************************************************
	 * Common tables
	 */
	//const TABLE_USER									= 'users';
	//const TABLE_CITY									= 'cities';								//optional
	//const TABLE_REGION								= 'regions';							//optional
	//const TABLE_COUNTRY								= 'countries';							//optional


	/****************************************************
	 * Common table elements
	 */
	//const COMMON_TABLE_ID										= 'id';									//smallint(5)
	/*const COMMON_TABLE_SEO										= 'seo';								//char(32)
	const COMMON_TABLE_TRANSLIT									= 'translit';							//char(128)
	const COMMON_TABLE_URL_NAME									= 'URL_name';							//char(255)
	const COMMON_TABLE_NAME										= 'name';								//char(8-64)
	const COMMON_TABLE_EMAIL									= 'email';								//char(64)
	const COMMON_TABLE_ICQ										= 'icq';								//char(16)
	const COMMON_TABLE_SKYPE									= 'skype';								//char(32)
	const COMMON_TABLE_SITE										= 'site';								//char(32)
	const COMMON_TABLE_COUNTRY_ID								= 'country_id';							//smallint(5)
	const COMMON_TABLE_REGION_ID								= 'region_id';							//smallint(5)
	const COMMON_TABLE_CITY_ID									= 'city_id';							//smallint(5)
	const COMMON_TABLE_MOVE_ANOTHER_CITY						= 'move_another_city';					//tinyint(3)
	const COMMON_TABLE_ADDRESS									= 'address';							//char(64)
	const COMMON_TABLE_ADDRESS_ADDITIONAL						= 'address_additional';					//char(32)
	const COMMON_TABLE_PHONE_CODE								= 'phone_code';							//mediumint(8)
	const COMMON_TABLE_PHONE_NUMBER								= 'phone_number';						//char(16)
	const COMMON_TABLE_PHONE_ADDITIONAL							= 'phone_additional';					//char(32)
	const COMMON_TABLE_CATEGORY_ID								= 'category_id';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_2							= 'category_id_2';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_3							= 'category_id_3';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_4							= 'category_id_4';						//smallint(5)
	const COMMON_TABLE_CATEGORY_ID_5							= 'category_id_5';						//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID							= 'subcategory_id';						//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_2							= 'subcategory_id_2';					//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_3							= 'subcategory_id_3';					//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_4							= 'subcategory_id_4';					//smallint(5)
	const COMMON_TABLE_SUBCATEGORY_ID_5							= 'subcategory_id_5';					//smallint(5)*/

	/*const COMMON_TABLE_TYPE										= 'type';								//tinyint(3)
	const COMMON_TABLE_PREV_TYPE								= 'prev_type';							//tinyint(3)
	const COMMON_TABLE_STATE									= 'state';								//tinyint(3)
	const COMMON_TABLE_PREV_STATE								= 'prev_state';							//tinyint(3)
	const COMMON_TABLE_STATUS									= 'status';								//tinyint(3)
	const COMMON_TABLE_PREV_STATUS								= 'prev_status';						//tinyint(3)
	const COMMON_TABLE_USER_ID									= 'user_id';							//smallint(5)
	const COMMON_TABLE_RELEASE_TIME								= 'release_time';						//int(10)
	const COMMON_TABLE_UPDATING_TIME							= 'updating_time';						//int(10)
	const COMMON_TABLE_EDITING_TIME								= 'editing_time';						//int(10)
	const COMMON_TABLE_EXPIRING_TIME							= 'expiring_time';						//int(10)
	const COMMON_TABLE_STATE_EXPIRING_TIME						= 'state_expiring_time';				//int(10)
	const COMMON_TABLE_STATE_UPDATING_TIME						= 'state_updating_time';				//int(10)
	const COMMON_TABLE_STATUS_EXPIRING_TIME						= 'status_expiring_time';				//int(10)
	const COMMON_TABLE_STATUS_UPDATING_TIME						= 'status_updating_time';				//int(10)
	const COMMON_TABLE_TYPE_UPDATING_TIME						= 'type_updating_time';					//int(10)
	const COMMON_TABLE_VIEWS									= 'views';								//smallint(5)*/


	/****************************************************
	 * Additional table elements
	 */
	/*const ADDITIONAL_TABLE_COUNT									= 'count';
	const ADDITIONAL_TABLE_STATE_EMAIL_VERIFICATION_WAITING_COUNT	= 'state_email_verification_waiting_count';
	const ADDITIONAL_TABLE_STATE_ACTIVATED_COUNT					= 'state_activated_count';
	const ADDITIONAL_TABLE_STATE_DEACTIVATED_COUNT					= 'state_deactivated_count';
	const ADDITIONAL_TABLE_STATE_MODERATION_WAITING_COUNT			= 'state_moderation_waiting_count';
	const ADDITIONAL_TABLE_STATE_BANNED_COUNT						= 'state_banned_count';
	const ADDITIONAL_TABLE_STATE_BLOCKED_COUNT						= 'state_blocked_count';
	const ADDITIONAL_TABLE_STATE_DELETED_COUNT						= 'state_deleted_count';
	const ADDITIONAL_TABLE_STATE_DELETION_WAITING_COUNT				= 'state_deletion_waiting_count';*/


	/****************************************************
	 * USER
	 */
	/*const TABLE_USER_ID											= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_USER_LOGIN										= 'login';												//char(16)
	const TABLE_USER_PASSWORD									= 'password';											//char(48)
	const TABLE_USER_EMAIL										= CDatabaseConst::COMMON_TABLE_EMAIL;					//char(32)
	const TABLE_USER_LAST_VISIT_TIME							= 'last_visit_time';									//int(10)
	const TABLE_USER_PASSWORD_KEY								= 'password_key';										//char(48)
	const TABLE_USER_HASH										= 'hash';												//char(48)
	const TABLE_USER_IP_ADDRESS									= 'ip_address';											//int(10)

	const TABLE_USER_JOB_USER_ID								= 'job_user_id';										//smallint(5) (not used)

	const TABLE_USER_VERIFICATION_KEY							= 'verification_key';									//char(48)
	const TABLE_USER_VERIFICATION_KEY_RELEASE_TIME				= 'verification_key_release_time';						//int(10)
	const TABLE_USER_VERIFICATION_KEY_EXPIRING_TIME				= 'verification_key_expire_time';						//int(10)

	const TABLE_USER_RELEASE_TIME								= CDatabaseConst::COMMON_TABLE_RELEASE_TIME;
	const TABLE_USER_UPDATING_TIME								= CDatabaseConst::COMMON_TABLE_UPDATING_TIME;
	const TABLE_USER_EDITING_TIME								= CDatabaseConst::COMMON_TABLE_EDITING_TIME;
	const TABLE_USER_TYPE										= CDatabaseConst::COMMON_TABLE_TYPE;
	const TABLE_USER_PREV_TYPE									= CDatabaseConst::COMMON_TABLE_PREV_TYPE;
	const TABLE_USER_STATE										= CDatabaseConst::COMMON_TABLE_STATE;
	const TABLE_USER_PREV_STATE									= CDatabaseConst::COMMON_TABLE_PREV_STATE;
	const TABLE_USER_STATUS										= CDatabaseConst::COMMON_TABLE_STATUS;
	const TABLE_USER_PREV_STATUS								= CDatabaseConst::COMMON_TABLE_PREV_STATUS;
	const TABLE_USER_STATE_EXPIRING_TIME						= CDatabaseConst::COMMON_TABLE_STATE_EXPIRING_TIME;
	const TABLE_USER_STATE_UPDATING_TIME						= CDatabaseConst::COMMON_TABLE_STATE_UPDATING_TIME;
	const TABLE_USER_STATUS_EXPIRING_TIME						= CDatabaseConst::COMMON_TABLE_STATUS_EXPIRING_TIME;
	const TABLE_USER_STATUS_UPDATING_TIME						= CDatabaseConst::COMMON_TABLE_STATUS_UPDATING_TIME;
	const TABLE_USER_TYPE_UPDATING_TIME							= CDatabaseConst::COMMON_TABLE_TYPE_UPDATING_TIME;
	const TABLE_USER_VIEWS										= CDatabaseConst::COMMON_TABLE_VIEWS;
*/

	/****************************************************
	 * CITY
	 */
	/*const TABLE_CITY_ID											= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_CITY_TRANSLIT									= CDatabaseConst::COMMON_TABLE_TRANSLIT;				//char(32)
	const TABLE_CITY_SEO										= CDatabaseConst::COMMON_TABLE_SEO;						//char(32)

	const TABLE_CITY_NAME										= CDatabaseConst::COMMON_TABLE_NAME;					//char(32)
	const TABLE_CITY_REGION_ID									= CDatabaseConst::COMMON_TABLE_REGION_ID;
	const TABLE_CITY_COUNTRY_ID									= CDatabaseConst::COMMON_TABLE_COUNTRY_ID;

	const TABLE_CITY_TYPE										= CDatabaseConst::COMMON_TABLE_TYPE;
	const TABLE_CITY_STATE										= CDatabaseConst::COMMON_TABLE_STATE;
*/
	
	/****************************************************
	 * REGION
	 */
	/*const TABLE_REGION_ID										= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_REGION_TRANSLIT									= CDatabaseConst::COMMON_TABLE_TRANSLIT;				//char(32)
	const TABLE_REGION_SEO										= CDatabaseConst::COMMON_TABLE_SEO;						//char(32)

	const TABLE_REGION_NAME										= CDatabaseConst::COMMON_TABLE_NAME;					//char(32)
	const TABLE_REGION_COUNTRY_ID								= CDatabaseConst::COMMON_TABLE_COUNTRY_ID;

	const TABLE_REGION_STATE									= CDatabaseConst::COMMON_TABLE_STATE;
	*/
	
	/****************************************************
	 * COUNTRY
	 */
	/*const TABLE_COUNTRY_ID										= CDatabaseConst::COMMON_TABLE_ID;
	const TABLE_COUNTRY_TRANSLIT								= CDatabaseConst::COMMON_TABLE_TRANSLIT;				//char(32)
	const TABLE_COUNTRY_SEO										= CDatabaseConst::COMMON_TABLE_SEO;						//char(32)

	const TABLE_COUNTRY_NAME									= CDatabaseConst::COMMON_TABLE_NAME;					//char(32)

	const TABLE_COUNTRY_STATE									= CDatabaseConst::COMMON_TABLE_STATE;*/
}


?>