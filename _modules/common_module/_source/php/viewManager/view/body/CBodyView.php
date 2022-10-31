<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:5
*/
namespace basapa_ns;


final class CBodyView
{
	private $_fSectionsView_clss;
	
	
	/*public function __construct()
	{
		$this->_init();
	}*/

	/***************************************************
	 * INTERFACE
	 */

	public function i_draw():void
	{
		echo
		'<body class="' .$this->_getPageClass(). '">';
			$this->_getSectionsView()->i_draw();
			echo
			'<div id="dialog_container_id" class="css_dialog_container">
				<div id="dialog_bg_id" class="css_dialog_bg"></div>
				<div id="dialog_content_id" class="css_dialog_content"></div>
			</div>';
			$this->_drawSiteStatistics();
		echo
		'</body>';
	}

	/*
	 * INTERFACE
	 ***************************************************/
	
	/*private function _init():void
	{
	}*/

	private function _getSectionsView()
	{
		return $this->_fSectionsView_clss ?? ($this->_fSectionsView_clss = new CSectionsView());
	}

	private function _getMainData()
	{
		return CMainManager::i_getInstance()->i_getMainData();
	}
	
	private function _getPageClass():string
	{
		$lPageClass_str = '';

		$lSiteId_str = $this->_getMainData()->i_getGETParamSiteId();
		switch ($lSiteId_str)
		{
			case CSiteConst::i_SITE_ID_JOB:
			{
				$lPageClass_str = $this->_getJOBPageClass();
			}break;

			default:
				new CException('_getPageClass', 'Unsupported site id: ' .$lSiteId_str);
			break;
		}

		return $lPageClass_str;
	}

	//JOB...
	private function _getJOBPageClass():string
	{
		$lPageId_str = $this->_getMainData()->i_getGETParamPageId();

		return CViewManager::i_getInstance()->i_getViewsData()->i_getJOBViewData()->i_getPageClass($lPageId_str);
	}
	//...JOB

	private function _drawSiteStatistics()
	{
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_RELEASE)
		{
			$this->_drawCounters();
			//$this->_drawGoogleAnalytic();
			//$this->_drawGoogleBanners();

			//CModulesView::getInstance()->getBanners()->redraw();
		}

		/*if (!RELEASE_MODE
			|| ($this->_getUserData()->isAdmin() || $this->_getUserData()->isModerator()))*/
		if (SOURCES_EXECUTION_MODE === SOURCES_EXECUTION_MODE_DEBUG)
		{
			$lSystem_clss = CSystem::i_getInstance();

			if (CACHE_TYPE !== CACHE_TYPE_MEMCACHE)
			{
				new CException('i_openCacheConnection', 'Cache type is invalid: ' .CACHE_TYPE);
			}

			//memcached stats...
			$lAppMemcacheStats_str = '';

			if (SITE_NAME == 'avatar-bsp.loc')
			{
				$lMemcachedWrapper_clss = CMemcachedWrapper::i_getInstance();
				if (!$lMemcachedWrapper_clss->i_isCacheConnectionOpened())
				{
					$lMemcachedWrapper_clss->i_openCacheConnection();
				}
				$lAppMemcacheStats_str .= 'Статистика MEMCACHED:<br>';
				$lAppMemcacheStats_str .= '- количество используемой памяти: ' .$lSystem_clss->i_getFormattedAppMemcachedMemoryUsedInMBytes(). 'Мб/' .$lSystem_clss->i_getFormattedAppMemcachedMemoryReservedInMBytes(). 'Мб<br>';
				$lAppMemcacheStats_str .= '- количество объектов в кэше: ' .$lSystem_clss->i_getAppMemcachedCurrentItemsCount(). '<br>';
				$lAppMemcacheStats_str .= '- количество соединений с кэшем: ' .$lSystem_clss->i_getAppMemcachedCurrentConnectionsCount(). '<br>';
				$lAppMemcacheStats_str .= '- количество GET запросов: ' .$lSystem_clss->i_getAppMemcachedGETRequestsCount(). '<br>';
				$lAppMemcacheStats_str .= '- количество SET запросов: ' .$lSystem_clss->i_getAppMemcachedSETRequestsCount(). '<br>';
				$lAppMemcacheStats_str .= '- количество данных, найденных в кэше (hits): ' .$lSystem_clss->i_getAppMemcachedHitsCount(). '<br>';
				$lAppMemcacheStats_str .= '- количество данных, не найденных в кэше (misses): ' .$lSystem_clss->i_getAppMemcachedMissesCount(). '<br>';
			}
			//...memcached stats

			echo
			'<div style="text-align:center;">',
				'Время генерации страницы: ' .$lSystem_clss->i_getFormattedAppExecutionTimeInSec(). ' сек.<br>',
				'Число обращений к базе данных: ' .$lSystem_clss->i_getAppDatabaseRequestsCount(). ' раз(а)<br>',
				'Время обращения к базе данных: ' .$lSystem_clss->i_getAppDatabaseRequestsExecutionTimeInSec(). ' сек.<br>',
				'Количество используемой памяти PHP: ' .$lSystem_clss->i_getFormattedAppMemoryUsageCountInMBytes(). 'Мб/' .$lSystem_clss->i_getAppMemoryAvailableCountInMBytes(). 'Мб<br>',
				$lAppMemcacheStats_str,
			'</div>';
		}
	}

	private function _drawCounters()
	{
		echo
		'<!--noindex-->',
		'<div class="css_counters">',
			$this->_getHTMLLiveInetCounter(),
		'</div>',
		'<!--/noindex-->';
	}

	/*private function _drawGoogleAnalytic()
	{
		echo
		'<script type="text/javascript">var _gaq = _gaq || [];_gaq.push([\'_setAccount\', \'UA-24356665-1\']);_gaq.push([\'_trackPageview\']);(function(){var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);})();</script>';
	}*/

	/*private function _drawGoogleBanners()
	{
		if (CModulesView::getInstance()->getBanners()->isBannerDefined('banner_' .CBannerConst::TYPE_RIGHT_TOP))
		{
			echo
				'<div id="google_banner_' .CBannerConst::TYPE_RIGHT_TOP. '" style="display:none;">
				<script type="text/javascript">
					google_ad_client = "ca-pub-3093435702311559";
					google_ad_slot = "4379279942";
					google_ad_width = 160;
					google_ad_height = 600;
				</script>
				<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
			</div>';
		}

		if (CModulesView::getInstance()->getBanners()->isBannerDefined('banner_' .CBannerConst::TYPE_CONTENT_TOP))
		{
			echo
				'<div id="google_banner_' .CBannerConst::TYPE_CONTENT_TOP. '" style="display:none;">
				<script type="text/javascript">
					google_ad_client = "ca-pub-3093435702311559";
					google_ad_slot = "5527027560";
					google_ad_width = 468;
					google_ad_height = 60;
				</script>
				<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
			</div>';
		}
	}*/

	private function _getHTMLLiveInetCounter()
	{
		return '<div class="css_counter"><script type="text/javascript">document.write("<a href=\'&#47;&#47;www.liveinternet.ru/click\' "+"target=_blank><img src=\'&#47;&#47;counter.yadro.ru/hit?t26.1;r"+escape(document.referrer)+((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+";"+Math.random()+"\' alt=\'\' title=\'LiveInternet: показано число посетителей за"+" сегодня\' "+"border=\'0\' width=\'88\' height=\'15\'><\/a>")</script></div>';
	}
}


?>