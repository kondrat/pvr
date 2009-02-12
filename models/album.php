<?php
class Album extends AppModel {

	var $name = 'Album';
	//var $actsAs = array('Acl' => array('type' => 'controlled'));
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Image' => array('className' => 'Image',
								'foreignKey' => 'album_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);
	
	function parentNode() {
		$a = $this->node();
		return array('Album' => array('id' => $a[0]['Aro']['foreign_key']));
	}
}
?>