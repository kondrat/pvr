<?php 
/* SVN FILE: $Id$ */
/* Image Fixture generated on: 2009-02-12 14:02:46 : 1234437826*/

class ImageFixture extends CakeTestFixture {
	var $name = 'Image';
	var $table = 'images';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
			'album_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
			'name' => array('type'=>'string', 'null' => false, 'length' => 150),
			'image' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'album' => array('column' => 'album_id', 'unique' => 0))
			);
	var $records = array(array(
			'id'  => 1,
			'album_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'image'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-02-12 14:23:46',
			'modified'  => '2009-02-12 14:23:46'
			));
}
?>