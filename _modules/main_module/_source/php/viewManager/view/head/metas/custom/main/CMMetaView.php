<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMMetaView extends CCMetaView
{
	/***************************************************
	 * INTERFACE
	 */
	
	public function i_draw()
	{
		$lPageId_str = $this->__getMainData()->getURLParam(CCRequestParamConst::GET_PARAM_ID_PAGE);
		switch ($lPageId_str)
		{
			case CCPageConst::PAGE_ID_MAIN:
			{
				$lDescription_str = 'Работа в городах России и зарубежья. Вакансии и резюме.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			/*
			case CPageConst::PAGE_ID_PROMOTION:
			{
				$lDescription_str = 'Размещение рекламы на сайте о работе в городах России и зарубежья.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_RULES:
			{
				$lDescription_str = 'Правила пользования на сайте о работе в городах России и зарубежья.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_SUPPORT:
			{
				$lDescription_str = 'Техническая поддержка на сайте о работе в городах России и зарубежья.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_ERROR_404:
			{
				$lDescription_str = 'Ошибка 404.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			
			case CPageConst::PAGE_ID_ERROR_403:
			{
				$lDescription_str = 'Ошибка 403';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			
			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			{
				$lDescription_str = 'Доступ запрещен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
			
			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			{
				$lDescription_str = 'Доступ ограничен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lDescription_str = 'Доступ невозможен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;

			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$lDescription_str = 'Доступ временно невозможен.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			}break;
*/
			default:
				$lDescription_str = 'Работа в городах России и зарубежья. Вакансии и резюме.';
				$lKeywords_str = 'работа, вакансии, резюме, поиск вакансий, поиск резюме, поиск работы, ищу работу';
			break;
		}
		
		echo
		'<meta name="description" content="' .$lDescription_str. '">',
 		'<meta name="keywords" content="' .$lKeywords_str. '">';
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>