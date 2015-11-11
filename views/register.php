<div class="container text-center Vblock">
    <form class="form-signin center-block Vcentered" method="post" action="?action=create">
        <h2 class="form-signin-heading">Registration</h2>
        <input id="user_name" name="user_name" onkeyup="habilitarboton('register');" value="<?php if ($user) { echo $user->name; } ?>" class="form-control" maxlength="20" placeholder="Name" required="" autofocus="" type="text" >
        <input id="user_user" name="user_user" onkeyup="habilitarboton('register');" class="form-control" value="<?php if ($user) { echo $user->user; } ?>" placeholder="User" maxlength="20" required="" type="text">
        <input id="user_password" name="user_password" onkeyup="habilitarboton('register');" class="form-control" placeholder="Password" maxlength="20" required="" type="password">
        <input id="user_password_confirmation" name="user_password_confirmation" onkeyup="habilitarboton('register');" class="form-control" placeholder="Confirm Password" maxlength="20" required="" type="password">
        <div class="center-block" style="width:181px; margin-top:10px;">
            <a href="?action=login" type="button" class="btn btn-default">CANCEL</a>
            <button id="user_login" type="submit" class="btn btn-default" disabled>SUBMIT</button>
        </div>
        <?php //print_request_messages() ?>
        <?php echo print_field_error($user, 'name'); ?><br/>
        <?php echo print_field_error($user, 'user'); ?><br/>
        <?php echo print_field_error($user, 'password'); ?><br/>
        <?php echo print_field_error($user, 'password_confirmation'); ?><br/>
    </form>
</div> 