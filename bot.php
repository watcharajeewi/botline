<?php
$access_token = 'UVfCZ6sYV3+f1ZphcKXA/c6tm51kckZc1qdGkf8Ary9IUI3zcB/JN8h4C0mQb5PlhNfu1GUoEguDGGEqrb/4xZFGJWc23Vsu6XbzP9vZzCQDIgBTCBTyvCWFSmaGoysCk4jDHIGRiwNFm1yGHt+B/wdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			
			
			$topic=array("สวัสดี","ทำอะไรอยู่","กินข้าวยัง","นอนยัง","อยู่กะใคร");
			$answer=array("สวัสดีด้วย","เล่นไลน์จ๊ะ","กินแล้วจ๊ะ กินหรือยัง","นอนจะตอบไลน์มุงได้เหรอ","อยู่คนเดียว");
			
			if(in_array($text,$topic)){
				$indexofarray=array_search($text, $topic);
				$text=$answer[$indexofarray];
			}
			
			
			// Build message to reply back
			/*$messages = [
				'type' => 'text',
				'text' => $text
				];*/
			$messages = [
				"type": "location",
				    "title": "my location",
				    "address": "〒150-0002 東京都渋谷区渋谷２丁目２１−１",
				    "latitude": 35.65910807942215,
				    "longitude": 139.70372892916203
				];
			

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
