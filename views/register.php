<div class="container text-center Vblock">
    <?php print_request_messages() ?>
    <form class="form-signin center-block Vcentered" style="width: 290px;" method="post" action="?action=create">
        <h2 class="form-signin-heading">Registration</h2>
        <input id="user_name" name="user_name" value="<?php if ($user) { echo $user->name; } ?>" class="form-control" placeholder="Name" required="" autofocus="" type="text" >
        <input id="user_user" name="user_user" class="form-control" value="<?php if ($user) { echo $user->user; } ?>" placeholder="User" required="" type="email">
        <input id="user_password" name="user_password" class="form-control" placeholder="Password" required="" type="password">
        <input id="user_password_confirmation" name="user_password_confirmation" class="form-control" placeholder="Confirm Password" required="" type="password">
        <div class="center-block" style="width:181px; margin-top:10px;">
            <a href="?action=login" type="button" class="btn btn-default">CANCEL</a>
            <button type="submit" class="btn btn-default">REGISTER</button>
        </div>
        <?php echo print_field_error($user, 'name'); ?><br/>
        <?php echo print_field_error($user, 'user'); ?><br/>
        <?php echo print_field_error($user, 'password'); ?><br/>
        <?php echo print_field_error($user, 'password_confirmation'); ?><br/>
    </form>
</div> 