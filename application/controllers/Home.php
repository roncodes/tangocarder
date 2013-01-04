<?php
class Home extends Tango_Carder {
	
	function __construct() {}
	
	public function index() {}
	
	public function send() 
	{
		require_once APP_DIR . "/library/TangoCardSdkAutoloader.php";
		if(isset($_POST)) {
			$spending_limit = $_POST['spendingLimit'];
			$recipents = $this->data['recipents'] = explode(', ', $_POST['recipents']);
			array_pop($recipents);
			$each_amount = floor($spending_limit/count($recipents));
			$remainder = (count($recipents)*$each_amount)-$spending_limit;
			$i = 1;
			foreach($recipents as $recipent) {
				$amount = $each_amount*100;
				if($i==count($recipents)) {
					$amount = $each_amount + $remainder * 100;
				}
				/* Use the Tango Card sdk to send the tango cards to the recipents */
				$responsePurchaseCard_Delivery = null;
				$enumTangoCardServiceApi = \TangoCard\Sdk\Service\TangoCardServiceApiEnum::INTEGRATION;
				$username = "burt@example.com";
				$password = "password";
				$card_sku = 'tango-card';
				if ( \TangoCard\Sdk\TangoCardServiceApi::PurchaseCard(
						$enumTangoCardServiceApi,
						$username, 
						$password,
						$card_sku,                              	// cardSku
						intval($amount),               				// cardValue
						true,                                   	// tcSend 
						$recipent, 		                       		// recipientName
						$recipent,            			        	// recipientEmail
						"You've received a tango card gift!",    	// giftMessage
						APP_NAME,        		                 	// giftFrom
						null,                                   	// companyIdentifier (default Tango Card email template)
						$responsePurchaseCard                   	// response
					) 
					&& (null != $responsePurchaseCard_Delivery)
				) {
					// we have a response from the server, lets see what we got (and do something with it)
					if (is_a($responsePurchaseCard_Delivery, 'TangoCard\Sdk\Response\Success\PurchaseCardResponse')) {
						// do nothing sending cards were successful
					} else {
						throw new RuntimeException('Unexpected response.');
					}
				} else {
					throw new RuntimeException('Unexpected response.');
				}
				$i++;
			}
		}
	}

}