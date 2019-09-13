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
  "type" => "flex",
    "altText" => "งานประมูลที่กำลังจะถึง",
    "contents" => [
      "type" => "bubble",
      "direction" => "ltr",
      "header" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "text",
            "text" => "งานประมูลที่กำลังจะถึง",
            "size" => "lg",
            "align" => "start",
            "weight" => "bold",
            "color" => "#009813"
          ],
	  ["type"=> "image",
              "url"=> "http://araidee.com/tabienrod//uat/filemanager/Uploads/chiangrai.png",
              "gravity"=>"bottom",
              "size"=>"sm",
              "aspectRatio"=>"16:9",
              "aspectMode"=>"cover"
            ],
          [
            "type" => "text",
            "text" => "฿ 100.00",
            "size" => "3xl",
            "weight" => "bold",
            "color" => "#000000"
          ],
          [
            "type" => "text",
            "text" => "Rabbit Line Pay",
            "size" => "lg",
            "weight" => "bold",
            "color" => "#000000"
          ],
          [
            "type" => "text",
            "text" => "2019.02.14 21:47 (GMT+0700)",
            "size" => "xs",
            "color" => "#B2B2B2"
          ],
          [
            "type" => "text",
            "text" => "Payment complete.",
            "margin" => "lg",
            "size" => "lg",
            "color" => "#000000"
          ]
        ]
      ],
      "body" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "separator",
            "color" => "#C3C3C3"
          ],
          [
            "type" => "box",
            "layout" => "baseline",
            "margin" => "lg",
            "contents" => [
              [
                "type" => "text",
                "text" => "Merchant",
                "align" => "start",
                "color" => "#C3C3C3"
              ],
              [
                "type" => "text",
                "text" => "BTS 01",
                "align" => "end",
                "color" => "#000000"
              ]
            ]
          ],
          [
            "type" => "box",
            "layout" => "baseline",
            "margin" => "lg",
            "contents" => [
              [
                "type" => "text",
                "text" => "New balance",
                "color" => "#C3C3C3"
              ],
              [
                "type" => "text",
                "text" => "฿ 45.57",
                "align" => "end"
              ]
            ]
          ],
          [
            "type" => "separator",
            "margin" => "lg",
            "color" => "#C3C3C3"
          ]
        ]
      ],
      "footer" => [
        "type" => "box",
        "layout" => "horizontal",
        "contents" => [
          [
            "type" => "text",
            "text" => "View Details",
            "size" => "lg",
            "align" => "start",
            "color" => "#0084B6",
            "action" => [
              "type" => "uri",
              "label" => "View Details",
              "uri" => "https://google.co.th/"
            ]
          ]
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
