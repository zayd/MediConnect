<?php
class DoctorDetail extends AppModel {
  var $belongsTo = array('Doctor', 'Location');
  
  var $hasMany = 'DoctorBooking';
}
?>