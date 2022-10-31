<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CImagickWrapper
{
	/**@var \Imagick*/
	private $_fImagick_i;


	/***************************************************
	 * INTERFACE
	 */

	public function i_createObject(string $aFullFileName_str):void
	{
		$this->_fImagick_i = new \Imagick($aFullFileName_str);
	}

	public function i_setXMLNodeValue():\Imagick
	{
		return $this->_fImagick_i->coalesceImages();
	}

	public function i_deconstructImages():void
	{
		$this->_fImagick_i->deconstructImages();
	}

	public function i_writeImages(string $aFullFileName_str):void
	{
		$lRet_var = $this->_fImagick_i->writeImages($aFullFileName_str, true);
		self::_throwIfRetFailed($lRet_var);
	}

	public function i_clearObject():void
	{
		$lRet_var = $this->_fImagick_i->clear();
		self::_throwIfRetFailed($lRet_var);
	}

	public function i_destroyObject():void
	{
		$lRet_var = $this->_fImagick_i->destroy();
		self::_throwIfRetFailed($lRet_var);
	}

	/*
	 * INTERFACE
	 ***************************************************/

	static private function _throwIfRetFailed($a_var)
	{
		if ($a_var !== true)
		{
			new CException('_throwIfRetFailed', 'Return value: ' .$a_var);
		}
	}
}


?>