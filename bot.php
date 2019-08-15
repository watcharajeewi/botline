<?php
$access_token = 'UQtTMP12tIjABUDW3EYebgyv4Z8Hd8zqP0oKTZ4grtZwWpmMMzZDMpk5twMz94MlXdv6o6wnA0wOzGjKvu0NCt1As7y6Weq7tZvxeDDouZgUdg+WlDDyh6g/oOJEkfUnX1K1yFVJ0Csfwt+wfXxrAAdB04t89/1O/w1cDnyilFU=';

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
			//$text = $event['message']['text'];
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			
			
			$topic=array("สวัสดี","ทำอะไรอยู่","กินข้าวยัง","นอนยัง","อยู่กะใคร");
			$answer=array("สวัสดีด้วย","เล่นไลน์จ๊ะ","กินแล้วจ๊ะ กินหรือยัง","นอนจะตอบไลน์มุงได้เหรอ","อยู่คนเดียว");
			
			/*if(in_array($text,$topic)){
				$indexofarray=array_search($text, $topic);
				$text=$answer[$indexofarray];
			}
			*/
			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
				];
			/*$messages = [
				"type"=>'image',
				    "originalContentUrl"=>'https://www.telegraph.co.uk/content/dam/Travel/2017/April/view-stonehange.jpg',
				    "previewImageUrl"=>'https://www.telegraph.co.uk/content/dam/Travel/2017/April/view-stonehange.jpg'
				];
			*/
			/*$messages = [
				  "type"=>"imagemap",
				  "baseUrl"=>'https://car.tabienrod.com/testimga',
				  "altText"=>"This is an imagemap",
				  "baseSize"=>array(
					  "height"=> 1040,
					  "width"=> 1040
					  ),
				  "actions"=>array(
					  0=>array(
						  "type"=>"uri",
						  "linkUri"=>"http://1morenews.com/",
						  "area"=>array(
							  "x"=> 0,
							  "y"=> 0,
							  "width"=> 520,
							  "height"=> 1040
							  )
						  ),
					 1=>array(
						 "type"=>"uri",
						  "linkUri"=>"http://1morenews.com/",
						  "area"=> array(
							  "x"=> 520,
							  "y"=> 0,
							  "width"=> 520,
							  "height"=> 1040
						  )
					)
					 )
				];*/
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => $messages,
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
