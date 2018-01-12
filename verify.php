<?php
$access_token = 'UVfCZ6sYV3+f1ZphcKXA/c6tm51kckZc1qdGkf8Ary9IUI3zcB/JN8h4C0mQb5PlhNfu1GUoEguDGGEqrb/4xZFGJWc23Vsu6XbzP9vZzCQDIgBTCBTyvCWFSmaGoysCk4jDHIGRiwNFm1yGHt+B/wdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
