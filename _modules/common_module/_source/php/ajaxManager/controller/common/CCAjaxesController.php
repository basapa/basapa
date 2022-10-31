<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


/*virtual*/class CCAjaxesController
{
	private $_fSupportFormDialogAjaxController_clss;
	private $_fFileUploadingAjaxController_clss;
	private $_fCitiesAjaxController_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	/*virtual*/public function i_update():void
	{
		$lGETParamAjaxRequestId_str = $this->__getMainData()->i_getGETParamAjaxRequest();
		switch ($lGETParamAjaxRequestId_str)
		{
			/*case CCAjaxConst::i_REQUEST_ID_RECEIVE_SUPPORT_FORM_DIALOG_HTML:
			{
				$this->_getSupportFormDialogAjaxController()->i_receiveFormDialogHTML();
			}break;*/

			case CCAjaxConst::i_REQUEST_ID_GET_CITIES:
			{
				$this->_getCitiesAjaxController()->i_send();
			}break;

			case CCAjaxConst::i_REQUEST_ID_UPLOAD_FILE:
			{
				$this->_getFileUploadingAjaxController()->i_send();
			}break;

			default:
				new CException('i_update', 'Unsupported GET param ajax request id: ' .$lGETParamAjaxRequestId_str);
			break;
		}
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*virtual*//*protected function __init():void
	{
	}*/

	protected function __getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}

	private function _getSupportFormDialogAjaxController()
	{
		return isset($this->_fSupportFormDialogAjaxController_clss) ? $this->_fSupportFormDialogAjaxController_clss : ($this->_fSupportFormDialogAjaxController_clss = new CCSupportFormDialogAjaxController());
	}

	private function _getFileUploadingAjaxController()
	{
		return isset($this->_fFileUploadingAjaxController_clss) ? $this->_fFileUploadingAjaxController_clss : ($this->_fFileUploadingAjaxController_clss = new CCFileUploadingAjaxController());
	}

	private function _getCitiesAjaxController()
	{
		return isset($this->_fCitiesAjaxController_clss) ? $this->_fCitiesAjaxController_clss : ($this->_fCitiesAjaxController_clss = new CCCitiesAjaxController());
	}
}


?>