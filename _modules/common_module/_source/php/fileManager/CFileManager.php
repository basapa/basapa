<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:0
*/
namespace basapa_ns;


final class CFileManager
{
	static private $_fInstance_clss;

	private $_fXMLFilesController_clss;
	private $_fFilesData_clss;


	private function __construct()
	{
		//$this->_init();
	}

	/***************************************************
	 * INTERFACE
	 */

	static public function i_getInstance()
	{
		if (!isset(self::$_fInstance_clss))
		{
			self::$_fInstance_clss = new self();
		}
		return self::$_fInstance_clss;
	}

	public function i_getXMLFilesController()
	{
		return $this->_getXMLFilesController();
	}

	public function i_getFilesData()
	{
		return $this->_getFilesData();
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/

	private function _getXMLFilesController()
	{
		return isset($this->_fXMLFilesController_clss) ? $this->_fXMLFilesController_clss : ($this->_fXMLFilesController_clss = new CXMLFilesController());
	}

	private function _getFilesData()
	{
		return isset($this->_fFilesData_clss) ? $this->_fFilesData_clss : ($this->_fFilesData_clss = new CFilesData());
	}
}


?>