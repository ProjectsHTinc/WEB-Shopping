<?php
Class Notificationmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function sendOfferNotification($offer_name,$gcm_key,$mobile_type,$product_id,$offer_picture)
	{
	  $title = 'OSHAPP';
	  
      if($mobile_type == '1'){

			$url = 'https://fcm.googleapis.com/fcm/send';
			$api_key = "AAAADDc6HdE:APA91bEwuLb60gFwKDCIMWtkjw2Zv3j3tnnf-l1ml9EJML2E6gdmST0dFlya4pNn3O5ox2VGPDHvhT27p05dPkAmNZAu6pd8VDTOKUdrjPDmjFP1w2Xoik0wYU5MnfYxQIG0cjRXTxBU";
			$fields = array (
					'to' => $gcm_key,
					'priority' => 'high',
					'notification' => array (
						"body" => $offer_name,
						"title" => $title,
						"icon" => $offer_picture,
						"product_id" => $product_id
						)
					);
			$fields = json_encode ( $fields );
			$headers = array( 'Authorization: key='.$api_key,'Content-Type: application/json');

			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
			$rew = curl_exec ( $ch );
			curl_close ( $ch );
			
      }else{

			$passphrase = 'HS123';
			$location ='assets/notification/skilex.pem';
			 
			 $body['aps'] = array(
				'alert' => array(
					'body' => $offer_name,
					'action-loc-key' => $title
					)
				);
			$payload = json_encode($body);
			
			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', $location);
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		   
			// Open a connection to the APNS server
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
			if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
			
			$msg = chr(0) . pack("n", 32) . pack("H*", str_replace(" ", "", $gcm_key)) . pack("n", strlen($payload)) . $payload;
			$result = fwrite($fp, $msg, strlen($msg));
			
			if (!$result){
				echo 'Message not delivered' . PHP_EOL;
			}else{
				echo 'Message successfully delivered' . PHP_EOL;  
			}
			fclose($fp);
      }
	}


function sendNotification($title,$subject,$mob_key,$mobile_type)
	{ 
      if($mobile_type == '1'){

			$url = 'https://fcm.googleapis.com/fcm/send';
			$api_key = "AAAADDc6HdE:APA91bEwuLb60gFwKDCIMWtkjw2Zv3j3tnnf-l1ml9EJML2E6gdmST0dFlya4pNn3O5ox2VGPDHvhT27p05dPkAmNZAu6pd8VDTOKUdrjPDmjFP1w2Xoik0wYU5MnfYxQIG0cjRXTxBU";
			$fields = array (
					'to' => $mob_key,
					'priority' => 'high',
					'notification' => array (
						"body" => $subject,
						"title" => $title,
						"icon" => "myicon"
						)
					);
			$fields = json_encode ( $fields );
			$headers = array( 'Authorization: key='.$api_key,'Content-Type: application/json');

			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
			$rew = curl_exec ( $ch );
			curl_close ( $ch );
			
      }else{

			$passphrase = 'HS123';
			$location ='assets/notification/skilex.pem';
			 
			 $body['aps'] = array(
				'alert' => array(
					'body' => $message,
					'action-loc-key' => $title
					)
				);
			$payload = json_encode($body);
			
			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', $location);
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		   
			// Open a connection to the APNS server
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
			if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
			
			$msg = chr(0) . pack("n", 32) . pack("H*", str_replace(" ", "", $mob_key)) . pack("n", strlen($payload)) . $payload;
			$result = fwrite($fp, $msg, strlen($msg));
			
			if (!$result){
				echo 'Message not delivered' . PHP_EOL;
			}else{
				echo 'Message successfully delivered' . PHP_EOL;  
			}
			fclose($fp);
      }
	}
}
?>
