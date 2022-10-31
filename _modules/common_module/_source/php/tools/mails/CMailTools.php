<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CMailTools
{
	//PARAMS...
	//COMMON...
	public const i_MAIL_PARAM_ID_EMAIL_FROM				= 'email_from';
	public const i_MAIL_PARAM_ID_EMAIL_TO				= 'email_to';
	public const i_MAIL_PARAM_ID_NAME_FROM				= 'name_from';
	public const i_MAIL_PARAM_ID_NAME_TO				= 'name_to';
	public const i_MAIL_PARAM_ID_TITLE					= 'title';
	public const i_MAIL_PARAM_ID_BODY_DATA				= 'body_data';
	public const i_MAIL_PARAM_ID_OPT_IS_HTML_MODE		= 'opt_is_html_mode';
	public const i_MAIL_PARAM_ID_OPT_ENCODING_TYPE		= 'opt_encoding_type';
	//...COMMON
	
	//SMTP...
	/*public const i_SMTP_MAIL_PARAM_ID_HOST				= 'smtp_host';
	public const i_SMTP_MAIL_PARAM_ID_PORT				= 'smtp_port';
	public const i_SMTP_MAIL_PARAM_ID_SECURE_MODE		= 'smtp_secure_mode';
	public const i_SMTP_MAIL_PARAM_ID_LOGIN				= 'smtp_login';
	public const i_SMTP_MAIL_PARAM_ID_PASSWORD			= 'smtp_password';*/
	//...SMTP
	//...PARAMS
	
	//BODY DATA...
	public const i_MAIL_BODY_DATA_TEXT					= 'text';
	public const i_MAIL_BODY_DATA_FILE					= 'file';
	//...BODY DATA
	
	//ENCODING TYPES...
	public const i_MAIL_ENCODING_TYPE_UTF_8				= CMainConst::i_DEFAULT_ENCODING_TYPE;
	public const i_MAIL_ENCODING_TYPE_WINDOWS_1251		= CMainConst::i_ENCODING_TYPE_WINDOWS_1251;
	//...ENCODING TYPES
	
	//SMTP...
	//HOSTS...
	/*public const i_SMTP_HOST_TYPE_YANDEX				= 'smtp.yandex.ru';
	//...HOSTS
	
	//PORTS...
	public const i_SMTP_PORT_TYPE_SECURE				= 465;
	//...PORTS
	
	//SECURE MODES...
	public const i_SMTP_SECURE_MODE_SSL					= 'ssl';*/
	//...SECURE MODES
	//...SMTP
	
	//CONTENT TYPES (do not modify)...
	private const _BODY_CONTENT_TYPE_PLAIN_TEXT			= 'text/plain';
	private const _BODY_CONTENT_TYPE_HTML_TEXT			= 'text/html';
	private const _BODY_CONTENT_TYPE_MULTIPART_MIXED	= 'multipart/mixed';
	private const _BODY_CONTENT_TYPE_APPLICATION_STREAM	= 'application/octet-stream';
	//...CONTENT TYPES (do not modify)

	private const _SUPPORTED_MAIL_ENCODING_TYPES		= [	self::i_MAIL_ENCODING_TYPE_UTF_8,
															self::i_MAIL_ENCODING_TYPE_WINDOWS_1251];
	
	
	/***************************************************
	 * INTERFACE
	 */

//!!!https://habrahabr.ru/sandbox/48759/
	static public function i_sendNativeMail(array $aParams_a_arr):bool
	{
		if (!self::_validateParams($aParams_a_arr))
		{
			new CException('i_sendNativeMail', 'Invalid params: ' .CArrayTools::i_toString($aParams_a_arr));
		}
		
		$lMailEncodingType_str = self::_getEncodingType($aParams_a_arr);
		$lBodyContentType_str = self::_isHTMLMode($aParams_a_arr) ? self::_BODY_CONTENT_TYPE_HTML_TEXT : self::_BODY_CONTENT_TYPE_PLAIN_TEXT;
		
		$lHeader_str =	'MIME-Version: 1.0' ."\r\n".
						'Content-type: ' .$lBodyContentType_str. '; charset=' .$lMailEncodingType_str. '' ."\r\n".
						'From: ' .self::_getNameFrom($aParams_a_arr). '<' .self::_getEmailFrom($aParams_a_arr). '>' . "\r\n";

		$lTitle_str = '=?' .$lMailEncodingType_str. '?B?' .base64_encode(self::_getTitle($aParams_a_arr)). '?=';
		$lBodyData_str = self::_transformBodyDataToString(self::_getBodyData($aParams_a_arr));

		return mail(self::_getEmailTo($aParams_a_arr), $lTitle_str, $lBodyData_str, $lHeader_str);
	}
	
	/*static public function i_sendSMTPMail($aMailParams_obj_arr)
	{
		return self::_sendSMTPMail($aMailParams_obj_arr);
	}*/

	/*
	 * INTERFACE
	 ***************************************************/

	static private function _validateParams(array$aParams_a_arr):bool
	{
		$lEncodingType_str = '';
		//----
		return	CVariableTools::i_isAssocArray($aParams_a_arr)
				&& CVariableTools::i_isString(self::_getEmailFrom($aParams_a_arr))//----
				&& CVariableTools::i_isString(self::_getEmailTo($aParams_a_arr))
				&& CVariableTools::i_isString(self::_getNameFrom($aParams_a_arr))
				&& CVariableTools::i_isString(self::_getNameTo($aParams_a_arr))
				&& CVariableTools::i_isString(self::_getTitle($aParams_a_arr))
				&& CVariableTools::i_isAssocArray(self::_getBodyData($aParams_a_arr))
				&& CVariableTools::i_isBoolean(self::_isHTMLMode($aParams_a_arr))
				&& CVariableTools::i_isString(($lEncodingType_str = self::_getEncodingType($aParams_a_arr)))
				&& CArrayTools::i_isInArray($lEncodingType_str, self::_SUPPORTED_MAIL_ENCODING_TYPES);
	}

	static private function _transformBodyDataToString(array $aBodyData_a_arr):string
	{
		return '';//----
	}
	
	static private function _getParamValue(array $aParams_a_arr, string $aParamName_str, $aOptParamValueIfNoExist_var = null)
	{
		return isset($aParams_a_arr[$aParamName_str]) ? $aParams_a_arr[$aParamName_str] : $aOptParamValueIfNoExist_var;
	}

	//PARAMS...
	static private function _getEmailFrom(array $aParams_a_arr):string
	{
		return CVariableTools::i_toString(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_EMAIL_FROM));
	}
	
	static private function _getEmailTo(array $aParams_a_arr):string
	{
		return CVariableTools::i_toString(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_EMAIL_TO));
	}
	
	static private function _getNameFrom(array $aParams_a_arr):string
	{
		return CVariableTools::i_toString(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_NAME_FROM));
	}
	
	static private function _getNameTo(array $aParams_a_arr):string
	{
		return CVariableTools::i_toString(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_NAME_TO));
	}
	
	static private function _getTitle(array $aParams_a_arr):string
	{
		return CVariableTools::i_toString(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_TITLE));
	}
	
	static private function _getBodyData(array $aParams_a_arr):array
	{
		return self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_BODY_DATA);
	}
	
	static private function _isHTMLMode(array $aParams_a_arr):bool
	{
		return CVariableTools::i_toBoolean(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_OPT_IS_HTML_MODE, true));
	}
	
	static private function _getEncodingType(array $aParams_a_arr):string
	{
		return CVariableTools::i_toString(self::_getParamValue($aParams_a_arr, self::i_MAIL_PARAM_ID_OPT_ENCODING_TYPE, self::i_MAIL_ENCODING_TYPE_UTF_8));
	}
	//...PARAMS

	/*static private function _sendSMTPMail($aMailParams_obj_arr)
	{
		require_once 'phpmailer/PHPMailerAutoload.php';

		$lSmtpHost_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_SMTP_HOST];
		$lSmtpPort_int = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_SMTP_PORT];
		$lSmtpSecureMode_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_SMTP_SECURE_MODE];
		$lSmtpLogin_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_SMTP_LOGIN];
		$lSmtpPassword_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_SMTP_PASSWORD];
		
		$lEmailFrom_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_EMAIL_FROM];
		$lEmailTo_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_EMAIL_TO];
		$lNameFrom_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_NAME_FROM];
		$lNameTo_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_NAME_TO];
		$lIsHTMLMode_bl = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_IS_HTML_MODE];
		$lHeader_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_HEADER];
		$lBody_str = $aMailParams_obj_arr[CMailTools::i_MAIL_PARAM_ID_BODY];
		
		$lPhpMailer_clss = new \PHPMailer();

		//$lPhpMailer_clss->isSMTP();
		$lPhpMailer_clss->Host = $lSmtpHost_str;
		$lPhpMailer_clss->Port = $lSmtpPort_int;
		$lPhpMailer_clss->SMTPSecure = $lSmtpSecureMode_str;
		$lPhpMailer_clss->SMTPAuth = true;
		$lPhpMailer_clss->Username = $lSmtpLogin_str;
		$lPhpMailer_clss->Password = $lSmtpPassword_str;

		$lPhpMailer_clss->setFrom($lEmailFrom_str, $lNameFrom_str);
		$lPhpMailer_clss->addAddress($lEmailTo_str, $lNameTo_str);

		$lPhpMailer_clss->isHTML($lIsHTMLMode_bl);

		$lPhpMailer_clss->Subject = $lHeader_str;
		$lPhpMailer_clss->Body = $lBody_str;

		if (!$lPhpMailer_clss->send())
		{
			echo 'Mailer Error: ' . $lPhpMailer_clss->ErrorInfo;
			
			return false;
		}
		
		return true;
	}*/
}


?>