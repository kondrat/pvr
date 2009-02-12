<?php 
/* SVN FILE: $Id$ */
/* Album Test cases generated on: 2009-02-12 14:02:16 : 1234437796*/
App::import('Model', 'Album');

class AlbumTestCase extends CakeTestCase {
	var $Album = null;
	var $fixtures = array('app.album', 'app.image');

	function startTest() {
		$this->Album =& ClassRegistry::init('Album');
	}

	function testAlbumInstance() {
		$this->assertTrue(is_a($this->Album, 'Album'));
	}

	function testAlbumFind() {
		$this->Album->recursive = -1;
		$results = $this->Album->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Album' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'image'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'image_count'  => 1,
			'created'  => '2009-02-12 14:23:16',
			'modified'  => '2009-02-12 14:23:16'
			));
		$this->assertEqual($results, $expected);
	}
}
?>