<?php
class DoctorBookingsController extends AppController {
	var $components = array('Auth', 'Email');
	var $layout = 'xml';
  
  function beforeFilter() {
    $this->Auth->ajaxLogin = 'mustlogin';
  }
  
  function add($doctor, $type, $location, $year, $month, $day, $hour, $minute) {
    if (!empty($this->data)) {
			if ($this->DoctorBooking->save($this->data)) {
				// email us
				$this->Email->from = 'MediConnect <info@mediconnect.pk>';
				$this->Email->to = 'mediconnectpk@gmail.com';
				$this->Email->subject = 'Appointment Request';
				
				// email lines
        $this->DoctorBooking->recursive = 2;
        $booking = $this->DoctorBooking->findById($this->DoctorBooking->id);
        $type = $booking['DoctorBooking']['type'];
        $pricePrefix = ($type == 'initial') ? 'init_' : '';
				$lines = array('Appointment of type ' . $type . ' visit requested by ' . $booking['User']['name'] . ' for Dr. ' . $booking['Doctor']['name'] . ' at ' . $booking['DoctorDetail']['Location']['name'] . ' on ' . $booking['DoctorBooking']['date_time'] . '.');
				$lines[] = ''; // blank line
				$lines[] = 'Reason for appointment:';
				$lines[] = $booking['DoctorBooking']['reason'];
				$lines[] = '';
				$lines[] = 'Any additional information provided:';
				$lines[] = $booking['DoctorBooking']['notes'];
				$lines[] = '';
				$lines[] = 'Appointment details';
				$lines[] = '';
				$lines[] = 'Price: ' . $booking['DoctorDetail'][$pricePrefix . 'price'];
				$lines[] = 'List Price: ' . $booking['DoctorDetail'][$pricePrefix . 'list_price'];
				$lines[] = 'Emergency: ' . (($booking['DoctorBooking']['emergency']) ? 'Yes' : 'No');
				$lines[] = 'Confirm by phone: ' . (($booking['DoctorBooking']['phone_confirmations']) ? 'Yes' : 'No');
				$lines[] = 'Confirm by SMS: ' . (($booking['DoctorBooking']['sms_confirmations']) ? 'Yes' : 'No');
				$lines[] = 'Confirm by email: ' . (($booking['DoctorBooking']['email_confirmations']) ? 'Yes' : 'No');
				$lines[] = 'Remind by phone: ' . (($booking['DoctorBooking']['phone_reminders']) ? 'Yes' : 'No');
				$lines[] = 'Remind by SMS: ' . (($booking['DoctorBooking']['sms_reminders']) ? 'Yes' : 'No');
				$lines[] = 'Remind by email: ' . (($booking['DoctorBooking']['email_reminders']) ? 'Yes' : 'No');
				$lines[] = '';
				$lines[] = 'User details';
				$lines[] = '';
				$lines[] = 'Residence number: ' . $booking['User']['residence_number'];
				$lines[] = 'Cell number: ' . $booking['User']['cell_number'];
				$lines[] = 'Email address: ' . $booking['User']['email_address'];
				
				// won't work on our local servers cos of no SMTP. We'll have to upload this to test it out
				// in the meantime, the contents of the email are displayed in the created page so we can see what it'll look like
				//$this->Email->send($lines);
				$this->Session->write('email', join("\n", $lines));

				$this->redirect(array('action' => 'created'));
			}
		} else {
			// round off minute to nearest multiple of 15
			$minute = round($minute / 15) * 15;
			
			// make sure the $type is either 'initial' or 'follow-up'
			if ($type != 'follow-up') {
				$type = 'initial';
			}
			
			// see by_name.ctp for why it's Almaty
			date_default_timezone_set('Asia/Almaty');
			$timestamp = mktime($hour, $minute, 0, $month, $day, $year);
			
			$doc = $this->DoctorBooking->Doctor->checkIntegrity($doctor, $location, $timestamp);
			if ($doc['problem']) {
				// some error occurred, display the error page
				$this->cakeError('badInput', $doc);
			} else {
				// everything okay, set view variables
				$this->set('details', array(
					'doctor_id' => $doc['Doctor']['id'],
          'doctor_detail_id' => $doc['DoctorDetail']['id'],
					'user_id' => $this->Auth->user('id'),
					'name' => $doctor,
					'type' => $type,
					'location' => $doc['DoctorDetail']['Location']['name'],
					'date' => $timestamp,
				));
			}
		}
  }
  
  // just take the user to the view directly, no processing needed
  function created() {
  }
}
?>