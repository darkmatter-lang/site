<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert($user_id=0, $category="system", $description="") {

		$this->db->insert('logs', array(
			"created_on" => time(),
			"created_by" => $user_id,
			"category" => $category,
			"description" => $description
		));

		return true;
	}

}
