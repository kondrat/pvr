<?php
class Album extends AppModel {

	var $name = 'Album';
	var $actsAs = array('Containable','Acl' => array('type' => 'controlled'));
	var $validate = array(
	    'name' => array(
	        'rule' => 'isUnique',
	        'message' => 'This username has already been taken.'
	    )
	);

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
								//'counterQuery' => ''
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
	//----------------------------------------------------------------

	function beforeSave() {
		return true;
	}

	//----------------------------------------------------------------
	function afterSave() {
		mkdir('img/gallery/'.$this->data['Album']['path'] );
		mkdir('img/gallery/'.$this->data['Album']['path'].'/b' );
		mkdir('img/gallery/'.$this->data['Album']['path'].'/s' );
		mkdir('img/gallery/'.$this->data['Album']['path'].'/org' );
	}
	//----------------------------------------------------------------
	function firstAlbum() {
	}
}
?>