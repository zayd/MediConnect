<?php
App::import('Vendor', 'facebook/facebook');

class AppController extends Controller {
    var $components = array('Auth');
    var $uses = array('User');
	var $facebook;
	var $__fbApiKey = '137f8d36941cf6739f45b4a7f3247f8b';
	var $__fbSecret = '08cdc535a004f0e39a6164d11dc3e38e';

	function __construct() {
		parent::__construct();

		// Prevent the 'Undefined index: facebook_config' notice from being thrown.
		$GLOBALS['facebook_config']['debug'] = NULL;

		// Create a Facebook client API object.
		$this->facebook = new Facebook($this->__fbApiKey, $this->__fbSecret);
	}
		

    function beforeFilter() {
		// Authentication settings
		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
		$this->Auth->logoutRedirect = '/';   
        
	}
	
	function beforeRender() {
		//check to see if user is signed in with facebook
		$this->__checkFBStatus();
		//send all user info to the view
		$this->set(’user’, $this->Auth->user()); // we’ll do this later
	}

    private function __checkFBStatus(){
        //check to see if a user is not logged in, but a facebook user_id is set
        if(!$this->Auth->User() && $this->facebook->get_loggedin_user()):

            //see if this facebook id is in the User database; if not, create the user using their fbid hashed as their password
            $user_record =
                $this->User->find('first', array(
                    'conditions' => array('fbid' => $this->facebook->get_loggedin_user()),
                    'fields' => array('User.fbid', 'User.fbpassword', 'User.password'),
                    'contain' => array()
                ));

            //create new user
            if(empty($user_record)):
                $user_record['fbid'] = $this->facebook->get_loggedin_user();
                $user_record['fbpassword'] = $this->__randomString();
                $user_record['password'] = $this->Auth->password($user_record['fbpassword']);

                $this->User->create();
                $this->User->save($user_record);
            endif;

            //change the Auth fields
            $this->Auth->fields = array('username' => 'fbid', 'password' => 'password');

            //log in the user with facebook credentials
            $this->Auth->login($user_record);

        endif;
    }

    private function __randomString($minlength = 20, $maxlength = 20, $useupper = true, $usespecial = false, $usenumbers = true){
        $charset = "abcdefghijklmnopqrstuvwxyz";
        if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($usenumbers) $charset .= "0123456789";
        if ($usespecial) $charset .= "~@#$%^*()_+-={}|][";
        if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
        else $length = mt_rand ($minlength, $maxlength);
        $key = '';
        for ($i=0; $i<$length; $i++){
            $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
        }
        return $key;
    }

}
?>