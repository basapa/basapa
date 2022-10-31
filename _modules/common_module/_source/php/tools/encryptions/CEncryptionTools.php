<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CEncryptionTools
{
	//ENCRYPTION MODES...
	public const i_ENCRYPTION_MODE_MD5					= 'md5';
	public const i_ENCRYPTION_MODE_SHA1					= 'sha1';
	//...ENCRYPTION MODES
	
	
	/***************************************************
	 * INTERFACE
	 */
	
	static public function i_encryptValue($a_var, $aOptEncryptionMode_int = self::i_ENCRYPTION_MODE_SHA1):string
	{
		if (
				!CVariableTools::i_isInt($a_var)
				&& !CVariableTools::i_isNumber($a_var)
				&& !CVariableTools::i_isString($a_var)
			)
		{
			new CException('i_encryptValue', 'Unsupported value type: ' .CVariableTools::i_getType($a_var));
		}

		$l_str = '';

		switch ($aOptEncryptionMode_int)
		{
			case self::i_ENCRYPTION_MODE_MD5:
			{
				$l_str = md5($a_var);
			}break;
			
			case self::i_ENCRYPTION_MODE_SHA1:
			{
				$l_str = sha1($a_var);
			}break;
			
			default:
				new CException('i_encryptStringValue', 'Unsupported encryption mode: ' .$aOptEncryptionMode_int);
			break;
		}
		
		return $l_str;
	}
	
	static public function i_randomInt(int $aMin_int, int $aMax_int):int
	{
		return random_int($aMin_int, $aMax_int);
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>