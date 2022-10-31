<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


/*virtual*/class CCViewsController
{
	private $_fFormsMessagesController_clss;


	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_update():void
	{
		$this->_getFormsMessagesController()->i_update();
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

	//FORMS MESSAGES...
	protected function __generateFormsMessagesController():CCFormsMessagesController
	{
		return new CCFormsMessagesController();
	}

	private function _getFormsMessagesController()
	{
		return $this->_fFormsMessagesController_clss ?? ($this->_fFormsMessagesController_clss = $this->__generateFormsMessagesController());
	}
	//...FORMS MESSAGES
}


?>