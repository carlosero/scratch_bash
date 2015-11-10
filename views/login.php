<?php print_request_messages() ?>
<form method="post" action="?action=signin">
  <span>User:</span><br/>
  <input type="text" name="user_user"/><br/>
  <?php echo print_field_error($user, 'user'); ?><br/>
  <span>Password:</span><br/>
  <input type="password" name="user_password"/><br/>
  <?php echo print_field_error($user, 'password'); ?><br/>
  <br/>
  <input type="submit">
  <a href="?action=register">Register</a>
</form>
