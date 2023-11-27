<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('logs_model');
		$this->load->model('user_model');

		// Ensure session language
		if (empty($_SESSION["language"])) {
			$_SESSION["language"] = get_client_locale_language();
		}

		if (!empty($_POST) && !empty($_POST["set_language"])) {
			$locale = filter_locale_language($_POST["set_language"]);
			$_SESSION["language"] = $locale;
		}

		$language = $_SESSION["language"];
		$this->lang->load(array("main"), $language, false);

	}

	public function index() {

		$data = array();
		$data["title"] = "Home";
		$data["disable_navbar"] = true;

		$this->load->view("header", $data);
		$this->load->view("home");
		$this->load->view("footer");
	}




	public function migrate() {
		$header_data = array();
		$header_data["title"] = "Migration";

		$this->config->load('migration', TRUE);

		if ($this->config->item("migration_enabled", "migration") === TRUE) {

			$this->load->library('migration');

			if ($this->migration->current() === FALSE) {
				show_error($this->migration->error_string());
			} else {
				$this->logs_model->insert($_SESSION["id"], "migration", "Successful migration by " . get_client_ip());
				echo "Migration successful!";
			}
		} else {
			$this->logs_model->insert($_SESSION["id"], "migration", "Failed migration by " . get_client_ip());
			$this->error();
		}
	}

	public function error($error_code=404) {
		$data = array();
		$data["title"] = "Error " . $error_code;

		if (empty($_SESSION['logged_in'])) {
			$data["disable_navbar"] = true;
		}

		if ($error_code == 403) {
			header("HTTP/1.1 403 Forbidden");
		} else if ($error_code == 404) {
			header("HTTP/1.1 404 Not Found");
		} else if ($error_code == 418) {
			header("HTTP/1.1 418 I'm a teapot");
			die("may be short and stout");
		} else if ($error_code == 500) {
			header("HTTP/1.1 500 Internal Server Error");
		}
		$data['error'] = $error_code;

		$this->load->view("header", $data);
		$this->load->view("error");
		$this->load->view("footer");
	}

}
