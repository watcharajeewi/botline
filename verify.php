<?php
$access_token = 'mgx3cNaNGOQQUvZP4unzqGHp4JNtvsG/DgSLimeYmlQTQIxpyEObjRzjJmna71zWXdv6o6wnA0wOzGjKvu0NCt1As7y6Weq7tZvxeDDouZjTRFtSuyiJZK3qc74oUA9d3jO6siKtGDODL3hwrYkzhwdB04t89/1O/w1cDnyilFU=';

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
