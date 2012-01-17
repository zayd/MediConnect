<taconite>  
    <replaceAndFadeIn select=".main">		 
		<div class="content">
			<table class="table">
				<tr>
					<td><br /><br /><img class="picture" src="img/profiles/<?php echo $procedures['Procedure']['name']; ?>.jpg" /></td>
					<td style="vertical-align:top; width: 300px; padding-left: 10px;">
						<br /><br /><span class="header"><?php echo $procedures['Procedure']['name']; ?></span><br />
						<span style="font-size: 140%"><?php echo $procedures['Procedure']['specialty']; ?></span><br />
					</td>					
				</tr>
				<br />				
			</table>
			
			<table style="margin-left: 50px; margin-right: 50px;">
				<tr>
					<td>
						<span style="font-size: 100%; line-height: 1em;"><?php echo $procedures['Procedure']['qualifications']; ?></span>
					</td>
					<td>
						<span style="font-size: 100%; line-height: 1em;"><?php echo $procedures['Procedure']['qualifications']; ?></span>
					</td>
				</tr>
				<tr>
				<strong>
					<?php 
						echo "A little bit about the " . $procedures['Procedure']['name'] ."<br />"; ?>
				</strong>			
				<?php echo $procedures['Procedure']['biography']; ?>
				</tr>
			</table>
			
			<br /><br />
			
			<form id="optionsForm" action="bookings/create">
				<table class="table">
					<td>
						<tr><td colspan="2"><strong>This is an:</strong></td></tr>
						<tr><td>Initial Visit</td> <td><input type="radio" name="option" value="initial visit" checked="checked" /></td></tr>
						<tr><td>Follow Up</td> <td><input type="radio" name="option" value="follow up visit" /></td></tr>
						<tr><td colspan="2"><i> (Appointment fees will change dynamically)</i></td></tr>
					</td>					
					<td>
					</td>
				</table>
				<input name="id" type="hidden" value="<?php echo $doctors['Doctor']['id']; ?>" />
				<!-- these two will be set dynamically by the submit() function -->
				<input id="location" name="location" type="hidden" value="" />
				<input id="date" name="date" type="hidden" value="" />
				<input id="time" name="time" type="hidden" value="" />
			</form>
			<br /><br /><br />
			
			<?php 
				date_default_timezone_set('PST'); 
				$week = 1;
			?>
				
			<div class="shadow"></div><div class="shadowright"></div>
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
					
					//longer intervals because procedure times are longer
					$minuteInterval = 30;
					
					$totalLocations = count($procedures['ProcedureDetail']);
					for ($locationNumber = 0; $locationNumber < $totalLocations; $locationNumber++)
					{ 
						$location = $procedures['ProcedureDetail'][$locationNumber]['location'];
						
						echo '<tr>';
							echo '<td rowspan="1" colspan = "2" align="center" style="width:300px;">';
								echo '<span style="font-size:105%">' . $procedures['ProcedureDetail'][$locationNumber]['location'] . '</span>';
								echo '<br /><strong>' . "Initial Vist: Rs. " . $procedures['ProcedureDetail'][$locationNumber]['init_price'] . '</strong>';
								echo '<br /><strong>' . "Follow Up Vist: Rs. " . $procedures['ProcedureDetail'][$locationNumber]['price'] . '</strong>';
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
										if ($procedures['ProcedureDetail'][$locationNumber][$day] != NULL)
										{
											//parse start and end times in hours and minutes
											list($start, $end) = split('-', $procedures['ProcedureDetail'][$locationNumber][$day]);
											$startHour = substr($start, -4, 2);
											$startMinute = substr($start, -2, 2);								
											
											$endHour = substr($end, -4, 2);
											$endHour = $endHour - 1;
											$endMinute = substr($end, -2, 2);		
											
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
												
												//Fix the 00 AM bug at the start of each day
												if ($startHour == 00) {
													$ampm = 'am';
													$startHourFormatted = 12; }
													
												//hide display after 'x' slots
												for ($startMinute; $startMinute <= 45; $startMinute = $minuteInterval + $startMinute) {
													if ($hideCount > 8) 
													{				
														$hiddenClass = "hidden" . $locationNumber;														
														echo '<div class="' . $hiddenClass . '" style="display:none;">';
															echo '<a href="javascript:submit('."'$location'".','.$dayNumber.','.$startHour.''.$startMinute.')">';
																echo '<center>' . $startHourFormatted . ":" . $startMinute . " " . $ampm . '</center>';
															echo '</a>';
														echo '</div>'; 
													}													
													
													else if ($hideCount <= 8)
														echo '<a href="javascript:submit('."'$location'".','.$dayNumber.','.$startHour.''.$startMinute.')"><center>' . $startHourFormatted . ":" . $startMinute . " " . $ampm . '</center></a>';													
													
													$hideCount++; 
												}															
												$startMinute = '00';
											}										
											$showButton = "showButton" . $locationNumber;
											$hideButton = "hideButton" . $locationNumber;
											echo '<div id="showButton" class="'.$showButton.'"><a href="javascript:slide('.$locationNumber.')"><center>' . "more" . '</center></a></div>';
											echo '<div id="hideButton" class="'.$hideButton.'" style="display:none"><a href="javascript:slide('.$locationNumber.')"><center>' . "hide" . '</center></a></div>';
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
		</div>
		
	</replaceAndFadeIn>    
	<remove select=".midThird" />
	
	<eval>
		
		var week = <?php echo $week; ?>
		//set today's date as soon as page loads
		var myDate=new Date();
		myDate.setDate(myDate.getDate());
		
		
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
		
		function submit(location,date,time)
		{			
			
			// set location, date and time hidden elements
			$('#location').val(location);
			$('#date').val(date);
			$('#time').val(time);
			
			// submit the form and change the address
			$.address.value('/bookings/create?' + $('#optionsForm').formSerialize());
		}
	</eval>
  
</taconite>