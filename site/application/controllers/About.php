<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct() {
		parent::__construct();

		// Ensure session language
		if (empty($_SESSION["language"])) {
			$_SESSION["language"] = get_client_locale_language();
		}

		// Configure language
		if (!empty($_POST) && !empty($_POST["set_language"])) {
			$locale = filter_locale_language($_POST["set_language"]);
			$_SESSION["language"] = $locale;
		}

		$language = $_SESSION["language"];
		$this->lang->load(array("main"), $language, false);
	}

	public function index() {
		$data = array();
		$data["title"] = "About";

		$this->load->view("header", $data);
		$this->load->view("about/index");
		$this->load->view("footer");
	}

}
