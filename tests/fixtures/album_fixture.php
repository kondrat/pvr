<?php 
/* SVN FILE: $Id$ */
/* Album Fixture generated on: 2009-02-12 14:02:16 : 1234437796*/

class AlbumFixture extends CakeTestFixture {
	var $name = 'Album';
	var $table = 'albums';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => false, 'length' => 150),
			'image' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'image_count' => array('type'=>'integer', 'null' => true, 'default' => '0', 'length' => 12),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'image'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'image_count'  => 1,
			'created'  => '2009-02-12 14:23:16',
			'modified'  => '2009-02-12 14:23:16'
			));
}
?>