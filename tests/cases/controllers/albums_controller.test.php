<?php 
/* SVN FILE: $Id$ */
/* AlbumsController Test cases generated on: 2009-02-12 14:02:29 : 1234437869*/
App::import('Controller', 'Albums');

class TestAlbums extends AlbumsController {
	var $autoRender = false;
}

class AlbumsControllerTest extends CakeTestCase {
	var $Albums = null;

	function setUp() {
		$this->Albums = new TestAlbums();
		$this->Albums->constructClasses();
	}

	function testAlbumsControllerInstance() {
		$this->assertTrue(is_a($this->Albums, 'AlbumsController'));
	}

	function tearDown() {
		unset($this->Albums);
	}
}
?>