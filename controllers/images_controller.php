<?php
class ImagesController extends AppController {

	var $name = 'Images';
	var $helpers = array('Html', 'Form');
	var $components = array('Upload','UploadDemo','Cookie');
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow('index','add');
        //to Del:
        $this->Auth->allowedActions = array('*');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
	}
//--------------------------------------------------------------------

	function index() {
		$this->Image->recursive = 0;
		$this->paginate['limit']=5;
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
	function addAjax() {
		Configure::write('debug', 0);
		if (!empty($this->data) ) {
			
			if( $this->Auth->user('id') ) {
				$path = $this->Image->Album->find('first', array('conditions'=> array('Album.user_id'=> $this->Auth->user('id'),'Album.id'=> $this->data['Image']['album_id']), 'fields'=> array('path'),'contain'=>false ) );
			}

			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.Configure::read('farm').DS.$this->Auth->user('uuid').DS;
			//debug($destination );
			//exit;
			// grab the file
			$file = $this->data['Image']['userfile'];
			//debug($file);
			if ( !is_array($file) || $file == array() ||$file['error'] == 4) {
				echo '{"message":"'.__('Image wasn\'t uploaded',true).'"}';
				$this->autoRender = false;
				exit();			
			} else {									
					// upload the image using the upload component

								$result = $this->Upload->upload($file, $destination, $org );
								if ($result != 1) {
									//debug($this->Upload->result);
									$this->data['Image']['image'] = $this->Upload->result;
									
								}

						
						if ( $result == 1 ) {
							// display error
							$errors = $this->Upload->errors;
							// piece together errors
							if( is_array($errors) ) { 
								$errors = implode("<br />",$errors); 
							}
								//echo $errors;
								echo '{"message":"'.$errors.'"}';
								$this->autoRender = false;
				 				exit();
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

								$imgToReturn = 	unserialize($this->data['Image']['image']);
								if ($imgToReturn['img']['md'] != array() ) {
									$img = $imgToReturn['img']['img'].'-md';
									$widthImg = $imgToReturn['img']['md']['width'];
								} else {
									$img = $imgToReturn['img']['img'].'-lrg';
								}
								$thumb = $imgToReturn['img']['img'].'-sq';	
								$arr = array ('message'=> __('The Image has been saved',true), 'img'=> $img,'thumb'=> $thumb,'path'=> $this->Auth->user('uuid'),'imgWidth'=> $widthImg );
								echo json_encode($arr);						
								$this->autoRender = false;
				 				exit();
				 						
							//$this->Session->setFlash( __('The Image has been saved', true) );
							//$this->redirect( array('controller' => 'albums','action' => 'useralbum',$this->data['Image']['album_id']) );
						} else {					
							//$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
							if ($this->Upload->result != null) {
								@unlink($destination.$this->Upload->result);
								$this->autoRender = false;
								$arr = array ('message'=> __('The Image could not be saved. Please, try again.',true), 'kon'=> 'test');
								echo json_encode($arr);	
				 				exit();
							}
						}
						


			}
			
			
		}


	}
//--------------------------------------------------------------------
	function addAjaxHome() {
		
		Configure::write('debug', 0);

			if (!empty($this->data) ) {
	
				$file = array();
				// set the upload destination folder
				$destination = WWW_ROOT.'img'.DS.Configure::read('farm').DS.'guest'.DS;
				//debug($destination );

				// grab the file
				$file = $this->data['Image']['userfile'];
				//debug($file);
				$ttt = $this->Cookie->read('guestKey');
				if ( !is_array($file) || $file == array() ||$file['error'] == 4) {
					//echo '{"message":"'.__('Image wasn\'t uploaded',true).'"}';
					echo '{"message":"'.$ttt.'"}';
					$this->autoRender = false;
					exit();			
				} else {									
						// upload the image using the upload component
	
									$result = $this->Upload->upload($file, $destination, $org );
									if ($result != 1) {
										//debug($this->Upload->result);
										$this->data['Image']['image'] = $this->Upload->result;
										
									}
	
							
							if ( $result == 1 ) {
								// display error
								$errors = $this->Upload->errors;
								// piece together errors
								if( is_array($errors) ) { 
									$errors = implode("<br />",$errors); 
								}
									//echo $errors;
									echo '{"message":"'.$errors.'"}';
									$this->autoRender = false;
					 				exit();
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
	
									$imgToReturn = 	unserialize($this->data['Image']['image']);
									if ($imgToReturn['img']['md'] != array() ) {
										$img = $imgToReturn['img']['img'].'-md';
										$widthImg = $imgToReturn['img']['md']['width'];
									} else {
										$img = $imgToReturn['img']['img'].'-lrg';
									}
									$thumb = $imgToReturn['img']['img'].'-sq';	
									$arr = array ('message'=> __('The Image has been saved',true), 'img'=> $img,'thumb'=> $thumb,'path'=> $this->Auth->user('uuid'),'imgWidth'=> $widthImg );
									echo json_encode($arr);						
									$this->autoRender = false;
					 				exit();
					 						
								//$this->Session->setFlash( __('The Image has been saved', true) );
								//$this->redirect( array('controller' => 'albums','action' => 'useralbum',$this->data['Image']['album_id']) );
							} else {					
								//$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
								if ($this->Upload->result != null) {
									@unlink($destination.$this->Upload->result);
									$this->autoRender = false;
									$arr = array ('message'=> __('The Image could not be saved. Please, try again.',true), 'kon'=> 'test');
									echo json_encode($arr);	
					 				exit();
								}
							}
							
	
	
				}
				
				
			}
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
//--------------------------------------------------------------------
	function admin_addDemo() {
		if (!empty($this->data)) {
			
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img/demo/';
			// grab the file
			$file = $this->data['Image']['userfile'];	
			//debug($file);	
			if ( !is_array($file) || $file == array() ||$file['error'] == 4) {
				$this->Session->setFlash(__('Image wasn\'t uploaded',true));
				
			} else {									
					// upload the image using the upload component

						$result = $this->UploadDemo->upload($file, $destination);
					
						if ($result != 1) {
							$this->data['Image']['image'] = $this->UploadDemo->result;							
						}

						
								if ( $result == 1 ) {
									// display error
										$errors = $this->UploadDemo->errors;
										// piece together errors
										if( is_array($errors) ) { 
											$errors = implode("<br />",$errors); 
										}								
										$this->Session->setFlash($errors, 'default', array('class' => 'error'));
								}					
						
			}		
			
			if ( isset($this->data['Image']['image']) && $this->data['Image']['image'] != null ){
						/*	
						if ( $this->Session->check('Album.Id') ) {
							$this->data['Image']['album_id'] = $this->Session->read('Album.Id');
						} else {
							$this->data['Image']['album_id'] = $this->data['Image']['album_id'];
						}
						*/
						$this->Image->create();
						if ($this->Image->save($this->data)) {

								$imgToReturn = 	unserialize($this->data['Image']['image']);
								if ($imgToReturn['img']['md'] != array() ) {
									$img = $imgToReturn['img']['img'].'-md';
									$widthImg = $imgToReturn['img']['md']['width'];
								} else {
									$img = $imgToReturn['img']['img'].'-lrg';
								}
								$thumb = $imgToReturn['img']['img'].'-sq';	
								$arr = array ('message'=> __('The Image has been saved',true), 'img'=> $img,'thumb'=> $thumb,'path'=> $this->Auth->user('uuid'),'imgWidth'=> $widthImg );
								echo json_encode($arr);						
								//$this->autoRender = false;
				 				//exit();
				 						
							//$this->Session->setFlash( __('The Image has been saved', true) );
							//$this->redirect( array('controller' => 'albums','action' => 'useralbum',$this->data['Image']['album_id']) );
						} else {					
							//$this->Session->setFlash(__('The Image could not be saved. Please, try again.', true));
							if ($this->UploadDemo->result != null) {
								@unlink($destinationB.$this->UploadDemo->result);
								$this->autoRender = false;
								$arr = array ('message'=> __('The Image could not be saved. Please, try again.',true), 'kon'=> 'test');
								echo json_encode($arr);	
				 				//exit();
							}
						}
			}	
			
		}
	}
//--------------------------------------------------------------------
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