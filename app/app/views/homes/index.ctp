<taconite>
	<replaceContent select=".main">
		<div class="imageOverlay">
			<div class="caption">
				&#169; <a href="http://www.flickr.com/photos/hameediii/" style="border: none; color: white">Hameed Moinuddin</a>&#160;&#160;
			</div>
		</div>
		<form id="searchForm" class="searchForm" action="#" method="get">
			<select class="dropDown" id="searchCity" style="margin-top: 15px">
				<option>Karachi, Pakistan</option>				
			</select>
			&#160;&#160;&#160;&#160;&#160;&#160;
			<select id="selectHospital" class="dropDown">
				<option value="">All Hospitals and Clinics</option>
				<option value="4">Aga Khan Hospital</option>
				<option value="1">National Medical Centre</option>
				<option value="3">South City Hospital</option>
				<option value="2">Ziauddin Hospital Clifton Campus</option>
				<option value="4,1,3,2">Other</option>
			</select>
			<br />
			 
			<input class="textBox" id="searchName" value="Enter the first letter of any doctor or medical procedure..." type="text" style="margin-bottom: 2px; margin-left: 0" />
			<br />
			
			<span style="font-size:120%">
				<em>e.g. <a href="#/doctors/bySpecialty?specialty=2"><span style="font-size: 105%;"><b>P</b>aediatrician</span></a>, Dr. <span style="font-size: 105%;"><b>T</b></span>anvir <span style="font-size: 105%;"><b>H</b></span>aq, <span style="font-size: 105%;"><b>M</b></span>RI and you can even use simple terms like <a href="#/doctors/bySpecialty?specialty=3"><span style="font-size: 105%;"><b>H</b></span>eart</a>, <a href="#/doctors/bySpecialty?specialty=4"><span style="font-size: 105%;"><b>S</b></span>kin</a> etc.</em>
			</span>
			<br />
			
			<select name="specialtyList" class="dropDown" style="margin-top: 15px">
				<option value="">Select from a list of specialties...</option>
				<?php
					// print list of all specialties
					$len = count($specialties);
					for ($i = 0; $i < $len; $i++) {
						echo "<option value=\"{$specialties[$i]['Specialty']['id']}\"" . (($specialties[$i]['Specialty']['id'] == $specialtyID) ? ' selected="selected"' : '') . ">{$specialties[$i]['Specialty']['name']}</option>";
					}
				?>
			</select>
			or&#160;&#160;
			<select name="procedureList" class="dropDown">
				<option value="">Select from a list of procedures...</option>
				<?php
					/*  print list of all procedures
						$len = count($specialties);
						for ($i = 0; $i < $len; $i++) {
						  echo "<option value=\"{$specialties[$i]['Specialty']['id']}\"" . (($specialties[$i]['Specialty']['id'] == $specialtyID) ? ' selected="selected"' : '') . ">{$specialties[$i]['Specialty']['name']}</option>";
						} */
				?>
			</select>			
			<br />						
			<div class="advanced">
				<div id="addDay">	
					on&#160;
					<select class="dropDown" id="selectDay1">
						<option value="monday">Monday</option>			<option value="tuesday">Tuesday</option>	<option value="wednesday">Wednesday</option>
						<option value="thursday">Thursday</option>		<option value="friday">Friday</option>		<option value="saturday">Saturday</option>
						<option value="sunday">Sunday</option>
					</select>
					<br />
					&#160;&#160;&#160;&#160;&#160;&#160;
					<select class="dropDownSmall" id="selectStartTime1">
						<option value="0000">12:00 AM</option>			<option value="0100">1:00 AM</option>	<option value="0200">2:00 AM</option>
						<option value="0300">3:00 AM</option>		<option value="0400">4:00 AM</option>	<option value="0500">5:00 AM</option>
						<option value="0600">6:00 AM</option>		<option value="0700">7:00 AM</option>	<option value="0800">8:00 AM</option>
						<option value="0900">9:00 AM</option>		<option value="1000">10:00 AM</option>	<option value="1100">11:00 AM</option>
						<option value="1200">12:00 PM</option>		<option value="1300">1:00 PM</option>	<option value="1400">2:00 PM</option>
						<option value="1500">3:00 PM</option>		<option value="1600">4:00 PM</option>	<option value="1700">5:00 PM</option>
						<option value="1800">6:00 PM</option>		<option value="1900">7:00 PM</option>	<option value="2000">8:00 PM</option>
						<option value="2100">9:00 PM</option>		<option value="2200">10:00 PM</option>	<option value="2300">11:00 PM</option>			  
					</select>
					to&#160;&#160;							
					<select class="dropDownSmall" id="selectEndTime1">
						<option value="0000">12:00 AM</option>			<option value="0100">1:00 AM</option>	<option value="0200">2:00 AM</option>
						<option value="0300">3:00 AM</option>		<option value="0400">4:00 AM</option>	<option value="0500">5:00 AM</option>
						<option value="0600">6:00 AM</option>		<option value="0700">7:00 AM</option>	<option value="0800">8:00 AM</option>
						<option value="0900">9:00 AM</option>		<option value="1000">10:00 AM</option>	<option value="1100">11:00 AM</option>
						<option value="1200">12:00 PM</option>		<option value="1300">1:00 PM</option>	<option value="1400">2:00 PM</option>
						<option value="1500">3:00 PM</option>		<option value="1600">4:00 PM</option>	<option value="1700">5:00 PM</option>
						<option value="1800">6:00 PM</option>		<option value="1900">7:00 PM</option>	<option value="2000">8:00 PM</option>
						<option value="2100">9:00 PM</option>		<option value="2200">10:00 PM</option>	<option value="2300">11:00 PM</option>			  
					</select>
					<span class="addDayButton">
						&#160;<span onClick="addDay()" style="font-size:250%; cursor: pointer; border: none; padding-bottom: -2px; ">+</span>
					</span>
				</div>
				
				<select class="dropDown" id="selectPrice" name="fee">
					<option value="">Maximum Appointment Fees</option>
					<option value="250">&#8804; 250 Rupees</option>		<option value="500">&#8804; 500 Rupees</option>		<option value="750">&#8804; 750 Rupees</option>
					<option value="1000">&#8804; 1000 Rupees</option>		<option value="1250">&#8804; 1250 Rupees</option>		<option value="1500">&#8804; 1500 Rupees</option>
				</select>
				
				<select class="dropDown" id="selectWaitTime" name="wait">
					<option value="">Maximum Wait Time</option> 				<option value="15">&#8804; 15 Minutes</option>		<option value="30">&#8804; 30 Minutes</option>
					<option value="45">&#8804; 45 Minutes</option>			<option value="60">&#8804; 1 Hour</option>			<option value="90">&#8804; 1 Hour 30 Minutes</option>
					<option value="120">&#8804; 2 Hours</option>			<option value="180">&#8804; 3 Hours</option>		<option value="240">&#8804; 4 Hours</option>
				</select>
				
				<select class="dropDown" id="selectExperience" name="experience">
					<option value="">Minimum Years of Experience</option> 					<option value="2">&#8805; 2 Year</option>			<option value="3">&#8805; 3 Year</option>
					<option value="4">&#8805; 4 Year</option>			<option value="5">&#8805; 5 Year</option>			<option value="6">&#8805; 6 Year</option>
					<option value="7">&#8805; 7 Year</option>			<option value="8">&#8805; 8 Year</option>			<option value="9">&#8805; 9 Year</option>
				</select>								
				<div id="map"></div>
				<input type="text" id="selectLatitude" name="latitude" style="display: none" />
				<input type="text" id="selectLongitude" name="longitude" style="display: none" />									
			</div>								
			<div id="search" class="submit" style="vertical-align:bottom;">
				<input id="submit" class="submitButton" type="submit" value="Search &gt;&gt;" />
				<a href="javascript:advancedSlide()" class="caption">+ More Search Options</a>
			</div>						
		</form>
	</replaceContent>
	<replaceContent select=".topleft">
		<h2 class="test">Get Started</h2>
		<p><strong>MediConnect</strong> is a sustainable social NGO that is working to empower the average Pakistani by making healthcare services more <strong>transparent and accessible</strong>.</p>
		<p>Search for over <strong>1,500</strong> doctors and procedures across <strong>Pakistan</strong> using meaningful criteria and then instantly book an appointment <strong>online</strong> or by <strong>SMS</strong>.</p>
		<p>It's completely free.</p>
	</replaceContent>
	
	<replaceContent select=".midThird">
		<div class="inner">
			<h4 class="OurPromise"></h4>												
			<p>We're commited to making it easier for <strong>everyone</strong> to receive recieve better health care. Whether that means making healthcare more <em>accessible, affordable</em> and <em>understable</em> we will continue to do so. That's our promise to you. </p>
			<div id="kids">
				<img src="css/images/kids.jpg" />
			</div>
			<span style="font-size:80%;">&#169; <a href="http://www.flickr.com/photos/hameediii/" style="border: none;">Hameed Moinuddin</a>&#160;&#160;</span>
		</div>		
		<div class="innerRight">
			<h4 class="OurPartners"></h4>
			<div class="logos">
				<img class="aku" src="css/images/akuh.jpg" />
				<img class="ziauddin"  src="css/images/ziauddin.png" />
				<img class="aku" src="css/images/aku.gif" />				
			</div>
		</div>
	</replaceContent>
	
	<eval><![CDATA[ indexHandlers(); ]]></eval>
</taconite>