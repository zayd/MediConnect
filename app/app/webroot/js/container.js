var curType = 'doctor'; // if it's a doctor/procedure/specialty
var specialtyId = 0; // the currently selected specialty's ID
var initSearchValue = 'Enter the first letter of any doctor or medical procedure...';
var watermark = new Array();
watermark['searchName'] = 'Enter the first letter of any doctor or medical procedure...';
watermark['UserUsername'] = 'Username';
watermark['UserPassword'] = 'Password';

$.get('users/greet');

function formatItem(row) {
	if (row[2] == 'specialty')
		return '<table><tr><td><img src="img/profiles/' + row[0] + '.jpg" class="autocompleteImage"></td><td class="autocompleteName"><strong>' + row[0] + '</strong><br><font style="font-size:75%;">' + "Keywords: " + row[1] + '</font></td></tr></table>';  
	if (row[2] == 'message')
		return '<table><tr><td><strong>' + row[0] + '</strong></td></tr></table>';
	else
		return '<table><tr><td><img src="img/profiles/' + row[0] + '.jpg" class="autocompleteImage"></td><td class="autocompleteName"><strong>' + row[0] + '</strong><br><font style="font-size:75%;">' + "Details: " + row[1] + '</font></td></tr></table>';  
}

// handle all element handler settings, so that taconite can work properly
function indexHandlers() {	
  // Submit handler for the search form
  $('#searchForm').submit(function() {
    var searchVal = $('#searchName').val();
    if (searchVal && searchVal != initSearchValue) {
      if (curType != 'specialty') {
        // for everything except specialties
        var addressMap = { doctor: '/doctors/byName/', procedure: 'procedures/byName/' };
        $.address.value(addressMap[curType] + searchVal);
      } else {
		// for specialties
        var address = '/doctors/bySpecialty?specialty=' + specialtyId + '&' + $('#searchForm').formSerialize();
        for (var i = 1; i <= current; i++) {
          address += '&' + $('#selectDay' + i).val() + '=' + $('#selectStartTime' + i).val() + '-' + $('#selectEndTime' + i).val();
        }
        $.address.value(address);
      }
    } else {
      alert('You must enter a doctor name, procedure or specialty');
    }    
    return false;
  });

   $('.textBox').focus(function() {
	var initSearchValue = watermark[$(this).attr('id')];		
    $(this).css({ 'border-color': '#EB4545', 'color': 'black' });
    if (this.value == initSearchValue) {
      this.value = '';
    }	
  });

  $('.textBox').blur(function() {
    $(this).css('border-color', '#C0C0C0');
    if (this.value == '') {
      $(this).css('color', '#C0C0C0');
    this.value = watermark[$(this).attr('id')];		  	  			
    }
  });

  $('#searchName').autocomplete('homes/autocomplete', { 
    minChars: 1, delay: 0, matchContains: false, cacheLength: 10, formatItem: formatItem, selectOnly: 2, highlight: false,
    autoFill: false, mustMatch: false, extraParams: { location: function() { return $('#selectHospital').val(); } }
  });

  // Update curType and specialtyId (if relevant) whenever the autcomplete selection changes
  $('#searchName').result(function(e, selected) { curType = selected[2]; specialtyId = selected[3]; });

  // Whenever the hospital changes, flush the autocomplete cache and clear the search field unless All Hospitals is selected
  $('#selectHospital').change(function() {
    $('#searchName').flushCache();
    if ($(this).val()) {
      $('#searchName').val(initSearchValue);
    }
  });
  
    map = new GMap2(document.getElementById("map")); 
    map.checkResize(); 
    map.setCenter(new GLatLng(24.89079661665395,67.02964782714844), 12); 
					
    GEvent.addListener(map, 'click', function(overlay, point) { 
        if (overlay) { 
            map.removeOverlay(overlay); 
        } 
        else if (point) { 
            map.panTo(point); 
            map.clearOverlays(); 
            var marker = new GMarker(point); 
            map.addOverlay(marker); 
			$("#selectLatitude").val(point.y); 
			$("#selectLongitude").val(point.x); 
            
        } 
    }); 
    map.addControl(new GSmallMapControl()); 
	FB_RequireFeatures(["XFBML"], function()
    {
       FB.Facebook.init("137f8d36941cf6739f45b4a7f3247f8b", "/xd_receiver.htm");
    });	
}

