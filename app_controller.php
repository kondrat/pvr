<?php

class AppController extends Controller {
	var $components = array( 'Acl','Auth', 'RequestHandler', 'Email', 'Cookie','DebugKit.Toolbar');
    var $helpers = array('Javascript', 'Html', 'Form', 'Cache');
    var $publicControllers = array('pages', 'test');
   	//var $uses = array('');
//--------------------------------------------------------------------
	function beforeFilter() {
	
		$defaultLang = Configure::read('Languages.default');
		
		$this->L10n = new L10n();
		debug($this->L10n->get(null));

		debug(env('HTTP_ACCEPT_LANGUAGE'));
		
		if ( !isset($this->params['lang']) && !$this->Session->check('langSes') ) {
			$this->params['lang'] = $defaultLang;
			$this->Session->write('langSes',$defaultLang);
			$this->Session->write('testSes', 'case1');
			
		} elseif ( !isset($this->params['lang']) && $this->Session->check('langSes') ) {
			$this->params['lang'] = $this->Session->read('langSes');
			$this->Session->write('testSes', 'case2');
		} 

		
		Configure::write('Config.language', $this->params['lang']);
		$this->Session->write('langSes',$this->params['lang']);
		
		
		if ( ($this->name != 'App') && !in_array($this->params['lang'], Configure::read('Languages.all')) ) {
			unset($this->params['lang']);
			$this->Session->del('langSes');
			$this->Session->setFlash(__('Whoops, not a valid language.', true));
			$this->redirect('/', 301, true);
		}
		
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