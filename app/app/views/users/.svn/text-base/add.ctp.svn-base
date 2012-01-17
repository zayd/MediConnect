<?php header('Content-type: text/xml'); ?>
<taconite>
  <replaceContent select=".main">
	
	<div class="signUpBox" style="background-color: transparent; margin-left: 60px;">
		Online Account Information<br />
		<span class="subHeader"></span>
	</div>	
	<?php
		echo $form->create(array('class'=>'signUp', 'error' => array('wrap' => 'div', 'class' => 'signUpError')));
		echo $form->input('username');
		echo $form->input('password');
		echo $form->input('confirm_password', array('type' => 'password'));
		$session->flash('mismatch');
		echo $form->input('email_address');	
	?>
	<div class="signUpBox">
		Medical Information<br />
		<span class="subHeader">Information that will be used to assist in appointment bookings</span>
	</div>
			
	<?php
		echo $form->input('hospital_ids', array('label' => 'Hospitals', 'options' => array('1' => 'Aga Khan Hospital', '2' => 'National Medical Centre')));
		echo $form->input('mr_numbers', array('label' => 'Medical Reference Number'));
	?>
	<div class="signUpBox">
		Personal Information<br />
		<span class="subHeader">Once again, we <strong>do not</strong> share this information with anyone</span>
	</div>
	<?php
		echo $form->input('name');
		echo $form->input('gender', array('options' => array('Male' => 'Male', 'Female' => 'Female')));			
		echo $form->input('residence_number', array('label' => 'Residence Number', 'error' => array('wrap' => 'div', 'class' => 'signUpError')));
		echo $form->input('cell_number');
		echo $form->input('date_of_birth');
		echo $form->input('home_address', array('label' => 'Home Address'));
		echo $form->input('biography', array('label' => 'Tell us a little about yourself'));
		echo $form->input('picture', array('label' => 'Upload a picture of yourself'));
		$session->flash('captcha');
		$recaptcha->display_form('echo');
		echo $form->end('Create account');
    ?>
  </replaceContent>
  <remove select=".midThird" />
  <eval><![CDATA[ $('#UserAddForm').ajaxForm(); ]]></eval>
</taconite>