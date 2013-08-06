<?php
class Location extends AppModel {
  var $hasMany = array('DoctorDetail', 'ProcedureDetail');
}
?>