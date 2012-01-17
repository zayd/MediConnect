<?php header('Content-type: text/xml'); ?>
<taconite>
  <replaceContent select="#logIn">
    <?php 
		echo '<div class="logIn"><p>' . "Hi " . '<strong>' . $session->read('Auth.User.name') . '</strong>' . "!" . '<br />';
		echo "Not you? "  . '<a href="#">' . "Sign In" . '</a><br />';
		echo '<a href="javascript:dashboard()">' . "Dashboard" . '</a>' . " | " . '<a href="javascript:edit()">' . "Edit Profile" . '</a></p></div>';
		echo $form->create('User', array('action' => 'logout')); 
		echo $form->end('Logout');
	?>
		
  </replaceContent>
  <eval><![CDATA[
    var reloadpage = <?php echo (($reloadpage) ? 'true' : 'false'); ?>;
    if (reloadpage || $(".main #UserLoginForm").length) {
      $.get($.address.value().substr(1));
    }	
	function dashboard() {
		$.address.value('users/dashboard');
	}
	function edit() {
		$.address.value('users/edit');
	}
	]]></eval>
</taconite>