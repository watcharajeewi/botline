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
  "type" =>  "bubble",
  "hero" =>  {
    "type" =>  "image",
    "url" =>  "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png",
    "size" =>  "full",
    "aspectRatio" =>  "20:13",
    "aspectMode" =>  "cover",
    "action" =>  {
      "type" =>  "uri",
      "uri" =>  "http://linecorp.com/"
    ]
  ],
  "body" =>  {
    "type" =>  "box",
    "layout" =>  "vertical",
    "contents" =>  [
      {
        "type" =>  "text",
        "text" =>  "Brown Cafe",
        "weight" =>  "bold",
        "size" =>  "xl"
      ],
      {
        "type" =>  "box",
        "layout" =>  "baseline",
        "margin" =>  "md",
        "contents" =>  [
          {
            "type" =>  "icon",
            "size" =>  "sm",
            "url" =>  "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          ],
          {
            "type" =>  "icon",
            "size" =>  "sm",
            "url" =>  "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          ],
          {
            "type" =>  "icon",
            "size" =>  "sm",
            "url" =>  "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          ],
          {
            "type" =>  "icon",
            "size" =>  "sm",
            "url" =>  "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
          ],
          {
            "type" =>  "icon",
            "size" =>  "sm",
            "url" =>  "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png"
          ],
          {
            "type" =>  "text",
            "text" =>  "4.0",
            "size" =>  "sm",
            "color" =>  "#999999",
            "margin" =>  "md",
            "flex" =>  0
          ]
        ]
      ],
      {
        "type" =>  "box",
        "layout" =>  "vertical",
        "margin" =>  "lg",
        "spacing" =>  "sm",
        "contents" =>  [
          {
            "type" =>  "box",
            "layout" =>  "baseline",
            "spacing" =>  "sm",
            "contents" =>  [
              {
                "type" =>  "text",
                "text" =>  "Place",
                "color" =>  "#aaaaaa",
                "size" =>  "sm",
                "flex" =>  1
              ],
              {
                "type" =>  "text",
                "text" =>  "Miraina Tower, 4-1-6 Shinjuku, Tokyo",
                "wrap" =>  true,
                "color" =>  "#666666",
                "size" =>  "sm",
                "flex" =>  5
              ]
            ]
          ],
          [
            "type" =>  "box",
            "layout" =>  "baseline",
            "spacing" =>  "sm",
            "contents" =>  [
              {
                "type" =>  "text",
                "text" =>  "Time",
                "color" =>  "#aaaaaa",
                "size" =>  "sm",
                "flex" =>  1
              ],
              {
                "type" =>  "text",
                "text" =>  "10:00 - 23:00",
                "wrap" =>  true,
                "color" =>  "#666666",
                "size" =>  "sm",
                "flex" =>  5
              ]
            ]
          ]
        ]
      ]
    ]
  ],
  "footer" =>  {
    "type" =>  "box",
    "layout" =>  "vertical",
    "spacing" =>  "sm",
    "contents" =>  [
      {
        "type" =>  "button",
        "style" =>  "link",
        "height" =>  "sm",
        "action" =>  {
          "type" =>  "uri",
          "label" =>  "CALL",
          "uri" =>  "https://linecorp.com"
        ]
      ],
      {
        "type" =>  "button",
        "style" =>  "link",
        "height" =>  "sm",
        "action" =>  {
          "type" =>  "uri",
          "label" =>  "WEBSITE",
          "uri" =>  "https://linecorp.com"
        ]
      ],
      {
        "type" =>  "spacer",
        "size" =>  "sm"
      ]
    ],
    "flex" =>  0
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
