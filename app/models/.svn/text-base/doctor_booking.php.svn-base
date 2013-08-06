<?php
class DoctorBooking extends AppModel {
	var $belongsTo = array('Doctor', 'DoctorDetail', 'User');
	
	var $validate = array(
    // ID is auto-increment so we don't want someone to be able to supply their own
    'id' => array(
      'rule' => 'blank',
      'on' => 'create'
    ),
      
    'doctor_id' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
      
    'user_id' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
      
    'location' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
      
    'date_time' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
      
    'price' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
      
    'list_price' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
		
		'type' => array(
			'rule' => array('inList', array('initial', 'follow-up')),
			'message' => 'Appointment type must either be initial or follow-up.'
		)
	);
}
?>