<?php
class Doctor extends AppModel {
  var $belongsTo = 'Specialty';
  
  var $hasMany = array(
    'DoctorDetail' => array(
      'className' => 'DoctorDetail',
      'dependent' => true
    ),
    'DoctorReview',
    'DoctorBooking'
  );

  // checks if the doctor with $name exists, and if he does whether he sits at the time given by $timestamp
  // basically, since this info is passed in the URL it's easy to mess around with
  // so to avoid any inconvenience/errors, we have to run this
  function checkIntegrity($name, $location, $timestamp) {
		// see by_name.ctp for why it's Almaty
		date_default_timezone_set('Asia/Almaty');

		// make sure date isn't in the past
		if ($timestamp < time()) {
			return array('problem' => 'date given has already passed');
		}
		
		// get day, hour and minute
		$day = strtolower(date('l', $timestamp));
		$hour = (int) date('G', $timestamp);
		$minute = (int) date('i', $timestamp);

    // can't figure out a way to do this in a single query
    $details = $this->DoctorDetail->find('all', array(
      'conditions' => array('Location.id' => $location),
      'fields' => 'DoctorDetail.id'
    ));
    
    $detailIDs = array();
    for ($i = 0; $i < count($details); $i++) {
      $detailIDs[] = $details[$i]['DoctorDetail']['id'];
    }
		
    // quick trick to be able to search both hospitals and doctors in a single query
    $this->unbindModel(array('hasMany' => array('DoctorDetail')));
    $this->bindModel(array('hasOne' => array('DoctorDetail' => array('className' => 'DoctorDetail'))));
    
    // search for the doctor with $name who sits at $hospital
    $doc = $this->find('first',
      array(
        'conditions' => array('Doctor.name' => $name, 'DoctorDetail.id' => $detailIDs),
        'fields' => array('Doctor.id', 'DoctorDetail.' . $day, 'DoctorDetail.id'),
        'recursive' => 2
      )
    );

    // doctor doesn't exist or doesn't sit at location
    if (!$doc) {
      return array('problem' => 'doctor name could not be found in our database or else this doctor does not sit at the provided location');
    }
		
		// check if time is within bounds
    $time = $hour * 100 + $minute;
    list($start, $end) = split('-', $doc['DoctorDetail'][$day]);
    if (!$start) {
      return array('problem' => 'doctor does not sit at this location on this day');
    } elseif ($time < (int) $start || $time > (int) $end) {
      return array('problem' => 'requested time is outside the times the doctor is present at this location');
    } else {
      return $doc;
    }
  }
}
?>