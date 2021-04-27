<?php

class PublicController {

	public function index() {
		require("./views/public/default.php");
		//require("./views/welcome.php");
	}

	public function contacts() {
		require("./views/public/contacts.php");
	}

	public function feedback() {
		require("./views/public/feedback.php");
	}
}