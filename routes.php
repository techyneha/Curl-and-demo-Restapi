<?php

$routes = array();
$routes["test"]= "TestController/test";
$routes["test/do"]= "TestController/doSomething";

// public routes
$routes["public"] = "PublicController/index";
$routes["public/contacts"] = "PublicController/contacts";
$routes["public/feedback"] = "PublicController/feedback";

//$routes["base"] = "HomeController/index";
$routes["base"] = "PublicController/index";
$routes["logout"] = "LoginController/logout";

// colleges
$routes["colleges"] = "CollegeController/get";
$routes["colleges"] = "CollegeController/post";
$routes["colleges/{id}"] = "CollegeController/put";
$routes["colleges/{id}"] = "CollegeController/delete";

