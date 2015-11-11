<div class="container text-center pagination-centered Vblock">
    <?php print_request_messages() ?>
    <form class="form-signin center-block Vcentered" style="width: 290px;" method="post" action="?action=signin">
        <h2 class="form-signin-heading ">Scratch Bash</h2>
        <input id="user_user" name="user_user" class="form-control" placeholder="User" required="" autofocus="" type="text">
        <input id="user_password" name="user_password" class="form-control" placeholder="Password" required="" type="password">
        <div class="center-block" style="width:180px; margin-top:10px;">
            <button type="submit" class="btn btn-default">SIGN IN</button>
            <a href="?action=register" type="button" class="btn btn-default">SIGN UP</a>
        </div>
        <?php echo print_field_error($user, 'user'); ?><br/>
        <?php echo print_field_error($user, 'password'); ?><br/>
    </form>
</div> 
