<?php
/* SVN FILE: $Id: pages_controller.php 7118 2008-06-04 20:49:29Z gwoo $ */
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.controller
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 7118 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-06-04 16:49:29 -0400 (Wed, 04 Jun 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package		cake
 * @subpackage	cake.cake.libs.controller
 */
class PagesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';
/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html');
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();
	var $components = array('Security');
	//var $cacheAction ;//= "1 hour";
	//var $cacheAction = array('display/' => '60000');

	
  function beforeFilter() {
       // $this->Auth->deny( 'admin_index');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
        //debug($this->Session->read() );
    }
    
    
    
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {		
		//$this->cacheAction = "100 hours";
		$path = func_get_args();	
		if (!count($path)) {
			if ($this->Auth->user('id')) {
				$this->redirect(array('controller'=>'pages','action'=>'homepage'));
			}else{
				$this->redirect('/');
			}
		}
		
		
		$count = count($path);
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			if ($this->Auth->user('id')&&$path[0]=='home') {
				$page = 'homepage';
			}else{
				$page = $path[0];
			}
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}
	
//--------------------------------------------------------------------	
	function admin_index() {
	}
	
}

?>