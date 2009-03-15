<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2009-03-14 15:03:41 : 1237032101*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	var $file = 'schema_2.php';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $acos = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $albums = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
			'name' => array('type' => 'string', 'null' => false, 'length' => 150),
			'path' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 32),
			'image' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'image_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 12),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $aros = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $aros_acos = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'aro_id' => array('type' => 'integer', 'null' => false, 'length' => 10, 'key' => 'index'),
			'aco_id' => array('type' => 'integer', 'null' => false, 'length' => 10),
			'_create' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'_read' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'_update' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'_delete' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ARO_ACO_KEY' => array('column' => array('aro_id', 'aco_id'), 'unique' => 1))
		);
	var $groups = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => false, 'length' => 64),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
	var $images = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'album_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
			'name' => array('type' => 'string', 'null' => false, 'length' => 150),
			'image' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'album' => array('column' => 'album_id', 'unique' => 0))
		);
	var $users = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'username' => array('type' => 'string', 'null' => false, 'length' => 64, 'key' => 'index'),
			'group_id' => array('type' => 'integer', 'null' => false, 'default' => '0'),
			'password' => array('type' => 'string', 'null' => false, 'length' => 64),
			'email' => array('type' => 'string', 'null' => false, 'length' => 100),
			'contact' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'phone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'company' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
			'business' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'website' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 250),
			'address1' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'bank_detail' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
			'birthday' => array('type' => 'date', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'username' => array('column' => 'username', 'unique' => 1))
		);
}
?>