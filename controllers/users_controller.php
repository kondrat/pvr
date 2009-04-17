<?php
uses('sanitize');
$mrClean = new Sanitize();

class UsersController extends AppController {
	//var $uses = array('User');
	var $name = 'Users';
	var $helpers = array('Form');
	var $components = array( 'Security','userReg','kcaptcha');
	var $pageTitle = 'Данные пользователя';
	var $paginate = array('limit' => 5);

//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow( 'logout', 'reg','kcaptcha', 'reset', 'acoset','aroset','permset','buildAcl');
        //to Del:
        $this->Auth->allowedActions = array('*');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
        
        // swiching off Security component for ajax call
				if( isset($this->Security) && $this->RequestHandler->isAjax() ) {
     			$this->Security->enabled = false; 
     		}
    }
//--------------------------------------------------------------------
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate() );
	}
//--------------------------------------------------------------------
	function login() {
		$this->pageTitle = __('Login',true);
	
		if( !empty($this->data) ) {

			if( $this->Auth->login() ) {
				
            	// Retrieve user data

             		
           		if ( $this->Auth->user() ) {
             			$this->data['User']['remember_me'] = true;
										if ( !empty($this->data) && $this->data['User']['remember_me'] ) {
											$cookie = array();
											$cookie['username'] = $this->data['User']['username'];
											$cookie['password'] = $this->data['User']['password'];
											$this->Cookie->write('Auth.User', $cookie, true, '+3 hours');
											unset($this->data['User']['remember_me']);
										}
         			}

					if ($this->referer()=='/') {
						if( $this->User->Album->find('count',array('conditions'=> array('Album.user_id'=> $this->Auth->user('id') ), 'order'=>'desc') ) < '1' ) {
							$this->redirect( array('controller'=>'albums','action'=>'add') );
						}
						echo 'here';
						exit;
						$this->redirect( array('controller'=>'albums','action'=>'useralbum', 'lang'=> $this->params['lang'] ) );	
					} else {
						//echo 'here';
					//	debug($this->Auth->redirect());
						//debug($this->referer());
						if ( isset($this->params['lang']) ) {
							//echo $this->params['lang'];
						}
						$this->redirect( $this->Auth->redirect() );
					}
			
			} else {
				$this->data['User']['password'] = null;
				$this->Session->setFlash(__('Check your login and password',true),'default', array('class' => 'nomargin flash'));
			}
		} else {
			if( !is_null( $this->Session->read('Auth.User.username') ) ){
				
				$this->redirect( $this->Auth->redirect() );			
			}
		}
		
	}

//--------------------------------------------------------------------
    function logout() {
    	//$tempUserName = ucwords($this->Session->read('Auth.User.username')). ' logged out now';
    	$tempUserName = $this->Session->read('Auth.User.username'). ' вышел из системы';
    	//$this->Session->del();
        $this->Auth->logout();
        $this->Session->del('Order');
        $this->Session->del('userCart');
        $this->Cookie->del('Auth.User');
        $this->Session->setFlash( $tempUserName, 'default', array('class' => 'nomargin flash') );
        $this->redirect( $this->Auth->redirect() );        
    }
