<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CFilesData
{
	private $_fCookiesData_clss;
	private $_fSessionsData_clss;
	private $_fServerCachesData_clss;
	private $_fXMLFilesData_clss;
	private $_fJSONFilesData_clss;

	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_getCookiesData()
	{
		return $this->_fCookiesData_clss ?? ($this->_fCookiesData_clss = new CCookiesData());
	}

	public function i_getSessionsData()
	{
		return $this->_fSessionsData_clss ?? ($this->_fSessionsData_clss = new CSessionsData());
	}

	public function i_getServerCachesData()
	{
		return $this->_fServerCachesData_clss ?? ($this->_fServerCachesData_clss = new CServerCachesData());
	}

	public function i_getXMLFilesData()
	{
		return $this->_fXMLFilesData_clss ?? ($this->_fXMLFilesData_clss = new CXMLFilesData());
	}

	public function i_getJSONFilesData()
	{
		return $this->_fJSONFilesData_clss ?? ($this->_fJSONFilesData_clss = new CJSONFilesData());
	}

	/*
	 * INTERFACE
	 ***************************************************/

	/*private function _init():void
	{
	}*/
}


?>