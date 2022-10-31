<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:10
*/
namespace basapa_ns;


final class CSymbolsTools
{
	//SYMBOL ICONS...
	public const i_SYMBOL_ICON_TOP_BLACK_TRIANGLE		= '▲';
	public const i_SYMBOL_ICON_BOTTOM_BLACK_TRIANGLE	= '▼';
	public const i_SYMBOL_ICON_LEFT_BLACK_TRIANGLE		= '◀';
	public const i_SYMBOL_ICON_RIGHT_BLACK_TRIANGLE		= '▶';
	//...SYMBOL ICONS

	//SYMBOL VALUE IDS...
	public const i_SYMBOL_VALUE_ID_STRING				= 0;
	public const i_SYMBOL_VALUE_ID_HTML					= 1;
	public const i_SYMBOL_VALUE_ID_MNEMONIC				= 2;
	//...SYMBOL VALUE IDS

	//SYMBOL IDS...
	public const i_SYMBOL_ID_AMP						= 0;
	public const i_SYMBOL_ID_APOS						= 1;
	public const i_SYMBOL_ID_COLON						= 2;
	public const i_SYMBOL_ID_NBSP						= 3;
	public const i_SYMBOL_ID_QUOT						= 4;
	public const i_SYMBOL_ID_RSAQUO						= 5;
	public const i_SYMBOL_ID_RAQUO						= 6;
	public const i_SYMBOL_ID_SLASH						= 7;
	//...SYMBOL IDS

	private const _SYMBOLS_VALUES						= [	self::i_SYMBOL_ID_AMP		=> ['&', '&#38;', '&amp;'],
															self::i_SYMBOL_ID_APOS		=> ['\'', '&#39;', '&apos;'],
															self::i_SYMBOL_ID_COLON		=> [':', '&#58;', '&colon;'],
															self::i_SYMBOL_ID_NBSP		=> [' ', '&#160;', '&nbsp;'],
															self::i_SYMBOL_ID_QUOT		=> ['"', '&#34;', '&quot;'],
															self::i_SYMBOL_ID_RSAQUO		=> ['›', '&#8250;', '&rsaquo;'],
															self::i_SYMBOL_ID_RAQUO		=> ['»', '&#187;', '&raquo;'],
															self::i_SYMBOL_ID_SLASH		=> ['/', '&#47;', '&frasl;']];


	/***************************************************
	 * INTERFACE
	 */

	static public function i_getSymbolStringValue(int $aSymbolId_int):string
	{
		return self::_SYMBOLS_VALUES[$aSymbolId_int][self::i_SYMBOL_VALUE_ID_STRING];
	}

	static public function i_getSymbolHTMLValue(int $aSymbolId_int):string
	{
		return self::_SYMBOLS_VALUES[$aSymbolId_int][self::i_SYMBOL_VALUE_ID_HTML];
	}

	static public function i_getSymbolMnemonicValue(int $aSymbolId_int):string
	{
		return self::_SYMBOLS_VALUES[$aSymbolId_int][self::i_SYMBOL_VALUE_ID_MNEMONIC];
	}

	static public function i_getSymbolValue(int $aSymbolId_int, int $aSymbolValueId_int):string
	{
		return self::_SYMBOLS_VALUES[$aSymbolId_int][$aSymbolValueId_int];
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>