//--------------------------------------------------------------------
	function reg() {
		
		if($this->Auth->user('id')) {
			$this->redirect('/',null,true);
		}
		
		$this->pageTitle = __('SignUp',true);



		
		if ( !empty($this->data) ) {
			
			
		
			
		$this->data['User']['captcha2'] = $this->Session->read('captcha');
		/*				
		if ( strtolower($this->data['User']['captcha']) == strtolower( $this->Session->read('captcha')) ) {
			echo 'ya kroot';
		} else {
			echo 'ya ne kroot';
		}
		*/
		
			$uuid = $this->data['User']['uuid'] = uniqid();

			if ( $this->User->save( $this->data) ) {
				
				$a = $this->User->read();
				$this->Auth->login($a);
				$this->Session->setFlash(__('New user\'s accout has been created',true));
				unset($this->data);
				$this->data['Album']['user_id']=$this->User->id;
				$this->data['Album']['name'] = 'newAlbum';
				$this->data['Album']['image'] = 'default.jpg';
				
				if( @mkdir('img/'.Configure::read('farm').'/'.$uuid ) ){
					if( !$this->User->Album->newAlbum($this->data) ) {
						$this->redirect(array('controller' => 'albums','action'=>'add'),null,true);
					}
				} else {
					$this->redirect(array('controller' => 'albums','action'=>'add'),null,true);
				}

				//debug($a);
				
               	$this->redirect(array('controller' => 'albums','action'=>'useralbum'),null,true);
         	} else {
         		// Failed, clear password field
				//$this->data['User']['password1'] = null;
				//$this->data['User']['password2'] = null;
				$this->data['User']['captcha'] = null;
				$this->Session->setFlash(__('New user\'s accout hasn\'t been created',true) , 'default', array('class' => 'error') );
			}
		}
		
		$this->set('groups', $this->User->Group->find('list'));

	}
	//ajax staff
		function userNameCheck() {

			$errors = array();
			Configure::write('debug', 0);
			$this->autoRender = false;
			//don't foreget about santization and trimm
			if (!empty($this->data) && $this->data['User']['username'] != null) {
				if ($this->RequestHandler->isAjax()) {
					$this->User->set( $this->data );
					$errors = $this->User->invalidFields();
					if($errors == array()) {
						$type = 1;
						$errors['username'] = __('Login is free',true);
					} else {
						$type = 0;
					}
					echo json_encode(array('hi'=> $errors['username'], 'typ'=> $type));
					
							Configure::write('debug', 0);
							$this->autoRender = false;
				 			exit();						
						
				}
			} else {
					echo json_encode(array('hi'=> __('This field cannot be left blank',true), 'typ'=> 0));
					
							Configure::write('debug', 0);
							$this->autoRender = false;
				 			exit();	
			}		
		}
		//kcaptcha stuff
    function kcaptcha() {
        $this->kcaptcha->render(); 
    } 
    function kcaptchaReset() {
    	Configure::write('debug', 0);
    	$this->autoRender = false;
     	$this->kcaptcha->render(); 
     	exit();
    } 
//--------------------------------------------------------------------
	function thanks() {
	}
//--------------------------------------------------------------------
    function reset() {

    	if( empty($this->data) ) {
    		return;    		
    	}

		// Check email is correct
		$user = $this->User->find( array('User.email' => $this->data['User']['email']) , array('id', 'username', 'email'), null, 0 );
		if(!$user) {
			$this->User->invalidate('email', 'Этот E-mail не зарегистрирован' );
			return;
		}
		
		// Generate new password
		$password = $this->userReg->createPassword();
		$data['User']['password'] = $this->Auth->password($password);
		$this->User->id = $user['User']['id'];
		if(!$this->User->saveField('password', $this->Auth->password($password) ) ) {
			return;
		}
		
		// Send email
		if(!$this->__sendNewPasswordEmail( $user, $password) ) {
			$this->flash('Internal server error during sending mail', 'restore', 10);
		}
		else {
			$this->flash('New password sent to '.$user['User']['email'].'. Please login', '/users/login', 10);
		}
    }
//--------------------------------------------------------------------
    /**
     * Send out an password reset email to the user email
     * 	@param Array $user User's details.
     *  @param Int $password new password.
     *  @return Boolean indicates success
    */
    function __sendNewPasswordEmail($user, $password) {

        // Set data for the "view" of the Email
        $this->set('password', $password );
        $this->set( 'username', $user['User']['username'] );
       
        $this->Email->to = $user['User']['username'].'<'.$user['User']['email'].'>';
        $this->Email->subject = env('SERVER_NAME') . ' - New password';
        $this->Email->from = 'noreply@' . env('SERVER_NAME');
        $this->Email->template = 'user_password_reset';
        $this->Email->sendAs = 'text';   // you probably want to use both :)   
        return $this->Email->send();
	}     
