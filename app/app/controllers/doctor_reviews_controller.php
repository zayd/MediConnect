<?php
class DoctorReviewsController extends AppController {
  var $layout = 'xml';
  
  function byDoctor($doctor) {
    $this->set('reviews', $this->DoctorReview->Doctor->findByName($doctor));
  }
}
?>