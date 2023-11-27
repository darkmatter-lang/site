<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_cli()) {
			redirect("/");
		}
	}

	public function every_minute() {

		// TODO: Refresh X Community -> parse HTML -> find posts/elements and last post date


	}

	public function every_hour() {

		// TODO: Aggregate and run graph calculations


	}

	public function every_day() {

	}

}
