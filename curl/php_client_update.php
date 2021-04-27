<?php

$url = "http://mydemoapi.com/api/colleges/303";
$username = "admin";
$password = "admin";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


$data = array("college_name"=> "999888", "college_address"=>"999 UPDATE address", "college_phone" => " 0900998888");
$jsonData = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

$jsonResponseString = curl_exec($ch);
echo $jsonResponseString;
curl_close($ch);