var gaJsHost = (('https:' == document.location.protocol) ? 'https://ssl.' : 'http://www.');
document.write(unescape('%3Cscript src="' + gaJsHost + 'google-analytics.com/ga.js" type="text/javascript"%3E%3C/script%3E'));
try {
  var pageTracker = _gat._getTracker("UA-7690837-1");
  pageTracker._trackPageview();
} catch (err) {}

// AJAX handlers for loading/loaded
$(document.body).ajaxSend(function(evt, request, settings) {
  //$(this).css('background-color', 'black');
  //$.blockUI();
  if (settings.url.substr(0, 18) != 'homes/autocomplete') {
    // as long as we're not calling autocomplete, block the UI and display the gif
    //alert(settings.url);
    $.blockUI({ message: '<img src="css/images/indicator3.gif" />' });
  }
}).ajaxStop(function() {
  //$(this).css('background-color', 'white');
  $.unblockUI();
});

// Address handler, this does all of our AJAX requests
// How this works is, we never do any AJAX stuff from our form directly
// Instead, we use the $.address.value function to change the address value
// That value gets processed by this function and the appropriate thing loaded
$.address.change(function(e) {
  if (e.value == '/') {
    // load up taconite to load up stuff for the main page
    $.get('homes/index');
  } else {
    $.get(e.value.substr(1));
  }
});

function advancedSlide()
{
	if ($('.advanced').is(":hidden")) {
		$(".searchForm").animate({ 
        //If changing this be sure to change var height down below
		height: "61em",        
      }, 500 );
		$('.advanced').slideDown("medium");
		$('#map').css("left", 0);		
	}
	else {
		$(".searchForm").animate({ 
        height: "18em",        
      }, 500 );
		$('.advanced').fadeOut("fast");
		$('#map').css("left", -9999);
	}		
}	

//This is to slide down the main page box as new days are added 
var current = 1;
var height = 68;
var timeHourBreak = timeHourBreak();

//Add a Day
function addDay()
{
   current++;
   if (current <= 7)
   {
		var strToAdd = '<br />on&nbsp;&nbsp;';
		strToAdd += '<select id="selectDay' + current + '"> <option value="monday">Monday</option>	<option value="tuesday">Tuesday</option>	<option value="wednesday">Wednesday</option> <option value="thursday">Thursday</option>		<option value="friday">Friday</option>		<option value="saturday">Saturday</option>  <option value="sunday">Sunday</option> </select>';
		
		strToAdd += '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="selectStartTime' + current + '" class="dropDownSmall">'; 
		strToAdd += timeHourBreak;
		strToAdd += '</select>';
		
		strToAdd += 'to&nbsp;&nbsp;';
		strToAdd += '<select id="selectEndTime' + current + '" class="dropDownSmall">';
		strToAdd += timeHourBreak;
		strToAdd += '</select>';
		
		strToAdd += '&nbsp;&nbsp;<span class=".addDayButton"><span onClick="addDay()" style="font-size:250%; cursor: pointer; border: none">+</span></span>';
		$('.addDayButton').remove();
		$('#addDay').append(strToAdd);
		
		height = height + 8;		
		$(".searchForm").animate({ 
        height: height+"em",        
		}, 500 );	  
	} 
	else { current--; } // make sure current doesn't become greater than 7 
}

