<?php 

  $user_string = 'class="form-control" placeholder="Username" required autofocus';
  $pass_string = 'class="form-control" placeholder="Password" required';

?>

<div class="container">
        <form class="form-signin" role="form">
          <h2 class="form-signin-heading">Please sign in</h2>
          <?php echo form_input('username', '', $user_string); ?><br />
          <?php echo form_input('password', '', $pass_string); ?><br />
          <!--div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div-->
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
</div> <!-- /container -->
