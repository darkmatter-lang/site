<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index($id=null) {
		$data = array();
		$data["title"] = "Logs";
		$data["description"] = "Logs";
		


		$this->load->view("header", $data);
		$this->load->view("logs/index");
		$this->load->view("footer");
	}

}
