<?php



require "vendor/autoload.php";

$access_token = 'bHg3caMXHTfsUJ3Psg+sfwwUvB00ZsCehpopYCGrAuufZDrT+WZ9/a8XWrEJcRpdGkOE5m+Bu2P1FJRbx4D3YZ69+AOvXkOcrt1qZ40dCMU9h5ZT9sH43Kxrk/3deMfW2XU4AAIAgqfUkRreo527vgdB04t89/1O/w1cDnyilFU=';

$channelSecret = '45e49a645492d34615a11abb5a68e30b';

$pushID = 'Ub9416c2f0b262e29f616e789841c4ff7';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







