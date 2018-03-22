<?php


require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
require "vendor/autoload.php";

$access_token = 'HBhmJZbsYgD9hJVJa3rhLWI0Fs7XOoD/cG4+om7AYjAmczOeWzWVd5KoT8EDNAWpNVdjPj9zRppwjAtIrrpfqgTDJhWLF3vVi/LbVdOV0uU8Cy1TSnLI67/Wvypq8G3UQf8Dm5P3wSEEjyFCm10MhAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '5697aa6eb774e12ef1c99ed4f3536aa2';

$pushID = 'U6c98ba9313e7f42b5fd5f9c03ad01cc8';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($events);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







