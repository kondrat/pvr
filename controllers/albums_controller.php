<?php
class AlbumsController extends AppController {

	var $name = 'Albums';
	var $helpers = array('Html', 'Form');
	
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow( 'index');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
    }
//--------------------------------------------------------------------
	function index() {
		$this->Album->recursive = 0;
		$this->set('albums', $this->paginate());
	}

	function view($id = null) {
		
		$aroAlias = 'user1::3';
		$acoAlias = 'Album::'.$id;
		$aroPath = $this->Acl->Aro->node($aroAlias);
		$acoPath = $this->Acl->Aco->node($acoAlias);
		$foreignKey = $this->Auth->user('id');
		if (empty($aroPath) || empty($acoPath)) {
			$this->Session->setFlash(__('ACL check problem.', true));
			$this->redirect( $this->referer() );
		} else {
			
			if ( $this->Acl->check( array('model' => 'User', 'foreign_key' => $foreignKey), $acoAlias) ) {
			 
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
		
		
	}

	function add() {
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

	function edit($id = null) {
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