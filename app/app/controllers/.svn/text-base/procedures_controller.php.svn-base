<?php
class ProceduresController extends AppController {
  var $layout = 'xml';
  
  function index() {
    $this->set('procedures', $this->Procedure->find('all'));
  }
  
  function byName($name) {
    $this->set('procedures', $this->Procedure->findByName($name));
  }
}
?>