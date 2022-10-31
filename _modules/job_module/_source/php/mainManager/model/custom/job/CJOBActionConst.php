<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CJOBActionConst extends CCActionConst
{
	//ACTIONS...
	//...ACTIONS

	/*const ACTION_ID_ADD									= 'add';
	const ACTION_ID_EDIT									= 'edit';
	const ACTION_ID_VIEW									= 'view';
	const ACTION_ID_SEARCH									= 'search';
	const ACTION_ID_REMOVE									= 'remove';*/

	public const i_SUPPORTED_ACTION_IDS						= [	CJOBActionConst::i_ACTION_ID_ADD,
																CJOBActionConst::i_ACTION_ID_VIEW];
}


?>