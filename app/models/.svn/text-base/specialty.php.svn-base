<?php
class Specialty extends AppModel {
  var $hasMany = 'Doctor';
  
  // Perform an advanced search and return the results
  // $specialty: the specialty ID
  // $location: the location ID
  // $days: an array of form array('monday' => range, 'tuesday' => range, ...)
  // $fee: the upper limit for fee
  // $wait: the upper limit for wait time
  // $experience: the lower limit for years of experience
  
  function advancedSearch($specialty, $location = null, $days = null, $fee = null, $wait = null, $experience = null) {
    // Part 1: makes the array with one entry per doctor
    
    $conds = array('Doctor.specialty_id' => $specialty);
    if (strpos($location, ',') > -1) {
      // make array of location IDs we're NOT supposed to match
      $location = array_flip(explode(',', $location));
    } elseif ($location) {
      // note location ID we're supposed to match
      $location = (int) $location;
    }
    /*if ($location) {
      // quick trick to get querying by hospitals working. Doesn't affect anything else
      $this->Doctor->unbindModel(array('hasMany' => array('DoctorDetail')), false);
      $this->Doctor->bindModel(array('hasOne' => array('DoctorDetail' => array('className' => 'DoctorDetail'))), false);
          
      if (strpos($location, ',') > -1) {
        // search for all locations NOT in the comma-separated list
        $conds['NOT'] = array('DoctorDetail.location_id' => explode(',', $location));
      } else {
        // search for the specified location
        $conds['DoctorDetail.location_id'] = $location;
      }
    }*/
    /*if ($fee) {
      $conds['DoctorDetail.init_list_price <='] = $fee;
    }
    if ($wait) {
      $conds['DoctorDetail.wait <='] = $wait;
    }*/
    if ($experience) {
      $conds['Doctor.experience <='] = (int) date('Y', time()) - $experience;
    }
    
    // get initial results array
    $results = $this->Doctor->find('all', array(
      'conditions' => $conds,
      'recursive' => 2
    ));
    /*$results = $this->Doctor->DoctorDetail->find('all', array(
      'conditions' => $conds,
      'recursive' => 2
    ));*/
    
    // if no timings have been supplied, we can skip the timings check
    $skipTimings = false;
    $dayCount = count($days);
    if ($dayCount == 0) {
      $skipTimings = true;
    }
    
    // process the results and sort out locations into matching/non-matching
    $len = count($results);
    for ($i = 0; $i < $len; $i++) {
      $detailsCount = count($results[$i]['DoctorDetail']); // get the number of doctor details
      $results[$i]['Matches'] = array(); // array of all locations which match
      $results[$i]['NonMatches'] = array(); // array of all locations which don't
      
      // loop through each location to see if it matches
      for ($j = 0; $j < $detailsCount; $j++) {
        if ($skipTimings) {
          $timingsMatch = true; // if no timings were supplied
        } else {
          $timingsMatch = false; // assume there's no match initially
          foreach($days as $day => $range) {
            list($ourStart, $ourEnd) = split('-', $range);
            list($docStart, $docEnd) = split('-', $results[$i]['DoctorDetail'][$j][$day]);
            if ((int) $ourStart < (int) $docEnd && (int) $ourEnd > (int) $docStart) {
              $timingsMatch = true; // doctor timings within our range
              break; // no point looping over all the others in this case
            }
          }
        }
        
        if (!$timingsMatch || (is_array($location) && isset($location[$results[$i]['DoctorDetail'][$j]['location_id']])) || (is_int($location) && $results[$i]['DoctorDetail'][$j]['location_id'] != $location) || ($fee && $results[$i]['DoctorDetail'][$j]['init_list_price'] > $fee) || ($wait && $results[$i]['DoctorDetail'][$j]['wait'] > $wait)) {
          // something didn't match so this detail goes in the non-matching table
          $results[$i]['NonMatches'][] = $results[$i]['DoctorDetail'][$j];
        } else {
          
          $results[$i]['Matches'][] = $results[$i]['DoctorDetail'][$j];
        }
      }
      
      if (count($results[$i]['Matches']) == 0) {
        unset($results[$i]); // no matches at all, so delete this entry
      }
    }
    
    // remove all null entries from the array
    $results = array_values($results);
    
    // Part 2: makes the array with one entry per location
    
    if ($fee) {
      $conds['DoctorDetail.init_list_price <='] = $fee;
    }
    if ($wait) {
      $conds['DoctorDetail.wait <='] = $wait;
    }
    if (is_array($location)) {
      $conds['NOT'] = array('DoctorDetail.location_id' => $location);
    } elseif(is_int($location)) {
      $conds['DoctorDetail.location_id'] = $location;
    }
    
    $results2 = array();
    $results2['Matches'] = $this->Doctor->DoctorDetail->find('all', array(
      'conditions' => $conds,
      'recursive' => 0
    ));
    
    // process the times
    if (!$skipTimings) {
      $len = count($results2['Matches']);
      for ($i = 0; $i < $len; $i++) {
        $match = false; // gets set to true if there's even one timings match
        // go through each day to see if there's a match on any of them
        foreach ($days as $day => $range) {
          list($ourStart, $ourEnd) = split('-', $range);
          list($docStart, $docEnd) = split('-', $results2['Matches'][$i]['DoctorDetail'][$day]);
          if (isset($ourStart) && isset($docStart)) {
            if ((int) $ourStart < (int) $docEnd && (int) $ourEnd > (int) $docStart) {
              // doctor timings within our range
              $match = true;
              break; // no point looping over all the others when one matches
            }
          }
        }
      
        if (!$match) {
          unset($results2['Matches'][$i]); // delete the result if none of the timings match
        }
      }
    }
    
    // remove all null entries from the array
    $results2['Matches'] = array_values($results2['Matches']);
    
    // record all doctor and doctor_detail IDs which matched
    $doctorIDs = array();
    $doctorDetailIDs = array();
    $len = count($results2['Matches']);
    for ($i = 0; $i < $len; $i++) {
      $doctorIDs[$results2['Matches'][$i]['Doctor']['id']] = true; // avoid duplicate entries
      $doctorDetailIDs[$results2['Matches'][$i]['DoctorDetail']['id']] = true;
    }
    $doctorIDs = array_keys($doctorIDs); // keep only the keys
    $doctorDetailIDs = array_keys($doctorDetailIDs); // keep only the keys
    
    // search for all entries with the same doctor ID which aren't already in the Matches array
    $results2['NonMatches'] = $this->Doctor->DoctorDetail->find('all', array(
      'conditions' => array(
        'Doctor.id' => $doctorIDs,
        'NOT' => array('DoctorDetail.id' => $doctorDetailIDs)
      ),
      'recursive' => 0
    ));
    
    // if one doctor had multiple locations which matched, compress them all into one entry
    // we have to decide how we handle multiple locations if you're sorting by price for example
    // since a doctor has different prices at different locations, so we might have to display all locations
    // as separate entries in the listing.
    // if we do that we won't need this code
    // I've just commented it out for the time being
    /*$len = count($results);
    $doctorPositions = array();
    for ($i = 0; $i < $len; $i++) {
      if (!isset($doctorPositions[$results[$i]['Doctor']['id']])) {
        $doctorPositions[$results[$i]['Doctor']['id']] = $i;
      } else {
        $results[$doctorPositions[$results[$i]['Doctor']['id']]]['Location']['name'] .= ", {$results[$i]['Location']['name']}";
        unset($results[$i]);
      }
    }
    
    // remove all null entries from the array
    $results = array_values($results);*/
    
    return array($results, $results2);
  }
}
?>