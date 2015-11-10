<?php print_request_messages() ?>
<form method="post" action="?action=create">
  <span>Name:</span><br/>
  <input type="text" name="user_name" value="<?php if ($user) { echo $user->name; } ?>"/><br/>
  <?php echo print_field_error($user, 'name'); ?><br/>
  <span>User:</span><br/>
  <input type="text" name="user_user" value="<?php if ($user) { echo $user->user; } ?>"/><br/>
  <?php echo print_field_error($user, 'user'); ?><br/>
  <span>Password:</span><br/>
  <input type="password" name="user_password"/><br/>
  <?php echo print_field_error($user, 'password'); ?><br/>
  <span>Confirm Password:</span><br/>
  <input type="password" name="user_password_confirmation"/><br/>
  <?php echo print_field_error($user, 'password_confirmation'); ?><br/>
  <br/>
  <input type="submit">
</form>
