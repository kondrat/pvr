<?php
class ImagesController extends AppController {

	var $name = 'Images';
	var $helpers = array('Html', 'Form');
	
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow('index');
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

	function add() {
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