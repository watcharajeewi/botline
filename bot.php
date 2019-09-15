<?php
$access_token = 'SfVuPECNCGeQ4OwK0T3P8Ksg9gHp4Os9EXyH3KjLGm95pp+3lk/p7l45yZrwzzyUhNfu1GUoEguDGGEqrb/4xZFGJWc23Vsu6XbzP9vZzCQtXhb9bZZXJA9ShvddIDyyv5xQZJY7vDVx6tz0vxzWbAdB04t89/1O/w1cDnyilFU=';

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
			//$text = $event['source']['userId'];
			  $text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			
			
			if($text=="งานประมูลที่กำลังจะถึง"){
				/*$jsonFlex = [
					"type" => "flex",
					"altText" => "งานประมูลที่กำลังจะถึง",
					"direction" => "ltr",
					  "contents" => [
						"type" => "bubble",
						"header" => [
						  "type" => "box",
						  "layout" => "horizontal",
						  "contents" => [
							[
							  "type" => "text",
							  "text" => "งานประมูลที่กำลังจะถึง",
							  "size" => "sm",
							  "weight" => "bold",
							  "color" => "#AAAAAA"
							]
						  ]
						],
						"body" => [
						  "type" => "box",
						  "layout" => "vertical",
						  "spacing" => "md",
						  "contents" => [
							[
							  "type" => "image",
							  "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png",
             						 "aspectMode"=>"fit"
							],
							  [
							  "type" => "text",
							  "text" => "เชียงราย 13 หมวด กว วันที่ 14-15 กันยายน 2562",
							  "size" => "sm",
							  "weight" => "bold",
							  "color" => "#AAAAAA",
             						  "wrap"=> true
							],
							  [
							  "type" => "text",
							  "text" => "สระบุรี หมวด กย วันที่ 14-15 กันยายน 2562",
							  "size" => "sm",
							  "weight" => "bold",
							  "color" => "#AAAAAA",
              						  "wrap"=> true	
							]
						  ]
						]
					]
					  ];*/
					  
					  
					 $url = 'http://car.tabienrod.com/lineapp/getauction.php';					
					$datax='';						
					$option = array(
						'http' => array(
							'header' => "Content-type: application/x-www-form-urlencoded\r\n ;charset=utf-8 ",
							'method' => 'POST',
							'content' => http_build_query($datax),
						),
					);

					$context = stream_context_create($option);
					$results = file_get_contents($url, false, $context); 
					$jsonFlex=$results;
					  
			
				$data = [
				'replyToken' => $replyToken,
				 'messages' => [$jsonFlex]
				];
				$post = json_encode($data);
			}else{
				
				 $url = 'http://car.tabienrod.com/lineapp/getauction.php';					
				$datax='';								
				$option = array(
					'http' => array(
						'header' => "Content-type: application/x-www-form-urlencoded\r\n ;charset=utf-8 ",
						'method' => 'POST',
						'content' => http_build_query($datax),
					),
				);

				$context = stream_context_create($option);
				$text = file_get_contents($url, false, $context); 
				
				$messages = [
				'type' => 'text',
				'text' => $text
				];
			
				$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
				];
				$post = json_encode($data);
			}
			
			
			
			$url = 'https://api.line.me/v2/bot/message/reply';
				
					
		
			
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
