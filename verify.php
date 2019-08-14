<?php
$access_token = 'PGBMijZ4ngD7VXf+188ECL1mkiNq8kLk43w3MYYmoqe/J/NISklUj6X6P5lWdKi4m/0yJmwLRjEZDqY+mg71QGPlk/FcziLetNQyrunFUnV8uNA9HYGMyPz1sxk66oiHB4f2yp1A7Hm719D/6lIK8QdB04t89/1O/w1cDnyilFU=';

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
