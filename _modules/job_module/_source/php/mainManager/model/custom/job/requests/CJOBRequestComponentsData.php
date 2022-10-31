<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CJOBRequestComponentsData// extends CCComponentFilledData
{
	private $_fRequestComponentData_clss_arr;


	/***************************************************
	 * INTERFACE
	 */
	
	public function i_addRequestComponentData($aRequestComponentData_clss):void
	{
		$this->_fRequestComponentData_clss_arr[] = $aRequestComponentData_clss;
	}
	
	public function i_insertRequestComponentData(string $aComponentId_str, $aRequestComponentData_clss):void
	{
		if (isset($this->_fRequestComponentData_clss_arr[$aComponentId_str]))
		{
			new CException('insertRequestComponentData', 'ILE!');
		}
		
		$this->_fRequestComponentData_clss_arr[$aComponentId_str] = $aRequestComponentData_clss;
	}
	
	public function i_getRequestComponentData(string $aComponentId_str, bool $aOptUseInsertMode_bl)//----проверить, обязателен ли isset()
	{
		if (!isset($this->_fRequestComponentData_clss_arr))
		{
			return null;
		}
		
		if ($aOptUseInsertMode_bl)
		{
			return isset($this->_fRequestComponentData_clss_arr[$aComponentId_str]) ? $this->_fRequestComponentData_clss_arr[$aComponentId_str] : null;
		}
		else
		{
			foreach ($this->_fRequestComponentData_clss_arr as $lRequestComponentData_clss)
			{
				if ($lRequestComponentData_clss->i_getComponentId() == $aComponentId_str)
				{
					return $lRequestComponentData_clss;
				}
			}
		}
		
		return null;
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>