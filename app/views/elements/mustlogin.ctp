<?php header('Content-type: text/xml'); ?>
<taconite>
  <replaceContent select=".main">
	<?php
      /*
        Basically, the default error message doesn't get set if you try to access a page you can't without logging in
        even though it should.
        So when this element is being called from the login view (which'll happen if the username/password is incorrect),
        I set the $errorMsg variable to true inside the element call, so it'll display the proper error message.
        Otherwise, it just displays the 'You must log in to proceed further' message.
      */
      $session->flash();
      if ($errorMsg) {
        $session->flash('auth');
      } else {
        echo $html->div('message', 'You must log in to proceed further.');
      }
      echo $html->para(null, 'Don\'t have an account? ' . $html->link('Create one', '#', array('onclick' => '$.address.value(\'/users/add?from=\' + escape($.address.value())); return false;')) . '.');
      echo $form->create('User', array('class' => 'signUp', 'action' => 'login'));
      echo $form->input('username');
      echo $form->input('password');
      echo $form->end('Login');
    ?>
  </replaceContent>
  <eval><![CDATA[ $('#UserLoginForm').ajaxForm(); ]]></eval>
</taconite>