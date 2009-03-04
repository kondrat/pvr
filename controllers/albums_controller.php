<?php
class AlbumsController extends AppController {

	var $name = 'Albums';
	var $helpers = array('Html', 'Form');
	
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow( 'index','useralbum');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------
	function index() {
		$this->Album->recursive = 0;
		$this->set('albums', $this->paginate());
	}
//--------------------------------------------------------------------
	function useralbum() {

		$currentUser = null;
		$currentUser=$this->Auth->user('id');
		if( $currentUser != null ){
			$currentAlbum = $this->Album->find('first',array('conditions'=>array('Album.user_id' => $currentUser),'contain'=>'Image' ) );
			$this->set('currentAlbum',$currentAlbum);
			//$this->render('useralbum');
		}
		//$this->set('albums', $currentAlbum );
	}
//--------------------------------------------------------------------
	function view($id = null) {
		
		$aroAlias = 'user1::3';
		$acoAlias = 'Album::'.$id;

		if ( $this->Acl->check( array('model' => 'User', 'foreign_key' => $this->Auth->user('id') ), array('model' => 'Album', 'foreign_key' => $id) ) ) {
		 
			if (!$id) {
				$this->Session->setFlash(__('Invalid Album.', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->set('album', $this->Album->read(null, $id));
			//debug($aroAlias.' '.$acoAlias);
		} else {
			$this->redirect(array('controller'=>'albums','action'=>'index') );
		}
		
		
	}
//--------------------------------------------------------------------
	function add() {
		if (!empty($this->data)) {
			/*
			if ($this->RequestHandler->isAjax()) {
				if ($this->Album->save($this->data)) {
						echo "successSSS\n<br />";
				} else {
					//debug($this->Album->invalidFields());
					//$this->layout = 'default';
					//$this->Session->setFlash(__('The Album could not be saved. Please, try again.', true));
					$errors=$this->Album->invalidFields();
					//echo $errors['name'];//__('The Album could not be saved. Please, try again.');
					echo __('The Album could not be saved. Please, try again.',true);
				}
				Configure::write('debug', 0);
				$this->autoRender = false;
			 	exit();
			}
			*/
			$this->data['Album']['user_id'] = $this->Auth->user('id');
			$this->data['Album']['path'] = md5( $this->data['Album']['user_id'].'and'.time() );
			$this->Album->create();
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The Album has been saved', true));
				$this->Acl->allow( array('model' => 'User', 'foreign_key' => $this->Auth->User('id') ), array('model' => 'Album', 'foreign_key' => $this->Album->id),'*' );
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Album could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		//debug( $this->Acl->Aco->node( array('model' => 'Album', 'foreign_key' => $id ) ) );
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Album', true));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!empty($this->data)) {
			$this->data['Album']['image'] = str_replace(array("\n\r","\n","\r"), '<br />',$this->data['Album']['image']);
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The Album has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Album->del($id)) {
			$this->Session->setFlash(__('Album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Album->recursive = 0;
		$this->set('albums', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Album.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('album', $this->Album->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Album->create();
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The Album has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Album could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Album', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The Album has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Album->del($id)) {
			$this->Session->setFlash(__('Album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}

?>