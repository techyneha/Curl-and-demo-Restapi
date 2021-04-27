<?php

$url = "http://mydemoapi.com/api/colleges";
$username = "admin";
$password = "admin";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$jsonResponseString = curl_exec($ch);
echo $jsonResponseString;
curl_close($ch);