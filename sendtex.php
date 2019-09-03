<?php
require "vendor/autoload.php";
$access_token = 'G0zVo2dcDP+YOM6jDvgdn+19a868zOZTDC2JWkFtlYY6V/Nokm6fA0jtKxpwDIbhGkOE5m+Bu2P1FJRbx4D3YZ69+AOvXkOcrt1qZ40dCMVulgygIcxMbSZVRfVeH6F9jSHY+J6X8RqA955B2zSOdgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '45e49a645492d34615a11abb5a68e30b';
$idPush = 'Ub9416c2f0b262e29f616e789841c4ff7'
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
