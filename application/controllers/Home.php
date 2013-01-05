<?php
class Home extends Tango_Carder {
	
	function __construct() {}
	
	public function index() {}
	
	public function send($responses = array()) 
	{
		include(APP_DIR . "/library/TangoCardSdkAutoloader.php");
		
		if(isset($_POST)) {
			$spending_limit = $_POST['spendingLimit'];
			$recipents = $this->data['recipents'] = array_slice(explode(', ', $_POST['recipents']), 0, -1);
			$each_amount = floor($spending_limit/count($recipents));
			$remainder = (count($recipents)*$each_amount)-$spending_limit;
			$i = 1;
			foreach($recipents as $recipent) {
				$amount = $each_amount*100;
				if($i==count($recipents)) {
					$amount = ($each_amount + $remainder) * 100;
				}
				/* Use the Tango Card sdk to send the tango cards to the recipents */
				$enumTangoCardServiceApi = \TangoCard\Sdk\Service\TangoCardServiceApiEnum::INTEGRATION; //1
				$username = "third_party_int@tangocard.com";
				$password = "integrateme";
				$card_sku = "tango-card";
				$responsePurchaseCard = null;

				if ( \TangoCard\Sdk\TangoCardServiceApi::PurchaseCard(
						$enumTangoCardServiceApi,
						$username, 
						$password,
						$card_sku,                              // cardSku
						intval($amount),               			// cardValue
						true,                                   // tcSend 
						$recipent,                        		// recipientName
						$recipent,                    			// recipientEmail
						"You've received a gift!",              // giftMessage
						"Tango-Carder",                         // giftFrom
						null,                                   // companyIdentifier (default Tango Card email template)
						$responsePurchaseCard                   // response
					) 
					&& (null != $responsePurchaseCard)
				) {
					// we have a response from the server, lets see what we got (and do something with it)
					if (is_a($responsePurchaseCard, 'TangoCard\Sdk\Response\Success\PurchaseCardResponse')) {
						$this->data['success'] = true;
						$responsePurchaseCard->recipent = $recipent;
						$responses[] = $responsePurchaseCard;
					} else {
						$this->data['success'] = false;
						throw new RuntimeException('Unexpected response.');
					}
				}
				$i++;
			}
			$this->data['responses'] = $responses;
		}
	}

}