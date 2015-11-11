Welcome <?php echo $user->name; ?><br/>
Here's your available credit: <?php echo $user->credits; ?>
<br/>
Pick your 3 numbers<br/>
<select name="number1">
  <?php generate_select_number_options(1,99); ?>
</select>
<select name="number2">
  <?php generate_select_number_options(1,99); ?>
</select>
<select name="number3">
  <?php generate_select_number_options(1,99); ?>
</select>
<br/>
Select your wager
<br/>
<select name="wager">
  <option value="1">$1</option>
  <option value="2">$5</option>
  <option value="3">$10</option>
  <option value="4">$100</option>
</select>
<br/>
Scratch Bash!</br>
<div><?php echo getRandString(1, 1, 99, true); ?></div>
<div><?php echo getRandString(1, 1, 99, true); ?></div>
<div><?php echo getRandString(1, 1, 99, true); ?></div>
<br/>
Scratch bash and see if you stash!<br/>
<a href="#">Add $10</a>
<a href="#">Try Again</a>
<a href="?action=logoff">Logoff</a>
