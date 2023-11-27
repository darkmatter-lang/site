<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_posts extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(

			// Internal Post Id
			'id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'auto_increment' => true,
				'null' => false
			),

			// External Post Id
			'post_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'unsigned' => true,
				'null' => false
			),

			// Internal Author Id (our db)
			'author_id' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// External Author Id (X/Twitter's db)
			'poster_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => false
			),

			// UNIX timestamp of the date the account was created (registration date)
			'created_on' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => true,
				'null' => false
			),

			// Post status (0 = Available, 1 = Deleted, 2 = Hidden)
			'status' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'null' => FALSE
			),

			// User Id of who manually reviewed this post
			'reviewed_by' => array(
				'type' => 'BIGINT',
				'constraint' => 12,
				'unsigned' => TRUE,
				'null' => FALSE
			),


			// Post contents
			'content' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),

			// Embed status (0 = Has not been Embedded, 1 = Embedded)
			'embed_status' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'null' => FALSE
			),


			// Additional notes to this 
			'moderator_notes' => array(
				'type' => 'TEXT',
				'null' => FALSE
			)

		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('posts');
	}

	public function down() {
		$this->dbforge->drop_table('posts');
	}

}