//--------------------------------------------------------------------
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid User');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if (!empty($this->data)) {
			$this->cleanUpFields();
			if ($this->User->save($this->data)) 
            {
                // we might have to reset the parent aro
                $this->InheritAcl->checkAroParent('User', $this->data['User']['id'], 'User', $this->data['User']['group_id']);
				$this->Session->setFlash('The User has been saved');
				$this->redirect(array('action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('The User could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) 
        {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Group->find('list');
		$this->set(compact('roles'));
	}

//-------------------------------------------------------------------- 
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if ( $this->User->del($id) ) {
			$this->Session->setFlash('User #'.$id.' deleted');
			$this->redirect(array('action'=>'index'), null, true);
		}
	}
//--------------------------------------------------------------------
	function view($id = null) {

		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('user', $this->User->read(null, $id));
//		$temp = $this->User->read(null, $id);


	}
//--------------------------------------------------------------------
	function admin_index() {
		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('user', $this->User->read(null, $id));

	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		$id = $this->Auth->user('id');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid User');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Данные были сохранены');
				$this->redirect(array('controller' => 'pages', 'action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('Данные не могут быть сохранены. попробуйте еще раз');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}

	}

//-------------------------------------------------------------------- 
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if ( $this->User->del($id) ) {
			$this->Session->setFlash('User #'.$id.' deleted');
			$this->redirect(array('action'=>'index'), null, true);
		}
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		$id = $this->Auth->user('id');
		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('user', $this->User->read(null, $id));
	}
//-------------------------------------------------------------------
	function acoset() {
		$this->Acl->Aco->create(array('parent_id' => 30, 'alias' => 'Album::'.'4','model'=>'Album','foreign_key' => '4' ));
		$this->Acl->Aco->save();
		echo 'aro ok';
		die;
	}
	
	function aroset() {
		$this->Acl->Aro->create( array('parent_id' => 1, 'foreign_key' => 1, 'model'=> 'User') );
		$this->Acl->Aro->save();
		echo 'aro ok';
		die;
	}
	function permset() {
		
		$this->Acl->allow(array( 'foreign_key' => 4, 'model'=> 'Group'),'Albums/add' );

		echo 'prem ok';
		die;
	}
	/**
 * Rebuild the Acl based on the current controllers in the application
 *
 * @return void
 */
    function buildAcl() {
        $log = array();
 
        $aco =& $this->Acl->Aco;
        $root = $aco->node('controllers');
        if (!$root) {
            $aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
            $root = $aco->save();
            $root['Aco']['id'] = $aco->id; 
            $log[] = 'Created Aco node for controllers';
        } else {
            $root = $root[0];
        }   
 
        App::import('Core', 'File');
        //$Controllers = Configure::listObjects('controller');
        $Controllers = array('Pages');
        /*
        							[0] => App
    								[1] => Pages
    								[2] => Catalogs
    								[3] => Categories
    								[4] => Datas
    								[5] => Gifts
    								[6] => LineItems
    								[7] => News
    								[8] => Orders
    								[9] => Uploads
    								[10] => Users
    								[11] => Xmlpars
    								[12] => Xmltest
    								[13] => Zends
		*/
        //my modification. taking array of controllers from my application;
        //debug($Controllers);
        //die;
        $appIndex = array_search('App', $Controllers);
        if ($appIndex !== false ) {
            unset($Controllers[$appIndex]);
        }
        $baseMethods = get_class_methods('Controller');
        $baseMethods[] = 'buildAcl';
 
        // look at each controller in app/controllers
        foreach ($Controllers as $ctrlName) {
            App::import('Controller', $ctrlName);
            $ctrlclass = $ctrlName . 'Controller';
            $methods = get_class_methods($ctrlclass);
 
            // find / make controller node
            $controllerNode = $aco->node('controllers/'.$ctrlName);
            if (!$controllerNode) {
                $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
                $controllerNode = $aco->save();
                $controllerNode['Aco']['id'] = $aco->id;
                $log[] = 'Created Aco node for '.$ctrlName;
            } else {
                $controllerNode = $controllerNode[0];
            }
 
            //clean the methods. to remove those in Controller and private actions.
            foreach ($methods as $k => $method) {
                if (strpos($method, '_', 0) === 0) {
                    unset($methods[$k]);
                    continue;
                }
                if (in_array($method, $baseMethods)) {
                    unset($methods[$k]);
                    continue;
                }
                $methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
                if (!$methodNode) {
                    $aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
                    $methodNode = $aco->save();
                    $log[] = 'Created Aco node for '. $method;
                }
            }
        }
        debug($log);
    }
//-----------------------------
}
?>