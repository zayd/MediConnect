<?php header('Content-type: text/xml'); ?>
<taconite>
	<replaceContent select=".main">
		<ul id="nav-side">
			<li class="selected" onclick="$.address.value('users/dashboard');">Dashboard</li>
			<li class="nav-side" onclick="$.address.value('users/edit');">Edit Profile</li>
			<li class="nav-side" onclick="$.address.value('users/appointment');">Appointments</li>
			<li class="nav-side" id="ratings">Your Doctors</li>
			<li class="nav-side" id="friends">Friends List</li>
		</ul>
		
		<div class="dashboard">
			<span class="name">Welcome, <?php echo $session->read('Auth.User.name'); ?></span>
			<span class="head">What's new today?</span>
			<p class="top">MediConnect helps you connect with your friends and family to assist to facilitate the process of receiving medical advice.</p>
		</div>
		
	</replaceContent>
	<remove select=".midThird" />	
</taconite>