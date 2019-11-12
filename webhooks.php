<?php // callback.php
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'G0zVo2dcDP+YOM6jDvgdn+19a868zOZTDC2JWkFtlYY6V/Nokm6fA0jtKxpwDIbhGkOE5m+Bu2P1FJRbx4D3YZ69+AOvXkOcrt1qZ40dCMVulgygIcxMbSZVRfVeH6F9jSHY+J6X8RqA955B2zSOdgdB04t89/1O/w1cDnyilFU=';

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
$text = $event['source']['userId'];
// Get replyToken
$replyToken = $event['replyToken'];
// Build message to reply back
if($text == 'Ub9416c2f0b262e29f616e789841c4ff7'){

$messages = [
  "type": "flex",
  "altText": "Flex Message",
  "contents": [
    "type": "bubble",
    "direction": "ltr",
    "body": [
      "type": "box",
      "layout": "vertical",
      "contents": [
        [
          "type": "text",
          "text": "Brown Cafe",
          "size": "xl",
          "weight": "bold"
        ],
        [
          "type": "box",
          "layout": "vertical",
          "spacing": "sm",
          "margin": "lg",
          "contents": [
            [
              "type": "box",
              "layout": "baseline",
              "spacing": "sm",
              "contents": [
                [
                  "type": "text",
                  "text": "Place",
                  "flex": 1,
                  "size": "sm",
                  "color": "#AAAAAA"
                ],
                [
                  "type": "text",
                  "text": "Miraina Tower, 4-1-6 Shinjuku, Tokyo",
                  "flex": 5,
                  "size": "sm",
                  "color": "#666666",
                  "wrap": true
                ]
              ]
            ],
            [
              "type": "box",
              "layout": "baseline",
              "spacing": "sm",
              "contents": [
                [
                  "type": "text",
                  "text": "Time",
                  "flex": 1,
                  "size": "sm",
                  "color": "#AAAAAA"
                ],
                [
                  "type": "text",
                  "text": "10:00 - 23:00",
                  "flex": 5,
                  "size": "sm",
                  "color": "#666666",
                  "wrap": true
                ]
              ]
            ]
          ]
        ]
      ]
    ],
    "footer": [
      "type": "box",
      "layout": "vertical",
      "flex": 0,
      "spacing": "sm",
      "contents": [
        [
          "type": "button",
          "action": [
            "type": "message",
            "label": "ไม่อนุมัติ",
            "text": "no-1"
          ],
          "flex": 1,
          "color": "#A59191",
          "height": "sm",
          "style": "primary",
          "gravity": "bottom"
        ],
        [
          "type": "button",
          "action": [
            "type": "message",
            "label": "อนุมัติ",
            "text": "yes-1"
          ],
          "flex": 1,
          "style": "primary"
        ]
      ]
    ],
    "styles": [
      "footer": [
        "separator": true
      ]
    ]
  ]
];
  
  
} else {
$messages = [
'type' => 'text',
'text' => $text
];
}


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
