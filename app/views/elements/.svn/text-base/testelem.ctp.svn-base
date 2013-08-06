<?php header('Content-type: text/xml'); ?>
<taconite>
  <replaceContent select=".main">
    <?php
      $session->flash('auth');
      echo $form->create('User', array('action' => 'login'));
      echo $form->input('username');
      echo $form->input('password');
      echo $form->end('Login');
    ?>
  </replaceContent>
</taconite>