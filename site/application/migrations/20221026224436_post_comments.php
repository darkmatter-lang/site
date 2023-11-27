<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_post_comments extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(

			// Post Comment Id
			'id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'auto_increment' => true,
				'null' => false
			),

			// Post Comment Author's User Id
			'author_id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// Internal Post Id
			'post_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'unsigned' => true,
				'null' => false
			),

			// UNIX timestamp of the date the account was created (registration date)
			'created_on' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// Notes on this post
			'comments' => array(
				'type' => 'TEXT',
				'null' => FALSE
			)

		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('author_id', FALSE);
		$this->dbforge->create_table('post_comments');
	}

	public function down() {
		$this->dbforge->drop_table('post_comments');
	}

}
