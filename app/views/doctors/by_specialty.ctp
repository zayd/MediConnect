<taconite>
	<replaceAndFadeIn select=".main">
		<div class="content">
		<br />
		<span style="font-size: 150%; text-align: center"><h1>Search Results</h1></span>
		<br />
		<table style = "float: left; border: solid 1px #ccc; background-color: #FFF9DA; margin-left: 10px; padding-left: 6px; padding-top: 10px; padding-right: 6px; margin-bottom: 10px; " id="test">
			<td>
				<form id="searchForm" action="#" method="get">
					&#160;&#160;&#160;&#160;&#160;
					<b>Update you search results...</b><br />
					&#160;&#160;&#160;&#160;&#160;
					
					  <select name="specialty" style="font-size: 16px; border: 2px solid #ccc; width: 250px;" >
						<?php
							$len = count($specialties);
							for ($i = 0; $i < $len; $i++) {
								echo "<option value=\"{$specialties[$i]['Specialty']['id']}\"" . (($specialties[$i]['Specialty']['id'] == $specialtyID) ? ' selected="selected"' : '') . ">{$specialties[$i]['Specialty']['name']}</option>";
							}
						?>
					  </select>
					<br />
					<div id="addday">
						<span style="">on</span>&#160;&#160;
						<select style="color: grey; font-size:12px; width: 127px; border: 1px solid #ccc;" id="selectDay1">
							<option value="monday">Monday</option>			<option value="tuesday">Tuesday</option>	<option value="wednesday">Wednesday</option>
							<option value="thursday">Thursday</option>		<option value="friday">Friday</option>		<option value="saturday">Saturday</option>
							<option value="sunday">Sunday</option>
						</select><br />
						<span style="">&#160; &#160; &#160;</span>&#160;&#160;
						<select style="color: grey; font-size:12px; width: 100px; border: 1px solid #ccc;" id="selectStartTime1">
							<option value="0000">12:00 AM</option>			<option value="0100">1:00 AM</option>	<option value="0200">2:00 AM</option>
							<option value="0300">3:00 AM</option>		<option value="0400">4:00 AM</option>	<option value="0500">5:00 AM</option>
							<option value="0600">6:00 AM</option>		<option value="0700">7:00 AM</option>	<option value="0800">8:00 AM</option>
							<option value="0900">9:00 AM</option>		<option value="1000">10:00 AM</option>	<option value="1100">11:00 AM</option>
							<option value="1200">12:00 PM</option>		<option value="1300">1:00 PM</option>	<option value="1400">2:00 PM</option>
							<option value="1500">3:00 PM</option>		<option value="1600">4:00 PM</option>	<option value="1700">5:00 PM</option>
							<option value="1800">6:00 PM</option>		<option value="1900">7:00 PM</option>	<option value="2000">8:00 PM</option>
							<option value="2100">9:00 PM</option>		<option value="2200">10:00 PM</option>	<option value="2300">11:00 PM</option>			  
						</select>
						&#160;<span style="">to</span>&#160;							
						<select style="color: grey; font-size:12px; width: 100px; border: 1px solid #ccc;" id="selectEndTime1">
							<option value="0000">12:00 AM</option>			<option value="0100">1:00 AM</option>	<option value="0200">2:00 AM</option>
							<option value="0300">3:00 AM</option>		<option value="0400">4:00 AM</option>	<option value="0500">5:00 AM</option>
							<option value="0600">6:00 AM</option>		<option value="0700">7:00 AM</option>	<option value="0800">8:00 AM</option>
							<option value="0900">9:00 AM</option>		<option value="1000">10:00 AM</option>	<option value="1100">11:00 AM</option>
							<option value="1200">12:00 PM</option>		<option value="1300">1:00 PM</option>	<option value="1400">2:00 PM</option>
							<option value="1500">3:00 PM</option>		<option value="1600">4:00 PM</option>	<option value="1700">5:00 PM</option>
							<option value="1800">6:00 PM</option>		<option value="1900">7:00 PM</option>	<option value="2000">8:00 PM</option>
							<option value="2100">9:00 PM</option>		<option value="2200">10:00 PM</option>	<option value="2300">11:00 PM</option>			  
						</select>
						&#160;<span onClick="addDaySmall()" style="font-size:250%; cursor: pointer; border: none;">+</span>
						<br />						
					</div>
					<span style="">fee</span>&#160;
						<select style="color: grey; font-size:12px; width: 127px; border: 1px solid #ccc;" name="fee" id="selectPrice">
						<option value="">No Limit</option>
						<option value="250">&#8804; 250 Rupees</option>		<option value="500">&#8804; 500 Rupees</option>		<option value="750">&#8804; 750 Rupees</option>
						<option value="1000">&#8804; 1000 Rupees</option>		<option value="1250">&#8804; 1250 Rupees</option>		<option value="1500">&#8804; 1500 Rupees</option>
					</select>
          &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<input id="submit" type="submit" value="Search" />
				</form>
				<br /><br />
			</td>			
		</table>
		<div id="mapSmall"></div>
		
		<script>
			map2 = new GMap2(document.getElementById("mapSmall")); 
			map2.checkResize();
			map2.setCenter(new GLatLng(24.89079661665395,67.02964782714844), 12);
			map2.addControl(new GSmallMapControl());
			
			var baseIcon = new GIcon(G_DEFAULT_ICON);
			baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
			baseIcon.iconSize = new GSize(20, 34);
			baseIcon.shadowSize = new GSize(37, 34);
			baseIcon.iconAnchor = new GPoint(9, 34);
			baseIcon.infoWindowAnchor = new GPoint(9, 2);

			// Creates a marker whose info window displays the letter corresponding
			// to the given index.
			function createMarker(point, index) {
				// Create a lettered icon for this point using our icon class
				var letter = String.fromCharCode("A".charCodeAt(0) + index);
				var letteredIcon = new GIcon(baseIcon);
				letteredIcon.image = "http://www.google.com/mapfiles/marker" + letter + ".png";

				markerOptions = { icon:letteredIcon };
				var marker = new GMarker(point, markerOptions);

				return marker;
			}			
		</script>
		<table class="resultsTable" id="resultsTable">	
			<thead>
				<tr>
						<th onClick="doctors(0)">Name</th>
						<th onClick="doctors(1)">Experience</th>
						<th onClick="doctors(2)">Recommendations</th>
						<th onClick="locations(3)">Marker</th>
						<th onClick="locations(4)">Locations</th> 
						<th onClick="locations(5)">Distance</th>
						<th onClick="locations(6)">Fees</th>						
				</tr>
			</thead>
			<tbody>		
				<?php 
					$len = count($results);					
					for ($i = 0; $i < $len; $i++) {
						$len2 = count($results[$i]['Matches']);
				?>
				<script>
					var i = <?php echo $i; ?>; 
					var point = new GLatLng(<?php echo $results[$i]['Location']['coordinates']; ?>); 
					map2.addOverlay(createMarker(point, i));
				</script>
				<tr class="resultsRow">
						<td style="text-align: left">
							<a href="#/doctors/byName/<?php echo $results[$i]['Doctor']['name']; ?>">
								<span class="name"><?php echo $results[$i]['Doctor']['name']; ?></span>
								<br />
								<?php echo $results[$i]['Doctor']['qualifications']; ?>
								<br />		
							</a>
						</td>
						<td>
							<?php $experience = date("Y") - $results[$i]['Doctor']['experience'];
							echo "" . $experience . " Years" ?>
						</td>
						<td>
							<?php 	echo "4 friends" . '<br />'; 
							echo "out of " . '<span style="font-size: 150%">'. $results[$i]['Doctor']['recommendation'] . '</span>' . " total";
							?>
						</td>
						<td style="border-left: 1px solid #ccc;" class="location2">
							<?php for ($j = 0; $j < $len2; $j++)	{
								if (($len2 - $j) > 1)	{
									echo '<tr class="location">';	}
								else	{
									echo '<tr class="location" style="border:none;">';	} 
								echo '<td class="location3">';	?>
							<img src="http://www.google.com/mapfiles/marker<?php echo chr((($i + $j) + 65)); ?>.png" onClick="map2.panTo(new GLatLng(<?php echo $results[$i]['Matches'][$j]['Location']['coordinates']; ?>))" />
							<?php echo '</td></tr>'; } ?>
						</td>
						<td class="location2">
							<?php for ($j = 0; $j < $len2; $j++)	{
								if (($len2 - $j) > 1)	{
									echo '<tr class="location">';	}
								else	{
									echo '<tr class="location" style="border:none">';	}
								
								echo '<td class="location3">';								
								echo $results[$i]['Matches'][$j]['Location']['name'];	
								echo '</td></tr>';
							} ?>
						</td>
						<td class="location2">
								<?php 
								for ($j = 0; $j < $len2; $j++)	{  
									if (($len2 - $j) > 1)	{
										echo '<tr class="location">';	}
									else	{
										echo '<tr class="location" style="border:none">';	}
									
									echo '<td class="location3">';
									$lat2 = $_GET['latitude'];
									$lon2 = $_GET['longitude'];
									if ($lat2 && $lon2 && $results[$i]['Matches'][$j]['Location']['coordinates'])	{
										$coordinates = explode (",", $results[$i]['Matches'][$j]['Location']['coordinates']);
										echo round((3958*3.1415926*sqrt(($lat2-$coordinates[0])*($lat2-$coordinates[0]) + cos($lat2/57.29578)*cos($coordinates[0]/57.29578)*($lon2-$coordinates[1])*($lon2-$coordinates[1]))/180), 2); 
										echo " KM"; 
									}
									else
										echo "Where are you?";
									echo '</td></tr>';
								}
								?>
						</td>							
						<td class="location2">
							<?php 							
							for ($j = 0; $j < $len2; $j++)	{  
								if (($len2 - $j) > 1)	{
									echo '<tr class="location">';	}
								else	{
									echo '<tr class="location" style="border:none">';	}
								echo '<td class="location3">';
								echo "Rs. " . $results[$i]['Matches'][$j]['init_list_price'] . '<br />';
								echo "Rs. " . $results[$i]['Matches'][$j]['price'] . '<br />';  
								echo '</td></tr>';
							} ?>
						</td>					
					</tr>	
				<?php } ?>
			</tbody>
		</table>
		<table class="resultsTable" id="resultsTable2" style="display:none">	
			<thead>
				<tr>
						<th onClick="doctors(0)">Name</th>
						<th onClick="doctors(1)">Experience</th>
						<th onClick="doctors(2)">Recommendations</th>
						<th onClick="locations(3)">Marker</th>
						<th onClick="locations(4)">Locations</th>
						<th onClick="locations(5)">Distance</th>
						<th onClick="locations(6)">Fees</th>
						
				</tr>
			</thead>
			<tbody>		
				<?php 
					$len = count($results2['Matches']);
					for ($i = 0; $i < $len; $i++) {
				?>
				<script>
					var i = <?php echo $i; ?>; 
					var point = new GLatLng(<?php echo $results2['Matches'][$i]['Location']['coordinates']; ?>); 
					map2.addOverlay(createMarker(point, i));
				</script>
				<tr class="resultsRow">
						<td style="text-align: left">
							<a href="#/doctors/byName/<?php echo $results2['Matches'][$i]['Doctor']['name']; ?>">
								<span class="name"><?php echo $results2['Matches'][$i]['Doctor']['name']; ?></span>
								<br />
								<?php echo $results2['Matches'][$i]['Doctor']['qualifications']; ?>
								<br />		
							</a>
						</td>
						<td>
							<?php $experience = date("Y") - $results2['Matches'][$i]['Doctor']['experience'];
							echo "" . $experience . " Years" ?>
						</td>
						<td>
							<?php 	echo "4 friends" . '<br />'; 
							echo "out of " . '<span style="font-size: 150%">'. $results2['Matches'][$i]['Doctor']['recommendation'] . '</span>' . " total";
							 ?>
						</td>
						<td>
							<img src="http://www.google.com/mapfiles/marker<?php echo chr(($i + 65)); ?>.png" onClick="map2.panTo(new GLatLng(<?php echo $results2['Matches'][$i]['Location']['coordinates']; ?>))" />
						</td>
						<td>
							<?php echo $results2['Matches'][$i]['Location']['name']; ?>
						</td>
						<td>
								<?php 
								$lat2 = $_GET['latitude'];
								$lon2 = $_GET['longitude'];
								if ($lat2 && $lon2 && $results2['Matches'][$i]['Location']['coordinates'])	{
									$coordinates = explode (",", $results2['Matches'][$i]['Location']['coordinates']);
									echo round((3958*3.1415926*sqrt(($lat2-$coordinates[0])*($lat2-$coordinates[0]) + cos($lat2/57.29578)*cos($coordinates[0]/57.29578)*($lon2-$coordinates[1])*($lon2-$coordinates[1]))/180), 2); 
									echo " KM"; 
								}
								else
									echo "Where are you?";
								?>
						</td>							
						<td>
							<?php echo "Rs. " . $results2['Matches'][$i]['DoctorDetail']['init_price'] . '<br />'; ?>
							<?php echo "Rs. " . $results2['Matches'][$i]['DoctorDetail']['price'] . '<br />'; ?>
						</td>						
					</tr>	
				<?php } ?>
			</tbody>
		</table>
		</div>
	</replaceAndFadeIn>
	<replaceContent select=".topleft">
		<br /><br /><br />
		<h2>Need Help?</h2>
		<p><a href="#">Ask the MediConnect GP</a> about general diagonsis, and other questions</p>
		<p>Drop off an email at <a href="#">help@mediconnect.pk</a></p>
		
		<h2>Can't understand some words?</h2>
		<p><a href="#">Ask away</a> or <a href="#"> look them up</a></p>		
	</replaceContent>
	<remove select=".midThird" />
	<eval><![CDATA[
		$(".left").css("width","200px");
		$(".left").css("float","right");
		$(".right").css("width","772px");
		$(".main").css("width","772px");
		$(".resultsTable").css("width","771px");
		$("#features").css("width","200px");
		$("#features").css("float","right");
		$(".topleft").css("padding-left","12px");
		$(".topleft").css("padding-right","10px");
		
		<?php 
			//Check to determine whether there are ny results in the table (tablesorter spews out errors if it's a 0 result table
			if ($len > 0) { 
		?>
		$("#resultsTable").tablesorter( {sortList: [[0,0]]} );
		$("#resultsTable2").tablesorter( {sortList: [[3,0]]} );	
		
		function locations(locations) { 
			if ($("#resultsTable2").is(":hidden"))	{
				$("#resultsTable").hide(); 
				var sorting = [[locations,0]]; 
				$("#resultsTable2").trigger("sorton",[sorting]);
				$("#resultsTable2").fadeIn('slow');
			}
		}
		
		function doctors(doctors) { 
			if ($("#resultsTable").is(":hidden"))	{
				$("#resultsTable2").hide(); 
				var sorting = [[doctors,0]]; 
				$("#resultsTable").trigger("sorton",[sorting]);
				$("#resultsTable").fadeIn('slow');
			}
		}
		<?php } ?>
		    
    $('#searchForm').submit(function() {
      var address = '/doctors/bySpecialty?' + $('#searchForm').formSerialize();
      for (var i = 1; i <= current; i++) {
        address += '&' + $('#selectDay' + i).val() + '=' + $('#selectStartTime' + i).val() + '-' + $('#selectEndTime' + i).val();
      }
      
      $.address.value(address);
      return false;
    });
    
	]]></eval>
</taconite>


		