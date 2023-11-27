<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_users extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(

			// User Id's start at 10; 0 = SYSTEM, 1-9 = AUTOMATION
			'id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'auto_increment' => true,
				'null' => false
			),

			// Username
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => 16,
				'null' => false
			),

			// This holds the OAuth2 login data
			'oauth2_data' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			),

			// UNIX timestamp of the date the account was created (registration date)
			'created_on' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// User is a moderator
			'is_moderator' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => true,
				'null' => false
			),

			// Violation count
			'violations' => array(
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => true,
				'null' => false
			),

			// Last post id
			'last_post_id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// Last post date
			'last_post_date' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// Private staff notes about this user
			'staff_notes' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('username', FALSE);
		$this->dbforge->add_key('violations', FALSE);
		$this->dbforge->add_key('is_moderator', FALSE);
		$this->dbforge->create_table('users');

		$this->load->model('user_model');

		// Alter players table to have ID's start at 10.
		$sql = "ALTER TABLE users AUTO_INCREMENT = 10";
		$this->db->query($sql, array());

		// Add SYSTEM user
		$this->user_model->create_new_user(array(
			"username" => "SYSTEM",
			"is_moderator" => true
		));
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}

}
