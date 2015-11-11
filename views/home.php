<div class="container text-center Vblock">
    <div class="form-signin center-block Vcentered" style="width: 290px;">
        <h2 class="form-signin-heading ">Welcome <?php echo $user->name; ?>! </h2>
        <h3 class="form-signin-heading ">This is your available credits: $<?php echo $user->credits; ?>.</h3>
        <a href="?action=play" type="button" class="btn btn-default center-block" style="border-radius:50px; width:100px; height:100px;">PLAY</a>
        <div class="center-block" style="width:212px; margin-top:50px;">
            <button type="button" class="btn btn-default">ADD CREDITS</button>
            <a href="?action=logoff" type="button" class="btn btn-default">LOG OUT</a>
        </div> 
    </div>
</div> 