function addDaySmall()
{
   current++;
   if (current <= 7)
   {
		var strToAdd = '<br /><span style="">on</span>&nbsp;&nbsp;&nbsp;';
		strToAdd += '<select id="selectDay' + current + '" style="color: grey; font-size:12px; width: 127px; border: 1px solid #ccc"> <option value="monday">Monday</option>	<option value="tuesday">Tuesday</option>	<option value="wednesday">Wednesday</option> <option value="thursday">Thursday</option>		<option value="friday">Friday</option>		<option value="saturday">Saturday</option>  <option value="sunday">Sunday</option> </select>'    ;
		strToAdd += '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="selectStartTime' + current + '" style="color: grey; font-size:12px; width: 100px; border:  1px solid #ccc"> <option value="0000">12:00 AM</option>			<option value="0100">1:00 AM</option>	<option value="0200">2:00 AM</option> <option value="0300">3:00 AM</option>		<option value="0400">4:00 AM</option>	<option value="0500">5:00 AM</option> <option value="0600">6:00 AM</option>		<option value="0700">7:00 AM</option>	<option value="0800">8:00 AM</option> <option value="0900">9:00 AM</option>		<option value="1000">10:00 AM</option>	<option value="1100">11:00 AM</option> <option value="1200">12:00 PM</option>		<option value="1300">1:00 PM</option>	<option value="1400">2:00 PM</option> <option value="1500">3:00 PM</option>		<option value="1600">4:00 PM</option>	<option value="1700">5:00 PM</option> <option value="1800">6:00 PM</option>		<option value="1900">7:00 PM</option>	<option value="2000">8:00 PM</option> <option value="2100">9:00 PM</option>		<option value="2200">10:00 PM</option>	<option value="2300">11:00 PM</option> </select>';
		strToAdd += '<span style="">&nbsp;&nbsp;to&nbsp;&nbsp;</span>';
		strToAdd += '<select id="selectEndTime' + current + '" style="color: grey; font-size:12px; width: 100px; border: 1px solid #ccc;" > <option value="0000">12:00 AM</option> <option value="0100">1:00 AM</option>	<option value="0200">2:00 AM</option> <option value="0300">3:00 AM</option>		<option value="0400">4:00 AM</option>	<option value="0500">5:00 AM</option> <option value="0600">6:00 AM</option>		<option value="0700">7:00 AM</option>	<option value="0800">8:00 AM</option> <option value="0900">9:00 AM</option>		<option value="1000">10:00 AM</option>	<option value="1100">11:00 AM</option> <option value="1200">12:00 PM</option>		<option value="1300">1:00 PM</option>	<option value="1400">2:00 PM</option> <option value="1500">3:00 PM</option>		<option value="1600">4:00 PM</option>	<option value="1700">5:00 PM</option> <option value="1800">6:00 PM</option>		<option value="1900">7:00 PM</option>	<option value="2000">8:00 PM</option> <option value="2100">9:00 PM</option>		<option value="2200">10:00 PM</option>	<option value="2300">11:00 PM</option> </select>';
		strToAdd += '&nbsp;&nbsp;<span onClick="addDaySmall()" style="font-size:250%; cursor: pointer; border: none">+</span>';
		$('#addDay').append(strToAdd);	

		$("#mapSmall").animate({ 
        height: ($("#mapSmall").height() + 70)+"px"      
      }, 500 );				
	} 
	else { current--; } // make sure current doesn't become greater than 7 
}

function timeHourBreak()
{
	var strToAdd;
	for (var time = 0; time < 2400; time = time + 100) {
		if (time < 1300)	{ ampm ='AM'; formatTime = time; }
		else	{ ampm = 'PM'; formatTime = time - 1200; }	
		formatTime = formatTime / 100;
		if (formatTime == 0)	{ formatTime = 12 }
		strToAdd += '<option value="' + time + '">' + formatTime + ':00 ' + ampm + '</option>';
	}	
	return strToAdd;
}

//Google Maps
google.load("maps", "2.x");