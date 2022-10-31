<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


final class CBannersView //extends CCBanner
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	protected function __drawPreContent()
	{
	}

	protected function __drawContentTop()
	{
		if (SOURCES_ASSEMBLY_TYPE == SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			/*echo
			'<div class="css_banner">
				<script type="text/javascript">
					random = parseInt(Math.random()*10000)
					banner = \'<iframe src=\"http:&frasl;&frasl;bx.metka.ru/cgi-bin/468/engine.cgi?\'
					banner += \'a7014;\' + random + \';1;\" frameborder=0 width=468 height=60 marginwidth=0 marginheight=0 scrolling=no>\'
					banner += \'<A href=\"http:&frasl;&frasl;bx.metka.ru/468/go.php3?\'
					banner += \'id=a7014&pg=\'+escape(window.location.href)+\'-\' + random + \'\"><IMG alt=\"Metka-Bx\" border=0 \'
					banner += \'width=468 height=60 src=\"http:&frasl;&frasl;bx.metka.ru/cgi-bin/468/engine.cgi?\'
					banner += \'a7014;\'+escape(window.location.href)+\'-\' + random + \';0;\" border=0></A></iframe>\'
					document.write(banner)
				</script>
			</div>';*/

			//$this->__prepareBanner(CBannerConst::TYPE_CONTENT_TOP, 'google_banner_' .CBannerConst::TYPE_CONTENT_TOP);
		}
		/*else
		{
		//	parent::__drawContentTop();
		}*/
	}


	protected function __drawContentMiddle()
	{
	}


	protected function __drawContentBottom()
	{
	}


	protected function __drawLeftTop()
	{
		/*if (SOURCES_ASSEMBLY_TYPE == SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			//$this->__prepareBanner(CBannerConst::TYPE_RIGHT_TOP, 'google_banner_' .CBannerConst::TYPE_RIGHT_TOP);
		}
		else
		{
			parent::__drawLeftTop();
		}*/
	}


	protected function __drawLeftMiddle()
	{
	}


	protected function __drawLeftBottom()
	{
	}


	protected function __drawRightTop()
	{
		/**if (SOURCES_ASSEMBLY_TYPE == SOURCES_ASSEMBLY_TYPE_RELEASE)
		{
			$this->__prepareBanner(CBannerConst::TYPE_RIGHT_TOP, 'google_banner_' .CBannerConst::TYPE_RIGHT_TOP);
		}
		else
		{
			parent::__drawRightTop();
		}*/
	}


	protected function __drawRightMiddle()
	{
	}


	protected function __drawRightBottom()
	{
	}


	protected function __drawPostContent()
	{
	}
}


?>