<?php
function baseUrl($url = "") {
	$parts = explode("/", $_SERVER["REQUEST_URI"]);
	$path = $parts[1];
	$contextPath = "/" . $path;
	return $contextPath.$url;
}

function redirect($to) {
	$url = baseUrl($to);
	header("Location: $url", 302);
}