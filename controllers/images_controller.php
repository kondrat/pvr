<?php
class ImagesController extends AppController {

	var $name = 'Images';
	var $helpers = array('Html', 'Form');
	var $components = array('Upload');
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow('index','add');
        //to Del:
        //$this->Auth->allowedActions = array('*');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------

	function index() {
		$this->Image->recursive = 0;
		$this->set('images', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Image.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('image', $this->Image->read(null, $id));
	}
//--------------------------------------------------------------------
	function add() {
		if (!empty($this->data)) { 
			$file = array();
			// set the upload destination folder
			$destinationB = WWW_ROOT.'img'.DS.'gallery'.DS.'b'.DS;
			$destinationS = WWW_ROOT.'img'.DS.'gallery'.DS.'s'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Image']['userfile'];
			//debug($file);
			if ($file['error'] == 4) {	
				$this->Session->setFlash('Файл не загружен');			
			} else {									
					// upload the image using the upload component
					for ( $i=0; $i<=1; $i++) {
						switch($i) {
							case(0):
								$result = $this->Upload->upload($file, $destinationB, null, array('type' => 'resize', 'size' => '600' ) );
								if ($result != 1) {
									$this->data['Image']['image'] = $this->Upload->result;
								}
								break;
							case(1):
								$result = $this->Upload->upload($file, $destinationS, null, array('type' => 'resizecrop', 'size' => array('100', '100') ) ); 
								break;
						}
						if ( $result == 1 ) {
							// display error
							$errors = $this->Upload->errors;
							// piece together errors
							if( is_array($errors) ) { 
								$errors = implode("<br />",$errors); 
							}
			   
								$this->Session->setFlash($errors);
								@unlink($destinationB.$this->data['Image']['image']);
								$this->redirect(array('action' => 'add'), null, true);
						}					
					}
						
			}		
			
			if ( isset($this->data['Image']['image']) && $this->data['Image']['image'] != null ){
				
				
				
						if ( $this->Session->check('Album.Id') ) {
							$this->data['Image']['album_id'] = $this->Session->read('Album.Id');
						} else {
							$this->data['Image']['album_id'] = $this->data['Image']['album_id'];
						}
						
						$this->Image->create();
						if ($this->Image->save($this->data)) {
							echo "successSSS\n<br />";
							Configure::write('debug', 0);
							$this->render('useralbum','ajax');
			 		//exit();				
							$this->Session->setFlash( __('The Image has been saved', true) );
							//$this->redirect( array('controller' => 'albums','action' => 'useralbum',$this->data['Image']['album_id']) );
						} else {					
							$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
							if ($this->Upload->result != null) {
								@unlink($destinationB.$this->Upload->result);
								@unlink($destinationS.$this->Upload->result);
							}
						}
						


			}
			
			
		}
		/*
			$this->Image->create();
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash(__('The Image has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
			}
		}
		*/
		$albums = $this->Image->Album->find('list');
		$this->set(compact('albums'));
	}
//--------------------------------------------------------------------
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Image', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash(__('The Image has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Image->read(null, $id);
		}
		$albums = $this->Image->Album->find('list');
		$this->set(compact('albums'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Image', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Image->del($id)) {
			$this->Session->setFlash(__('Image deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Image->recursive = 0;
		$this->set('images', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Image.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('image', $this->Image->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Image->create();
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash(__('The Image has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
			}
		}
		$albums = $this->Image->Album->find('list');
		$this->set(compact('albums'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Image', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash(__('The Image has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Image->read(null, $id);
		}
		$albums = $this->Image->Album->find('list');
		$this->set(compact('albums'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Image', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Image->del($id)) {
			$this->Session->setFlash(__('Image deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>