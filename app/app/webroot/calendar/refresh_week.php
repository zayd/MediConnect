<?php header('Content-type: text/xml'); ?> 
<taconite>
<replaceAndFadeIn select="#days">
<?php
	$week = $_GET['week'];
	echo '<th style="width:300px">' . " " . '</th>';
	echo '<th class="prev_week"><a href="javascript:prevWeek()">' . "Prev Week" . '</a></th>';
	for ($i = 0; $i < 7; $i++) {
		$weeksInDays = $i + ($week * 7);
		echo '<th style="width:67px" class="calendar">';
		echo '<span class="day">' . date("l",  strtotime("+$i day")) . '</span><br />'; 
		echo '<span class="date">' . date("d/m/Y", strtotime("+$weeksInDays day")) . '</span>';
		echo '</th>';
	}
	echo '<th class="next_week"><a href="javascript:nextWeek()">' . "Next Week" . '</a></th>';
	$week++;			
?>
</replaceAndFadeIn>

</taconite>