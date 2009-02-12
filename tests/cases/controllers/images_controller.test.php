<?php 
/* SVN FILE: $Id$ */
/* ImagesController Test cases generated on: 2009-02-12 14:02:53 : 1234437893*/
App::import('Controller', 'Images');

class TestImages extends ImagesController {
	var $autoRender = false;
}

class ImagesControllerTest extends CakeTestCase {
	var $Images = null;

	function setUp() {
		$this->Images = new TestImages();
		$this->Images->constructClasses();
	}

	function testImagesControllerInstance() {
		$this->assertTrue(is_a($this->Images, 'ImagesController'));
	}

	function tearDown() {
		unset($this->Images);
	}
}
?>