<?php header('Content-type: text/xml'); ?>
<taconite>
  <replaceContent select="#logIn">
	<?php
        echo $html->para(null, 'Hi! Create an ' . $html->link('account', '#', array('onclick' => '$.address.value(\'/users/add?from=\' + escape($.address.value())); return false;')) . '.');
		echo $form->create('User', array('class' => 'logIn', id => 'UserLoginForm2', 'action' => 'login')); 
			echo $form->input('username', array('class' => 'textBox', 'label' => '', 'value'=>'Username'));
			echo $form->input('password', array('class' => 'textBox', 'label' => '', 'value'=>'Password'));
			echo $form->hidden('headerlogin', array('value' => 'true'));
		echo $form->end('Login');
    ?>
  </replaceContent>
  <eval><![CDATA[ $('#UserLoginForm2').ajaxForm(); ]]></eval>
</taconite>