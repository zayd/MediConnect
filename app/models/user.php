<?php
class User extends AppModel {
  var $hasMany = array(
    'DoctorBooking' => array(
      'className' => 'DoctorBooking',
      'dependent' => true
    ),
    'DoctorReview'
  );
  
  var $validate = array(
    // ID is auto-increment so we don't want someone to be able to supply their own
    'id' => array(
      'rule' => 'blank',
      'on' => 'create'
    ),
    
    'username' => array(
      'isUnique' => array(
        'rule' => 'isUnique',
        'message' => 'This username is already in use. Please select another one.'
      ),
      'notEmpty' => array(
        'rule' => array(
          'rule' => 'notEmpty',
          'message' => 'This field cannot be left blank.'
        )
      )
    ),
      
    'name' => array(
      'rule' => 'notEmpty',
      'message' => 'This field cannot be left blank.'
    ),
    
    'cell_number' => array(
      'rule' => array('phone', '/^0\d{10,10}$/'),
      'message' => 'Please supply a valid mobile number.'
    ),
    
    'residence_number' => array(
      'rule' => array('phone', '/^0\d{9,9}$/'),
      'message' => 'Please supply a valid residence number.',
      'allowEmpty' => true
    ),
    
    'date_of_birth' => array(
      'rule' => 'date',
      'message' => 'Please enter a valid date.'
    ),
    
    'gender' => array(
      'rule' => array('inList', array('Male', 'Female')),
      'message' => 'Gender must either be Male or Female.'
    ),
    
    'email_address' => array(
      'rule' => 'email',
      'message' => 'Please supply a valid email address.'
    ),
    
    'picture' => array(
      'rule' => 'url',
      'allowEmpty' => true,
      'message' => 'Please enter a valid URL'
    )
  );
}
?>