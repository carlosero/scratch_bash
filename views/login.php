<div class="container text-center Vblock">
    <form class="form-signin center-block Vcentered" method="post" action="?action=signin">
        <h2 class="form-signin-heading ">Scratch Bash</h2>
        <input id="user_user" onkeyup="habilitarboton('login');" name="user_user" class="form-control" placeholder="User" maxlength="20" required="" autofocus="" type="text">
        <input id="user_password" onkeyup="habilitarboton('login');" name="user_password" class="form-control" placeholder="Password" maxlength="20" required="" type="password">
        <div class="center-block" style="width:180px; margin-top:10px;">
            <button id="user_login" type="submit" class="btn btn-default" disabled>LOG IN</button>
            <a href="?action=register" type="button" class="btn btn-default">REGISTER</a>
        </div>
        <?php //print_request_messages() ?>
        <?php echo print_field_error($user, 'user'); ?><br/>
        <?php echo print_field_error($user, 'password'); ?><br/>
    </form>
</div> 
