<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CCPaymentPageResponseController extends CCPageResponseController
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __update():void
	{
		$lSupportedGETParams_str_arr	= [	CCRequestParamConst::i_GET_PARAM_ID_SITE,
											CCRequestParamConst::i_GET_PARAM_ID_PAGE,
											CCRequestParamConst::i_GET_PARAM_ID_LANG,
											CCRequestParamConst::i_GET_DYNAMIC_PARAM_ID_STATUS];
		$this->__validateSupportedGETParams($lSupportedGETParams_str_arr);

		$lHostData_clss = $this->__getMainData()->i_getHostData();
		$lHostData_clss->i_setHttpHeader(CHostData::i_RESPONSE_HEADER_TYPE_OK);

		if ($this->__getMainData()->i_isGETParamDefined(CCRequestParamConst::i_GET_DYNAMIC_PARAM_ID_STATUS))
		{
			$this->_updateIfDynamicParamStatusDefined();
		}

		$lHostData_clss->i_setSimpleRedirect(CURLTools::i_applyHTTPURL(SITE_NAME));
	}

	private function _updateIfDynamicParamStatusDefined():void
	{
		$lPaymentStatus_int = intval($this->__getMainData()->i_getGETParam(CCRequestParamConst::i_GET_DYNAMIC_PARAM_ID_STATUS));
		if (
				$lPaymentStatus_int !== CCPaymentsTableData::i_PAYMEMT_STATUS_SYSTEM_CONFIRMED
				&& $lPaymentStatus_int !== CCPaymentsTableData::i_PAYMEMT_STATUS_CANCELED
				&& $lPaymentStatus_int !== CCPaymentsTableData::i_PAYMEMT_STATUS_COMPLETED
			)
		{
			new CException('_updateIfDynamicParamStatusDefined', 'Unexpected payment status: ' .$lPaymentStatus_int, CException::i_EXCEPTION_TYPE_EXTERNAL_LOGIC_ERROR);
		}

		$lHostData_clss = $this->__getMainData()->i_getHostData();

		$lOrderId_int = CVariableTools::i_toInt($lHostData_clss->i_getRequestParam(CCPaymentConst::i_ROBOKASSA_PARAM_ID_ORDER_ID));

		if ($lPaymentStatus_int === CCPaymentsTableData::i_PAYMEMT_STATUS_SYSTEM_CONFIRMED)
		{
			$lOrderPrice_num = CVariableTools::i_toNumber($lHostData_clss->i_getRequestParam(CCPaymentConst::i_ROBOKASSA_PARAM_ID_ORDER_PRICE));
			$lSignature_str = $lHostData_clss->i_getRequestParam(CCPaymentConst::i_ROBOKASSA_PARAM_ID_SIGNATURE);

			if (CStringTools::i_toUpperCase($lSignature_str) !== CStringTools::i_toUpperCase(CStringTools::i_secureStringValue($lOrderPrice_num. ':' .$lOrderId_int. ':' .PAYMENT_MODE === PAYMENT_MODE_TEST ? CCPaymentConst::i_ROBOKASSA_SECOND_TEST_PASSWORD : CCPaymentConst::i_ROBOKASSA_SECOND_PASSWORD, CStringTools::i_SECURE_MODE_MD5)))
			{
				CLogFile::i_writeContentInLogFile('Payment signature value incorrect!');
			}
			else
			{
				CLogFile::i_writeContentInLogFile('Payment has been system confirmed!. Order id: ' .$lOrderId_int);
			}

			$lTableData_a_arr = [CCPaymentsTableData::i_TABLE_FIELD_PAYMEMT_STATUS => $lPaymentStatus_int];

			$lSiteId_str = $this->__getMainData()->i_getGETParamSiteId();

			$this->__getDatabaseTablesController()->i_getMySQLDatabaseTablesController($lSiteId_str)->i_getMySQLDatabasePaymentsTableController()->i_updatePaymentData($lOrderId_int, $lTableData_a_arr);
			//if (!isset($lTableQueriesData_clss))
			//{
				//$this->__getEventData()->addEventId(CCEventConst::PAYMENT_EVENT_ID_FAILED);
			//}

			exit();
		}
		else if ($lPaymentStatus_int === CCPaymentsTableData::i_PAYMEMT_STATUS_CANCELED)
		{
			CLogFile::i_writeContentInLogFile('Payment has been canceled!. Order id: ' .$lOrderId_int);
		}
		else //if ($lPaymentStatus_int === CCPaymentsTableData::PAYMEMT_STATUS_COMPLETED)
		{
			CLogFile::i_writeContentInLogFile('Payment has been completed!. Order id: ' .$lOrderId_int);
		}
	}
}


?>