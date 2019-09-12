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
			$jsonFlex = [
  "type"=> "flex",
  "altText"=> "Flex Message",
  "contents"=> [
		"type"=> "bubble",
			"header"=> [
				"type"=> "box",
				"layout"=> "horizontal",
				"contents"=> [
					[
						"type"=> "text",
						"text"=> "งานประมูลที่กำลังจะถึง",
						"size"=> "sm",
						"weight"=> "bold",
						"color"=> "#AAAAAA"
					]
				]
			],
			"body"=> [
				"type"=> "box",
				"layout"=> "horizontal",
				"spacing"=> "md",
				"contents"=> [
					[
						"type"=> "box",
						"layout"=> "vertical",
						"flex"=> 1,
						"contents"=> [
							[
								"type"=> "image",
								"url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/02_1_news_thumbnail_1.png",
								"gravity"=> "bottom",
								"size"=> "sm",
								"aspectRatio"=> "4:3",
								"aspectMode"=> "cover"
							],
						[
						"type"=> "image",
						"url"=> "https://scdn.line-apps.com/n/channel_devcenter/img/fx/02_1_news_thumbnail_2.png",
						"margin"=> "md",
						"size"=> "sm",
						"aspectRatio"=> "4:3",
						"aspectMode"=> "cover"
					],
					[
					  "type"=> "image",
					  "url"=> "https://developers.line.me/assets/images/services/bot-designer-icon.png"
					]
				]
			],
			[
				  "type"=> "box",
				  "layout"=> "vertical",
				  "flex"=> 2,
				  "contents"=> [
					[
					  "type"=> "text",
					  "text"=> "7 Things to Know for Today",
					  "flex"=> 1,
					  "size"=> "xs",
					  "gravity"=> "top"
					],
					[
					  "type"=> "separator"
					],
					[
					  "type"=> "text",
					  "text"=> "Hay fever goes wild",
					  "flex"=> 2,
					  "size"=> "xs",
					  "gravity"=> "center"
					],
					[
					  "type"=> "separator"
					],
					[
					  "type"=> "text",
					  "text"=> "LINE Pay Begins Barcode Payment Service",
					  "flex"=> 2,
					  "size"=> "xs",
					  "gravity"=> "center"
					],
					[
					  "type"=> "separator"
					],
					[
					  "type"=> "text",
					  "text"=> "LINE Adds LINE Wallet",
					  "flex"=> 1,
					  "size"=> "xs",
					  "gravity"=> "bottom"
					]
				  ]
				]
			  
    
  
  ];
			
				$data = [
				'replyToken' => $replyToken,
				 'messages' => [$jsonFlex]
				];
				$post = json_encode($data);
			}else{
				$text='xx';	
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
