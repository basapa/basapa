<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMRequestConst extends CCRequestConst
{
	const i_REQUEST_ID_LOGIN									= 'request_0';
	const i_REQUEST_ID_REGISTRATION							= 'request_3';
	const i_REQUEST_ID_LOGOUT									= 'request_5';
	const i_REQUEST_ID_AUTHORIZATION							= 'request_6';
	const i_REQUEST_ID_SELECT_CITY							= 'request_7';

	public static $i_AVAILABLE_COMMON_REQUESTS				= array(CMRequestConst::i_REQUEST_ID_LOGIN,
																	CMRequestConst::i_REQUEST_ID_AUTHORIZATION,
																	CMRequestConst::i_REQUEST_ID_REGISTRATION/*,
																	CRequestConst::REQUEST_ID_SEARCH,
																	CRequestConst::REQUEST_ID_RECOVERY_PASSWORD,
																	CRequestConst::REQUEST_ID_LOGOUT,
																	CRequestConst::REQUEST_ID_SUPPORT,
																	CRequestConst::REQUEST_ID_SELECT_CITY,
																	CRequestConst::REQUEST_ID_USER,
																	CRequestConst::REQUEST_ID_USER_SETTINGS_CHANGE_PASSWORD,
																	CRequestConst::REQUEST_ID_USER_SETTINGS_CHANGE_EMAIL,
																	CRequestConst::REQUEST_ID_ADMIN_EDIT_USER_STATE*/);
}


?>