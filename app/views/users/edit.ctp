<?php header('Content-type: text/xml'); ?>
<taconite>
  <replaceContent select=".main">
	<ul id="nav-side">
		<li class="nav-side" onclick="$.address.value('users/dashboard')">Dashboard</li>
		<li class="selected" onclick="$.address.value('users/edit')">Edit Profile</li>
		<li class="nav-side" onclick="$.address.value('users/appointment')">Appointments</li>
		<li class="nav-side" id="ratings">Your Doctors</li>
		<li class="nav-side" id="friends">Friends List</li>
	</ul>
	
	<div class="editProfile" id="editProfile">
		<div class="signUpBox" style="background-color: transparent; margin-left: 60px;">
			Online Account Information<br />
			<span class="subHeader"></span>
		</div>	
		<?php
			echo $form->create(array('class'=>'signUp', 'error' => array('wrap' => 'div', 'class' => 'signUpError')));
			echo $form->input('username', array('value' => $session->read('Auth.User.username'), 'readonly' => 'true', 'class' => 'username'));
			echo $form->input('password', array('value' => 'password', 'label' => 'Current Password'));
			echo $form->input('new_password', array('type' => 'password', 'value' => 'password'));
			echo $form->input('confirm_new_password', array('type' => 'password', 'value' => 'password'));
			$session->flash('mismatch');
			echo $form->input('email_address', array('value' => $session->read('Auth.User.email_address')));	
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
			echo $form->input('name', array('value' => $session->read('Auth.User.name')));
			echo $form->input('gender', array('options' => array('Male' => 'Male', 'Female' => 'Female')));			
			echo $form->input('residence_number', array('label' => 'Residence Number', 'value' => $session->read('Auth.User.residence_number'), 'error' => array('wrap' => 'div', 'class' => 'signUpError')));
			echo $form->input('cell_number', array('value' => $session->read('Auth.User.cell_number')));
			echo $form->input('date_of_birth', array('value' => $session->read('Auth.User.date_of_birth')));
			echo $form->input('home_address', array('label' => 'Home Address', 'value' => $session->read('Auth.User.home_address'), 'type' => 'textarea', 'class' => 'address'));
			echo $form->input('biography', array('label' => 'Tell us a little about yourself'));
			echo $form->input('picture', array('label' => 'Upload a picture of yourself'));
			echo $form->end('Create account');
		?>		
		</div>		
	</replaceContent>
	<remove select=".midThird" />
	<eval>
		
	</eval>
</taconite>