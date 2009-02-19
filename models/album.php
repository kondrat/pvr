<?php
class Album extends AppModel {

	var $name = 'Album';
	var $actsAs = array('Containable','Acl' => array('type' => 'controlled'));
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
	
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'counterCache' => '',
							),
						);
							
	function parentNode() {
		//return array('Album' => array('id' => 30) );
		return 'Albums';
	}
}
?>