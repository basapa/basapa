<?php


namespace basapa_ns;


class CMenuListComponent //extends CListComponentBase
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/


	/*protected function __component()
	{
		return 'menu_list_component';
	}


	protected function __draw()
	{
		switch ($this->__type())
		{
			default:
				$this->_drawTypeSimple();
			break;
		}
	}
	
	
	private function _drawTypeSimple()
	{
		//$_firstSelectedElement = $this->__getFirstSelectedElement();
?>

		<div>
			<div style="position:relative; display:inline-block;">
				<div style="padding:2px; width:100px;">element 1</div>

				<div style="position:absolute; top:20px; left:0px; padding:2px; width:100px;">
					<div style="padding:2px;">element 11</div>
					<div style="padding:2px;">element 12</div>
				</div>
			</div>

			<div style="position:relative; display:inline-block;">
				<div style="padding:2px; width:100px;">element 2</div>

				<div style="position:absolute; top:20px; left:0px; padding:2px; width:100px;">
					<div style="padding:2px;">element 21</div>
					<div style="padding:2px;">element 22</div>
				</div>
			</div>

			<div style="position:relative; display:inline-block;">
				<div style="padding:2px; width:100px;">element 3</div>
			</div>
		</div>


<?php
	}


	protected function __drawElementsIfExist()
	{
		$lElements_arr = $this->__elements();
		if (!$lElements_arr)
		{
			return;
		}

		$lCount_int = count($lElements_arr);
		for ($i = 0; $i < $lCount_int; $i++)
		{
			$lElement_obj = $lElements_arr[$i];
			switch ($this->__elementState($lElement_obj))
			{
				case CComponentParam::ELEMENT_STATE_SELECTED:
				{
				}break;


				case CComponentParam::ELEMENT_STATE_ENABLED:
				{
					$this->__drawEnabledElement($lElement_obj);
				}break;


				case CComponentParam::ELEMENT_STATE_DISABLED:
				{
					$this->__drawDisabledElement($lElement_obj);
				}break;


				default:
				break;
			}
		}
	}*/
}


?>