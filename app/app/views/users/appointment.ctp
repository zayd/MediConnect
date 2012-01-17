<?php header('Content-type: text/xml'); ?>
<taconite>
	<replaceContent select=".main">
		<ul id="nav-side">
			<li class="nav-side" onclick="$.address.value('users/dashboard')">Dashboard</li>
			<li class="nav-side" onclick="$.address.value('users/edit')">Edit Profile</li>
			<li class="selected" onclick="$.address.value('users/appointment')">Appointments</li>
			<li class="nav-side" id="ratings">Your Doctors</li>
			<li class="nav-side" id="friends">Friends List</li>
		</ul>
		
		<div class="appointment">
			<span class="head">Your Appointments</span>	
			<p>Check, reschedule and cancel upcoming appointments</p>
			<p>Also take a look at your appointment history and reviews for your past appointments</p>
			<br /><br /><br /><br /><br /><br /><br /><br />
			
			<?php 
				$len = count($appointments);
				for ($i = 0; $i < $len; $i++)	{
					echo '<div class="single">';
						echo '<div class="doctor">' . "Dr. " . $appointments[$i]['Doctor']['name'] . '<div class="options">' . "Cancel Appointment" .'</div></div>';
						echo '<span class="dateTime">' . "On " . $appointments[$i]['DoctorBooking']['date_time'] . '</span>';
						echo '<span class="created">' . " Created " . $appointments[$i]['DoctorBooking']['created'] . '</span>';
						echo '<br />';
						echo "Appointment for " . $appointments[$i]['User']['name'];
						echo '<br /><br />';
					echo '</div>';
				} 
			?>
		</div>
	</replaceContent>
	<remove select=".midThird" />
</taconite>