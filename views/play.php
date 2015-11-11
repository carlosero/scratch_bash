<div class="container Vblock">
    <div class="form-signin center-block Vcentered">
        <h2 class="form-signin-heading ">Welcome <?php echo $user->name; ?>! </h2>
        <h3 class="form-signin-heading ">This is your available credits: $<?php echo $user->credits; ?>.</h3>
        <br/>
        <h4 class="form-signin-heading text-center">Pick up your 3 numbers</h4>
        <div class="center-block" style="width:270px; height:90px;">
            <?php //generate_select_number_options(1,99); ?>
            <input id="nuno" name="number1" type="text" onkeydown="solonumeros(event,this.id);" class="btn btn-default center-block col-xs-4" maxlength="2" placeholder="--" style="border-radius:50px; width:90px; height:90px;"/>
            <input id="ndos" name="number2" type="text" onkeydown="solonumeros(event,this.id);" class="btn btn-default center-block col-xs-4" maxlength="2" placeholder="--" style="border-radius:50px; width:90px; height:90px;"/>
            <input id="ntres" name="number3" type="text" onkeydown="solonumeros(event,this.id)" class="btn btn-default center-block col-xs-4" maxlength="2" placeholder="--" style="border-radius:50px; width:90px; height:90px;"/>
        </div> 
        
        <h4 class="form-signin-heading text-center">Select your wager</h4>
        <select class="center-block" name="wager">
          <option value="1">$1</option>
          <option value="2">$5</option>
          <option value="3">$10</option>
          <option value="4">$100</option>
        </select>
        
        <h4 class="form-signin-heading text-center">Scratch Bash!</h4>
        <div class="center-block" style="width:270px; height:90px;">
            <input id="nuno" type="text" value="<?php echo getRandString(1, 1, 99, true); ?>" class="btn btn-default center-block col-xs-4" maxlength="2" placeholder="--"  style="width:90px; height:90px;"/>
            <input id="ndos" type="text" value="<?php echo getRandString(1, 1, 99, true); ?>" class="btn btn-default center-block col-xs-4" maxlength="2" placeholder="--" style="width:90px; height:90px;"/>
            <input id="ntres" type="text" value="<?php echo getRandString(1, 1, 99, true); ?>" class="btn btn-default center-block col-xs-4" maxlength="2" placeholder="--" style="width:90px; height:90px;"/>
        </div>
        <h4 class="form-signin-heading text-center">Scratch bash and see if you stash!</h4>
        <div class="center-block" style="width:215px; margin-top:25px;">
            <a href="#" type="button" class="btn btn-default">ADD CREDITS</a>
            <a href="?action=logoff" type="button" class="btn btn-default">LOG OFF</a>
        </div> 
        <div class="center-block" style="width:228px; margin-top:15px;">
            <a href="#" type="button" class="btn btn-default">TRY AGAIN</a>
            <a href="?action=home" type="button" class="btn btn-default">STOP PLAYING</a>
        </div> 
    </div>
</div> 