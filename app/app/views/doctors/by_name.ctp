<?php header('Content-type: text/xml'); ?>
<taconite>  
    <replaceAndFadeIn select=".main">		 
		<div class="content">
			<table class="table">
				<tr>
					<td><br /><br /><img class="picture" src="img/profiles/<?php echo $doctors['Doctor']['name']; ?>.jpg" /></td>
					<td style="vertical-align:top; width: 300px; padding-left: 10px;">
						<br /><br /><span class="header"><?php echo $doctors['Doctor']['name']; ?></span><br />
						<span style="font-size: 140%"><?php echo $doctors['Specialty']['name']; ?></span><br />
						<span style="font-size: 90%">
							<?php 
								/* Check if we have experience data on the doctor */
								if ($doctors['Doctor']['experience'] != NULL)	{
									$experience = date("Y") - $doctors['Doctor']['experience'];
									echo $experience .  " Years of Experience";
								}
							?>
						</span><br />
						<span style="font-size: 90%">
							<?php 
								/* Check if we have registration data on the doctor */
								if ($doctors['Doctor']['registration'] != NULL)
									echo  "PMDC Number: " . $doctors['Doctor']['registration'];								
							?>
						</span><br />
					</td>					
				</tr>
				<br />				
			</table>
      
			<table style="margin-left: 50px; margin-right: 50px;">
				<tr>
					<td>
						<span style="font-size: 100%; line-height: 1em;"><?php echo $doctors['Doctor']['qualifications']; ?></span>
					</td>					
				</tr>
				<tr>
				<strong>
					<?php 
						echo "A little bit about Dr. " . $doctors['Doctor']['name'] ."<br />"; ?>
				</strong>			
				<?php echo $doctors['Doctor']['biography']; ?>
				</tr>
			</table>
			
			<br /><br />
			
			<form id="optionsForm" class="optionsForm" action="bookings/create">
				<table class="table">
					<td>
						<tr><td colspan="2"><strong>This is an:</strong></td></tr>
						<tr><td>Initial Visit</td> <td><input type="radio" name="option" value="initial" checked="checked" /></td></tr>
						<tr><td>Follow-Up</td> <td><input type="radio" name="option" value="follow-up" /></td></tr>
						<tr><td colspan="2"><i> (Appointment fees will change dynamically)</i></td></tr>
					</td>					
					<td>
					</td>
				</table>
				<input id="name" type="hidden" value="<?php echo $doctors['Doctor']['name']; ?>" />
			</form>
			<br /><br /><br />
			
			<?php 
				// Almaty because that's always GMT +6 and this wouldn't have the DST thing for Pakistan
				// we must remember to switch this back once DST is over
				date_default_timezone_set('Asia/Almaty'); 
				$week = 0;
			?>
			
			<table id="scroll_header" class="search_results" style="width:692px; border-right: 1px solid #e1e1e1;"> 
				<?php 
					/* Printing Table Header */
					echo '<div class="corner bgPng" style="right: 281px; margin-top: -42px;"></div><thead style="border-top: 1px solid #e1e1e1; padding-top: 10px;">';
						echo '<tr id="days">';
							echo '<th style="width:300px">' . " " . '</th>';
							echo '<th class="prev_week"><a href="javascript:prevWeek()">' . "Prev Week" . '</a></th>';
								for ($i = 0; $i < 7; $i++) { 
									echo '<th style="width:67px" class="calendar">';
									echo '<span class="day">' . date("l",  strtotime("+$i day")) . '</span><br />'; 
									echo '<span class="date">' . date("d/m/Y", strtotime("+$i day")) . '</span>';
									echo '</th>';
								}
							echo '<th class="next_week"><a href="javascript:nextWeek()">' . "Next Week" . '</a></th>';
							echo '</tr>'; 
					echo '</thead>';
				?>
			
				<?php 
					/* Printing Table Body */
					$totalLocations = count($doctors['DoctorDetail']);
					for ($locationNumber = 0; $locationNumber < $totalLocations; $locationNumber++)
					{ 
						$location = $doctors['DoctorDetail'][$locationNumber]['Location']['id'];
						echo '<tr>';
							echo '<td rowspan="1" colspan = "2" align="center" style="width:300px;">';
								echo '<span style="font-size:105%">' . $doctors['DoctorDetail'][$locationNumber]['Location']['name'] . '</span>';
								echo '<br /><strong>' . "Initial Vist: Rs. " . $doctors['DoctorDetail'][$locationNumber]['init_price'] . '</strong>';
								echo '<br /><strong>' . "Follow Up Vist: Rs. " . $doctors['DoctorDetail'][$locationNumber]['price'] . '</strong>';
							echo '</td>';
							
							for ($dayNumber = 0; $dayNumber < 7; $dayNumber++)
							{
								$hideCount = 0;
								//convert each day of the week to text ("Monday", "Tuesday"...)
								$day = date("l", strtotime("+$dayNumber day")); 									
								
								//make the $day fit database field standards ("monday", "tuesday"...)
								$day = strtolower($day);
							
								//alternating colors
								if ($dayNumber % 2 == 0)
									$colorColumn = "alt";
								else 
									$colorColumn = "org";
										
								echo '<td rowspan="1" class="' .$colorColumn. '" align="center">';
									echo '<div>';
										//divide time into 15 minute intervals
										if ($doctors['DoctorDetail'][$locationNumber][$day] != NULL)
										{
											//separate start and end times in hours and minutes
											list($start, $end) = split('-', $doctors['DoctorDetail'][$locationNumber][$day]);
											$startHour = substr($start, -4, 2);
											$startMinute = substr($start, -2, 2);								
											
											$endHour = substr($end, -4, 2);
											$endHour = $endHour - 1;
											$endMinute = substr($end, -2, 2);	
											
											//Loop from the starting hour to ending hour
											for ($startHour; $startHour <= $endHour; $startHour++)
											{
												//parse am pm into time strings
												if ($startHour < 12) {
													$ampm = 'am';
													$startHourFormatted = $startHour; }												
												else if ($startHour == 12) {												
													$ampm = 'pm';
													$startHourFormatted = $startHour; }												
												else if ($startHour > 12) {												
													$ampm = 'pm';
													$startHourFormatted = $startHour - 12; }
												
												//hide display after 'x' slots
												for ($startMinute; $startMinute <= 45; $startMinute = $minuteInterval + $startMinute) 
												{
													if ($hideCount > 8) 
													{				
														$hiddenClass = "hidden" . $locationNumber;														
														echo '<div class="' . $hiddenClass . '" style="display:none;">';
															echo '<span class="link" onclick="submit('."'$location'".','.$dayNumber.','.$startHour.','.$startMinute.')">';
																echo '<center>' . $startHourFormatted . ":" . $startMinute . " " . $ampm . '</center>';
															echo '</span>';
														echo '</div>'; 
													}													
													
													else if ($hideCount <= 8)
													{
														echo '<span class="link" onclick="submit('."'$location'".','.$dayNumber.','.$startHour.','.$startMinute.')">';
															echo '<center>' . $startHourFormatted . ":" . $startMinute . " " . $ampm . '</center>';													
														echo '</span>';
													}
													$hideCount++; 
												}															
												$startMinute = '00';
											}										
											$showButton = "showButton" . $locationNumber;
											$hideButton = "hideButton" . $locationNumber;
											echo '<div id="showButton" class="'.$showButton.'"><span onclick="slide('.$locationNumber.')" class="link"><center>' . "more" . '</center></span></div>';
											echo '<div id="hideButton" class="'.$hideButton.'" style="display:none"><span onclick="slide('.$locationNumber.')" class="link"><center>' . "hide" . '</center></span></div>';
										}
									echo '</div>';
								echo '</td>';									
							}
							echo '<td>' . " " . '</td>';
						echo '</tr>';
					}
				?>				
			<div class="corner2 bgPng" style="right: 281px; margin-top: -15px"></div></table>
			<br /><br />
			
			
				<?php 					 
					$count = 1;
					$totalReviews = count($doctors['DoctorReview']);
					for ($reviewNumber = 0; $reviewNumber < $totalReviews; $reviewNumber++)
					{
						echo '<table class="review" style="border-top: 1px solid #e1e1e1; border-right: 1px solid #e1e1e1; border-bottom: 1px solid #e1e1e1; padding-bottom: 5px; margin-bottom: 5px; margin-right: none; padding-right: none;">';
						list($year, $month, $day) = split("-", $doctors['DoctorReview'][$reviewNumber]['date_time']);
						$date = date('F d, Y', mktime(0, 0, 0, $month, $day, $year));
						echo '<tr><td colspan="2" style="padding: 5px 0 5px 20px;"><div class="corner bgPng" style="right: 281px; margin-top: -8px"></div>';
							echo '<strong><a href="">' . $doctors['DoctorReview'][$reviewNumber]['User']['name'] . '</a></strong>' . " saw  Dr. " . $doctors['Doctor']['name'] . " on ";
							echo $date;
						echo '</td></tr>';						
						
						echo '<td style="padding-left:20px; padding-right: 10px;"><strong>';
							echo '<ul style="float:right display: block; width: 160px;">';
								echo '<li><img src="img/stars_5.png" alt="5" />' . " Bedside Manner" . '</li>';
								echo '<li><img src="img/stars_5.png" alt="5" />' . " Appointment Fee" . '</li>';
								echo '<li><img src="img/stars_5.png" alt="5" />' . " Wait Time" . '</li>';
								echo '<li><img src="img/stars_5.png" alt="5" />' . " Overall" . '</li>';
							echo '</ul>';
						echo '</strong><div class="corner2 bgPng" style="right: 281px; margin-top: -7px"></div></td>';
						
						echo '<td style="border-left: 1px solid #e1e1e1; padding-left:10px; padding-right: 20px;">';
							echo '<p>' . $doctors['DoctorReview'][$reviewNumber]['review'] . '</p>';
						echo '</td>';
						echo '</table>';						
					}
				?>		
		</div>
		
	</replaceAndFadeIn>    
	<remove select=".midThird" />
	
	<eval><![CDATA[
		var week = <?php echo $week; ?>
		
		var yyyy = <?php echo date("Y"); ?>;
		//JS starts the year at month = 0 Why? No seriously, why?
		var mm = <?php echo date("n"); ?> - 1;
		var dd = <?php echo date("j"); ?>;
		
		function slide(locationNumber)
		{
			var showButton = ".showButton" + locationNumber;
			var hideButton = ".hideButton" + locationNumber;
			var hidden = ".hidden" + locationNumber;	
			
			if ($(hidden).is(":hidden")) {
				$(showButton).hide();
				$(hidden).slideDown("slow");
				$(hideButton).show();
			} 
			else {
				$(hideButton).hide();
				$(hidden).slideUp("medium");
				$(showButton).show();							
			}			
			locationNumber--;
		}	
		
		function nextWeek() {
			week++;
			$.get('calendar/refresh_week.php?week=' + week);
		}
		function prevWeek() { 
			week--;
			$.get('calendar/refresh_week.php?week=' + week);
		}
		
		function submit(location, date, hour, minute)
		{
			var myDate = new Date(yyyy,mm,dd + parseInt(date) + parseInt(week*7));									
			// submit the form and change the address
			$.address.value('/doctor_bookings/add/' + $('#name').val() + '/' + $('input[name="option"]:checked').val() + '/' + location + '/' + myDate.getFullYear() + '/' + (myDate.getMonth() + 1) + '/' + myDate.getDate() + '/' + hour + '/' + minute);
		}
	]]></eval>
  
</taconite>