<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMViewData extends CCViewData
{
	private $_fSectionsIds_int_arr_arr;

	/***************************************************
	 * INTERFACE
	 */

	public function getSectionsIds($aPageId_str)
	{
		return $this->_getSectionsIds($aPageId_str);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	private function _getSectionsIds($aPageId_str)
	{
		return isset($this->_fSectionsIds_int_arr_arr[$aPageId_str]) ? $this->_fSectionsIds_int_arr_arr[$aPageId_str] : $this->_initSectionsIds($aPageId_str);
	}

	private function _initSectionsIds($aPageId_str)
	{
		$lSectionsIds_int_arr = null;

		switch ($aPageId_str)
		{
			case CMPageConst::PAGE_ID_MAIN:
			{
				$lSectionsIds_int_arr	= array(CViewsConst::SECTION_ID_HEADER,
												CViewsConst::SECTION_ID_CONTENT,
												CViewsConst::SECTION_ID_FOOTER);
			}break;

			default:
				new CException('_initSectionsIds', 'Invalid page id: ' .$aPageId_str);
			break;
		}

		$this->_fSectionsIds_int_arr_arr[$aPageId_str] = $lSectionsIds_int_arr;
		return $lSectionsIds_int_arr;
	}
}


?>