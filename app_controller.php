<?php
class AppController extends Controller {
	var $components = array( 'Acl','Auth', 'RequestHandler', 'Email', 'Cookie','DebugKit.Toolbar');
    var $helpers = array('Javascript', 'Html', 'Form', 'Cache');
    var $publicControllers = array('pages', 'test');
   	//var $uses = array('');
//--------------------------------------------------------------------
	function beforeFilter() {
		
	// to study	
	
		$defaultLang = Configure::read('Languages.default');
		$this->params['theme'] = isset($this->params['theme'])?$this->params['theme']:'default';
		$this->params['lang'] = isset($this->params['lang'])?$this->params['lang']:$defaultLang;
		
		Configure::write('Config.language', $this->params['lang']);
		
		if (isset($this->params['lang']) ) {
			debug($this->params['lang']);
		}
		
		if ( ($this->name != 'App') && !in_array($this->params['lang'], Configure::read('Languages.all')) ) {
			$this->Session->setFlash(__('Whoops, not a valid language.', true));
			return $this->redirect($this->Session->read('referer'), 301, true);
		}
		if (isset($this->Node)) {
			$this->Node->setLanguage($this->params['lang']);
		} elseif (isset($this->{$this->modelClass}->Node)) {
			$this->{$this->modelClass}->Node->setLanguage($this->params['lang']);
		}

	//to study
	
	
		
        if( isset($this->Auth) ) {
								
            if($this->viewPath == 'pages' && $this->params['action'] != 'admin_index') {
                $this->Auth->allow('*');
            } else {
                $this->Auth->authorize = 'actions';
	            if ( in_array( low($this->params['controller']), $this->publicControllers) ) {
                	//$this->Auth->allow('*');
                	$this->Auth->deny('pages/admin_index');
                }
            }
            $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');

        } 
				
	}
	
	function isAuthorized() {

            if ($this->Auth->user('group_id') == '1') {
                return true;
            } else {
                return false;
            }
        return true;
    }

//--------------------------------------------------------------------

	function beforeRender() {
		if( ( (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') or isset($this->params['admin']) ) && $this->Session->read('Auth.User.role') == 'admin' ) {			
			$this->layout = 'admin';
		}
		
		
		
	}

}
?>