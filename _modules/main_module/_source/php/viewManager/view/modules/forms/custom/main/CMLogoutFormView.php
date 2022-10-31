<?php
/*
IMPORT_PRIORITY:8
*/
namespace basapa_ns;


class CMLogoutFormView extends CMFormView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	
	protected function __getId()
	{
		return CFieldIdConst::FORM_LOGOUT;
	}

	
	protected function __getAction()
	{
		$lStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
										CParamConst::PAGE_ID => CPageConst::PAGE_ID_MAIN);
		return CURLConversion::generateURLByStaticParams($lStaticParams_obj_arr);
	}
	
	
	protected function __getJSFormComponentSubmitButtonId()
	{
		return CRequestConst::REQUEST_ID_LOGOUT;
	}
	
	
	protected function __getJSFormComponentHiddenFieldId()
	{
		return CFieldIdConst::FORM_LOGOUT_HIDDEN;
	}
	
	
	protected function __getClasses()
	{
		return 'css_logout_form ' .parent::__getClasses();
	}


	protected function __draw()
	{
		$this->__drawBody();
	}
	
	
	protected function __bodyContent()
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextfieldComponentsView_clss = $lComponentsView_clss->getTextfieldComponentsView();
		$lSubdescriptionTextComponentView_clss = $lComponentsView_clss->getTextComponentsView()->getSubdescriptionTextComponentView();
		$lSubmitButtonComponentView_clss = $lComponentsView_clss->getButtonComponentsView()->getSubmitButtonComponentView();
		
		//login
		$lParams_obj_arr	= array(CSubdescriptionTextComponentView::PARAM_VALUE			=> $this->__getUserData()->getUserLogin(),
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_01',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_01_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		
		//button
		$lParams_obj_arr 	= array(CSubmitButtonComponentView::PARAM_ID				=> $this->__getJSFormComponentSubmitButtonId(),
									CSubmitButtonComponentView::PARAM_NAME				=> CFieldNameConst::BUTTON_EXIT,
									CSubmitButtonComponentView::PARAM_CLASSES			=> 'css_button_component_01',
									CSubmitButtonComponentView::PARAM_ELEMENT_CLASSES	=> 'css_button_component_01_element css_blue');
		$lSubmitButtonComponentView_clss->draw($lParams_obj_arr);
		
		//separator
		$lComponentsView_clss->drawSeparator();

		//administration
		if ($this->__getUserData()->isAdmin() || $this->__getUserData()->isModerator())
		{
			$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
												CParamConst::PAGE_ID => CPageConst::PAGE_ID_REGISTRATION);

			$lParams_obj_arr 	= array(CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByStaticParams($lURLStaticParams_obj_arr),
										CSubdescriptionTextComponentView::PARAM_VALUE			=> CFieldNameConst::FORM_LOGOUT_ADMIN,
										CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_02',
										CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_02_element');
			$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		}

		//account
		$lURLStaticParams_obj_arr	= array(CParamConst::SITE_ID => CSiteConst::SITE_ID_MAIN,
											CParamConst::PAGE_ID => CPageConst::PAGE_ID_USER);

		$lParams_obj_arr 	= array(CSubdescriptionTextComponentView::PARAM_HREF			=> CURLConversion::generateURLByStaticParams($lURLStaticParams_obj_arr ),
									CSubdescriptionTextComponentView::PARAM_VALUE			=> CFieldNameConst::FORM_LOGOUT_ACCOUNT,
									CSubdescriptionTextComponentView::PARAM_CLASSES			=> 'css_text_component_03',
									CSubdescriptionTextComponentView::PARAM_ELEMENT_CLASSES	=> 'css_text_component_03_element');
		$lSubdescriptionTextComponentView_clss->draw($lParams_obj_arr);
		
		//hidden
		$lParams_obj_arr 	= array(CHiddenTextfieldComponentView::PARAM_ID					=> $this->__getJSFormComponentHiddenFieldId(),
									CHiddenTextfieldComponentView::PARAM_VALUE				=> $this->__getHostData()->getCookie(CMainConst::COOKIE_ANTI_SPAM),
									CHiddenTextfieldComponentView::PARAM_MAX_CHARS_COUNT	=> CFieldLengthConst::HIDDEN,
									CHiddenTextfieldComponentView::PARAM_CLASSES			=> 'css_textfield_component_99');
		$lTextfieldComponentsView_clss->getHiddenTextfieldComponentView()->draw($lParams_obj_arr);
	}
}


?>
