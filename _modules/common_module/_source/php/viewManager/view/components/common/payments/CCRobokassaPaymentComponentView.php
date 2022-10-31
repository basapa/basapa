<?php
declare(strict_types=1);
/*
IMPORT_PRIORITY:6
*/
namespace basapa_ns;


final class CCRobokassaPaymentComponentView extends CCPaymentComponentView
{
	/***************************************************
	 * INTERFACE
	 */

	/*
	 * INTERFACE
	 ***************************************************/

	/*override*/protected function __draw():void
	{
		$lComponentLogin_str = $this->__getComponentLogin();
		$lComponentPassword_str = $this->__getComponentPassword();
		$lComponentOrderId_str = $this->__getComponentOrderId();
		$lComponentOrderPrice_str = $this->__getComponentOrderPrice();
		$lComponentOrderDescription_str = $this->__getComponentOrderDescription();
		
		$lSignature_str = md5($lComponentLogin_str. '::' .$lComponentOrderId_str. ':' .$lComponentPassword_str);
		
		$lLoginQueryStr_str = 'MerchantLogin=' .$lComponentLogin_str;
		$lOrderPriceQueryStr_str = 'DefaultSum=' .$lComponentOrderPrice_str;
		$lOrderDescriptionQueryStr_str = 'Description=' .$lComponentOrderDescription_str;
		$lSignatureQueryStr_str = 'SignatureValue=' .$lSignature_str;
		
		$lSrc_str = CURLTools::i_applyHTTPURL('auth.robokassa.ru/Merchant/PaymentForm/FormFL.js?', true)
					.$lLoginQueryStr_str
					.$lOrderPriceQueryStr_str
					.$lOrderDescriptionQueryStr_str
					.$lSignatureQueryStr_str;
					
		echo
		'<div>
			<script type="text/javascript" src="' .$lSrc_str. '"></script>
		</div>'; 
	}
}


?>