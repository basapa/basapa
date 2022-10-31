<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


abstract class CCAjaxController
{
	/*public function __construct()
	{
		$this->__init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	abstract public function i_send():void;

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

	protected function __getAjaxesData()
	{
		return CAjaxManager::i_getInstance()->i_getAjaxesData();
	}

	abstract protected function __getAjaxRequestId():string;
}


?>