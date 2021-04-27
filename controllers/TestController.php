<?php

class TestController {

	public function test(){

		echo "<h1> Testing Page Here </h1>";
	}

	public function doSomething(){

		//echo "<h1> Do Something Page Here </h1>";
		$message = "Hello PHP";
		require("./views/test.php");
	}
}