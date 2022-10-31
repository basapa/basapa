<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


final class CSiteConst
{
	//JS PHP AGREEMENTS...
	public const i_SITE_ID_MAIN							= 'main';
	public const i_SITE_ID_JOB							= 'job';
	//...JS PHP AGREEMENTS

	public const i_SITE_ID_DEFAULT						= CSiteConst::i_SITE_ID_JOB;

	public const i_SUPPORTED_SITE_IDS					= [	CSiteConst::i_SITE_ID_MAIN,
															CSiteConst::i_SITE_ID_JOB];
}


?>