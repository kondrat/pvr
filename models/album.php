<?php
class Album extends AppModel {

	var $name = 'Album';
	var $actsAs = array('Containable','Acl' => array('type' => 'controlled'));
	var $validate = array(
	    'name' => array(
	    	/*
	        'rule' => 'isUnique',
	        'message' => 'This username has already been taken.'
	        */
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
	function newAlbum( $data = array() ) {
			$this->data['Album']['user_id'] = $data['Album']['user_id'];
			$this->data['Album']['name'] = $data['Album']['name'];
			
			if( $data['Album']['image'] == null ) {
				$this->data['Album']['image'] = 'default.jpg';
			} else {
				$this->data['Album']['image'] = $data['Album']['image'];
			}
			

				if ($this->save($this->data)) {				
					return true;
				} else {
					return false;
				}

	}
	//----------------------------------------------------------------
	function afterSave() {
	}
	//----------------------------------------------------------------

}
?>