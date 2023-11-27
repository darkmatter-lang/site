<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create_new_user($details=array()) {

		$default_details = array(
			"username" => hash("md5", bin2hex(random_bytes(32))),
			"oauth2_data" => "{}",
			"created_on" => time(),
			"is_moderator" => false,
			"violations" => 0,
			"last_post_id" => 0,
			"last_post_date" => 0,
			"staff_notes" => ""
		);

		$details = array_merge($default_details, $details);

		$this->db->insert('users', array(
			"username" => $details['username'],
			"oauth2_data" => $details["oauth2_data"],
			"created_on" => $details["created_on"],
			"is_moderator" => $details["is_moderator"],
			"violations" => $details["violations"],
			"last_post_id" => $details["last_post_id"],
			"last_post_date" => $details["last_post_date"],
			"staff_notes" => $details['staff_notes']
		));

		$user_id = $this->get_id_from_username($details['username']);

		// Woah wait... the user doesn't exist?!
		if (empty($user_id)) {
			return false;
		}

		return true;
	}

	function get_id_from_username($username) {
		$sql = "SELECT id FROM users WHERE username = ? LIMIT 1";
		$query = $this->db->query($sql, array($username));

		if (!empty($query)) {
			if (!empty($query->result_array())) {
				foreach ($query->result_array() as $row) {
					return $row['id'];
				}
			}
		}

		return null;
	}

	function get_all_from_id($id) {
		$query = $this->db->query("SELECT * FROM users WHERE id = ?", array($id));
		return $query->row_array();
	}

	function get_all_from_username($username) {
		$query = $this->db->query("SELECT * FROM users WHERE username = ?", array($username));
		return $query->row_array();
	}

	function username_exists($username) {
		$query = $this->db->query("SELECT id FROM users WHERE username = ?", array($username));
		if (!empty($query)) {
			if (!empty($query->row_array())) {
				return true;
			}
		}
		return false;
	}

}
