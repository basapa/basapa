<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:9
*/
namespace basapa_ns;


/*virtual*/class CCMessageInfoView extends CCInfoView
{
	//PARAM IDS...
	public const i_PARAM_ID_MESSAGE_TITLE				= 'message_title';
	public const i_PARAM_ID_MESSAGE_TEXT				= 'message_text';
	//public const PARAM_FILE_NAMES						= 'file_names';
	//public const PARAM_REPLACING_PARAMS				= 'replacing_params';
	//...PARAM IDS
	
	//CSS...
	private const _CSS_INFO								= 'css_message_info';
	//...CSS
	
	
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __validateParams():bool
	{
		return parent::__validateParams()
				&& $this->_isMessageTitleDefined()
				&& $this->_isMessageTextDefined();
	}

	//JS...
	/*override*/protected function __getJSInfoImport():string
	{
		return '';
	}

	/*override*/protected function __getJSInfo():string
	{
		return '';
	}

	/*override*/protected function __drawPreJS():void
	{
	}

	/*override*/protected function __drawPostJS():void
	{
	}
	//...JS

	/*override*/protected function __draw():void
	{
		$this->__drawHeader();
		$this->__drawBody();
	}

	/*override*/protected function __drawHeaderContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();
		$lImageComponentsView_clss = $lComponentsView_clss->i_getImageComponentsView();

		//TITLE...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $this->__getMessageTitle(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_message_title',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_message_title'];
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
							//CCSimpleTextComponentView::PARAM_JS_COMPONENT_INIT_FUNC				=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...TITLE

		//CLOSE BUTTON...
		/*$lParams_obj_arr	= array(CCSimpleImageComponentView::PARAM_FILE_NAME					=> CFilesConst::ROOT_INTERNALS_CLOSE_ICONS_IMAGES_RESOURCES_DIRECTORY_NAME . CFilesConst::IMAGE_CLOSE_ICONS_FILE_NAME,
									CCSimpleImageComponentView::PARAM_WIDTH						=> 20,
									CCSimpleImageComponentView::PARAM_HEIGHT					=> 20,
									CCSimpleImageComponentView::PARAM_CLASSES					=> 'css_image_component_message_close_button',
									CCSimpleImageComponentView::PARAM_ELEMENT_CLASSES			=> 'css_image_component_element_message_close_button');
									//CCSimpleImageComponentView::PARAM_JS_COMPONENT_ID			=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
									//CCSimpleImageComponentView::PARAM_JS_COMPONENT_INIT_FUNC	=> $this->__getJSInfoComponentInitFunc());
		$lImageComponentsView_clss->getSimpleImageComponentView()->draw($lParams_obj_arr);*/
		//...CLOSE BUTTON
	}

	/*override*/protected function __drawBodyContent():void
	{
		$lComponentsView_clss = $this->__getComponentsView();
		$lTextComponentsView_clss = $lComponentsView_clss->i_getTextComponentsView();

		//TEXT...
		$lParams_a_arr	= [	CCSimpleTextComponentView::i_PARAM_ID_COMPONENT_VALUE					=> $this->__getMessageText(),
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_CLASSES			=> 'css_text_component_message_text',
							CCSimpleTextComponentView::i_PARAM_ID_OPT_COMPONENT_ELEMENT_CLASSES	=> 'css_text_component_element_message_text'];
						//CCSimpleTextComponentView::PARAM_JS_COMPONENT_ID						=> CRegistrationFormView::JS_FORM_COMPONENT_ID_LOGIN_TEXTFIELD,
						//CCSimpleTextComponentView::PARAM_JS_COMPONENT_INIT_FUNC				=> $this->__getJSInfoComponentInitFunc()];
		$lTextComponentsView_clss->i_getSimpleTextComponentView()->i_draw($lParams_a_arr);
		//...TEXT




		/*$lText_str = '';

		$lFileNames_str_arr = $this->__getFileNames();
		if (isset($lFileNames_str_arr))
		{
			$lReplacingParams_obj_arr = $this->__getReplacingParams();
			if (isset($lReplacingParams_obj_arr))
			{
				$lCount_int = count($lFileNames_str_arr);
				for ($i = 0; $i < $lCount_int; $i++)
				{
					$lFileText_str = file_get_contents($lFileNames_str_arr[$i]);

					$lText_str .= $this->_applyReplacingParams($lFileText_str);
				}
			}
			else
			{
				$lCount_int = count($lFileNames_str_arr);
				for ($i = 0; $i < $lCount_int; $i++)
				{
					readfile($lFileNames_str_arr[$i]);
				}
			}
		}
		else
		{
			$lText_str = $this->__getText();

			if (isset($lReplacingParams_obj_arr))
			{
				$lText_str = $this->_applyReplacingParams($lText_str);
			}
		}
*/

		//$lText_str = $this->__getText();

		//return $lText_str;
	}

	//PARAMS...
	/*override*/protected function __getInfoClasses():string
	{
		return self::_CSS_INFO. ' ' .parent::__getInfoClasses();
	}
	
	//TITLE...
	private function _getMessageTitleVar()
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_MESSAGE_TITLE, false);
	}
	
	private function _isMessageTitleDefined():bool
	{
		return CVariableTools::i_isString($this->_getMessageTitleVar());
	}
	
	protected function __getMessageTitle():string
	{
		return CVariableTools::i_toString($this->_getMessageTitleVar());
	}
	//...TITLE
	
	//TEXT...
	private function _geMessageTextVar()
	{
		//TODO: optimization required
		return $this->__getParamValue(self::i_PARAM_ID_MESSAGE_TEXT, false);
	}
	
	private function _isMessageTextDefined():bool
	{
		return CVariableTools::i_isString($this->_geMessageTextVar());
	}
	
	protected function __getMessageText():string
	{
		return CVariableTools::i_toString($this->_geMessageTextVar());
	}
	//...TEXT
	//...PARAMS
/*
	protected function __getFileNames()
	{
		return $this->__getParamValue(self::PARAM_FILE_NAMES, null);
	}

	protected function __getReplacingParams()
	{
		return $this->__getParamValue(self::PARAM_REPLACING_PARAMS, null);
	}

	private function __isCloseButtonAllowed()
	{
		return $this->__getParamValue(self::PARAM_IS_CLOSE_BUTTON_ALLOWED, false);
	}*/
	
	/*private function _applyReplacingParams($aText_str)
	{
		$lReplacingParams_obj_arr = $this->__getReplacingParams();
		if (!isset($lReplacingParams_obj_arr))
		{
			new CException('_applyReplacingParams', 'Replacing params must be defined!');
		}

		foreach ($lReplacingParams_obj_arr as $lPattern_str => $lValue_str)
		{
			$aText_str = CTools::replace($aText_str, $lValue_str, $lPattern_str);
		}

		return $aText_str;
	}*/
}


?>