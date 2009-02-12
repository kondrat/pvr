<?php 
/* SVN FILE: $Id$ */
/* Image Test cases generated on: 2009-02-12 14:02:46 : 1234437826*/
App::import('Model', 'Image');

class ImageTestCase extends CakeTestCase {
	var $Image = null;
	var $fixtures = array('app.image', 'app.album');

	function startTest() {
		$this->Image =& ClassRegistry::init('Image');
	}

	function testImageInstance() {
		$this->assertTrue(is_a($this->Image, 'Image'));
	}

	function testImageFind() {
		$this->Image->recursive = -1;
		$results = $this->Image->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Image' => array(
			'id'  => 1,
			'album_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'image'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-02-12 14:23:46',
			'modified'  => '2009-02-12 14:23:46'
			));
		$this->assertEqual($results, $expected);
	}
}
?>