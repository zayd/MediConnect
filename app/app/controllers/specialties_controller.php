<?php
class SpecialtiesController extends AppController {
  var $layout = 'ajax';
  
  function advancedSearch() {
    Configure::write('debug', 1);
    $q = $this->params['url'];
    $days = array(
      'monday' => $q['monday'],
      'tuesday' => $q['tuesday'],
      'wednesday' => $q['wednesday'],
      'thursday' => $q['thursday'],
      'friday' => $q['friday'],
      'saturday' => $q['saturday'],
      'sunday' => $q['sunday']
    );
    foreach($days as $day => $time) {
      if (!$time || $time == '0000-0000') { unset($days[$day]); } // remove all null entries
    }
    $results = $this->Specialty->advancedSearch($q['specialty'], $q['location'], $days, $q['fee'], $q['wait'], $q['experience']);
    $this->set('results', $results[0]);
    $this->set('results2', $results[1]);
  }
}
?>