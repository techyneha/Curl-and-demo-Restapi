<?php

$url = "http://mydemoapi.com/api/colleges";
$username = "admin";
$password = "admin";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


$data = array("college_name"=> "999 college", "college_address"=>"999 new address", "college_phone" => "New 0900998888");
$jsonData = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");


$jsonResponseString = curl_exec($ch);
echo $jsonResponseString;
curl_close($ch);