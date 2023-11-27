<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_logs extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(

			// Auto incrementing ID
			'id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			),

			// UNIX time of entry
			'created_on' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// User ID (SYSTEM = 0)
			'created_by' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),
			
			// Category name
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => 12,
				'null' => false
			),

			// Log description
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false
			)

			// TODO: there should be a "payload" field for k->v pairs (encoded as JSON text) and then used in php as variable/place holders in the description i.e. ${key}

		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('logs');
	}

	public function down() {
		$this->dbforge->drop_table('logs');
	}

}
