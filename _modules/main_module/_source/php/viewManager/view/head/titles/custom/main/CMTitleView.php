<?php
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


class CMTitleView extends CCTitleView
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
				$lTranslationData_clss = $this->__getTranslationsData()->getMainTranslationData()->getTranslationData();

				$lTitle_str = $lTranslationData_clss->getPagesTranslationData()->getMainPageTranslationData()->getTitle();
			}break;

			/*case CPageConst::PAGE_ID_REGISTRATION:
			{
				$lTitle_str = 'Регистрация';
			}break;
			
			case CPageConst::PAGE_ID_RECOVERY_PASSWORD:
			{
				$lTitle_str = 'Восстановление пароля';
			}break;

			case CPageConst::PAGE_ID_PROMOTION:
			{
				$lTitle_str = 'Размещение рекламы';
			}break;

			case CPageConst::PAGE_ID_RULES:
			{
				$lTitle_str = 'Правила пользования';
			}break;
			
			case CPageConst::PAGE_ID_SUPPORT:
			{
				$lTitle_str = 'Техподдержка';
			}break;

			case CPageConst::PAGE_ID_USER:
			{
				$lTitle_str = 'Аккаунт';
			}break;
			
			case CPageConst::PAGE_ID_AUTHORIZATION:
			{
				$lTitle_str = 'Авторизация';
			}break;

			case CPageConst::PAGE_ID_SELECT_CITY:
			{
				$lTitle_str = 'Выбор города';
			}break;

			case CPageConst::PAGE_ID_ERROR_404:
			{
				$lTitle_str = 'Ошибка 404';
			}break;

			case CPageConst::PAGE_ID_ERROR_403:
			{
				$lTitle_str = 'Ошибка 403';
			}break;

			case CPageConst::PAGE_ID_ACCESS_PROHIBITION:
			{
				$lTitle_str = 'Доступ запрещен';
			}break;

			case CPageConst::PAGE_ID_ACCESS_RESTRICTION:
			{
				$lTitle_str = 'Доступ ограничен';
			}break;
			
			case CPageConst::PAGE_ID_ACCESS_REQUIREMENT:
			{
				$lTitle_str = 'Доступ невозможен';
			}break;

			case CPageConst::PAGE_ID_ACCESS_ERROR:
			{
				$lTitle_str = 'Доступ временно невозможен';
			}break;*/

			default:
				$lTitle_str = 'Работа, вакансии и резюме в России и зарубежье';
			break;
		}
		
		echo '<title>' .$lTitle_str. '</title>';
	}

	/*
	 * INTERFACE
	 ***************************************************/
}


?>