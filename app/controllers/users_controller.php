<?php
class UsersController extends AppController {
  //var $scaffold;
  var $components = array('Auth', 'Recaptcha');
  var $layout = 'xml';
     
  function beforeFilter() {
    $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
    if ($this->params['action'] == 'greet') {
      $this->Auth->ajaxLogin = 'mustlogin2'; // alternate login element for the header
    } else {
	  $this->Auth->ajaxLogin = 'mustlogin'; // normal login element
    }
    $this->Auth->autoRedirect = false; // we need to have special redirect code to make stuff work
    $this->Auth->allow('add');
    
    $this->Recaptcha->publickey = '6Lfu2QYAAAAAAPeptZomn5A89Imz_PeuYxbwklsh';
    $this->Recaptcha->privatekey = '6Lfu2QYAAAAAALp8ntBDqx70y9687a0iih0E67Pt';
  }
  
  function index() {
  }
  
  function login() {
	if ($this->Auth->user()) {
      if (!$this->data['User']['headerlogin']) {
        // set a session variable the greeting page can read to reload the page area
        $this->Session->write('reloadpage', 'true');
      }
      
      // force a redirect to the greeting page (which'll reload the main page if needed)
      $this->redirect(array('action' => 'greet'));
    }
  }
  
  function logout() {
    $this->redirect($this->Auth->logout());
  }
  
  function add() {
	if(!empty($this->data)) {
      if ($this->Recaptcha->valid($this->params['form'])) {
        if ($this->data['User']['password'] != $this->Auth->password($this->data['User']['confirm_password'])) {
          $this->Session->setFlash('The two entered passwords do not match. Please re-enter.', 'default', null, 'mismatch');
          $this->data['User']['password'] = '';
          $this->data['User']['confirm_password'] = '';
        } else {
          if ($this->User->save($this->data)) {
            $this->Auth->login();
            $this->redirect(array('action' => 'created'));
          } else {
            $this->data['User']['password'] = '';
            $this->data['User']['confirm_password'] = '';
          }
        }
      } else {
        $this->Session->setFlash('The captcha entered was incorrect. Please try again.', 'default', null, 'captcha');
        $this->data['User']['password'] = '';
        $this->data['User']['confirm_password'] = '';
      }
    } else {
      // the from parameter contains the address the user was at when he went to the signup form
      // it's stored in the session so that they can return to it once they've created the account
      $this->Session->write('from', $this->params['url']['from']);
    }
  }
  
  // just take the user to the view directly, no processing needed
  function created() {
  }
  
  function greet() {
	if ($this->Session->read('reloadpage')) {
      // set a variable to indicate that the main page area should be reloaded
      $this->set('reloadpage', true);
      $this->Session->delete('reloadpage'); // we don't want this variable persisting
    }
  }
  
  function dashboard() {	
  }
  
  function edit() {	
  }
  
  function appointment() {
	$this->set('appointments', $this->User->DoctorBooking->findAllByUserId($this->Auth->user('id')));
  } 
  
  //Need to know best way to do this with Taconite
  function appointmentDelete($id) {
	$this->User->DoctorBooking->delete($id);
	$this->Session->setFlash('The post with id: '.$id.' has been deleted.');
	$this->redirect(array('action'=>'index'));
  }
  
  function profile() {
	
  }
}
?>